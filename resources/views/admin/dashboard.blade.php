{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-gray-800 mb-8">Statistik Hari Ini</h1>

{{-- CARD STATISTIC SECTION --}}
<div class="grid grid-cols-4 gap-6 mb-10">
    
    {{-- Card 1: Jumlah Sales --}}
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            <p class="text-gray-500 text-sm font-medium">Jumlah Sales</p>
            <div class="p-1 bg-blue-100 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <path d="M18 21a8 8 0 0 0-16 0"/>
                    <circle cx="10" cy="8" r="5"/>
                    <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $totalSales }} <span class="text-xl font-medium text-gray-500">Sales</span></div>
    </div>

    {{-- Card 2: Jumlah Unit --}}
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            <p class="text-gray-500 text-sm font-medium">Jumlah Unit</p>
            <div class="p-1 bg-blue-100 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <path d="M2.97 12.92A2 2 0 0 0 2 14.63v3.24a2 2 0 0 0 .97 1.71l3 1.8a2 2 0 0 0 2.06 0L12 19v-5.5l-5-3-4.03 2.42Z"/>
                    <path d="m7 16.5-4.74-2.85"/>
                    <path d="m7 16.5 5-3"/>
                    <path d="M7 16.5v5.17"/>
                    <path d="M12 13.5V19l3.97 2.38a2 2 0 0 0 2.06 0l3-1.8a2 2 0 0 0 .97-1.71v-3.24a2 2 0 0 0-.97-1.71L17 10.5l-5 3Z"/>
                    <path d="m17 16.5-5-3"/>
                    <path d="m17 16.5 4.74-2.85"/>
                    <path d="M17 16.5v5.17"/>
                    <path d="M7.97 4.42A2 2 0 0 0 7 6.13v4.37l5 3 5-3V6.13a2 2 0 0 0-.97-1.71l-3-1.8a2 2 0 0 0-2.06 0l-3 1.8Z"/>
                    <path d="M12 8 7.26 5.15"/>
                    <path d="m12 8 4.74-2.85"/>
                    <path d="M12 13.5V8"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-800">150 <span class="text-xl font-medium text-gray-500">Unit</span></div>
    </div>

    {{-- Card 3: Total Penjualan --}}
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            <p class="text-gray-500 text-sm font-medium">Total Penjualan</p>
            <div class="p-1 bg-blue-100 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <path d="M12 16v5"/>
                    <path d="M16 14v7"/>
                    <path d="M20 10v11"/>
                    <path d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15"/>
                    <path d="M4 18v3"/>
                    <path d="M8 14v7"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-800">Rp 5.000.000</div>
    </div>
    
    {{-- Card 4: Total Gaji --}}
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            <p class="text-gray-500 text-sm font-medium">Total Gaji</p>
            <div class="p-1 bg-blue-100 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <rect width="20" height="12" x="2" y="6" rx="2"/>
                    <circle cx="12" cy="12" r="2"/>
                    <path d="M6 12h.01M18 12h.01"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-800">Rp 3.000.000</div>
    </div>
</div>

{{-- SALES TABLE SECTION --}}
<div class="bg-white p-6 rounded-2xl shadow-lg">
    
    {{-- Header Tabel & Sort --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Semua Sales</h2>
            <p class="text-sm text-green-600">Anggota aktif</p> 
        </div>
        
        {{-- DROPDOWN SORT BY (Menggunakan Gaya Baru) --}}
        <div class="relative">
            {{-- Tombol Trigger --}}
            <button id="sortButton" class="w-56 bg-white border border-gray-300 rounded-lg px-4 py-2 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="text-xs text-gray-600">Sort by : <span id="sortLabel" class="font-bold text-gray-800">Newest</span></span>
                {{-- Icon Chevron --}}
                <svg id="sortIcon" class="w-3 h-3 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            {{-- Menu Dropdown --}}
            <div id="sortDropdown" class="hidden absolute right-0 mt-2 w-full bg-white rounded-xl shadow-xl border border-gray-100 z-20 overflow-hidden transform transition-all duration-200 origin-top-right">
                <a href="#" onclick="selectSort('Newest')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Newest</a>
                <a href="#" onclick="selectSort('Oldest')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Oldest</a>
                <a href="#" onclick="selectSort('Highest Sales')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Highest Sales</a>
            </div>
        </div>
    </div>

    {{-- Tabel Data Sales --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Terjual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Telepon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Penjualan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komisi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                
                {{-- Data Dummy --}}
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jane Cooper</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">30 Unit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">(225) 555-0118</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Rp 425.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Floyd Miles</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">20 Unit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">(205) 555-0100</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Rp 425.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Tidak Aktif</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ronald Richards</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">8 Unit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">(302) 555-0107</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Rp 425.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Tidak Aktif</span>
                    </td>
                </tr>
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Marvin McKinney</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">15 Unit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">(252) 555-0126</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Rp 425.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jerome Bell</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">3 Unit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">(629) 555-0129</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Rp 425.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kathryn Murphy</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">5 Unit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">(406) 555-0120</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Rp 425.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                </tr>
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jacob Jones</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">20 Unit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">(208) 555-0112</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Rp 425.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                </tr>
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kristin Watson</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">5 Unit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">(704) 555-0127</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Rp 425.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Tidak Aktif</span>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
    
    {{-- Footer Pagination --}}
    <div class="mt-4 text-sm text-gray-500">
        Showing data 1 to 8 of 256k entries
    </div>
</div>

{{-- SCRIPT JAVASCRIPT UNTUK DROPDOWN SORT --}}
<script>
    function selectSort(value) {
        document.getElementById('sortLabel').innerText = value;
        toggleSortDropdown();
        // Logika sorting bisa ditambahkan di sini
    }

    function toggleSortDropdown() {
        const dropdown = document.getElementById('sortDropdown');
        const icon = document.getElementById('sortIcon');
        
        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            dropdown.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('sortButton');
        const dropdown = document.getElementById('sortDropdown');
        const icon = document.getElementById('sortIcon');

        button.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleSortDropdown();
        });

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