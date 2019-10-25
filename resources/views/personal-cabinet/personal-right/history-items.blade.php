<div class="med-history" id="med-history-js">
    @foreach($memberCases as $memberCase)
        <div class="med-history-item">
            <div class="member_case_title">
                <h3 class="med-history__name">{{$memberCase->title}}</h3>
                @if($memberCase->is_active)
                    <label class="member_case_published">@lang('personal_cabinet.member_case_published')</label>
                @else
                    <label class="member_case_on_moder">@lang('personal_cabinet.member_case_on_moderation')</label>
                @endif
            </div>
            @if( $memberCase->img == null )
                <img class="med-history__img" src="/img/med-history.png" alt="">
            @else
                <img class="med-history__img" src="{{ asset($memberCase->img) }}" alt="">
            @endif
            <div class="med-history__settings"><a class="med-history__date" href="javascript:void(0)">{{$memberCase->updated_at->format('d.m.Y')}}</a>
                <div class="med-history__settings-right" obj-id="{{$memberCase->id}}">
                    <a class="edit-artile" id="edit-article-js" href="javascript:void(0)">@lang('personal_cabinet.edit_article')</a>
                    <a class="delete-artile" id="delete-article-js" href="javascript:void(0)">@lang('personal_cabinet.delete_article')</a>
                </div>
            </div>
            <p class="med-history__info">{{ str_limit(strip_tags($memberCase->content), $limit = 400, $end = '...') }}</p>
        </div>
    @endforeach
    <div class="pagination">
        {{$memberCases->appends(request()->except('page'))->links('vendor.pagination.default')}}
    </div>
    <a class="add-note" href="javascript:void(0)" id="add-note-js">@lang('personal_cabinet.add_a_note')</a>
</div>
