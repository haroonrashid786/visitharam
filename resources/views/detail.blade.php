@extends('weblayouts.app')
@section('title')
    {{ 'Detail' }}
@endsection
@section('content')


    <header class="w-full bg-cover bg-no-repeat bg-top h-[280px] sm:h-[350px] md:h-[430px] flex flex-col items-end justify-end" style="background-image: url('{{ $package->image ? asset($package->image) : asset('assets/img/header/2x.jpg') }}');">

</header>

    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-10 grid md:grid-cols-8 gap-5 md:gap-8">
        <div class="swiper umrahPackageSwiper6 md:col-span-4 lg:col-span-3 md:block hidden">
            <div class="swiper-wrapper">
                @foreach ($package->media as $media)
                    <img class="swiper-slide h-[300px] md:h-full max-h-[450px] rounded-[20px] object-cover" src="{{ asset($media->file) }}" alt="img1">
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination1"></div>
        </div>
        <!-- <div class="md:col-span-4 lg:col-span-5 w-full md:pb-10">
            <div class="h-full w-full rounded-[20px] bg-white border border-[#D7D7D7] text-[#110928] p-5 lg:p-8 flex flex-col justify-between gap-2">
                <h5 class="text-2xl lg:text-3xl font-semibold">{{$package->name}}</h5>
                <p class="text-2xl lg:text-3xl">Price: <span class="text-[#09B175] font-semibold"> {{$package->price}}</span></p>
                <div class="grid grid-cols-2 gap-5 py-2 text-sm lg:text-base">
                    @php $counter = 0; @endphp
                    @foreach ($package->service as $service)
                        @if ($counter < 2)
                            <div class="flex flex-col sm:flex-row flex-wrap lg:flex-nowrap justify-center gap-2 items-center">
                                <img class="rounded-full w-20 h-20 lg:h-24 lg:w-24" src="{{ asset('service_images/madina.png') }}" alt="img">
                                <div class="flex flex-col gap-1">
                                    {{--<p class="text-base font-bold lg:w-20">{{$service->oldname }}</p>--}}
                                    <p class="text-sm">{{$service->name}}</p>
                                </div>
                            </div>
                            @php $counter++; @endphp
                        @else
                            @break
                        @endif
                    @endforeach

                </div>
                <hr class="w-full border-[#CCCCCC]">
                <div class="grid grid-cols-5 gap-6 lg:gap-12 py-2 text-sm">
                    @foreach ($package->facility as $facility)
                        @if ($facility->status == 1)
                            <div class="flex flex-col items-center gap-2">
                                <img src="{{ asset('facility_images/' . $facility->name . '.svg') }}" class="max-w-7 object-contain" alt="visa">
                                <p>{{ $facility->name }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr class="w-full border-[#CCCCCC]">
                <div class="flex items-center gap-5 sm:gap-2 md:gap-5 text-sm lg:text-base pt-4">
                    <button class="rounded-full w-full border-2 border-black py-2.5 font-semibold"><i class="fa-solid fa-phone text-[#E1C844]"></i> 02039258000</button>
                    <a href="mailto:info@visitharam.co.uk?subject=Booking%20Inquiry&body=I%20would%20like%20to%20book..."
                       class="rounded-full w-full border-2 border-[#09B175] bg-[#09B175] text-white py-2.5 font-semibold text-center inline-block">
                        Book Now
                    </a>
                </div>
            </div>
        </div> -->
        <div class="md:col-span-4 lg:col-span-5 w-full border rounded-xl p-5 pb-3">
                            <div class="flex sm:gap-6 gap-3 items-center">
                                <div class="flex-1">
                                    <h5 class="font-semibold leading-6 text-lg sm:text-2xl line-clamp-1">{{$package->name}}</h5>
                                    <!-- <p class="text-sm">Price: <span class="text-[#09B175] font-semibold"> From 2000</span></p> -->
                                </div>
                                <div class="py-4 px-4 font-semibold flex items-center justify-center text-sm w-48 relative">
                                    <svg class="absolute z-0 right-0 w-48 h-auto " width="220" height="50" viewBox="0 0 201 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M32.3176 0.0440421L58.1716 0.0440615L168.682 0.0440421C171.465 -0.222409 177.552 0.594706 179.635 5.99478C183.614 5.96518 192.095 8.89023 194.177 20.8272C194.58 23.1365 196.835 25.9786 201 27.0444C196.835 28.1102 194.58 30.8635 194.177 33.1728C192.095 45.1098 183.614 48.0348 179.635 48.0052C177.552 53.4053 171.465 54.2224 168.682 53.956H58.8H32.3176C29.5347 54.2224 23.4482 53.4053 21.3655 48.0052C17.3856 48.0348 8.90528 45.1098 6.82259 33.1728C6.41969 30.8635 4.16537 28.1102 0 27.0444C4.16537 25.9786 6.41969 23.1365 6.82259 20.8272C8.90528 8.89023 17.3856 5.96518 21.3655 5.99478C23.4482 0.594706 29.5347 -0.222409 32.3176 0.0440421Z" fill="#E1C844"/>
                                    </svg>
                                    <div class="flex items-center justify-center gap-1 divide-x divide-black relative z-20">
                                        <span class="text-sm font-semibold relative z-20"></span>{{$package->price}}<span class="text-sm pl-1 relative z-20">{{$package->nights}} Nights</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-6 border-b border-[#D2D2D2] py-5">
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
                            <div class="flex items-center justify-between gap-2 pt-3">

                               <a href="https://wa.me/02039258000"> <div class="font-semibold text-[14px] flex items-center gap-1 cursor-pointer animate-blink-zoom animate-pulse">
                                    <img class="size-8 sm:size-10" src="{{ asset('assets/img/whatsapp.svg') }}" alt="whatsapp">
                                    02039258000
                                </div></a>
                                <a href="/#quote" class="bg-[#110928] px-6 md:px-8 py-3 xl:py-4 text-white cursor-pointer font-semibold text-sm rounded-full">Book Now</a>
                            </div>
                        </div>
    </div>

<section class="">
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-5 ">
        <div id="#qoute" class="shadow-[0px_4px_50px_0px_#00000033] rounded-xl xl:rounded-[20px]">
            <div class="xl:h-[60px] py-3 xl:py-0 bg-[#E1C844] rounded-t-xl xl:rounded-t-[20px] px-5 lg:px-8 flex items-center">
                <p class="text-2xl font-semibold">Get Custom Quote</p>
            </div>

            @include('weblayouts.quoteform')

        </div>
    </div>
{{--    <div class="container mx-auto px-5 sm:px-10 xl:px-24 py-2 pt-16">--}}
{{--        <h2 class="text-[#110928] font-bold text-3xl text-center">Trusted Hajj and Umrah Travel Agency in the UK</h2>--}}
{{--        <div class="md:px-5 xl:px-20 grid grid-cols-2 place-items-center md:flex items-center justify-between flex-wrap md:flex-nowrap md:gap-5 xl:gap-10 py-16">--}}
{{--            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust1.png') }}" alt="trust1">--}}
{{--            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust2.png') }}" alt="trust2">--}}
{{--            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust3.png') }}" alt="trust3">--}}
{{--            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust4.png') }}" alt="trust4">--}}
{{--        </div>--}}
{{--    </div>--}}
</section>

<section>
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-8">

        <div class="flex flex-col gap-10">

            <div class="bg-[#F3EED2] rounded-xl lg:rounded-[20px] px-5 sm:px-10 py-5 pt-16">
                <h2 class="text-[#110928] font-bold text-3xl text-center pb-5 lg:pb-0">{{$package->name}}</h2>
                <div class="py-5 space-y-5 md:space-y-10 ">
                    <div class="rounded-xl lg:rounded-[20px] p-5 lg:p-8 bg-white">
                        @php
                            $includedFacilities = $package->facility->where('status', 2);
                        @endphp
                        @if ($includedFacilities->isNotEmpty())
                        <h3 class="font-bold text-lg pb-5">Included:</h3>
                        <ul class="space-y-5 grid grid-cols-2 gap-4 pb-5 md:pb-0 border-[#D3D2C9]">
                            @foreach ($package->facility as $facility)
                                @if ($facility->status == 2)
                            <li class='flex gap-2 !mt-0'>
                                <span class="h-5 w-5 flex items-center justify-center">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                    </svg>
                                </span>
                                <span class='text-base'>{{$facility->name}}</span>
                            </li>
                                @endif
                            @endforeach
                        </ul>
                        @endif
                        <div class="w-[260px] mx-auto h-[1.5px] bg-[#D3D2C9] mt-8 ">

                        </div>
                        <div class="flex w-full mt-8">

                            <ul class="space-y-5 flex justify-between items-start gap-4">
                                @php
                                    $facilitiesDisplayed = false;
                                @endphp

                                @foreach ($package->service as $service)
                                    @if ($service->hotel && !$facilitiesDisplayed)
                                        @if ($service->hotel->hotelfacility->isNotEmpty())
                                            @foreach ($service->hotel->hotelfacility as $hotelfacility)
                                                <li class='flex items-start gap-5 flex-1 !mt-0'>
                                                    <img class="size-8 md:scale-125" src="{{ asset($hotelfacility->image) }}" alt="facility">
                                                    <div>
                                                        <h6 class='text-base font-bold mb-2'>{{ $hotelfacility->name }}</h6>
                                                        <p class='text-base'>{{ $hotelfacility->description }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                            @php
                                                $facilitiesDisplayed = true;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach

                                @if (!$facilitiesDisplayed)
                                    <li class='flex items-start gap-5 flex-1 !mt-0'>
                                        <img class="size-8 md:scale-125" src="{{ asset('facility_images/wifi-image1709119533.svg') }}" alt="facility">
                                        <div>
                                            <h6 class='text-base font-bold mb-2'>Free Wi-Fi</h6>
                                            <p class='text-base'>Enjoy full access to free Wi-Fi right in your room and connect with your loved ones.</p>
                                        </div>
                                    </li>
                                    <li class='flex items-start gap-5 flex-1 !mt-0'>
                                        <img class="size-8 md:scale-125" src="{{ asset('facility_images/ac-image1709120916.svg') }}" alt="facility">
                                        <div>
                                            <h6 class='text-base font-bold mb-2'>A/C Rooms</h6>
                                            <p class='text-base'>All the rooms, no matter single or quad shared, have air-conditioning installed.</p>
                                        </div>
                                    </li>
                                @endif
                            </ul>


                        </div>
                    </div>
                    <div class="grid gap-6 lg:grid-cols-2 ">


                        <div class="flex-1 flex flex-col gap-4">
                            <div class="swiper umrahPackageSwiper5 pb-10">
                                <div class="swiper-wrapper">
                                    @if($package->service->isNotEmpty())
                                        @php
                                            $firstHotelMedia = $package->service[0]->hotel->media; // Get media for the first hotel
                                        @endphp
                                    @if($firstHotelMedia->isNotEmpty())
                                        @foreach ($firstHotelMedia as $media)
                                            <img class="h-[280px] {{ $firstHotelMedia->count() === 1 ? 'w-full flex-1' : 'swiper-slide' }} md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover"
                                                 src="{{ asset($media->file) }}"
                                                 alt="img1">
                                        @endforeach
                                        @else
                                            <img class="h-[280px]  md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover"
                                                 src="{{ asset('assets/2x.png') }}"
                                                 alt="img1">
                                        @endif
                                    @endif
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="space-y-4">
                                @if ($package->service->isNotEmpty())
                                    <div>
                                        <h5 class="text-2xl font-bold">{{ $package->service[0]->hotel->name }}</h5>
                                        <div class="space-y-7 py-2">
                                            <p>{{ $package->service[0]->hotel->description }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex-1 flex flex-col gap-4">
                            <div class="swiper umrahPackageSwiper10 pb-10">
                                <div class="swiper-wrapper">
                                    @if($package->service->count() > 1)
                                        @php
                                            $secondHotelMedia = $package->service[1]->hotel->media; // Get media for the second hotel
                                        @endphp
                                        @if($secondHotelMedia->isNotEmpty())

                                        @foreach ($secondHotelMedia as $media)
                                            <img class="h-[280px] {{ $secondHotelMedia->count() === 1 ? 'w-full flex-1' : 'swiper-slide' }} md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover"
                                                 src="{{ asset($media->file) }}"
                                                 alt="img1">
                                        @endforeach
                                    @else
                                        <img class="h-[280px]  md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover"
                                             src="{{ asset('assets/2x.png') }}"
                                             alt="img1">
                                    @endif
                                    @endif
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="space-y-4">
                                @if ($package->service->count() > 1)
                                    <div>
                                        <h5 class="text-2xl font-bold">{{ $package->service[1]->hotel->name }}</h5>
                                        <div class="space-y-7 py-2">
                                            <p>{{ $package->service[1]->hotel->description }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <!-- <div class="swiper umrahPackageSwiper5 pb-10">
                            <div class="swiper-wrapper">
                                @foreach ($package->media as $media)
                                <img class="h-[280px] {{ $package->media->count() === 1 ? 'w-full flex-1' : 'swiper-slide' }} md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ asset($media->file) }}" alt="img1">
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="md:p-5 lg:p-8 ">
                            @foreach ($package->service as $service)
                                @if ($service->hotel)
                            <div>
                                <h5 class="text-2xl font-bold">{{$service->hotel->name}}</h5>
                                <div class="space-y-7 py-2">
                                    <p>{{$service->hotel->description}}</p>
                                </div>
                            </div>
                                @endif
                            @endforeach
                        </div> -->
                    </div>
                </div>
            </div>

        </div>

        <div class="pt-10 grid lg:grid-cols-2 gap-10">
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

    </div>
</section>




    <section class="container mx-auto px-5 md:px-10 xl:px-24 pb-10 space-y-5">
        <div class="flex flex-col gap-14 sm:gap-0 sm:flex-row items-center justify-center sm:justify-between py-5">
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
        <div class="swiper umrahPackageSwiper11 ">
            <div class="swiper-wrapper flex pb-20">
                @foreach($packages as $package)
                        <div class="swiper-slide rounded-xl overflow-hidden w-full shadow-xl">
                            @php
                                $firstMedia = $package->media->first();
                            @endphp
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
                                <div class="flex gap-6 border-b border-[#D2D2D2] py-5">
                                    @if ($package->service && $package->service->isNotEmpty())
                                        @foreach ($package->service as $service)
                                            <div class="flex-1 flex flex-col items-center gap-2 p-3 rounded-lg bg-[#f5f5f5]" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                                <img class="rounded-full size-16 object-cover" src="{{ asset('service_images/madina.png') }}" alt="card1">
                                                <div class="text-center">
                                                    <h6 class="font-semibold line-clamp-1">{{ $service->name }}</h6>
                                                    <p class="text-xs font-medium line-clamp-1">{{ $service->hotel->name ?? '' }}</p>

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
                                <div class="flex items-center justify-between gap-2 pt-3">
                                    <a href="https://wa.me/02039258000"><div class="font-semibold text-[14px] flex items-center gap-1 cursor-pointer animate-blink-zoom animate-pulse">
                                        <img class="size-8 sm:size-10" src="{{ asset('assets/img/whatsapp.svg') }}" alt="whatsapp">
                                        02039258000
                                    </div></a>
                                    <a href="{{ route('packages.showDetails', str_replace(' ', '-', $package->name)) }}" class="bg-[#110928] px-6 md:px-8 py-2 xl:py-3 text-white cursor-pointer font-semibold text-sm rounded-full">View Details</a>
                                </div>
                            </div>
                        </div>
                    
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination1"></div>
        </div>
    </section>
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


    <script>

    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".umrahPackageSwiper5", {
            loop: true,
            autoplay: {
                delay: 1400,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });

        var umrahPackageSwiperContainer = document.querySelector('.umrahPackageSwiper5');

        umrahPackageSwiperContainer.addEventListener('mouseenter', function() {
            swiper.autoplay.stop();
        });

        umrahPackageSwiperContainer.addEventListener('mouseleave', function() {
            swiper.autoplay.start();
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".umrahPackageSwiper10", {
            loop: true,
            autoplay: {
                delay: 1400,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });

        var umrahPackageSwiperContainer10 = document.querySelector('.umrahPackageSwiper10');

        umrahPackageSwiperContainer10.addEventListener('mouseenter', function() {
            swiper.autoplay.stop();
        });

        umrahPackageSwiperContainer10.addEventListener('mouseleave', function() {
            swiper.autoplay.start();
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".umrahPackageSwiper6", {
            loop: true,
            autoplay: {
                delay: 1400,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });

        var umrahPackageSwiperContainer = document.querySelector('.umrahPackageSwiper6');

        umrahPackageSwiperContainer.addEventListener('mouseenter', function() {
            swiper.autoplay.stop();
        });

        umrahPackageSwiperContainer.addEventListener('mouseleave', function() {
            swiper.autoplay.start();
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



</script>

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

    @include('weblayouts.partner_hotels')
    @include('weblayouts.partner')
    @include('weblayouts.newsletter')

@endsection
