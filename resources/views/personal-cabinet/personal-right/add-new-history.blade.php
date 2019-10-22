<div class="add-story" id="add-story-js">
    <h3 class="add-story__title">@lang('personal_cabinet.add_your_story')</h3>
    <form class="add-story__form" method="post" action="{{ route('personal_create_post') }}" enctype="multipart/form-data">
        @csrf
        <div class="labels">
            <input class="headline inp dinamic-input-js" type="text" name="headline" required>
            <label for="headline" class="dinamic-label-js">@lang('personal_cabinet.headline')</label>
        </div>
        <div class="labels">
            <textarea id="elfinder1" class="story inp dinamic-input-js" name="your-story" required></textarea>
            <label class="textarea" for="your-story" class="dinamic-label-js">@lang('personal_cabinet.your_story')</label>
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
        <div class="tag-search">
            <div class="labels" style="padding: 0; min-height:48px;">
                <input id="story-tags" required>
                <input class="add-tags inp" type="text" name="story-tags" id="tags">
                <label class="place">@lang('member_cases.your_story_tags') <span class="required">*</span></label>
            </div>
        </div>
        <div class="footer-form">
            <input class="submit-form" type="submit" value="@lang('personal_cabinet.submit_note')">
            <input class="cancel-form" type="button" value="@lang('personal_cabinet.cancel')" id="cancel-form-js">
        </div>
    </form>
</div>

<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'your-story' );
</script>
