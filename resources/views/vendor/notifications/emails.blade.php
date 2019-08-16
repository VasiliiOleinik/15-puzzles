@component('mail::message')

    @lang('app.greetings')

    @component('mail::button', ['url' => $actionUrl])
        @lang('app.link_title')
    @endcomponent

    @lang('app.regards'), @lang('app.name')

@endcomponent
