<nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center gap-3">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-2 shrink-0">
            <div class="w-9 h-9 bg-green-600 rounded-xl flex items-center justify-center shadow">
                <i class='bx bx-package text-white text-xl'></i>
            </div>
            <div class="leading-tight hidden sm:block">
                <span class="block text-base font-extrabold text-gray-900 leading-none">{{ config('app.name', 'GrosirKita') }}</span>
                <span class="block text-[10px] font-bold text-green-600 uppercase tracking-widest leading-none">Beli Per Pack</span>
            </div>
            <div class="leading-tight sm:hidden">
                <span class="block text-sm font-extrabold text-gray-900 leading-none">{{ config('app.name', 'GrosirKita') }}</span>
            </div>
        </a>

        {{-- Search bar (desktop) --}}
        <form action="{{ route('product-list') }}" method="GET"
              class="hidden md:flex items-center gap-2 flex-1 max-w-xl">
            <div class="flex-1 flex items-center bg-gray-50 border border-gray-200 rounded-full px-4 py-2 gap-2 focus-within:border-green-500 focus-within:ring-2 focus-within:ring-green-100 transition">
                <i class='bx bx-search text-gray-400 text-lg shrink-0'></i>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama barang grosir..."
                       class="flex-1 bg-transparent text-sm text-gray-700 placeholder-gray-400 focus:outline-none">
            </div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-5 py-2.5 rounded-full transition shadow-sm shrink-0">
                Cari
            </button>
        </form>

        <div class="flex-1 md:hidden"></div>

        {{-- Right side actions --}}
        <div class="flex items-center gap-1.5 shrink-0">

            {{-- Search toggle (mobile only) --}}
            <button onclick="toggleMobileSearch()"
                    class="md:hidden w-9 h-9 flex items-center justify-center rounded-full hover:bg-gray-100 transition">
                <i class='bx bx-search text-gray-600 text-xl'></i>
            </button>

            @auth
                @if (auth()->user()->role === 'admin')
                    {{-- Admin: Dashboard + Logout --}}
                    <a href="{{ route('dashboard.index') }}"
                       class="hidden sm:flex items-center gap-1.5 text-sm font-semibold text-gray-700 border border-gray-300 hover:border-green-500 hover:text-green-600 px-4 py-2 rounded-full transition shrink-0">
                        <i class='bx bx-cog text-base'></i> Dashboard
                    </a>
                    <a href="{{ route('dashboard.index') }}"
                       class="sm:hidden w-9 h-9 flex items-center justify-center rounded-full border border-gray-300 hover:border-green-500 transition">
                        <i class='bx bx-cog text-gray-600 text-xl'></i>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="hidden sm:flex items-center gap-1.5 text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition shrink-0">
                            <i class="bx bx-door-open text-base"></i> Logout
                        </button>
                        <button type="submit"
                                class="sm:hidden w-9 h-9 flex items-center justify-center rounded-full bg-orange-500 hover:bg-orange-600 transition">
                            <i class="bx bx-door-open text-white text-xl"></i>
                        </button>
                    </form>

                @else
                    {{-- User: Wishlist + Logout --}}
                    <a href="{{ route('wishlist.index') }}" class="relative shrink-0 group">
                        <div class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-gray-100 transition">
                            <i class='bx bx-heart text-gray-600 text-xl group-hover:text-green-600 transition'></i>
                        </div>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-orange-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center">
                            {{ $wishlistCount }}
                        </span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="hidden sm:flex items-center gap-1.5 text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition shrink-0">
                            <i class="bx bx-door-open text-base"></i> Logout
                        </button>
                        <button type="submit"
                                class="sm:hidden w-9 h-9 flex items-center justify-center rounded-full bg-orange-500 hover:bg-orange-600 transition">
                            <i class="bx bx-door-open text-white text-xl"></i>
                        </button>
                    </form>
                @endif

            @else
                {{-- Guest: Masuk + Daftar --}}
                <a href="{{ route('login') }}"
                   class="hidden sm:flex items-center gap-1.5 text-sm font-semibold text-gray-700 border border-gray-300 hover:border-green-500 hover:text-green-600 px-4 py-2 rounded-full transition">
                    <i class='bx bx-user text-base'></i> Masuk
                </a>
                <a href="{{ route('login') }}"
                   class="sm:hidden w-9 h-9 flex items-center justify-center rounded-full border border-gray-300 hover:border-green-500 transition">
                    <i class='bx bx-user text-gray-600 text-xl'></i>
                </a>

                <a href="{{ route('register') }}"
                   class="hidden sm:block text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition shadow-sm">
                    Daftar
                </a>
                <a href="{{ route('register') }}"
                   class="sm:hidden w-9 h-9 flex items-center justify-center rounded-full bg-orange-500 hover:bg-orange-600 transition">
                    <i class='bx bx-user-plus text-white text-xl'></i>
                </a>
            @endauth

        </div>
    </div>

    {{-- Mobile search bar (collapsible) --}}
    <div id="mobile-search-bar"
         class="md:hidden overflow-hidden transition-all duration-300 max-h-0 opacity-0 px-4">
        <div class="pb-3">
            <form action="{{ route('product-list') }}" method="GET" class="flex items-center gap-2">
                <div class="flex-1 flex items-center bg-gray-50 border border-gray-200 rounded-full px-4 py-2 gap-2 focus-within:border-green-500 focus-within:ring-2 focus-within:ring-green-100 transition">
                    <i class='bx bx-search text-gray-400 text-lg shrink-0'></i>
                    <input id="mobile-search-input" type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari nama barang grosir..."
                           class="flex-1 bg-transparent text-sm text-gray-700 placeholder-gray-400 focus:outline-none">
                </div>
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2.5 rounded-full transition shadow-sm shrink-0">
                    Cari
                </button>
            </form>
        </div>
    </div>
</nav>

<script>
    let mobileSearchOpen = false;

    function toggleMobileSearch() {
        mobileSearchOpen = !mobileSearchOpen;
        const bar = document.getElementById('mobile-search-bar');
        if (mobileSearchOpen) {
            bar.style.maxHeight = '80px';
            bar.style.opacity = '1';
            setTimeout(() => document.getElementById('mobile-search-input').focus(), 50);
        } else {
            bar.style.maxHeight = '0';
            bar.style.opacity = '0';
        }
    }
</script>
