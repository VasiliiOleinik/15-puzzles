                  <div class="profile-img">
                    @if( $user->img==null )
                    <div class="imageWrapper"><img class="image" src="img/upload_big.png"></div>
                    @else
                    <div class="imageWrapper"><img class="image" src="{{$user->img}}"></div>
                    @endif
                    <button class="file-upload">
                      <input class="file-input" type="file" placeholder="Choose File">
                    </button>
                  </div>
