<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Gajihan</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 font-sans text-gray-800">

<div class="flex min-h-screen h-screen overflow-hidden">
    
    @if (request()->routeIs('admin.profile.*') || request()->routeIs('admin.password.*'))
        @include('admin.partials.sidebar-profil')
    @else
        @include('admin.partials.sidebar')
    @endif
    
    <main class="flex-1 p-8 overflow-y-auto"> 
        @if (!request()->routeIs('admin.profile.*') && !request()->routeIs('admin.password.*'))
        <header class="flex justify-between items-center mb-10">
            <div class="w-0 h-10"></div> 
                @if(!request()->routeIs('dashboard'))
                    <form id="searchForm" method="GET" class="relative w-full mx-auto mr-8">
                        <input
                            type="text"
                            name="search"
                            id="searchInput"
                            placeholder="Telusuri"
                            value="{{ request('search') }}"
                            class="w-full p-3 pl-4 
                                border-2 border-blue-400  
                                rounded-full 
                                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                text-gray-700 placeholder-blue-500 font-medium 
                                shadow-md outline-none bg-white"
                        >

                        <button type="submit"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                </path>
                            </svg>
                        </button>
                    </form>
                @else
                    <div class="w-full mr-8"></div>
                @endif

                
                {{-- PROFIL AVATAR --}}
                <div class="relative">
                    <button id="profileDropdownBtn" class="w-10 h-10 rounded-full overflow-hidden focus:outline-none ring-2 ring-transparent hover:ring-blue-500 transition duration-150">
                        <img src="{{ asset('images/Profil.png') }}" alt="Foto Profil Admin" class="w-full h-full object-cover">
                    </button>

                    <div id="profileDropdownContent" 
                         class="absolute right-0 mt-3 w-64 bg-white rounded-lg shadow-xl py-3 
                                border border-gray-200 hidden transition duration-200 z-50">
                        
                        <div class="px-4 pb-3 border-b border-gray-200">
                            @php
                                $userName = 'Admin'; 
                            @endphp
                            <p class="text-sm font-semibold text-gray-800 truncate">{{ $userName }}</p>
                        </div>

                        
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

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

</body>
</html>