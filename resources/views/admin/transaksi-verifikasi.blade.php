@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-gray-800 mb-8">Statistik Bulan : <span class="font-bold text-blue-500"> {{ now()->translatedFormat('F') }}</span></h1>

<div class="grid grid-cols-3 gap-4 mb-10">
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            {{-- PERBAIKAN: Ubah Padding jadi Pending --}}
            <p class="text-gray-500 text-md font-medium">Transaksi <span class='text-yellow-500'> Pending</span></p>
            
            <div class="p-1 bg-blue-100 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <path d="M18 21a8 8 0 0 0-16 0"/>
                    <circle cx="10" cy="8" r="5"/>
                    <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/>
                </svg>
            </div>
        </div>
        <div class="text-4xl font-bold text-gray-800">{{ $totalPending }} <span class="text-xl font-medium text-gray-500">Transaksi</span></div>
    </div>
   
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            <p class="text-gray-500 text-md font-medium">Transaksi <span class='text-green-500'> Approved</span></p>
            <div class="p-1 bg-blue-100 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <path d="M18 21a8 8 0 0 0-16 0"/>
                    <circle cx="10" cy="8" r="5"/>
                    <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/>
                </svg>
            </div>
        </div>
        <div class="text-4xl font-bold text-gray-800">{{ $totalApproved }} <span class="text-xl font-medium text-gray-500">Transaksi</span></div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-2">
            <p class="text-gray-500 text-md font-medium">Transaksi <span class='text-red-500'> Rejected</span></p>
            <div class="p-1 bg-blue-100 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <path d="M18 21a8 8 0 0 0-16 0"/>
                    <circle cx="10" cy="8" r="5"/>
                    <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/>
                </svg>
            </div>
        </div>
        <div class="text-4xl font-bold text-gray-800">{{ $totalRejected }} <span class="text-xl font-medium text-gray-500">Transaksi</span></div>
    </div>
</div>

<div class="bg-white p-6 rounded-2xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Semua Sales</h2>
            <p class="text-sm text-green-600">Anggota aktif</p> 
        </div>
        
        <div class="relative">
            <button id="sortButton" class="w-56 bg-white border border-gray-300 rounded-lg px-4 py-2 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="text-xs text-gray-600">Sort by : <span id="sortLabel" class="font-bold text-gray-800">Newest</span></span>
                <svg id="sortIcon" class="w-3 h-3 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            <div id="sortDropdown" class="hidden absolute right-0 mt-2 w-full bg-white rounded-xl shadow-xl border border-gray-100 z-20 overflow-hidden transform transition-all duration-200 origin-top-right">
                <a href="#" onclick="selectSort('Newest')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Newest</a>
                <a href="#" onclick="selectSort('Oldest')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Oldest</a>
                <a href="#" onclick="selectSort('Highest Sales')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Highest Sales</a>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pembeli</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Terjual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal/Waktu Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Penjualan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komisi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bukti Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($pertransaksi as $item)
                <tr class="hover:bg-gray-50">
                    
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->sales->nama_lengkap ?? '-' }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->barang->nama_produk ?? '-' }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->nama_pelanggan ?? '-' }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                        {{ $item->jumlah_unit }} Unit
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                        {{ $item->tanggal_transaksi->format('d M Y ') }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">
                        Rp {{ number_format($item->harga_total, 0, ',', '.') }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                        Rp {{ number_format($item->komisi_penjualan, 0, ',', '.') }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        @if($item->bukti_foto)
                            <button type="button" 
                                    onclick="showImage('{{ asset('storage/' . $item->bukti_foto) }}')"
                                    class="text-indigo-500 hover:text-indigo-700 transition focus:outline-none" 
                                    title="Lihat Bukti Foto">
                                <div class="flex items-center gap-2 justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm1 4a2 2 0 114 0 2 2 0 01-4 0zm9 8H6l3-4 2 3 3-4 3 5z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm">Lihat</span>
                                </div> 
                            </button>
                        @else
                            <span class="text-gray-400 text-xs italic">Tidak ada foto</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('admin.transaksi.update-status', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="flex items-center space-x-2">
                                <select name="status_verifikasi" 
                                    class="text-xs border border-gray-300 rounded-md px-2 py-1 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="peding" {{ $item->status_verifikasi == 'peding' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $item->status_verifikasi == 'approved' ? 'selected' : '' }}>Approve</option>
                                    <option value="rejected" {{ $item->status_verifikasi == 'rejected' ? 'selected' : '' }}>Reject</option>
                                </select>

                                <button type="submit" 
                                    class="px-3 py-1 text-xs font-semibold rounded-md bg-blue-500 text-white hover:bg-blue-600 transition duration-150 ease-in-out">
                                    OK
                                </button>
                            </div>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    
    {{-- Footer Pagination --}}
    <div class="mt-4 text-sm text-gray-500">
        Showing data Transaksi
    </div>
</div>

{{-- MODAL PREVIEW FOTO --}}
<div id="imageModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeImageModal()"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
            
            <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Bukti Foto
                </h3>
                <button type="button" onclick="closeImageModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 flex justify-center bg-gray-100">
                <img id="modalImageSrc" src="" alt="Bukti Transaksi" class="max-h-[70vh] rounded-md shadow-sm object-contain">
            </div>
            
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="closeImageModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk membuka Modal dan set URL gambar
    function showImage(imageUrl) {
        const modal = document.getElementById('imageModal');
        const imgElement = document.getElementById('modalImageSrc');
        
        // Set source gambar
        imgElement.src = imageUrl;
        
        // Tampilkan modal (hapus class hidden)
        modal.classList.remove('hidden');
    }

    // Fungsi untuk menutup Modal
    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        const imgElement = document.getElementById('modalImageSrc');
        
        // Sembunyikan modal
        modal.classList.add('hidden');
        
        // Bersihkan source gambar agar tidak flickering saat dibuka lagi
        setTimeout(() => {
            imgElement.src = '';
        }, 300);
    }

    // Close modal on ESC key press
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeImageModal();
        }
    });
</script>

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

@endsection