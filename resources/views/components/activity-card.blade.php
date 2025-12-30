@props([
    'id',
    'image', 
    'category', 
    'title', 
    'date', 
    'location', 
    'organizer', 
    'rating',
    'categoryColor' => 'green' // Default warna hijau
])

<div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100 overflow-hidden flex flex-col">
    <div class="relative h-48 bg-gray-200">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        <div class="absolute top-4 left-4">
            <span class="bg-white/90 backdrop-blur-sm text-{{ $categoryColor }}-600 text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                {{ $category->name }}
            </span>
        </div>
    </div>

    <div class="p-5 flex-grow flex flex-col">
        <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2 hover:text-green-600 transition">
            {{ $title }}
        </h3>

        <div class="flex items-center text-sm text-gray-500 mb-4 gap-4">
            <div class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>{{ $date }}</span>
            </div>
            <div class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span>{{ $location }}</span>
            </div>
        </div>

        <div class="border-t border-gray-100 my-3"></div>

        <div class="flex items-center justify-between mt-auto">
            <div class="flex items-center gap-2">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($organizer) }}&background=random" class="w-8 h-8 rounded-full" alt="Organizer">
                <div>
                    <p class="text-xs font-semibold text-gray-700">{{ $organizer }}</p>
                    <div class="flex text-yellow-400 text-[10px]">
                        ★★★★★ <span class="text-gray-400 ml-1">({{ $rating }})</span>
                    </div>
                </div>
            </div>
        </div>
        
        <a href="{{ route('events.show', $id) }}" class="mt-4 w-full block text-center bg-green-500 hover:bg-green-600 text-white font-medium py-2.5 px-4 rounded-xl transition duration-200 shadow-green-200 shadow-md">
            Lihat Detail
        </a>
    </div>
</div>