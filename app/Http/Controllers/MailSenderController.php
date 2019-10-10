<?php

namespace App\Http\Controllers;

use App\Mail\MemberCasesMail;
use App\Mail\NewsMail;
use App\Models\Article\Article;
use App\Models\Article\ArticleLanguage;
use App\Models\MemberCase;
use App\Models\MemberCaseLanguage;
use App\Models\Subscriber;
use App\Service\Sender\MailSenderService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Unisender\ApiWrapper\UnisenderApi;

class MailSenderController extends Controller
{
    private $languages = ['eng', 'ru'];
    private $unisender;

    public function __construct()
    {
        $unisenderKey = config('puzzles.mail_sender.unisender_api_key');
        $this->unisender = new UnisenderApi($unisenderKey);
    }

    public function sendNewsNotification()
    {

        $listId = config('puzzles.mail_sender.news');
        $currentDate = Carbon::now();
        $previousDate = Carbon::now()->subWeek();

        foreach ($this->languages as $language)
        {
            $emails = Subscriber::where('language', $language)->get();
            if (!$emails->isEmpty())
            {
                $latest = Article::whereBetween('created_at', [$previousDate, $currentDate])->pluck('id');
                $news = ArticleLanguage::where('language', $language)->
                        whereIn('article_id', $latest)->
                        orderBy('article_id', 'desc')->
                        get();

                if (!$news->isEmpty())
                {
                    $body = view('emails.letter-to-subscriber', ['news' => $news])->render();

                    $result = $this->unisender->createEmailMessage([
                        'sender_name' => trans('subscriber.from_who', [], $language),
                        'sender_email' => config('puzzles.mail_sender.unisender_sender_email'),
                        'subject' => trans('subscriber.subject', [], $language),
                        'body' => $body,
                        'list_id' => $listId,
                        'lang' => $language == 'eng' ? 'en' : 'ru',
                    ]);

                    $messageId = json_decode($result)->result->message_id;
                    if ($messageId) {
                        $result = $this->unisender->createCampaign(['message_id' => $messageId]);
                    }
                }
            }
        }
    }

    public function sendMemberCasesNotification()
    {
        $listId = config('puzzles.mail_sender.member_cases');
        $currentDate = Carbon::now();
        $previousDate = Carbon::now()->subWeek();

        foreach ($this->languages as $language)
        {
            $emails = Subscriber::where('language', $language)->get();
            if (!$emails->isEmpty())
            {
                $latest = MemberCase::whereBetween('created_at', [$previousDate, $currentDate])->where('status', 'show')->pluck('id');
                $memberCases = MemberCaseLanguage::where('language', $language)->
                                whereIn('member_case_id', $latest)->
                                orderBy('member_case_id', 'desc')->
                                get();

                if (!$memberCases->isEmpty())
                {
                    $body = view('emails.member_cases-to-subscriber', ['memberCases' => $memberCases])->render();

                    $result = $this->unisender->createEmailMessage([
                        'sender_name' => trans('subscriber.from_who', [], $language),
                        'sender_email' => config('puzzles.mail_sender.unisender_sender_email'),
                        'subject' => trans('subscriber.member_cases_subject', [], $language),
                        'body' => $body,
                        'list_id' => $listId,
                        'lang' => $language == 'eng' ? 'en' : 'ru',
                    ]);

                    $messageId = json_decode($result)->result->message_id;
                    if ($messageId) {
                        $result = $this->unisender->createCampaign(['message_id' => $messageId]);
                    }
                }
            }
        }
    }

    public function updateContact($email)
    {
        $this->unisender->subscribe(['list_ids' => config('puzzles.mail_sender.news').','.config('puzzles.mail_sender.member_cases'), 'fields[email]' => $email, 'double_optin' => 3]);
    }

    public function deleteEmails()
    {
        $currentDate = Carbon::now('UTC');
        $previousDate = Carbon::now('UTC')->subWeek();
        $result = $this->unisender->listMessages(['date_from' => $previousDate->format('Y-m-d H:i'), 'date_to' => $currentDate->format('Y-m-d H:i')]);
        $listMessages = json_decode($result)->result;
        foreach ($listMessages as $listMessage)
        {
            $result = $this->unisender->deleteMessage(['message_id' => $listMessage->id]);
        }
    }
}
