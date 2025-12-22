@extends('layouts.sales')

@section('content')
<div class="bg-white rounded-3xl shadow-xl p-8 max-w-4xl mx-auto mt-10">
    
    {{-- Form Ubah Password --}}
    <form action="{{ route('password.update') }}" method="POST"> 
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            
            {{-- 1. Input Email --}}
            <div>
                <label class="block text-lg font-bold text-gray-800 mb-2">Email</label>
                <div class="relative">
                    <input type="email" 
                           name="email" 
                           placeholder="Masukkan email"
                           class="w-full py-3 px-6 rounded-full border border-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-600 placeholder-gray-400 transition"
                           value="{{ auth()->user()->email ?? '' }}">
                    
                    {{-- Icon Edit (Pencil) --}}
                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-800 pointer-events-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                </div>
            </div>

            {{-- 2. Kata Sandi Lama/Saat Ini --}}
            <div>
                <label class="block text-lg font-bold text-gray-800 mb-2">Kata Sandi Saat Ini</label>
                <div class="relative">
                    <input type="password" 
                           name="current_password" 
                           placeholder="Masukkan kata sandi lama"
                           class="w-full py-3 px-6 rounded-full border border-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-600 placeholder-gray-400 transition">
                    
                    {{-- Icon Edit --}}
                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-800 pointer-events-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                </div>
            </div>

            {{-- 3. Kata Sandi Baru --}}
            <div>
                <label class="block text-lg font-bold text-gray-800 mb-2">Kata Sandi Baru</label>
                <div class="relative">
                    <input type="password" 
                           name="password" 
                           placeholder="Masukkan kata sandi baru"
                           class="w-full py-3 px-6 rounded-full border border-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-600 placeholder-gray-400 transition">
                    
                    {{-- Icon Edit --}}
                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-800 pointer-events-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                </div>
            </div>

            {{-- 4. Konfirmasi Kata Sandi Baru (BARU DITAMBAHKAN) --}}
            <div>
                <label class="block text-lg font-bold text-gray-800 mb-2">Konfirmasi Kata Sandi Baru</label>
                <div class="relative">
                    <input type="password" 
                           name="password_confirmation" 
                           placeholder="Ulangi kata sandi baru"
                           class="w-full py-3 px-6 rounded-full border border-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-600 placeholder-gray-400 transition">
                    
                    {{-- Icon Edit --}}
                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-800 pointer-events-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                </div>
            </div>

        </div>

        {{-- Tombol Action --}}
        <div class="flex justify-between items-center mt-12">
            
            {{-- Tombol Cancel (Merah) --}}
            <a href="{{ route('sales.dashboard') }}" 
               class="px-8 py-2 rounded-full bg-red-600 text-white font-bold shadow-md hover:bg-red-700 transition transform active:scale-95 text-center">
                Cancel
            </a>

            {{-- Tombol Save (Biru) --}}
            <button type="submit" 
                    class="px-8 py-2 rounded-full bg-blue-500 text-white font-bold shadow-md hover:bg-blue-600 transition transform active:scale-95">
                Save
            </button>
        </div>

    </form>
</div>
@endsection