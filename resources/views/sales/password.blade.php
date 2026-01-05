@extends('layouts.sales')

@section('content')
<div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 md:p-10 max-w-4xl mx-auto mt-6 md:mt-10 relative">
    
    {{-- HEADER --}}
    <div class="flex justify-between items-start mb-8">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Pengaturan Akun</h3>
            <p class="text-sm text-gray-400 mt-1">Ubah Username dan Kata Sandi Anda.</p>
        </div>

        {{-- TOMBOL UBAH --}}
        <button type="button" id="btn-enable-edit" onclick="enableEditing()" 
                class="flex items-center gap-2 px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-full font-semibold shadow-md transition transform active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <span class="hidden md:inline">Ubah Akun</span>
            <span class="md:hidden">Ubah</span>
        </button>
    </div>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl shadow-sm">
            <strong>Berhasil!</strong> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sales.password.update') }}" method="POST"> 
        @csrf
        @method('PUT')
        
        <div class="space-y-6">

            {{-- 1. USERNAME (BARU DITAMBAHKAN) --}}
            <div>
                <label class="block text-base font-bold text-gray-800 mb-2 ml-1">Username Login</label>
                <div class="relative">
                    <input type="text" 
                           name="username" 
                           id="username"
                           class="editable-input w-full py-3 px-6 rounded-full border border-gray-300 
                                  text-gray-800 font-medium transition
                                  read-only:bg-gray-100 read-only:text-gray-500 read-only:cursor-not-allowed
                                  focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           value="{{ old('username', auth()->user()->username) }}"
                           readonly
                           required>
                </div>
                @error('username')
                    <p class="text-red-500 text-sm mt-1 ml-4">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- 2. Email (Tetap Read Only Selamanya - Biasanya email tidak diganti sembarangan) --}}
            <div>
                <label class="block text-base font-bold text-gray-800 mb-2 ml-1">Email (Tidak dapat diubah)</label>
                <div class="relative">
                    <input type="email" 
                           class="w-full py-3 px-6 rounded-full border border-gray-300 bg-gray-200 text-gray-500 cursor-not-allowed"
                           value="{{ auth()->user()->email ?? '-' }}"
                           readonly>
                </div>
            </div>

            <hr class="border-gray-100 my-4">

            {{-- 3. Kata Sandi Saat Ini --}}
            <div>
                <label class="block text-base font-bold text-gray-800 mb-2 ml-1">Kata Sandi Saat Ini</label>
                <div class="relative">
                    <input type="password" 
                           name="current_password" 
                           id="current_password"
                           placeholder="Klik tombol ubah dulu..."
                           class="editable-input w-full py-3 px-6 pr-12 rounded-full border border-gray-300 
                                  text-gray-600 placeholder-gray-400 transition
                                  read-only:bg-gray-100 read-only:cursor-not-allowed
                                  focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           readonly
                           required>
                    
                    <span class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-blue-600 transition p-2">
                        {{-- Ikon Mata (Sama seperti sebelumnya) --}}
                        <svg class="eye-icon-closed h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                        <svg class="eye-icon-open h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </span>
                </div>
                @error('current_password')
                    <p class="text-red-500 text-sm mt-1 ml-4">{{ $message }}</p>
                @enderror
            </div>

            {{-- 4. Kata Sandi Baru --}}
            <div>
                <label class="block text-base font-bold text-gray-800 mb-2 ml-1">Kata Sandi Baru</label>
                <div class="relative">
                    <input type="password" 
                           name="password" 
                           placeholder="Masukkan kata sandi baru"
                           class="editable-input w-full py-3 px-6 pr-12 rounded-full border border-gray-300 
                                  text-gray-600 placeholder-gray-400 transition
                                  read-only:bg-gray-100 read-only:cursor-not-allowed
                                  focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           readonly
                           required>
                     {{-- Ikon Mata --}}
                     <span class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-blue-600 transition p-2">
                        <svg class="eye-icon-closed h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                        <svg class="eye-icon-open h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </span>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1 ml-4">{{ $message }}</p>
                @enderror
            </div>

            {{-- 5. Konfirmasi --}}
            <div>
                <label class="block text-base font-bold text-gray-800 mb-2 ml-1">Konfirmasi Kata Sandi Baru</label>
                <div class="relative">
                    <input type="password" 
                           name="password_confirmation" 
                           placeholder="Ulangi kata sandi baru"
                           class="editable-input w-full py-3 px-6 pr-12 rounded-full border border-gray-300 
                                  text-gray-600 placeholder-gray-400 transition
                                  read-only:bg-gray-100 read-only:cursor-not-allowed
                                  focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           readonly
                           required>
                     {{-- Ikon Mata --}}
                     <span class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-blue-600 transition p-2">
                        <svg class="eye-icon-closed h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                        <svg class="eye-icon-open h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </span>
                </div>
            </div>

        </div>

        {{-- ACTION BUTTONS --}}
        <div id="action-buttons" class="flex flex-row justify-between items-center mt-10 md:mt-12 gap-4 hidden">
            <button type="button" onclick="window.location.reload()" 
               class="w-full py-3 rounded-full bg-red-100 text-red-600 font-bold hover:bg-red-200 transition text-center">
               Batal
            </button>
            <button type="submit" 
                    class="w-full py-3 rounded-full bg-blue-600 text-white font-bold shadow-lg hover:bg-blue-700 transition transform active:scale-95">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    // 1. Enable Editing
    function enableEditing() {
        const inputs = document.querySelectorAll('.editable-input');
        const btnEdit = document.getElementById('btn-enable-edit');
        const actionButtons = document.getElementById('action-buttons');
        const usernameInput = document.getElementById('username');

        // Buka Kunci Input
        inputs.forEach(input => {
            input.removeAttribute('readonly');
            // Logic placeholder khusus password
            if(input.id === 'current_password') input.placeholder = "Masukkan kata sandi lama";
        });

        // Toggle Buttons
        btnEdit.classList.add('hidden');
        actionButtons.classList.remove('hidden');

        // Focus ke Username agar user sadar bisa ganti username juga
        if(usernameInput) usernameInput.focus();
    }

    // 2. Toggle Visibility Password (Sama seperti sebelumnya)
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButtons = document.querySelectorAll('.toggle-password');
        toggleButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                const container = button.closest('.relative');
                const passwordInput = container.querySelector('input'); 
                const eyeOpen = button.querySelector('.eye-icon-open');
                const eyeClosed = button.querySelector('.eye-icon-closed');
                if (passwordInput) {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    eyeOpen.classList.toggle('hidden');
                    eyeClosed.classList.toggle('hidden');
                }
            });
        });
    });
</script>
@endsection