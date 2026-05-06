<aside id="sidebar" class="w-52 min-h-screen bg-white border-r border-gray-200 flex flex-col shrink-0 transition-all duration-300 overflow-hidden shadow-sm">
    <div class="flex items-center gap-2.5 px-4 py-4 border-b border-gray-100">
        <div class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center shrink-0 shadow">
            <i class="fa-solid fa-boxes-stacked text-white text-sm"></i>
        </div>
        <span class="text-base font-extrabold text-gray-900 tracking-tight">{{ config('app.name') }}</span>
    </div>

    <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 pt-1 pb-2">Main</p>
        <a href="{{ route('dashboard.index') }}"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('dashboard.index') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-solid fa-chart-pie text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('dashboard.index') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-semibold">Dashboard</span>
        </a>

        <a href="{{ route('admin.categories.index') }}"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.categories*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-regular fa-box text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.categories*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Kategori</span>
        </a>

        <a href="{{ route('admin.products.index') }}"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.products*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-regular fa-chart-bar text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.products*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Barang</span>
        </a>

        <a href="#"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.layouts*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-regular fa-table-layout text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.layouts*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Pesanan</span>
        </a>

        <a href="#"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.application*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-regular fa-grid text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.application*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Wishlist</span>
        </a>

        <div class="border-t border-gray-100 my-3"></div>

        {{-- Admin --}}
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 pb-2">Admin</p>

        <a href="#"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.super*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-regular fa-user-shield text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.super*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Super Admin</span>
        </a>

        <div class="border-t border-gray-100 my-3"></div>

        {{-- System --}}
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 pb-2">System</p>

        <a href="#"
           class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl transition
                  {{ request()->routeIs('admin.settings*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fa-regular fa-gear text-sm w-4 text-center shrink-0
                      {{ request()->routeIs('admin.settings*') ? 'text-white' : 'text-gray-400' }}"></i>
            <span class="text-sm font-medium">Settings</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-red-50 hover:text-red-600 transition">
                <i class="fa-regular fa-right-from-bracket text-sm w-4 text-center shrink-0"></i>
                <span class="text-sm font-medium">Logout</span>
            </button>
        </form>
    </nav>
</aside>
