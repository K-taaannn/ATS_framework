<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Breadcrumb -->
    <div class="mb-8">
        <a href="<?= base_url('makanan') ?>" class="inline-flex items-center gap-2 text-xs font-semibold text-cyan-600 dark:text-brand-cyan hover:underline mb-2">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Katalog Menu</span>
        </a>
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white font-serif"><?= esc($item['nama']) ?></h1>
            
            <div class="flex items-center gap-3">
                <a href="<?= base_url('makanan/edit/' . $item['id']) ?>" 
                   class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 dark:bg-brand-navy dark:hover:bg-cyan-900 border border-slate-300 dark:border-cyan-500/40 text-slate-800 dark:text-cyan-200 text-xs font-semibold transition-colors flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-pen-to-square text-cyan-600 dark:text-brand-cyan"></i>
                    <span>Edit Menu</span>
                </a>
                <button type="button" 
                        onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc($item['nama']) ?>')" 
                        class="px-4 py-2 rounded-xl bg-red-50 hover:bg-red-100 dark:bg-red-950/60 dark:hover:bg-red-900 border border-red-200 dark:border-red-500/30 text-red-700 dark:text-red-300 text-xs font-semibold transition-colors flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-trash-can text-red-500 dark:text-red-400"></i>
                    <span>Hapus</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Detail Card -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-16">
        
        <!-- Left: Image Section -->
        <div class="lg:col-span-6">
            <div class="relative rounded-3xl overflow-hidden bg-slate-900 border border-slate-200 dark:border-cyan-500/25 shadow-xl dark:shadow-2xl group">
                <?php 
                    $imageSrc = '';
                    if (!empty($item['gambar'])) {
                        if (strpos($item['gambar'], 'http') === 0) {
                            $imageSrc = $item['gambar'];
                        } elseif (file_exists(ROOTPATH . 'public/uploads/makanan/' . $item['gambar'])) {
                            $imageSrc = base_url('uploads/makanan/' . $item['gambar']);
                        } else {
                            $imageSrc = 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=900&q=80';
                        }
                    } else {
                        $imageSrc = 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=900&q=80';
                    }
                ?>
                <img src="<?= esc($imageSrc) ?>" 
                     alt="<?= esc($item['nama']) ?>" 
                     class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-105">

                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30"></div>

                <div class="absolute top-4 left-4 flex gap-2">
                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-navy/90 text-cyan-200 border border-brand-cyan/40 backdrop-blur-md">
                        <?= esc($item['kategori']) ?>
                    </span>
                    <?php if ($item['status'] === 'tersedia') : ?>
                        <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 backdrop-blur-md">
                            Tersedia
                        </span>
                    <?php else : ?>
                        <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-red-500/30 text-red-300 border border-red-500/40 backdrop-blur-md">
                            Habis
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Bottom Image Specs -->
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-xs text-slate-200 bg-black/70 p-3 rounded-2xl border border-cyan-500/20 backdrop-blur-md">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-smoke text-brand-cyan"></i> Asap Tradisional Kesambi
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-weight-scale text-brand-cyan"></i> <?= $item['berat'] ?> Gram
                    </span>
                </div>
            </div>
        </div>

        <!-- Right: Specs, Pricing & Story -->
        <div class="lg:col-span-6 bg-white dark:bg-[#07192C]/90 border border-slate-200 dark:border-cyan-500/25 rounded-3xl p-6 sm:p-8 shadow-card-light dark:shadow-2xl backdrop-blur-xl space-y-6 transition-all">
            
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-widest block font-medium">Harga Resmi Toko prakoso</span>
                    <div class="text-4xl font-extrabold text-cyan-700 dark:text-brand-cyan font-sans mt-1">
                        Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                    </div>
                </div>

                <div class="text-right">
                    <div class="flex items-center gap-1 text-amber-500 dark:text-amber-400 font-bold text-lg justify-end">
                        <i class="fa-solid fa-star"></i>
                        <span><?= number_format($item['rating'], 1) ?></span>
                    </div>
                    <span class="text-xs text-slate-500 dark:text-slate-400 font-medium"><?= number_format($item['terjual']) ?> porsi terjual</span>
                </div>
            </div>

            <!-- Taste Profile Grid -->
            <div class="grid grid-cols-2 gap-3 py-3 border-y border-slate-200 dark:border-cyan-500/20">
                <div class="bg-slate-50 dark:bg-[#05111F] p-3 rounded-2xl border border-slate-200 dark:border-cyan-500/15">
                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block mb-1">Tingkat Kepedasan:</span>
                    <div class="flex items-center gap-1.5">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <i class="fa-solid fa-pepper-hot text-sm <?= ($i <= $item['tingkat_pedas']) ? 'text-red-500 animate-pulse' : 'text-slate-300 dark:text-slate-700' ?>"></i>
                        <?php endfor; ?>
                        <span class="text-xs font-bold text-slate-900 dark:text-white ml-1">Level <?= $item['tingkat_pedas'] ?></span>
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-[#05111F] p-3 rounded-2xl border border-slate-200 dark:border-cyan-500/15">
                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block mb-1">Asal Daerah:</span>
                    <div class="text-xs font-bold text-cyan-700 dark:text-cyan-200 flex items-center gap-1.5">
                        <i class="fa-solid fa-map-location-dot text-cyan-600 dark:text-brand-cyan"></i>
                        <span>Kupang, NTT</span>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Detail -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800 dark:text-cyan-300 mb-2">Cita Rasa & Pengolahan:</h4>
                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed whitespace-pre-line">
                    <?= esc($item['deskripsi']) ?>
                </p>
            </div>

            <!-- Order via WhatsApp Action Button -->
            <?php 
                $waText = urlencode("Halo Toko prakoso, saya ingin memesan menu Se'i Sapi: " . $item['nama'] . " (Rp " . number_format($item['harga'], 0, ',', '.') . "). Mohon info ketersediaannya!");
            ?>
            <div class="pt-4 space-y-3">
                <a href="https://wa.me/6281234567890?text=<?= $waText ?>" 
                   target="_blank"
                   class="w-full py-4 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold text-sm shadow-md hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                    <span>Pesan Langsung via WhatsApp</span>
                </a>
            </div>

        </div>

    </div>

    <!-- Related Menu Section -->
    <?php if (!empty($related)) : ?>
        <div class="mt-16 pt-12 border-t border-slate-200 dark:border-cyan-500/15">
            <h3 class="text-2xl font-bold text-slate-900 dark:text-white font-serif mb-6">Menu Pilihan Lainnya</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($related as $rel) : ?>
                    <a href="<?= base_url('makanan/detail/' . $rel['id']) ?>" 
                       class="group bg-white dark:bg-[#07192C]/80 border border-slate-200 dark:border-cyan-500/20 hover:border-cyan-500 dark:hover:border-brand-cyan rounded-2xl p-4 transition-all hover:-translate-y-1 block shadow-sm dark:shadow-none">
                        <div class="text-xs text-cyan-600 dark:text-brand-cyan font-bold mb-1"><?= esc($rel['kategori']) ?></div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-brand-cyan transition-colors line-clamp-1 mb-2">
                            <?= esc($rel['nama']) ?>
                        </h4>
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-extrabold text-cyan-700 dark:text-cyan-300">Rp <?= number_format($rel['harga'], 0, ',', '.') ?></span>
                            <span class="text-amber-500 dark:text-amber-400 font-bold"><i class="fa-solid fa-star text-[10px]"></i> <?= number_format($rel['rating'], 1) ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
