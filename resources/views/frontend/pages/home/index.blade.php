@extends('frontend.layouts.app')

@section('content')
    <!-- Banner -->
    @include('frontend.pages.home.sections.banner')


    <!-- Category -->
    @include('frontend.pages.home.sections.category')


    <!-- About -->
    @include('frontend.pages.home.sections.about')


    <!-- Courses -->
    @include('frontend.pages.home.sections.courses')


    <!-- Offer -->
    @include('frontend.pages.home.sections.offer')


    <!-- Become instructor -->
    @include('frontend.pages.home.sections.become-instructor')


    <!-- Video -->
    @include('frontend.pages.home.sections.video')


    <!-- Brand -->
    @include('frontend.pages.home.sections.brand')


    <!-- Quality courses -->
    @include('frontend.pages.home.sections.quality-courses')


    <!-- Testimonial -->
    @include('frontend.pages.home.sections.testimonial')


    <!-- Blog -->
    @include('frontend.pages.home.sections.blog')
@endsection
