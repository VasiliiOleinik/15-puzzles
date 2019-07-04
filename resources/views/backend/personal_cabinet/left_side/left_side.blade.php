<div id="personal_cabinet-left_side" class="col-sm-6 py-4">                    
    
    <h4 class="mb-3"><strong>Personal cabinet</strong></h4>

    <form method="POST" action="{{ route('user.update',$user)}}">
    @csrf
    <input name="_method" type="hidden" value="PUT">
        <div class="row">

              @include('personal_cabinet.left_side.avatar')  
              @include('personal_cabinet.left_side.user_personal_data') 
        
        </div>

        <hr>
        <!-- save changes button -->
        <button id="save_changes" type="submit" class="btn btn-medicine r-50">
            Save changes
        </button>
        <!- - ->

        <!-- avatar image hidden data -->
        <input id="img" type="text" class="form-control @error('img') is-invalid @enderror" name="img" hidden>
        <!- - ->
        <!-- -- -->
    </form>

    @include('personal_cabinet.left_side.upload_analize_file') 
    @include('personal_cabinet.left_side.search_file.search_file') 
    
</div>

