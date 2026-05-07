<div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 overflow-hidden group flex flex-col">
    <div class="relative overflow-hidden bg-gray-50 aspect-square">
        <img
            src="{{ asset('img/products/' . $product->image) }}"
            alt="{{ $product->name }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
        >

        <div class="absolute top-2.5 right-2.5">
            @auth
                @php
                    $isFavorited = Auth::user()->wishlists->contains('product_id', $product->id);
                @endphp
                @if($isFavorited)
                    <form action="{{ route('wishlist.destroy', $product->id) }}" method="POST"
                          onsubmit="return confirm('Hapus barang ini dari favorit?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-8 h-8 bg-white/90 backdrop-blur-sm border border-red-200 rounded-full flex items-center justify-center text-red-500 shadow-sm transition hover:scale-110">
                            <i class='bx bxs-heart text-base'></i>
                        </button>
                    </form>
                @else
                    <form action="{{ route('wishlist.store') }}" method="POST" onsubmit="return confirm('Tambah ke favorit?')">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="w-8 h-8 bg-white/80 backdrop-blur-sm border border-gray-200 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 shadow-sm transition hover:scale-110">
                            <i class='bx bx-heart text-base'></i>
                        </button>
                    </form>
                @endif
            @else
                <a href="{{ route('login') }}" class="w-8 h-8 bg-white/80 backdrop-blur-sm border border-gray-200 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 shadow-sm">
                    <i class='bx bx-heart text-base'></i>
                </a>
            @endauth
        </div>
    </div>

    <div class="p-4 flex flex-col flex-1">
        <span class="text-[10px] font-black tracking-wider text-green-700 mb-1">{{ $product->category->name ?? '-' }}</span>
        <p class="text-sm font-bold text-gray-800 leading-snug mb-3 flex-1">{{ $product->name }}</p>

        <div class="inline-flex items-center gap-1 bg-orange-50 border border-orange-200 text-orange-700 text-[11px] font-semibold px-2.5 py-1 rounded-full w-fit mb-3">
            <i class='bx bx-package text-xs'></i>
            {{ $product->unit_description }}
        </div>

        <p class="text-lg font-black text-orange-500 mb-1">Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}</p>
    </div>
</div>
