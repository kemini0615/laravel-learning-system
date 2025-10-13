@extends('frontend.layouts.app')

@section('content')
    <!-- Sign in -->
    <section class="wsus__sign_in">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{ asset('frontend/assets/images/login_img_1.jpg') }}" alt="login" class="img-fluid">
                    {{-- <a href="#">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Mydemy" class="img-fluid">
                    </a> --}}
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <div class="tab-content" id="pills-tabContent">
                        <!-- Login form -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form action="{{ route('login') }}" method="POST" novalidate>
                                @csrf

                                <h2>Sign In<span>!</span></h2>
                                <div class="row">
                                    <!-- Email Address -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label for="email">Email</label>
                                            <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label for="password">Password <a href="{{ route('password.request') }}">Forgot Password?</a></label>
                                            <input type="password" name="password" placeholder="Password" required />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Remember me -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <div class="form-check">
                                                <label class="form-check-label" for="remember_me">
                                                    <input type="checkbox" id="remember_me" class="form-check-input" />
                                                    Remember Me
                                                </label>
                                            </div>
                                            <button type="submit" class="common_btn">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="create_account">Don't have an account? <a href="{{ route('register') }}">Create free account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back_btn" href="index.html">Back to Home</a>
    </section>
@endsection
