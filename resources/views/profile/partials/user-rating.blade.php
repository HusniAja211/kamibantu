<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-green-700 flex items-center gap-2">
            <!-- Star Icon -->
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.974c.3.921-.755 1.688-1.54 1.118l-3.38-2.455a1 1 0 00-1.176 0l-3.38 2.455c-.784.57-1.838-.197-1.539-1.118l1.287-3.974a1 1 0 00-.364-1.118L2.045 9.4c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.974z"/>
            </svg>

            {{ __('Reputasi Akun') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600">
            {{ __('Reputasi dihitung otomatis berdasarkan konsistensi dan penyelesaian kegiatan.') }}
        </p>
    </header>

    <!-- GRID REPUTASI -->
    <div class="grid sm:grid-cols-2 gap-4">

        <!-- RELAWAN -->
        <div class="bg-green-50 border border-green-100 rounded-2xl p-6">
            <p class="text-sm text-gray-600">
                {{ __('Sebagai Relawan') }}
            </p>

            <div class="flex items-center gap-2 mt-2">
                <span class="text-2xl text-green-600">⭐⭐</span>
                <span class="font-semibold text-green-700">
                    Terpercaya
                </span>
            </div>

            <p class="text-sm text-gray-500 mt-1">
                {{ __('Aktif dan konsisten menyelesaikan kegiatan relawan') }}
            </p>

            <div class="mt-3 text-sm text-gray-600 space-y-1">
                <p>
                    {{ __('Kegiatan diikuti:') }}
                    <span class="font-semibold text-gray-800">6</span>
                </p>
                <p>
                    {{ __('Kegiatan diselesaikan:') }}
                    <span class="font-semibold text-gray-800">5</span>
                </p>
            </div>
        </div>

        <!-- PENYELENGGARA -->
        <div class="bg-green-50 border border-green-100 rounded-2xl p-6">
            <p class="text-sm text-gray-600">
                {{ __('Sebagai Penyelenggara') }}
            </p>

            <div class="flex items-center gap-2 mt-2">
                <span class="text-2xl text-green-600">⭐</span>
                <span class="font-semibold text-green-700">
                    Aktif
                </span>
            </div>

            <p class="text-sm text-gray-500 mt-1">
                {{ __('Berhasil mengelola kegiatan relawan') }}
            </p>

            <div class="mt-3 text-sm text-gray-600 space-y-1">
                <p>
                    {{ __('Kegiatan dibuat:') }}
                    <span class="font-semibold text-gray-800">2</span>
                </p>
                <p>
                    {{ __('Kegiatan selesai:') }}
                    <span class="font-semibold text-gray-800">1</span>
                </p>
            </div>
        </div>

    </div>
</section>
