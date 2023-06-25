
    <div class="container-fluid m-0 p-0 h-100">
        <form method="POST" action="{{route('admin.login')}}">
            @csrf
            <link rel="stylesheet" href="{{ asset('css/login2.css') }}">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            
            
                    
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            
       
            
          
                <div class="body-bg w-100" >
            
                    
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6 mt-5 pt-5">
                                <div class="card p-5" style="background-color: rgba(255, 255, 255, 0.323) !important;">
                                    <div class="card-body pt-5">
                                        <h2 class=" mb-5 fs-bold" style="color: #000132; font-weight:800;">Admin Login</h2>
            
                                            @csrf
                                            <div class="row">
                                                <div class="form-group">
                                                    <input placeholder="Email" type="email" name="email" :value="old('email')"
                                                        required autofocus class="form-control bg-transparent mb- rounded-0">
                                                </div>
                                                <br><br><br>
            
                                                <div class="form-group">
                                                    <input placeholder="Password" type="password" name="password" required
                                                        autocomplete="current-password" class="form-control input bg-transparent mb-5 rounded-0">
                                                </div>
                                            </div>
                                            <br>
            
                                            <div class="text-center mb-5 mt-2">
                                                <button type="submit" class="btn text-white w-100 p-2">Login</button>
                                            </div>
                                        </form>
                                        
                                    
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            
            
        
        </form>
    </div>
   
  {{-- <div class="container-fluid">
                <div class="row mt-4 d-flex whole w-75 m-auto">
                    <div class="col-md-6 p-4 box">
                        <div class="login mt-4">LOGIN</div>
                        <div class="u-login">Login to continue to our application.</div>
                        <div class="email-out"><input type="email" name="email" class="input" placeholder="Email Address"></div>
                        <div class="password-out"><input type="password" name="password" class="input" placeholder="Password"></div>
                        <div class="fg">Forgot Passsword?</div>
                        <div class=""><button clas="btn w-100 login_btn mt-4">Login</button></div>
                    </div>
                    <div class="col-md-6 picbox">
                        <img src="https://img.freepik.com/free-vector/desktop-computer-vconcept-illustration_114360-12153.jpg?w=2000"
                            class="pic">
                    </div>
                </div>
            
    
            </div> --}}

            <!-- Email Address -->
            {{-- <div>
                <div class="email"><label for="">Email</label></div>
                <input type="email" name="email" id="email" class="form-control">
            </div>
         

            
            <!-- Password -->
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button class="btn btn-primary ml-3">{{ __('Log in') }}</button> --}}

