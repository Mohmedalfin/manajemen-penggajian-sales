{{-- resources/views/admin/partials/sidebar.blade.php --}}
@php
    // Definisikan kelas aktif dan default untuk kemudahan
    $activeClass = 'bg-blue-500 text-white font-semibold shadow-md';
    $defaultClass = 'text-gray-600 hover:bg-gray-100 transition duration-150';
    
    // Kelas yang digunakan untuk item menu (Base class)
    $baseClass = 'flex items-center space-x-3 p-3 rounded-full';
@endphp

<aside class="w-72 bg-white shadow-xl flex flex-col justify-between p-6 h-full">
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
            <a href="{{ route('admin.sales.index') }}" 
                class="{{ $baseClass }} {{ Request::routeIs('admin.sales.index') ? $activeClass : $defaultClass }}">
                {{-- ICON: Data Sales --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <circle cx="12" cy="8" r="5"/>
                    <path d="M20 21a8 8 0 0 0-16 0"/>
                </svg>
                <span>Data Sales</span>
            </a>
            
            {{-- Data Barang --}}
            <a href="{{ route('admin.barang.index') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('admin.barang.index') ? $activeClass : $defaultClass }}">
                {{-- ICON: Data Barang --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <circle cx="8" cy="21" r="1"/>
                    <circle cx="19" cy="21" r="1"/>
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                </svg>
                <span>Data Barang</span>
            </a>
            
            {{-- Laporan Gaji --}}
            <a href="{{ route('admin.laporan-gaji.index') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('admin.laporan-gaji.index') ? $activeClass : $defaultClass }}">
                {{-- ICON: Laporan Gaji --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/>
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                    <path d="M9 14h6"/>
                </svg>
                <span>Laporan Gaji</span>
            </a>
            <div class="h-8"></div> 
        </nav>
    </div>
    
    {{-- Tombol Keluar --}}

</aside>