<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<form action="{{ route('form.submit') }}" id="customQuoteForm" method="POST" class="bg-white rounded-b-xl xl:rounded-b-[20px] px-5 lg:px-8 py-6 flex flex-col justify-between">
    @csrf
    <div class="grid sm:grid-cols-2 lg:grid-cols-5 items-start gap-x-3 md:gap-x-5 gap-y-1">
        <div class="mb-5 w-full">
            <label for="first_name" class="block mb-1 text-sm font-medium text-[#808080]">Your Name</label>
            <input type="text" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" placeholder="Enter Your Name" required>
            <p class="text-red-500 text-sm mt-1 hidden" id="first_nameError">Please enter your name.</p>
        </div>
        <input type="hidden" id="type" name="type" value="custom quote">

        <div class="mb-5 w-full">
            <label for="email" class="block mb-1 text-sm font-medium text-[#808080]">Your Email</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" placeholder="Enter Email Address" required>
            <p class="text-red-500 text-sm mt-1 hidden" id="emailError">Please enter a valid email address.</p>
        </div>
        <div class="mb-5 w-full relative">
            <label for="phone_number" class="block mb-1 text-sm font-medium text-[#808080] ">Mobile Number</label>
            <div class="w-full">
                <div class="flex items-center">
{{--                    <select id="country_code" name="country_code" class="minimal w-[100px] sm:w-[70px] lg:w-[80px] xl:w-[90px] h-[36.6px] xl:h-[41.6px] bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-l-lg rounded-r-none focus:ring-[#E1C844] focus:border-[#E1C844] block p-2.5">--}}
{{--                        @foreach($dialCodes as $dialCode)--}}
{{--                            <option value="{{ $dialCode['code'] }}">+{{ $dialCode['code'] }} {{ $dialCode['iso'] }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
                    <div class="relative w-full">
                        <input type="number" id="phone_number" name="phone_number" class="h-[36.6px] xl:h-[41.6px] bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter phone number" required />
                    </div>
                </div>
            </div>
            <p class="text-red-500 text-sm mt-1 hidden" id="phone_numberError">Please enter your phone number.</p>
        </div>

        <div class="mb-5 w-full">
            <label for="adults" class="block mb-1 text-sm font-medium text-[#808080]">Number of Passengers</label>
            <select id="adults" name="adults" class="minimal bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5">
                <option value="">Select Passengers</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">8</option>
                <option value="7">9</option>
                <option value="7">10</option>
                <option value="7">11</option>
                <option value="7">12</option>
                <option value="7">13</option>
                <option value="7">14</option>
                <option value="7">15</option>
            </select>
            <p class="text-red-500 text-sm mt-1 hidden" id="adultsError">Please select the number of passengers.</p>
        </div>
        <div class="mb-5 w-full">
            <label for="number_of_days" class="block mb-1 text-sm font-medium text-[#808080]">Number of Nights</label>
            <select id="number_of_days" name="number_of_days" class="minimal bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5">
                <option value="">Select Nights</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">8</option>
                <option value="7">9</option>
                <option value="7">10</option>
                <option value="7">11</option>
                <option value="7">12</option>
                <option value="7">13</option>
                <option value="7">14</option>
                <option value="7">15</option>
            </select>
            <p class="text-red-500 text-sm mt-1 hidden" id="number_of_daysError">Please select the number of nights.</p>
        </div>
    </div>
    <div class="gap-5 sm:gap-0 sm:flex-nowrap flex-wrap items-center justify-between">
        <div class="pt-5">
            <div class="g-recaptcha scale-90 sm:scale-100 mr-auto" data-sitekey="6LfsazcqAAAAAL6PlC9ke4DpTv_Q4Il_qir001sZ"></div>
            <div class="recaptcha-error text-red-500"></div>
        </div>

        <div class="flex items-center mt-4">
            <input id="default-checkbox" type="checkbox" name="email_checkbox" value="1" class="!shadow-none sm:w-4 sm:h-4 h-6 w-6 bg-[#F9FAFB] border border-[#D1D5DB] rounded text-blue-600">
            <label for="default-checkbox" class="ms-2 text-sm font-normal text-black select-none">I want deals via phone calls and promotions through emails.</label>
        </div>
        <button type="submit" id="submitBtn" class="uppercase mt-4 text-white bg-[#110928] rounded-full px-6 md:px-10 py-2">Submit Enquiry</button>
    </div>
</form>
