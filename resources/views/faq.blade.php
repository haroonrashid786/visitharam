@extends('weblayouts.app')
@section('title')
{{ 'Faqs' }}
@endsection
@section('content')

<header class="w-full bg-[#F5F2E3]">
    <div
        class="container mx-auto px-5 md:px-10 xl:px-24 sm:py-0 py-10 h-[250px] xl:h-[300px] flex justify-center items-center">
        <h2 class="text-4xl md:text-5xl xl:text-6xl font-bold text-[#110928]">FAQ'S</h2>
    </div>
</header>

<section>
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-10">

        <div class="flex flex-col lg:flex-row">
            <div class="lg:w-1/3 py-4 sm:pr-6">
                <div class="inset-x-0 top-0 left-0 py-12 pt-3">
                    <div class="text-3xl text-[#110928] mb-8">Frequently asked questions.</div>
                    <h4 class="mb-2">More questions ?</h4>
                    <div class="text-gray-600">See our FAQ for more details</div>
                    <p class="text-gray-600 mt-2 ">
                        Get Fast, Affordable, Reliable Flights to Makkah and Madina for Umrah and Hajj.
                    </p>

                    <!-- <div class="relative text-gray-600 mt-8">
                        <input type="text" name="search" v-model="searchText" placeholder="Search"
                            class="bg-white w-full h-10 px-5 rounded-full text-sm focus:outline-none border border-[#EDAC24] focus:ring-[#EDAC24] focus:border-[#EDAC24]" />
                        <button type="button" @click="search"
                            class="focus:outline-none absolute right-0 top-0 mt-2 mr-4">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div> -->
                </div>
            </div>
            <div class="lg:w-2/3 lg:py-8 pr-3 sm:px-5">
                <div class="menu__container space-y-7">
                    <div class="">
                        <div
                            class="menu__heading__container flex items-center justify-between pb-7 border-b border-[#DFDFDF] border-solid cursor-pointer" onclick="toggleAccordion(this)">
                            <h3 class="">How to Book Flights?</h3>
                            <button class="" ><i
                                    class="fa-solid fa-chevron-down"></i></button>
                        </div>
                        <div class="menu__detail__container hidden py-7">
                            <p>You can contact our Professional Travel Consultants on 0203 925 8000, for your Flights to the holiest hub of Muslims. You can get both direct and indirect flights to the Kingdom of Saudi Arabia.
Please note that you should check your flight status 72 hours prior to your departure time as there may be a flight delays or cancellations by the airline.</p>
                        </div>
                    </div>
                    <div class="">
                        <div
                            class="menu__heading__container flex items-center justify-between pb-7 border-b border-[#DFDFDF] border-solid cursor-pointer" onclick="toggleAccordion(this)">
                            <h3 class="">How do I get a visa?</h3>
                            <button><i class="fa-solid fa-chevron-down"></i></button>
                        </div>
                        <div class="menu__detail__container hidden py-7 space-y-3">
                            <p>There are two types of visas available for Umrah: <br>
</p>
<p>
• Tourist Visa <br>
• Umrah Visa
<br> </p>
<p> For a Tourist Visa, if you hold European nationality, you can obtain an E-Visa for Saudi Arabia. The E-Visa is valid for 1 year, with multiple entries of up to 90 days on each stay. The application for an E-Visa is submitted to the Saudi Embassy, which reserves the right to approve or reject any visa application. Please note that in case of E-Visa rejection, the fee is non-refundable.
<br>
</p>
<p>
For an Umrah Visa, if you hold non-European nationality, you need to apply for an Umrah Visa, which is valid for 90 days with single entry only. To obtain an Umrah Visa, you must download the Saudi Bio App from the Google Play Store and complete the enrollment process by scanning your documents. Afterward, you need to send the enrollment ID received from mofa.govt.sa to us for further visa processing. Please be aware that Umrah Visa holders are not permitted to visit any other city of Saudi Arabia except Makkah & Madinah</p>
                        </div>
                    </div>
                    <div class="">
                        <div
                            class="menu__heading__container flex items-center justify-between pb-7 border-b border-[#DFDFDF] border-solid cursor-pointer" onclick="toggleAccordion(this)">
                            <h3 class="font-medium">Documents Required for Umrah Visa:</h3>
                            <button><i class="fa-solid fa-chevron-down"></i></button>
                        </div>
                        <div class="menu__detail__container hidden py-7 space-y-3">
                           <p>1- Original Passport.</p>
                            <p>2- Original BRP (British Residence Permit Card).</p>
                            <p>3- Two photos with white/grey background.</p>
                            <p>4- Valid copy of issued E-Tickets.</p>
                            <p>5- Valid copy of issued Hotel Vouchers.</p>
                            <p>You need to submit all these documents to our Head office 7 Continents Travel Ltd
                                 for issuance of Visa. You can submit these documents physically or even you can send these documents via post with return paid envelope address.</p>

                        </div>
                    </div>
                    <div class="">
                        <div
                            class="menu__heading__container flex items-center justify-between pb-7 border-b border-[#DFDFDF] border-solid cursor-pointer" onclick="toggleAccordion(this)">
                            <h3 class="font-medium">How do I book my hotel accommodations?</h3>
                            <button><i class="fa-solid fa-chevron-down"></i></button>
                        </div>
                        <div class="menu__detail__container hidden py-7 space-y-3">
                            <p>To secure your hotel accommodation in Makkah and Madinah, please contact our expert travel counsellors at 0203 925 8000. They will assist you in finding the best available hotels in Makkah and Madinah that align with your preferences and budget.</p>
                            <p>Feel free to inquire about any additional information from our experts, such as the distance between the hotel and Haram, availability of shuttle services, and the availability of rooms with views of Haram and Kaaba. <b>Maximum of 2 children under the age of 6 can stay free of charge when accompanied by their family members. </b> Children aged 6 and above will be charged the same rate as adults.</p>
                            <p>Kindly note that sometimes under uncertain situations, if hotels change or cancel the reservations without prior notice, we are 24/7 available to help you instantly with the similar category hotel or the upgraded one.</p>
                        </div>
                    </div>
                    <div class="">
                        <div
                            class="menu__heading__container flex items-center justify-between pb-7 border-b border-[#DFDFDF] border-solid cursor-pointer" onclick="toggleAccordion(this)">
                            <h3 class="font-medium">Do we provide transportation and Ziarat services?</h3>
                            <button><i class="fa-solid fa-chevron-down"></i></button>
                        </div>
                        <div class="menu__detail__container hidden py-7 space-y-3">
                            <p>If you require transfers in Makkah and Madinah, Yes we do provide with the best transport company in Saudi Arabia. Please contact our skillful advisor at 0203 925 8000. We have trusted suppliers in Saudi Arabia who provide very punctual transportation services to our customers. Additionally, we can arrange the ziarats with special rates both in Makkah and Madinah. If you need a tour guide, we can arrange with an additional cost. We offer a range of latest model vehicles including Ford, Camry, Saloon, HiAce, GMC, Hyundai H-1, Coaster, and Buses.</p>
                            <p>Once you book your transportation with us, your travel consultant will send you a transport voucher. The voucher will include our suppliers’ contact & booking number for the smooth coordination.</p>
                        </div>
                    </div>
                    <div class="">
                        <div
                            class="menu__heading__container flex items-center justify-between pb-7 border-b border-[#DFDFDF] border-solid cursor-pointer" onclick="toggleAccordion(this)">
                            <h3 class="font-medium">How to avail transfer?</h3>
                            <button><i class="fa-solid fa-chevron-down"></i></button>
                        </div>
                        <div class="menu__detail__container hidden py-7 space-y-3">
                           <p>Once you land at Jeddah/ Madinah Airport you are required to buy local Saudi Sim in order to keep in touch with our own transport supplier for internal ground transfers.</p>
                            <p>OR</p>
                            <p>A representative from our supplier can also contact you via WhatsApp one day prior to your departure to confirm your transport reservation or vice versa.</p>
                        </div>
                    </div>

                    <div class="">
                        <div
                            class="menu__heading__container flex items-center justify-between pb-7 cursor-pointer" onclick="toggleAccordion(this)">
                            <h3 class="font-medium">How to Contact Visit Haram?</h3>
                            <button><i class="fa-solid fa-chevron-down"></i></button>
                        </div>
                        <div class="menu__detail__container hidden py-7 space-y-3 border-t border-[#DFDFDF] border-solid">
                           <p>To get in touch with Visit Haram, you can use the following contact information:</p>
                           <p>• Dial: <a class="font-medium text-blue-600 hover:underline" href="tel:0203 925 8000">0203 925 8000</a></p>
                            <p>• WhatsApp Message: <a class="font-medium text-blue-600 hover:underline" href="https://wa.me/02039258000">0203 925 8000</a></p>
                            <p>• Email: <a class="font-medium text-blue-600 hover:underline" href="mailto:info@visitharam.co.uk">info@visitharam.co.uk</a></p>

                            </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<script>
    function toggleAccordion(button) {
        // Find the parent div of sigle menu
        var parentDiv = button.closest('.menu__container > div');
        var accordionButton = parentDiv.querySelector('.menu__heading__container > button');
        accordionButton.classList.toggle('rotate-180');
        // Toggle the 'hidden' class on the grid div within the parent div
        var gridDiv = parentDiv.querySelector('.menu__detail__container');
        gridDiv.classList.toggle('hidden');
        // Toggle the 'grid' class on the grid div within the parent div
        gridDiv.classList.toggle('grid');
    }
</script>

@include('weblayouts.partner')
@include('weblayouts.newsletter')

@endsection
