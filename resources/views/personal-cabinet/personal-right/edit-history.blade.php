@section('literature-js')
    <!--  scripts you need to search for tags   -->
    <script src="{{ asset('js/backend/tags search/typeahead.js') }}" defer></script>
    <script src="{{ asset('js/backend/tags search/bootstrap-tagsinput.js') }}" defer></script>
    <script src="{{ asset('js/backend/memberCases.js') }}" defer></script>
@endsection
@section('literature-css')
    <link href="{{ asset('css/backend/tags search/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/tags search/typeaheadjs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/memberCases.css') }}" rel="stylesheet">
@endsection

<div class="add-story" id="edit-story-js">
    <h3 class="add-story__title">@lang('personal_cabinet.change_your_story')</h3>
    <form class="add-story__form" id="edit-story__form" method="post" action="{{ route('personal_update_post') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="">
        <div class="labels">
            <input class="headline inp dinamic-input-js" type="text" name="headline">
            <label for="headline" class="dinamic-label-js">@lang('personal_cabinet.headline')</label>
            <label id="edit-story-headline-error" class="invalid" for="headline"></label>
        </div>
        <div class="labels">
            <textarea id="ckeditor_edit" class="story inp" name="your-story"></textarea>
            <label id="edit-story-your-story-error" class="invalid" for="your-story"></label>
        </div>
        <div class="add-images">
            <h3 class="add-images__title">@lang('personal_cabinet.add_image')</h3>
            <div class="images-container">
                <div class="item-img" id="edit-story-item-image">
                    <input id="edit-story-img"  type="hidden" name="img-medical-history">
                    <div class="imageWrapper"><img class="image" src="/img/upload.png"></div>
                    <button class="file-upload">
                        <input name="image-file" class="file-input" type="file" placeholder="@lang('personal_cabinet.choose_file')">
                    </button>
                </div>
            </div>
        </div>
        <div class="member-case-tags__cloud">
            <span class="member-case-tags__cloud-text">Добавьте теги к вашей истории</span>
            <select class="js-example-basic-multiple" name="story-tags[]" multiple="multiple" style="width: 100%">
                @foreach($member_cases_tags as $member_cases_tag)
                    <option value='{{ $member_cases_tag->tag_id }}'>{{ $member_cases_tag->name }}</option>
                @endforeach
            </select>
            <label id="edit-story-story-tags-error" class="invalid" for="story-tags"></label>
        </div>
        <div class="footer-form">
            <label>
                <input class="checkbox" name="anonym" type="checkbox"><span class="checkbox-custom"></span><span class="label">@lang('member_cases.do_not_publish')</span>
            </label>
            <input class="submit-form" type="submit" value="@lang('personal_cabinet.save_note')" id="submit-edit-form-js">
            <input class="cancel-form" type="button" value="@lang('personal_cabinet.cancel')" id="cancel-edit-form-js">
        </div>
    </form>
</div>

<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'ckeditor_edit' );
</script>
