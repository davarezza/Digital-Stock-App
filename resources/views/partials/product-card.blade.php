<div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 overflow-hidden group flex flex-col">

    {{-- Image --}}
    <div class="relative overflow-hidden bg-gray-50 aspect-square">
        <img
            src="{{ $product['img'] }}"
            alt="{{ $product['name'] }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
        >
        {{-- Wishlist --}}
        <button class="absolute top-2.5 right-2.5 w-8 h-8 bg-white/80 backdrop-blur-sm border border-gray-200 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-300 transition shadow-sm">
            <i class='bx bx-heart text-base'></i>
        </button>
    </div>

    {{-- Content --}}
    <div class="p-4 flex flex-col flex-1">
        {{-- Brand badge --}}
        <span class="text-[10px] font-black tracking-wider text-green-700 mb-1">{{ $product['brand'] }}</span>

        {{-- Name --}}
        <p class="text-sm font-bold text-gray-800 leading-snug mb-3 flex-1">{{ $product['name'] }}</p>

        {{-- Qty badge --}}
        <div class="inline-flex items-center gap-1 bg-orange-50 border border-orange-200 text-orange-700 text-[11px] font-semibold px-2.5 py-1 rounded-full w-fit mb-3">
            <i class='bx bx-package text-xs'></i>
            {{ $product['qty'] }}
        </div>

        {{-- Price --}}
        <p class="text-lg font-black text-orange-500 mb-1">{{ $product['price'] }}</p>

        {{-- Rating --}}
        <div class="flex items-center gap-1 mb-4">
            <i class='bx bxs-star text-yellow-400 text-sm'></i>
            <span class="text-xs font-semibold text-gray-600">{{ $product['rating'] }}</span>
        </div>

        {{-- Add to cart --}}
        <button class="w-full flex items-center justify-center gap-2 py-2.5 border-2 border-green-500 text-green-700 text-sm font-bold rounded-full hover:bg-green-600 hover:text-white transition duration-200">
            <i class='bx bx-cart text-base'></i>
            Tambah Keranjang
        </button>
    </div>

</div>
