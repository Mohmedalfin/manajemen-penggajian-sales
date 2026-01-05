@php
    // Style konsisten: Menu Aktif (Full Biru), Menu Tidak Aktif (Text Biru + Border Tipis)
    $activeClass = 'bg-blue-500 text-white font-semibold shadow-md border border-blue-500';
    $defaultClass = 'text-blue-500 border border-blue-500 hover:bg-blue-50 transition duration-150';
    $baseClass = 'flex items-center space-x-3 p-3 rounded-full';
@endphp

<aside class="w-72 bg-white shadow-xl flex flex-col justify-between p-6 h-full min-h-screen">
    <div>
        {{-- Logo Clarity --}}
        <div class="flex items-center space-x-2 mb-8">
            <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center">
                <span class="text-white text-lg font-bold">C</span>
            </div>
            <span class="text-2xl font-bold text-gray-800">Clarity</span>
        </div>
        
        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center space-x-3 p-3 rounded-full text-gray-700 font-bold hover:bg-gray-300 transition duration-150 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Dashboard</span>
            </a>
        </div>

        {{-- Menu Navigasi Profil Admin --}}
        <nav class="space-y-2">
            <a href="{{ route('admin.profile.password.index') }}" 
               class="{{ $baseClass }} {{ Request::routeIs('admin.profile.password.index') ? $activeClass : $defaultClass }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/>
                    <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/>
                </svg>
                <span>Kata Sandi</span>
            </a>
            
        </nav>
    </div>
</aside>