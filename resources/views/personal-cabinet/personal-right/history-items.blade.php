<div class="med-history" id="med-history-js">
    @foreach($medicalHistories as $medicalHistory)
        <div class="med-history-item">
            <h3 class="med-history__name">{{$medicalHistory->title}}</h3>
            @if( $medicalHistory->img == null )
                <img class="med-history__img" src="/img/med-history.png" alt="">
            @else
                <img class="med-history__img" src="{{$medicalHistory->img}}" alt="">
            @endif
            <div class="med-history__settings"><a class="med-history__date" href="javascript:void(0)">{{$medicalHistory->updated_at->format('d.m.Y')}}</a>
                <div class="med-history__settings-right" obj-id="{{$medicalHistory->id}}">
                    <a class="edit-artile" id="edit-article-js" href="javascript:void(0)">@lang('personal_cabinet.edit_article')</a>
                    <a class="delete-artile" id="delete-article-js" href="javascript:void(0)">@lang('personal_cabinet.delete_article')</a>
                </div>
            </div>
            <p class="med-history__info">{!! $medicalHistory->content !!}</p>
        </div>
    @endforeach
    <div class="pagination">
        {{$medicalHistories->appends(request()->except('page'))->links('vendor.pagination.default')}}
    </div>
    <a class="add-note" href="javascript:void(0)" id="add-note-js">@lang('personal_cabinet.add_a_note')</a>
</div>