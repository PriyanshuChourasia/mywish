
    <div class="container">
        <form method="POST" action="{{route('admin.login')}}">
            @csrf
            <link rel="stylesheet" href="{{ asset('css/login2.css') }}">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            <div class="container-fluid">
                <div class="row mt-4 d-flex whole w-75 m-auto">
                    <div class="col-md-6 p-4 box">
                        <div class="login mt-4">LOGIN</div>
                        <div class="u-login">Login to continue to our application.</div>
                        <div class="email-out"><input type="email" name="email" class="input" placeholder="Email Address"></div>
                        <div class="password-out"><input type="password" name="password" class="input" placeholder="Password"></div>
                        <div class="fg">Forgot Passsword?</div>
                        <div class=""><button class="btn w-100 login_btn mt-4">Login</button></div>
                    </div>
                    <div class="col-md-6 picbox">
                        <img src="https://img.freepik.com/free-vector/desktop-computer-vconcept-illustration_114360-12153.jpg?w=2000"
                            class="pic">
                    </div>
                </div>
            
    
            </div>

        
        </form>
    </div>
   
  

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

