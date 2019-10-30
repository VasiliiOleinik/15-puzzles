<div class="header-login-modal" id="header-login-modal-js">
    <div class="header-login-modal__container">
        <button class="header-login-modal__close"><img src="/img/svg/close-modal.svg" alt=""></button>
        <div class="container-authorization">
            <div class="container-authorization__tabs">
                <div class="authorization-tab active" id="tabs-login">@lang('main.Authorization')</div>
                <div class="authorization-tab" id="tabs-registration">@lang('main.Registration')</div>
            </div>
            @include('layouts.include.login-modal.authentication')
            @include('layouts.include.login-modal.registration')
        </div>
        @include('layouts.include.login-modal.recovery-password')
    </div>
</div>
