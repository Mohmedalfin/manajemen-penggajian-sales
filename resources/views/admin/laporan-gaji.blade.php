{{-- resources/views/admin/laporan-gaji.blade.php --}}

@extends('layouts.admin')

@section('content')

<div class="space-y-6"> 

    {{-- 1. Filter Periode (UPDATED: STYLE SAMA DENGAN DASHBOARD) --}}
    <div class="relative bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 mb-10 text-white shadow-lg overflow-hidden">
        
        {{-- Elemen Dekorasi Background (Sama dengan Dashboard) --}}
        <div class="absolute right-0 top-0 h-full w-1/3 bg-white opacity-10 transform skew-x-12 translate-x-10"></div>

        {{-- Wrapper Konten (z-10 agar di atas background) --}}
        <div class="relative z-10">
            
            {{-- Header Filter --}}
            <div class="flex items-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                    <path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"/>
                </svg>
                <h2 class="text-xl font-bold">Filter Periode</h2>
            </div>

            {{-- Form Inputs --}}
            <div class="flex space-x-4 items-end">
                {{-- Dropdown Bulan --}}
                <div class="flex-1 min-w-[100px] relative dropdown-container" id="dropdownBulan">
                    <label for="bulan" class="text-sm font-semibold block mb-1">Bulan</label>
                    
                    <div class="w-full text-blue-600 bg-white border-none rounded-xl py-2 px-4 text-base shadow-inner flex justify-between items-center cursor-pointer dropdown-trigger focus:rounded-b-none"> 
                        <span class="dropdown-selected-value">Desember</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 dropdown-arrow transition duration-150">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </div>
                    <ul class="absolute z-10 w-full mt-0 bg-white rounded-xl rounded-t-none border border-gray-200 border-t-0 hidden dropdown-options-list max-h-40 overflow-y-auto">
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="januari">Januari</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="februari">Februari</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="maret">Maret</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="april">April</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="mei">Mei</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="juni">Juni</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="juli">Juli</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="agustus">Agustus</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="september">September</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="oktober">Oktober</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="november">November</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="desember">Desember</li>
                    </ul>
                    <input type="hidden" name="bulan" id="bulan-input" value="desember">
                </div>
                
                {{-- Dropdown Tahun --}}
                <div class="flex-1 min-w-[100px] relative dropdown-container" id="dropdownTahun">
                    <label for="tahun" class="text-sm font-semibold block mb-1">Tahun</label>
                    
                    <div class="w-full text-blue-600 bg-white border-none rounded-xl py-2 px-4 text-base shadow-inner flex justify-between items-center cursor-pointer dropdown-trigger focus:rounded-b-none">
                        <span class="dropdown-selected-value">2025</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 dropdown-arrow transition duration-150">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </div>

                    <ul class="absolute z-10 w-full mt-0 bg-white rounded-xl rounded-t-none border border-gray-200 border-t-0 hidden dropdown-options-list max-h-40 overflow-y-auto">
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="2025">2025</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="2024">2024</li>
                        <li class="px-4 py-1 hover:bg-gray-100 cursor-pointer text-gray-800" data-value="2023">2023</li>
                    </ul>
                    <input type="hidden" name="tahun" id="tahun-input" value="2025">
                </div>

                {{-- Tombol Export --}}
                <button class="flex-1 flex items-center justify-center space-x-2 
                            bg-green-600 text-white font-semibold 
                            py-2 px-6 rounded-xl 
                            transition duration-150 whitespace-nowrap hover:bg-green-700 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m-3-3h6m-7 6h12a2 2 0 002-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>Export ke Excel</span>
                </button>
            </div>
        </div>
    </div>

    {{-- 2. Ringkasan Kartu (Summary Cards) --}}
    <div class="grid grid-cols-4 gap-6 mb-10"> 
        
        @php
            $summaryCards = [
                ['title' => 'Total Gaji Pokok', 'amount' => 'Rp 5.000.000'],
                ['title' => 'Total Komisi', 'amount' => 'Rp 5.000.000'],
                ['title' => 'Total Pengeluaran Gaji', 'amount' => 'Rp 5.000.000'],
                ['title' => 'Total Revenue', 'amount' => 'Rp 5.000.000'],
            ];
            
            $cardBaseClass = 'bg-white p-6 rounded-xl shadow-md border border-gray-200';
            $iconContainerClass = 'p-1 bg-blue-100 rounded-lg text-blue-600';
            
            // SVG BANKNOTE UNIFIED ICON
            $banknoteIcon = '
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <rect width="20" height="12" x="2" y="6" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/>
                </svg>
            ';
        @endphp

        @foreach($summaryCards as $card)
            <div class="{{ $cardBaseClass }}">
                <div class="flex justify-between items-start mb-2">
                    <p class="text-gray-500 text-sm font-medium">{{ $card['title'] }}</p>
                    <div class="{{ $iconContainerClass }}">
                        {!! $banknoteIcon !!}
                    </div>
                </div>
                <div class="text-2xl font-bold text-gray-800">{{ $card['amount'] }}</div>
            </div>
        @endforeach
    </div>
    
    {{-- 3. Tabel Detail --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg">
        
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800">Rekap Gaji Desember 2025</h2>
            <p class="text-sm text-green-600">Detail perhitungan gaji seluruh karyawan sales</p> 
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gaji Pokok</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaksi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Terjual</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Penjualan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komisi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Gaji</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    @php
                        // Data sampel karyawan sesuai desain
                        $gajiData = [
                            ['name' => 'Jane Cooper', 'id' => '0001', 'pokok' => '8.500.000', 'transaksi' => '157 kali', 'unit' => '780 unit', 'penjualan' => '425.000', 'komisi' => '425.000', 'total' => '12.000.000'],
                            ['name' => 'Floyd Miles', 'id' => '0002', 'pokok' => '8.500.000', 'transaksi' => '123 kali', 'unit' => '712 unit', 'penjualan' => '425.000', 'komisi' => '425.000', 'total' => '12.000.000'],
                            ['name' => 'Ronald Richards', 'id' => '0003', 'pokok' => '8.500.000', 'transaksi' => '111 kali', 'unit' => '671 unit', 'penjualan' => '425.000', 'komisi' => '425.000', 'total' => '12.000.000'],
                            ['name' => 'Marvin McKinney', 'id' => '0004', 'pokok' => '6.500.000', 'transaksi' => '122 kali', 'unit' => '680 unit', 'penjualan' => '425.000', 'komisi' => '425.000', 'total' => '12.000.000'],
                            ['name' => 'Jerome Bell', 'id' => '0005', 'pokok' => '6.500.000', 'transaksi' => '112 kali', 'unit' => '800 unit', 'penjualan' => '425.000', 'komisi' => '425.000', 'total' => '12.000.000'],
                            ['name' => 'Kathryn Murphy', 'id' => '0006', 'pokok' => '6.500.000', 'transaksi' => '145 kali', 'unit' => '745 unit', 'penjualan' => '425.000', 'komisi' => '425.000', 'total' => '12.000.000'],
                            ['name' => 'Jacob Jones', 'id' => '0007', 'pokok' => '4.500.000', 'transaksi' => '134 kali', 'unit' => '728 unit', 'penjualan' => '425.000', 'komisi' => '425.000', 'total' => '12.000.000'],
                            ['name' => 'Kristin Watson', 'id' => '0008', 'pokok' => '4.500.000', 'transaksi' => '100 kali', 'unit' => '585 unit', 'penjualan' => '425.000', 'komisi' => '425.000', 'total' => '12.000.000'],
                        ];
                    @endphp

                    @foreach($gajiData as $data)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="font-semibold">{{ $data['name'] }}</div>
                            <div class="text-xs text-gray-500">ID: {{ $data['id'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp {{ $data['pokok'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data['transaksi'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data['unit'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp {{ $data['penjualan'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">Rp {{ $data['komisi'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-bold">Rp {{ $data['total'] }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- SCRIPT JAVASCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdowns = document.querySelectorAll('.dropdown-container');

        dropdowns.forEach(dropdown => {
            const trigger = dropdown.querySelector('.dropdown-trigger');
            const optionsList = dropdown.querySelector('.dropdown-options-list');
            const selectedValueSpan = dropdown.querySelector('.dropdown-selected-value');
            const hiddenInput = dropdown.querySelector('input[type="hidden"]');
            const arrow = dropdown.querySelector('.dropdown-arrow');

            // Fungsi untuk membuka/menutup dropdown
            trigger.addEventListener('click', () => {
                // Tutup dropdown lain yang mungkin terbuka
                document.querySelectorAll('.dropdown-options-list').forEach(list => {
                    if (list !== optionsList && !list.classList.contains('hidden')) {
                         list.classList.add('hidden');
                         list.closest('.dropdown-container').querySelector('.dropdown-arrow').style.transform = 'rotate(0deg)';
                         
                         // Mengembalikan border radius penuh pada trigger dropdown lain
                         list.closest('.dropdown-container').querySelector('.dropdown-trigger').classList.remove('rounded-b-none');
                    }
                });


                const isHidden = optionsList.classList.toggle('hidden');
                
                // Rotasi ikon panah
                if (!isHidden) {
                    arrow.style.transform = 'rotate(180deg)';
                    // Hapus rounded-b-xl dari trigger saat dibuka
                    trigger.classList.add('rounded-b-none');
                } else {
                    arrow.style.transform = 'rotate(0deg)';
                    // Kembalikan rounded-xl penuh saat ditutup
                    trigger.classList.remove('rounded-b-none');
                }
            });

            // Handle pemilihan opsi
            optionsList.addEventListener('click', (e) => {
                if (e.target.tagName === 'LI') {
                    const newValue = e.target.getAttribute('data-value');
                    const newText = e.target.textContent.trim();

                    // 1. Update teks yang ditampilkan
                    selectedValueSpan.textContent = newText;
                    
                    // 2. Update nilai hidden input untuk form submission
                    hiddenInput.value = newValue;
                    
                    // 3. Tutup dropdown
                    optionsList.classList.add('hidden');
                    arrow.style.transform = 'rotate(0deg)';
                    
                    // Kembalikan rounded-xl penuh pada trigger saat ditutup
                    trigger.classList.remove('rounded-b-none');
                }
            });

            // Tutup dropdown jika mengklik di luar area dropdown
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target)) {
                    if (!optionsList.classList.contains('hidden')) {
                        optionsList.classList.add('hidden');
                        arrow.style.transform = 'rotate(0deg)';
                        // Kembalikan rounded-xl penuh pada trigger saat ditutup
                        trigger.classList.remove('rounded-b-none');
                    }
                }
            });
        });
    });
</script>

@endsection