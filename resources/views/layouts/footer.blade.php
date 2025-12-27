    <footer class="py-12 px-6 border-t border-slate-200 bg-white">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="text-center md:text-left">
                <div class="font-black text-2xl text-slate-800 mb-2">Volunteer Finder</div>
                <p class="text-slate-500 text-sm italic">"Menghubungkan Hati, Membangun Negeri"</p>
            </div>
            <div class="text-slate-400 text-xs">
                &copy; 2025 Volunteer Finder. Dirancang untuk kebaikan.
            </div>
        </div>
    </footer>

<!-- <footer class="bg-green-50 border-t border-green-100 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-8">
        <div class="flex flex-col items-center justify-center text-center space-y-6">
            
            {{-- Logo Centered --}}
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                    K
                </div>
                <span class="text-xl font-bold text-gray-800 tracking-tight">KamiBantu</span>
            </div>

            {{-- Navigation Links (Horizontal) --}}
            <nav class="flex flex-wrap justify-center gap-6 md:gap-8">
                <a href="#" class="text-gray-600 hover:text-green-600 font-medium text-sm transition-colors">Tentang Kami</a>
                <a href="#" class="text-gray-600 hover:text-green-600 font-medium text-sm transition-colors">Kegiatan</a>
                <a href="#" class="text-gray-600 hover:text-green-600 font-medium text-sm transition-colors">Panduan</a>
                <a href="#" class="text-gray-600 hover:text-green-600 font-medium text-sm transition-colors">Hubungi Kami</a>
            </nav>

            {{-- Divider --}}
            <div class="w-24 h-1 bg-green-200 rounded-full"></div>

            {{-- Copyright Text --}}
            <div class="text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} KamiBantu — Platform Relawan Terpercaya.</p>
                <p class="mt-1 text-xs text-gray-400">Menghubungkan kebaikan, menciptakan perubahan.</p>
            </div>
        </div>
    </div>
</footer> -->

<!-- <footer class="bg-gray-900 text-white pt-16 pb-8 border-t-4 border-green-600 relative overflow-hidden">
    {{-- Aksen Dekoratif Background --}}
    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-green-900 rounded-full blur-3xl opacity-20 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-green-600 rounded-full blur-3xl opacity-10 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            
            {{-- Kolom 1: Brand & Misi --}}
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    {{-- Ganti dengan Logo Asli jika ada --}}
                    <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-green-900/50">
                        K
                    </div>
                    <span class="text-2xl font-bold tracking-tight">KamiBantu</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Menghubungkan hati yang tulus dengan tangan yang membutuhkan. Platform relawan no.1 untuk menciptakan dampak nyata bagi Indonesia.
                </p>
            </div>

            {{-- Kolom 2: Navigasi --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 text-green-400">Jelajahi</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-green-400 transition-colors duration-300">Cari Kegiatan</a></li>
                    <li><a href="#" class="hover:text-green-400 transition-colors duration-300">Buat Organisasi</a></li>
                    <li><a href="#" class="hover:text-green-400 transition-colors duration-300">Cerita Relawan</a></li>
                    <li><a href="#" class="hover:text-green-400 transition-colors duration-300">Leaderboard</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Bantuan --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 text-green-400">Dukungan</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-green-400 transition-colors duration-300">Pusat Bantuan</a></li>
                    <li><a href="#" class="hover:text-green-400 transition-colors duration-300">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="hover:text-green-400 transition-colors duration-300">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-green-400 transition-colors duration-300">Hubungi Kami</a></li>
                </ul>
            </div>

            {{-- Kolom 4: Newsletter / Social --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 text-green-400">Tetap Terhubung</h3>
                <p class="text-gray-400 text-sm mb-4">Dapatkan info kegiatan sosial terbaru.</p>
                
                {{-- Social Icons --}}
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-green-600 hover:text-white transition-all duration-300">
                        {{-- Instagram Icon --}}
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-green-600 hover:text-white transition-all duration-300">
                        {{-- Twitter/X Icon --}}
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-gray-500 text-center md:text-left">
                © {{ date('Y') }} KamiBantu. Dibuat dengan <span class="text-red-500">❤</span> untuk Indonesia.
            </p>
            <div class="mt-4 md:mt-0 flex space-x-6 text-sm text-gray-500">
                <span class="hover:text-white cursor-pointer transition-colors">Privacy</span>
                <span class="hover:text-white cursor-pointer transition-colors">Terms</span>
                <span class="hover:text-white cursor-pointer transition-colors">Cookies</span>
            </div>
        </div>
    </div>
</footer> -->