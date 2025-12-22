{{-- resources/views/admin/partials/sidebar.blade.php --}}
@php
    // Definisikan kelas aktif dan default
    // MENU AKTIF: Background Biru + Border Tipis Biru
    $activeClass = 'bg-blue-500 text-white font-semibold shadow-md border border-blue-500';

    // MENU TIDAK AKTIF: Teks Biru + Frame (Border) Tipis Biru
    $defaultClass = 'text-blue-500 border border-blue-500 hover:bg-blue-50 transition duration-150';
    
    // Kelas dasar
    $baseClass = 'flex items-center space-x-3 p-3 rounded-full';
@endphp

<aside class="w-72 bg-white shadow-xl flex flex-col justify-between p-6 h-full min-h-screen">
    <div>
        {{-- Logo Clarity --}}
        <div class="flex items-center space-x-2 mb-10">
            <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center">
                <span class="text-white text-lg font-bold">C</span>
            </div>
            <span class="text-2xl font-bold text-gray-800">Clarity</span>
        </div>
        
        {{-- Menu Navigasi Admin --}}
        <nav class="space-y-2">
            
            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('admin.dashboard') ? $activeClass : $defaultClass }}">
                {{-- ICON: Dashboard --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <path d="M5 21v-6"/>
                    <path d="M12 21V3"/>
                    <path d="M19 21V9"/>
                </svg>
                <span>Dashboard</span>
            </a>
            
            {{-- Data Sales --}}
            <a href="{{ route('admin.data_sales') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('admin.data_sales') ? $activeClass : $defaultClass }}">
                {{-- ICON: Data Sales --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <circle cx="12" cy="8" r="5"/>
                    <path d="M20 21a8 8 0 0 0-16 0"/>
                </svg>
                <span>Data Sales</span>
            </a>
            
            {{-- Data Barang --}}
            <a href="{{ route('admin.data_barang') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('admin.data_barang') ? $activeClass : $defaultClass }}">
                {{-- ICON: Data Barang --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <circle cx="8" cy="21" r="1"/>
                    <circle cx="19" cy="21" r="1"/>
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                </svg>
                <span>Data Barang</span>
            </a>
            
            {{-- Laporan Gaji --}}
            <a href="{{ route('admin.laporan_gaji') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('admin.laporan_gaji') ? $activeClass : $defaultClass }}">
                {{-- ICON: Laporan Gaji --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/>
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                    <path d="M9 14h6"/>
                </svg>
                <span>Laporan Gaji</span>
            </a>
            
        </nav>
    </div>
    
    {{-- Tombol Keluar --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        {{-- Tombol Keluar --}}
        <button type="submit" 
                class="w-full flex items-center justify-center space-x-3 p-2 
                       text-red-500 font-semibold rounded-full transition duration-150 
                       border border-blue-500 hover:bg-blue-50"> 
            
            {{-- ICON: Log Out --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                <path d="m16 17 5-5-5-5"/>
                <path d="M21 12H9"/>
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            </svg>
            
            <span>Keluar</span>
        </button>
    </form>
</aside>