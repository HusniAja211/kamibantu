<x-app-layout title="Kelola Kegiatan {{ $event->title }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Kelola Kegiatan {{ $event->title }}</h1>
                <p class="text-gray-500 mt-1">Isi detail kegiatan untuk mengajak relawan bergabung.</p>
            </div>
            <div class="hidden md:block">
                <a href="#" class="text-sm font-medium text-gray-500 hover:text-green-600 transition">Butuh bantuan?
                    Baca panduan</a>
            </div>
        </div>

        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">

                    <div
                        class="bg-white p-6 rounded-3xl border border-gray-200 shadow-sm group hover:border-green-400 transition-colors cursor-pointer relative">
                        <div class="absolute top-4 left-4 z-10">
                            <span
                                class="bg-white/90 backdrop-blur px-3 py-1 rounded-md text-xs font-bold text-gray-700 border border-gray-200 shadow-sm">
                                Banner Kegiatan
                            </span>
                        </div>
                        <div
                            class="border-2 border-dashed border-gray-300 bg-gray-50 rounded-2xl h-64 flex flex-col items-center justify-center text-center group-hover:bg-green-50/30 group-hover:border-green-400 transition-all">
                            <div class="p-4 bg-white rounded-full shadow-sm border border-gray-100 mb-3">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-gray-700">Klik untuk upload gambar</p>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG up to 5MB</p>
                            <input type="file" name="banner"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-3xl border border-gray-200 shadow-sm">
                        <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                            <span
                                class="w-8 h-8 bg-green-100 text-green-700 rounded-full flex items-center justify-center text-sm mr-3 font-extrabold">1</span>
                            Detail Utama
                        </h2>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama
                                    Kegiatan</label>
                                <input type="text" value="{{ old('title', $event->title) }}" name="title"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 rounded-xl transition shadow-sm text-gray-800 placeholder-gray-400">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label
                                        class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori</label>
                                    <div class="relative">
                                        <select name="category" class="w-full px-4 py-3 border rounded-xl">
                                            <option value="" disabled>Pilih kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('category', $event->category) == $category->id)>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="absolute right-4 top-3.5 pointer-events-none text-gray-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Target
                                        Relawan
                                    </label>
                                    <input type="number"
                                        value="{{ old('target_volunteers', $event->target_volunteers) }}"
                                        class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 rounded-xl transition shadow-sm text-gray-700">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                                    Deskripsi & Tugas
                                </label>
                                <textarea rows="6" name="description"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 rounded-xl transition shadow-sm resize-none text-gray-700">{{ old('description', $event->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-3xl border border-gray-300 shadow-sm">
                        <h2 class="text-lg font-bold mb-6">Waktu & Lokasi</h2>

                        <div class="grid md:grid-cols-2 gap-5 mb-5">
                            <input type="datetime-local" name="start_date" required
                                value="{{ old('start_date', optional($event->start_date)->format('Y-m-d\TH:i')) }}"
                                class="px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-200">
                            <input type="datetime-local" name="end_date" required
                                value="{{ old('end_date', optional($event->end_date)->format('Y-m-d\TH:i')) }}"
                                class="px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-200">
                        </div>

                        <input type="text" name="location_name" id="location_input"
                            value="{{ old('location_name', $event->location_name) }}" readonly onclick="openMap()"
                            class="w-full px-4 py-3 border rounded-xl cursor-pointer">

                        <!-- {{-- Hidden lat lng --}} -->
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">

                        <!-- {{-- Placeholder Map --}} -->
                        <div class="mt-4 h-64 bg-green-50 rounded-xl flex items-center justify-center text-green-700">
                            Google Maps Pin Area
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-300 rounded-xl">
                            <ul class="text-sm text-red-700 list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="lg:col-span-1 space-y-6">

                    <div class="bg-white p-6 rounded-3xl border border-gray-200 shadow-sm sticky top-24">
                        <h3 class="text-sm font-bold text-gray-900 mb-4">Tips Penulisan Efektif 💡</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Gunakan judul yang <strong>spesifik &
                                        menarik</strong>.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Jelaskan <strong>dampak</strong> yang akan
                                    dihasilkan.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Foto yang cerah menarik perhatian 3x lipat.</span>
                            </li>
                        </ul>

                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <button type="submit"
                                class="w-full py-3.5 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition shadow-lg shadow-green-200 transform hover:-translate-y-0.5 active:scale-95">
                                Perbarui Kegiatan 🚀
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <x-map />
    </div>
</x-app-layout>
