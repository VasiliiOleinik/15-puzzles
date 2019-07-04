<!-- USER PERSONAL DATA -->

<div class="col-lg-4 col-sm-6 col-12" style="left:5px;">

    <!-- nickname -->
    <div class="form-group row mr-1">
        <input id="nickname" type="text" placeholder="Nickname" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{Auth::user()->nickname}}" autocomplete="nickname" autofocus>

        @error('nickname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!- - ->

    <!-- first name -->
    <div class="form-group row mr-1">
        <input id="first_name" type="text" placeholder="Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{Auth::user()->first_name}}" autocomplete="first_name" autofocus>

        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!- - ->

    <!-- middle name -->
    <div class="form-group row mr-1">
        <input id="middle_name" type="text" placeholder="Middle name" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{Auth::user()->middle_name}}" autocomplete="middle_name" autofocus>

        @error('middle_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!- - ->

    <!-- password -->
    <!--
    <div class="form-group row mr-1">
        <input id="password" type="text" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{Auth::user()->password}}" autocomplete="password" autofocus>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!- - ->
    -->
</div>
<div class="col-lg-4 col-sm-6 col-12" style="left:5px;">
        <!-- email -->
    <div class="form-group row mr-1">
        <input id="email" type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!- - ->

    <!-- last name -->
    <div class="form-group row mr-1">
        <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}" autocomplete="last_name" autofocus>

        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!- - ->

    <!-- birthday -->
    <div class="form-group row mr-1">
                                    
        <div class="input-group date">
            <input type="text" class="form-control birthday" id="birthday" name="birthday" value="{{Auth::user()->birthday}}" placeholder="dd.mm.yyyy">
        </div>

        @error('birthday')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!- - ->           
</div>
           
