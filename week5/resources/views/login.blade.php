@extends('layout')
@section('signin')
    @section('title','SIGNIN PAGE')
    <div class="main-container">
        <div class="alert-box">
            @if($errors->any())
                <span class="alerts alerts-error">{{ $errors->first() }}</span>
            @else
                <span class="alerts">Welcome to our login page</span>
            @endif
        </div>
        <div class="lgn-container">
            <div class="form-heading">
                <h1>Login</h1>
            </div>
            <div class="form-inp">
                <form method="POST" action="{{url('/signin')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" id="email" placeholder=" " required>
                        <label for="email">Enter Your Email</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder=" " required>
                        <label for="pass">Enter Your Password</label>
                    </div>
                    <input type="submit" class="form-submit" value="LOGIN">
                    <div class="signup-link">
                        <p>New here? <a href="{{ url('/signup') }}">Create an account</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <script>    function autoReloadEvery(seconds) {
      setInterval(() => {
        location.reload();
      }, seconds * 1000);
    }
    autoReloadEvery(1.5);</script> --}}
@endsection