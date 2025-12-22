<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Clarity Sales</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans text-gray-800">

<div class="flex min-h-screen h-screen overflow-hidden">
    
    {{-- BAGIAN 1: SIDEBAR DINAMIS --}}
    {{-- Cek apakah rute saat ini adalah halaman profil atau password admin --}}
    @if (request()->routeIs('admin.profil') || request()->routeIs('admin.password'))
        {{-- Load sidebar profil khusus Admin --}}
        @include('admin.partials.sidebar-profil')
    @else
        {{-- Load sidebar utama Admin --}}
        @include('admin.partials.sidebar')
    @endif
    
    <main class="flex-1 p-8 overflow-y-auto">
        
        {{-- BAGIAN 2: HEADER DINAMIS --}}
        {{-- Header HILANG jika sedang di halaman profil atau password --}}
        @if (!request()->routeIs('admin.profil') && !request()->routeIs('admin.password'))
        
            <header class="flex justify-between items-center">
                {{-- Placeholder kiri --}}
                <div class="w-10 h-10"></div> 
                  {{-- KOTAK TELUSURI --}}

                <div class="relative w-full max-w-lg mb-8"> 
                    {{-- Input Field --}}
                    <input type="text" placeholder="Telusuri" 
                        class="w-full p-3 pl-4 
                               border-2 border-blue-400  
                               rounded-full 
                               focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                               text-gray-700 placeholder-blue-500 font-medium 
                               shadow-md outline-none bg-white">
                    
                    {{-- Icon Pencarian --}}
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
               
                
                {{-- PROFIL AVATAR --}}
                <div class="relative mb-8">
                    <button id="profileDropdownBtn" class="w-10 h-10 rounded-full overflow-hidden focus:outline-none ring-2 ring-transparent hover:ring-blue-500 transition duration-150">
                        <img src="{{ asset('images/Profil.png') }}" alt="Foto Profil Admin" class="w-full h-full object-cover">
                    </button>

                    <div id="profileDropdownContent" 
                         class="absolute right-0 mt-3 w-64 bg-white rounded-lg shadow-xl py-3 
                                border border-gray-200 hidden transition duration-200 z-50">
                        
                        <div class="px-4 pb-3 border-b border-gray-200">
                            @php
                                $userName = 'Admin Clara Sales'; 
                                $userEmail = 'admin@clarasales.com'; 
                            @endphp
                            <p class="text-sm font-semibold text-gray-800 truncate">{{ $userName }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ $userEmail }}</p>
                        </div>

                        {{-- Link ke Profil Admin --}}
                        <a href="{{ route('admin.profil.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profil
                        </a>
                        
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>
                </div>
            </header>
        @endif

        @yield('content')
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('profileDropdownBtn');
        const dropdown = document.getElementById('profileDropdownContent');

        if (button && dropdown) { 
            function toggleDropdown() { dropdown.classList.toggle('hidden'); }
            button.addEventListener('click', toggleDropdown);
            document.addEventListener('click', function(event) {
                if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                    if (!dropdown.classList.contains('hidden')) { dropdown.classList.add('hidden'); }
                }
            });
        }
    });
</script>
</body>
</html>