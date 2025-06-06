@extends('layout')
@section('signup')
    @section('title','SIGNUP PAGE')
    <div class="main-container">
        <div class="alert-box">
            @if($errors->any())
                <span class="alerts alerts-error">{{ $errors->first() }}</span>
            @else
                <span class="alerts">Welcome, please Signup to proceed</span>
            @endif
        </div>
        <div class="lgn-container">
            <div class="form-heading">
                <h1>Sign Up</h1>
            </div>
            <div class="form-inp">
                <form method="POST" action="{{ route('signup') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder=" " required>
                        <label for="name">Enter Your Name</label>
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder=" " required>
                        <label for="email">Enter Your Email</label>
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder=" " required>
                        <label for="password">Create Password</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" id="confirm_password" placeholder=" " required>
                        <label for="confirm_password">Confirm Password</label>
                    </div>
                    <input type="submit" class="form-submit" value="SIGN UP">
                    <div class="login-link">
                        <p>Already have an account? <a href="{{ url('/signin') }}">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection