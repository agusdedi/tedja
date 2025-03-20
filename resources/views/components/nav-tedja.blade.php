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
        @guest
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="group rounded-full border border-tedja-black py-[14px] px-5 hover:bg-tedja-black flex items-center transition-all duration-300">
                    <span class="font-semibold transition-all duration-300 group-hover:text-white">Sign In</span>
                </a>
                <a href="{{ route('register') }}" class="group rounded-full border py-[14px] px-5 flex items-center bg-tedja-green">
                    <span class="font-semibold">Sign Up</span>
                </a>
            </div>
        @endguest
        @auth
            <button id="Profile" class="relative">
                <div class="flex items-center gap-[14px]">
                    <div class="flex text-right flex-col gap-0.5">
                        <p class="text-sm text-tedja-secondary">Howdy,</p>
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="flex rounded-full size-[50px] overflow-hidden">
                        <img src="{{ Storage::url(Auth::user()->photo) }}" class="object-cover w-full h-full" alt="photo">
                    </div>
                </div>
                <ul class="hidden absolute top-full mt-[10px] right-0 flex flex-col w-[170px] shrink-0 h-fit text-left rounded-xl border border-tedja-border py-5 px-5 bg-white shadow-[0px_10px_30px_0px_#B8B8B840] gap-[14px]">
                    <li>
                        <a href="#" class="transition-all duration-300 hover:text-tedja-blue">Rewards</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="transition-all duration-300 hover:text-tedja-blue">My Mortgages</a>
                    </li>
                    <li>
                        <a href="#" class="transition-all duration-300 hover:text-tedja-blue">Learn Property</a>
                    </li>
                    <li>
                        <a href="#" class="transition-all duration-300 hover:text-tedja-blue">Settings</a>
                    </li>
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a :href="route('logout')" class="transition-all duration-300 hover:text-tedja-blue"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </button>
        @endauth
    </div>
</nav>