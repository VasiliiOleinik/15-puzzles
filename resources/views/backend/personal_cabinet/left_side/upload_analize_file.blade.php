<!-- UPLOAD ANALIZE FILE -->
<form method="POST" action="{{ route('file.personal_cabinet.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="container">
                                            
        <div class="row">                                    
            <div class="col-12 col-sm-12 fileUp">
                    <div class="row">
                    <h5 class="mb-4"><strong>History of analyzes</strong></h5>
                    <p>You can add file formats: PDF and Office files.<p>

                    <div class="col-6">
                                                 
                        <!-- preview -->
                        <div class="filePreview">
                        <input type="file" accept=".xlsx, .xls, .doc, .docx, .txt, .pdf" class="uploadFile file"  name="upload_file" id="upload_file" required>
                        </div>
                        <!- - ->
                    </div>
                    <div class="col-6">
                        <!-- file name -->
           
                        <input id="file_name" type="text" placeholder="File Name" class="form-control @error('file_name') is-invalid @enderror" name="file_name" value="" autocomplete="file_name" autofocus required>
                        <input id="file_type" type="hidden" name="file_type" required>
                        <input id="file_size" type="hidden" name="file_size" required>

                        @error('file_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!- - ->
                        <br>
                        <!-- upload button -->
                        <button type="submit" class="btn btn-medicine r-15">
                        upload
                        </button>
                        <!- - ->
                    </div>
                </div>
            </div>   
        </div>                            
    </div>
</form>
<hr>
<!-- -- -->
