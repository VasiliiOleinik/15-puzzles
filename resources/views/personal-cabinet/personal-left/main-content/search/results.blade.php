                  <div class="search-byHistory__result">
                    @foreach($user_files as $user_file)
                    <div class="result-item" obj-id="{{$user_file->id}}">
                      <div class="result-item__img"><img src="img/svg/{{$user_file->type}}.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">{{$user_file->name}}</a><a class="date" href="javascript:void(0)">{{$user_file->updated_at->format('d.m.Y')}}</a></div>
                    </div>
                    @endforeach                    
                  </div>
                  <div class="search-byHistory__more"></div>
                  <!--<div class="search-byHistory__more"><a class="show-more" href="javascript:void(0)">Show more</a></div>-->
