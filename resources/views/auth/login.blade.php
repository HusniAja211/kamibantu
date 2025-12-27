<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center lg:justify-end bg-cover bg-center relative px-4 py-8" 
         style="background-image: url('https://images.unsplash.com/photo-1559027615-cd26735550b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');">
        
        <div class="absolute inset-0 bg-gradient-to-r from-green-900/80 via-green-900/40 to-transparent backdrop-blur-[1px]"></div>

        <div class="relative w-full max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            
            <div class="hidden lg:block text-white pr-8">
                <div class="inline-flex items-center space-x-2 mb-4">
                    <div class="p-2 bg-white/20 backdrop-blur-md rounded-lg">
                        <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-wide text-green-100">KamiBantu</span>
                </div>
                <h1 class="text-5xl font-extrabold leading-tight mb-4 drop-shadow-lg">
                    Aksi Kecil,<br>Dampak Besar.
                </h1>
                <p class="text-lg text-green-50/90 font-light max-w-md">
                    Bergabunglah dengan komunitas relawan dan mulailah perjalanan perubahanmu hari ini.
                </p>
            </div>

            <div class="w-full max-w-md mx-auto lg:ml-auto">
                <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/40 overflow-hidden">
                    
                    <div class="px-8 pt-6 pb-2">
                        <h2 class="text-xl font-bold text-gray-800">Selamat Datang</h2>
                        <p class="text-xs text-gray-500 mt-1">Masuk untuk mengakses dashboard relawan.</p>
                    </div>

                    <div class="p-8 pt-4">
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf

                            <div>
                                <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Email</label>
                                <x-text-input id="email"
                                    class="block w-full px-4 py-2 bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-lg text-sm transition-all"
                                    type="email" name="email" :value="old('email')" required autofocus 
                                    placeholder="nama@email.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            <div>
                                <div class="flex justify-between mb-1">
                                    <label for="password" class="text-xs font-bold text-gray-500 uppercase tracking-wider">Password</label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-xs text-green-600 hover:text-green-700 font-semibold hover:underline">
                                            Lupa?
                                        </a>
                                    @endif
                                </div>
                                <x-text-input id="password"
                                    class="block w-full px-4 py-2 bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-lg text-sm transition-all"
                                    type="password" name="password" required 
                                    placeholder="••••••••" />
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember"
                                    class="w-3.5 h-3.5 rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <label for="remember" class="ml-2 text-xs text-gray-600 cursor-pointer">Ingat saya</label>
                            </div>

                            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all shadow-md active:scale-95">
                                Masuk Sekarang
                            </button>
                        </form>

                        <div class="mt-6 text-center border-t border-gray-200/60 pt-4">
                            <p class="text-xs text-gray-500">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-green-600 font-bold hover:text-green-800 transition-colors ml-1">
                                    Daftar Gratis
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