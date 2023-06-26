<div class="container-fluid whole">
    <link rel="stylesheet" href="{{ asset('css/stu_login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <form method="POST" action="{{ route('student.login') }}">
       
        @csrf
        <div class="main mx-auto mt-5 ">
            
               <div class="box pt-5 pb-5 m-5">
                <h2 class="head text-center mb-5">Login</h2>
                <input name="email" type="email" class="input form-control mb-4 mt-2 bg-transparent" placeholder="Email">
                <input name="password" type="password" class="input form-control mb-4 bg-transparent" placeholder="Password">
                <button type="submit" class="btn log-btn mb-4 mt-4 w-100">{{ __('Log in') }}</button>
            

               </div>
            
        </div>
    </form>
</div>


{{-- <form action="{{route('student.login')}}" method="post">
@csrf
<input type="email" name="email" id="email">
</form> --}}
