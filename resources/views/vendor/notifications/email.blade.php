@component('mail::message')

    @lang('app.greetings')

    @component('mail::button', ['url' => $actionUrl])
        @lang('app.button_title')
    @endcomponent

    @lang('app.regards'), @lang('app.name')

@endcomponent
