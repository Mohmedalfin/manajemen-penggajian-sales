<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sales - Gajihan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800">

<div class="flex min-h-screen h-screen overflow-hidden relative"> 
    <div id="sidebarOverlay" 
         class="fixed inset-0 bg-black/20 backdrop-blur-sm z-40 hidden md:hidden transition-opacity duration-300">
    </div>
    
    {{-- === BAGIAN 1: SIDEBAR === --}}
    @if (request()->routeIs('sales.profil') || request()->routeIs('sales.password'))
        @include('sales.partials.sidebar-profil')
    @else
        @include('sales.partials.sidebar')
    @endif
    
    <main class="flex-1 p-4 md:p-8 overflow-y-auto w-full relative">
        
        {{-- === MOBILE TOP BAR === --}}
        <div class="md:hidden flex justify-between items-center mb-6">
            
            <div class="flex items-center">
                <button id="mobileMenuBtn" class="text-gray-600 hover:text-blue-500 focus:outline-none p-2 rounded-md border border-gray-300 bg-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="ml-4 font-bold text-lg text-gray-700">Menu</span>
            </div>

            @if (!request()->routeIs('sales.profil') && !request()->routeIs('sales.password'))
                <div class="relative">
                
                {{-- LOGIC PHP: TENTUKAN NAMA & FOTO --}}
                @php
                    $user = auth()->user();
                    $userName = $user->sales ? $user->sales->nama_lengkap : $user->username;
                    
                    $userEmail = $user->email; 

                    if ($user->sales && $user->sales->foto) {
                        $fotoProfile = asset('storage/' . $user->sales->foto);
                    } else {
                        $fotoProfile = asset('images/Profil.png');
                    }
                @endphp

                {{-- BUTTON PROFILE (TAMPIL DI NAVBAR) --}}
                <button id="mobileProfileBtn" class="w-10 h-10 rounded-full overflow-hidden focus:outline-none ring-2 ring-transparent hover:ring-blue-500 transition duration-150">
                    {{-- UPDATE: Gunakan variable $fotoProfile --}}
                    <img src="{{ $fotoProfile }}" alt="Foto Profil" class="w-full h-full object-cover">
                </button>

                {{-- DROPDOWN MENU --}}
                <div id="mobileProfileDropdown" class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl py-2 border border-gray-200 hidden z-50">
                    
                    {{-- INFO USER --}}
                    <div class="px-4 pb-2 border-b border-gray-200 mb-2">
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ $userName }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $userEmail }}</p>
                    </div>

                    <a href="{{ route('sales.profil') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Profil</a>
                    
                    {{-- LOGOUT --}}
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
            @endif
        </div>

        <header class="flex flex-col md:flex-row md:justify-between md:items-center mb-10">
        <div class="hidden md:block w-0 h-10"></div> 


    {{-- 2. LOGIKA TENGAH: Search Bar VS Kalimat Judul --}}
    @if(request()->routeIs('sales.dashboard'))
        
        {{-- A. JIKA DI DASHBOARD: Tampilkan Search Form --}}
        <form id="searchForm" method="GET" action="{{ route('sales.dashboard') }}" class="relative w-full md:mr-8 mb-4 md:mb-0">
            <input 
                type="text" 
                name="search" 
                id="searchInput"
                placeholder="Cari transaksi, pelanggan, atau produk..." 
                value="{{ request('search') }}"
                class="w-full p-3 pl-4 
                    border-2 border-blue-400  
                    rounded-full 
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                    text-gray-700 placeholder-blue-500 font-medium 
                    shadow-md outline-none bg-white"
                autocomplete="off"
            >
            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-500 hover:text-blue-700 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </form>

    @else
        
        <div class="w-full md:mr-8 mb-4 md:mb-0">
            
            {{-- Logika Judul Dinamis --}}
            <h1 class="text-2xl font-bold text-gray-800">
                @if(request()->routeIs('sales.profil'))
                    Profil Saya
                @elseif(request()->routeIs('sales.password'))
                    Ubah Password
                @else
                    Halaman Sales
                @endif
            </h1>
            <p class="text-sm text-gray-500">
                @if(request()->routeIs('sales.profil'))
                    Kelola informasi akun dan data diri Anda.
                @elseif(request()->routeIs('sales.password'))
                    Amankan akun Anda dengan password baru.
                @else
                    Selamat datang kembali.
                @endif
            </p>

        </div>

    @endif

    <div class="relative hidden md:block">
    
            @php
                $user = auth()->user();
                $userName = $user->sales ? $user->sales->nama_lengkap : $user->username;
                $userEmail = $user->sales ? $user->sales->email : '-'; 

                if ($user->sales && $user->sales->foto) {
                    $fotoProfile = asset('storage/' . $user->sales->foto);
                } else {
                    $fotoProfile = asset('images/Profil.png');
                }
            @endphp

            <button id="desktopProfileBtn" class="w-10 h-10 rounded-full overflow-hidden focus:outline-none ring-2 ring-transparent hover:ring-blue-500 transition duration-150">
                <img src="{{ $fotoProfile }}" alt="Foto Profil" class="w-full h-full object-cover">
            </button>

            <div id="desktopProfileDropdown" class="absolute right-0 mt-3 w-64 bg-white rounded-lg shadow-xl py-3 border border-gray-200 hidden transition duration-200 z-50">
                <div class="px-4 pb-3 border-b border-gray-200">
                    <p class="text-sm font-semibold text-gray-800 truncate">{{ $userName }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ $userEmail }}</p>
                </div>

                <a href="{{ route('sales.profil') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profil Saya
                </a>

                <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </a>
            </div>
        </div>


</header>

            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            {{-- CONTENT UTAMA --}}
            @yield('content')
            
        </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');

        function openSidebar() {
            if(sidebar) sidebar.classList.remove('-translate-x-full');
            if(sidebarOverlay) sidebarOverlay.classList.remove('hidden');
        }

        function closeSidebar() {
            if(sidebar) sidebar.classList.add('-translate-x-full');
            if(sidebarOverlay) sidebarOverlay.classList.add('hidden');
        }

        if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openSidebar);
        if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);


        // --- 2. SETUP DROPDOWN PROFIL (Logic Reusable) ---
        function setupDropdown(btnId, contentId) {
            const btn = document.getElementById(btnId);
            const content = document.getElementById(contentId);

            if (btn && content) {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    content.classList.toggle('hidden');
                });

                document.addEventListener('click', function(event) {
                    if (!btn.contains(event.target) && !content.contains(event.target)) {
                        if (!content.classList.contains('hidden')) {
                            content.classList.add('hidden');
                        }
                    }
                });
            }
        }

        setupDropdown('mobileProfileBtn', 'mobileProfileDropdown');
        setupDropdown('desktopProfileBtn', 'desktopProfileDropdown');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('error') }}",
            });
        });
    </script>
@endif

</body>
</html>