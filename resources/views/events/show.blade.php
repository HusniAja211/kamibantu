<x-app-layout title="Detail Kegiatan - {{ $event->title }}">
    <div class="min-h-screen bg-slate-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <nav class="flex text-sm text-gray-500 mb-6">
                <a href="{{ route('dashboard') }}" class="hover:text-green-600 transition-colors">Beranda</a>
                <span class="mx-2 text-gray-300">/</span>
                <span class="text-gray-800 font-medium">Detail Kegiatan</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- LEFT COLUMN (Main Content) --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Banner Image --}}
                    <div class="relative rounded-3xl overflow-hidden shadow-md group">
                        <img src="{{ $event->banner_path ? asset('storage/' . $event->banner_path) : 'https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=1200&q=80' }}"
                            class="w-full h-80 object-cover transition transform group-hover:scale-105 duration-700"
                            alt="{{ $event->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="px-3 py-1 bg-green-600 text-white text-xs font-bold rounded-lg shadow-sm">
                                {{ $event->category->name }}
                            </span>
                        </div>
                    </div>

                    {{-- Main Card --}}
                    <div class="bg-white p-8 rounded-3xl border border-gray-200 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <span
                                class="px-3 py-1 {{ $event->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }} text-xs font-bold rounded-full uppercase tracking-wider">
                                {{ ucfirst($event->status) }}
                            </span>
                            <span class="text-xs text-gray-400">Dibuat: {{ $event->created_at->format('d M Y') }}</span>
                        </div>

                        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                            {{ $event->title }}
                        </h1>

                        <div class="prose prose-green max-w-none">
                            <h3 class="text-lg font-bold text-gray-800 border-l-4 border-green-500 pl-3 mb-4">Deskripsi
                                Kegiatan</h3>
                            <p class="text-gray-600 leading-relaxed whitespace-pre-line text-base">
                                {{ $event->description }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN (Sidebar Sticky) --}}
                <div class="space-y-6">
                    <div
                        class="bg-white p-6 rounded-3xl border border-gray-200 shadow-lg shadow-gray-100 sticky top-24">

                        <h3 class="font-bold text-gray-900 text-lg mb-6 border-b border-gray-100 pb-2">Informasi Penting
                        </h3>

                        {{-- Info Details --}}
                        <div class="space-y-5 mb-8">
                            {{-- Date --}}
                            <div class="flex items-start gap-4">
                                <div class="p-2.5 bg-green-50 text-green-600 rounded-xl shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">Waktu Pelaksanaan
                                    </p>
                                    <p class="text-sm font-semibold text-gray-700 mt-1">
                                        {{ $event->start_date->format('d M Y, H:i') }}
                                    </p>
                                    <p class="text-xs text-gray-500">s/d {{ $event->end_date->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            </div>

                            {{-- Location --}}
                            <div class="flex items-start gap-4">
                                <div class="p-2.5 bg-blue-50 text-blue-600 rounded-xl shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">Lokasi</p>
                                    <p class="text-sm font-semibold text-gray-700 mt-1 line-clamp-2">
                                        {{ $event->location_name }}
                                    </p>
                                </div>
                            </div>

                            {{-- Volunteers Count --}}
                            <div class="flex items-start gap-4">
                                <div class="p-2.5 bg-orange-50 text-orange-600 rounded-xl shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">Relawan Terdaftar
                                    </p>
                                    <div class="flex items-baseline mt-1">
                                        <span
                                            class="text-lg font-bold text-green-600">{{ $event->participants->count() }}</span>
                                        <span class="text-xs text-gray-500 ml-1">/
                                            {{ $event->target_volunteers ?? '∞' }} orang</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                        @php
                                            $percent =
                                                $event->target_volunteers > 0
                                                    ? ($event->participants->count() / $event->target_volunteers) * 100
                                                    : 0;
                                        @endphp
                                        <div class="bg-green-500 h-1.5 rounded-full"
                                            style="width: {{ min($percent, 100) }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Organizer Section (Updated) --}}
                        <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100 mb-6">
                            <p class="text-[10px] uppercase font-bold text-gray-400 mb-3 tracking-widest">
                                Diselenggarakan Oleh
                            </p>
                            <div class="flex items-center gap-3 mb-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($event->organizer->name) }}&background=16a34a&color=fff"
                                    class="w-12 h-12 rounded-full ring-2 ring-white shadow-sm"
                                    alt="{{ $event->organizer->name }}">
                                <div>
                                    <p class="text-sm font-bold text-gray-800">
                                        {{ $event->organizer->name }}
                                    </p>
                                    <div class="flex text-yellow-400 text-xs">
                                        ★★★★★ <span
                                            class="text-gray-400 ml-1 font-medium">({{ $event->organizer->rating ?? '5.0' }})</span>
                                    </div>
                                </div>
                            </div>

                            {{-- CONTACT INFO --}}
                            <div class="space-y-2 pt-3 border-t border-slate-200">
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $event->organizer->email ?? 'Email tidak tersedia' }}
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    {{ $event->organizer->phone ?? 'Nomor tidak tersedia' }}
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="space-y-3">
                            <button
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg shadow-green-200 transform active:scale-95 flex justify-center items-center gap-2">
                                <span>Ikut Kegiatan Ini</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </button>

                            @if ($event->canBeFinished())
                                <button
                                    class="w-full bg-white border-2 border-green-600 text-green-700 font-bold py-3.5 rounded-xl hover:bg-green-50 transition-colors">
                                    Selesaikan Kegiatan
                                </button>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
