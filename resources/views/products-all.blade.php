@extends('layouts.main')

@section('title')
    <title>Semua Barang | {{ config('app.name') }}</title>
@endsection

@section('container')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-extrabold text-gray-900">Semua Barang</h1>
            <p class="text-sm text-gray-400 mt-1">{{ $productCount }} produk tersedia</p>
        </div>
        <div class="flex items-center gap-2 flex-wrap mb-7">
        <a href="{{ route('product-list') }}"
        class="px-4 py-1.5 rounded-full text-sm font-semibold transition
                {{ !request('category') && !request('best_seller') ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
            Semua
        </a>

        <a href="{{ route('product-list', ['best_seller' => 1]) }}"
        class="px-4 py-1.5 rounded-full text-sm font-semibold transition
                {{ request('best_seller') ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
            <i class='bx bxs-hot mr-1'></i> Terlaris
        </a>

        @foreach ($categories as $cat)
        <a href="{{ route('product-list', ['category' => str()->slug($cat->name)]) }}"
        class="px-4 py-1.5 rounded-full text-sm font-semibold transition
                {{ request('category') === str()->slug($cat->name) ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
            {{ $cat->name }}
        </a>
        @endforeach
    </div>

    @if(request('search'))
        <div class="mb-4">
            <p class="text-sm text-gray-500">Menampilkan hasil pencarian untuk: <span class="font-bold text-gray-900">"{{ request('search') }}"</span></p>
        </div>
    @endif

    @if ($products->isEmpty())
    <div class="flex flex-col items-center justify-center py-24 text-center">
        <div class="w-20 h-20 bg-gray-100 rounded-3xl flex items-center justify-center mb-5">
            <i class="bx bx-box text-gray-300 text-3xl"></i>
        </div>
        <h2 class="text-base font-bold text-gray-600 mb-1">Tidak ada produk</h2>
        <p class="text-sm text-gray-400">Coba pilih kategori yang lain</p>
    </div>

    @else
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($products as $product)
            @include('partials.product-card', ['product' => $product])
        @endforeach
    </div>

    @if ($products->hasPages())
    <div class="mt-8">
        {{ $products->appends(request()->query())->links() }}
    </div>
    @endif

    @endif
</div>

@endsection
