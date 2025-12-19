<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Clarity Sales</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen h-screen overflow-hidden">
    
    @include('admin.partials.sidebar')
    
    <main class="flex-1 p-8 overflow-y-auto">
        
        <header class="flex justify-between items-center mb-10">
            
            {{-- Placeholder kiri --}}
            <div class="w-10 h-10"></div> 
            
            {{-- KOTAK TELUSURI --}}
            <div class="relative w-full max-w-lg mx-auto"> 
                
                {{-- Input Field --}}
                <input type="text" placeholder="Telusuri" 
                    class="w-full p-3 pl-4 
                           border-2 border-blue-400  
                           rounded-full 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                           text-gray-700 placeholder-blue-500 font-medium 
                           shadow-md outline-none">
                
                {{-- Icon Pencarian --}}
                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
            
            {{-- PROFIL AVATAR & DROPDOWN CONTAINER --}}
            <div class="relative">
                
                {{-- Tombol Avatar --}}
                <button id="profileDropdownBtn" class="w-10 h-10 rounded-full overflow-hidden focus:outline-none ring-2 ring-transparent hover:ring-blue-500 transition duration-150">
                    <img src="{{ asset('images/Profil.png') }}" alt="Foto Profil Admin" class="w-full h-full object-cover">
                </button>

                {{-- Konten Dropdown (Tersembunyi secara default) --}}
                <div id="profileDropdownContent" 
                     class="absolute right-0 mt-3 w-64 bg-white rounded-lg shadow-xl py-3 
                            border border-gray-200 hidden transition duration-200 z-50">
                    
                    {{-- Header Dropdown (Dummy User Info) --}}
                    <div class="px-4 pb-3 border-b border-gray-200">
                        @php
                            $userName = 'Admin Clara Sales'; 
                            $userEmail = 'admin@clarasales.com'; 
                        @endphp
                        
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ $userName }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $userEmail }}</p>
                    </div>

                    {{-- Link Profil (MENGGUNAKAN NAMA RUTE SEDERHANA: admin.profil) --}}
                    <a href="{{ route('admin.profil') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Profil
                    </a>
                    
                    {{-- Link Logout --}}
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:bg-red-50 transition duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </a>

                    {{-- Form tersembunyi untuk proses Logout --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        @yield('content')
    </main>
</div>

{{-- SCRIPT JAVASCRIPT UNTUK TOGGLE DROPDOWN --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('profileDropdownBtn');
        const dropdown = document.getElementById('profileDropdownContent');

        function toggleDropdown() {
            dropdown.classList.toggle('hidden');
        }

        // 1. Event listener untuk tombol (klik)
        button.addEventListener('click', toggleDropdown);

        // 2. Event listener untuk menutup saat mengklik di luar area dropdown
        document.addEventListener('click', function(event) {
            // Cek jika klik bukan pada tombol DAN bukan pada konten dropdown
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    });
</script>

</body>
</html>