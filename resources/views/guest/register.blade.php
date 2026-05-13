@extends('layouts.auth')

@section('title')
    <title>{{ config('app.name') }} | Register</title>
@endsection

@section('content')
{{-- LEFT: Illustration Panel --}}
<div class="hidden md:flex w-80 bg-green-50 flex-col items-center justify-center px-8 py-10 relative overflow-hidden rounded-l-3xl">
    {{-- Decorative blobs --}}
    <div class="absolute top-6 right-6 w-24 h-24 rounded-full bg-green-200/50 blur-2xl"></div>
    <div class="absolute bottom-10 left-4 w-20 h-20 rounded-full bg-green-300/40 blur-2xl"></div>

    <div class="w-52 h-52 flex items-center justify-center mb-6">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
            <rect x="40" y="130" width="120" height="10" rx="5" fill="#4ade80" opacity="0.4"/>
            <rect x="55" y="90" width="90" height="55" rx="8" fill="#86efac" opacity="0.5"/>
            <rect x="62" y="97" width="76" height="41" rx="4" fill="#d1fae5"/>
            <rect x="67" y="102" width="30" height="4" rx="2" fill="#4ade80" opacity="0.8"/>
            <rect x="67" y="110" width="50" height="3" rx="2" fill="#4ade80" opacity="0.5"/>
            <rect x="67" y="117" width="40" height="3" rx="2" fill="#4ade80" opacity="0.5"/>
            <rect x="67" y="124" width="20" height="3" rx="2" fill="#4ade80" opacity="0.3"/>
            {{-- Head --}}
            <circle cx="100" cy="65" r="18" fill="#4ade80" opacity="0.7"/>
            <circle cx="94" cy="62" r="2" fill="#166534"/>
            <circle cx="106" cy="62" r="2" fill="#166534"/>
            <path d="M94 70 Q100 75 106 70" stroke="#166534" stroke-width="1.5" stroke-linecap="round" fill="none"/>
            {{-- Arms --}}
            <line x1="82" y1="100" x2="62" y2="115" stroke="#4ade80" stroke-width="6" stroke-linecap="round"/>
            <line x1="118" y1="100" x2="138" y2="115" stroke="#4ade80" stroke-width="6" stroke-linecap="round"/>
            {{-- Body --}}
            <ellipse cx="100" cy="100" rx="22" ry="18" fill="#4ade80" opacity="0.5"/>
            {{-- Star decorations --}}
            <circle cx="38" cy="55" r="4" fill="#86efac" opacity="0.6"/>
            <circle cx="162" cy="75" r="3" fill="#4ade80" opacity="0.5"/>
            <circle cx="150" cy="45" r="5" fill="#86efac" opacity="0.4"/>
            <circle cx="52" cy="160" r="3" fill="#4ade80" opacity="0.4"/>
        </svg>
    </div>

    {{-- Stats Card --}}
    <div class="bg-white rounded-2xl shadow-md px-4 py-3 w-full mb-6 flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-green-100 flex items-center justify-center shrink-0">
            <i class='bx bx-user-plus text-green-600 text-lg'></i>
        </div>
        <div class="flex-1">
            <p class="text-sm font-bold text-gray-800">Bergabung Sekarang</p>
            <p class="text-xs text-gray-400">Gratis & mudah digunakan</p>
        </div>
        <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center">
            <i class='bx bx-check text-white text-sm'></i>
        </div>
    </div>
</div>

{{-- RIGHT: Register Form --}}
<div class="flex-1 flex flex-col justify-center px-10 py-8">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-1">Buat Akun Baru</h1>
    <p class="text-sm text-gray-500 mb-7">
        Daftar sekarang dan mulai cari barang yang kamu butuhkan di
        <span class="font-semibold text-gray-800">{{ config('app.name') }}</span>.
    </p>

    <form class="w-full space-y-3" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="relative">
            <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 pointer-events-none">
                <i class='bx bx-user text-lg'></i>
            </span>
            <input
                type="text" name="name" id="name" placeholder="Full Name" autocomplete="off" value="{{ old('name') }}"
                class="w-full pl-10 pr-4 py-3 rounded-full bg-white text-sm text-gray-800 placeholder-gray-400 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 @error('name') ring-2 ring-red-400 @enderror">
        </div>
        @error('name')
            <p class="mt-1 text-xs text-red-400 pl-4">{{ $message }}</p>
        @enderror

        <div class="relative">
            <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 pointer-events-none">
                <i class='bx bx-envelope text-lg'></i>
            </span>
            <input
                type="email" name="email" id="email" placeholder="Email Address"
                class="w-full pl-10 pr-4 py-3 rounded-full bg-white text-sm border border-gray-200 focus:ring-2 focus:ring-gray-300 @error('email') ring-2 ring-red-400 @enderror"
            >
        </div>
        @error('email')
            <p class="mt-1 text-xs text-red-400 pl-4">{{ $message }}</p>
        @enderror

        <div class="relative">
            <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 pointer-events-none">
                <i class='bx bx-phone text-lg'></i>
            </span>
            <input
                type="number" name="phone_number" id="phone_number" placeholder="Phone Number (62...)" autocomplete="off" value="{{ old('phone_number') }}"
                class="w-full pl-10 pr-4 py-3 rounded-full bg-white text-sm text-gray-800 placeholder-gray-400 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 @error('phone_number') ring-2 ring-red-400 @enderror">
        </div>
        @error('phone_number')
            <p class="mt-1 text-xs text-red-400 pl-4">{{ $message }}</p>
        @enderror

        <div class="relative">
            <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 pointer-events-none">
                <i class='bx bx-lock-alt text-lg'></i>
            </span>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
                autocomplete="off"
                class="w-full pl-10 pr-11 py-3 rounded-full bg-white text-sm text-gray-800 placeholder-gray-400 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 @error('password') ring-2 ring-red-400 @enderror"
            >
            <button type="button" id="togglePassword" class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-gray-700">
                <i class='bx bx-check text-lg'></i>
            </button>
        </div>
        @error('password')
            <p class="mt-1 text-xs text-red-400 pl-4">{{ $message }}</p>
        @enderror

        <div class="pt-1">
            <button
                type="submit"
                class="w-full py-3 bg-gray-900 text-white text-sm font-semibold rounded-full hover:bg-gray-700 transition duration-200 shadow-md">
                Buat Akun
            </button>
        </div>
    </form>

    <p class="text-sm text-gray-400 mt-6 text-center">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-gray-900 font-semibold hover:underline">Masuk di sini</a>
    </p>
</div>

<script>
    $(document).ready(function () {
        $(document).on('click', '#togglePassword', function () {
            const passwordInput = $('#password');
            const icon = $(this).find('i');

            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
            } else {
                passwordInput.attr('type', 'password');
            }
        });
    });
</script>
@endsection
