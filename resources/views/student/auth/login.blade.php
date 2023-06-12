<div class="container-fluid whole">
    <form method="POST" action="{{ route('student.login') }}">
        <link rel="stylesheet" href="{{ asset('css/stu_login.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        @csrf
        <div class="row main mx-auto w-75 mt-5  d-flex">
            <div class="box-1 col-md-6
            ">
                <img src="/images/vector-stu.png" class="vec-img w-100 p-0 " alt="">
            </div>
            <div class="box-2 col-md-6  p-5">
                <img src="/images/wishlogo.png" class="headerLogo mx-auto w-50 d-flex justify-content-center">
                <div class="row">
                    <h2 class="head text-center">Login</h2>
                    <input name="user_name" type="email" class="input form-control mb-4 mt-2 bg-transparent" placeholder="Email">
                    <input name="password" type="text" class="input form-control mb-4 bg-transparent" placeholder="Password">
                    <button class="btn log-btn mb-4 mt-4">{{ __('Log in') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
