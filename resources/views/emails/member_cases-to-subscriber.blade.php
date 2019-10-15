<!DOCTYPE html>
<html>
<head>
<title>@lang('subscriber.subject')</title>
</head>

<body>
    @foreach($memberCases as $memberCase)
    @if( substr( $memberCase->memberCase->img ,0,5) == "data:" )
    <div class="home-news__item"
            style="
                    display: flex;
                    -webkit-box-orient: horizontal;
                    -webkit-box-direction: normal;
                    -webkit-flex-direction: row;
                    -ms-flex-direction: row;
                    flex-direction: row;
                    margin-bottom: 30px;
             "
        >
       {{-- <img class="news-image" src="{{$memberCase->memberCase->img}}" alt="" --}}
       <img class="news-image" src="{{ url($memberCase->memberCase->img) }}" alt=""
             style="
                    display: flex;
                    max-width: 134px;
                    max-height: 134px;
                    margin-right: 25px;
                    -webkit-flex-shrink: 0;
                    -ms-flex-negative: 0;
                    flex-shrink: 0;
             "
        >
    @else
    <div class="home-news__item"
             style="
                    display: flex;
                    -webkit-box-orient: horizontal;
                    -webkit-box-direction: normal;
                    -webkit-flex-direction: row;
                    -ms-flex-direction: row;
                    flex-direction: row;
                    margin-bottom: 30px;
             "
        >
        {{-- <img class="news-image" src="{{config('app.url')}}{{$memberCase->memberCase->img}}" alt="" --}}
        <img class="news-image" src="{{ url($memberCase->memberCase->img) }}" alt=""
             style="
                    display: flex;
                    max-width: 134px;
                    max-height: 134px;
                    margin-right: 25px;
                    -webkit-flex-shrink: 0;
                    -ms-flex-negative: 0;
                    flex-shrink: 0;
             "
        >
    @endif
    {{-- @php
        //форматируем
        $memberCaseTitle = mb_strtolower($memberCase->title);
        $memberCaseTitle = preg_replace('#[[:punct:]]#', '', $memberCaseTitle);
        $memberCaseTitle = str_replace(' ', '-', $memberCaseTitle);
    @endphp --}}
      <div class="news-detail"
            style="
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
            "
            >
        <a class="news-name" href="{{ url(app()->getLocale().'/member_cases') }}/{{$memberCase->memberCase->alias}}"
            style="
                    color: #364458;
                    font-size: 18px;
                    font-weight: 600;
                    margin-bottom: 15px;
            "
            >{{$memberCase->title}}
        </a>
        <a class="news-date" href="{{ url(app()->getLocale().'/member_cases') }}/{{$memberCase->memberCase->alias}}"
            style="
                    color: #599ba7;
                    font-size: 14px;
                    font-weight: 400;
                    margin-bottom: 20px;
            "
            >{{$memberCase->memberCase->updated_at->format('d.m.Y')}}
        </a>
        <a class="news-text " href="{{ url(app()->getLocale().'/member_cases') }}/{{$memberCase->memberCase->alias}}"
            style="
                    color: #59596a;
                    font-size: 15px;
                    font-weight: 400;
                    position: relative;
            "
            >{{$memberCase->description}}
          <span class="news-arrow"
            style="
                        position: relative;
                        display: inline-block;
                        vertical-align: middle;
            "
            ></span>
        </a>
      </div>
    </div>
    @endforeach

</body>

</html>
