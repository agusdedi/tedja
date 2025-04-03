@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <x-nav-tedja />

    <main class="flex min-h-screen">
        <form action="{{ route('register') }}" enctype="multipart/form-data" method="POST"
            class="flex items-center flex-1 pl-[calc(((100%-1280px)/2)+75px)]">
            @csrf
            <div
                class="flex flex-col w-[500px] h-[658px] shrink-0 overflow-y-scroll rounded-[20px] border border-tedja-border p-[30px] gap-5 mt-[114px] bg-white hide-scrollbar">
                <h1 class="font-bold text-[28px] leading-[42px]">Sign Up</h1>
                <div class="relative flex items-center gap-5">
                    <div class="flex size-[100px] rounded-full overflow-hidden">
                        <img id="photo-container" src="assets/images/icons/default-avatar.svg"
                            class="object-cover w-full h-full" alt="photo">
                    </div>
                    <input id="file-input" name="photo" type="file" class="absolute opacity-0">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold">Add your photo</p>
                        <button type="button" id="remove-photo"
                            class="hidden rounded-[50px] w-fit py-[6px] px-3 bg-tedja-red font-semibold text-sm text-white">Remove</button>
                        <button type="button" id="add-photo"
                            class="rounded-[50px] w-fit py-[6px] px-3 bg-tedja-green font-semibold text-sm">Add</button>
                    </div>
                    <x-input-error :messages="$errors->get('photo')" class="text-sm text-tedja-red" />
                </div>
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Complete Name</p>
                    <label class="relative">
                        <img src="assets/images/icons/profile.svg"
                            class="absolute transform -translate-y-1/2 size-6 top-1/2 left-5" alt="icon">
                        <input type="text" name="name"
                            class="appearance-none outline-none w-full rounded-full ring-1 ring-tedja-border py-[14px] pl-[54px] px-5 font-semibold placeholder:font-normal focus:ring-1 focus:ring-tedja-blue transition-all duration-300"
                            placeholder="Type your complete name">
                    </label>
                    <x-input-error :messages="$errors->get('name')" class="text-sm text-tedja-red" />
                </div>
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Email Address</p>
                    <label class="relative">
                        <img src="assets/images/icons/sms.svg"
                            class="absolute transform -translate-y-1/2 size-6 top-1/2 left-5" alt="icon">
                        <input type="email" name="email"
                            class="appearance-none outline-none w-full rounded-full ring-1 ring-tedja-border py-[14px] pl-[54px] px-5 font-semibold placeholder:font-normal focus:ring-1 focus:ring-tedja-blue transition-all duration-300"
                            placeholder="Type your email address">
                    </label>
                    <x-input-error :messages="$errors->get('email')" class="text-sm text-tedja-red" />
                </div>
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">WhatsApp Number</p>
                    <label class="relative">
                        <img src="assets/images/icons/messages.svg"
                            class="absolute transform -translate-y-1/2 size-6 top-1/2 left-5" alt="icon">
                        <input type="tel" name="phone"
                            class="appearance-none outline-none w-full rounded-full ring-1 ring-tedja-border py-[14px] pl-[54px] px-5 font-semibold placeholder:font-normal focus:ring-1 focus:ring-tedja-blue transition-all duration-300"
                            placeholder="Type your number">
                    </label>
                    <x-input-error :messages="$errors->get('phone')" class="text-sm text-tedja-red" />
                </div>
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Password</p>
                    <label class="relative">
                        <img src="assets/images/icons/lock.svg"
                            class="absolute transform -translate-y-1/2 size-6 top-1/2 left-5" alt="icon">
                        <input type="password" name="password"
                            class="appearance-none outline-none w-full rounded-full ring-1 ring-tedja-border py-[14px] pl-[54px] px-5 font-semibold placeholder:font-normal focus:ring-1 focus:ring-tedja-blue transition-all duration-300"
                            placeholder="Type your password">
                    </label>
                    <x-input-error :messages="$errors->get('password')" class="text-sm text-tedja-red" />
                </div>
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Password Confirm</p>
                    <label class="relative">
                        <img src="assets/images/icons/lock.svg"
                            class="absolute transform -translate-y-1/2 size-6 top-1/2 left-5" alt="icon">
                        <input type="password" name="password_confirmation"
                            class="appearance-none outline-none w-full rounded-full ring-1 ring-tedja-border py-[14px] pl-[54px] px-5 font-semibold placeholder:font-normal focus:ring-1 focus:ring-tedja-blue transition-all duration-300"
                            placeholder="Type your password">
                    </label>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-sm text-tedja-red" />
                </div>
                <hr class="border-[#F2F2F4]">
                <div class="flex items-center justify-center gap-[6px]">
                    <img src="assets/images/icons/security-safe-blue-fill.svg" class="flex size-6 shrink-0" alt="icon">
                    <p class="font-semibold">All your privacy data secured with our system</p>
                </div>
                <hr class="border-[#F2F2F4]">
                <button type="submit"
                    class="rounded-full py-[14px] px-5 bg-tedja-green w-full text-center font-semibold">Sign up & Get Best
                    Mortgage</button>
            </div>
        </form>
        <div class="relative flex w-full max-w-[640px]">
            <div class="fixed top-0 h-screen w-full max-w-[640px] overflow-hidden">
                <img src="assets/images/backgrounds/login-banner.png" class="object-cover w-full h-full" alt="banner">
                <div class="absolute bottom-0 w-full px-[30px] pb-[30px]">
                    <div class="flex flex-col rounded-[30px] border border-tedja-border p-4 gap-[14px] bg-white">
                        <div class="flex">
                            <img src="assets/images/icons/Star 1.svg" class="flex shrink-0" alt="star">
                            <img src="assets/images/icons/Star 1.svg" class="flex shrink-0" alt="star">
                            <img src="assets/images/icons/Star 1.svg" class="flex shrink-0" alt="star">
                            <img src="assets/images/icons/Star 1.svg" class="flex shrink-0" alt="star">
                            <img src="assets/images/icons/Star 1.svg" class="flex shrink-0" alt="star">
                        </div>
                        <p class="font-semibold leading-[28px]">Tedja by Angga membantu kami mendapatkan rumah idaman
                            dengan
                            interest yang rendah, gaji UMR juga bisa hidup bahagia!</p>
                        <div class="flex items-center gap-[14px]">
                            <div class="flex size-[60px] rounded-full overflow-hidden">
                                <img src="assets/images/photos/profile.png" class="object-cover w-full h-full"
                                    alt="photo profile">
                            </div>
                            <div>
                                <p class="font-semibold">Sarina Dwi</p>
                                <p class="text-sm text-tedja-secondary">House Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('after-scripts')
    <script src="{{ asset('js/photo-upload.js') }}"></script>
@endpush
