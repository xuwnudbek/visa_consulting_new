@extends('layouts.client')


@section('content')
    {{-- Hero Section --}}
    @include('client.sections.hero')

    {{-- About Section --}}
    @include('client.sections.about')

    {{-- Services Section --}}
    @include('client.sections.services')

    {{-- Consultancy Section --}}
    @include('client.sections.consultancy')

    {{-- Intro Section --}}
    {{-- @include('client.sections.intro') --}}

    {{-- Clients Section --}}
    {{-- @include('client.sections.clients') --}}

    {{-- Support Section --}}
    {{-- @include('client.sections.support') --}}

    {{-- Why Choose Us Section --}}
    {{-- @include('client.sections.why_choose_us') --}}

    {{-- Customer Benefit Ticker Section --}}
    {{-- @include('client.sections.customer_benifit_ticker') --}}

    {{-- Testimonial Section --}}
    @include('client.sections.posts')

    {{-- Blog Section --}}
    {{-- @include('client.sections.blog') --}}
@endsection
