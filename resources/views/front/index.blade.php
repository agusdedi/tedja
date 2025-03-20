@extends('layouts.master')
@section('title', 'Tedja Homepage')
    @section('content')
        <x-nav-tedja/>
        <header class="relative flex flex-col w-full h-[712px]">
            <div class="absolute w-full h-[650px] overflow-hidden">
                <img src="{{ asset('assets/images/backgrounds/hero-image.webp') }}" class="object-cover w-full h-full" alt="hero image">
                <div class="absolute w-full h-full bg-tedja-black/10"></div>
            </div>
            <div class="relative flex flex-col mt-[244px] gap-5 items-center">
                <p class="flex items-center gap-[6px] rounded-full py-[6px] px-3 bg-white bg-white border border-tedja-border">
                    <img src="{{ asset('assets/images/icons/crown.svg') }}" class="flex shrink-0 size-5" alt="icon">
                    <span class="text-sm font-semibold">Top Well-Designed House by Gureen Studio</span>
                </p>
                <h1 class="font-extrabold text-[46px] leading-[60px] text-center text-white">You Deserve Big House</h1>
                <p class="text-lg leading-8 text-center text-white">Dibangun oleh para professional sehingga memberikan<br>kecantikan sejati dan juga kehangatan bersama keluarga.</p>
            </div>
            <form action="{{ route('front.search') }}" class="relative flex w-full max-w-[940px] rounded-3xl p-5 gap-5 bg-white border border-tedja-border shadow-[0px_8px_30px_0px_#06092208] mx-auto mt-auto">
                <div class="flex flex-col w-full max-w-[241px] gap-2 h-[84px]">
                    <p class="font-semibold">Location</p>
                    <label class="relative">
                        <select name="city" id="" class="appearance-none outline-none w-full rounded-full ring-1 ring-tedja-black py-[14px] px-5 font-semibold invalid:font-normal focus:ring-2 focus:ring-tedja-blue transition-all duration-300" required>
                            <option value="" hidden disabled selected>Choose your location</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <img src="{{ asset('assets/images/icons/arrow-down.svg') }}" class="absolute transform -translate-y-1/2 size-5 top-1/2 right-5" alt="icon">
                    </label>
                </div>
                <div class="flex flex-col w-full max-w-[227px] gap-2 h-[84px]">
                    <p class="font-semibold">Category</p>
                    <label class="relative">
                        <select name="category" id="" class="appearance-none outline-none w-full rounded-full ring-1 ring-tedja-black py-[14px] px-5 font-semibold invalid:font-normal focus:ring-2 focus:ring-tedja-blue transition-all duration-300" required>
                            <option value="" hidden disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <img src="{{ asset('assets/images/icons/arrow-down.svg') }}" class="absolute transform -translate-y-1/2 size-5 top-1/2 right-5" alt="icon">
                    </label>
                </div>
                <div class="flex flex-col w-full max-w-[232px] gap-2 h-[84px]">
                    <p class="font-semibold">Property</p>
                    <label class="relative">
                        <select name="property_type" id="" class="appearance-none outline-none w-full rounded-full ring-1 ring-tedja-black py-[14px] px-5 font-semibold invalid:font-normal focus:ring-2 focus:ring-tedja-blue transition-all duration-300" required>
                            <option value="" hidden disabled selected>Select property type</option>
                            <option value="1">House</option>
                        </select>
                        <img src="{{ asset('assets/images/icons/arrow-down.svg') }}" class="absolute transform -translate-y-1/2 size-5 top-1/2 right-5" alt="icon">
                    </label>
                </div>
                <button type="submit" class="group rounded-full border py-[14px] px-5 flex items-center bg-tedja-green mt-auto">
                    <span class="font-semibold text-nowrap">Find Houses</span>
                </button>
            </form>
        </header>
        <section id="Popular-Categories" class="flex flex-col w-full mt-[70px] gap-[30px]">
            <div class="flex flex-col w-full max-w-[1280px] px-[75px] mx-auto">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col gap-1">
                        <h2 class="font-bold text-[26px] leading-10">Popular Categories</h2>
                        <p>Temukan rumah sesuai kebutuhanmu</p>
                    </div>
                    <a href="#" class="group rounded-full border border-tedja-black py-[14px] px-5 hover:bg-tedja-black flex items-center transition-all duration-300">
                        <span class="font-semibold transition-all duration-300 group-hover:text-white">Explore All</span>
                    </a>
                </div>
            </div>
            <div class="w-full overflow-x-hidden swiper">
                <div class="swiper-wrapper">

                    @forelse ($categories as $category)
                        <div class="swiper-slide !w-fit py-0.5 first-of-type:pl-[calc(((100%-1280px)/2)+75px)] last-of-type:pr-[calc(((100%-1280px)/2)+75px)]">
                            <a href="{{ route('front.category', $category->slug) }}" class="card">
                                <div class="flex flex-col w-[240px] shrink-0 rounded-[30px] ring-1 ring-tedja-border bg-white p-[10px] gap-4 hover:ring-2 hover:ring-tedja-blue transition-all duration-300">
                                    <div class="flex w-full h-[240px] overflow-hidden rounded-[30px]">
                                        <img src="{{ Storage::url($category->photo) }}" class="object-cover w-full h-full" alt="thumbnails">
                                    </div>
                                    <div class="flex flex-col gap-2 pb-[10px] pl-[10px]">
                                        <h3 class="text-lg font-bold">
                                            {{ $category->name }}
                                        </h3>
                                        <div class="flex items-center gap-[6px]">
                                            <img src="{{ asset('assets/images/icons/house-2.svg') }}" class="flex size-5 shrink-0" alt="icon">
                                            <p class="text-sm font-semibold">{{ $category->houses->count() }} Houses</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        Data is empty
                    @endforelse

                </div>
            </div>
        </section>
        <section id="Testimonials" class="flex flex-col w-full max-w-[1280px] px-[135px] gap-[31px] mx-auto my-[70px]">
            <div class="flex flex-col gap-1 text-center">
                <h2 class="font-bold text-[26px] leading-10">Happy Families</h2>
                <p>Kami hadir membuatmu bahagia</p>
            </div>
            <div id="Slider-Container" class="relative flex gap-[30px] w-[1010px] h-[650px] shrink-0 overflow-hidden">
                <div class="gradient absolute z-10 top-0 w-full h-[186px] bg-[linear-gradient(180deg,rgba(250,250,250,0)_0%,#FAFAFA_100%)] rotate-180"></div>
                <div class="gradient absolute z-10 bottom-0 w-full h-[100px] bg-[linear-gradient(180deg,rgba(250,250,250,0)_0%,#FAFAFA_100%)]"></div>
                <div class="slider slide-up w-[230px] h-max flex flex-col flex-nowrap shrink-0">
                    <div class="h-max">
                        <div class="content flex flex-col gap-[30px] pt-[30px]">
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-2.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-3.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-4.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-5.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-max">
                        <div class="content flex flex-col gap-[30px] pt-[30px]">
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-2.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-3.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-4.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-5.png') }}" class="object-cover w-full h-full" alt="photo profile">
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
                <div class="slider slide-down w-[230px] h-max flex flex-col flex-nowrap shrink-0">
                    <div class="h-max">
                        <div class="content flex flex-col gap-[30px] pb-[30px]">
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-2.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-3.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-4.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-5.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-max">
                        <div class="content flex flex-col gap-[30px] pb-[30px]">
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-2.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-3.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-4.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-5.png') }}" class="object-cover w-full h-full" alt="photo profile">
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
                <div class="slider slide-up w-[230px] h-max flex flex-col flex-nowrap shrink-0">
                    <div class="h-max">
                        <div class="content flex flex-col gap-[30px] pt-[30px]">
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-2.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-3.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-4.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-5.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-max">
                        <div class="content flex flex-col gap-[30px] pt-[30px]">
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-2.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-3.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-4.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-5.png') }}" class="object-cover w-full h-full" alt="photo profile">
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
                <div class="slider slide-down w-[230px] h-max flex flex-col flex-nowrap shrink-0">
                    <div class="h-max">
                        <div class="content flex flex-col gap-[30px] pb-[30px]">
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-2.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-3.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-4.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-5.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-max">
                        <div class="content flex flex-col gap-[30px] pb-[30px]">
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-2.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Awalnya takut dibawa kabur duitnya lalu dolor dicoba kok malah amet lorem dolor si happines puas pokoknya mas</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-3.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-4.png') }}" class="object-cover w-full h-full" alt="photo profile">
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarina Dwi</p>
                                        <p class="text-sm text-tedja-secondary">House Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card flex flex-col w-full rounded-[30px] border border-tedja-border bg-white p-4 gap-[14px]">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0" alt="star">
                                </div>
                                <p class="font-semibold leading-[28px]">Beneran membantu banget tanpa basa basi KPR langsung beres</p>
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex size-[60px] rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/images/photos/profile-5.png') }}" class="object-cover w-full h-full" alt="photo profile">
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
            </div>
        </section>
    @endsection
    @push('after-styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    @endpush

        @push('after-scripts')
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
            <script src="{{ asset('js/home.js') }}"></script>
        @endpush
