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
                    <button @click="activeTab = 'volunteer'"
                        :class="{ 'bg-green-600 text-white shadow-md': activeTab === 'volunteer', 'text-gray-600 hover:text-green-700 hover:bg-green-50': activeTab !== 'volunteer' }"
                        class="px-8 py-2.5 rounded-full text-sm font-medium transition-all duration-300 ease-in-out focus:outline-none">
                        Sebagai Relawan
                    </button>

                    <!-- {{-- Tab: Sebagai Penyelenggara --}} -->
                    <button @click="activeTab = 'organizer'"
                        :class="{ 'bg-green-600 text-white shadow-md': activeTab === 'organizer', 'text-gray-600 hover:text-green-700 hover:bg-green-50': activeTab !== 'organizer' }"
                        class="px-8 py-2.5 rounded-full text-sm font-medium transition-all duration-300 ease-in-out focus:outline-none ml-1">
                        Sebagai Penyelenggara
                    </button>
                </div>
            </div>

            <!-- {{-- 3. KONTEN TAB: SEBAGAI RELAWAN --}} -->
            <div x-show="activeTab === 'volunteer'" x-transition style="display:none">

                @if ($joinedEvents->isEmpty())
                    <div class="text-center py-20 text-gray-400">
                        <p class="text-lg font-semibold">Belum ada kegiatan</p>
                        <p class="text-sm">Yuk mulai kontribusi pertamamu 🌱</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($joinedEvents as $event)
                            <x-activity-card :id="$event->id" :image="$event->banner_path
                                ? asset('storage/' . $event->banner_path)
                                : 'https://images.unsplash.com/photo-1593113598332-cd288d649433'" :category="$event->category" :title="$event->title"
                                :date="$event->start_date->format('d M Y')" :location="$event->location_name" :organizer="$event->organizer->name" :rating="number_format($event->organizer->rating ?? 5, 1)" />
                        @endforeach
                    </div>
                @endif

            </div>

            <!-- {{-- 5. EMPTY STATE (Hidden by default using logic, shown here for structure) --}}
                {{-- Gunakan @if ($activities->isEmpty()) ... @endif di real app --}} -->
        </div>

        <!-- {{-- 4. KONTEN TAB: SEBAGAI PENYELENGGARA --}} -->
        <div x-show="activeTab === 'organizer'" x-transition style="display:none">
            @if ($organizedEvents->isEmpty())
                <div class="text-center py-20 text-gray-400">
                    <p class="text-lg font-semibold">Belum membuat kegiatan</p>
                    <a href="{{ route('events.create') }}"
                        class="inline-block mt-4 px-6 py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700">
                        Buat Kegiatan Pertama 🚀
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($organizedEvents as $event)
                        <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-lg transition">

                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold text-gray-900">
                                    {{ $event->title }}
                                </h3>

                                <span
                                    class="px-2 py-1 rounded text-xs font-semibold
                            @if ($event->status === 'active') bg-green-50 text-green-700
                            @else bg-gray-100 text-gray-500 @endif">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </div>

                            {{-- Volunteers --}}
                            <p class="text-sm text-gray-600 mb-4">
                                👥 {{ $event->participants_count }} /
                                {{ $event->target_volunteers ?? '∞' }} Relawan
                            </p>

                            {{-- Progress --}}
                            @php
                                $progress = $event->completionRate();
                            @endphp

                            <div class="mb-5">
                                <div class="flex justify-between text-xs text-gray-500 mb-1">
                                    <span>Progress</span>
                                    <span>{{ round($progress) }}%</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $progress }}%">
                                    </div>
                                </div>
                            </div>

                            {{-- CTA --}}
                            <a href="{{ route('events.manage', $event) }}"
                                class="block w-full py-2.5 bg-gray-900 text-white rounded-xl text-sm font-semibold text-center hover:bg-gray-800 transition">
                                Kelola Kegiatan
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>


        <!-- {{-- Empty State Organizer (Contoh Card Tambah) --}} -->
        <a href="#"
            class="border-2 border-dashed border-gray-200 rounded-2xl p-6 flex flex-col items-center justify-center text-gray-400 hover:border-green-400 hover:text-green-600 hover:bg-green-50/50 transition-all duration-300 cursor-pointer min-h-[200px]">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <span class="font-medium text-sm">Buat Kegiatan Baru</span>
        </a>

    </div>
    </div>

    </div>
    </div>
</x-app-layout>
