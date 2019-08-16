@component('mail::message')
    @lang('reset.message')

    @component('mail::button', ['url' => $actionUrl])
        @lang('reset.link_title')
    @endcomponent

    @lang('reset.expire_before_time')
    {{ config('auth.passwords.users.expire') }}
    @lang('reset.expire_after_time')

    @lang('reset.message_bottom')

    @lang('reset.regards') @lang('app.name')
@endcomponent
