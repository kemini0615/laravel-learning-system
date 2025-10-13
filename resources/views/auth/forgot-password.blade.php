@extends('frontend.layouts.app')

@section('content')
    <!-- Forgot password -->
    <section class="wsus__sign_in">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{ asset('frontend/assets/images/login_img_1.jpg') }}" alt="forgot password" class="img-fluid">
                    {{-- <a href="#">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Mydemy" class="img-fluid">
                    </a> --}}
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <!-- Forgot password form -->
                    <div>
                        <!-- Session status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form action="{{ route('password.email') }}" method="POST" novalidate>
                            @csrf

                            <h2>Forgot Password<span>?</span></h2>
                            <p class="new_user">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                            <div class="row">
                                <!-- Email Address -->
                                <div class="col-xl-12">
                                    <div class="wsus__login_form_input">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="col-xl-12">
                                    <div class="wsus__login_form_input">
                                        <button type="submit" class="common_btn">Email Password Reset Link</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="create_account">Don't have an account? <a href="{{ route('register') }}">Create free account</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="back_btn" href="index.html">Back to Home</a>
    </section>
@endsection

