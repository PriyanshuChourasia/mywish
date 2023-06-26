<<<<<<< HEAD

    <div class="container">
        <form method="POST" action="{{ route('student.login') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <label for="">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
    
            <!-- Password -->
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
                <button class="btn btn-primary ml-3">{{ __('Log in') }}</button>
            </div>
        </form>
    </div>

=======
<div class="container-fluid whole">
    <form method="POST" action="{{ route('student.login') }}">
        <link rel="stylesheet" href="{{ asset('css/stu_login.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        @csrf
        <div class="main mx-auto mt-5 ">
            
               <div class="box pt-5 pb-5 m-5">
                <h2 class="head text-center mb-5">Login</h2>
                <input name="user_name" type="email" class="input form-control mb-4 mt-2 bg-transparent" placeholder="Email">
                <input name="password" type="text" class="input form-control mb-4 bg-transparent" placeholder="Password">
                <button class="btn log-btn mb-4 mt-4 w-100">{{ __('Log in') }}</button>
            

               </div>
            
        </div>
    </form>
</div>
>>>>>>> 06d49589fb106751e2e89c53ddbcb849e0c23524
