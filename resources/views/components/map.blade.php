<div id="mapModal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center">

    <div class="bg-white w-full h-full md:w-4/5 md:h-4/5 rounded-2xl flex flex-col">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <h2 class="font-bold">Pilih Lokasi</h2>
            <button onclick="closeMap()" class="font-bold">✕</button>
        </div>
        <div class="p-4 flex-1 overflow-y-auto">
            <input id="search" type="search" placeholder="Cari alamat atau tempat"
                class="w-full mb-3 px-4 py-2 border rounded-lg">
            <div id="map" style="height: 60vh; width: 100%;" class="rounded-xl"></div>
        </div>
    </div>
</div>
