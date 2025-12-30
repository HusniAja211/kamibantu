<x-app-layout title="Buat Kegiatan Baru">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- {{-- Header --}} -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Buat Kegiatan Baru ✨</h1>
                <p class="text-gray-500 mt-1">
                    Isi detail kegiatan untuk mengajak relawan bergabung.
                </p>
            </div>
        </div>

        <!-- {{-- FORM --}} -->
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- {{-- LEFT --}} -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- {{-- Banner --}} -->
                    <div class="bg-white p-6 rounded-3xl border border-gray-300 shadow-sm relative">
                        <span class="absolute top-4 left-4 bg-white px-3 py-1 text-xs font-bold rounded-md border">
                            Banner Kegiatan
                        </span>

                        <div
                            class="border-2 border-dashed border-gray-300 rounded-2xl h-64 flex flex-col items-center justify-center text-center hover:border-green-400 transition">
                            <svg class="w-10 h-10 text-green-600 mb-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14" />
                            </svg>

                            <p class="font-semibold text-gray-700">Klik untuk upload gambar</p>
                            <p class="text-xs text-gray-500 mt-1">PNG / JPG maksimal 5MB</p>

                            <input type="file" name="banner" class="absolute inset-0 opacity-0 cursor-pointer">
                        </div>
                    </div>

                    <!-- {{-- DETAIL --}} -->
                    <div class="bg-white p-8 rounded-3xl border border-gray-300 shadow-sm">
                        <h2 class="text-lg font-bold mb-6">Detail Utama</h2>

                        <div class="space-y-5">
                            <!-- {{-- Title --}} -->
                            <div>
                                <label class="text-xs font-bold uppercase text-gray-600">Nama Kegiatan</label>
                                <input type="text" name="title" required
                                    placeholder="Contoh: Mengajar Bahasa Inggris untuk Anak Jalanan"
                                    class="w-full mt-2 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-200 focus:border-green-500">
                            </div>

                            <!-- {{-- Category + Target --}} -->
                            <div class="grid md:grid-cols-2 gap-5">
                                <div>
                                    <label class="text-xs font-bold uppercase text-gray-600">Kategori</label>
                                    <select name="category_id" required
                                        class="w-full mt-2 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-200">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="text-xs font-bold uppercase text-gray-600">Target Relawan</label>
                                    <input type="number" name="target_volunteers" min="1"
                                        class="w-full mt-2 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-200">
                                </div>
                            </div>

                            <!-- {{-- Description --}} -->
                            <div>
                                <label class="text-xs font-bold uppercase text-gray-600">Deskripsi & Tugas</label>
                                <textarea name="description" rows="6" required
                                    class="w-full mt-2 px-4 py-3 border rounded-xl resize-none focus:ring-2 focus:ring-green-200"
                                    placeholder="Ceritakan kegiatan dan peran relawan..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- {{-- TIME & LOCATION --}} -->
                    <div class="bg-white p-8 rounded-3xl border border-gray-300 shadow-sm">
                        <h2 class="text-lg font-bold mb-6">Waktu & Lokasi</h2>

                        <div class="grid md:grid-cols-2 gap-5 mb-5">
                            <input type="datetime-local" name="start_date" required
                                class="px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-200">
                            <input type="datetime-local" name="end_date" required
                                class="px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-200">
                        </div>

                        <input type="text" name="location_name" id="location_input"
                            placeholder="Klik untuk memilih lokasi" readonly onclick="openMap()"
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

                <!-- {{-- RIGHT --}} -->
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-3xl border border-gray-400 shadow-sm sticky top-24">
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
                                class="w-full py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition">
                                Terbitkan Kegiatan 🚀
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <x-map />
    </div>
</x-app-layout>
