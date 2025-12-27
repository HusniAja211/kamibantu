<x-app-layout title="Beranda Relawan">
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
            Halo, Siap beraksi hari ini? 👋
        </h1>
        <p class="text-gray-500 mt-2">
            Pilih kegiatan di bawah ini dan mulai buat perubahan kecil yang berdampak besar.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-xl font-bold text-gray-800 self-start sm:self-center">Rekomendasi Kegiatan</h2>
        <div class="relative w-full sm:w-64">
            <input type="text" placeholder="Cari kegiatan..." class="w-full pl-10 pr-4 py-2 rounded-xl border border-gray-200 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <x-activity-card 
            id="1"
            image="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
            category="Lingkungan"
            title="Bersih Pantai Ancol: Jaga Laut Kita"
            date="24 Des 2024"
            location="Jakarta Utara"
            organizer="Green Earth ID"
            rating="4.9"
        />

        <x-activity-card 
            id="2"
            image="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
            category="Edukasi"
            categoryColor="blue" 
            title="Mengajar Anak Jalanan: Kelas Inspirasi"
            date="26 Des 2024"
            location="Bogor"
            organizer="Yayasan Peduli"
            rating="4.5"
        />

    </div>
</x-app-layout>