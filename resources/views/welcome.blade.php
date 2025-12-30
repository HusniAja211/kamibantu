<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KamiBantu</title>

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-900 overflow-x-hidden">

    <section class="relative min-h-screen flex flex-col items-center justify-center px-6 pt-20 overflow-hidden">
        <div class="blob -top-20 -left-20"></div>
        <div class="blob bottom-0 -right-20 bg-emerald-400"></div>

        <nav class="fixed top-0 w-full glass z-50 border-b border-white/20">
            <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div
                        class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center shadow-lg shadow-green-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <span class="font-bold text-xl tracking-tight text-slate-800">KamiBantu</span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('login') }}"
                        class="text-sm font-semibold text-slate-600 hover:text-green-600 transition">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 bg-green-600 text-white text-sm font-bold rounded-full hover:bg-green-700 transition shadow-md shadow-green-100">Daftar</a>
                </div>
            </div>
        </nav>

        <div class="max-w-4xl mx-auto text-center z-10">
            <span
                class="px-4 py-2 bg-green-50 text-green-700 rounded-full text-xs font-bold uppercase tracking-widest mb-6 inline-block border border-green-100">Jadilah
                Agen Perubahan</span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 leading-tight mb-6">
                Satu Aksi Kecil Bisa Memberi <span class="text-green-600">Dampak Besar</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-600 mb-10 leading-relaxed max-w-2xl mx-auto">
                Temukan dan kelola kegiatan relawan secara aman dan terpercaya. Menghubungkan niat baik dengan aksi
                nyata.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('register') }}"
                    class="w-full sm:w-auto px-10 py-4 bg-green-600 text-white font-bold rounded-2xl hover:bg-green-700 transition-all shadow-xl shadow-green-200 hover:-translate-y-1">Gabung
                    Sekarang</a>
                <a href="#galeri"
                    class="w-full sm:w-auto px-10 py-4 bg-white text-slate-700 font-bold rounded-2xl border border-slate-200 hover:bg-slate-50 transition-all">Lihat
                    Kegiatan</a>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-12">
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100">
                    <div class="w-12 h-12 bg-red-50 text-red-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.99 7.99 0 0120 13a7.99 7.99 0 01-2.343 5.657z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Informasi Tersebar</h3>
                    <p class="text-slate-600 leading-relaxed">Sulit menemukan kegiatan relawan karena informasi yang
                        berantakan di berbagai platform.</p>
                </div>
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100">
                    <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Identitas Tidak Jelas</h3>
                    <p class="text-slate-600 leading-relaxed">Ragu untuk bergabung karena latar belakang penyelenggara
                        yang sulit diverifikasi.</p>
                </div>
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100">
                    <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Takut Penipuan</h3>
                    <p class="text-slate-600 leading-relaxed">Kekhawatiran akan penyalahgunaan donasi atau tenaga untuk
                        kepentingan sepihak.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Kami Hadir Untuk <span
                        class="text-green-600">Keamananmu</span></h2>
                <p class="text-slate-600 max-w-xl mx-auto">KamiBantu membangun ekosistem kerelawanan yang sehat dan
                    terverifikasi.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-10 rounded-[40px] shadow-sm border border-slate-100 flex gap-6 items-start">
                    <div
                        class="w-14 h-14 bg-green-600 rounded-2xl flex items-center justify-center shrink-0 shadow-lg shadow-green-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-2">Penyelenggara Terverifikasi</h4>
                        <p class="text-slate-600 leading-relaxed">Setiap organisasi dan individu yang membuat kegiatan
                            harus melalui proses verifikasi identitas yang ketat.</p>
                    </div>
                </div>
                <div class="bg-white p-10 rounded-[40px] shadow-sm border border-slate-100 flex gap-6 items-start">
                    <div
                        class="w-14 h-14 bg-green-600 rounded-2xl flex items-center justify-center shrink-0 shadow-lg shadow-green-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.54 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.57-1.838-.196-1.539-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-2">Reputasi Berbasis Aksi</h4>
                        <p class="text-slate-600 leading-relaxed">Reputasi tidak dibeli, tapi dibangun dari penyelesaian
                            kegiatan nyata. Transparan dan tidak bisa dimanipulasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-extrabold text-center mb-16">Cara Kerja Sederhana</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div
                        class="w-16 h-16 bg-slate-50 border-2 border-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-black text-slate-300 group-hover:bg-green-600 group-hover:text-white group-hover:border-green-600 transition-all">
                        1</div>
                    <h5 class="font-bold mb-2">Daftar Akun</h5>
                    <p class="text-sm text-slate-500">Buat profilmu sebagai relawan atau penyelenggara.</p>
                </div>
                <div class="text-center group">
                    <div
                        class="w-16 h-16 bg-slate-50 border-2 border-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-black text-slate-300 group-hover:bg-green-600 group-hover:text-white group-hover:border-green-600 transition-all">
                        2</div>
                    <h5 class="font-bold mb-2">Cari Kegiatan</h5>
                    <p class="text-sm text-slate-500">Temukan isu sosial yang kamu pedulikan.</p>
                </div>
                <div class="text-center group">
                    <div
                        class="w-16 h-16 bg-slate-50 border-2 border-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-black text-slate-300 group-hover:bg-green-600 group-hover:text-white group-hover:border-green-600 transition-all">
                        3</div>
                    <h5 class="font-bold mb-2">Mulai Beraksi</h5>
                    <p class="text-sm text-slate-500">Ikuti kegiatan dan berikan kontribusi terbaikmu.</p>
                </div>
                <div class="text-center group">
                    <div
                        class="w-16 h-16 bg-slate-50 border-2 border-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-black text-slate-300 group-hover:bg-green-600 group-hover:text-white group-hover:border-green-600 transition-all">
                        4</div>
                    <h5 class="font-bold mb-2">Bangun Reputasi</h5>
                    <p class="text-sm text-slate-500">Selesaikan misi dan kumpulkan badge prestasimu.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 bg-green-600 text-white rounded-[60px] mx-4 mb-10 overflow-hidden relative">
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h2 class="text-3xl md:text-5xl font-extrabold mb-8 leading-tight">Kepercayaan adalah <br>Mata Uang Kami
            </h2>
            <p class="text-green-100 text-lg mb-12 opacity-90">Kami menggunakan sistem level dan badge yang hanya bisa
                didapatkan setelah verifikasi penyelesaian kegiatan oleh penyelenggara. Tidak ada rating subjektif yang
                menjatuhkan, hanya apresiasi atas kontribusi nyata.</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <div class="px-6 py-3 bg-white/10 backdrop-blur rounded-full border border-white/20 text-sm font-bold">
                    ⭐ Verified Contributor</div>
                <div class="px-6 py-3 bg-white/10 backdrop-blur rounded-full border border-white/20 text-sm font-bold">
                    🛡️ Trusted Organizer</div>
                <div class="px-6 py-3 bg-white/10 backdrop-blur rounded-full border border-white/20 text-sm font-bold">
                    🌿 Earth Guardian</div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-end justify-between mb-12 gap-6">
                <div class="max-w-xl">
                    <span class="text-green-600 font-bold text-sm uppercase tracking-widest">Momen Berharga</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold mt-2 text-slate-900">Jejak Kebaikan yang Telah
                        Terukir</h2>
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Setiap foto bercerita tentang senyum, kerja keras, dan perubahan nyata yang dilakukan oleh para
                        relawan di lapangan.
                    </p>
                </div>
            </div>

            <div id="galeri" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="relative group overflow-hidden rounded-[2rem] h-80 md:col-span-1 md:row-span-2 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Relawan mengajar"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <p class="text-white text-xs font-medium">Relawan Mengajar, Jakarta</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-[2rem] h-40 md:col-span-2 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Bersih pantai"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                        <p class="text-white text-xs font-medium">Aksi Bersih Pantai, Bali</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-[2rem] h-40 md:h-80 shadow-sm">
                    <img src="https://media.suara.com/pictures/653x366/2020/04/17/50181-postingan-viral-saat-akatsuki-membagi-beras-twitter-mikalodon.jpg?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Pembagian sembako"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <p class="text-white text-xs font-medium">Dapur Umum, Bandung</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-[2rem] h-40 md:col-span-2 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1516733725897-1aa73b87c8e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Penanaman pohon"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                        <p class="text-white text-xs font-medium">Penanaman 1000 Mangrove</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 px-6 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-4xl font-extrabold mb-6">Mulai langkah kebaikanmu hari ini</h2>
            <p class="text-slate-600 mb-10 text-lg leading-relaxed">Sudah saatnya niat baikmu memiliki wadah yang aman.
                Bergabunglah dengan ribuan agen perubahan lainnya.</p>
            <a href="{{ route('register') }}"
                class="px-12 py-5 bg-green-600 text-white font-black text-lg rounded-[24px] hover:bg-green-700 transition-all shadow-2xl shadow-green-200 inline-block">Daftar
                & Jadi Relawan</a>
        </div>
    </section>

    <footer class="py-12 px-6 border-t border-slate-200 bg-white">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="text-center md:text-left">
                <div class="font-black text-2xl text-slate-800 mb-2">KamiBantu</div>
                <p class="text-slate-500 text-sm italic">"Menghubungkan Hati, Membangun Negeri"</p>
            </div>
            <div class="text-slate-400 text-xs">
                &copy; 2025 KamiBantu. Dirancang untuk kebaikan.
            </div>
        </div>
    </footer>

</body>

</html>
