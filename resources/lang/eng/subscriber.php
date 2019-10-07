<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Subscriber's Letter Page Messages
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the subscriber's letter page. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'subject' => 'Latest news '.config('app.name'),
    'member_cases_subject' => 'New member cases on '.config('app.name'),
    'from_who' => 'Administration '.config('app.name'),
    'email_required' => 'Enter your e-mail',
    'email_email' => 'Your e-mail is incorrect',
    'email_max' => 'Your e-mail is too long',
    'successfully_subscribed' => 'You have successfully subscribed',
    'already_subscribed' => 'You are already subscribed',
];
