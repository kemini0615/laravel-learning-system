@extends('frontend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Become Instructor</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Become Instructor</li>
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
                @include('frontend.student.layouts.sidebar')

                <div class="col-xl-9 col-md-8">
                    <div class="text-end">
                        <a href="{{ route('student.dashboard') }}" class="common_btn">Back</a>
                    </div>
                    <div class="card mt-4">

                        <div class="card-header">
                            Become an Instructor
                        </div>
                        <div class="card-body">
                            <form action="{{ route('student.become-instructor.update', auth()->user()->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="from-group">
                                    <label for="attachment">Attachment</label>
                                    <input type="file" name="attachment" id="attachment">
                                    <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                                </div>
                                <div class="from-group mt-3">
                                    <button type="submit" class="common_btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
