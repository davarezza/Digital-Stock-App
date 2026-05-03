<section class="max-w-7xl mx-auto px-4 py-6">
    <div class="flex gap-4">
        <div class="flex-1 relative bg-green-700 rounded-2xl overflow-hidden min-h-85 flex items-end">
            <div class="absolute inset-0 bg-linear-to-r from-green-800/95 via-green-700/80 to-green-600/40"></div>

            <div class="absolute inset-0 opacity-30"
                style="background: url('https://images.unsplash.com/photo-1534723452862-4c874018d66d?w=900&q=80') center/cover no-repeat;">
            </div>

            <div class="relative z-10 p-8 pb-10">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-1.5 bg-white/20 backdrop-blur-sm border border-white/30 text-white text-xs font-semibold px-3 py-1.5 rounded-full mb-5">
                    <i class='bx bx-purchase-tag text-sm'></i>
                    Promo Spesial Grosir
                </div>

                <h1 class="text-6xl font-black text-white leading-tight mb-3">
                    Beli Per Dus,<br>
                    <span class="text-yellow-300">Lebih Hemat 30%</span>
                </h1>
                <p class="text-green-100 text-sm mb-7 leading-relaxed max-w-sm">
                    Stok ribuan produk grosir dari pabrik langsung.<br>
                    Pengiriman cepat ke seluruh Indonesia.
                </p>

                <div class="flex items-center gap-3">
                    <a href="#" class="flex items-center gap-2 bg-white text-gray-900 text-sm font-bold px-6 py-3 rounded-full hover:bg-gray-100 transition shadow-md">
                        Belanja Sekarang <i class='bx bx-right-arrow-alt text-lg'></i>
                    </a>
                    <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-bold px-5 py-3 rounded-full transition shadow-md">
                        Min. 1 Dus
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Flash sale countdown
    (function() {
        let h = 2, m = 14, s = 37;
        const elH = document.getElementById('flash-h');
        const elM = document.getElementById('flash-m');
        const elS = document.getElementById('flash-s');
        if (!elH) return;
        setInterval(() => {
            if (s > 0) s--;
            else if (m > 0) { m--; s = 59; }
            else if (h > 0) { h--; m = 59; s = 59; }
            elH.textContent = String(h).padStart(2,'0');
            elM.textContent = String(m).padStart(2,'0');
            elS.textContent = String(s).padStart(2,'0');
        }, 1000);
    })();
</script>
