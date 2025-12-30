<x-guest-layout>
    {{-- Container Utama Kartu  --}}
    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-xl w-full max-w-md mx-auto">

        {{-- Branding Header --}}
        <div class="text-center mb-8">
            {{-- Ikon Relawan --}}
            <div class="mx-auto w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Volunteer Finder</h2>
            <p class="text-sm text-gray-500">"Wujudkan perubahan mulai dari dirimu."</p>
        </div>

        {{-- Judul Halaman & Teks Instruksi yang Ramah --}}
        <div class="mb-6 text-center">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Lupa Kata Sandi?</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                {{ __('Jangan khawatir, ini hal yang wajar. Masukkan alamat email yang Anda gunakan saat mendaftar, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.') }}
            </p>
        </div>

        <x-auth-session-status class="mb-4 bg-green-50 text-green-700 p-3 rounded-xl text-sm" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-6">
                <x-input-label for="email" :value="__('Alamat Email')" class="font-medium text-gray-700 ml-1 mb-1" />
                <x-text-input id="email" class="block mt-1 w-full px-4 py-3 rounded-xl bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500"
                              type="email" name="email" :value="old('email')" required autofocus placeholder="Masukkan email terdaftar..." />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button type="submit" class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition ease-in-out duration-150 shadow-md hover:shadow-lg flex items-center justify-center">
                    {{ __('Kirim Tautan Reset') }}
                </button>
            </div>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Sudah ingat kata sandi Anda? <br>
                    <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800 font-semibold hover:underline transition">
                        Kembali ke Halaman Masuk
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>