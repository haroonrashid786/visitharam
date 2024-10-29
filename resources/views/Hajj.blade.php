@extends('weblayouts.app')
@section('title')
    {{ 'Hajj' }}
@endsection
@section('content')


    <section class="swiper banner">
        <div class="swiper-wrapper">
            <div class="swiper-slide bg-center bg-cover bg-no-repeat h-[50vh] w-full " style="background-image: url('{{ asset('/assets/images/brands/hajjBanner.png') }}');" >
                <div class="h-full w-full bg-[#202020]/40 flex items-center ">
                    
                </div>
            </div>
            <div class="swiper-slide bg-center bg-cover bg-no-repeat h-[50vh] w-full " style="background-image: url('{{ asset('/assets/images/brands/hajjBanner2.jpeg') }}');" >
                <div class="h-full w-full bg-[#202020]/40 flex items-center ">
                    
                </div>
            </div>
        </div>
    </section>
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-10 ">
        <div id="#qoute" class="shadow-[0px_4px_50px_0px_#00000033] rounded-xl xl:rounded-[20px]">
            <div class="xl:h-[60px] py-3 xl:py-0 bg-[#E1C844] rounded-t-xl xl:rounded-t-[20px] px-5 lg:px-8 flex items-center">
                <p class="text-2xl font-semibold">Get Custom Quote</p>
            </div>

            @include('weblayouts.quoteform')

        </div>
    </div>
    <section class="container mx-auto px-5 md:px-10 xl:px-24 py-5">
        <div class="pb-8">
            <h4 class="text-center sm:text-left text-2xl md:text-3xl font-semibold text-[#110928]">Hajj Packages</h4>
        </div>
        <div class="grid grid-cols-3 gap-7">
            <div class="flex flex-col relative">
                <img src="{{ asset('assets/images/Hajj/Frame 1.png') }}" alt="" class="scalable-image cursor-pointer transition-all duration-500 ease-in-out rounded-2xl" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                <a href="/contact" class="w-full flex items-center justify-center absolute bottom-0 rounded-b-2xl py-4 bg-white bg-opacity-30 backdrop-blur-lg text-white border border-white/20 shadow-lg">Contact Us</a>
            </div>
            <div class="flex flex-col relative">
                <img src="{{ asset('assets/images/Hajj/Frame2new.png') }}" alt="" class="scalable-image cursor-pointer transition-all duration-500 ease-in-out rounded-2xl" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                <a href="/contact" class="w-full flex items-center justify-center absolute bottom-0 rounded-b-2xl py-4 bg-white bg-opacity-30 backdrop-blur-lg text-white border border-white/20 shadow-lg">Contact Us</a>
            </div>
            <div class="flex flex-col relative">
                <img src="{{ asset('assets/images/Hajj/Frame 3.png') }}" alt="" class="scalable-image cursor-pointer transition-all duration-500 ease-in-out rounded-2xl" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                <a href="/contact" class="w-full flex items-center justify-center absolute bottom-0 rounded-b-2xl py-4 bg-white bg-opacity-30 backdrop-blur-lg text-white border border-white/20 shadow-lg">Contact Us</a>
            </div>
            <div class="flex flex-col relative">
                <img src="{{ asset('assets/images/Hajj/Frame 4.png') }}" alt="" class="scalable-image cursor-pointer transition-all duration-500 ease-in-out rounded-2xl" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                <a href="/contact" class="w-full flex items-center justify-center absolute bottom-0 rounded-b-2xl py-4 bg-white bg-opacity-30 backdrop-blur-lg text-white border border-white/20 shadow-lg">Contact Us</a>
            </div>
            <div class="flex flex-col relative">
                <img src="{{ asset('assets/images/Hajj/Frame 5.png') }}" alt="" class="scalable-image cursor-pointer transition-all duration-500 ease-in-out rounded-2xl" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                <a href="/contact" class="w-full flex items-center justify-center absolute bottom-0 rounded-b-2xl py-4 bg-white bg-opacity-30 backdrop-blur-lg text-white border border-white/20 shadow-lg">Contact Us</a>
            </div>
        </div>

        <div id="overlay" class="hidden fixed inset-0 z-40 bg-black bg-opacity-70 flex items-center justify-center overflow-hidden">
            <div class="relative h-full w-full flex items-center justify-center">
                <button id="closeOverlay" class="absolute top-4 right-4 text-white z-50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <img id="overlayImage" class="rounded-2xl h-[96vh] shadow-lg" src="" alt="Scaled Image">
            </div>
        </div>
    </section>



    @foreach($contents as $index => $content)
        @if ($content->page == "hajj")
            <section class="py-12 container mx-auto px-5 md:px-10 xl:px-24 flex gap-7 flex-col {{ $index % 2 == 0 ? 'lg:flex-row-reverse' : 'lg:flex-row' }}">
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
            var swiper = new Swiper(".banner", {
                loop: true,
                autoplay: {
                    delay: 1800,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
                spaceBetween: 20,
            });
        });

        document.querySelectorAll('.scalable-image').forEach(img => {
            img.addEventListener('click', function() {
                const overlay = document.getElementById('overlay');
                const closeOverlay = document.getElementById('closeOverlay');
                const overlayImage = document.getElementById('overlayImage');
                const body = document.body;

                overlayImage.src = this.src;

                body.classList.add('overflow-hidden');
                overlay.classList.remove('hidden');

                closeOverlay.addEventListener('click', function() {
                    body.classList.remove('overflow-hidden');
                    overlay.classList.add('hidden');
                });

                overlay.addEventListener('click', function(e) {
                    if (e.target !== overlayImage) {
                        body.classList.remove('overflow-hidden');
                        overlay.classList.add('hidden');
                    }
                });
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
