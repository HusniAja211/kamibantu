<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            {{ __('Foto Profil') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __('Gunakan foto terbaik Anda agar penyelenggara kegiatan lebih mudah mengenali Anda.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.avatar.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')

        <div x-data="avatarPreview()" class="flex flex-col md:flex-row items-center gap-8">
            {{-- Preview Container --}}
            <div class="relative group">
                <div
                    class="w-32 h-32 rounded-3xl overflow-hidden ring-4 ring-gray-50 shadow-lg transition-all group-hover:ring-green-100">
                    <template x-if="imageUrl">
                        <img :src="imageUrl" class="w-full h-full object-cover">
                    </template>
                    <template x-if="!imageUrl">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=16a34a&color=fff' }}"
                            class="w-full h-full object-cover">
                    </template>
                </div>

                {{-- Edit Icon Overlay --}}
                <label for="avatar"
                    class="absolute -bottom-2 -right-2 bg-green-600 text-white p-2 rounded-xl shadow-lg cursor-pointer hover:bg-green-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <input id="avatar" name="avatar" type="file" class="hidden" accept="image/*"
                        @change="fileChosen">
                </label>
            </div>

            <div class="flex-1 space-y-4 text-center md:text-left">
                <div>
                    <h3 class="font-bold text-gray-800">Pilih File Foto</h3>
                    <p class="text-xs text-gray-500 mt-1">Format JPG, PNG atau WebP (Maks. 2MB)</p>
                </div>

                <div class="flex flex-wrap justify-center md:justify-start gap-3">
                    <button type="button" @click="confirmUpload"
                        class="px-6 py-2.5 bg-green-600 text-white rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-green-700 transition shadow-sm">
                        {{ __('Unggah Foto Baru') }}
                    </button>

                    @if ($user->avatar)
                        <button type="button" onclick="confirmDelete('{{ route('profile.avatar.destroy') }}')"
                            class="px-6 py-2.5 bg-white border border-gray-200 text-red-600 rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-red-50 transition">
                            {{ __('Hapus') }}
                        </button>
                    @endif
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            </div>
        </div>
    </form>
</section>

<script>
    function avatarPreview() {
        return {
            imageUrl: null,
            fileChosen(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imageUrl = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            confirmUpload() {
                if (!this.imageUrl) {
                    alertWarning('Silakan pilih foto terlebih dahulu');
                    return;
                }

                Swal.fire({
                    title: 'Unggah foto profil?',
                    text: 'Foto lama akan diganti',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#16a34a',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, unggah',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$el.closest('form').submit();
                    }
                });
            }
        }
    }
</script>
