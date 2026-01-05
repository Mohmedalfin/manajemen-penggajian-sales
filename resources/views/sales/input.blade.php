@extends('layouts.sales')

@section('content')

    {{-- 1. BANNER HIJAU (Updated Padding) --}}
    <div class="bg-green-600 rounded-2xl p-4 md:p-6 text-white mb-6 shadow-lg relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-start gap-4">
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
        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 md:p-8">
        
        <div class="mb-8">
            <h3 class="text-lg font-bold text-gray-800">Form Input Transaksi Penjualan</h3>
            <p class="text-gray-400 text-sm mt-1">Isi detail transaksi penjualan dengan lengkap</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Gagal Menyimpan!</strong>
                <ul class="mt-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('sales.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            
            <div class="border-b border-gray-50 pb-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-3">
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

            {{-- B. INFORMASI PELANGGAN --}}
            <div class="border-b border-gray-50 pb-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-4">
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

            {{-- C. DETAIL PRODUK --}}
            <div class="border-b border-gray-50 pb-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-500">
                        <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                        <path d="m3.3 7 8.7 5 8.7-5"/>
                        <path d="M12 22V12"/>
                    </svg>
                    Detail Produk
                </label>

                {{-- Logic Flex-Col Mobile --}}
                <div class="flex flex-col md:flex-row gap-4">
                    
                    {{-- 1. CUSTOM DROPDOWN --}}
                    <div class="flex-1 relative dropdown-container" id="productDropdown">
                        <label class="block text-xs font-medium text-gray-500 mb-1 ml-1">Pilih Produk</label>
                        
                        <div class="dropdown-trigger relative w-full bg-gray-100 rounded-xl px-4 py-3 text-gray-700 cursor-pointer focus:ring-2 focus:ring-blue-500 focus:bg-white transition flex items-center justify-between group border border-transparent hover:border-blue-200">
                            <span class="dropdown-selected-label truncate">-- Pilih Barang --</span>
                            <div class="text-blue-600 transition-transform duration-200 dropdown-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"/>
                                </svg>
                            </div>
                        </div>

                        <ul class="dropdown-options absolute left-0 z-50 w-full mt-2 bg-white rounded-xl border border-gray-100 shadow-xl hidden max-h-60 overflow-y-auto custom-scrollbar">
                            
                            @if(isset($products) && $products->count() > 0)
                                @foreach($products as $product)
                                    <li class="px-4 py-3 hover:bg-blue-50 cursor-pointer text-gray-700 border-b border-gray-50 last:border-0 flex justify-between items-center group transition" 
                                        data-value="{{ $product->id }}"
                                        data-price="{{ $product->harga_jual_unit }}"> 
                                        
                                        {{-- Nama Produk --}}
                                        <span class="group-hover:text-blue-600 font-medium">{{ $product->nama_produk }}</span>
                                        
                                        <div class="flex flex-col items-end">
                                            {{-- Harga Format Rupiah --}}
                                            <span class="text-xs font-bold text-green-600">
                                                Rp {{ number_format($product->harga_jual_unit, 0, ',', '.') }}
                                            </span>
                                            {{-- Stok --}}
                                            <span class="text-[10px] text-gray-400 bg-gray-100 px-2 py-0.5 rounded-md mt-1 group-hover:bg-blue-100 group-hover:text-blue-600">
                                                Stok: {{ $product->stok }}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="px-4 py-3 text-gray-500 text-center text-sm">Tidak ada produk tersedia</li>
                            @endif
                        </ul>

                        
                        <input type="hidden" name="product_id" class="dropdown-input">
                    </div>

                    {{-- 2. JUMLAH UNIT --}}
                    <div class="w-full md:w-32">
                        <label class="block text-xs font-medium text-gray-500 mb-1 ml-1">Jumlah</label>
                        <input type="number" name="quantity" min="0" placeholder="0" 
                               oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                               class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 text-center focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300">
                    </div>

                    {{-- 3. HARGA SATUAN --}}
                    <div class="w-full md:w-48">
                        <label class="block text-xs font-medium text-gray-500 mb-1 ml-1">Harga Satuan</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-sm font-semibold">Rp</span>
                            <input type="text" id="price_display" placeholder="0" 
                                   class="w-full bg-gray-100 border-none rounded-xl pl-10 pr-4 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300">
                            <input type="hidden" name="price" id="price_raw">
                        </div>
                    </div>

                </div>
            </div>

            {{-- D. BUKTI PENGIRIMAN --}}
            <div class="border-b border-gray-50 pb-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-500">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                        <circle cx="9" cy="9" r="2"/>
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                    </svg>
                    Input Foto Bukti Pengiriman
                </label>

                <div class="space-y-3">
                    <div id="image-preview-container" class="hidden relative w-full h-56 bg-gray-100 rounded-xl overflow-hidden border-2 border-dashed border-gray-300">
                        <img id="image-preview" src="#" alt="Preview Bukti" class="w-full h-full object-cover">
                        <button type="button" onclick="resetImage()" class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full shadow-lg hover:bg-red-600 transition z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div id="upload-zone">
                        <label for="proof_image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-blue-300 border-dashed rounded-xl cursor-pointer bg-blue-50 hover:bg-blue-100 transition group">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-blue-500 group-hover:scale-110 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="mb-1 text-sm text-blue-700 font-semibold">Ambil Foto / Pilih Galeri</p>
                                <p class="text-xs text-blue-500">Klik area ini untuk mengambil gambar</p>
                            </div>
                            <input type="file" name="proof_image" id="proof_image" accept="image/*" class="hidden" onchange="previewImage(event)">
                        </label>
                    </div>
                </div>
            </div>

            {{-- E. CATATAN --}}
            <div class="pb-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Catatan (Opsional)</label>
                <input type="text" name="notes" placeholder="Tambahkan catatan jika diperlukan" 
                       class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:bg-white transition placeholder-gray-300">
            </div>

            <hr class="border-gray-100 my-6">

            {{-- F. TOMBOL SIMPAN --}}
            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg shadow-blue-200 transition duration-200 flex items-center justify-center gap-2 transform active:scale-[0.99]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                    <path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/>
                    <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"/>
                    <path d="M7 3v4a1 1 0 0 0 1 1h7"/>
                </svg>
                Simpan Transaksi Penjualan
            </button>

        </form>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

    {{-- SCRIPT JAVASCRIPT --}}
    <script>
        // --- 1. Fungsi Format Rupiah ---
        function formatRupiah(angka) {
            // Pastikan angka dibersihkan dari karakter aneh dulu sebelum diformat
            let number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        }

        // --- 2. Logic Image Preview ---
        function previewImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById('image-preview-container');
            const uploadZone = document.getElementById('upload-zone');
            const previewImage = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden'); 
                    uploadZone.classList.add('hidden'); 
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function resetImage() {
            const input = document.getElementById('proof_image');
            const previewContainer = document.getElementById('image-preview-container');
            const uploadZone = document.getElementById('upload-zone');
            input.value = ''; 
            previewContainer.classList.add('hidden'); 
            uploadZone.classList.remove('hidden'); 
        }

        document.addEventListener('DOMContentLoaded', function() {
            // --- 3. Logic Custom Dropdown & Harga ---
            const dropdown = document.getElementById('productDropdown');
            const trigger = dropdown.querySelector('.dropdown-trigger');
            const optionsList = dropdown.querySelector('.dropdown-options');
            const selectedLabel = dropdown.querySelector('.dropdown-selected-label');
            const hiddenInput = dropdown.querySelector('.dropdown-input');
            const arrow = dropdown.querySelector('.dropdown-arrow');
            
            // Elemen Harga
            const priceDisplay = document.getElementById('price_display');
            const priceRaw = document.getElementById('price_raw');

            // --- A. Dropdown Interactivity ---
            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                optionsList.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });

            dropdown.querySelectorAll('li').forEach(option => {
                option.addEventListener('click', () => {
                    const text = option.querySelector('span:first-child').textContent;
                    const value = option.getAttribute('data-value');
                    let price = option.getAttribute('data-price'); 

                    // --- PERBAIKAN PENTING DISINI ---
                    // Membulatkan angka desimal (.00) agar tidak dianggap angka biasa
                    // Contoh: "7000000.00" menjadi 7000000 (Integer)
                    if (price) {
                        price = Math.floor(parseFloat(price)); 
                    }

                    // Update UI Label
                    selectedLabel.textContent = text;
                    selectedLabel.classList.add('text-gray-900', 'font-semibold');
                    
                    // Update Input Hidden Produk ID
                    hiddenInput.value = value;
                    
                    // Update Harga Otomatis (Format Rupiah)
                    if(priceDisplay && priceRaw && price) {
                        priceRaw.value = price; 
                        priceDisplay.value = formatRupiah(price); 
                    }

                    // Tutup
                    optionsList.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                });
            });

            // Tutup Dropdown jika klik di luar
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target)) {
                    optionsList.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                }
            });

            // --- B. Logic Input Harga Manual (Ketik Sendiri) ---
            if(priceDisplay && priceRaw) {
                priceDisplay.addEventListener('keyup', function(e) {
                    // 1. Ambil nilai, buang semua karakter selain angka
                    let cleanValue = this.value.replace(/[^0-9]/g, '');
                    
                    // 2. Simpan nilai murni ke input hidden
                    priceRaw.value = cleanValue;
                    
                    // 3. Format kembali tampilan dengan titik
                    this.value = formatRupiah(cleanValue);
                });
            }
        });
    </script>
    

@endsection