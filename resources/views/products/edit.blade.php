<x-app-layout>
@section('title', 'Edit Produk')
<x-slot name="header"><h2 class="text-2xl font-bold text-slate-800">Edit Produk</h2></x-slot>
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full rounded-xl border-slate-200 text-sm" required>
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">SKU <span class="text-red-500">*</span></label>
                    <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="w-full rounded-xl border-slate-200 text-sm" required>
                    @error('sku') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <select name="category_id" class="w-full rounded-xl border-slate-200 text-sm" required>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Satuan</label>
                    <input type="text" name="satuan" value="{{ old('satuan', $product->satuan) }}" class="w-full rounded-xl border-slate-200 text-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Harga Beli</label>
                    <input type="number" name="harga_beli" value="{{ old('harga_beli', $product->harga_beli) }}" min="0" class="w-full rounded-xl border-slate-200 text-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Harga Jual</label>
                    <input type="number" name="harga_jual" value="{{ old('harga_jual', $product->harga_jual) }}" min="0" class="w-full rounded-xl border-slate-200 text-sm" required>
                </div>
                <div class="md:col-span-2 border-t border-dashed border-slate-200 pt-4 mt-1">
                    <p class="text-xs font-semibold text-amber-600 uppercase tracking-wider mb-3">
                        <svg class="w-3.5 h-3.5 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        Pengaturan Harga Grosir (Opsional)
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Harga Grosir</label>
                            <input type="number" name="harga_grosir" value="{{ old('harga_grosir', $product->harga_grosir) }}" min="0" class="w-full rounded-xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-200">
                            @error('harga_grosir') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Minimal Beli Grosir</label>
                            <input type="number" name="minimal_grosir" value="{{ old('minimal_grosir', $product->minimal_grosir) }}" min="0" class="w-full rounded-xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-200">
                            @error('minimal_grosir') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 mt-1.5">Jika minimal beli grosir diisi 0, harga grosir tidak aktif. Harga grosir otomatis berlaku saat kasir memasukkan qty ≥ minimal beli.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Stok Saat Ini</label>
                    <div class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-700">
                        {{ $product->stok }} {{ $product->satuan }}
                    </div>
                    <p class="text-xs text-slate-400 mt-1">Stok hanya berubah lewat transaksi (penjualan, pembelian, retur, penyesuaian).</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Minimum Stok</label>
                    <input type="number" name="min_stok" value="{{ old('min_stok', $product->min_stok) }}" min="0" class="w-full rounded-xl border-slate-200 text-sm" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Foto Produk</label>
                    @if($product->foto)
                    <div class="mb-2"><img src="{{ asset('storage/' . $product->foto) }}" class="w-20 h-20 rounded-lg object-cover"></div>
                    @endif
                    <input type="file" name="foto" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full rounded-xl border-slate-200 text-sm">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                </div>
            </div>
            <div class="flex gap-3 mt-6">
                <a href="{{ route('products.index') }}" class="px-4 py-2 bg-slate-100 text-slate-700 rounded-xl text-sm font-medium">Batal</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl text-sm font-semibold shadow-lg shadow-indigo-500/30 transition-all">Perbarui</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
