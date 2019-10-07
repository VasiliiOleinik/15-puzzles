<?php

namespace App\Http\Controllers;

use App\Models\Article\Article;
use App\Models\Article\ArticleLanguage;
use App\Models\MemberCase;
use App\Models\MemberCaseLanguage;
use App\Models\Subscriber;
use App\Service\Sender\MailSenderService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MailSenderController extends Controller
{
    private $mailService;

    public function __construct()
    {
        $this->mailService = new MailSenderService();
    }

    public function sendNewsNotification()
    {
        $emails = Subscriber::all();
        $listId = config('mail_sender.news');
        $currentDate = Carbon::now();
        $previousDate = Carbon::now()->subWeek();

        $latest = Article::whereBetween('created_at', [$previousDate, $currentDate])->get();
        $news = ArticleLanguage::whereIn('article_id', $latest)->where('language', app()->getLocale())->orderBy('article_id', 'desc')->get();
        if (!$news->isEmpty())
        {
            $body = view('emails.letter-to-subscriber', ['news' => $news])->render();
            $messageId = $this->mailService->createEmailMessage(trans('subscriber.from_who'), $listId, $body, 'news', trans('subscriber.subject'));

            if ($messageId) {
                $this->mailService->createCampaign($messageId, $emails);
            }
        }
    }

    public function sendMemberCasesNotification()
    {
        $emails = Subscriber::all();
        $listId = config('mail_sender.member_cases');
        $currentDate = Carbon::now();
        $previousDate = Carbon::now()->subWeek();

        $latest = MemberCase::whereBetween('created_at', [$previousDate, $currentDate])->where('status', 'show')->get();
        $memberCases = MemberCaseLanguage::whereIn('member_case_id', $latest)
                        ->where('language', app()->getLocale())
                        ->orderBy('member_case_id', 'desc')
                        ->get();
        if (!$memberCases->isEmpty())
        {
            $body = view('emails.member_cases-to-subscriber', ['memberCases' => $memberCases])->render();
            $messageId = $this->mailService->createEmailMessage(trans('subscriber.from_who'), $listId, $body, 'member_cases', trans('subscriber.member_cases_subject'));

            if ($messageId) {
                $this->mailService->createCampaign($messageId, $emails);
            }
        }
    }

    public function updateContact($email)
    {
        $this->mailService->importContacts([$email], config('mail_sender.news'), 'news');
        $this->mailService->importContacts([$email], config('mail_sender.member_cases'), 'member_cases');
    }
}
