                  <div class="profile-labels">
                     <!-- nickname -->                    
                     <input id="img" type="hidden" name="img">                 
                    <!- - ->
                    <!-- nickname -->
                    <div class="label">
                      <!--
                      <input name="nickname" type="text">
                      <label for="nickname">Nickname</label>
                      -->
                      <input id="nickname" type="text" placeholder="Nickname" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{Auth::user()->nickname}}" required autocomplete="nickname" autofocus>
                      @error('nickname')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- email -->
                    <div class="label required">
                      <!--
                      <input name="email" type="text">
                      <label for="email">Email<span>*</span></label>
                      -->
                      <input id="email" type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" autofocus>
                      @error('email')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- first name -->
                    <div class="label required">
                      <!--
                      <input name="name" type="text">
                      <label for="name">Name<span>*</span></label>
                      -->
                      <input id="first_name" type="text" placeholder="Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{Auth::user()->first_name}}" autocomplete="first_name" autofocus>
                      @error('first_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- last name -->
                    <div class="label required">
                      <!--
                      <input name="last_name" type="text">
                      <label for="last_name">Last Name<span>*</span></label>
                      -->
                      <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}" autocomplete="last_name" autofocus>
                      @error('last_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- middle name -->
                    <div class="label required">
                      <!--
                      <input name="middle_name" type="text">
                      <label for="middle_name">Middle Name<span>*</span></label>
                      -->
                      <input id="middle_name" type="text" placeholder="Middle name" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{Auth::user()->middle_name}}" autocomplete="middle_name" autofocus>
                      @error('middle_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- birthday -->
                    <div class="label required">
                      <!--
                      <input class="date-inp" id="personal-dob" name="dob" type="text">
                      <label for="dob">Date Of Birth<span>*</span></label>
                      -->
                      <input class="date-inp" id="birthday" name="birthday" value="{{Auth::user()->birthday}}" placeholder="dd.mm.yyyy" type="text">         
                      @error('birthday')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- password -->                    
                    <div class="label">
                      <input id="password" type="text" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" autofocus>
                      @error('password')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                      <!--
                      <input name="password" type="password">
                      <label for="nickname">Password</label>
                      -->
                    </div>                                       
                    <!- - ->
                    <div class="message">
                      <p><span>*</span>Non-public information for administration only</p>
                    </div>
                  </div>
