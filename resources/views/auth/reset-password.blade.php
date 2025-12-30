<x-guest-layout>
    {{-- Container Kartu --}}
    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-xl w-full max-w-md mx-auto">
        
        {{-- Branding Header --}}
        <div class="text-center mb-8">
            <div class="mx-auto w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Atur Ulang Kata Sandi</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan buat kata sandi baru untuk akun Anda.</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-5">
                <x-input-label for="email" :value="__('Alamat Email')" class="font-medium text-gray-700 ml-1 mb-1" />
                <x-text-input id="email" class="block mt-1 w-full px-4 py-3 rounded-xl bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500" 
                              type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" readonly />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-5">
                <x-input-label for="password" :value="__('Kata Sandi Baru')" class="font-medium text-gray-700 ml-1 mb-1" />
                <x-text-input id="password" class="block mt-1 w-full px-4 py-3 rounded-xl bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500" 
                              type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Ulangi Kata Sandi')" class="font-medium text-gray-700 ml-1 mb-1" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full px-4 py-3 rounded-xl bg-gray-50 border-gray-200 focus:border-green-500 focus:ring-green-500"
                                type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button type="submit" class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition ease-in-out duration-150 shadow-md hover:shadow-lg flex items-center justify-center transform active:scale-95">
                    {{ __('Simpan Kata Sandi Baru') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>