{{-- OVERLAY (mobile only) --}}
<div id="sidebar-overlay"
     class="fixed inset-0 bg-black/40 z-30 hidden opacity-0 lg:hidden transition-opacity duration-300"
     onclick="closeSidebar()">
</div>

{{-- HAMBURGER BUTTON (mobile only) --}}
<div class="lg:hidden fixed top-3 left-3 z-50">
    <button onclick="toggleSidebar()"
            class="w-10 h-10 bg-white rounded-xl shadow flex items-center justify-center border border-gray-200">
        <i id="hamburger-icon" class="fa-solid fa-bars text-gray-700 text-base"></i>
    </button>
</div>

{{-- SIDEBAR --}}
<aside id="sidebar"
       class="w-52 min-h-screen bg-white border-r border-gray-200 flex flex-col shrink-0 shadow-sm
              fixed top-0 left-0 z-40 -translate-x-full transition-transform duration-300
              lg:relative lg:translate-x-0 lg:z-auto">

    <div class="flex items-center gap-2.5 px-4 py-4 border-b border-gray-100">
        <div class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center shrink-0 shadow">
            <i class="fa-solid fa-boxes-stacked text-white text-sm"></i>
        </div>
        <span class="text-base font-extrabold text-gray-900 tracking-tight">{{ config('app.name') }}</span>
    </div>

    <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 pt-1 pb-2">Utama</p>

        <a href="{{ route('dashboard.index') }}"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('dashboard.index') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-solid fa-dashboard text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('dashboard.index') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-semibold">Dashboard</span>
        </a>

        <a href="{{ route('admin.categories.index') }}"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.categories*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-solid fa-table-cells-large text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.categories*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Kategori</span>
        </a>

        <a href="{{ route('admin.products.index') }}"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.products*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-solid fa-box-open text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.products*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Barang</span>
        </a>

        <a href="{{ route('admin.wishlist') }}"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.wishlist*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-solid fa-shield-heart text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.wishlist*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Barang Favorit</span>
        </a>

        <div class="border-t border-gray-100 my-3"></div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 pb-2">Sistem</p>

        <a href="{{ route('home') }}"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-red-50 hover:text-red-600 transition">
            <i class="fa-solid fa-arrow-left text-sm w-4 text-center shrink-0 text-gray-400"></i>
            <span class="text-sm font-medium">Kembali</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-red-50 hover:text-red-600 transition">
                <i class="fa-solid fa-right-from-bracket text-sm w-4 text-center shrink-0"></i>
                <span class="text-sm font-medium">Logout</span>
            </button>
        </form>
    </nav>
</aside>

<script>
    const sidebar  = document.getElementById('sidebar');
    const overlay  = document.getElementById('sidebar-overlay');
    const icon     = document.getElementById('hamburger-icon');
    let isOpen = false;

    function toggleSidebar() {
        isOpen ? closeSidebar() : openSidebar();
    }

    function openSidebar() {
        isOpen = true;
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        icon.className = 'fa-solid fa-xmark text-gray-700 text-base';
    }

    function closeSidebar() {
        isOpen = false;
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 300);
        icon.className = 'fa-solid fa-bars text-gray-700 text-base';
    }
</script>
