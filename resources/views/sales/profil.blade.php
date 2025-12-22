@extends('layouts.sales')

@section('content')

    {{-- KONTEN PROFIL --}}
    <div class="w-full max-w-4xl mx-auto pt-4">
        
        {{-- Card Form Profil --}}
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-10 relative">
            <form action="#" method="POST">
                @csrf
                
                {{-- FOTO PROFIL --}}
                <div class="flex justify-center -mt-4 mb-8">
                    <div class="relative">
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-100 shadow-sm">
                            <img src="{{ asset('images/Profil.png') }}" alt="Ronald Richards" class="w-full h-full object-cover">
                        </div>
                        <button type="button" class="absolute bottom-0 right-0 bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full shadow-md border-4 border-white transition transform hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                    </div>
                </div>

                {{-- FORM FIELDS --}}
                <div class="space-y-6">
                    {{-- Nama --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Nama Lengkap</label>
                        <div class="relative">
                            {{-- Input default abu-abu, saat diklik (focus) jadi biru --}}
                            <input type="text" 
                                   name="name" 
                                   value="Ronald Richard" 
                                   class="w-full py-3 px-6 rounded-full border border-gray-400 text-gray-600 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition bg-white">
                            
                            {{-- Icon Edit --}}
                            <div class="absolute inset-y-0 right-0 pr-6 flex items-center pointer-events-none text-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Alamat</label>
                        <div class="relative">
                            <input type="text" 
                                   name="address" 
                                   value="Jl. Siliwangi (Ringroad Utara), Jombor, Sleman" 
                                   class="w-full py-3 px-6 rounded-full border border-gray-400 text-gray-600 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition bg-white">
                            
                            <div class="absolute inset-y-0 right-0 pr-6 flex items-center pointer-events-none text-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">No. Telepon</label>
                        <div class="relative">
                            <input type="text" 
                                   name="phone" 
                                   value="081234135920" 
                                   class="w-full py-3 px-6 rounded-full border border-gray-400 text-gray-600 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition bg-white">
                            
                            <div class="absolute inset-y-0 right-0 pr-6 flex items-center pointer-events-none text-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Email</label>
                        <div class="relative">
                            <input type="email" 
                                   name="email" 
                                   value="ronaldrich@gmail.com" 
                                   class="w-full py-3 px-6 rounded-full border border-gray-400 text-gray-600 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition bg-white">
                            
                            <div class="absolute inset-y-0 right-0 pr-6 flex items-center pointer-events-none text-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-between items-center mt-12 px-2">
                    <a href="{{ route('sales.dashboard') }}" class="px-8 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold rounded-full shadow-lg transition transform active:scale-95">Cancel</a>
                    <button type="submit" class="px-10 py-2.5 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full shadow-lg transition transform active:scale-95">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection