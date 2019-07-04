 <!-- FLASH MESSAGES -->
@if(Session::get('status-user_update'))
<div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Info!</strong> {{Session::get('status-user_update')}}
</div>
@endif
@if(Session::get('status-file_upload'))
    <div class="alert alert-warning alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Info!</strong> {{Session::get('status-file_upload')}}
    </div>
@endif
<!-- -- -->
