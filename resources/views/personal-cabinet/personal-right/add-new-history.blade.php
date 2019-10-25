<div class="add-story" id="add-story-js">
    <h3 class="add-story__title">@lang('personal_cabinet.add_your_story')</h3>
    <form class="add-story__form" id="add-story__form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="labels">
            <input class="headline inp dinamic-input-js" type="text" name="headline">
            <label for="headline" class="dinamic-label-js">@lang('personal_cabinet.headline')</label>
            <label id="add-story-headline-error" class="invalid" for="headline"></label>
        </div>
        <div class="labels">
            <textarea id="ckeditor_add" class="story inp dinamic-input-js" name="your-story"></textarea>
{{--            <label class="textarea" for="your-story" class="dinamic-label-js">@lang('personal_cabinet.your_story')</label>--}}
            <label id="add-story-your-story-error" class="invalid" for="your-story"></label>
        </div>
        <div class="add-images">
            <h3 class="add-images__title">@lang('personal_cabinet.add_image')</h3>
            <div class="images-container">
                <div class="item-img" id="add-story-item-image">
                    <input id="add-story-img" type="hidden" name="img-medical-history">
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
            <label id="add-story-story-tags-error" class="invalid" for="story-tags"></label>
        </div>
        <div class="footer-form">
            <label>
                <input class="checkbox" name="anonym" type="checkbox"><span class="checkbox-custom"></span><span class="label">@lang('member_cases.do_not_publish')</span>
            </label>
            <input class="submit-form" type="submit" value="@lang('personal_cabinet.submit_note')" id="submit-button-form-js">
            <input class="cancel-form" type="button" value="@lang('personal_cabinet.cancel')" id="cancel-form-js">
        </div>
    </form>
</div>

<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'ckeditor_add' );
</script>
