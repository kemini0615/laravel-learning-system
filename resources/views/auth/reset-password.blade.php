@extends('frontend.layouts.app')

@section('content')
    <!-- Reset password -->
    <section class="wsus__sign_in">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{ asset('frontend/assets/images/login_img_2.jpg') }}" alt="reset password" class="img-fluid">
                    {{-- <a href="#">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Mydemy" class="img-fluid">
                    </a> --}}
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <!-- Reset password form -->
                    <div>
                        <!-- Session status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form action="{{ route('password.store') }}" method="POST" novalidate>
                            @csrf

                            <!-- Password reset token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <h2>Reset Password<span>!</span></h2>
                            <div class="row">
                                <!-- Email Address -->
                                <div class="col-xl-12">
                                    <div class="wsus__login_form_input">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" value="{{ old('email', $request->email) }}" placeholder="Email" required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-xl-12">
                                    <div class="wsus__login_form_input">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" placeholder="Password" required />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Confirm password -->
                                <div class="col-xl-12">
                                    <div class="wsus__login_form_input">
                                        <label for="password_confirmation">Confirm password</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirm password" required />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="col-xl-12">
                                    <div class="wsus__login_form_input">
                                        <button type="submit" class="common_btn">Reset Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a class="back_btn" href="index.html">Back to Home</a>
    </section>
@endsection
