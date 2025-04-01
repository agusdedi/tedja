@extends('layouts.master')
@section('title', 'Success Request Mortgage')
@section('content')
    <x-nav-tedja />
    <div class="flex justify-center gap-[50px] mt-[202px] mb-[70px]">
        <div class="flex flex-col h-fit rounded-[30px] ring-1 ring-tedja-border p-[10px] pb-5 gap-3 bg-white">
            <div class="thumbnail-container relative w-full h-[240px] rounded-[30px] overflow-hidden">
                <img src="{{ Storage::url($interest->house->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail">
            </div>
            <div class="flex flex-col gap-[18px] px-[10px]">
                <div class="flex flex-col gap-[6px]">
                    <h3 class="text-lg font-bold">
                        {{ $interest->house->name }}
                    </h3>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/location.svg') }}" class="flex size-5 shrink-0"
                            alt="icon">
                        <p class="text-sm font-semibold">
                            {{ $interest->house->city->name }}
                        </p>
                    </div>
                </div>
                <hr class="border-tedja-border">
                <div class="grid grid-cols-2 gap-y-[18px] gap-x-3">
                    <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                        <img src="{{ asset('assets/images/icons/slider-vertical.svg') }}" class="flex size-5 shrink-0"
                            alt="icon">
                        <p class="text-sm font-semibold">{{ $interest->house->bedroom }} Bedroom</p>
                    </div>
                    <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                        <img src="{{ asset('assets/images/icons/slider-horizontal.svg') }}" class="flex size-5 shrink-0"
                            alt="icon">
                        <p class="text-sm font-semibold">{{ $interest->house->bathroom }} Bathroom</p>
                    </div>
                    <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                        <img src="{{ asset('assets/images/icons/building-3.svg') }}" class="flex size-5 shrink-0"
                            alt="icon">
                        <p class="text-sm font-semibold">{{ $interest->house->building_area }} M²</p>
                    </div>
                    <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                        <img src="{{ asset('assets/images/icons/maximize-3.svg') }}" class="flex size-5 shrink-0"
                            alt="icon">
                        <p class="text-sm font-semibold">{{ $interest->house->land_area }} M²</p>
                    </div>
                    <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                        <img src="{{ asset('assets/images/icons/note-favorite.svg') }}" class="flex size-5 shrink-0"
                            alt="icon">
                        <p class="text-sm font-semibold">{{ $interest->house->certificate }}</p>
                    </div>
                    <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                        <img src="{{ asset('assets/images/icons/flash.svg') }}" class="flex size-5 shrink-0"
                            alt="icon">
                        <p class="text-sm font-semibold">{{ $interest->house->electric }} Watts</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-[499px] shrink-0 gap-[33px] justify-center items-center">
            <img src="{{ asset('assets/images/icons/crown-green-fill.svg') }}" class="flex size-20 shrink-0"
                alt="icon">
            <div class="flex flex-col gap-4">
                <h1 class="text-2xl font-bold leading-9 text-center">It’s Done, Yay, Good Job! <br>Now is Waiting for Bank
                    Approval</h1>
                <p>Kami akan membantu anda mengajukan kepada bank terkait sehingga hasil yang diharapkan sesuai dengan
                    ekspetasi</p>
            </div>
            <div class="flex items-center justify-center gap-3">
                <a href="{{ route('dashboard') }}"
                    class="rounded-full py-[14px] px-5 w-[194px] text-center font-semibold text-white bg-tedja-black">
                    My Mortgages
                </a>
                <a href="{{ route('front.index') }}"
                    class="rounded-full py-[14px] px-5 w-[194px] text-center font-semibold bg-tedja-green">
                    Explore Houses
                </a>
            </div>
        </div>
    </div>
@endsection
