@extends('layouts.sales')

@section('content')

{{-- 1. HEADER WELCOME --}}
<div class="relative bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 mb-8 text-white shadow-lg overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-sm font-medium opacity-90 mb-1">Selamat Datang</h2>
        <h1 class="text-2xl md:text-3xl font-bold mb-2">Ronald Richards</h1>
        <p class="text-sm md:text-base opacity-90">Tetap semangat mencapai target penjualan bulan ini!</p>
    </div>
    <div class="absolute right-0 top-0 h-full w-1/3 bg-white opacity-10 transform skew-x-12 translate-x-10"></div>
</div>

{{-- 2. STATS CARDS --}}
<h3 class="font-bold text-gray-700 mb-4 text-lg">Performa Hari Ini</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
    {{-- Card 1 --}}
    <div class="bg-white p-5 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-between h-full">
        <div class="flex justify-between items-start mb-2">
            <span class="text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Transaksi</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
        </div>
        <div class="flex items-baseline mt-2">
            <span class="text-3xl font-bold text-gray-800 mr-2">20</span>
            <span class="text-sm text-gray-400">Sales</span>
        </div>
    </div>
    {{-- Card 2 --}}
    <div class="bg-white p-5 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-between h-full">
        <div class="flex justify-between items-start mb-2">
            <span class="text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Unit Terjual</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400">
               <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
        </div>
        <div class="flex items-baseline mt-2">
            <span class="text-3xl font-bold text-gray-800 mr-2">150</span>
            <span class="text-sm text-gray-400">Unit</span>
        </div>
    </div>
    {{-- Card 3 --}}
    <div class="bg-white p-5 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-between h-full">
        <div class="flex justify-between items-start mb-2">
            <span class="text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Total Penjualan</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="mt-2">
            <span class="text-2xl font-bold text-gray-800">Rp 5.000.000</span>
        </div>
    </div>
    {{-- Card 4 --}}
    <div class="bg-white p-5 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-between h-full">
        <div class="flex justify-between items-start mb-2">
            <span class="text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Komisi Hari Ini</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>
        <div class="mt-2">
            <span class="text-2xl font-bold text-gray-800">Rp 3.000.000</span>
        </div>
    </div>
</div>

{{-- 3. TARGET SECTION --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h3 class="font-bold text-gray-800 text-lg">Target Penjualan Bulan Ini</h3>
            <p class="text-gray-400 text-sm">Desember 2025</p>
        </div>
    </div>
    <div class="mb-6">
        <div class="flex justify-between text-sm mb-2">
            <span class="text-gray-500">Target</span>
            <span class="font-bold text-gray-800">Rp 25.000.000</span>
        </div>
        <div class="flex justify-between text-sm mb-3">
            <span class="text-gray-500">Realisasi</span>
            <span class="font-bold text-green-500">Rp 4.500.000</span>
        </div>
        <div class="relative w-full h-4 bg-gray-100 rounded-full overflow-hidden">
            <div class="absolute top-0 left-0 h-full bg-blue-600 rounded-full" style="width: 34.8%"></div>
        </div>
        <div class="flex justify-end mt-2">
            <span class="bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-lg">34,8%</span>
        </div>
    </div>
    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
        <h4 class="font-semibold text-gray-700 mb-3 text-sm">Estimasi Gaji Bulan Ini</h4>
        <div class="flex justify-between text-sm mb-2">
            <span class="text-gray-500">Gaji Pokok</span>
            <span class="font-medium text-gray-800">Rp 4.500.000</span>
        </div>
        <div class="flex justify-between text-sm mb-2 border-b border-gray-200 pb-2">
            <span class="text-gray-500">Komisi (5%)</span>
            <span class="font-medium text-green-600">+ Rp 425.000</span>
        </div>
        <div class="flex justify-between font-bold text-blue-600 pt-1">
            <span>Estimasi Total</span>
            <span>Rp 4.925.000</span>
        </div>
    </div>
</div>

{{-- 4. TABEL TRANSAKSI --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    
{{-- Header Tabel & Sort --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h3 class="font-bold text-xl text-gray-900">Transaksi Hari Ini</h3>
            <p class="text-gray-400 text-sm mt-1">Riwayat penjualan yang sudah diinput</p>
        </div>
        
        {{-- DROPDOWN SORT BY --}}
        <div class="relative">
            {{-- 
                PERUBAHAN DI SINI:
                1. 'w-56': Memberikan lebar tetap (fixed width) agar tombol tidak membesar/mengecil.
                2. 'justify-between': Memastikan teks di kiri dan panah (chevron) selalu di ujung kanan.
            --}}
            <button id="sortButton" class="w-56 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 flex items-center justify-between cursor-pointer hover:bg-gray-100 transition focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="text-xs text-gray-500">Sort by : <span id="sortLabel" class="font-bold text-gray-800">Newest</span></span>
                {{-- Icon Chevron --}}
                <svg id="sortIcon" class="w-3 h-3 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            {{-- Menu Dropdown (Lebar menyesuaikan tombol parent 'w-full') --}}
            <div id="sortDropdown" class="hidden absolute right-0 mt-2 w-full bg-white rounded-xl shadow-xl border border-gray-100 z-20 overflow-hidden transform transition-all duration-200 origin-top-right">
                <a href="#" onclick="selectSort('Newest')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Newest</a>
                <a href="#" onclick="selectSort('Oldest')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Oldest</a>
                <a href="#" onclick="selectSort('Highest Price')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Highest Price</a>
                <a href="#" onclick="selectSort('Lowest Price')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Lowest Price</a>
            </div>
        </div>
    </div>

    {{-- TABEL DATA TRANSAKSI --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-left whitespace-nowrap">
            <thead>
                <tr class="text-sm text-gray-400 border-b border-gray-100">
                    <th class="pb-4 font-normal w-[18%]">Waktu</th>
                    <th class="pb-4 font-normal w-[18%]">Pelanggan</th>
                    <th class="pb-4 font-normal w-[24%]">Produk</th>
                    <th class="pb-4 font-normal w-[10%]">Unit</th>
                    <th class="pb-4 font-normal w-[15%]">Total Penjualan</th>
                    <th class="pb-4 font-normal w-[15%]">Komisi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                {{-- Row 1 --}}
                <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-none">
                    <td class="py-5 font-medium text-gray-800">Jane Cooper</td>
                    <td class="py-5 text-gray-500">Toko Maju Jaya</td>
                    <td class="py-5 text-gray-500">Produk A - Premium</td>
                    <td class="py-5 text-blue-500 font-medium">123 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 425.000</td>
                    <td class="py-5">
                        <span class="bg-blue-500 text-white text-xs font-medium px-4 py-2 rounded-lg shadow-sm">Rp 450.000</span>
                    </td>
                </tr>
                {{-- Row 2 --}}
                <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-none">
                    <td class="py-5 font-medium text-gray-800">Floyd Miles</td>
                    <td class="py-5 text-gray-500">Toko Maju Jaya</td>
                    <td class="py-5 text-gray-500">Produk A - Premium</td>
                    <td class="py-5 text-blue-500 font-medium">123 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 425.000</td>
                    <td class="py-5">
                        <span class="bg-blue-500 text-white text-xs font-medium px-4 py-2 rounded-lg shadow-sm">Rp 450.000</span>
                    </td>
                </tr>
                 {{-- Row 3 --}}
                 <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-none">
                    <td class="py-5 font-medium text-gray-800">Ronald Richards</td>
                    <td class="py-5 text-gray-500">Toko Maju Jaya</td>
                    <td class="py-5 text-gray-500">Produk A - Premium</td>
                    <td class="py-5 text-blue-500 font-medium">123 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 425.000</td>
                    <td class="py-5">
                        <span class="bg-blue-500 text-white text-xs font-medium px-4 py-2 rounded-lg shadow-sm">Rp 450.000</span>
                    </td>
                </tr>
                {{-- Row 4 --}}
                <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-none">
                    <td class="py-5 font-medium text-gray-800">Marvin McKinney</td>
                    <td class="py-5 text-gray-500">Toko Maju Jaya</td>
                    <td class="py-5 text-gray-500">Produk A - Premium</td>
                    <td class="py-5 text-blue-500 font-medium">123 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 425.000</td>
                    <td class="py-5">
                        <span class="bg-blue-500 text-white text-xs font-medium px-4 py-2 rounded-lg shadow-sm">Rp 450.000</span>
                    </td>
                </tr>
                {{-- Row 5 --}}
                <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-none">
                    <td class="py-5 font-medium text-gray-800">Jerome Bell</td>
                    <td class="py-5 text-gray-500">Toko Maju Jaya</td>
                    <td class="py-5 text-gray-500">Produk A - Premium</td>
                    <td class="py-5 text-blue-500 font-medium">123 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 425.000</td>
                    <td class="py-5">
                        <span class="bg-blue-500 text-white text-xs font-medium px-4 py-2 rounded-lg shadow-sm">Rp 450.000</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- SCRIPT JAVASCRIPT UNTUK DROPDOWN SORT --}}
<script>
    // Fungsi untuk memilih opsi sort
    function selectSort(value) {
        // Update label teks
        document.getElementById('sortLabel').innerText = value;
        // Tutup dropdown setelah memilih
        toggleSortDropdown();
        // (Opsional) Di sini Anda bisa menambahkan logika AJAX untuk reload tabel
        console.log("Sorting by: " + value); 
    }

    // Fungsi Toggle Buka/Tutup
    function toggleSortDropdown() {
        const dropdown = document.getElementById('sortDropdown');
        const icon = document.getElementById('sortIcon');
        
        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            // Putar icon panah
            icon.classList.add('rotate-180');
        } else {
            dropdown.classList.add('hidden');
            // Kembalikan icon panah
            icon.classList.remove('rotate-180');
        }
    }

    // Event Listener
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('sortButton');
        const dropdown = document.getElementById('sortDropdown');
        const icon = document.getElementById('sortIcon');

        // Klik tombol trigger
        button.addEventListener('click', function(e) {
            e.stopPropagation(); // Mencegah event bubbling
            toggleSortDropdown();
        });

        // Klik di luar area dropdown untuk menutup
        document.addEventListener('click', function(event) {
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            }
        });
    });
</script>

@endsection