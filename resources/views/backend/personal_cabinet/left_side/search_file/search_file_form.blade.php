<form method="get" action="{{ route('file.personal_cabinet.index') }}" enctype="multipart/form-data">                          
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <input id="search_file_name" type="text" placeholder="Search by name" class="form-control" name="search_file_name" value="{{$search_file['name']}}" autofocus>
        </div>
        <div class="col-lg-4 col-sm-6">

                <div class="input-group date">
                    <input type="text" class="form-control search_file_date" id="search_file_date_from" name="search_file_date_from" value="{{$search_file['date_from']}}" placeholder="dd.mm.yyyy">
                </div>

        </div>
        <div class="col-lg-4 col-sm-6">

                <div class="input-group date">
                    <input type="text" class="form-control search_file_date" id="search_file_date_to" name="search_file_date_to" value="{{$search_file['date_to']}}" placeholder="dd.mm.yyyy">
                </div>

        </div>                                                            
    </div>
       
    <!-- search file button -->
    <button type="submit" class="btn btn-medicine mt-2 mb-4">
        search
    </button>
    <!- - ->    
</form>
