<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Penjualan</title>
    
    @vite('resources/css/app.css') 
    
</head>
<body class="bg-[#365899] min-h-screen overflow-x-hidden flex flex-col items-center justify-start p-4 sm:p-8 md:block md:p-0">

    {{-- === TAMPILAN MOBILE (Optimized) === --}}
    <div class="md:hidden w-full flex flex-col items-center justify-center min-h-[90vh]">
        
        {{-- Header Teks & Logo --}}
        <div class="text-white text-center w-full mb-6">
            <img src="{{ asset('images/Logo.png') }}" 
                 alt="Logo Manajemen Penjualan" 
                 class="w-16 h-auto mx-auto mb-4"> {{-- w-20 jadi w-16 biar lebih manis --}}
            
            {{-- text-4xl jadi text-3xl agar tidak terlalu raksasa di HP --}}
            <h1 class="text-3xl font-extrabold mb-2">Selamat Datang!</h1> 
            <p class="text-base font-medium opacity-90">Kelola Prospek, Wujudkan Target.</p>
        </div>

        {{-- Card Form Login --}}
        {{-- p-8 diubah jadi p-6 agar input lebih lega --}}
        <div class="relative w-full max-w-sm bg-[#E3EBF4] rounded-2xl shadow-2xl p-6 sm:p-8"> 
            
            <div class="relative z-20 w-full"> 
                <h2 class="text-2xl font-bold text-[#1F4287] mb-6 text-center">Silahkan Masuk</h2>
                
                @if (session('loginError'))
                    <div id="alert-box" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6 text-center shadow-sm transition-opacity duration-500 ease-out" role="alert">
                        <strong class="font-bold">Gagal!</strong>
                        <span class="block sm:inline">{{ session('loginError') }}</span>
                    </div>

                    {{-- <script>
                        setTimeout(function() {
                            var alertElement = document.getElementById('alert-box');
                            if (alertElement) {
                                // Langkah 1: Ubah transparansi menjadi 0 (efek memudar)
                                alertElement.style.opacity = '0';
                                
                                // Langkah 2: Tunggu 0.5 detik (sesuai duration-500) lalu hilangkan elemennya agar layout naik
                                setTimeout(function() {
                                    alertElement.style.display = 'none';
                                }, 500);
                            }
                        }, 1000); // <-- Ganti 3000 dengan angka lain (ms) untuk mengatur lama munculnya (3000 = 3 detik)
                    </script> --}}
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf 
                    
                    <label for="username" class="block text-left text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                    <input type="username" id="username" name="username" placeholder="Masukkan Username" 
                           class="w-full p-3 mb-4 border-none rounded-full shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required>

                    <label for="password" class="block text-left text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
                    <div class="relative mb-4">
                        <input type="password" class="password-input w-full p-3 border-none rounded-full shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none" name="password" placeholder="Masukkan kata sandi" required>
                        
                        <span class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500">
                             <svg class="eye-icon-closed lucide lucide-eye-closed-icon h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-.722-3.25"/><path d="M2 8a10.645 10.645 0 0 0 20 0"/><path d="m20 15l-1.726-2.05"/><path d="m4 15l1.726-2.05"/><path d="m9 18l.722-3.25"/></svg>
                             <svg class="eye-icon-open h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </span>
                    </div>
                    
                    {{-- <div class="flex justify-end">
                        <a href="#" class="block text-base text-blue-600 font-medium hover:underline mb-10">
                            Lupa Password?
                        </a>
                    </div> --}}

                    <button type="submit" class="w-full py-3.5 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition duration-300 shadow-lg text-base transform active:scale-95">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    {{-- === TAMPILAN DESKTOP (Tidak Berubah) === --}}
    <div class="hidden md:flex w-full bg-[#365899] min-h-screen"> 
        <div class="w-2/3 p-16 text-white flex flex-col justify-center items-center">
            <h1 class="text-6xl font-extrabold mb-4 leading-tight">Selamat Datang!</h1>
            <p class="text-xl font-medium mb-12">Kelola Prospek, Wujudkan Target.</p>
            <div class="w-full max-w-lg h-96 bg-transparent mt-8"> 
                <img src="{{ asset('images/Logo.png') }}" alt="Ilustrasi Dashboard" class="w-full h-full object-contain">
            </div>
        </div>

        <div class="w-1/2 bg-[#E3EBF4] p-20 flex flex-col justify-center shadow-2xl">
            <div class="w-full max-w-sm mx-auto">
                <h2 class="text-4xl font-semibold text-[#1F4287] mb-12 text-center">Silahkan Masuk</h2>       
                @if (session('loginError'))
                    <div id="alert-box" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6 text-center shadow-sm transition-opacity duration-500 ease-out" role="alert">
                        <strong class="font-bold">Gagal!</strong>
                        <span class="block sm:inline">{{ session('loginError') }}</span>
                    </div>

                    {{-- <script>
                        setTimeout(function() {
                            var alertElement = document.getElementById('alert-box');
                            if (alertElement) {
                                // Langkah 1: Ubah transparansi menjadi 0 (efek memudar)
                                alertElement.style.opacity = '0';
                                
                                // Langkah 2: Tunggu 0.5 detik (sesuai duration-500) lalu hilangkan elemennya agar layout naik
                                setTimeout(function() {
                                    alertElement.style.display = 'none';
                                }, 500);
                            }
                        }, 1000); // <-- Ganti 3000 dengan angka lain (ms) untuk mengatur lama munculnya (3000 = 3 detik)
                    </script> --}}
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf 
                    
                    <label for="username" class="block text-left text-base font-medium text-gray-700 mb-2">Username</label>
                    <input type="username" id="username" name="username" placeholder="Masukkan Username" 
                           class="w-full p-4 mb-6 border-none rounded-full shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required>

                    <label for="password" class="block text-left text-base font-medium text-gray-700 mb-2">Kata Sandi</label>
                    <div class="relative mb-4">
                        <input type="password" class="password-input w-full p-4 border-none rounded-full shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none" name="password" placeholder="Masukkan Kata Sandi" required>
                        
                        <span class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500">
                             <svg class="eye-icon-closed h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-.722-3.25"/><path d="M2 8a10.645 10.645 0 0 0 20 0"/><path d="m20 15l-1.726-2.05"/><path d="m4 15l1.726-2.05"/><path d="m9 18l.722-3.25"/></svg>
                             <svg class="eye-icon-open h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </span>
                    </div>


                    {{-- <div class="flex justify-end">
                        <a href="#" class="block text-base text-blue-600 font-medium hover:underline mb-10">
                            Lupa Password?
                        </a>
                    </div>
                     --}}
                    <button type="submit" class="w-full py-4 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition duration-300 shadow-lg text-lg">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- SCRIPT JAVASCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    const passwordInput = button.closest('.relative').querySelector('.password-input');
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
</body>
</html>