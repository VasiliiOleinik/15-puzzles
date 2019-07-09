                <div class="personal-history">
                  <h3 class="personal-history__title">History of analyzes</h3>
                  <p class="personal-history__message">You can add file formats: PDF and Office files</p>
                  <!--<form class="upload-label">-->
                  <form class="upload-label" method="POST" action="{{ route('file.personal_cabinet.store') }}" enctype="multipart/form-data">
                  @csrf
                    <div class="upload-file">
                      <div class="fileImg"><img class="file" src="img/file.png"></div>
                      <button class="file-upload">
                        <input class="file-input" type="file" id="file" name="file" placeholder="Choose File"
                                accept=".xlsx, .pdf, .txt,.docx"/> 
                      </button>
                    </div>
                    <div class="upload-info">
                      <!-- file name -->           
                      <input id="personal_file_name" type="text" placeholder="File Name" class="form-control @error('file_name') is-invalid @enderror" name="file_name" value="" autocomplete="file_name" autofocus required>
                      <input id="personal_file_type" type="hidden" name="file_type" required>
                      <input id="personal_file_size" type="hidden" name="file_size" required>
                      @error('file_name')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                      <!- - ->
                      <input class="add-file" type="submit" value="ADD">
                    </div>
                  </form>
                </div>
