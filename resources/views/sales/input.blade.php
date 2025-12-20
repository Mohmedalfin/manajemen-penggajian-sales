@extends('layouts.sales')

@section('content')

    {{-- BAGIAN HEADER (Search & Profil) DIHAPUS --}}
    {{-- Karena sudah ditangani oleh layout utama (sales.blade.php) --}}

    {{-- 1. BANNER HIJAU --}}
    <div class="bg-green-600 rounded-2xl p-6 text-white mb-6 shadow-lg relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-start gap-4">
            {{-- Icon Container --}}
            <div class="p-3 bg-green-500 bg-opacity-40 rounded-xl shrink-0">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-1">Input Penjualan Harian</h2>
                <p class="text-green-50 text-sm leading-relaxed opacity-90">
                    Setiap Transaksi yang Anda input akan otomatis dihitung komisinya dan ditampilkan di dashboard admin secara real-time
                </p>
            </div>
        </div>
        {{-- Decorative Background Circle --}}
        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    {{-- 2. FORM INPUT TRANSAKSI (Card Putih) --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        
        <div class="mb-8">
            <h3 class="text-lg font-bold text-gray-800">Form Input Transaksi Penjualan</h3>
            <p class="text-gray-400 text-sm mt-1">Isi detail transaksi penjualan dengan lengkap</p>
        </div>

        {{-- Form Start --}}
        <form action="{{-- route('sales.store') --}}" method="POST" class="space-y-6">
            @csrf
            
            {{-- INPUT: TANGGAL --}}
            <div class="border-b border-gray-50 pb-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-3">
                    {{-- ICON: Calendar Arrow Down (UPDATED) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-500">
                        <path d="m14 18 4 4 4-4"/>
                        <path d="M16 2v4"/>
                        <path d="M18 14v8"/>
                        <path d="M21 11.354V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7.343"/>
                        <path d="M3 10h18"/>
                        <path d="M8 2v4"/>
                    </svg>
                    Tanggal Transaksi
                </label>
                <div class="relative">
                    <input type="date" name="transaction_date" 
                           class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:bg-white transition cursor-pointer"
                           value="{{ date('Y-m-d') }}">
                </div>
            </div>

            {{-- INPUT: INFORMASI PELANGGAN --}}
            <div class="border-b border-gray-50 pb-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-4">
                    {{-- ICON: User Round Check (UPDATED) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-500">
                        <path d="M2 21a8 8 0 0 1 13.292-6"/>
                        <circle cx="10" cy="8" r="5"/>
                        <path d="m16 19 2 2 4-4"/>
                    </svg>
                    Informasi Pelanggan
                </label>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1 ml-1">Nama Pelanggan/Toko</label>
                        <input type="text" name="customer_name" 
                               class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300" 
                               placeholder="Contoh: Toko Maju Jaya">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1 ml-1">Alamat</label>
                        <input type="text" name="customer_address" 
                               class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300" 
                               placeholder="Alamat lengkap pelanggan">
                    </div>
                </div>
            </div>

            {{-- INPUT: DETAIL PRODUK --}}
            <div class="border-b border-gray-50 pb-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-4">
                    {{-- ICON: Box (UPDATED) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-500">
                        <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                        <path d="m3.3 7 8.7 5 8.7-5"/>
                        <path d="M12 22V12"/>
                    </svg>
                    Detail Produk
                </label>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1 ml-1">Pilih Produk</label>
                        <input type="text" name="product_name" 
                               placeholder="Pilih produk yang dijual" 
                               class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1 ml-1">Jumlah Unit</label>
                            <input type="number" name="quantity" placeholder="0" 
                                   class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1 ml-1">Harga Per Unit</label>
                            <input type="number" name="price" placeholder="0" 
                                   class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300">
                        </div>
                    </div>
                </div>
            </div>

            {{-- INPUT: CATATAN --}}
            <div class="pb-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Catatan (Opsional)</label>
                <input type="text" name="notes" placeholder="Tambahkan catatan jika diperlukan" 
                       class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300">
            </div>

            <hr class="border-gray-100 my-6">

            {{-- TOMBOL SIMPAN --}}
            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg shadow-blue-200 transition duration-200 flex items-center justify-center gap-2 transform active:scale-[0.99]">
                {{-- ICON: Save (UPDATED) --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/>
                    <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"/>
                    <path d="M7 3v4a1 1 0 0 0 1 1h7"/>
                </svg>
                Simpan Transaksi Penjualan
            </button>

        </form>
    </div>

@endsection