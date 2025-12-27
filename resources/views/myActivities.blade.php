<x-app-layout>
    <div x-data="{ activeTab: 'volunteer' }" class="min-h-screen bg-gradient-to-b from-green-100  to-white pb-20 rounded-xl">
        
        <!-- {{-- 1. HEADER SECTION --}} -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl mb-3">
                Aktivitas Saya
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Ringkasan perjalanan dan kontribusimu. <br>
                <span class="text-green-700 font-medium">Setiap langkah kecil membawa perubahan besar.</span>
            </p>
        </div>

        <!-- {{-- MAIN CONTENT CONTAINER --}} -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- {{-- 2. TAB NAVIGASI --}} -->
            <div class="flex justify-center mb-8">
                <div class="bg-white/60 p-1 rounded-full border border-green-100 shadow-sm inline-flex">
                    <!-- {{-- Tab: Sebagai Relawan --}} -->
                    <button 
                        @click="activeTab = 'volunteer'"
                        :class="{ 'bg-green-600 text-white shadow-md': activeTab === 'volunteer', 'text-gray-600 hover:text-green-700 hover:bg-green-50': activeTab !== 'volunteer' }"
                        class="px-8 py-2.5 rounded-full text-sm font-medium transition-all duration-300 ease-in-out focus:outline-none">
                        Sebagai Relawan
                    </button>
                    
                    <!-- {{-- Tab: Sebagai Penyelenggara --}} -->
                    <button 
                        @click="activeTab = 'organizer'"
                        :class="{ 'bg-green-600 text-white shadow-md': activeTab === 'organizer', 'text-gray-600 hover:text-green-700 hover:bg-green-50': activeTab !== 'organizer' }"
                        class="px-8 py-2.5 rounded-full text-sm font-medium transition-all duration-300 ease-in-out focus:outline-none ml-1">
                        Sebagai Penyelenggara
                    </button>
                </div>
            </div>

            <!-- {{-- 3. KONTEN TAB: SEBAGAI RELAWAN --}} -->
            <div x-show="activeTab === 'volunteer'" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 style="display: none;">

                <!-- {{-- Grid Card --}} -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- {{-- Card 1: Status Akan Datang --}} -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-green-200 transition-all duration-300 group">
                        <div class="flex justify-between items-start mb-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                Akan Datang
                            </span>
                            <span class="text-xs text-gray-400">12 Des 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-green-700 transition-colors mb-2">
                            Penanaman 1000 Mangrove
                        </h3>
                        <div class="flex items-center text-sm text-gray-500 mb-6">
                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Green Earth Foundation
                        </div>
                        <a href="#" class="block w-full text-center py-2.5 border border-green-600 text-green-700 rounded-xl text-sm font-semibold hover:bg-green-600 hover:text-white transition-colors">
                            Lihat Detail
                        </a>
                    </div>

                    <!-- {{-- Card 2: Status Berlangsung --}} -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-green-200 transition-all duration-300 group relative overflow-hidden">
                        {{-- Aksen samping --}}
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-yellow-400"></div>
                        
                        <div class="flex justify-between items-start mb-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-50 text-yellow-700">
                                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1.5 animate-pulse"></span>
                                Sedang Berlangsung
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-green-700 transition-colors mb-2">
                            Distribusi Buku Pelosok
                        </h3>
                        <div class="flex items-center text-sm text-gray-500 mb-6">
                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Komunitas Baca Yuk
                        </div>
                        <a href="#" class="block w-full text-center py-2.5 bg-green-50 text-green-700 rounded-xl text-sm font-semibold hover:bg-green-100 transition-colors">
                            Lihat Progress
                        </a>
                    </div>

                    <!-- {{-- Card 3: Status Selesai --}} -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 opacity-90 hover:opacity-100 transition-all duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                Selesai
                            </span>
                            <span class="text-xs text-gray-400">20 Nov 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-700 mb-2">
                            Bersih Pantai Ancol
                        </h3>
                        <div class="flex items-center text-sm text-gray-500 mb-6">
                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Ocean Blue NGO
                        </div>
                        <a href="#" class="block w-full text-center py-2.5 text-gray-500 bg-gray-50 rounded-xl text-sm font-medium hover:bg-gray-100 hover:text-gray-700 transition-colors">
                            Lihat Kenangan
                        </a>
                    </div>
                </div>

                <!-- {{-- 5. EMPTY STATE (Hidden by default using logic, shown here for structure) --}}
                {{-- Gunakan @if($activities->isEmpty()) ... @endif di real app --}} -->
                </div>

            <!-- {{-- 4. KONTEN TAB: SEBAGAI PENYELENGGARA --}} -->
            <div x-show="activeTab === 'organizer'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 style="display: none;">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- {{-- Card Organizer 1: Aktif --}} -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Mengajar Jalanan</h3>
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-semibold bg-green-50 text-green-700">
                                Aktif
                            </span>
                        </div>

                        <!-- {{-- Stats --}} -->
                        <div class="flex items-center mb-4">
                            <div class="flex -space-x-2 mr-3">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=A&background=random" alt="">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=B&background=random" alt="">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=C&background=random" alt="">
                                <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-500">+12</div>
                            </div>
                            <span class="text-sm text-gray-600 font-medium">15 Relawan</span>
                        </div>

                        <!-- {{-- Progress Bar --}} -->
                        <div class="mb-5">
                            <div class="flex justify-between text-xs text-gray-500 mb-1">
                                <span>Progress</span>
                                <span>65%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 65%"></div>
                            </div>
                        </div>

                        <button class="w-full py-2.5 bg-gray-900 text-white rounded-xl text-sm font-semibold hover:bg-gray-800 transition-colors shadow-lg shadow-gray-200">
                            Kelola Kegiatan
                        </button>
                    </div>

                    <!-- {{-- Card Organizer 2: Menunggu Penyelesaian --}} -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Donasi Sembako</h3>
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-semibold bg-orange-50 text-orange-700">
                                Finalisasi
                            </span>
                        </div>

                        <div class="flex items-center mb-4">
                            <span class="text-sm text-gray-600">Target tercapai: <span class="font-bold text-gray-900">100%</span></span>
                        </div>

                        <!-- {{-- Progress Bar --}} -->
                        <div class="mb-5">
                            <div class="flex justify-between text-xs text-gray-500 mb-1">
                                <span>Progress</span>
                                <span>90%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-orange-400 h-2 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>

                        <button class="w-full py-2.5 border border-gray-200 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-50 transition-colors">
                            Update Laporan
                        </button>
                    </div>

                    <!-- {{-- Empty State Organizer (Contoh Card Tambah) --}} -->
                    <a href="#" class="border-2 border-dashed border-gray-200 rounded-2xl p-6 flex flex-col items-center justify-center text-gray-400 hover:border-green-400 hover:text-green-600 hover:bg-green-50/50 transition-all duration-300 cursor-pointer min-h-[200px]">
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <span class="font-medium text-sm">Buat Kegiatan Baru</span>
                    </a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>