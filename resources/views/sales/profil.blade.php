@extends('layouts.sales')

@section('content')

    <div class="w-full max-w-4xl mx-auto pt-4 pb-20"> 
        
        {{-- TAMBAHAN: Menampilkan Error Validasi (Jika Request menolak input) --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-6 py-4 rounded-xl shadow-sm animate-pulse">
                <div class="flex items-center gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <strong class="font-bold">Periksa kembali input Anda:</strong>
                </div>
                <ul class="list-disc list-inside text-sm ml-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- SUCCESS MESSAGE (Opsional, jika controller mengirim session success) --}}
        @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl shadow-sm">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <strong>{{ session('success') }}</strong>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 md:p-10 relative"> 
            
            {{-- HEADER: JUDUL & TOMBOL UBAH --}}
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Profil Saya</h2>
                
                {{-- Tombol CHANGE / UBAH DATA --}}
                {{-- Variable $isProfileExists dikirim dari Controller --}}
                <button type="button" id="btn-enable-edit" onclick="enableEditing()" 
                        class="flex items-center gap-2 px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-full font-semibold shadow-md transition transform active:scale-95 {{ !$isProfileExists ? 'hidden' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    <span>Ubah Data</span>
                </button>
            </div>

            <form action="{{ route('sales.profil.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
                @csrf
                @method('PUT') 
                
                {{-- FOTO PROFIL --}}
                <div class="flex justify-center -mt-4 mb-8">
                    <div class="relative group">
                        <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden border-4 border-gray-100 shadow-sm relative">
                            @if($sales && $sales->foto)
                                <img id="profile-preview" 
                                    src="{{ asset('storage/' . $sales->foto) }}" 
                                    alt="Foto Profil" 
                                    class="w-full h-full object-cover">
                            @else
                                {{-- Default jika belum ada foto --}}
                                <img id="profile-preview" 
                                    src="{{ asset('images/Profil.png') }}" 
                                    alt="Foto Profil Default" 
                                    class="w-full h-full object-cover">
                            @endif
                            
                            {{-- Overlay Upload (Hanya muncul jika mode edit aktif) --}}
                            <div id="photo-overlay" class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 transition duration-200 cursor-pointer hidden">
                                <span class="text-white text-xs font-bold">Ubah Foto</span>
                            </div>
                        </div>

                        {{-- Input File --}}
                        {{-- Menggunakan class @error untuk border merah jika validasi foto gagal --}}
                        <input type="file" name="foto" id="foto_input" class="hidden" accept="image/*" onchange="previewImage(event)" disabled>
                    </div>
                </div>

                {{-- FORM FIELDS --}}
                <div class="space-y-6">
                    
                    {{-- 1. Nama Lengkap --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Nama Lengkap</label>
                        <input type="text" 
                               name="nama_lengkap" 
                               id="nama_lengkap"
                               value="{{ old('nama_lengkap', $sales->nama_lengkap ?? $user->username) }}" 
                               {{ $isProfileExists ? 'readonly' : '' }}
                               class="w-full py-3 px-6 rounded-full border 
                                      {{ $errors->has('nama_lengkap') ? 'border-red-500' : 'border-gray-300' }}
                                      text-gray-800 font-medium
                                      focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition 
                                      read-only:bg-gray-100 read-only:text-gray-500 read-only:cursor-not-allowed read-only:border-transparent">
                    </div>

                    {{-- 2. No. Telepon --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">No. Telepon</label>
                        <input type="text" 
                               name="kontak" 
                               id="kontak"
                               value="{{ old('kontak', $sales->kontak ?? '') }}" 
                               placeholder="0812xxxxxx"
                               {{ $isProfileExists ? 'readonly' : '' }}
                               class="w-full py-3 px-6 rounded-full border 
                                      {{ $errors->has('kontak') ? 'border-red-500' : 'border-gray-300' }}
                                      text-gray-800 font-medium
                                      focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition 
                                      read-only:bg-gray-100 read-only:text-gray-500 read-only:cursor-not-allowed read-only:border-transparent">
                    </div>

                    {{-- 3. Alamat --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Alamat</label>
                        <input type="text" 
                               name="alamat" 
                               id="alamat"
                               value="{{ old('alamat', $sales->alamat ?? '') }}" 
                               placeholder="Masukkan alamat lengkap"
                               {{ $isProfileExists ? 'readonly' : '' }}
                               class="w-full py-3 px-6 rounded-full border 
                                      {{ $errors->has('alamat') ? 'border-red-500' : 'border-gray-300' }}
                                      text-gray-800 font-medium
                                      focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition 
                                      read-only:bg-gray-100 read-only:text-gray-500 read-only:cursor-not-allowed read-only:border-transparent">
                    </div>

                    {{-- 4. Tanggal Lahir --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Tanggal Lahir</label>
                        <input type="date" 
                               name="tanggal_lahir" 
                               id="tanggal_lahir"
                               value="{{ old('tanggal_lahir', $sales->tanggal_lahir ?? '') }}" 
                               {{ $isProfileExists ? 'readonly' : '' }}
                               class="w-full py-3 px-6 rounded-full border 
                                      {{ $errors->has('tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }}
                                      text-gray-800 font-medium
                                      focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition 
                                      read-only:bg-gray-100 read-only:text-gray-500 read-only:cursor-not-allowed read-only:border-transparent">
                    </div>

                </div>

                {{-- Action Buttons --}}
                {{-- Logic: Tombol Save Sembunyi jika data sudah ada, muncul jika mode edit --}}
                <div id="action-buttons" class="flex justify-between items-center mt-10 md:mt-12 px-2 gap-4 {{ $isProfileExists ? 'hidden' : '' }}">
                    
                    {{-- Tombol Cancel: Hanya me-reload halaman untuk membatalkan edit --}}
                    <button type="button" onclick="window.location.reload()" 
                            class="w-full text-center py-3 bg-red-100 hover:bg-red-200 text-red-600 font-bold rounded-full transition">
                        Batal
                    </button>
                    
                    <button type="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-lg transition transform active:scale-95">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPT INTERAKTIF --}}
    <script>
        // 1. Fungsi Mengaktifkan Mode Edit
        function enableEditing() {
            // Ambil semua input yang kita izinkan edit
            const inputs = ['nama_lengkap', 'no_telepon', 'alamat', 'tanggal_lahir'];
            const photoInput = document.getElementById('foto_input');
            const photoOverlay = document.getElementById('photo-overlay');
            const actionButtons = document.getElementById('action-buttons');
            const editButton = document.getElementById('btn-enable-edit');

            // Loop untuk membuka kunci readonly
            inputs.forEach(id => {
                const el = document.getElementById(id);
                if(el) {
                    el.removeAttribute('readonly');
                    // Hapus style readonly (opsional, karena Tailwind class menangani state, tapi untuk memastikan)
                    el.classList.remove('read-only:bg-gray-100', 'read-only:cursor-not-allowed');
                }
            });

            // Aktifkan upload foto
            photoInput.removeAttribute('disabled');
            
            // Tampilkan overlay foto agar user tahu bisa diklik
            photoOverlay.classList.remove('hidden');
            photoOverlay.classList.add('opacity-0', 'group-hover:opacity-100'); // Kembalikan efek hover
            
            // Tambahkan event listener klik foto
            photoOverlay.onclick = function() {
                photoInput.click();
            };

            // Tampilkan tombol Save & Batal
            actionButtons.classList.remove('hidden');

            // Sembunyikan tombol "Ubah Data" agar tidak bingung
            editButton.classList.add('hidden');

            // Fokus ke input pertama
            document.getElementById('nama_lengkap').focus();
            
            // Notifikasi Swal (Jika ada library Swal)
            if (typeof Swal !== 'undefined') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'info',
                    title: 'Mode Edit Aktif'
                });
            }
        }

        // 2. Preview Foto
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('profile-preview');
                output.src = reader.result;
            };
            if(event.target.files[0]){
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
@endsection