@extends('frontend.layouts.app')

@section('content')
    <!-- Register -->
    <section class="wsus__sign_in sign_up">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{ asset('frontend/assets/images/login_img_2.jpg') }}" alt="login" class="img-fluid">
                    {{-- <a href="index.html">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Mydemy" class="img-fluid">
                    </a> --}}
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Student</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Instructor</button>
                        </li>
                    </ul>
                    <!-- Register form -->
                    <div class="tab-content" id="pills-tabContent">
                        <!-- Student -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form action="{{ route('register', ['type' => 'student']) }}" method="POST" novalidate>
                                @csrf

                                <h2>Sign Up<span>!</span></h2>
                                <p class="new_user">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Name</label>
                                            <input type="text" placeholder="Name" name="name"
                                                value="{{ old('name') }}" required>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Email address -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Email"
                                                value="{{ old('email') }}" required>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password"
                                                required>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Confirm password -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Confirm password</label>
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm password" required>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <button type="submit" class="common_btn">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Instructor -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <form action="{{ route('register', ['type' => 'instructor']) }}" method="POST" novalidate>
                                @csrf

                                <h2>Sign Up<span>!</span></h2>
                                <p class="new_user">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Name</label>
                                            <input type="text" placeholder="Name" name="name"
                                                value="{{ old('name') }}" required>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Email address -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Email"
                                                value="{{ old('email') }}" required>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password"
                                                required>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Confirm password -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Confirm password</label>
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm password" required>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Attachment -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Attachment (Certificate)</label>
                                            <input type="file" name="attachment" placeholder="Attachment" required>
                                            <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <button type="submit" class="common_btn">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back_btn" href="index.html">Back to Home</a>
    </section>
@endsection
