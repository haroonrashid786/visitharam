@extends('weblayouts.app')
@section('title')
    {{ "Get to Know the UK's Trusted Umrah Specialists - Visit Haram"}}
@endsection
@section('content')

    <header class="w-full bg-[#F5F2E3]">
        <div class="container mx-auto px-5 md:px-10 xl:px-24 sm:py-0 py-10 h-[250px] xl:h-[300px] flex justify-center items-center">
            <h2 class="text-4xl md:text-5xl xl:text-6xl font-bold text-[#110928]">About Us</h2>
        </div>
    </header>





    @include('weblayouts.about')
    @include('weblayouts.partner_hotels')
    @include('weblayouts.partner')
    @include('weblayouts.newsletter')

@endsection
