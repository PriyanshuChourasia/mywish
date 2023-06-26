
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

