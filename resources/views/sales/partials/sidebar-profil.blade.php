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
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center">
                    <span class="text-white text-lg font-bold">C</span>
                </div>
                <span class="text-2xl font-bold text-gray-800">Clarity</span>
            </div>

            <button id="closeSidebarBtn" class="md:hidden text-gray-500 hover:text-red-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div class="mb-6">
            <a href="{{ route('sales.dashboard') }}" 
               class="flex items-center space-x-3 p-3 rounded-full text-gray-700 font-bold hover:bg-gray-300 transition duration-150 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Dashboard</span>
            </a>
        </div>

        <nav class="space-y-2">
            
            {{-- 1. Edit Profil --}}
            <a href="{{ route('sales.profil') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('sales.profil') ? $activeClass : $defaultClass }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span>Edit Profil</span>
            </a>
            
            {{-- 2. Kata Sandi --}}
            <a href="{{ route('sales.password') }}" 
            class="{{ $baseClass }} {{ Request::routeIs('sales.password') ? $activeClass : $defaultClass }}">
                
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/>
                    <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/>
                </svg>

                <span>Kata Sandi</span>
            </a>  
        </nav>
    </div>
    
</aside>