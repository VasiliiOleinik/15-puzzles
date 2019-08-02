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
                    <div class="med-history__settings-right">
                      <a class="edit-artile" id="edit-article-js" href="javascript:void(0)">Edit article</a>
                      <a class="delete-artile" id="delete-article-js" href="javascript:void(0)">Delete article</a>
                    </div>
                  </div>
                  <!--
                  <div class="med-history__settings"><a class="med-history__date" href="javascript:void(0)">{{$medicalHistory->updated_at->format('d.m.Y')}}</a>
                    <a class="edit-artile" id="edit-article-js" href="javascript:void(0)">Edit article</a>
                    <a class="delete-artile" id="delete-article-js" href="javascript:void(0)">Delete article</a>
                  </div>
                  -->
                  <p class="med-history__info">{{$medicalHistory->content}}</p>
                </div>
                @endforeach
               <div class="pagination">
                    {{$medicalHistories->appends(request()->except('page'))->links('vendor.pagination.default')}}                 
               </div>
               <a class="add-note" href="javascript:void(0)" id="add-note-js">Add a note</a>
              </div>
              <div class="add-story" id="add-story-js">
                <h3 class="add-story__title">Add your story</h3>                
                <form class="add-story__form" method="post" action="{{ route('medical_history_create_post') }}">
                @csrf
                  <div class="labels">
                    <input class="headline inp" type="text" name="headline" required>
                    <label for="headline">Headline</label>
                  </div>
                  <div class="labels">
                    <textarea class="story inp" name="your-story" required></textarea>
                    <label class="textarea" for="your-story">Your story</label>
                  </div>
                  <div class="add-images">
                    <h3 class="add-images__title">Add image</h3>
                    <div class="images-container">
                      <div class="item-img">
                        <input id="add-story-img" type="hidden" name="img-medical-history">  
                        <div class="imageWrapper"><img class="image" src="/img/upload.png"></div>
                        <button class="file-upload">
                          <input class="file-input" type="file" placeholder="Choose File">
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="footer-form">
                    <input class="submit-form" type="submit" value="Submit note">
                    <input class="cancel-form" type="button" value="Cancel" id="cancel-form-js">
                  </div>
                </form>
              </div>
              <!--
              <div class="edit-story" id="edit-story-js">
                <h3 class="edit-story__title">Add your story</h3>                
                <form class="edit-story__form" method="post" action="{{ route('medical_history.edit', $user->id) }}">
                @csrf
                  <div class="labels">
                    <input class="headline inp" type="text" name="headline" required>
                    <label for="headline">Headline</label>
                  </div>
                  <div class="labels">
                    <textarea class="story inp" name="your-story" required></textarea>
                    <label class="textarea" for="your-story">Your story</label>
                  </div>
                  <div class="add-images">
                    <h3 class="add-images__title">Add image</h3>
                    <div class="images-container">
                      <div class="item-img">
                        <input id="add-story-img" type="hidden" name="img-medical-history">  
                        <div class="imageWrapper"><img class="image" src="/img/upload.png"></div>
                        <button class="file-upload">
                          <input class="file-input" type="file" placeholder="Choose File">
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="footer-form">
                    <input class="submit-form" type="submit" value="Submit note">
                    <input class="cancel-form" type="button" value="Cancel" id="cancel-form-js">
                  </div>
                </form>
              </div>
              -->
            </div>
