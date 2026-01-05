{{-- resources/views/sales/partials/sidebar.blade.php --}}
@php
    $activeClass = 'bg-blue-500 text-white font-semibold shadow-md border border-blue-500';
    $defaultClass = 'text-blue-500 border border-blue-500 hover:bg-blue-50 transition duration-150';
    $baseClass = 'flex items-center space-x-3 p-3 rounded-full';
@endphp

<aside id="sidebar" class="
        fixed inset-y-0 left-0 z-50 w-72 bg-white shadow-xl flex flex-col justify-between p-6 h-full min-h-screen
        transform -translate-x-full transition-transform duration-300 ease-in-out
        md:relative md:translate-x-0
    ">
    
    <div>
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center">
                    <span class="text-white text-lg font-bold">Gj</span>
                </div>
                <span class="text-2xl font-bold text-gray-800">Gajihan</span>
            </div>

            <button id="closeSidebarBtn" class="md:hidden text-gray-500 hover:text-red-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        {{-- Menu Navigasi --}}
        <nav class="space-y-2">
            
            {{-- 1. Dashboard --}}
            <a href="{{ route('sales.dashboard') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('sales.dashboard') ? $activeClass : $defaultClass }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <path d="M5 21v-6"/>
                    <path d="M12 21V3"/>
                    <path d="M19 21V9"/>
                </svg>
                <span>Dashboard</span>
            </a>
            
            {{-- 2. Input Penjualan Harian --}}
            <a href="{{ route('sales.transaction.create') }}"
            class="{{ $baseClass }} {{ (request()->routeIs('sales.transaction.create')) ? $activeClass : $defaultClass }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                <span>Input Penjualan Harian</span>
            </a> 
        </nav>
    </div>
</aside>