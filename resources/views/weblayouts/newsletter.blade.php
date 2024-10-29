
<section class="!bg-cover lg:!bg-center" style="background: url('{{ asset('assets/img/newsletter/news.png') }}') no-repeat;">
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-16">
        <div class="flex flex-col items-center gap-10 sm:px-10 md:px-20">
            <div class="text-center text-[#110928]">
                <div class="text-3xl font-bold">
                    Sign Up to Our Newsletter
                </div>
                <p class="mt-3">
                    Like exclusive discount offers and sneak peeks of upcoming bargains on Umrah deals? Enter your email and we'll send them your way.
                </p>
            </div>
            <div class="w-full">
                <form action="{{ route('newsletter.submit') }}" method="POST" class="border border-[#D5D8DE] w-full flex rounded-full bg-white text-[#323941] px-1 py-1">
                  @csrf
                    <input id="email" name="email" placeholder="Enter your email address" required class="ml-4 w-full appearance-none bg-transparent focus:outline-none">
                    <button class="ml-3 uppercase text-white shrink-0 rounded-full bg-[#110928]  px-6 py-3 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-[#050210]" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
