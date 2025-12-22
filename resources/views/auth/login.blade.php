<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Penjualan</title>
    
    @vite('resources/css/app.css') 
    
</head>
<body class="bg-[#365899] min-h-screen overflow-x-hidden">

    <div class="flex w-full bg-[#365899] min-h-screen"> 
        
        <div class="w-2/3 p-16 text-white flex flex-col justify-center items-center">
            <h1 class="text-6xl font-extrabold mb-4 leading-tight">Selamat Datang!</h1>
            <p class="text-xl font-medium mb-12">Kelola Prospek, Wujudkan Target.</p>
            
            <div class="w-full max-w-lg h-96 bg-transparent mt-8"> 
                <img src="{{ asset('images/Logo.png') }}" 
                     alt="Ilustrasi Dashboard Penjualan" 
                     class="w-full h-full object-contain">
            </div>
        </div>

        <div class="w-1/3 bg-[#E3EBF4] p-20 flex flex-col justify-center shadow-2xl">
            <div class="w-full max-w-sm mx-auto">
                <h2 class="text-4xl font-semibold text-[#1F4287] mb-12 text-center">Silahkan Masuk</h2>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf 
                    
                    <label for="email" class="block text-left text-base font-medium text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan alamat email Anda" 
                           class="w-full p-4 mb-6 border-none rounded-full shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required>

                    <label for="password" class="block text-left text-base font-medium text-gray-700 mb-2">Kata Sandi</label>
                    <div class="relative mb-4">
                        <input type="password" id="passwordInput" name="password" placeholder="Masukkan kata sandi Anda" 
                               class="w-full p-4 border-none rounded-full shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        
                        <span id="togglePassword" class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500">
                            <svg id="eyeClosed" 
                                 xmlns="http://www.w3.org/2000/svg" 
                                 width="24" height="24" 
                                 viewBox="0 0 24 24" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 stroke-width="2" 
                                 stroke-linecap="round" 
                                 stroke-linejoin="round" 
                                 class="lucide lucide-eye-closed-icon h-6 w-6">
                                <path d="m15 18-.722-3.25"/>
                                <path d="M2 8a10.645 10.645 0 0 0 20 0"/>
                                <path d="m20 15-1.726-2.05"/>
                                <path d="m4 15 1.726-2.05"/>
                                <path d="m9 18 .722-3.25"/>
                            </svg>
                            
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </span>
                    </div>
                    
                    <a href="#" class="block text-center text-base text-blue-600 font-medium hover:underline mb-10">Lupa Password?</a>

                    <button type="submit" class="w-full py-4 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition duration-300 shadow-lg text-lg">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('passwordInput');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function (e) {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    eyeOpen.classList.toggle('hidden');
                    eyeClosed.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>