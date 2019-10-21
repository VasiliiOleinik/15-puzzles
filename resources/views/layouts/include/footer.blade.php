<footer class="footer">
  <div class="box">
    <div class="footer__items">
      <div class="footer__left footer__item">
        <div class="footer__logo logo"><img src="/img/svg/logo.svg"></div>
        <ul class="footer__list">
          <li class="footer__li"><a class="footer__link" href="{{ url(app()->getLocale().'/faq') }}" target="_blank">@lang('footer.letter')</a></li>
          @foreach(app('police') as $item)
            <li class="footer__li">
              <a class="footer__link" href="{{ url(app()->getLocale().'/police') }}/{{ $item->police->alias }}" target="_blank">{{ $item->title }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="footer__middle footer__item">
        <h6 class="footer__h6">@lang('footer.disclaimer')</h6>
        <p class="footer__disclaimer">@lang('footer.text_disclaimer')</p>
      </div>
      <div class="footer__right footer__item">
        <h6 class="footer__h6">@lang('footer.title_subscribe')</h6>
        <form id="footer-subscribe-form" class="footer__subscribe" method="get">
          @auth
          <input type="text" name="email-subscribe" placeholder="@lang('footer.placeholder_subscribe')" value="{{ Auth::user()->email }}">
          @endauth
          @guest
          <input type="text" name="email-subscribe" placeholder="@lang('footer.placeholder_subscribe')">
          @endguest
          <button type="submit">@lang('footer.button_subscribe')</button>
        </form>
        <label id="footer-email-subscribe-error" class="invalid" for="email-subscribe"></label>
        <h6 class="footer__h6 evidence-title">@lang('footer.levels')</h6>
        <ul class="footer__evidence">
          <li class="proven">@lang('footer.proven')</li>
          <li class="average">@lang('footer.average')</li>
          <li class="low">@lang('footer.low')</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="box">
    <div class="footer__copirate">@lang('footer.copyright')
      <div class="footer__socs">
        @foreach(app('social') as $social)
          <a class="footer__soc" href="{{ $social->link }}" target="_blank"><img src="{{asset($social->img)}}"></a>
        @endforeach
    </div>
  </div>
</footer>
<div style="display: none;" id="success-modal">
  <div class="success-modal-content">
	  <h2 class="success-modal-content__header">Спасибо!</h2>
    <p class="success-modal-content__text">Ваши данные отправлены!</p>
  </div>
</div>
