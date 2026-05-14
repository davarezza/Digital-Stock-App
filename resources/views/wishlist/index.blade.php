@extends('layouts.main')

@section('title')
    <title>Wishlist | {{ config('app.name') }}</title>
@endsection

@section('container')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex items-center gap-3 mb-8">
        <h1 class="text-2xl font-extrabold text-gray-900 flex items-center gap-3">
            Daftar Barang Favorit
            <span class="text-sm font-bold bg-green-600 text-white px-3 py-1 rounded-full">
                {{ $wishlistCount }} Barang
            </span>
        </h1>
    </div>

    @if ($wishlistCount === 0)
        <div class="w-full h-96 flex flex-col items-center justify-center gap-4 bg-white border border-gray-200 rounded-2xl">
            <i class='bx bxs-heart text-gray-300 text-6xl'></i>
            <p class="text-lg font-bold text-gray-300">Belum ada barang favorit...</p>
            <a href="{{ route('product-list') }}" class="text-sm font-semibold text-green-600 hover:text-green-700 flex items-center gap-1 transition">
                Jelajahi Produk <i class='bx bx-chevron-right'></i>
            </a>
        </div>
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($wishlists as $item)
                @include('partials.product-card', [
                    'product' => $item->product,
                    'wishlistItem' => $item
                ])
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
