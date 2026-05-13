<footer class="bg-[#0d1117] text-gray-400 mt-10">
    <div class="max-w-7xl mx-auto px-6 pt-14 pb-8">
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-8 justify-between">
            <div class="lg:max-w-xs shrink-0">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center shadow">
                        <i class='bx bx-package text-white text-xl'></i>
                    </div>
                    <div class="leading-tight">
                        <span class="block text-lg font-extrabold text-white leading-none">{{ config('app.name', 'GrosirKita') }}</span>
                        <span class="block text-[10px] font-bold text-orange-400 uppercase tracking-widest leading-none">Beli Per Pack, Lebih Hemat</span>
                    </div>
                </div>

                <p class="text-sm text-gray-400 leading-relaxed mb-6">
                    Platform belanja grosir terpercaya untuk warung, toko, & UKM di wilayah Pasuruan dan Sekitarnya. Harga distributor langsung pabrik.
                </p>

                <ul class="space-y-2.5 mb-6">
                    <li class="flex items-center gap-2.5 text-sm">
                        <i class='bx bx-phone text-green-500 text-base shrink-0'></i>
                        <span class="text-white font-medium">0838-3583-922</span>
                    </li>
                    <li class="flex items-center gap-2.5 text-sm">
                        <i class='bx bx-envelope text-green-500 text-base shrink-0'></i>
                        <span>grosirkita@gmail.com</span>
                    </li>
                    <li class="flex items-start gap-2.5 text-sm">
                        <i class='bx bx-map-pin text-green-500 text-base shrink-0 mt-0.5'></i>
                        <span>Jl. Raya Nongkojajar No. 16, Dusun Borong, Desa Cowek, Kec. Purwodadi, Kab. Pasuruan 67163</span>
                    </li>
                </ul>

                <div class="flex gap-2">
                    <a href="#" class="w-9 h-9 bg-gray-800 hover:bg-green-600 border border-gray-700 hover:border-green-600 rounded-lg flex items-center justify-center transition">
                        <i class='bx bxl-facebook text-gray-300 text-base'></i>
                    </a>
                    <a href="#" class="w-9 h-9 bg-gray-800 hover:bg-green-600 border border-gray-700 hover:border-green-600 rounded-lg flex items-center justify-center transition">
                        <i class='bx bxl-instagram text-gray-300 text-base'></i>
                    </a>
                    <a href="#" class="w-9 h-9 bg-gray-800 hover:bg-green-600 border border-gray-700 hover:border-green-600 rounded-lg flex items-center justify-center transition">
                        <i class='bx bxl-youtube text-gray-300 text-base'></i>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 gap-8 lg:gap-16">
                <div>
                    <h4 class="text-white font-extrabold text-sm uppercase tracking-widest mb-5">Belanja</h4>
                    <ul class="space-y-3">
                        @foreach (['Promo Hari Ini', 'Brand Resmi', 'Kategori', 'Paket Sembako', 'Lacak Pesanan'] as $link)
                        <li>
                            <a href="#" class="text-sm text-gray-400 hover:text-green-400 transition">{{ $link }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-extrabold text-sm uppercase tracking-widest mb-5">Bantuan</h4>
                    <ul class="space-y-3">
                        @foreach (['Pusat Bantuan', 'Cara Belanja', 'Kebijakan Privasi', 'Syarat & Ketentuan', 'Kontak Kami'] as $link)
                        <li>
                            <a href="#" class="text-sm text-gray-400 hover:text-green-400 transition">{{ $link }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-xs text-gray-500">
                © {{ date('Y') }} Grosir Kita. Semua hak dilindungi.
            </p>
        </div>
    </div>
</footer>
