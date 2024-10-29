@extends('weblayouts.app')
@section('title')
    {{ "Tailored & Budget Friendly Umrah Solutions for UK - Visit Haram" }}
@endsection
@section('content')

<header class="w-full" style="background: url('{{ asset('assets/img/header/header.png') }}')
 no-repeat center/cover;">
    <div class="flex justify-center items-center py-24 xl:pt-10 xl:pb-24 2xl:pb-28">
        <div class="flex flex-col items-center gap-5">
            <div class="py-4 px-8 font-semibold text-2xl" style="background: url('{{ asset('assets/img/header/bg.png') }}') no-repeat center/contain;">
                7 Nights
            </div>
            <h2 class="text-5xl md:text-7xl font-bold text-[#110928]">Umrah Package</h2>
            <div class="flex items-center gap-2 pt-5 sm:pt-0">
                <div class="py-2 px-7 md:text-xl flex justify-center items-center text-center relative">
                    <img class="absolute" src="{{ asset("assets/img/header/bg_1.png") }}" alt="bg">
                    <p>Return Flight<br>
                        04 Nights Makkah</p>
                </div>
                <div class="py-2 px-7 md:text-xl flex justify-center items-center text-center relative">
                    <img class="absolute" src="{{ asset("assets/img/header/bg_1.png") }}" alt="bg">
                    <p> Visa Included <br>
                        03 nights Madinah</p>
                </div>
            </div>
            <div class="flex items-center gap-4 md:pt-0 pt-5">
                <div class="h-32 w-32 md:w-36 md:h-36 text-sm text-white bg-[#09B175] rounded-full outline-white outline-none -outline-offset-8 flex flex-col items-center justify-center">
                    <p>Starting from</p>
                    <p class="font-bold text-lg md:text-3xl">£1275</p>
                </div>
                <div id="qoute" class="flex flex-col gap-2 text-center">
                    <img class="object-cover" src="{{ asset('assets/img/partner/partner.png') }}" alt="partner">
                    <hr class="bg-black border-black">
                    <a href="#" class="text-xl font-semibold">0203 925 8000</a>
                </div>
            </div>
        </div>

    </div>
</header>

<section>
    <div class="container mx-auto px-5 lg:px-10 xl:px-24 py-8 z-50 ">

        <div class=" shadow-[0px_4px_50px_0px_#00000033] rounded-xl xl:rounded-[20px]">
            <div class="xl:h-[60px] py-3 xl:py-0 bg-[#E1C844] rounded-t-xl xl:rounded-t-[20px] px-5 lg:px-8 flex items-center">
                <p class="text-2xl font-semibold">Get Custom Quote</p>
            </div>
@include('weblayouts.quoteform')

        </div>
    </div>

{{--    <div class="container mx-auto px-5 sm:px-10 xl:px-24 py-2">--}}
{{--        <h2 class="text-[#110928] font-bold text-3xl text-center">Trusted Hajj and Umrah Travel Agency in the UK</h2>--}}
{{--        <div class="md:px-5 xl:px-20 grid grid-cols-2 place-items-center md:flex items-center justify-between flex-wrap md:flex-nowrap md:gap-5 xl:gap-10 py-16">--}}
{{--            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust1.png') }}" alt="trust1">--}}
{{--            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust2.png') }}" alt="trust2">--}}
{{--            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust3.png') }}" alt="trust3">--}}
{{--            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust4.png') }}" alt="trust4">--}}
{{--        </div>--}}
{{--    </div>--}}
</section>





<section class="container mx-auto px-5 md:px-10 xl:px-24 pb-5 space-y-5" >
    <div class="flex flex-col gap-14 sm:gap-0 sm:flex-row items-center justify-center sm:justify-between pb-5">
        <h4 class="text-center sm:text-left text-2xl md:text-3xl font-semibold text-[#110928]">All Umrah Packages</h4>
        <div class="flex items-center gap-3">
            <button class="custom-swiper-button-prev w-[40px] h-[40px] md:h-[50px] md:w-[50px] flex justify-center items-center rounded-full border-2 bg-[#E1C845] text-xl font-semibold" >
                <svg class="!w-[24px] !h-[24px] fill-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"></path>
                </svg>
            </button>
            <button class="custom-swiper-button-next w-[40px] h-[40px] md:h-[50px] md:w-[50px] flex justify-center items-center rounded-full border-2 bg-[#E1C845] text-xl font-semibold" >
                <svg class="!w-[24px] !h-[24px] fill-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="swiper umrahPackageSwiper11 px-2">
        <div class="swiper-wrapper flex pb-20">
            @foreach($packages as $package)
{{--                @if ($package->star == 5)--}}
                    <div class="swiper-slide rounded-xl overflow-hidden w-full shadow-xl">
                        @php
                            $firstMedia = $package->media->first();
                        @endphp
                        <div class="w-full h-64 relative">
                            <div class="bg-cover bg-no-repeat bg-center h-full w-full z-30 relative background__dynamic__image hidden"
                                style="background-image: url('{{ $firstMedia ? asset($firstMedia->file) : asset('https://www.makkahtour.co.uk/images/team-cta-bg.jpg') }}');">
                            </div>
                            <div class="h-full w-full animate-pulse absolute inset-0 z-50 bg__image__shimmer">
                                <div class="h-full w-full bg-gray-500"></div>
                            </div>
                        </div>
                        <div class="p-3">
                            <div class="flex items-center">
                                    <div class="flex-1">
                                        <h5 class="font-medium leading-6 text-lg line-clamp-1">{{$package->name}}</h5>
                                        <!-- <p class="text-sm">Price: <span class="text-[#09B175] font-semibold"> From 2000</span></p> -->
                                    </div>
                                    <div class="py-4 px-4 font-semibold flex items-center justify-center text-sm w-48 relative">
                                        <svg class="absolute z-0 right-0 w-48 h-auto" width="220" height="50" viewBox="0 0 201 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M32.3176 0.0440421L58.1716 0.0440615L168.682 0.0440421C171.465 -0.222409 177.552 0.594706 179.635 5.99478C183.614 5.96518 192.095 8.89023 194.177 20.8272C194.58 23.1365 196.835 25.9786 201 27.0444C196.835 28.1102 194.58 30.8635 194.177 33.1728C192.095 45.1098 183.614 48.0348 179.635 48.0052C177.552 53.4053 171.465 54.2224 168.682 53.956H58.8H32.3176C29.5347 54.2224 23.4482 53.4053 21.3655 48.0052C17.3856 48.0348 8.90528 45.1098 6.82259 33.1728C6.41969 30.8635 4.16537 28.1102 0 27.0444C4.16537 25.9786 6.41969 23.1365 6.82259 20.8272C8.90528 8.89023 17.3856 5.96518 21.3655 5.99478C23.4482 0.594706 29.5347 -0.222409 32.3176 0.0440421Z" fill="#E1C844"/>
                                        </svg>
                                        <div class="flex items-center justify-center gap-1 divide-x divide-black relative z-20">
                                            <span class="text-sm font-semibold relative z-20"></span>{{$package->price}}<span class="text-sm pl-1 relative z-20">{{$package->nights}} Nights</span>
                                        </div>
                                    </div>
                                </div>
                            <div class="flex gap-6 border-b border-[#D2D2D2] py-5 pb-6">
                                @if ($package->service && $package->service->isNotEmpty())
                                    @foreach ($package->service as $service)
                                        <div class="flex-1 flex flex-col items-center gap-2 p-3 rounded-lg bg-[#f5f5f5]" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                            <img class="rounded-full size-16 object-cover" src="{{ asset('service_images/madina.png') }}" alt="card1">
                                            <div class="text-center">
                                                <h6 class="font-semibold line-clamp-1">{{ $service->name }}</h6>
                                                <p class="text-xs font-medium line-clamp-1">
                                                    {{ $service->hotel ? $service->hotel->name : '...' }}
                                                </p>

                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex-1 flex flex-col items-center gap-2 p-3 rounded-lg bg-[#f5f5f5]" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                        <img class="rounded-full size-16 object-cover" src="{{ asset('service_images/madina.png') }}" alt="card1">
                                        <div class="text-center">
                                            <h6 class="font-semibold line-clamp-1">10 nights in Makkah</h6>
                                            <p class="text-xs font-medium line-clamp-1">Makkah Hotel</p>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="grid grid-cols-4  gap-4 py-3 text-sm border-b border-[#D2D2D2]">
                                @php
                                    $facilitiesToShow = $package->facility->where('status', 1)->take(4); // Filter and limit to 4
                                @endphp

                                @if ($facilitiesToShow->isNotEmpty())
                                    @foreach ($facilitiesToShow as $facility)
                                        <div class="flex flex-col items-center gap-2">
                                            <img src="{{ asset('facility_images/' . $facility->name . '.svg') }}" class="max-w-8 object-contain" alt="facility">
                                            <p class="text-xs">{{ $facility->name }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex flex-col items-center gap-2">
                                        <img src="{{ asset('facility_images/Visa.svg') }}" class="max-w-8 object-contain" alt="static facility">
                                        <p class="text-xs">Visa</p> <!-- Replace with the desired static name -->
                                    </div>
                                @endif


                            </div>
                            <div class="flex items-center justify-between gap-2 pt-3 pb-1">

                               <a href="https://wa.me/02039258000"> <div class="font-semibold text-[14px] flex items-center gap-1 cursor-pointer animate-blink-zoom animate-pulse">
                                    <img class="size-8 sm:size-10" src="{{ asset('assets/img/whatsapp.svg') }}" alt="whatsapp">
                                    02039258000
                                </div></a>
                                <a href="{{ route('packages.showDetails', str_replace(' ', '-', $package->name)) }}" class="bg-[#110928] px-6 md:px-8 py-3 xl:py-4 text-white cursor-pointer font-semibold text-sm rounded-full">View Details</a>
                            </div>
                        </div>
                    </div>
{{--                @endif--}}
            @endforeach
        </div>
        <div class="swiper-pagination swiper-pagination1"></div>
    </div>

    <div class="pt-4 grid lg:grid-cols-2 gap-10">
            <div class="text-white py-5 sm:py-8 px-5 md:px-10 rounded-xl md:rounded-[20px] flex flex-col sm:flex-row items-center justify-between gap-10 !bg-contain" style="background: linear-gradient(rgba(24, 192, 132,0.7),rgba(24, 192, 132,0.4)), url('{{ URL('assets/img/details/qoute_bg.png') }}');">
                <div class="h-full flex flex-col items-center sm:items-start sm:text-left text-center justify-between gap-3">
                    <div class="space-y-3">
                        <p class="text-xl">Up to 15%</p>
                        <h6 class="font-bold text-2xl">Better Rates Than Market</h6>
                    </div>

                    <a href="/#qoute" class="w-fit px-8 py-3 bg-[#110928] rounded-full">Get Quote</a>
                </div>
                <div>
                    <img class="md:scale-125" src="{{ URL('assets/img/details/qoute.png') }}" alt="qoute">
                </div>
            </div>
            <div class="text-[#110928] py-5 md:py-8 px-5 md:px-10 rounded-xl md:rounded-[20px] flex flex-col sm:flex-row items-center justify-between gap-10 !bg-contain" style="background: linear-gradient(rgba(225, 200, 68, .6),rgba(225, 200, 68, .4)), url('{{ URL('assets/img/details/call_bg.png') }}');">
                <div class="h-full flex flex-col items-center sm:items-start sm:text-left text-center justify-between gap-3">
                    <div class="space-y-3">
                        <p class="text-xl">Got Stuck While <br class="md:block hidden">
                            Devising Your Package?</p>
                        <h6 class="font-bold text-2xl">Get Experts Assistance</h6>
                    </div>
                    <a href="/contact" class="text-white w-fit px-8 py-3 bg-[#110928] rounded-full">Call us now</a>
                </div>
                <div>
                    <img class="md:scale-125" src="{{ URL('assets/img/details/call.png') }}" alt="qoute">
                </div>
            </div>
        </div>

</section>



<section>
    <div class="container mx-auto px-5 lg:px-10 xl:px-24">
        <div class="flex justify-center max-w-[800px] overflow-hidden mx-auto">
            <div class="flex w-full umrah__packages__custom__scroll overflow-x-auto overflow-y-hidden whitespace-nowrap items-center gap-3 sm:gap-5 text-[#110928]  {{ count($subcategories) > 3 ? '' : 'justify-center' }}">
                @foreach ($subcategories as $index => $subcategory)
                    <button id="link{{ $index + 1 }}" onclick="showSection({{ $index + 1 }})" class="relative group menu-link {{ $index == 0 ? 'activeLink' : '' }}">{{ $subcategory->name }}<span class="absolute bottom-[-5px] left-0 w-0 h-[3px] bg-[#E1C844] transition-all origin-left"></span></button>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col gap-14 sm:gap-0 sm:flex-row items-center justify-center sm:justify-between py-5">
            <h4 class="text-center sm:text-left text-2xl md:text-3xl font-semibold text-[#110928]">Monthly Umrah Packages</h4>
            <div class="flex items-center gap-3">
                <button class="custom-swiper-button-prev-umrah-category w-[40px] h-[40px] md:h-[50px] md:w-[50px] flex justify-center items-center rounded-full border-2 bg-[#E1C845] text-xl font-semibold" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-b1cb18fcf9ffc78b">
                    <svg class="!w-[24px] !h-[24px] fill-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"></path>
                    </svg>
                </button>
                <button class="custom-swiper-button-next-umrah-category w-[40px] h-[40px] md:h-[50px] md:w-[50px] flex justify-center items-center rounded-full border-2 bg-[#E1C845] text-xl font-semibold" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-b1cb18fcf9ffc78b">
                    <svg class="!w-[24px] !h-[24px] fill-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                    </svg>
                </button>
            </div>
        </div>
        @foreach ($subcategories as $index => $subcategory)
        <div id="menu{{ $index + 1 }}" class="{{ $index == 0 ? '' : 'hidden' }}">
        <div class="swiper umrah__category__package__Swiper px-2 swiper-initialized swiper-horizontal">
            <div class="swiper-wrapper flex pb-10">
                        @php $counter = 0; @endphp
                        @if ($subcategory->packages->where('active', 1)->isEmpty())
                        <p class="text-center mx-auto text-lg font-semibold text-gray-600 p-4 rounded-lg">
                No Packages found.
</p>

@else
                        @foreach ($subcategory->packages->where('active', 1) as $package)
                        @php
                            $firstMedia = $package->media->first();
                        @endphp
                            <div class="swiper-slide rounded-xl overflow-hidden w-full shadow-xl">
                                <div class="w-full h-64 relative">
                                    <div class="bg-cover bg-no-repeat bg-center h-full w-full z-30 relative background__dynamic__image hidden" style="background-image: url('{{ $firstMedia ? asset($firstMedia->file) : asset('https://www.makkahtour.co.uk/images/team-cta-bg.jpg') }}');"></div>
                                    <div class="h-full w-full animate-pulse absolute inset-0 z-50 bg__image__shimmer">
                                        <div class="h-full w-full bg-gray-500"></div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="flex items-center">
                                        <div class="flex-1">
                                            <h5 class="font-medium leading-6 text-lg line-clamp-1">{{$package->name}}</h5>
                                            <!-- <p class="text-sm">Price: <span class="text-[#09B175] font-semibold"> From 2000</span></p> -->
                                        </div>
                                        <div class="py-4 px-4 font-semibold flex items-center justify-center text-sm w-48 relative">
                                            <svg class="absolute z-0 right-0 w-48 h-auto" width="220" height="50" viewBox="0 0 201 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M32.3176 0.0440421L58.1716 0.0440615L168.682 0.0440421C171.465 -0.222409 177.552 0.594706 179.635 5.99478C183.614 5.96518 192.095 8.89023 194.177 20.8272C194.58 23.1365 196.835 25.9786 201 27.0444C196.835 28.1102 194.58 30.8635 194.177 33.1728C192.095 45.1098 183.614 48.0348 179.635 48.0052C177.552 53.4053 171.465 54.2224 168.682 53.956H58.8H32.3176C29.5347 54.2224 23.4482 53.4053 21.3655 48.0052C17.3856 48.0348 8.90528 45.1098 6.82259 33.1728C6.41969 30.8635 4.16537 28.1102 0 27.0444C4.16537 25.9786 6.41969 23.1365 6.82259 20.8272C8.90528 8.89023 17.3856 5.96518 21.3655 5.99478C23.4482 0.594706 29.5347 -0.222409 32.3176 0.0440421Z" fill="#E1C844"/>
                                            </svg>
                                            <div class="flex items-center justify-center gap-1 divide-x divide-black relative z-20">
                                                <span class="text-sm font-semibold relative z-20"></span>{{$package->price}}<span class="text-sm pl-1 relative z-20">{{$package->nights}} Nights</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-6 border-b border-[#D2D2D2] py-5 pb-6">
                                    @if ($package->service && $package->service->isNotEmpty())
                                        @foreach ($package->service as $service)
                                            <div class="flex-1 flex flex-col items-center gap-2 p-3 rounded-lg bg-[#f5f5f5]" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                                <img class="rounded-full size-16 object-cover" src="{{ asset('service_images/madina.png') }}" alt="card1">
                                                <div class="text-center">
                                                    <h6 class="font-semibold line-clamp-1">{{ $service->name }}</h6>
                                                    <p class="text-xs font-medium line-clamp-1">
                                                        {{ $service->hotel ? $service->hotel->name : '...' }}
                                                    </p>

                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="flex-1 flex flex-col items-center gap-2 p-3 rounded-lg bg-[#f5f5f5]" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                            <img class="rounded-full size-16 object-cover" src="{{ asset('service_images/madina.png') }}" alt="card1">
                                            <div class="text-center">
                                                <h6 class="font-semibold line-clamp-1">10 nights in Makkah</h6>
                                                <p class="text-xs font-medium line-clamp-1">Makkah Hotel</p>
                                            </div>
                                        </div>
                                    @endif

                                    </div>
                                    <div class="grid grid-cols-4  gap-4 py-3 text-sm border-b border-[#D2D2D2]">
                                        @php
                                            $facilitiesToShow = $package->facility->where('status', 1)->take(4); // Filter and limit to 4
                                        @endphp

                                        @if ($facilitiesToShow->isNotEmpty())
                                            @foreach ($facilitiesToShow as $facility)
                                                <div class="flex flex-col items-center gap-2">
                                                    <img src="{{ asset('facility_images/' . $facility->name . '.svg') }}" class="max-w-8 object-contain" alt="facility">
                                                    <p class="text-xs">{{ $facility->name }}</p>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="flex flex-col items-center gap-2">
                                                <img src="{{ asset('facility_images/Visa.svg') }}" class="max-w-8 object-contain" alt="static facility">
                                                <p class="text-xs">Visa</p> <!-- Replace with the desired static name -->
                                            </div>
                                        @endif


                                    </div>
                                    <div class="flex items-center justify-between gap-2 pt-3 pb-1">

                                    <a href="https://wa.me/02039258000"> <div class="font-semibold text-[14px] flex items-center gap-1 cursor-pointer animate-blink-zoom animate-pulse">
                                            <img class="size-8 sm:size-10" src="{{ asset('assets/img/whatsapp.svg') }}" alt="whatsapp">
                                            02039258000
                                        </div>
                                    </a>
                                    <a href="{{ route('packages.showDetails', str_replace(' ', '-', $package->name)) }}" class="bg-[#110928] px-6 md:px-8 py-3 xl:py-4 text-white cursor-pointer font-semibold text-sm rounded-full">View Details</a>
                                    </div>
                                </div>
                            </div>


                            @php $counter++; @endphp
                        @endforeach
                        @endif
                    </div>
                    <div class="swiper-pagination swiper-pagination-umrah-category"></div>
                </div>
            </div>
                @endforeach

    </div>
</section>





<script>
    function showSection(sectionNumber) {
        // Hide all sections
        const sections = document.querySelectorAll('[id^="menu"]');
        sections.forEach(section => {
            section.style.display = 'none';
        });

        // Remove active class from all links
        const links = document.querySelectorAll('.menu-link');
        links.forEach(link => {
            link.classList.remove('activeLink');
        });

        // Add active class to the clicked link and display the corresponding section
        document.getElementById('link' + sectionNumber).classList.add('activeLink');
        document.getElementById('menu' + sectionNumber).style.display = 'block';
    }
</script>








@include('weblayouts.about')

<section class="bg-[#F3F3F3]">
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-8">

        <div class="text-center text-[#110928]">
            <div class="text-3xl font-bold">
                What Customers Say About Us!
            </div>
        </div>
        <div class="swiper umrahPackageSwiper7 ">
            <div class="swiper-wrapper !flex py-10">
                @foreach ($customerreviews as $review)
                <div class="swiper-slide bg-white border border-[#E3E3E3] rounded-[20px] p-5 md:p-8 flex flex-col gap-7">
                    <p class="max-h-24 min-h-24 reviews__custom__scroll overflow-auto ov">{{$review->review}}</p>
                    <div class="flex gap-5 items-center">
                        <img class="rounded-full h-20 w-20" src="{{ URL($review->image) }}" alt="user">
                        <div>
                            <h6 class="text-[#09B175] text-lg">{{$review->name}}</h6>
                            <p class="text-sm text-[#808080]">{{$review->company_name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination1"></div>
        </div>
    </div>
</section>
@include('weblayouts.partner_hotels')
@include('weblayouts.partner')

<section class="bg-white">
    <div  class="container mx-auto px-5 lg:px-10 xl:px-24 pt-2 pb-12">
        <div class="space-y-3 md:mx-auto flex justify-center">
            <!-- <p class="text-3xl font-bold text-[#110928]"> All flights and flight-inclusive holidays</p> -->
            <p class="italic max-w-[60rem] text-justify sm:text-center">
                    All the flights and flight-inclusive holidays [in this brochure] [on this website - as appropriate] are financially protected by the ATOL scheme. When you pay you will be supplied with an ATOL Certificate. Please ask for it and check to ensure that everything you booked (flights, hotels and other services) is listed on it. Please see our booking conditions for further information or for more information about financial protection and the ATOL Certificate go to: <a class="text-red-600 hover:underline" href="https://www.caa.co.uk/ATOLCertificate" target="_blank">www.atol.org.uk/ATOLCertificate</a> .
            </p>
        </div>

    </div>
</section>


@include('weblayouts.newsletter')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".umrahPackageSwiper11", {
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            slidesPerView: 2,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                }
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".custom-swiper-button-next",
                prevEl: ".custom-swiper-button-prev",
            },
        });

        var umrahPackageSwiperContainer = document.querySelector('.umrahPackageSwiper11');

        umrahPackageSwiperContainer.addEventListener('mouseenter', function() {
            swiper.autoplay.stop();
        });

        umrahPackageSwiperContainer.addEventListener('mouseleave', function() {
            swiper.autoplay.start();
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var umrahCategoryPackageSwiper = new Swiper(".umrah__category__package__Swiper", {
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            slidesPerView: 2,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                }
            },
            pagination: {
                el: ".swiper-pagination-umrah-category",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".custom-swiper-button-next-umrah-category",
                prevEl: ".custom-swiper-button-prev-umrah-category",
            },
        });

        var umrahPackageSwiperContainer02 = document.querySelector('.umrah__category__package__Swiper');

        umrahPackageSwiperContainer02.addEventListener('mouseenter', function() {
            umrahCategoryPackageSwiper.autoplay.stop();
        });

        umrahPackageSwiperContainer02.addEventListener('mouseleave', function() {
            umrahCategoryPackageSwiper.autoplay.start();
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".umrahPackageSwiper7", {
            loop: true,
            autoplay: {
                delay: 1400,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                700: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });

        var umrahPackageSwiperContainer = document.querySelector('.umrahPackageSwiper7');

        umrahPackageSwiperContainer.addEventListener('mouseenter', function() {
            swiper.autoplay.stop();
        });

        umrahPackageSwiperContainer.addEventListener('mouseleave', function() {
            swiper.autoplay.start();
        });
    });



    let shimmerElements = document.querySelectorAll('.bg__image__shimmer');
    let backgroundImages = document.querySelectorAll('.background__dynamic__image');
    let value = true;

    if (value === true) {
        setTimeout(() => {
            shimmerElements.forEach((shimmer) => {
                shimmer.classList.add('hidden');
            });

            backgroundImages.forEach((image) => {
                image.classList.remove('hidden');
            });
        }, 2000);
    }
</script>

@endsection
