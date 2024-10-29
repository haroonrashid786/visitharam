@extends('weblayouts.app')
@section('title')
    {{ 'Detail' }}
@endsection
@section('content')



    <div class="h-80 bg-cover bg-no-repeat bg-center flex items-center justify-center p-5" style="background-image: url('{{ asset('https://www.makkahtour.co.uk/images/team-cta-bg.jpg') }}');">
        <h3 class="text-4xl text-center text-white font-semibold ">{{$subcategory->name}}</h3>
    </div>



    <section class="container mx-auto px-5 md:px-10 xl:px-24 py-5 space-y-5">
        <div class="flex flex-col gap-14 sm:gap-0 sm:flex-row items-center justify-center sm:justify-between py-5">
            <h4 class="text-center sm:text-left text-2xl md:text-3xl font-semibold text-[#110928]">Cheapest 3 Star {{$subcategory->name}}</h4>
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
            <div class="swiper-wrapper flex">
            @php
    $hasThreeStarPackage = $subcategory->packages->contains(function($package) {
        return $package->star == 3 && $package->active == 1;
    });
@endphp
@if($hasThreeStarPackage)
                @foreach($subcategory->packages as $package)
                    @if ($package->active == 1 && $package->star == 3)
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
                                            @if($service->hotel)
                                                <p class="text-xs font-medium line-clamp-1">{{ $service->hotel ? $service->hotel->name : '...' }}</p>
                                            @else
                                                <p class="text-xs font-medium line-clamp-1">Conrad Hotel</p>
                                            @endif

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
                @endif
                        @endforeach
                        @else
                        <p class="text-center mx-auto text-lg font-semibold text-gray-600 p-4 rounded-lg">
    No 3-star packages found.
</p>



@endif
            </div>
            <div class="swiper-pagination swiper-pagination1"></div>
        </div>
    </section>


    <section class="container mx-auto px-5 md:px-10 xl:px-24 py-6 space-y-5">
        <div class="flex flex-col gap-14 sm:gap-0 sm:flex-row items-center justify-center sm:justify-between py-5">
            <h4 class="text-center sm:text-left text-2xl md:text-3xl font-semibold text-[#110928]">Cheapest 4 Star {{$subcategory->name}}</h4>
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
        <div class="swiper umrahPackageSwiper12 ">
            <div class="swiper-wrapper flex">
            @php
    $hasFourStarPackage = $subcategory->packages->contains(function($package) {
        return $package->star == 4 && $package->active == 1;
    });
@endphp
@if($hasFourStarPackage)
                @foreach($subcategory->packages as $package)
                    @if ($package->active == 1 && $package->star == 4)
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
                                    <div class="font-semibold text-[14px] flex items-center gap-1 cursor-pointer animate-blink-zoom animate-pulse">
                                        <img class="size-8 sm:size-10" src="{{ asset('assets/img/whatsapp.svg') }}" alt="whatsapp">
                                        02039258000
                                    </div>
                                    <a href="{{ route('packages.showDetails', str_replace(' ', '-', $package->name)) }}" class="bg-[#110928] px-6 md:px-8 py-2 xl:py-3 text-white cursor-pointer font-semibold text-sm rounded-full">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @else
                <p class="text-center mx-auto text-lg font-semibold text-gray-600 p-4 rounded-lg">
                No 4-star packages found.
</p>



@endif
            </div>
            <div class="swiper-pagination swiper-pagination1"></div>
        </div>
    </section>

    <section class="container mx-auto px-5 md:px-10 xl:px-24 py-6 space-y-5">
        <div class="flex flex-col gap-14 sm:gap-0 sm:flex-row items-center justify-center sm:justify-between py-5">
            <h4 class="text-center sm:text-left text-2xl md:text-3xl font-semibold text-[#110928]">Cheapest 5 Star {{$subcategory->name}}</h4>
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
        <div class="swiper umrahPackageSwiper13 ">
            <div class="swiper-wrapper flex">
            @php
    $hasFiveStarPackage = $subcategory->packages->contains(function($package) {
        return $package->star == 5 && $package->active == 1;
    });
@endphp
@if($hasFiveStarPackage)
                @foreach($subcategory->packages as $package)
                    @if ($package->active == 1 && $package->star == 5)
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
                                                    <p class="text-xs font-medium line-clamp-1">{{ $service->hotel ? $service->hotel->name : '...' }}</p>
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
                                    <div class="font-semibold text-[14px] flex items-center gap-1 cursor-pointer animate-blink-zoom animate-pulse">
                                        <img class="size-8 sm:size-10" src="{{ asset('assets/img/whatsapp.svg') }}" alt="whatsapp">
                                        02039258000
                                    </div>
                                    <a href="{{ route('packages.showDetails', str_replace(' ', '-', $package->name)) }}" class="bg-[#110928] px-6 md:px-8 py-2 xl:py-3 text-white cursor-pointer font-semibold text-sm rounded-full">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @else
                <p class="text-center mx-auto text-lg font-semibold text-gray-600 p-4 rounded-lg">
                No 5-star packages found.
</p>



@endif
            </div>
            <div class="swiper-pagination swiper-pagination1"></div>
        </div>
    </section>


    @foreach($contents as $index => $content)
        @if ($content->page == "listing")
    <section class="py-8 container mx-auto px-5 md:px-10 xl:px-24 flex gap-7 flex-col {{ $index % 2 == 0 ? 'lg:flex-row-reverse' : 'lg:flex-row' }}">
        <div class="h-72 sm:h-96 w-full relative rounded-2xl lg:flex-1 overflow-hidden">
            <div class="bg-cover bg-no-repeat bg-center h-full w-full z-30 relative background__dynamic__image hidden" style="background-image: url('{{ asset($content->image) }}');"></div>
            <div class="h-full w-full animate-pulse absolute inset-0 z-50 bg__image__shimmer">
                <div class="h-full w-full bg-gray-500"></div>
            </div>
        </div>
        <div class="flex-1 space-y-2">
            <h2 class="text-[#110928] text-2xl font-semibold line-clamp-2">{{$content->name}}</h2>
            <div class="!max-h-[290px] !overflow-y-auto reviews__custom__scroll">
                <!-- 340 use h if required for auto scrool -->
                <p class="text-[#110928] text-[15px] lg:line-clamp-[12] ">
                    {!! $content->description !!}
                </p>
            </div>
        </div>
    </section>
@endif
    @endforeach




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



        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper(".umrahPackageSwiper12", {
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
                    nextEl: ".custom-swiper-button-next1",
                    prevEl: ".custom-swiper-button-prev1",
                },
            });

            var umrahPackageSwiperContainer2 = document.querySelector('.umrahPackageSwiper12');

            umrahPackageSwiperContainer2.addEventListener('mouseenter', function() {
                swiper.autoplay.stop();
            });

            umrahPackageSwiperContainer2.addEventListener('mouseleave', function() {
                swiper.autoplay.start();
            });
        });




        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper(".umrahPackageSwiper13", {
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
                    nextEl: ".custom-swiper-button-next2",
                    prevEl: ".custom-swiper-button-prev2",
                },
            });

            var umrahPackageSwiperContainer3 = document.querySelector('.umrahPackageSwiper13');

            umrahPackageSwiperContainer3.addEventListener('mouseenter', function() {
                swiper.autoplay.stop();
            });

            umrahPackageSwiperContainer3.addEventListener('mouseleave', function() {
                swiper.autoplay.start();
            });
        });
    </script>


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
    @include('weblayouts.newsletter')

    <script>
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
