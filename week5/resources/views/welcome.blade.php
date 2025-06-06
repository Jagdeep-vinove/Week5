@extends('layout')
@section('about')
    @section('title','ABOUT PAGE')
    @if (!session()->has('user'))
    <div class="auth-overlay">
        <div class="auth-message">
            <i class="fas fa-lock"></i>
            <h2>Access Required</h2>
            <p>Please login to view this page</p>
            <a href="/signin" class="auth-button">Login Now</a>
        </div>
    </div>
    @else
    <div class="main-container">
        <div class="alert-box">
            @if($errors->any())
                <span class="alerts alerts-error">{{ $errors->first() }}</span>
            @else
                <span class="alerts">Welcome to Vinove {{session()->get('user')}}</span>
            @endif
        </div>
        <div class="about-container">
            <div class="about-header">
                <h1>About Us</h1>
            </div>
            <div class="about-content">
                <div class="welcome-card">
                    <h2>Welcome to Our Platform</h2>
                    <p>We're glad to have you here as a valued member of our community.</p>
                </div>
                <div class="feature-grid">
                    <div class="feature-card">
                        <h3>Our Mission</h3>
                        <p>To provide the best experience for our users through innovative solutions.</p>
                    </div>
                    <div class="feature-card">
                        <h3>Our Vision</h3>
                        <p>Creating a platform that empowers users to achieve their goals.</p>
                    </div>
                    <div class="feature-card">
                        <h3>Our Values</h3>
                        <p>Trust, Innovation, and User-First approach in everything we do.</p>
                    </div>
                </div>
            </div>
            <a href="{{ url('/logout') }}" class="logout-btn">Logout</a>
        </div>
    </div>
    @endif
@endsection