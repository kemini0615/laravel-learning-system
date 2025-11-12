@extends('frontend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Instructor Dashboard</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Instructor Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Dashboard -->
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                @include('frontend.instructor.layouts.sidebar')

                <!-- Profile -->
                <div class="col-xl-9 col-md-8 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                    <!-- Profile -->
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your Information</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                            </div>
                        </div>
                        <form action="{{ route('instructor.profile.update') }}" method="POST"
                            class="wsus__dashboard_profile_update" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="wsus__dashboard_profile wsus__dashboard_profile_avatar">
                                <div class="img">
                                    <img src="{{ asset(auth()->user()->image) }}" alt="profile" class="img-fluid w-100">
                                    <label for="profile_photo">
                                        <img src="{{ asset('frontend/assets/images/dash_camera.png') }}" alt="camera"
                                            class="img-fluid w-100">
                                    </label>
                                    <input type="file" id="profile_photo" name="avatar" hidden>
                                </div>
                                <div class="text">
                                    <h6>Your avatar</h6>
                                    <p>PNG or JPG no bigger than 400px wide and tall.</p>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Name -->
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ auth()->user()->name }}"
                                            placeholder="Enter your name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Headline -->
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Headline</label>
                                        <input type="text" name="headline" value="{{ auth()->user()->headline }}"
                                            placeholder="Enter your headline">
                                        <x-input-error :messages="$errors->get('headline')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ auth()->user()->email }}""
                                            placeholder="Enter your email">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            {{-- <option value="0" disabled>Select</option> --}}
                                            <option @selected(auth()->user()->gender === 'male') value="male">Male</option>
                                            <option @selected(auth()->user()->gender === 'female') value="female">Female</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- About me -->
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>About Me</label>
                                        <textarea rows="7" name="about" placeholder="Your text here">{{ auth()->user()->bio }}</textarea>
                                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Password -->
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your Credentials</h5>
                                <p>Update your email and password.</p>
                            </div>
                        </div>

                        <form action="{{ route('instructor.profile.update.password') }}" method="POST"
                            class="wsus__dashboard_profile_update">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Email -->
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ auth()->user()->email }}"
                                            placeholder="Enter your email">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Current Password</label>
                                        <input type="password" name="current_password"
                                            placeholder="Enter your current password">
                                        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>New Password</label>
                                        <input type="password" name="password" placeholder="Enter your new password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Confirm password -->
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation"
                                            placeholder="Enter your new password">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- SNS links -->
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your SNS</h5>
                                <p>Manage your SNS links.</p>
                            </div>
                        </div>

                        <form action="{{ route('instructor.profile.update.sns') }}" method="POST"
                            class="wsus__dashboard_profile_update">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Facebook -->
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" value="{{ auth()->user()->facebook }}"
                                            placeholder="Enter your Facebook URL">
                                        <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- X -->
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>X</label>
                                        <input type="text" name="x" value="{{ auth()->user()->x }}"
                                            placeholder="Enter your X URL">
                                        <x-input-error :messages="$errors->get('x')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Linkedin -->
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Linkedin</label>
                                        <input type="text" name="linkedin" value="{{ auth()->user()->linkedin }}"
                                            placeholder="Enter your Linkedin URL">
                                        <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Github -->
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Github</label>
                                        <input type="text" name="github" value="{{ auth()->user()->github }}"
                                            placeholder="Enter your github URL">
                                        <x-input-error :messages="$errors->get('github')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Personal website -->
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Personal website</label>
                                        <input type="text" name="website" value="{{ auth()->user()->website }}"
                                            placeholder="Enter your website URL">
                                        <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update SNS</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
