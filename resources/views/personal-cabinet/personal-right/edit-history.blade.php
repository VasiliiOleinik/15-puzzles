<div class="add-story" id="edit-story-js">
    <h3 class="add-story__title">@lang('personal_cabinet.change_your_story')</h3>
    <form class="add-story__form" id="edit-story__form" method="post" action="{{ route('medical_history_update_post') }}">
        @csrf
        <input type="hidden" name="id" value="">
        <div class="labels">
            <input class="headline inp" type="text" name="headline" required>
            <label for="headline">@lang('personal_cabinet.headline')</label>
        </div>
        <div class="labels">
            <textarea id="ckeditor" class="story inp" name="your-story" required ></textarea>
        </div>
        <div class="add-images">
            <h3 class="add-images__title">@lang('personal_cabinet.add_image')</h3>
            <div class="images-container">
                <div class="item-img" id="edit-story-item-image">
                    <input id="edit-story-img"  type="hidden" name="img-medical-history">
                    <div class="imageWrapper"><img class="image" src="/img/upload.png"></div>
                    <button class="file-upload">
                        <input class="file-input" type="file" placeholder="@lang('personal_cabinet.choose_file')">
                    </button>
                </div>
            </div>
        </div>
        <div class="footer-form">
            <input class="submit-form" type="submit" value="@lang('personal_cabinet.save_note')">
            <input class="cancel-form" type="button" value="@lang('personal_cabinet.cancel')" id="cancel-edit-form-js">
        </div>
    </form>
</div>

<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'ckeditor' );
</script>