<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    </head>
    <body>
        <nav class="relative w-full flex items-center justify-center px-[75px]">
            <div class="fixed top-0 flex items-center justify-between w-full max-w-[1130px] rounded-3xl p-4 bg-white mt-[30px] z-30">
                <a href="{{ route('front.index') }}" class="flex shrink-0">
                    <img src="{{ asset('assets/images/logos/logo-black.svg') }}" alt="logo">
                </a>
                <ul class="flex items-center gap-[30px]">
                    <li class="group active">
                        <a href="{{ route('front.index') }}" class="hover:font-bold group-[.active]:font-bold transition-all duration-300">Home</a>
                    </li>
                    <li class="group">
                        <a href="#" class="hover:font-bold group-[.active]:font-bold transition-all duration-300">Browse</a>
                    </li>
                    <li class="group">
                        <a href="#" class="hover:font-bold group-[.active]:font-bold transition-all duration-300">Rewards</a>
                    </li>
                    <li class="group">
                        <a href="#" class="hover:font-bold group-[.active]:font-bold transition-all duration-300">Stories</a>
                    </li>
                </ul>
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="group rounded-full border border-tedja-black py-[14px] px-5 hover:bg-tedja-black flex items-center transition-all duration-300">
                        <span class="font-semibold transition-all duration-300 group-hover:text-white">Sign In</span>
                    </a>
                    <a href="{{ route('register') }}" class="group rounded-full border py-[14px] px-5 flex items-center bg-tedja-green">
                        <span class="font-semibold">Sign Up</span>
                    </a>
                </div>
            </div>
        </nav>
        <div class="mt-[164px] flex flex-col gap-[6px] text-center items-center">
            <h1 class="font-bold text-4xl leading-[54px]">{{ $category->name }} in {{ $city->name }} City</h1>
            <div class="flex items-center gap-[6px]">
                <img src="assets/images/icons/building-3.svg" class="flex size-6 shrink-0" alt="icon">
                <p class="font-semibold">Available {{ $houses->count() }} House Properties</p>
            </div>
        </div>
        <main class="grid grid-cols-3 w-full max-w-[1280px] px-[75px] gap-[30px] mx-auto my-[50px]">

            @forelse ($houses as $house)
                <a href="{{ route('front.details', $house->slug) }}" class="card">
                    <div class="flex flex-col rounded-[30px] ring-1 ring-tedja-border p-[10px] pb-5 gap-3 bg-white hover:ring-2 hover:ring-tedja-blue transition-all duration-300">
                        <div class="thumbnail-container relative w-full h-[240px] rounded-[30px] overflow-hidden">
                            <img src="{{ Storage::url($house->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail">
                            <button class="absolute top-5 right-5">
                                <img src="assets/images/icons/heart-white-fill.svg" class="size-[50px] flex shrink-0" alt="icon whishlist">
                            </button>
                        </div>
                        <div class="flex flex-col gap-[18px] px-[10px]">
                            <div class="flex flex-col gap-[6px]">
                                <h3 class="text-lg font-bold">
                                    {{ $house->name }}
                                </h3>
                                <div class="flex items-center gap-[6px]">
                                    <img src="assets/images/icons/location.svg" class="flex size-5 shrink-0" alt="icon">
                                    <p class="text-sm font-semibold">
                                        {{ $house->city->name }}
                                    </p>
                                </div>
                            </div>
                            <hr class="border-tedja-border">
                            <div class="grid grid-cols-2 gap-y-[18px] gap-x-3">
                                <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                                    <img src="assets/images/icons/slider-vertical.svg" class="flex size-5 shrink-0" alt="icon">
                                    <p class="text-sm font-semibold">{{ $house->bedroom }} Bedroom</p>
                                </div>
                                <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                                    <img src="assets/images/icons/slider-horizontal.svg" class="flex size-5 shrink-0" alt="icon">
                                    <p class="text-sm font-semibold">{{ $house->bathroom }} Bathroom</p>
                                </div>
                                <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                                    <img src="assets/images/icons/note-favorite.svg" class="flex size-5 shrink-0" alt="icon">
                                    <p class="text-sm font-semibold">{{ $house->certificate }}</p>
                                </div>
                                <div class="flex items-center rounded-[14px] border border-tedja-border p-[10px] gap-[6px]">
                                    <img src="assets/images/icons/maximize-3.svg" class="flex size-5 shrink-0" alt="icon">
                                    <p class="text-sm font-semibold">{{ $house->land_area }} M²</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                Data is empty
            @endforelse
            
        </main>
    </body>
</html>