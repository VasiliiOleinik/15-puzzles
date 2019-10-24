                <div class="personal-history">
                  <h3 class="personal-history__title">@lang('personal_cabinet.history')</h3>
                  <p class="personal-history__message">@lang('personal_cabinet.file_formats')</p>
                  <!--<form class="upload-label">-->
                  <form class="upload-label" method="POST" action="{{ route('file.personal_cabinet.store', app()->getLocale()) }}" enctype="multipart/form-data">
                  @csrf
                    <div class="upload-file">
                      <div class="fileImg"><img class="file" src="/img/file.png"></div>
                      <button class="file-upload">
                        <input class="file-input" type="file" id="file" name="file" placeholder="Choose File"
                                accept=".xlsx, .pdf, .txt,.docx"/>
                      </button>
                    </div>
                    <div class="upload-info">
                      <!-- file name -->
                      <div class="label">
                        <input id="personal_file_name" type="text" class="dinamic-input-js form-control @error('file_name') is-invalid @enderror" name="file_name" value="" autofocus required>
                        <input id="personal_file_type" type="hidden" name="file_type" required>
                        <input id="personal_file_size" type="hidden" name="file_size" required>
                        <label for="file_name" class="dinamic-label-js">@lang('personal_cabinet.file_name')<span>*</span></label>
                        @error('file_name')
                          <label class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </label>
                        @enderror
                        <!- - ->
                      </div>
                        <input class="add-file" type="submit" value="@lang('personal_cabinet.add_button')">
                    </div>
                  </form>
                </div>
