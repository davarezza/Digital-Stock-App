@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Kategori Barang</title>
@endsection

@section('container')
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Master Data</p>
        <h1 class="text-xl font-extrabold text-gray-900">Kategori Barang</h1>
    </div>
    <a href="{{ route('admin.categories.create') }}"
       class="flex items-center gap-2 bg-gray-900 hover:bg-gray-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
        <i class="fa-solid fa-plus text-xs"></i>
        Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm" id="category-table">
            <thead>
                <tr class="text-[11px] font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 bg-gray-50/60">
                    <th class="text-left px-5 py-3 w-14">#</th>
                    <th class="text-left px-5 py-3">Kategori</th>
                    <th class="text-left px-5 py-3">Nama</th>
                    <th class="text-center px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50" id="table-body">

                @forelse ($categories ?? [] as $index => $category)
                <tr class="hover:bg-gray-50/60 transition table-row">
                    <td class="px-5 py-4 text-xs text-gray-400 font-medium">
                        {{ $index + 1 }}
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl overflow-hidden bg-gray-100 shrink-0 border border-gray-200">
                                @if ($category->image)
                                    <img src="{{ asset('img/categories/' . $category->image) }}"
                                         alt="{{ $category->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fa-regular fa-image text-gray-300 text-base"></i>
                                    </div>
                                @endif
                            </div>
                            <span class="text-xs text-gray-400 font-mono bg-gray-100 px-2 py-0.5 rounded-lg">
                                {{ $category->slug ?? \Str::slug($category->name) }}
                            </span>
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-semibold text-gray-800">{{ $category->name }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               class="flex items-center gap-1.5 text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 px-3 py-1.5 rounded-lg transition">
                                <i class="fa-regular fa-pen-to-square text-xs"></i>
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center gap-1.5 text-xs font-semibold text-red-500 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition">
                                    <i class="fa-regular fa-trash-can text-xs"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Footer --}}
    <div class="px-5 py-3 border-t border-gray-100 bg-gray-50/40 flex items-center justify-between">
        <p class="text-xs text-gray-400">Total <span class="font-semibold text-gray-600">{{ count($categories ?? []) }}</span> kategori terdaftar</p>
        {{-- Pagination (jika pakai Laravel paginator) --}}
        @if (isset($categories) && method_exists($categories, 'links'))
            <div class="text-xs">{{ $categories->links() }}</div>
        @endif
    </div>

</div>

@endsection
