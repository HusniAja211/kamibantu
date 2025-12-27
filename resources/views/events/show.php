<x-layout title="Detail Kegiatan - {{ $event->title }}">
    <div class="max-w-5xl mx-auto">
        <nav class="flex text-sm text-gray-500 mb-4">
            <a href="/" class="hover:text-green-600">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Detail Kegiatan</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433" class="w-full h-80 object-cover rounded-3xl shadow-sm" alt="Banner">
                
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase tracking-wider">
                            Akan Datang
                        </span>
                        <span class="text-gray-400 text-sm">•</span>
                        <span class="text-gray-500 text-sm">Lingkungan</span>
                    </div>
                    
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $event->title ?? 'Bersih Pantai Ancol' }}</h1>
                    
                    <h2 class="font-bold text-gray-800 mb-2">Deskripsi Kegiatan</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Kegiatan ini bertujuan untuk membersihkan area pesisir pantai dari sampah plastik yang terbawa arus laut. Kita akan bergerak bersama untuk menjaga ekosistem laut kita tetap sehat. Semua alat kebersihan akan disediakan oleh panitia di lokasi.
                    </p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm sticky top-24">
                    <div class="space-y-4 mb-6">
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-green-50 rounded-lg text-green-500">📅</div>
                            <div>
                                <p class="text-xs text-gray-500">Tanggal & Waktu</p>
                                <p class="text-sm font-semibold">24 Des 2024, 08:00 WIB</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-green-50 rounded-lg text-green-500">📍</div>
                            <div>
                                <p class="text-xs text-gray-500">Lokasi</p>
                                <p class="text-sm font-semibold">Pantai Ancol, Jakarta Utara</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-green-50 rounded-lg text-green-500">👥</div>
                            <div>
                                <p class="text-xs text-gray-500">Dibutuhkan</p>
                                <p class="text-sm font-semibold">20/50 Relawan</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-2xl mb-6">
                        <p class="text-[10px] uppercase font-bold text-gray-400 mb-2">Penyelenggara</p>
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Green+Earth" class="w-10 h-10 rounded-full" alt="">
                            <div>
                                <p class="text-sm font-bold text-gray-800">Green Earth ID</p>
                                <p class="text-xs text-yellow-500 font-bold">⭐⭐⭐⭐⭐ (4.9)</p>
                            </div>
                        </div>
                    </div>

                    <button class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-2xl transition shadow-lg shadow-green-100 mb-3">
                        Ikut Kegiatan
                    </button>
                    <button class="w-full border-2 border-green-500 text-green-600 font-bold py-3 rounded-2xl hover:bg-green-50 transition">
                        Saya Selesai
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>