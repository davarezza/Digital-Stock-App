<div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 overflow-hidden group flex flex-col">
    <div class="relative overflow-hidden bg-gray-50 aspect-square">
        <img
            src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        <div class="absolute top-2.5 right-2.5">
            @auth
                @php
                    $wishlistRecord = Auth::user()->wishlists->where('product_id', $product->id)->first();
                    $isFavorited = (bool)$wishlistRecord;
                @endphp

                @if($isFavorited)
                    <form action="{{ route('wishlist.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Hapus dari favorit?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-8 h-8 bg-white/90 backdrop-blur-sm border border-red-200 rounded-full flex items-center justify-center text-red-500 shadow-sm transition hover:scale-110">
                            <i class='bx bxs-heart text-base'></i>
                        </button>
                    </form>
                @else
                    <form action="{{ route('wishlist.store') }}" method="POST">
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
        @if (($product->stock ?? 0) <= 10)
            <span class="absolute top-2 left-2 text-[10px] font-bold bg-red-500 text-white px-2 py-0.5 rounded-full">
                Stok Menipis
            </span>
        @endif
    </div>

    <div class="p-4 flex flex-col flex-1">
        <span class="text-[10px] font-black tracking-wider text-green-700 mb-1 uppercase">
            {{ $product->category->name ?? '-' }}
        </span>
        <p class="text-sm font-bold text-gray-800 leading-snug mb-3 flex-1">
            {{ $product->name }}
        </p>

        <div class="inline-flex items-center gap-1 bg-orange-50 border border-orange-200 text-orange-700 text-[11px] font-semibold px-2.5 py-1 rounded-full w-fit mb-3">
            <i class='bx bx-package text-xs'></i>
            Stok: {{ $product->stock ?? 0 }} pcs
        </div>

        <p class="text-lg font-black text-orange-500 {{ isset($wishlistItem) ? 'mb-3' : 'mb-1' }}">
            Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
        </p>

        @if(isset($wishlistItem))
            <div class="border-t border-gray-100 pt-2 mt-auto">
                <div class="flex items-start justify-between gap-1 mb-1">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Catatan</p>
                    <button type="button"
                        onclick="openNoteModal({{ $wishlistItem->id }}, `{{ addslashes($wishlistItem->note ?? '') }}`)"
                        class="text-[10px] font-semibold text-green-600 hover:text-green-800 flex items-center gap-0.5 transition">
                        <i class="bx bx-edit-alt text-[11px]"></i> Edit
                    </button>
                </div>
                <p class="text-xs text-gray-500 leading-relaxed line-clamp-2 min-h-8">
                    {{ $wishlistItem->note ?? 'Belum ada catatan...' }}
                </p>
            </div>
        @endif
    </div>
</div>
