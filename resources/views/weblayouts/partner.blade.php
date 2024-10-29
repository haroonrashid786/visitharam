<section class="border-t border-[#D0D0D0]">
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-10 sm:py-16">
        <div class="flex flex-col items-center gap-10 md:px-5 xl:px-20">
            <div class="text-center text-[#110928]">
                <div class="text-3xl font-bold">
                    Our Partner Airlines
                </div>
                <p class="mt-3">
                    We proudly book flights as per your budget and itinerary preferences with the following and other top airlines.
                </p>
            </div>
            <div class="swiper-container2 w-full max-w-[1200px] mx-auto overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide mr-0 mx-auto flex items-center h-28 justify-center"><img class="xl:scale-100 scale-75 object-cover" src=" {{ URL("assets/img/partner/turkish.png") }}" alt="turkish"></div>
                    <div class="swiper-slide mr-0 mx-auto flex items-center h-28 justify-center"><img class="xl:scale-100 scale-75 object-cover" src=" {{ URL("assets/img/partner/Saudia Airlines.png") }}" alt="saudia"></div>
                    <div class="swiper-slide mr-0 mx-auto flex items-center h-28 justify-center"><img class="xl:scale-100 scale-75 object-cover" src=" {{ URL("assets/img/partner/Royal_Jordanian-Logo.wine.png") }}" alt="jordanian"></div>
                    <div class="swiper-slide mr-0 mx-auto flex items-center h-28 justify-center"><img class="xl:scale-100 scale-75 object-cover" src="{{ URL("assets/img/partner/emirates.png") }}" alt="emirates"></div>
                    <div class="swiper-slide mr-0 mx-auto flex items-center h-28 justify-center"><img class="xl:scale-100 scale-75 object-cover" src="{{ URL("assets/img/partner/qatar.png") }}" alt="qatar"></div>
{{--                    <div class="swiper-slide mr-0 mx-auto flex items-center h-28 justify-center"><img class="xl:scale-100 scale-75 object-cover"  src="{{ URL("assets/img/partner/british.png") }}" alt="british"></div>--}}
                </div>
            </div>
            <!-- <div class="w-full grid grid-cols-2 place-items-center md:flex items-center justify-between flex-wrap md:flex-nowrap md:gap-5 xl:gap-10"></div> -->
        </div>
    </div>
</section>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.swiper-container2', {
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            slidesPerView: 4,
            spaceBetween: 10,

            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                400: {
                    slidesPerView: 2,
                },
                600: {
                    slidesPerView: 3,
                },
                800: {
                    slidesPerView: 4,
                },
                1000: {
                    slidesPerView: 4,
                },
            },
        });
    });
</script>
