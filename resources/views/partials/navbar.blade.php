<nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center gap-4">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-2 shrink-0">
            <div class="w-9 h-9 bg-green-600 rounded-xl flex items-center justify-center shadow">
                <i class='bx bx-package text-white text-xl'></i>
            </div>
            <div class="leading-tight">
                <span class="block text-base font-extrabold text-gray-900 leading-none">{{ config('app.name', 'GrosirKita') }}</span>
                <span class="block text-[10px] font-bold text-green-600 uppercase tracking-widest leading-none">Beli Per Dus</span>
            </div>
        </a>

        {{-- Search --}}
        <div class="flex items-center gap-2 w-180 shrink-0">
            <div class="flex-1 flex items-center bg-gray-50 border border-gray-200 rounded-full px-4 py-2 gap-2 focus-within:border-green-500 focus-within:ring-2 focus-within:ring-green-100 transition">
                <i class='bx bx-search text-gray-400 text-lg shrink-0'></i>
                <input
                    type="text"
                    placeholder="Cari produk grosir, brand, atau kategori..."
                    class="flex-1 bg-transparent text-sm text-gray-700 placeholder-gray-400 focus:outline-none"
                >
            </div>
            <button class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-5 py-2.5 rounded-full transition shadow-sm shrink-0">
                Cari
            </button>
        </div>

        {{-- Spacer --}}
        <div class="flex-1"></div>

        {{-- Cart --}}
        <a href="#" class="relative shrink-0 group">
            <div class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 transition">
                <i class='bx bx-cart text-gray-600 text-2xl group-hover:text-green-600 transition'></i>
            </div>
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-orange-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">3</span>
        </a>

        {{-- Auth --}}
        @auth
            @if (auth()->user()->role === 'admin')
            <div class="flex items-center gap-2 shrink-0">
                <a href="#" class="flex items-center gap-1.5 text-sm font-semibold text-gray-700 border border-gray-300 hover:border-green-500 hover:text-green-600 px-4 py-2 rounded-full transition shrink-0">
                    <i class='bx bx-cog text-base'></i> Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition shrink-0">
                        <i class="bx bx-door-open text-base"></i> Logout
                    </button>
                </form>
            </div>
            @else
            <div class="flex items-center gap-2 shrink-0">
                <a href="#" class="flex items-center gap-1.5 text-sm font-semibold text-gray-700 border border-gray-300 hover:border-green-500 hover:text-green-600 px-4 py-2 rounded-full transition shrink-0">
                    <i class='bx bx-user text-base'></i> Profil
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition shrink-0">
                        <i class="bx bx-door-open text-base"></i> Logout
                    </button>
                </form>
            </div>
            @endif
        @else
            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('login') }}" class="flex items-center gap-1.5 text-sm font-semibold text-gray-700 border border-gray-300 hover:border-green-500 hover:text-green-600 px-4 py-2 rounded-full transition">
                    <i class='bx bx-user text-base'></i> Masuk
                </a>
                <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full transition shadow-sm">
                    Daftar
                </a>
            </div>
        @endauth

    </div>
</nav>
