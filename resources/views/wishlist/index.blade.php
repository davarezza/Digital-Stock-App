@extends('layouts.main')

@section('title')
    <title>Wishlist | {{ config('app.name') }}</title>
@endsection

@section('container')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex items-center gap-3 mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-gray-900 flex items-center gap-3">
                Daftar Keinginan
                <span class="text-sm font-bold bg-green-600 text-white px-3 py-1 rounded-full">
                    {{ $wishlistCount }} Barang
                </span>
            </h1>
            <p class="text-sm text-gray-400 mt-1">Barang yang ingin kamu pesan dari {{ config('app.name') }}</p>
        </div>
    </div>

    @if ($wishlistCount === 0)
    <div class="flex flex-col items-center justify-center py-24 text-center">
        <div class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center mb-6">
            <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-14 h-14">
                <path d="M40 15C40 15 22 24 22 38C22 46.84 30.06 54 40 54C49.94 54 58 46.84 58 38C58 24 40 15 40 15Z" fill="#f3f4f6" stroke="#d1d5db" stroke-width="2"/>
                <path d="M32 38C32 33.58 35.58 30 40 30" stroke="#9ca3af" stroke-width="2.5" stroke-linecap="round"/>
                <circle cx="55" cy="55" r="12" fill="#f3f4f6" stroke="#d1d5db" stroke-width="2"/>
                <path d="M51 55H59M55 51V59" stroke="#9ca3af" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <h2 class="text-lg font-bold text-gray-700 mb-2">Wishlist masih kosong</h2>
        <p class="text-sm text-gray-400 mb-6 max-w-xs">Tambahkan barang yang kamu inginkan dari katalog produk kami</p>
        <a href="/"
           class="flex items-center gap-2 bg-gray-900 hover:bg-gray-700 text-white text-sm font-semibold px-6 py-3 rounded-full transition shadow-sm">
            <i class="fa-regular fa-arrow-left text-xs"></i>
            Kembali ke Katalog
        </a>
    </div>

    @else
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($wishlists as $item)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col group"
             id="wishlist-card-{{ $item->id ?? $loop->index }}">
            <div class="relative overflow-hidden bg-gray-50 aspect-square">
                @if (!empty($item->product->image))
                    <img src="{{ asset('img/products/' . $item->product->image) }}"
                         alt="{{ $item->product->name }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="bx bx-image text-gray-300 text-4xl"></i>
                    </div>
                @endif
                @if (($item->product->stock ?? 0) <= 10)
                    <span class="absolute top-2 left-2 text-[10px] font-bold bg-red-500 text-white px-2 py-0.5 rounded-full">
                        Stok Menipis
                    </span>
                @endif
                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST"
                    onsubmit="return confirm('Hapus dari wishlist?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="absolute top-2 right-2 w-8 h-8 bg-white/90 backdrop-blur-sm border border-red-100 rounded-full flex items-center justify-center text-red-500 shadow-sm transition hover:scale-110">
                        <i class="bx bxs-heart text-xl"></i> {{-- Pakai bxs-heart biar solid --}}
                    </button>
                </form>
            </div>

            <div class="p-3 flex flex-col flex-1">
                <span class="text-[10px] font-black tracking-wider text-green-700 uppercase mb-1">
                    {{ $item->product->category->name ?? 'Tanpa Kategori' }}
                </span>
                <p class="text-sm font-bold text-gray-800 leading-snug mb-2 flex-1">
                    {{ $item->product->name ?? 'Produk tidak tersedia' }}
                </p>
                <div class="inline-flex items-center gap-1 bg-orange-50 border border-orange-200 text-orange-700 text-[10px] font-semibold px-2 py-0.5 rounded-full w-fit mb-2">
                    <i class="fa-solid fa-box text-[9px]"></i>
                    Stok: {{ $item->product->stock ?? 0 }} pcs
                </div>
                <p class="text-base font-black text-orange-500 mb-3">
                    Rp {{ number_format($item->product->price ?? 0, 0, ',', '.') }}
                </p>
                <div class="border-t border-gray-100 pt-2">
                    <div class="flex items-start justify-between gap-1 mb-1">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Catatan</p>
                        <button type="button"
                            onclick="openNoteModal({{ $item->id ?? 0 }}, `{{ addslashes($item->note ?? '') }}`)"
                            class="text-[10px] font-semibold text-green-600 hover:text-green-800 flex items-center gap-0.5 transition">
                            <i class="fa-regular fa-pen-to-square text-[9px]"></i>
                            Edit
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 leading-relaxed line-clamp-2 min-h-8"
                       id="note-text-{{ $item->id ?? $loop->index }}">
                        {{ $item->note ?? 'Belum ada catatan...' }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<div id="note-modal" class="fixed inset-0 z-50 hidden items-center justify-center px-4">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeNoteModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 z-10">
        <h3 class="text-sm font-extrabold text-gray-900 mb-1">Edit Catatan</h3>
        <p class="text-xs text-gray-400 mb-4">Tambahkan catatan untuk barang ini (misal: warna, ukuran, atau jumlah yang diinginkan)</p>
        <form id="note-form" method="POST">
            @csrf @method('PATCH')
            <textarea name="note" id="note-input" rows="4"
                placeholder="Contoh: Warna merah, ukuran L, butuh 2 dus..."
                class="w-full px-4 py-3 text-sm text-gray-800 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition placeholder-gray-300 resize-none mb-4"></textarea>
            <div class="flex gap-2">
                <button type="button" onclick="closeNoteModal()"
                    class="flex-1 py-2.5 text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 py-2.5 text-sm font-semibold text-white bg-gray-900 hover:bg-gray-700 rounded-xl transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@if ($wishlistCount > 0)
    <div class="mt-2 mx-4 bg-white border border-gray-200 rounded-2xl shadow-sm px-5 py-4 flex items-center justify-between gap-4">
        <div>
            <p class="text-xs text-gray-400 font-medium">Total Wishlist</p>
            <p class="text-lg font-extrabold text-gray-900">
                {{ $wishlistCount }} Barang
            </p>
        </div>
        <a href="{{ $waUrl }}"
            target="_blank"
            class="flex items-center gap-2 bg-gray-900 hover:bg-gray-700 text-white text-sm font-semibold px-6 py-3 rounded-full transition shadow-sm">
            <i class='bx bxl-whatsapp text-2xl'></i>
            Kirim Pesan ke WA
        </a>
    </div>
@endif

<script>
    const noteModal = document.getElementById('note-modal');
    const noteForm  = document.getElementById('note-form');
    const noteInput = document.getElementById('note-input');

    function openNoteModal(id, currentNote) {
        noteInput.value = currentNote;
        noteForm.action = `/wishlist/${id}/note`;
        noteModal.classList.remove('hidden');
        noteModal.classList.add('flex');
        setTimeout(() => noteInput.focus(), 100);
    }
    function closeNoteModal() {
        noteModal.classList.add('hidden');
        noteModal.classList.remove('flex');
    }
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeNoteModal();
    });
</script>

@endsection
