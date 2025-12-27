<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center lg:justify-end bg-cover bg-center relative px-4 py-6" 
         style="background-image: url('https://images.unsplash.com/photo-1559027615-cd26735550b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');">
        
        <div class="absolute inset-0 bg-gradient-to-r from-green-900/80 via-green-900/40 to-transparent backdrop-blur-[1px]"></div>

        <div class="relative w-full max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            
            <div class="hidden lg:block text-white pr-8">
                <div class="inline-flex items-center space-x-2 mb-4">
                    <div class="p-2 bg-white/20 backdrop-blur-md rounded-lg">
                        <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-wide text-green-100">KamiBantu</span>
                </div>
                <h1 class="text-5xl font-extrabold leading-tight mb-4 drop-shadow-lg">
                    Mulai Langkah<br>Kebaikanmu.
                </h1>
                <p class="text-lg text-green-50/90 font-light max-w-md">
                    Daftar dalam hitungan detik. Satu akun untuk menjadi relawan atau membuat kegiatan sosial.
                </p>
            </div>

            <div class="w-full max-w-md mx-auto lg:ml-auto">
                <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/40 overflow-hidden">
                    
                    <div class="px-8 pt-6 pb-2">
                        <h2 class="text-xl font-bold text-gray-800">Buat Akun Baru</h2>
                        <p class="text-xs text-gray-500 mt-1">Lengkapi data diri Anda untuk melanjutkan.</p>
                    </div>

                    <div class="p-8 pt-4">
                        <form method="POST" action="{{ route('register') }}" class="space-y-3">
                            @csrf

                            <div>
                                <label for="name" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Nama Lengkap</label>
                                <x-text-input id="name"
                                    class="block w-full px-4 py-2 bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-lg text-sm transition-all"
                                    type="text" name="name" :value="old('name')" required autofocus 
                                    placeholder="Nama Anda" />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            <div>
                                <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Alamat Email</label>
                                <x-text-input id="email"
                                    class="block w-full px-4 py-2 bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-lg text-sm transition-all"
                                    type="email" name="email" :value="old('email')" required 
                                    placeholder="nama@email.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>
                            

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div>
                                    <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Password</label>
                                    <x-text-input id="password"
                                        class="block w-full px-4 py-2 bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-lg text-sm transition-all"
                                        type="password" name="password" minlength="8" maxlength="8" required 
                                        placeholder="••••••••" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Konfirmasi</label>
                                    <x-text-input id="password_confirmation"
                                        class="block w-full px-4 py-2 bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-lg text-sm transition-all"
                                        type="password" name="password_confirmation" minlength="8" maxlength="8" required 
                                        placeholder="••••••••" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                                </div>
                            </div>

                            <div class="flex items-start mt-2">
                                <div class="flex items-center h-5">
                                    <input id="terms" type="checkbox" required class="w-3.5 h-3.5 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-green-300 text-green-600">
                                </div>
                                <label for="terms" class="ml-2 text-xs font-medium text-gray-500">
                                    Saya setuju dengan <a href="#" class="text-green-600 hover:underline">Syarat & Ketentuan</a>.
                                </label>
                            </div>

                            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all shadow-md active:scale-95 mt-4">
                                Daftar Sekarang
                            </button>
                        </form>

                        <div class="mt-5 text-center border-t border-gray-200/60 pt-4">
                            <p class="text-xs text-gray-500">
                                Sudah memiliki akun? 
                                <a href="{{ route('login') }}" class="text-green-600 font-bold hover:text-green-800 transition-colors ml-1">
                                    Masuk di sini
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                 <p class="mt-4 text-center lg:text-right text-gray-300/80 text-[10px]">
                    &copy; 2025 KamiBantu.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>