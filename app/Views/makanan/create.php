<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Breadcrumb & Header -->
    <div class="mb-8">
        <a href="<?= base_url('makanan') ?>" class="inline-flex items-center gap-2 text-xs font-bold text-culinary-navy dark:text-culinary-cyan hover:underline mb-3">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Menu</span>
        </a>
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-culinary-navy text-culinary-cyan flex items-center justify-center text-xl shadow-sm">
                <i class="fa-solid fa-utensils"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-stone-900 dark:text-white font-serif">Tambah Hidangan Se'i Sapi</h1>
                <p class="text-xs text-stone-600 dark:text-stone-400 mt-1">Daftarkan menu masakan khas Kupang NTT baru ke dalam buku menu kedai prakoso.</p>
            </div>
        </div>
    </div>

    <!-- Error Validation Alert -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-red-50 dark:bg-red-950/40 border border-red-300 dark:border-red-600 rounded-2xl p-5 mb-8 text-red-900 dark:text-red-200 text-xs shadow-sm">
            <div class="flex items-center gap-2 font-bold text-red-700 dark:text-red-300 text-sm mb-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>Tolong periksa kembali data isian berikut:</span>
            </div>
            <ul class="list-disc list-inside space-y-1 text-stone-700 dark:text-stone-300">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form Container -->
    <div class="bg-white dark:bg-[#182330] border-2 border-stone-200 dark:border-stone-700 rounded-3xl p-6 sm:p-10 shadow-food transition-all">
        <form action="<?= base_url('makanan/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
            <?= csrf_field() ?>

            <!-- Bagian 1: Data Utama Menu -->
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-culinary-navy dark:text-culinary-cyan border-b border-stone-200 dark:border-stone-700 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span>Informasi Hidangan</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Nama Menu -->
                    <div class="md:col-span-2">
                        <label for="nama" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                            Nama Hidangan <span class="text-red-600">*</span>
                        </label>
                        <input type="text" 
                               name="nama" 
                               id="nama" 
                               value="<?= old('nama') ?>" 
                               required
                               placeholder="Contoh: Se'i Sapi Sambal Lu'at Khas Kupang" 
                               class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white placeholder-stone-400 focus:outline-none focus:border-culinary-navy">
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                            Kategori Hidangan <span class="text-red-600">*</span>
                        </label>
                        <select name="kategori" 
                                id="kategori" 
                                required
                                class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white focus:outline-none focus:border-culinary-navy">
                            <option value="Se'i Sapi" <?= old('kategori') === "Se'i Sapi" ? 'selected' : '' ?>>Se'i Sapi (Siap Santap)</option>
                            <option value="Paket Lengkap" <?= old('kategori') === 'Paket Lengkap' ? 'selected' : '' ?>>Paket Lengkap (Nasi Jagung + Sayur)</option>
                            <option value="Frozen Pack" <?= old('kategori') === 'Frozen Pack' ? 'selected' : '' ?>>Kemasan Beku / Frozen Vakum</option>
                            <option value="Porsi Besar" <?= old('kategori') === 'Porsi Besar' ? 'selected' : '' ?>>Porsi Besar / Platter Keluarga</option>
                            <option value="Side Dish & Sambal" <?= old('kategori') === 'Side Dish & Sambal' ? 'selected' : '' ?>>Sambal Ekstra & Sayur Pendamping</option>
                        </select>
                    </div>

                    <!-- Status Ketersediaan -->
                    <div>
                        <label for="status" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                            Ketersediaan Dapur <span class="text-red-600">*</span>
                        </label>
                        <select name="status" 
                                id="status" 
                                required
                                class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white focus:outline-none focus:border-culinary-navy">
                            <option value="tersedia" <?= old('status') !== 'habis' ? 'selected' : '' ?>>Tersedia (Ready di Dapur)</option>
                            <option value="habis" <?= old('status') === 'habis' ? 'selected' : '' ?>>Habis (Sedang Dimasak / Kosong)</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Bagian 2: Harga, Berat & Level Pedas -->
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-culinary-navy dark:text-culinary-cyan border-b border-stone-200 dark:border-stone-700 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-coins"></i>
                    <span>Harga & Porsi</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- Harga -->
                    <div>
                        <label for="harga" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                            Harga Porsi (Rp) <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-xs text-stone-500 font-bold">Rp</span>
                            <input type="number" 
                                   name="harga" 
                                   id="harga" 
                                   value="<?= old('harga') ?>" 
                                   required
                                   min="0"
                                   step="500"
                                   placeholder="42000" 
                                   class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl pl-12 pr-4 py-3 text-sm text-stone-900 dark:text-white font-mono focus:outline-none focus:border-culinary-navy">
                        </div>
                    </div>

                    <!-- Berat Gram -->
                    <div>
                        <label for="berat" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                            Berat Daging (Gram)
                        </label>
                        <div class="relative">
                            <input type="number" 
                                   name="berat" 
                                   id="berat" 
                                   value="<?= old('berat') ?? 200 ?>" 
                                   min="10"
                                   step="10"
                                   placeholder="200" 
                                   class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white font-mono focus:outline-none focus:border-culinary-navy">
                            <span class="absolute right-4 top-3 text-xs text-stone-500">Gram</span>
                        </div>
                    </div>

                    <!-- Tingkat Pedas -->
                    <div>
                        <label for="tingkat_pedas" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                            Level Pedas (1 - 5)
                        </label>
                        <select name="tingkat_pedas" 
                                id="tingkat_pedas" 
                                class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white focus:outline-none focus:border-culinary-navy">
                            <option value="1" <?= old('tingkat_pedas') == '1' ? 'selected' : '' ?>>Level 1 (Gurih Asap / Tidak Pedas)</option>
                            <option value="2" <?= old('tingkat_pedas') == '2' ? 'selected' : '' ?>>Level 2 (Pedas Sedikit)</option>
                            <option value="3" <?= (old('tingkat_pedas') == '3' || !old('tingkat_pedas')) ? 'selected' : '' ?>>Level 3 (Pedas Sedang)</option>
                            <option value="4" <?= old('tingkat_pedas') == '4' ? 'selected' : '' ?>>Level 4 (Pedas Mantap Lu'at)</option>
                            <option value="5" <?= old('tingkat_pedas') == '5' ? 'selected' : '' ?>>Level 5 (Pedas Ekstrem Rawit)</option>
                        </select>
                    </div>

                    <!-- Rating Awal -->
                    <div>
                        <label for="rating" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                            Rating Awal (1.0 - 5.0)
                        </label>
                        <input type="number" 
                               name="rating" 
                               id="rating" 
                               value="<?= old('rating') ?? 5.0 ?>" 
                               min="1.0"
                               max="5.0"
                               step="0.1"
                               class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white font-mono focus:outline-none focus:border-culinary-navy">
                    </div>

                </div>
            </div>

            <!-- Bagian 3: Deskripsi Rasa & Foto Hidangan -->
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-culinary-navy dark:text-culinary-cyan border-b border-stone-200 dark:border-stone-700 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-camera"></i>
                    <span>Cerita Rasa & Foto Hidangan</span>
                </h3>

                <div class="space-y-6">
                    
                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                            Keterangan Rasa & Cara Penyajian
                        </label>
                        <textarea name="deskripsi" 
                                  id="deskripsi" 
                                  rows="4" 
                                  placeholder="Jelaskan aroma asap kayu kesambi, rasa sambal pendamping, atau keunikan sajian khas NTT ini..."
                                  class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl p-4 text-sm text-stone-900 dark:text-white placeholder-stone-400 focus:outline-none focus:border-culinary-navy"><?= old('deskripsi') ?></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Upload File Foto -->
                        <div>
                            <label for="gambar_file" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                                Unggah Foto Masakan
                            </label>
                            <input type="file" 
                                   name="gambar_file" 
                                   id="gambar_file" 
                                   accept="image/*"
                                   class="block w-full text-xs text-stone-600 dark:text-stone-300 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-stone-200 dark:file:bg-stone-700 file:text-stone-800 dark:file:text-stone-100 hover:file:bg-culinary-navy hover:file:text-white cursor-pointer bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl p-2">
                            <span class="text-[11px] text-stone-500 mt-1 block">Foto makanan format JPG, PNG, WEBP (maks 3MB).</span>
                        </div>

                        <!-- Link URL Foto Alternatif -->
                        <div>
                            <label for="gambar_url" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                                Atau Tautan (URL) Foto
                            </label>
                            <input type="url" 
                                   name="gambar_url" 
                                   id="gambar_url" 
                                   value="<?= old('gambar_url') ?>" 
                                   placeholder="https://..." 
                                   class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white placeholder-stone-400 focus:outline-none focus:border-culinary-navy">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-stone-200 dark:border-stone-700">
                <a href="<?= base_url('makanan') ?>" 
                   class="px-6 py-3 rounded-xl border border-stone-300 dark:border-stone-600 text-stone-700 dark:text-stone-300 text-xs font-bold hover:bg-stone-100 transition-colors">
                    Batal
                </a>

                <button type="submit" 
                        class="px-8 py-3 rounded-xl bg-culinary-navy hover:bg-culinary-navy-dark text-white font-bold text-xs shadow-sm transition-all flex items-center gap-2">
                    <i class="fa-solid fa-check"></i>
                    <span>Simpan Menu Masakan</span>
                </button>
            </div>

        </form>
    </div>

</div>

<?= $this->endSection() ?>
