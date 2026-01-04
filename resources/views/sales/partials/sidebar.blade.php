{{-- resources/views/sales/partials/sidebar.blade.php --}}
@php
    // MENU AKTIF: Background Biru + Border Tipis
    $activeClass = 'bg-blue-500 text-white font-semibold shadow-md border border-blue-500';

    // MENU TIDAK AKTIF: Text Biru + Frame Tipis
    $defaultClass = 'text-blue-500 border border-blue-500 hover:bg-blue-50 transition duration-150';
    
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
        
        {{-- Menu Navigasi Sales --}}
        <nav class="space-y-2">
            
            {{-- 1. Dashboard --}}
            <a href="{{ route('sales.dashboard') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('sales.dashboard') ? $activeClass : $defaultClass }}">
                {{-- ICON: Dashboard (Updated) --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <path d="M5 21v-6"/>
                    <path d="M12 21V3"/>
                    <path d="M19 21V9"/>
                </svg>
                <span>Dashboard</span>
            </a>
            
            {{-- 2. Input Penjualan Harian --}}
            <a href="{{ Route::has('sales.input') ? route('sales.input') : '#' }}" 
               class="{{ $baseClass }} {{ (request()->routeIs('sales.input')) ? $activeClass : $defaultClass }}">
                {{-- ICON: Plus --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                <span>Input Penjualan Harian</span>
            </a>
            
        </nav>
    </div>
</aside>