            <div class="personal-right">
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
                  <p class="med-history__info">{{$medicalHistory->content}}</p>
                </div>
                @endforeach
               <div class="pagination">
                    {{$medicalHistories->appends(request()->except('page'))->links('vendor.pagination.default')}}
               </div>
               <a class="add-note" href="javascript:void(0)" id="add-note-js">@lang('personal_cabinet.add_a_note')</a>
              </div>
              <div class="add-story" id="add-story-js">
                <h3 class="add-story__title">@lang('personal_cabinet.add_your_story')</h3>
                <form class="add-story__form" method="post" action="{{ route('medical_history_create_post') }}">
                @csrf
                  <div class="labels">
                    <input class="headline inp" type="text" name="headline" required>
                    <label for="headline">@lang('personal_cabinet.headline')</label>
                  </div>
                  <div class="labels">
                    <textarea class="story inp" name="your-story" required></textarea>
                    <label class="textarea" for="your-story">@lang('personal_cabinet.your_story')</label>
                  </div>
                  <div class="add-images">
                    <h3 class="add-images__title">@lang('personal_cabinet.add_image')</h3>
                    <div class="images-container">
                      <div class="item-img">
                        <input id="add-story-img" type="hidden" name="img-medical-history">
                        <div class="imageWrapper"><img class="image" src="/img/upload.png"></div>
                        <button class="file-upload">
                          <input class="file-input" type="file" placeholder="@lang('personal_cabinet.choose_file')">
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="footer-form">
                    <input class="submit-form" type="submit" value="@lang('personal_cabinet.submit_note')">
                    <input class="cancel-form" type="button" value="@lang('personal_cabinet.cancel')" id="cancel-form-js">
                  </div>
                </form>
              </div>
            </div>
