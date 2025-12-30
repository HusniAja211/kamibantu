<x-guest-layout>
    {{-- Container Kartu --}}
    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-xl w-full max-w-md mx-auto text-center">
        
        {{-- Visual Icon: Amplop Surat --}}
        <div class="mx-auto w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 animate-pulse">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>

        {{-- Judul Halaman --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-3">
            {{ __('Verifikasi Email Anda') }}
        </h2>

        {{-- Teks Penjelasan --}}
        <div class="mb-6 text-sm text-gray-600 leading-relaxed">
            {{ __('Terima kasih telah mendaftar! Sebelum memulai langkah kebaikanmu, mohon verifikasi alamat email dengan mengklik tautan yang baru saja kami kirimkan. Jika email tidak masuk, cek folder spam atau minta tautan baru di bawah ini.') }}
        </div>

        {{-- Status Pesan (Jika tombol kirim ulang ditekan) --}}
        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 font-medium text-sm text-green-700 bg-green-50 border border-green-100 rounded-xl p-4">
                {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.') }}
            </div>
        @endif

        <div class="space-y-4">
            {{-- Tombol Kirim Ulang --}}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition ease-in-out duration-150 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </button>
            </form>

            {{-- Tombol Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-500 hover:text-gray-800 underline decoration-gray-300 hover:decoration-gray-800 transition-all">
                    {{ __('Keluar / Ganti Akun') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>