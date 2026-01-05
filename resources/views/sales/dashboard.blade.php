@extends('layouts.sales')

@section('content')

{{-- 1. HEADER WELCOME --}}
<div class="relative bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-4 md:p-6 mb-6 md:mb-8 text-white shadow-lg overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-sm font-medium opacity-90 mb-1">Selamat Datang</h2>
        <h1 class="text-2xl md:text-3xl font-bold mb-2">
            {{ auth()->user()->sales ? auth()->user()->sales->nama_lengkap : auth()->user()->username }}</h1>    
        <p class="text-sm md:text-base opacity-90 pr-10">Tetap semangat mencapai target penjualan bulan ini!</p>
    </div>
    <div class="absolute right-0 top-0 h-full w-1/3 bg-white opacity-10 transform skew-x-12 translate-x-10"></div>
</div>

{{-- 2. STATS CARDS --}}
<h3 class="font-bold text-gray-700 mb-4 text-lg">Performa Hari Ini</h3>
@php
    $formatRingkas = function($angka) {
        if ($angka >= 1000000000) {
            return number_format($angka / 1000000000, 1, ',', '.') . 'M'; 
        }
        if ($angka >= 1000000) {
            return number_format($angka / 1000000, 1, ',', '.') . 'jt'; 
        }
        if ($angka >= 1000) {
            return number_format($angka / 1000, 0, ',', '.') . 'rb'; 
        }
        return number_format($angka, 0, ',', '.');
    };
@endphp

<div class="grid grid-cols-2 xl:grid-cols-4 gap-3 md:gap-4 mb-8">
    
    {{-- Card 1: Transaksi --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-center items-center text-center md:justify-between md:items-start md:text-left h-full">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start w-full mb-2">
            <span class="text-[10px] md:text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Transaksi</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400 hidden md:block">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center md:items-baseline mt-1">
            <span class="text-2xl md:text-3xl font-bold text-gray-800 md:mr-2">{{ number_format($summary['totalTransaksi']) }}</span>
            <span class="text-xs md:text-sm text-gray-400">Sales</span>
        </div>
    </div>

    {{-- Card 2: Unit Terjual --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-center items-center text-center md:justify-between md:items-start md:text-left h-full">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start w-full mb-2">
            <span class="text-[10px] md:text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Unit Terjual</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400 hidden md:block">
               <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center md:items-baseline mt-1">
            <span class="text-2xl md:text-3xl font-bold text-gray-800 md:mr-2">{{ number_format($summary['totalUnitBulanIni']) }}</span>
            <span class="text-xs md:text-sm text-gray-400">Unit</span>
        </div>
    </div>

    {{-- Card 3: Total Penjualan --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-center items-center text-center md:justify-between md:items-start md:text-left h-full">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start w-full mb-2">
            <span class="text-[10px] md:text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Total Penjualan</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400 hidden md:block">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="mt-1">
            <span class="block md:hidden text-2xl font-bold text-gray-800">
                Rp {{ $formatRingkas($summary['totalPenjualan']) }}
            </span>
            <span class="hidden md:block text-2xl font-bold text-gray-800">
                Rp {{ number_format($summary['totalPenjualan'], 0, ',', '.') }}
            </span>
        </div>
    </div>

    {{-- Card 4: Komisi Hari Ini --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-center items-center text-center md:justify-between md:items-start md:text-left h-full">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start w-full mb-2">
            <span class="text-[10px] md:text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Komisi Hari Ini</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400 hidden md:block">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>
        <div class="mt-1">
             <span class="block md:hidden text-2xl font-bold text-gray-800">
                Rp {{ $formatRingkas($summary['totalKomisi']) }}
            </span>
            <span class="hidden md:block text-2xl font-bold text-gray-800">
                Rp {{ number_format($summary['totalKomisi'], 0, ',', '.') }}
            </span>
        </div>
    </div>
</div>

{{-- 3. TARGET SECTION --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 md:p-6 mb-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h3 class="font-bold text-gray-800 text-lg">Target Penjualan</h3>
            <p class="text-gray-400 text-sm">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
        </div>
    </div>

    <div class="mb-6">
        <div class="flex justify-between text-sm mb-2">
            <span class="text-gray-500">Target</span>
            <span class="font-bold text-gray-800">Rp {{ number_format($target, 0, ',', '.') }}</span>
        </div>

        <div class="flex justify-between text-sm mb-3">
            <span class="text-gray-500">Realisasi (Approved)</span>
            <span class="font-bold {{ $realisasi >= $target ? 'text-green-600' : 'text-blue-600' }}">
                Rp {{ number_format($realisasi, 0, ',', '.') }}
            </span>
        </div>

        <div class="relative w-full h-4 bg-gray-100 rounded-full overflow-hidden">
            <div class="absolute top-0 left-0 h-full bg-blue-600 rounded-full transition-all duration-1000 ease-out" 
                 style="width: {{ min($persentase, 100) }}%">
            </div>
        </div>

        <div class="flex justify-end mt-2">
            <span class="bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-lg">
                {{ number_format($persentase, 1) }}%
            </span>
        </div>
    </div>
    
    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
        <h4 class="font-semibold text-gray-700 mb-3 text-sm">Estimasi Gaji Bulan Ini</h4>
        <div class="space-y-2">
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Gaji Pokok</span>
                <span class="font-medium text-gray-800">Rp {{ number_format($gajiPokok, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between text-sm border-b border-gray-200 pb-2">
                <span class="text-gray-500">Komisi Penjualan</span>
                <span class="font-medium text-green-600">+ Rp {{ number_format($totalKomisi, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between font-bold text-blue-600 pt-1 text-base">
                <span>Estimasi Total</span>
                <span>Rp {{ number_format($totalGaji, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
</div>

{{-- 4. TRANSAKSI SECTION --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 md:p-8">    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="font-bold text-xl text-gray-900">Riwayat Transaksi</h3>
            <p class="text-gray-400 text-sm mt-1">Data penjualan & status verifikasi</p>
        </div>
    </div>

    <div class="space-y-4 md:hidden">
        
        @forelse($riwayatTransaksi as $index => $item)
            @php
                $statusColor = match($item->status_verifikasi) {
                    'approved' => 'bg-green-100 text-green-700 border-green-200',
                    'rejected' => 'bg-red-100 text-red-700 border-red-200',
                    default    => 'bg-yellow-100 text-yellow-700 border-yellow-200', // pending
                };
                $isHidden = $index >= 3 ? 'hidden' : ''; 
                $wrapperClass = $index >= 3 ? 'hidden-transaction-item' : '';
            @endphp

            <div class="border border-gray-100 rounded-xl p-4 bg-gray-50/50 {{ $isHidden }} {{ $wrapperClass }}">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h4 class="font-bold text-gray-800">{{ $item->nama_pelanggan }}</h4>
                        <p class="text-xs text-gray-500">{{ $item->kode_transaksi ?? 'TRX-000' }}</p>
                    </div>
                    <span class="text-[10px] font-bold px-2 py-1 rounded-full border {{ $statusColor }}">
                        {{ ucfirst($item->status_verifikasi) }}
                    </span>
                </div>

                <div class="flex justify-between items-center text-sm mb-3">
                    <span class="text-gray-500">{{ $item->nama_produk ?? 'Produk' }}</span>
                    <span class="text-xs font-semibold text-gray-600 bg-gray-200 px-2 py-0.5 rounded">
                        {{ $item->jumlah_unit ?? $item->jumlah_barang }} Unit
                    </span>
                </div>

                <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                    <div>
                        <p class="text-xs text-gray-400">Total</p>
                        <p class="font-bold text-blue-600">Rp {{ number_format($item->harga_total ?? $item->total_harga, 0, ',', '.') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-400">Komisi</p>
                        <span class="font-bold text-gray-800">Rp {{ number_format($item->komisi_penjualan ?? $item->komisi, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center p-4 text-gray-400 text-sm">Belum ada data transaksi.</div>
        @endforelse

        {{-- Tombol Lihat Semua (Mobile) --}}
        @if($riwayatTransaksi->count() > 3)
            <button id="toggleTransactionsBtn" class="w-full py-3 text-center text-blue-600 font-semibold text-sm bg-blue-50 rounded-lg mt-2 hover:bg-blue-100 transition">
                Lihat Semua Transaksi
            </button>
        @endif
    </div>

    {{-- B. TAMPILAN DESKTOP (Full Table) --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full text-left whitespace-nowrap">
            <thead>
                <tr class="text-sm text-gray-400 border-b border-gray-100">
                    <th class="pb-4 font-normal">Tanggal & ID</th>
                    <th class="pb-4 font-normal">Pelanggan</th>
                    <th class="pb-4 font-normal">Produk</th>
                    <th class="pb-4 font-normal text-center">Status</th> {{-- Kolom Baru --}}
                    <th class="pb-4 font-normal text-right">Total</th>
                    <th class="pb-4 font-normal text-right">Komisi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @forelse($riwayatTransaksi as $item)
                    @php
                        $statusColor = match($item->status_verifikasi) {
                            'approved' => 'bg-green-100 text-green-700 border border-green-200',
                            'rejected' => 'bg-red-100 text-red-700 border border-red-200',
                            default    => 'bg-yellow-100 text-yellow-700 border border-yellow-200',
                        };
                    @endphp
                    <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-0">
                        <td class="py-4">
                            <div class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}</div>
                            <div class="text-xs text-gray-400">{{ $item->kode_transaksi }}</div>
                        </td>
                        <td class="py-4 font-medium text-gray-800">{{ $item->nama_pelanggan }}</td>
                        <td class="py-4 text-gray-500">
                            {{ $item->barang->nama_produk ?? '-' }}
                            <span class="text-xs text-gray-400 ml-1">({{ $item->jumlah_unit ?? $item->jumlah_barang }} unit)</span>
                        </td>
                        <td class="py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColor }}">
                                {{ ucfirst($item->status_verifikasi) }}
                            </span>
                        </td>
                        <td class="py-4 text-right text-blue-600 font-medium">
                            Rp {{ number_format($item->harga_total ?? $item->total_harga, 0, ',', '.') }}
                        </td>
                        <td class="py-4 text-right">
                            <span class="bg-blue-50 text-blue-700 text-xs font-medium px-2 py-1 rounded">
                                Rp {{ number_format($item->komisi_penjualan ?? $item->komisi, 0, ',', '.') }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-gray-400 border border-dashed rounded-lg bg-gray-50">
                            Belum ada riwayat transaksi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // --- 1. LOGIC TOMBOL LIHAT SEMUA (MOBILE) ---
        const toggleBtn = document.getElementById('toggleTransactionsBtn');
        
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Cari SEMUA item yang punya class 'hidden-transaction-item'
                const hiddenItems = document.querySelectorAll('.hidden-transaction-item');
                
                // Cek status saat ini (ambil item pertama untuk patokan)
                // Jika item pertama masih hidden, berarti kita mau MENAMPILKAN
                const isCurrentlyHidden = hiddenItems[0].classList.contains('hidden');
                
                hiddenItems.forEach(function(item) {
                    item.classList.toggle('hidden');
                });

                // Update teks tombol
                if (isCurrentlyHidden) {
                    // Berarti sekarang sudah tampil
                    this.innerText = "Sembunyikan";
                } else {
                    // Berarti sekarang sudah sembunyi lagi
                    this.innerText = "Lihat Semua Transaksi";
                }
            });
        }


        // --- 2. LOGIC SORT DROPDOWN (DESKTOP) ---
        const sortButton = document.getElementById('sortButton');
        const sortDropdown = document.getElementById('sortDropdown');
        const sortIcon = document.getElementById('sortIcon');

        if (sortButton && sortDropdown) {
            sortButton.addEventListener('click', function(e) {
                e.stopPropagation();
                sortDropdown.classList.toggle('hidden');
                if(sortIcon) sortIcon.classList.toggle('rotate-180');
            });

            // Klik di luar untuk menutup
            document.addEventListener('click', function(event) {
                if (!sortButton.contains(event.target) && !sortDropdown.contains(event.target)) {
                    if (!sortDropdown.classList.contains('hidden')) {
                        sortDropdown.classList.add('hidden');
                        if(sortIcon) sortIcon.classList.remove('rotate-180');
                    }
                }
            });
        }
    });

    // Fungsi Sort Helper (Opsional, untuk onclick di HTML)
    function selectSort(value) {
        const label = document.getElementById('sortLabel');
        if(label) label.innerText = value;
        // Tutup dropdown setelah pilih
        const dropdown = document.getElementById('sortDropdown');
        const icon = document.getElementById('sortIcon');
        if(dropdown) dropdown.classList.add('hidden');
        if(icon) icon.classList.remove('rotate-180');
    }
</script>

@endsection