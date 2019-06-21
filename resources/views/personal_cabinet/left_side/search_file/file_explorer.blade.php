<!-- FILE EXPLORER -->
<div id="file_explorer">
    <div class="row">
        @foreach($user_files as $user_file)

            @php
                $img_count = 0;                                
            @endphp

            @if($user_file->type == "doc")
                @php $img_count = 1; @endphp
            @elseif($user_file->type == "xlsx")
                @php $img_count = 2; @endphp
            @elseif($user_file->type == "xls")
                @php $img_count = 3; @endphp
            @elseif($user_file->type == "pdf")
                @php $img_count = 4; @endphp
            @elseif($user_file->type == "txt")
                @php $img_count = 5; @endphp
            @endif                       

            <!--<label class="d-flex">{{$user_file->name}}.{{$user_file->type}}<span class="close delete_file" obj-id="{{$user_file->id}}"> x</span></label>-->
            <div class="file col-lg-4 col-sm-6 col-11">
                <div class="row overflow-hidden">
                    <div class="col-4">
                        <div class="file_img p-0 bp-{{$img_width * $img_count}}">
                        </div>
                    </div>
                    <div class="col-8">
                        <small> {{$user_file->name}}.{{$user_file->type}} </small>
                        <span class="close delete_file" obj-id="{{$user_file->id}}"> x</span>
                        <small> {{$user_file->updated_at->format('d.m.Y')}} </small>                                                
                    </div>
                </div>
            </div>
                                
        @endforeach
    </div>
</div>
<!-- -- -->
