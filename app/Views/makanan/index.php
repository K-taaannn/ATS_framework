<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section: Modern, Keren, & Fleksibel Light/Dark Mode -->
<section class="relative overflow-hidden bg-gradient-to-b from-sky-50 via-cyan-50/40 to-slate-50 dark:from-[#071B2F] dark:via-[#05111F] dark:to-[#05111F] py-16 md:py-24 border-b border-slate-200 dark:border-cyan-500/15 transition-colors">
    <!-- Decorative Ambient Glows -->
    <div class="absolute top-10 left-1/2 -translate-x-1/2 w-96 h-96 bg-cyan-400/10 dark:bg-brand-cyan/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -top-24 -left-24 w-80 h-80 bg-sky-200/40 dark:bg-brand-navy/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyan-100 dark:bg-brand-navy border border-cyan-300 dark:border-brand-cyan/40 text-cyan-900 dark:text-brand-cyan text-xs font-semibold shadow-sm dark:shadow-glow">
                    <span class="w-2 h-2 rounded-full bg-cyan-600 dark:bg-brand-cyan animate-pulse"></span>
                    <span>Warisan Kuliner Nusa Tenggara Timur</span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-[1.15] font-serif">
                    Sensasi Asap Otentik <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 via-sky-600 to-teal-600 dark:from-brand-cyan dark:via-cyan-300 dark:to-sky-400">
                        Se'i Sapi prakoso
                    </span>
                </h1>

                <p class="text-slate-600 dark:text-slate-300 text-base md:text-lg leading-relaxed max-w-2xl font-light">
                    Mengangkat kuliner legendaris Kupang, NTT ke standar gastronomi modern. Daging sapi pilihan diasap perlahan di atas bara <span class="text-cyan-700 dark:text-brand-cyan font-semibold">kayu dan daun kesambi</span> selama berjam-jam, menghasilkan aroma smoky yang khas dan tekstur juicy yang meleleh di mulut.
                </p>

                <!-- Key Highlights / Quick stats -->
                <div class="grid grid-cols-3 gap-4 pt-4 max-w-lg">
                    <div class="bg-white dark:bg-brand-navy/60 border border-slate-200 dark:border-brand-cyan/25 rounded-2xl p-4 shadow-sm dark:shadow-glow backdrop-blur-md">
                        <div class="text-2xl font-extrabold text-cyan-700 dark:text-brand-cyan"><?= $total_menu ?></div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium">Varian Menu</div>
                    </div>
                    <div class="bg-white dark:bg-brand-navy/60 border border-slate-200 dark:border-brand-cyan/25 rounded-2xl p-4 shadow-sm dark:shadow-glow backdrop-blur-md">
                        <div class="text-2xl font-extrabold text-slate-900 dark:text-white"><?= number_format($total_terjual) ?>+</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium">Porsi Terjual</div>
                    </div>
                    <div class="bg-white dark:bg-brand-navy/60 border border-slate-200 dark:border-brand-cyan/25 rounded-2xl p-4 shadow-sm dark:shadow-glow backdrop-blur-md">
                        <div class="text-2xl font-extrabold text-amber-500 dark:text-amber-400 flex items-center gap-1">
                            <span><?= $avg_rating ?></span>
                            <i class="fa-solid fa-star text-xs"></i>
                        </div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium">Rating Kepuasan</div>
                    </div>
                </div>

                <!-- Call to action -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="#katalog-section" 
                       class="px-6 py-3.5 rounded-xl bg-gradient-to-r from-brand-cyan to-cyan-400 text-brand-navy font-bold text-sm shadow-glow hover:shadow-glow-lg transition-all duration-300 flex items-center gap-2 hover:scale-105">
                        <i class="fa-solid fa-compass"></i>
                        <span>Jelajahi Menu & Sorting</span>
                    </a>
                    <a href="<?= base_url('makanan/create') ?>" 
                       class="px-6 py-3.5 rounded-xl bg-white dark:bg-[#0C4A6E]/80 hover:bg-slate-100 dark:hover:bg-[#0C4A6E] border border-slate-300 dark:border-cyan-400/40 text-slate-800 dark:text-cyan-200 font-semibold text-sm transition-all duration-300 flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-plus-circle text-cyan-600 dark:text-brand-cyan"></i>
                        <span>Tambah Varian Baru</span>
                    </a>
                </div>
            </div>

            <!-- Right Hero Card / Visual Showcase -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Glow Behind Card -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-cyan-400/20 to-sky-900/40 dark:from-brand-cyan/20 dark:to-brand-navy/60 rounded-3xl blur-2xl transform rotate-3"></div>

                    <!-- Modern Glass Container -->
                    <div class="relative bg-gradient-to-b from-[#0C4A6E] to-[#071A2E] border border-cyan-400/30 rounded-3xl p-6 shadow-2xl backdrop-blur-xl text-white">
                        <div class="flex items-center justify-between pb-4 border-b border-cyan-500/20">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-brand-cyan/20 text-brand-cyan flex items-center justify-center font-bold">
                                    <i class="fa-solid fa-award text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-white font-bold text-sm">Signature Recipe</h3>
                                    <p class="text-xs text-cyan-300">Asli Kupang, Nusa Tenggara Timur</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                Best Seller
                            </span>
                        </div>

                        <!-- Card Hero Image Representation -->
                        <div class="mt-5 relative h-56 rounded-2xl overflow-hidden bg-slate-900 border border-cyan-500/20 flex flex-col justify-end p-5">
                            <div class="absolute inset-0 bg-cover bg-center opacity-85" style="background-image: url('<?= base_url('uploads/makanan/sei-luat.jpg') ?>');"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-[#05111F] via-[#05111F]/50 to-transparent"></div>
                            
                            <div class="relative z-10 space-y-1">
                                <span class="px-2.5 py-0.5 rounded-md text-[10px] uppercase font-bold tracking-wider bg-brand-cyan text-brand-navy">
                                    Kayu Kesambi Smoke
                                </span>
                                <h4 class="text-xl font-bold text-white font-serif">Se'i Sapi Sambal Lu'at NTT</h4>
                                <p class="text-xs text-slate-300">Disajikan dengan sambal lu'at daun sapan & jeruk purut khas Timor.</p>
                            </div>
                        </div>

                        <!-- Mini Feature List -->
                        <div class="mt-5 grid grid-cols-2 gap-3 text-xs text-slate-200">
                            <div class="flex items-center gap-2 bg-[#05111F]/60 p-2.5 rounded-xl border border-cyan-500/15">
                                <i class="fa-solid fa-fire text-amber-400"></i>
                                <span>Smoky 8 Jam Tradisional</span>
                            </div>
                            <div class="flex items-center gap-2 bg-[#05111F]/60 p-2.5 rounded-xl border border-cyan-500/15">
                                <i class="fa-solid fa-pepper-hot text-red-400"></i>
                                <span>Sambal Lu'at Otentik</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section Katalog Menu & Fitur Sorting Form -->
<section id="katalog-section" class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Section Heading -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
            <div class="flex items-center gap-2 text-cyan-600 dark:text-brand-cyan text-xs font-bold uppercase tracking-wider mb-2">
                <i class="fa-solid fa-sliders"></i>
                <span>Fitur Eksplorasi Menu</span>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white font-serif">
                Daftar Menu <span class="text-cyan-600 dark:text-brand-cyan">Se'i Sapi prakoso</span>
            </h2>
            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                Gunakan form filter dan sorting di bawah ini untuk menemukan varian Se'i Sapi sesuai selera Anda.
            </p>
        </div>

        <!-- Quick 1-Click Sorting Shortcuts -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0">
            <span class="text-xs text-slate-500 dark:text-slate-400 whitespace-nowrap mr-1 font-medium">Urut Cepat:</span>
            
            <a href="<?= base_url('makanan') ?>?sort_by=terjual&sort_order=desc" 
               class="px-3 py-1.5 rounded-lg text-xs font-medium border <?= ($sort_by === 'terjual' && $sort_order === 'desc') ? 'bg-brand-cyan text-brand-navy border-brand-cyan font-bold shadow-sm dark:shadow-glow' : 'bg-white text-slate-700 border-slate-300 hover:border-cyan-500 dark:bg-brand-navy/60 dark:text-cyan-200 dark:border-cyan-500/30 dark:hover:border-brand-cyan' ?> transition-colors whitespace-nowrap">
                🔥 Terlaris
            </a>
            <a href="<?= base_url('makanan') ?>?sort_by=rating&sort_order=desc" 
               class="px-3 py-1.5 rounded-lg text-xs font-medium border <?= ($sort_by === 'rating' && $sort_order === 'desc') ? 'bg-brand-cyan text-brand-navy border-brand-cyan font-bold shadow-sm dark:shadow-glow' : 'bg-white text-slate-700 border-slate-300 hover:border-cyan-500 dark:bg-brand-navy/60 dark:text-cyan-200 dark:border-cyan-500/30 dark:hover:border-brand-cyan' ?> transition-colors whitespace-nowrap">
                ⭐ Rating Tertinggi
            </a>
            <a href="<?= base_url('makanan') ?>?sort_by=harga&sort_order=asc" 
               class="px-3 py-1.5 rounded-lg text-xs font-medium border <?= ($sort_by === 'harga' && $sort_order === 'asc') ? 'bg-brand-cyan text-brand-navy border-brand-cyan font-bold shadow-sm dark:shadow-glow' : 'bg-white text-slate-700 border-slate-300 hover:border-cyan-500 dark:bg-brand-navy/60 dark:text-cyan-200 dark:border-cyan-500/30 dark:hover:border-brand-cyan' ?> transition-colors whitespace-nowrap">
                🏷️ Termurah
            </a>
            <a href="<?= base_url('makanan') ?>?sort_by=tingkat_pedas&sort_order=desc" 
               class="px-3 py-1.5 rounded-lg text-xs font-medium border <?= ($sort_by === 'tingkat_pedas' && $sort_order === 'desc') ? 'bg-brand-cyan text-brand-navy border-brand-cyan font-bold shadow-sm dark:shadow-glow' : 'bg-white text-slate-700 border-slate-300 hover:border-cyan-500 dark:bg-brand-navy/60 dark:text-cyan-200 dark:border-cyan-500/30 dark:hover:border-brand-cyan' ?> transition-colors whitespace-nowrap">
                🌶️ Terpedas
            </a>
        </div>
    </div>

    <!-- SORTING FORM & FILTER BOX (Responsive Light & Dark Mode) -->
    <div class="bg-white dark:bg-gradient-to-r dark:from-[#0C4A6E]/80 dark:via-[#071F36]/90 dark:to-[#0C4A6E]/80 border border-slate-200 dark:border-brand-cyan/30 rounded-3xl p-6 md:p-8 shadow-card-light dark:shadow-xl mb-12 backdrop-blur-md transition-all">
        <form action="<?= base_url('makanan') ?>" method="GET" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                
                <!-- Pencarian Text -->
                <div class="md:col-span-4">
                    <label for="search" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-cyan-300 mb-2">
                        <i class="fa-solid fa-magnifying-glass mr-1"></i> Cari Menu / Rasa
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               id="search" 
                               value="<?= esc($search) ?>" 
                               placeholder="Cth: Sambal Lu'at, Kesambi, 250gr..." 
                               class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                        <?php if (!empty($search)) : ?>
                            <a href="<?= base_url('makanan') ?>" class="absolute right-3 top-3 text-slate-400 hover:text-slate-700 dark:hover:text-white text-sm">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Filter Kategori -->
                <div class="md:col-span-3">
                    <label for="kategori" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-cyan-300 mb-2">
                        <i class="fa-solid fa-tags mr-1"></i> Kategori Menu
                    </label>
                    <select name="kategori" 
                            id="kategori" 
                            class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                        <option value="">-- Semua Kategori --</option>
                        <?php foreach ($kategori_list as $kat) : ?>
                            <option value="<?= esc($kat) ?>" <?= ($kategori === $kat) ? 'selected' : '' ?>>
                                <?= esc($kat) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Sorting: Kolom / Urutkan Berdasarkan -->
                <div class="md:col-span-3">
                    <label for="sort_by" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-cyan-300 mb-2">
                        <i class="fa-solid fa-arrow-down-short-wide mr-1"></i> Urutkan Berdasarkan (Sorting)
                    </label>
                    <select name="sort_by" 
                            id="sort_by" 
                            class="w-full bg-slate-50 dark:bg-[#05111F] border border-cyan-400 dark:border-brand-cyan/50 rounded-xl px-4 py-3 text-sm text-cyan-800 dark:text-brand-cyan font-bold focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                        <option value="terjual" <?= ($sort_by === 'terjual') ? 'selected' : '' ?>>🔥 Penjualan / Terlaris</option>
                        <option value="rating" <?= ($sort_by === 'rating') ? 'selected' : '' ?>>⭐ Rating Kepuasan</option>
                        <option value="harga" <?= ($sort_by === 'harga') ? 'selected' : '' ?>>💰 Harga Produk</option>
                        <option value="tingkat_pedas" <?= ($sort_by === 'tingkat_pedas') ? 'selected' : '' ?>>🌶️ Tingkat Kepedasan</option>
                        <option value="berat" <?= ($sort_by === 'berat') ? 'selected' : '' ?>>⚖️ Porsi / Berat (Gram)</option>
                        <option value="nama" <?= ($sort_by === 'nama') ? 'selected' : '' ?>>🔤 Nama Menu (Abjad)</option>
                        <option value="created_at" <?= ($sort_by === 'created_at') ? 'selected' : '' ?>>🕒 Menu Terbaru</option>
                    </select>
                </div>

                <!-- Sorting: Urutan (Arah Asc / Desc) -->
                <div class="md:col-span-2">
                    <label for="sort_order" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-cyan-300 mb-2">
                        <i class="fa-solid fa-sort mr-1"></i> Arah Urutan
                    </label>
                    <select name="sort_order" 
                            id="sort_order" 
                            class="w-full bg-slate-50 dark:bg-[#05111F] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan focus:ring-2 focus:ring-cyan-500/20 transition-all">
                        <option value="desc" <?= ($sort_order === 'desc') ? 'selected' : '' ?>>Menurun (Z-A / Besar ke Kecil)</option>
                        <option value="asc" <?= ($sort_order === 'asc') ? 'selected' : '' ?>>Menaik (A-Z / Kecil ke Besar)</option>
                    </select>
                </div>

            </div>

            <!-- Form Actions (Submit & Reset) -->
            <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-200 dark:border-cyan-500/20">
                <div class="text-xs text-slate-600 dark:text-slate-300 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-cyan-600 dark:bg-brand-cyan"></span>
                    <span>Menampilkan <strong class="text-slate-900 dark:text-white"><?= count($makanan) ?></strong> menu dari total <strong class="text-slate-900 dark:text-white"><?= $total_menu ?></strong> produk Se'i Sapi</span>
                </div>

                <div class="flex items-center gap-3">
                    <?php if (!empty($search) || !empty($kategori) || $sort_by !== 'terjual' || $sort_order !== 'desc') : ?>
                        <a href="<?= base_url('makanan') ?>" 
                           class="px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 hover:border-slate-500 text-slate-700 dark:text-slate-300 text-xs font-semibold transition-colors">
                            <i class="fa-solid fa-rotate-left mr-1"></i> Reset Filter
                        </a>
                    <?php endif; ?>

                    <button type="submit" 
                            class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-brand-cyan to-cyan-400 text-brand-navy font-bold text-xs shadow-glow hover:shadow-glow-lg transition-all flex items-center gap-2">
                        <i class="fa-solid fa-filter"></i>
                        <span>Terapkan Sorting & Filter</span>
                    </button>
                </div>
            </div>

        </form>
    </div>

    <!-- Grid Menu Se'i Sapi (Katalog Card) -->
    <?php if (empty($makanan)) : ?>
        <div class="bg-white dark:bg-[#0C4A6E]/30 border border-slate-200 dark:border-cyan-500/20 rounded-3xl p-12 text-center max-w-xl mx-auto my-12 shadow-md">
            <div class="w-16 h-16 rounded-2xl bg-cyan-100 dark:bg-cyan-950 text-cyan-700 dark:text-brand-cyan flex items-center justify-center text-3xl mx-auto mb-4">
                <i class="fa-solid fa-utensils"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Menu Se'i Sapi Tidak Ditemukan</h3>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-6">
                Tidak ada menu yang sesuai dengan kata kunci atau filter yang Anda pilih. Silakan atur kembali sorting atau kata kunci pencarian.
            </p>
            <a href="<?= base_url('makanan') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-cyan text-brand-navy font-bold text-xs shadow-sm">
                <i class="fa-solid fa-arrow-rotate-right"></i>
                <span>Tampilkan Semua Menu</span>
            </a>
        </div>
    <?php else : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($makanan as $item) : ?>
                <div class="group bg-white dark:bg-gradient-to-b dark:from-[#0C4A6E]/50 dark:via-[#07192C]/80 dark:to-[#07192C]/90 border border-slate-200 dark:border-cyan-500/20 hover:border-cyan-400 dark:hover:border-brand-cyan/60 rounded-3xl overflow-hidden shadow-card-light dark:shadow-xl hover:shadow-xl dark:hover:shadow-glow transition-all duration-300 flex flex-col justify-between hover:-translate-y-1">
                    
                    <!-- Card Top: Image / Badge -->
                    <div>
                        <div class="relative h-56 bg-slate-900 overflow-hidden">
                            <!-- Background Image Handling -->
                            <?php 
                                $imageSrc = '';
                                if (!empty($item['gambar'])) {
                                    if (strpos($item['gambar'], 'http') === 0) {
                                        $imageSrc = $item['gambar'];
                                    } elseif (file_exists(ROOTPATH . 'public/uploads/makanan/' . $item['gambar'])) {
                                        $imageSrc = base_url('uploads/makanan/' . $item['gambar']);
                                    } else {
                                        $imageSrc = 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80';
                                    }
                                } else {
                                    $imageSrc = 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80';
                                }
                            ?>
                            <img src="<?= esc($imageSrc) ?>" 
                                 alt="<?= esc($item['nama']) ?>" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30"></div>

                            <!-- Badges on Image -->
                            <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold tracking-wider uppercase bg-[#0C4A6E]/90 text-cyan-200 border border-brand-cyan/40 backdrop-blur-md">
                                    <?= esc($item['kategori']) ?>
                                </span>
                                <?php if ($item['status'] === 'tersedia') : ?>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 backdrop-blur-md">
                                        Tersedia
                                    </span>
                                <?php else : ?>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold bg-red-500/30 text-red-300 border border-red-500/40 backdrop-blur-md">
                                        Habis
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Rating & Terjual Pill -->
                            <div class="absolute top-4 right-4 flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/60 text-amber-400 border border-amber-400/30 backdrop-blur-md text-xs font-bold">
                                <i class="fa-solid fa-star text-[10px]"></i>
                                <span><?= number_format($item['rating'], 1) ?></span>
                                <span class="text-slate-300 text-[10px] font-normal">(<?= number_format($item['terjual']) ?>)</span>
                            </div>

                            <!-- Berat Tag -->
                            <div class="absolute bottom-3 right-4 bg-black/70 text-cyan-200 border border-cyan-500/30 px-2.5 py-1 rounded-lg text-xs font-semibold backdrop-blur-md">
                                <i class="fa-solid fa-weight-hanging text-brand-cyan mr-1"></i> <?= $item['berat'] ?>g
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6">
                            
                            <!-- Level Pedas Meter -->
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">Kepedasan:</span>
                                <div class="flex items-center gap-1">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <i class="fa-solid fa-pepper-hot text-xs <?= ($i <= $item['tingkat_pedas']) ? 'text-red-500 animate-pulse' : 'text-slate-300 dark:text-slate-700' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-[11px] text-slate-500 dark:text-slate-400 ml-1">Lvl <?= $item['tingkat_pedas'] ?></span>
                            </div>

                            <!-- Nama Menu -->
                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-cyan-600 dark:text-white dark:group-hover:text-brand-cyan transition-colors font-serif leading-snug mb-2">
                                <a href="<?= base_url('makanan/detail/' . $item['id']) ?>">
                                    <?= esc($item['nama']) ?>
                                </a>
                            </h3>

                            <!-- Deskripsi -->
                            <p class="text-slate-600 dark:text-slate-300 text-xs leading-relaxed line-clamp-2 mb-4">
                                <?= esc($item['deskripsi']) ?>
                            </p>
                        </div>
                    </div>

                    <!-- Card Bottom / Pricing & Action Buttons -->
                    <div class="px-6 pb-6 pt-2 border-t border-slate-100 dark:border-cyan-500/15">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-[11px] text-slate-500 dark:text-slate-400 uppercase tracking-wider block font-medium">Harga Porsi</span>
                                <span class="text-2xl font-extrabold text-cyan-700 dark:text-brand-cyan font-sans">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </span>
                            </div>
                            
                            <a href="<?= base_url('makanan/detail/' . $item['id']) ?>" 
                               class="text-xs text-cyan-700 hover:text-cyan-900 dark:text-cyan-300 dark:hover:text-white flex items-center gap-1 font-bold group/link">
                                <span>Lihat Detail</span>
                                <i class="fa-solid fa-arrow-right text-[10px] transition-transform group-hover/link:translate-x-1"></i>
                            </a>
                        </div>

                        <!-- CRUD Action Buttons -->
                        <div class="grid grid-cols-2 gap-2">
                            <a href="<?= base_url('makanan/edit/' . $item['id']) ?>" 
                               class="py-2 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 border border-slate-300 text-slate-800 dark:bg-brand-navy dark:hover:bg-[#0e4368] dark:border-cyan-500/40 dark:text-cyan-200 text-xs font-semibold text-center transition-colors flex items-center justify-center gap-1.5 shadow-sm">
                                <i class="fa-solid fa-pen-to-square text-cyan-600 dark:text-brand-cyan"></i>
                                <span>Edit Menu</span>
                            </a>

                            <button type="button" 
                                    onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc($item['nama']) ?>')" 
                                    class="py-2 px-3 rounded-xl bg-red-50 hover:bg-red-100 border border-red-200 text-red-700 dark:bg-red-950/60 dark:hover:bg-red-900/80 dark:border-red-500/30 dark:text-red-200 text-xs font-semibold transition-colors flex items-center justify-center gap-1.5 shadow-sm">
                                <i class="fa-solid fa-trash-can text-red-500 dark:text-red-400"></i>
                                <span>Hapus</span>
                            </button>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>

<!-- Section Tabel Manajemen CRUD Data Makanan -->
<section class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-slate-200 dark:border-cyan-500/15">
    <div class="bg-white dark:bg-[#07192C]/90 border border-slate-200 dark:border-cyan-500/25 rounded-3xl p-6 md:p-8 shadow-card-light dark:shadow-2xl backdrop-blur-md">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-bold text-cyan-600 dark:text-brand-cyan uppercase tracking-wider mb-1">
                    <i class="fa-solid fa-table-list"></i>
                    <span>Tabel Database</span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white font-serif">Data Manajemen Menu Se'i Sapi</h3>
            </div>
            
            <a href="<?= base_url('makanan/create') ?>" 
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-brand-cyan text-brand-navy font-bold text-xs shadow-glow hover:bg-cyan-300 transition-colors">
                <i class="fa-solid fa-circle-plus"></i>
                <span>Tambah Menu Baru</span>
            </a>
        </div>

        <!-- Responsive Table Container -->
        <div class="overflow-x-auto rounded-2xl border border-slate-200 dark:border-cyan-500/20">
            <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                <thead class="bg-slate-100 text-slate-800 dark:bg-[#0C4A6E] dark:text-cyan-200 uppercase font-semibold tracking-wider text-[11px]">
                    <tr>
                        <th class="py-3.5 px-4">No</th>
                        <th class="py-3.5 px-4">Nama Menu</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4">Harga</th>
                        <th class="py-3.5 px-4">Berat</th>
                        <th class="py-3.5 px-4">Pedas</th>
                        <th class="py-3.5 px-4">Rating</th>
                        <th class="py-3.5 px-4">Terjual</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-cyan-500/15 bg-white dark:bg-[#05111F]/70">
                    <?php $no = 1; foreach ($makanan as $row) : ?>
                        <tr class="hover:bg-slate-50 dark:hover:bg-cyan-950/40 transition-colors">
                            <td class="py-3.5 px-4 font-mono text-slate-500 dark:text-slate-400"><?= $no++ ?></td>
                            <td class="py-3.5 px-4 font-medium text-slate-900 dark:text-white">
                                <a href="<?= base_url('makanan/detail/' . $row['id']) ?>" class="hover:text-cyan-600 dark:hover:text-brand-cyan transition-colors">
                                    <?= esc($row['nama']) ?>
                                </a>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2 py-0.5 rounded-md bg-cyan-100 text-cyan-800 dark:bg-[#0C4A6E] dark:text-cyan-200 border border-cyan-300 dark:border-brand-cyan/20 font-medium">
                                    <?= esc($row['kategori']) ?>
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-bold text-cyan-700 dark:text-brand-cyan">
                                Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                            </td>
                            <td class="py-3.5 px-4 font-medium"><?= $row['berat'] ?>g</td>
                            <td class="py-3.5 px-4">
                                <span class="text-red-500 font-bold">Lvl <?= $row['tingkat_pedas'] ?></span>
                            </td>
                            <td class="py-3.5 px-4 text-amber-500 font-bold">
                                <i class="fa-solid fa-star text-[10px]"></i> <?= number_format($row['rating'], 1) ?>
                            </td>
                            <td class="py-3.5 px-4 text-slate-700 dark:text-slate-200 font-medium">
                                <?= number_format($row['terjual']) ?>
                            </td>
                            <td class="py-3.5 px-4">
                                <?php if ($row['status'] === 'tersedia') : ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-500/20 dark:text-emerald-300">
                                        Tersedia
                                    </span>
                                <?php else : ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-100 text-red-800 dark:bg-red-500/20 dark:text-red-300">
                                        Habis
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="<?= base_url('makanan/detail/' . $row['id']) ?>" 
                                       title="Lihat Detail"
                                       class="w-7 h-7 rounded-lg bg-cyan-100 text-cyan-800 hover:bg-cyan-500 hover:text-white dark:bg-cyan-950 dark:text-brand-cyan dark:hover:bg-brand-cyan dark:hover:text-brand-navy flex items-center justify-center transition-colors">
                                        <i class="fa-solid fa-eye text-xs"></i>
                                    </a>
                                    <a href="<?= base_url('makanan/edit/' . $row['id']) ?>" 
                                       title="Edit Data"
                                       class="w-7 h-7 rounded-lg bg-slate-100 text-slate-700 hover:bg-brand-navy hover:text-white dark:bg-cyan-950 dark:text-cyan-200 dark:hover:bg-brand-navy flex items-center justify-center transition-colors">
                                        <i class="fa-solid fa-pen text-xs"></i>
                                    </a>
                                    <button type="button" 
                                            onclick="confirmDelete(<?= $row['id'] ?>, '<?= esc($row['nama']) ?>')" 
                                            title="Hapus Menu"
                                            class="w-7 h-7 rounded-lg bg-red-100 text-red-700 hover:bg-red-600 hover:text-white dark:bg-red-950/60 dark:text-red-400 flex items-center justify-center transition-colors">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</section>

<!-- Section Filosofi Tradisi NTT (Kesambi & Sambal Lu'at) -->
<section id="filosofi" class="py-16 bg-slate-100/70 dark:bg-[#040E1B] border-t border-slate-200 dark:border-cyan-500/15 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs uppercase font-bold tracking-widest text-cyan-600 dark:text-brand-cyan">Warisan Kuliner Nusa Tenggara Timur</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white font-serif mt-2">
                Mengapa Se'i Sapi <span class="text-cyan-600 dark:text-brand-cyan">prakoso</span> Begitu Istimewa?
            </h2>
            <p class="text-sm text-slate-600 dark:text-slate-300 mt-4 leading-relaxed">
                Kami mempertahankan tata cara tradisional para tetua Rote & Timor dalam mengolah daging sapi, memadukannya dengan sanitasi dapur modern standar internasional.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white dark:bg-[#07192C]/80 border border-slate-200 dark:border-cyan-500/20 rounded-3xl p-8 hover:border-cyan-400 dark:hover:border-brand-cyan shadow-sm dark:shadow-none transition-all">
                <div class="w-14 h-14 rounded-2xl bg-cyan-100 dark:bg-brand-navy text-cyan-800 dark:text-brand-cyan flex items-center justify-center text-2xl mb-6 shadow-sm dark:shadow-glow">
                    <i class="fa-solid fa-tree"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white font-serif mb-3">Kayu & Daun Kesambi</h3>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                    Pengasapan tidak memakai sembarang kayu. Hanya kayu kesambi (*Schleichera oleosa*) asli NTT yang mampu menghasilkan aroma asap khas wangi, warna merah kemilau alami, dan bebas jelaga pahit.
                </p>
            </div>

            <div class="bg-white dark:bg-[#07192C]/80 border border-slate-200 dark:border-cyan-500/20 rounded-3xl p-8 hover:border-cyan-400 dark:hover:border-brand-cyan shadow-sm dark:shadow-none transition-all">
                <div class="w-14 h-14 rounded-2xl bg-cyan-100 dark:bg-brand-navy text-cyan-800 dark:text-brand-cyan flex items-center justify-center text-2xl mb-6 shadow-sm dark:shadow-glow">
                    <i class="fa-solid fa-mortar-pestle"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white font-serif mb-3" id="sambal">Sambal Lu'at Fermentasi</h3>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                    Sambal khas Kupang dengan cabai rawit merah, perasan jeruk nipis lokal, dan daun sapan (*Zanthoxylum*) yang difermentasi khusus, memberikan sensasi asam segar, pedas pekat, dan aroma aromatik eksotis.
                </p>
            </div>

            <div class="bg-white dark:bg-[#07192C]/80 border border-slate-200 dark:border-cyan-500/20 rounded-3xl p-8 hover:border-cyan-400 dark:hover:border-brand-cyan shadow-sm dark:shadow-none transition-all">
                <div class="w-14 h-14 rounded-2xl bg-cyan-100 dark:bg-brand-navy text-cyan-800 dark:text-brand-cyan flex items-center justify-center text-2xl mb-6 shadow-sm dark:shadow-glow">
                    <i class="fa-solid fa-bowl-rice"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white font-serif mb-3">Nasi Jagung & Rumpu Rampe</h3>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                    Penyajian komplit dengan nasi jagung pulen kaya serat serta sayur rumpu rampe dari tumisan daun pepaya bunga pepaya yang diolah tanpa rasa pahit sedikit pun.
                </p>
            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>
