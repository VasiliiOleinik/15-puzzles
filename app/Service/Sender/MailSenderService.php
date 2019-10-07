<?php

namespace App\Service\Sender;

use Unisender\ApiWrapper\UnisenderApi;

class MailSenderService
{
    private $unisender;
    private $senderName;
    private $senderEmail;

    public function __construct()
    {
        if (!$unisenderApiKey = env('UNISENDER_API_KEY', null)) {
            throw new \InvalidArgumentException('UNISENDER_API_KEY not set in .env file');
        }

        if (!$senderName = env('UNISENDER_SENDER_NAME', null)) {
            throw new \InvalidArgumentException('UNISENDER_SENDER_NAME not set in .env file');
        }

        if (!$senderEmail = env('UNISENDER_SENDER_EMAIL', null)) {
            throw new \InvalidArgumentException('UNISENDER_SENDER_EMAIL not set in .env file');
        }

        $this->unisender = new UnisenderApi($unisenderApiKey);
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
    }


    public function createList($params = [])
    {
        $rezult = $this->unisender->createList($params);
        return $rezult;
    }

    public function importContacts($emails, $listId, $tag)
    {
        $field_names = ['email', 'email_list_ids', 'tags'];
        $data = [];
        foreach ($emails as $email) {
            $data[] = [$email, $listId, $tag];
        }
        $rezult = $this->unisender->importContacts([
            'field_names' => $field_names,
            'data' => $data
        ]);
        return $rezult;
    }

    public function createEmailMessage($email, $listId, $body, $tag, $subject = 'Рассылка от 15 PUZZLES')
    {
        $result = $this->unisender->createEmailMessage([
            'sender_name' => $email,
            'sender_email' => $this->senderEmail,
            'subject' => $subject,
            'body' => $body,
            'list_id' => $listId,
            'tag' => $tag
        ]);
        $result = json_decode($result);
        if ($result->result->message_id) {
            return $result->result->message_id;
        }
        return null;
    }

    public function createCampaign($messageId, $emails)
    {
        $contacts = implode(',', $emails);
        $result = $this->unisender->createCampaign([
            'message_id' => $messageId,
            'contacts' => $contacts,
        ]);

        return json_decode($result);
    }

    public function getCampaignDeliveryStats($campaignId)
    {
        $result = $this->unisender->getCampaignDeliveryStats([
            'campaign_id' => $campaignId
        ]);
        return json_decode($result);
    }

}
