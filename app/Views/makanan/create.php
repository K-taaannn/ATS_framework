<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Breadcrumb & Header -->
    <div class="mb-8">
        <a href="<?= base_url('makanan') ?>" class="inline-flex items-center gap-2 text-xs font-semibold text-cyan-600 dark:text-brand-cyan hover:underline mb-3">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Katalog Menu</span>
        </a>
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-cyan-100 dark:bg-brand-navy border border-cyan-300 dark:border-brand-cyan/40 text-cyan-800 dark:text-brand-cyan flex items-center justify-center text-xl shadow-sm dark:shadow-glow">
                <i class="fa-solid fa-plus"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white font-serif">Tambah Menu Se'i Sapi Baru</h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Daftarkan varian kuliner khas Nusa Tenggara Timur ke dalam katalog toko prakoso.</p>
            </div>
        </div>
    </div>

    <!-- Error Validation Alert -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-red-50 dark:bg-red-950/70 border border-red-300 dark:border-red-500/40 rounded-2xl p-5 mb-8 text-red-800 dark:text-red-200 text-xs shadow-sm">
            <div class="flex items-center gap-2 font-bold text-red-600 dark:text-red-300 text-sm mb-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>Terdapat kesalahan pengisian formulir:</span>
            </div>
            <ul class="list-disc list-inside space-y-1 text-slate-700 dark:text-slate-300">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form Container -->
    <div class="bg-white dark:bg-[#07192C]/90 border border-slate-200 dark:border-cyan-500/25 rounded-3xl p-6 sm:p-10 shadow-card-light dark:shadow-2xl backdrop-blur-xl transition-all">
        <form action="<?= base_url('makanan/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
            <?= csrf_field() ?>

            <!-- Section 1: Informasi Pokok -->
            <div>
                <h3 class="text-base font-bold text-cyan-700 dark:text-brand-cyan border-b border-slate-200 dark:border-cyan-500/20 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Informasi Pokok Menu</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Nama Menu -->
                    <div class="md:col-span-2">
                        <label for="nama" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                            Nama Menu Se'i Sapi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="nama" 
                               id="nama" 
                               value="<?= old('nama') ?>" 
                               required
                               placeholder="Contoh: Se'i Sapi Sambal Lu'at Khas Kupang" 
                               class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                            Kategori Produk <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori" 
                                id="kategori" 
                                required
                                class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                            <option value="Se'i Sapi" <?= old('kategori') === "Se'i Sapi" ? 'selected' : '' ?>>Se'i Sapi (Siap Santap)</option>
                            <option value="Paket Lengkap" <?= old('kategori') === 'Paket Lengkap' ? 'selected' : '' ?>>Paket Lengkap (Nasi + Sayur + Sambal)</option>
                            <option value="Frozen Pack" <?= old('kategori') === 'Frozen Pack' ? 'selected' : '' ?>>Frozen Pack (Kemasan Vakum)</option>
                            <option value="Porsi Besar" <?= old('kategori') === 'Porsi Besar' ? 'selected' : '' ?>>Porsi Besar / Platter Keluarga</option>
                            <option value="Side Dish & Sambal" <?= old('kategori') === 'Side Dish & Sambal' ? 'selected' : '' ?>>Side Dish & Sambal Lu'at</option>
                        </select>
                    </div>

                    <!-- Status Ketersediaan -->
                    <div>
                        <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                            Status Ketersediaan <span class="text-red-500">*</span>
                        </label>
                        <select name="status" 
                                id="status" 
                                required
                                class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                            <option value="tersedia" <?= old('status') !== 'habis' ? 'selected' : '' ?>>Tersedia (Ready Stock)</option>
                            <option value="habis" <?= old('status') === 'habis' ? 'selected' : '' ?>>Habis (Sold Out)</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Section 2: Harga, Berat & Spesifikasi Rasa -->
            <div>
                <h3 class="text-base font-bold text-cyan-700 dark:text-brand-cyan border-b border-slate-200 dark:border-cyan-500/20 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-coins"></i>
                    <span>Harga & Spesifikasi Porsi</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- Harga -->
                    <div>
                        <label for="harga" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-xs text-cyan-600 dark:text-brand-cyan font-bold">Rp</span>
                            <input type="number" 
                                   name="harga" 
                                   id="harga" 
                                   value="<?= old('harga') ?>" 
                                   required
                                   min="0"
                                   step="500"
                                   placeholder="42000" 
                                   class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl pl-12 pr-4 py-3 text-sm text-slate-900 dark:text-white font-mono placeholder-slate-400 focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                        </div>
                    </div>

                    <!-- Berat Gram -->
                    <div>
                        <label for="berat" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                            Berat (Gram)
                        </label>
                        <div class="relative">
                            <input type="number" 
                                   name="berat" 
                                   id="berat" 
                                   value="<?= old('berat') ?? 200 ?>" 
                                   min="10"
                                   step="10"
                                   placeholder="200" 
                                   class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white font-mono placeholder-slate-400 focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                            <span class="absolute right-4 top-3 text-xs text-slate-400">Gram</span>
                        </div>
                    </div>

                    <!-- Tingkat Pedas -->
                    <div>
                        <label for="tingkat_pedas" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                            Level Pedas (1 - 5)
                        </label>
                        <select name="tingkat_pedas" 
                                id="tingkat_pedas" 
                                class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                            <option value="1" <?= old('tingkat_pedas') == '1' ? 'selected' : '' ?>>Level 1 (Tidak Pedas / Gurih Asap)</option>
                            <option value="2" <?= old('tingkat_pedas') == '2' ? 'selected' : '' ?>>Level 2 (Pedas Manis Ringan)</option>
                            <option value="3" <?= (old('tingkat_pedas') == '3' || !old('tingkat_pedas')) ? 'selected' : '' ?>>Level 3 (Pedas Sedang)</option>
                            <option value="4" <?= old('tingkat_pedas') == '4' ? 'selected' : '' ?>>Level 4 (Pedas Mantap Lu'at)</option>
                            <option value="5" <?= old('tingkat_pedas') == '5' ? 'selected' : '' ?>>Level 5 (Pedas Ekstrem Membara)</option>
                        </select>
                    </div>

                    <!-- Rating Awal -->
                    <div>
                        <label for="rating" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                            Rating Bintang (1.0 - 5.0)
                        </label>
                        <input type="number" 
                               name="rating" 
                               id="rating" 
                               value="<?= old('rating') ?? 5.0 ?>" 
                               min="1.0"
                               max="5.0"
                               step="0.1"
                               class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white font-mono placeholder-slate-400 focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                    </div>

                </div>
            </div>

            <!-- Section 3: Deskripsi & Gambar -->
            <div>
                <h3 class="text-base font-bold text-cyan-700 dark:text-brand-cyan border-b border-slate-200 dark:border-cyan-500/20 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-image"></i>
                    <span>Deskripsi & Foto Menu</span>
                </h3>

                <div class="space-y-6">
                    
                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                            Deskripsi Cita Rasa & Penyajian
                        </label>
                        <textarea name="deskripsi" 
                                  id="deskripsi" 
                                  rows="4" 
                                  placeholder="Ceritakan proses pengasapan kayu kesambi, aroma sambal lu'at, atau komposisi bumbu khas NTT..."
                                  class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl p-4 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all"><?= old('deskripsi') ?></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Upload File Gambar -->
                        <div>
                            <label for="gambar_file" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                                <i class="fa-solid fa-cloud-arrow-up mr-1 text-cyan-600 dark:text-brand-cyan"></i> Upload Foto (File)
                            </label>
                            <input type="file" 
                                   name="gambar_file" 
                                   id="gambar_file" 
                                   accept="image/*"
                                   class="block w-full text-xs text-slate-600 dark:text-slate-300 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-cyan-100 file:text-cyan-800 dark:file:bg-brand-navy dark:file:text-cyan-200 hover:file:bg-cyan-200 dark:hover:file:bg-brand-cyan dark:hover:file:text-brand-navy cursor-pointer bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl p-2">
                            <span class="text-[11px] text-slate-500 mt-1 block">Format: JPG, JPEG, PNG, WEBP (Maks 3MB)</span>
                        </div>

                        <!-- Link URL Gambar Alternatif -->
                        <div>
                            <label for="gambar_url" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">
                                <i class="fa-solid fa-link mr-1 text-cyan-600 dark:text-brand-cyan"></i> Atau Masukkan URL Gambar
                            </label>
                            <input type="url" 
                                   name="gambar_url" 
                                   id="gambar_url" 
                                   value="<?= old('gambar_url') ?>" 
                                   placeholder="https://images.unsplash.com/..." 
                                   class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                            <span class="text-[11px] text-slate-500 mt-1 block">Opsional jika tidak mengunggah file gambar langsung.</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Tombol Aksi Simpan & Batal -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-200 dark:border-cyan-500/20">
                <a href="<?= base_url('makanan') ?>" 
                   class="px-6 py-3 rounded-xl border border-slate-300 dark:border-slate-600 hover:border-slate-500 text-slate-700 dark:text-slate-300 text-xs font-semibold transition-colors">
                    Batal
                </a>

                <button type="submit" 
                        class="px-8 py-3 rounded-xl bg-gradient-to-r from-brand-cyan to-cyan-400 text-brand-navy font-bold text-xs shadow-glow hover:shadow-glow-lg transition-all duration-300 flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Menu Baru</span>
                </button>
            </div>

        </form>
    </div>

</div>

<?= $this->endSection() ?>
