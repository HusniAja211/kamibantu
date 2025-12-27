<x-app-layout>
    <!-- {{-- Background gradient selaras dengan halaman Aktivitas Saya --}} -->
    <div class="min-h-screen bg-gradient-to-b from-green-50 to-white pb-20">
        
        <!-- {{-- Header Section --}} -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl mb-3">
                Pengaturan Profil
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Kelola informasi pribadi dan keamanan akunmu agar pengalaman berbagi kebaikan semakin nyaman.
            </p>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- {{-- Card 1: Informasi Profil --}} -->
            <div class="p-6 sm:p-10 bg-white shadow-sm border border-green-100 rounded-3xl hover:shadow-md transition-shadow duration-300">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- {{-- Card 1: Informasi Profil --}} -->
            <div class="p-6 sm:p-10 bg-white shadow-sm border border-green-100 rounded-3xl hover:shadow-md transition-shadow duration-300">
                @include('profile.partials.user-rating')
            </div>

            <!-- {{-- Card 2: Update Password --}} -->
            <div class="p-6 sm:p-10 bg-white shadow-sm border border-green-100 rounded-3xl hover:shadow-md transition-shadow duration-300">
                @include('profile.partials.update-password-form')
            </div>

            <!-- {{-- Card 3: Delete Account (Desain sedikit berbeda untuk warning) --}} -->
            <div class="p-6 sm:p-10 bg-red-50/50 shadow-sm border border-red-100 rounded-3xl opacity-90 hover:opacity-100 transition-all duration-300">
                @include('profile.partials.delete-user-form')
            </div>
            
        </div>
    </div>
</x-app-layout>