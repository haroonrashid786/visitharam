@extends('weblayouts.app')
@section('title')
    {{ 'Flight' }}
@endsection
@section('content')


    <section class="swiper banner">
        <div class="swiper-wrapper">
            <div class="swiper-slide bg-cover bg-no-repeat bg-center h-[50vh] w-full " style="background-image: url('{{ asset('/assets/images/brands/White Gold Elegant Hajj and Umrah Travel Service Presentation (1) 2.png') }}');" >
                <div class="h-full w-full bg-[#202020]/40 flex items-center ">
                    <div class="container mx-auto px-5 md:px-10 xl:px-24">
                        <img class=" sm:h-72 " src="{{ asset('assets/images/brands/Group 90.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-slide bg-cover bg-no-repeat bg-center h-[50vh] w-full " style="background-image: url('{{ asset('/assets/images/brands/jumbo-jet-flying-sky.png') }}');" >
                <div class="h-full w-full bg-[#202020]/40 flex items-center ">
                    <div class="container mx-auto px-5 md:px-10 xl:px-24">
                        <img class=" sm:h-72 " src="{{ asset('assets/images/brands/Group 90.png') }}" alt="">
                    </div>
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
    <div class="py-6 container mx-auto px-5 md:px-10 xl:px-24">
        <div class="pb-8">
            <h4 class="text-center sm:text-left text-2xl md:text-3xl font-semibold text-[#110928]">Flights</h4>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
            @foreach($flight->flightdata as $flightdata)
            <div class="border border-[#D2D2D2] rounded-lg w-full bg-white px-6 py-2 space-y-1 flex flex-col justify-between" style="box-shadow: 0px 4px 10px 0px #0000001A;">
                <img class="w-40 py-2 object-fit-contain" src="{{ asset($flightdata->image) }}" alt="">
                <div class="space-y-1 w-full">
                    <h3 class="text-lg font-semibold text-[#202020] ">{{$flightdata->flight_name}}</h3>
                    <div class="flex items-center gap-3">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="30" height="30" rx="5" fill="#F5F2E3"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9013 11.8056H17.3878V10.0137C17.4269 9.99165 17.4624 9.96466 17.4944 9.93341C17.5817 9.84605 17.6357 9.72532 17.6357 9.59179V8.34037C17.6357 8.20685 17.5817 8.08612 17.4944 7.99876C17.407 7.9114 17.2863 7.85742 17.1527 7.85742H12.848C12.7145 7.85742 12.5938 7.9114 12.5064 7.99876C12.419 8.08611 12.3651 8.20685 12.3651 8.34037V9.59179C12.3651 9.72532 12.419 9.84605 12.5064 9.93341C12.5376 9.96466 12.5739 9.99165 12.6129 10.0137V11.8056H12.0994C11.6683 11.8056 11.277 11.9817 10.9922 12.2665C10.7081 12.5506 10.5312 12.9427 10.5312 13.3738V20.9356C10.5312 21.3667 10.7074 21.758 10.9922 22.0428C11.2763 22.3269 11.6683 22.5038 12.0994 22.5038H17.902C18.3331 22.5038 18.7244 22.3276 19.0092 22.0428C19.2933 21.7587 19.4702 21.3667 19.4702 20.9356V13.3738C19.4702 12.9434 19.294 12.5513 19.0092 12.2665C18.7251 11.9824 18.3331 11.8056 17.902 11.8056H17.9013ZM16.8679 11.8056H13.1314V9.98249C13.152 9.96757 13.1712 9.95123 13.1889 9.93348C13.2763 9.84612 13.3302 9.72539 13.3302 9.59186V9.08333C13.3302 8.93987 13.4467 8.82339 13.5902 8.82339H16.4098C16.5533 8.82339 16.6698 8.93987 16.6698 9.08333V9.59186C16.6698 9.72539 16.7238 9.84612 16.8111 9.93348C16.8289 9.95124 16.848 9.96757 16.8686 9.98249V11.8056H16.8679ZM11.9745 14.863C11.9745 14.7196 12.0909 14.6031 12.2344 14.6031C12.3779 14.6031 12.4944 14.7196 12.4944 14.863V20.4796C12.4944 20.623 12.3779 20.7395 12.2344 20.7395C12.091 20.7395 11.9745 20.623 11.9745 20.4796V14.863ZM13.8183 14.863C13.8183 14.7196 13.9348 14.6031 14.0782 14.6031C14.2217 14.6031 14.3382 14.7196 14.3382 14.863V20.4796C14.3382 20.623 14.2217 20.7395 14.0782 20.7395C13.9348 20.7395 13.8183 20.623 13.8183 20.4796V14.863ZM15.6628 14.863C15.6628 14.7196 15.7793 14.6031 15.9228 14.6031C16.0662 14.6031 16.1827 14.7196 16.1827 14.863V20.4796C16.1827 20.623 16.0662 20.7395 15.9228 20.7395C15.7793 20.7395 15.6628 20.623 15.6628 20.4796V14.863ZM17.5067 14.863C17.5067 14.7196 17.6231 14.6031 17.7666 14.6031C17.9101 14.6031 18.0265 14.7196 18.0265 14.863V20.4796C18.0265 20.623 17.9101 20.7395 17.7666 20.7395C17.6231 20.7395 17.5067 20.623 17.5067 20.4796V14.863ZM11.915 23.0136V23.6712C11.915 23.7508 11.9477 23.8232 12.0002 23.8758C12.0528 23.9284 12.1252 23.961 12.2048 23.961H12.5926C12.6721 23.961 12.7446 23.9284 12.7971 23.8758C12.8497 23.8232 12.8823 23.7508 12.8823 23.6712V23.0214H12.099C12.0372 23.0214 11.9761 23.0185 11.915 23.0136ZM17.1181 23.0214V23.6712C17.1181 23.7508 17.1508 23.8232 17.2033 23.8758C17.2559 23.9283 17.3283 23.961 17.4079 23.961H17.7957C17.8752 23.961 17.9477 23.9283 18.0002 23.8758C18.0528 23.8232 18.0854 23.7508 18.0854 23.6712V23.0136C18.0251 23.0185 17.9633 23.0214 17.9015 23.0214L17.1181 23.0214Z" fill="#202020"/>
                        </svg>
                        <p class="text-[#202020] text-[14px] ">Baggage <span class=" font-semibold">{{$flightdata->baggage}}</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="30" height="30" rx="5" fill="#F5F2E3"/>
                            <path d="M15 8.40348C13.0331 8.40348 11.1475 9.18459 9.75727 10.5754C8.36636 11.9657 7.58533 13.8514 7.58533 15.8182C7.58533 17.7849 8.36643 19.6707 9.75727 21.0609C11.1475 22.4518 13.0333 23.2329 15 23.2329C16.9668 23.2329 18.8525 22.4518 20.2428 21.0609C21.6337 19.6706 22.4147 17.7849 22.4147 15.8182C22.4153 13.8513 21.6342 11.9657 20.2433 10.5748C18.8523 9.18387 16.9668 8.40283 14.9999 8.40332L15 8.40348ZM15 21.9545C13.3726 21.9545 11.8117 21.3083 10.661 20.1572C9.50982 19.0066 8.86365 17.4457 8.86365 15.8182C8.86365 14.1906 9.50989 12.6299 10.661 11.4792C11.8116 10.328 13.3725 9.68181 15 9.68181C16.6275 9.68181 18.1883 10.328 19.339 11.4792C20.4902 12.6298 21.1364 14.1906 21.1364 15.8182C21.1345 17.4449 20.4869 19.0047 19.3364 20.1545C18.1865 21.3051 16.6267 21.9526 15 21.9545ZM15 10.1932C13.5081 10.1932 12.0776 10.7857 11.0222 11.8403C9.9675 12.8957 9.37502 14.3261 9.37502 15.8182C9.37502 17.3102 9.96756 18.7406 11.0222 19.796C12.0775 20.8507 13.508 21.4432 15 21.4432C16.4921 21.4432 17.9224 20.8506 18.9779 19.796C20.0325 18.7407 20.625 17.3102 20.625 15.8182C20.625 14.3261 20.0325 12.8958 18.9779 11.8403C17.9225 10.7857 16.4921 10.1932 15 10.1932ZM17.1171 19.5869C16.7579 19.7281 16.3591 19.732 15.9973 19.5971L15.3223 19.3465C14.8013 19.1548 14.2273 19.1625 13.7114 19.367L13.2359 19.5536L12.7245 18.7994C13.3362 18.3967 13.7019 17.7115 13.6961 16.9789C13.6974 16.9061 13.6929 16.8338 13.6833 16.7616H12.162V15.7389H13.2615C12.9495 15.3068 12.5609 14.9181 12.4177 14.2073C12.162 12.9494 13.4481 11.9395 14.7188 11.9395C15.3279 11.9382 15.9122 12.1786 16.3449 12.6068C16.7764 13.0274 17.0199 13.6046 17.0199 14.2074V14.4605H15.9972V14.2074C15.9965 13.8718 15.8623 13.5509 15.6239 13.3151C15.381 13.0805 15.0563 12.9488 14.7188 12.9494C14.0131 12.9494 13.4404 13.7037 13.6961 14.2074C13.9338 14.6753 14.3327 15.0997 14.5552 15.7389H16.2529V16.7617H14.7188C14.7111 17.9915 14.2586 18.2957 14.2586 18.2957H15.2813C15.5331 18.3041 15.7792 18.3712 15.9998 18.4926C16.5597 18.7994 17.3267 18.2957 17.3267 18.2957L17.8381 19.3031L17.1171 19.5869Z" fill="black"/>
                        </svg>
                        <p class="text-[#202020] text-[14px] ">From Price <span class=" font-semibold">{{$flightdata->price}}</span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    @foreach($contents as $index => $content)
        @if ($content->page == "flight")
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
                    delay: 2400,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
                spaceBetween: 20,
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
