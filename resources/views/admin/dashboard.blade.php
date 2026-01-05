{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')
@section('content')
<div class="relative w-full bg-gradient-to-br from-indigo-600 via-blue-600 to-blue-500 rounded-3xl p-8 mb-8 text-white shadow-xl shadow-blue-500/20 overflow-hidden">
    
    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-yellow-400/20 rounded-full blur-2xl"></div>

    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        
        <div>
            <div class="flex items-center space-x-2 mb-1">
                <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium tracking-wide text-blue-50 uppercase border border-white/10">
                    Dashboard Admin
                </span>
            </div>
            
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight leading-tight">
                Halo, <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 to-yellow-400">{{ $user->username ?? 'User' }}</span> 👋
            </h1>
            
            <p class="mt-3 text-blue-100 text-lg font-light max-w-xl leading-relaxed">
                Berikut adalah ringkasan performa Anda untuk bulan 
                <span class="font-semibold text-white border-b-2 border-yellow-400/50 pb-0.5">
                    {{ now()->translatedFormat('F Y') }}
                </span>.
            </p>

            {{-- Tombol Kecil / Info Tambahan --}}
            <div class="mt-6 flex items-center space-x-4 text-sm text-blue-50/80">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    Statistik Terkini
                </div>
                <div class="w-1 h-1 bg-blue-300 rounded-full"></div>
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Data Realtime
                </div>
            </div>
        </div>

        {{-- Bagian Kanan: Dekorasi Ikon/Ilustrasi (Opsional tapi menambah estetika) --}}
        <div class="hidden md:block opacity-90 transform rotate-12 translate-x-4">
             <div class="w-24 h-24 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 flex items-center justify-center shadow-inner">
                <svg class="w-12 h-12 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
             </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-4 gap-6 mb-10">
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

    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            <p class="text-gray-500 text-sm font-medium">Total Transaksi</p>
            <div class="p-1 bg-blue-100 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <rect width="20" height="12" x="2" y="6" rx="2"/>
                    <circle cx="12" cy="12" r="2"/>
                    <path d="M6 12h.01M18 12h.01"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $totalTransaksi }} <span class="text-xl font-medium text-gray-500">Transaksi</span></div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            <p class="text-gray-500 text-sm font-medium">Jumlah Unit Terjual</p>
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
        <div class="text-3xl font-bold text-gray-800">{{ $totalUnitBulanIni }} <span class="text-xl font-medium text-gray-500">Unit</span></div>
    </div>

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
        <div class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</div>
    </div>
</div>
<div class="bg-white p-6 rounded-xl shadow mb-8">

    <h3 class="text-sm font-semibold text-gray-700 mb-4">

        Penjualan Bulanan

    </h3>
    <canvas id="salesChart" height="56"></canvas>

</div>



<div class="bg-white p-6 rounded-2xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Semua Sales</h2>
            <p class="text-sm text-green-600">Rank sales dengan penjualan terbesar</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Terjual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Penjualan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komisi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Gaji</th>
                </tr>

            </thead>

            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($topSales as $index => $trx)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                            <div class="flex items-center">

                                <span class="flex items-center justify-center w-6 h-6 rounded-full {{ $index == 0 ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-500' }} text-xs font-bold mr-3">

                                    {{ $index + 1 }}

                                </span>

                                {{ $trx->sales->nama_lengkap ?? 'Sales Terhapus' }}

                            </div>

                        </td>



                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">

                            {{ $trx->total_unit }} Unit

                        </td>



                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">

                            Rp {{ number_format($trx->total_omset, 0, ',', '.') }}

                        </td>



                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">

                            Rp {{ number_format($trx->total_komisi, 0, ',', '.') }}

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">

                            @if($index == 0)

                                <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">
                                    👑 Top Sales
                                </span>

                            @else

                                <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">

                                    Aktif

                                </span>

                            @endif

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>  
    <div class="mt-4 text-sm text-gray-500">
        Showing data Top Sales
    </div>
</div>





<script>
    function selectSort(value) {
        document.getElementById('sortLabel').innerText = value;
        toggleSortDropdown();
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

<script>
    window.chartData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
        revenue: @json($grafikRevenue),
        unit: @json($grafikUnit)
    };
</script>

@endsection