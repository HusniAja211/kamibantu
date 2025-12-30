<nav class="bg-white border-b border-gray-400" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center gap-10">
                <p class="flex items-center gap-2 group">
                    <span class="text-2xl">🌱</span>
                    <span class="font-bold text-xl tracking-tight text-gray-800">
                        Kami<span class="text-green-500 group-hover:text-green-600 transition">Bantu</span>
                    </span>
                </p>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('dashboard') }}"
                        class="text-gray-600 hover:text-green-600 font-medium transition {{ request()->routeIs('dashboard') ? 'text-green-600' : '' }}">
                        Kegiatan
                    </a>
                    <a href="{{ route('events.create') }}"
                        class="text-gray-600 hover:text-green-600 font-medium transition {{ request()->routeIs('events.create') ? 'text-green-600' : '' }}">
                        Buat Acara
                    </a>
                </div>
            </div>

            <div class="flex items-center">
                <div class="relative" @click.away="open = false">
                    <button @click="open = !open" class="flex items-center gap-3 focus:outline-none group">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-gray-800 group-hover:text-green-600">
                                {{ Auth::user()->name }}</p>
                        </div>

                        <div class="relative">
                            <img class="h-9 w-9 rounded-full border-2 border-green-100 object-cover"
                                src="{{ auth()->user()->avatar
                                    ? asset('storage/' . auth()->user()->avatar)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=16a34a&color=fff' }}"
                                alt="Avatar">
                            <div class="absolute -bottom-1 -right-1 bg-white rounded-full p-0.5 shadow-sm">
                                <svg :class="open ? 'rotate-180' : ''"
                                    class="w-3 h-3 text-gray-400 transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50"
                        style="display: none;">

                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition">
                            <svg class="w-4 h-4 mr-3 opacity-70" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profil Saya
                        </a>

                        <a href="{{ route('myactivities') }}"
                            class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition">
                            <svg class="w-4 h-4 mr-3 opacity-70" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Aktivitas Saya
                        </a>

                        <hr class="my-1 border-gray-50">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                                <svg class="w-4 h-4 mr-3 opacity-70" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
