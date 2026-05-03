@extends('layouts.auth')

@section('title')
    <title>{{ config('app.name') }} | Login</title>
@endsection

@section('content')
{{-- LEFT: Login Form --}}
<div class="flex-1 flex flex-col justify-center px-10 py-8">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-1">Selamat Datang!</h1>
    <p class="text-sm text-gray-500 mb-8">
        Cek barang yang kamu butuhkan dengan mudah dan cepat di
        <span class="font-semibold text-gray-800">{{ config('app.name') }}</span>. Masuk sekarang.
    </p>

    <form class="w-full space-y-4" action="/login" method="POST">
        @csrf

        {{-- Email --}}
        <div>
            <input
                type="text"
                name="email"
                id="email"
                placeholder="Alamat Email"
                autocomplete="off"
                value="{{ old('email') }}"
                class="w-full px-4 py-3 rounded-full bg-white text-sm text-gray-800 placeholder-gray-400 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 @error('email') ring-2 ring-red-400 @enderror"
            >
            @error('email')
                <p class="mt-1 text-xs text-red-400 pl-4">{{ $message }}</p>
            @enderror
        </div>

        <div class="relative">
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
                autocomplete="off"
                class="w-full px-4 py-3 pr-11 rounded-full bg-white text-sm text-gray-800 placeholder-gray-400 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 @error('password') ring-2 ring-red-400 @enderror"
            >
            <button type="button" id="togglePassword" class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-gray-700">
                <i class='bx bx-hide text-lg'></i>
            </button>
            @error('password')
                <p class="mt-1 text-xs text-red-400 pl-4">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end -mt-1">
            <a href="#" class="text-sm text-gray-500 hover:text-gray-800 transition">Lupa Password?</a>
        </div>

        <button
            type="submit"
            class="w-full py-3 bg-gray-900 text-white text-sm font-semibold rounded-full hover:bg-gray-700 transition duration-200 shadow-md"
        >
            Masuk
        </button>
    </form>

    <div class="flex items-center my-5 gap-3">
        <div class="flex-1 h-px bg-gray-200"></div>
        <span class="text-xs text-gray-400">atau lanjutkan dengan</span>
        <div class="flex-1 h-px bg-gray-200"></div>
    </div>

    <div class="flex justify-center gap-4">
        <a href="#" class="w-12 h-12 rounded-full bg-gray-900 flex items-center justify-center hover:bg-gray-700 transition shadow">
            <svg class="w-5 h-5" viewBox="0 0 48 48">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
            </svg>
        </a>
    </div>

    <p class="text-sm text-gray-400 mt-6 text-center">
        Tidak punya akun?
        <a href="{{ route('register') }}" class="text-gray-900 font-semibold hover:underline">Daftar sekarang</a>
    </p>
</div>

<div class="hidden md:flex w-80 bg-green-50 flex-col items-center justify-center px-8 py-10 relative overflow-hidden rounded-r-3xl">
    <div class="absolute top-6 left-6 w-24 h-24 rounded-full bg-green-200/50 blur-2xl"></div>
    <div class="absolute bottom-10 right-4 w-20 h-20 rounded-full bg-green-300/40 blur-2xl"></div>

    <div class="w-52 h-52 flex items-center justify-center mb-6">
        {{-- Replace this SVG with your actual illustration image --}}
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
            <!-- Meditating figure placeholder -->
            <circle cx="100" cy="75" r="22" fill="#4ade80" opacity="0.7"/>
            <ellipse cx="100" cy="130" rx="38" ry="28" fill="#4ade80" opacity="0.5"/>
            <line x1="62" y1="125" x2="30" y2="105" stroke="#4ade80" stroke-width="6" stroke-linecap="round"/>
            <line x1="138" y1="125" x2="170" y2="105" stroke="#4ade80" stroke-width="6" stroke-linecap="round"/>
            <circle cx="30" cy="100" r="12" fill="#6ee7b7" opacity="0.8"/>
            <circle cx="170" cy="100" r="10" fill="#6ee7b7" opacity="0.8"/>
            <path d="M70 165 Q100 185 130 165" stroke="#4ade80" stroke-width="5" stroke-linecap="round" fill="none"/>
        </svg>
    </div>

    <div class="bg-white rounded-2xl shadow-md px-4 py-3 w-full mb-6 flex items-center gap-3">
        <div class="flex-1">
            <p class="text-sm font-bold text-gray-800">Digital Stock</p>
            <p class="text-xs text-gray-400">50+ Barang</p>
            <span class="inline-block mt-1 text-xs border border-gray-300 rounded-full px-2 py-0.5 text-gray-500">Baru</span>
        </div>
        <div class="w-10 h-10 rounded-full border-4 border-green-400 flex items-center justify-center">
            <span class="text-xs font-bold text-green-600">100%</span>
        </div>
    </div>
</div>
@endsection
