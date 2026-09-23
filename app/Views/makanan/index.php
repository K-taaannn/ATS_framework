<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section: Hangat, Otentik, Khas Kuliner Nusa Tenggara Timur -->
<section class="relative bg-gradient-to-b from-[#F5EFE6] via-[#FAF7F2] to-[#FAF7F2] dark:from-[#131D27] dark:via-[#111922] dark:to-[#111922] py-14 md:py-20 border-b border-stone-200 dark:border-stone-800 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero: Narasi Kuliner Tradisional -->
            <div class="lg:col-span-7 space-y-6">
                
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-culinary-navy text-white text-xs font-bold shadow-sm">
                    <i class="fa-solid fa-fire-burner text-culinary-cyan"></i>
                    <span>Tradisi Kuliner Asli Kupang, Nusa Tenggara Timur</span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-stone-900 dark:text-white tracking-tight leading-[1.18] font-serif">
                    Nikmati Kelezatan Daging Asap <br>
                    <span class="text-culinary-navy dark:text-culinary-cyan underline decoration-culinary-cyan decoration-wavy decoration-2">
                        Se'i Sapi prakoso
                    </span>
                </h1>

                <p class="text-stone-700 dark:text-stone-300 text-base md:text-lg leading-relaxed font-body">
                    Daging sapi segar berkualitas yang diiris tipis memanjang, dibumbui rempah warisan, lalu diasap perlahan di atas bara kayu dan dedaunan <strong class="text-culinary-navy dark:text-culinary-cyan font-bold">kesambi</strong> asli Pulau Timor. Menghasilkan aroma asap harum yang meresap sempurna, tekstur daging empuk nan gurih, disajikan dengan pedas asam segarnya <strong class="text-culinary-navy dark:text-culinary-cyan font-bold">Sambal Lu'at</strong>.
                </p>

                <!-- Keunggulan Cita Rasa Khas Daerah -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                    <div class="bg-white dark:bg-[#182330] p-4 rounded-2xl border border-stone-200 dark:border-stone-700 shadow-sm flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-700 flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-tree"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs text-stone-900 dark:text-white">Asap Kayu Kesambi</h4>
                            <p class="text-[11px] text-stone-500 dark:text-stone-400 mt-0.5">Wangi khas dan bebas rasa pahit jelaga.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-[#182330] p-4 rounded-2xl border border-stone-200 dark:border-stone-700 shadow-sm flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-red-100 text-red-700 flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-pepper-hot"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs text-stone-900 dark:text-white">Sambal Lu'at Kupang</h4>
                            <p class="text-[11px] text-stone-500 dark:text-stone-400 mt-0.5">Pedas segar fermentasi jeruk & daun sapan.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-[#182330] p-4 rounded-2xl border border-stone-200 dark:border-stone-700 shadow-sm flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-800 flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-bowl-rice"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs text-stone-900 dark:text-white">Paket Nasi Jagung</h4>
                            <p class="text-[11px] text-stone-500 dark:text-stone-400 mt-0.5">Lengkap dengan sayur bunga pepaya.</p>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi Resto -->
                <div class="flex flex-wrap items-center gap-3 pt-3">
                    <a href="#katalog-section" 
                       class="px-6 py-3.5 rounded-xl bg-culinary-navy hover:bg-culinary-navy-dark text-white font-bold text-sm shadow-sm transition-all duration-200 flex items-center gap-2">
                        <i class="fa-solid fa-utensils text-culinary-cyan"></i>
                        <span>Pilih Menu Makanan</span>
                    </a>
                    <a href="https://wa.me/6281234567890?text=Halo%20Kedai%20prakoso,%20saya%20ingin%20pesan%20Se'i%20Sapi" 
                       target="_blank"
                       class="px-6 py-3.5 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-sm shadow-sm transition-all duration-200 flex items-center gap-2">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>Pesan Cepat via WhatsApp</span>
                    </a>
                </div>

            </div>

            <!-- Right Hero: Foto Hidangan Menggugah Selera -->
            <div class="lg:col-span-5">
                <div class="bg-white dark:bg-[#182330] p-3 sm:p-4 rounded-3xl border-2 border-stone-200 dark:border-stone-700 shadow-food">
                    <div class="relative h-80 sm:h-96 rounded-2xl overflow-hidden bg-stone-900">
                        <img src="<?= base_url('uploads/makanan/sei-luat.jpg') ?>" 
                             alt="Hidangan Se'i Sapi Sambal Lu'at prakoso NTT" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-extrabold uppercase tracking-wide bg-culinary-navy text-culinary-cyan border border-culinary-cyan/40 shadow-sm">
                                Menu Paling Favorit
                            </span>
                        </div>

                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <span class="text-xs text-cyan-300 font-semibold uppercase tracking-wider block">Otentik Kupang, NTT</span>
                            <h3 class="text-xl font-bold font-serif">Se'i Sapi Sambal Lu'at</h3>
                            <p class="text-xs text-stone-300 mt-1">Daging sapi asap harum kesambi bertabur sambal lu'at pedas asam segar.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section Katalog Menu & Fitur Sorting Form -->
<section id="katalog-section" class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header Section Menu -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
            <div class="flex items-center gap-2 text-culinary-navy dark:text-culinary-cyan text-xs font-bold uppercase tracking-wider mb-1.5">
                <i class="fa-solid fa-book-open"></i>
                <span>Daftar Hidangan Kedai prakoso</span>
            </div>
            <h2 class="text-3xl font-extrabold text-stone-900 dark:text-white font-serif">
                Pilihan Varian <span class="text-culinary-navy dark:text-culinary-cyan">Se'i Sapi NTT</span>
            </h2>
            <p class="text-sm text-stone-600 dark:text-stone-400 mt-1">
                Gunakan formulir pencarian dan pengurutan (sorting) di bawah untuk menemukan sajian yang sesuai selera Anda.
            </p>
        </div>

        <!-- Tombol Cepat Pengurutan Resto (1-Click Sorting) -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0">
            <span class="text-xs font-bold text-stone-500 dark:text-stone-400 whitespace-nowrap mr-1">Urut Cepat:</span>
            
            <a href="<?= base_url('makanan') ?>?sort_by=terjual&sort_order=desc" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold border <?= ($sort_by === 'terjual' && $sort_order === 'desc') ? 'bg-culinary-navy text-white border-culinary-navy shadow-sm' : 'bg-white text-stone-700 border-stone-300 hover:border-culinary-navy dark:bg-stone-800 dark:text-stone-200 dark:border-stone-700' ?> transition-colors whitespace-nowrap">
                🔥 Paling Laris
            </a>
            <a href="<?= base_url('makanan') ?>?sort_by=rating&sort_order=desc" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold border <?= ($sort_by === 'rating' && $sort_order === 'desc') ? 'bg-culinary-navy text-white border-culinary-navy shadow-sm' : 'bg-white text-stone-700 border-stone-300 hover:border-culinary-navy dark:bg-stone-800 dark:text-stone-200 dark:border-stone-700' ?> transition-colors whitespace-nowrap">
                ⭐ Ulasan Tertinggi
            </a>
            <a href="<?= base_url('makanan') ?>?sort_by=harga&sort_order=asc" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold border <?= ($sort_by === 'harga' && $sort_order === 'asc') ? 'bg-culinary-navy text-white border-culinary-navy shadow-sm' : 'bg-white text-stone-700 border-stone-300 hover:border-culinary-navy dark:bg-stone-800 dark:text-stone-200 dark:border-stone-700' ?> transition-colors whitespace-nowrap">
                🏷️ Harga Termurah
            </a>
            <a href="<?= base_url('makanan') ?>?sort_by=tingkat_pedas&sort_order=desc" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold border <?= ($sort_by === 'tingkat_pedas' && $sort_order === 'desc') ? 'bg-culinary-navy text-white border-culinary-navy shadow-sm' : 'bg-white text-stone-700 border-stone-300 hover:border-culinary-navy dark:bg-stone-800 dark:text-stone-200 dark:border-stone-700' ?> transition-colors whitespace-nowrap">
                🌶️ Paling Pedas
            </a>
        </div>
    </div>

    <!-- FORM SORTING & FILTER (Didesain Bersahabat Seperti Menu Board Kedai) -->
    <div class="bg-white dark:bg-[#182330] border-2 border-stone-200 dark:border-stone-700 rounded-3xl p-6 sm:p-8 shadow-food mb-12 transition-all">
        <form action="<?= base_url('makanan') ?>" method="GET" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                
                <!-- Pencarian Nama Menu / Sambal -->
                <div class="md:col-span-4">
                    <label for="search" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                        <i class="fa-solid fa-magnifying-glass text-culinary-navy dark:text-culinary-cyan mr-1"></i> Cari Menu / Sambal
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               id="search" 
                               value="<?= esc($search) ?>" 
                               placeholder="Cth: Sambal Lu'at, Nasi Jagung, 250gr..." 
                               class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white placeholder-stone-400 focus:outline-none focus:border-culinary-navy focus:ring-1 focus:ring-culinary-navy">
                        <?php if (!empty($search)) : ?>
                            <a href="<?= base_url('makanan') ?>" class="absolute right-3 top-3.5 text-stone-400 hover:text-stone-700 dark:hover:text-white text-sm">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Filter Kategori Makanan -->
                <div class="md:col-span-3">
                    <label for="kategori" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                        <i class="fa-solid fa-tag text-culinary-navy dark:text-culinary-cyan mr-1"></i> Kategori Hidangan
                    </label>
                    <select name="kategori" 
                            id="kategori" 
                            class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white focus:outline-none focus:border-culinary-navy">
                        <option value="">-- Semua Hidangan --</option>
                        <?php foreach ($kategori_list as $kat) : ?>
                            <option value="<?= esc($kat) ?>" <?= ($kategori === $kat) ? 'selected' : '' ?>>
                                <?= esc($kat) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Sorting: Kolom Pengurutan -->
                <div class="md:col-span-3">
                    <label for="sort_by" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                        <i class="fa-solid fa-arrow-down-short-wide text-culinary-navy dark:text-culinary-cyan mr-1"></i> Urutkan Berdasarkan
                    </label>
                    <select name="sort_by" 
                            id="sort_by" 
                            class="w-full bg-[#FAF7F2] dark:bg-[#111922] border-2 border-culinary-navy/40 dark:border-culinary-cyan/50 rounded-xl px-4 py-3 text-sm text-culinary-navy dark:text-culinary-cyan font-bold focus:outline-none focus:border-culinary-navy">
                        <option value="terjual" <?= ($sort_by === 'terjual') ? 'selected' : '' ?>>🔥 Penjualan Terbanyak (Paling Laris)</option>
                        <option value="rating" <?= ($sort_by === 'rating') ? 'selected' : '' ?>>⭐ Ulasan & Kepuasan Tertinggi</option>
                        <option value="harga" <?= ($sort_by === 'harga') ? 'selected' : '' ?>>💰 Harga Menu Makanan</option>
                        <option value="tingkat_pedas" <?= ($sort_by === 'tingkat_pedas') ? 'selected' : '' ?>>🌶️ Tingkat Kepedasan (Level 1-5)</option>
                        <option value="berat" <?= ($sort_by === 'berat') ? 'selected' : '' ?>>⚖️ Porsi / Berat Daging (Gram)</option>
                        <option value="nama" <?= ($sort_by === 'nama') ? 'selected' : '' ?>>🔤 Nama Masakan (A - Z)</option>
                        <option value="created_at" <?= ($sort_by === 'created_at') ? 'selected' : '' ?>>🕒 Menu Paling Baru Ditambahkan</option>
                    </select>
                </div>

                <!-- Sorting: Arah Urutan -->
                <div class="md:col-span-2">
                    <label for="sort_order" class="block text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300 mb-2">
                        <i class="fa-solid fa-sort text-culinary-navy dark:text-culinary-cyan mr-1"></i> Arah
                    </label>
                    <select name="sort_order" 
                            id="sort_order" 
                            class="w-full bg-[#FAF7F2] dark:bg-[#111922] border border-stone-300 dark:border-stone-600 rounded-xl px-4 py-3 text-sm text-stone-900 dark:text-white focus:outline-none focus:border-culinary-navy">
                        <option value="desc" <?= ($sort_order === 'desc') ? 'selected' : '' ?>>Besar ke Kecil / Z-A</option>
                        <option value="asc" <?= ($sort_order === 'asc') ? 'selected' : '' ?>>Kecil ke Besar / A-Z</option>
                    </select>
                </div>

            </div>

            <!-- Form Footer -->
            <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-stone-200 dark:border-stone-700">
                <div class="text-xs text-stone-600 dark:text-stone-300">
                    Menampilkan <strong class="text-stone-900 dark:text-white"><?= count($makanan) ?></strong> dari total <strong class="text-stone-900 dark:text-white"><?= $total_menu ?></strong> hidangan Se'i Sapi
                </div>

                <div class="flex items-center gap-3">
                    <?php if (!empty($search) || !empty($kategori) || $sort_by !== 'terjual' || $sort_order !== 'desc') : ?>
                        <a href="<?= base_url('makanan') ?>" 
                           class="px-4 py-2.5 rounded-xl border border-stone-300 dark:border-stone-600 text-stone-700 dark:text-stone-300 text-xs font-bold hover:bg-stone-100 transition-colors">
                            Atur Ulang (Reset)
                        </a>
                    <?php endif; ?>

                    <button type="submit" 
                            class="px-6 py-2.5 rounded-xl bg-culinary-navy hover:bg-culinary-navy-dark text-white font-bold text-xs shadow-sm transition-all flex items-center gap-2">
                        <i class="fa-solid fa-filter text-culinary-cyan"></i>
                        <span>Terapkan Urutan</span>
                    </button>
                </div>
            </div>

        </form>
    </div>

    <!-- Grid Menu Makanan Khas NTT -->
    <?php if (empty($makanan)) : ?>
        <div class="bg-white dark:bg-[#182330] border-2 border-stone-200 dark:border-stone-700 rounded-3xl p-12 text-center max-w-xl mx-auto my-12 shadow-food">
            <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-700 flex items-center justify-center text-3xl mx-auto mb-4">
                <i class="fa-solid fa-bowl-food"></i>
            </div>
            <h3 class="text-xl font-bold text-stone-900 dark:text-white font-serif mb-2">Menu Tidak Ditemukan</h3>
            <p class="text-sm text-stone-600 dark:text-stone-400 mb-6">
                Tidak ada menu yang cocok dengan kata kunci atau filter pilihan Anda.
            </p>
            <a href="<?= base_url('makanan') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-culinary-navy text-white font-bold text-xs shadow-sm">
                <span>Tampilkan Seluruh Menu</span>
            </a>
        </div>
    <?php else : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($makanan as $item) : ?>
                <div class="group bg-white dark:bg-[#182330] border-2 border-stone-200 dark:border-stone-700 hover:border-culinary-navy dark:hover:border-culinary-cyan rounded-3xl overflow-hidden shadow-food hover:shadow-food-hover transition-all duration-300 flex flex-col justify-between">
                    
                    <!-- Top Card: Foto Makanan & Badges -->
                    <div>
                        <div class="relative h-60 bg-stone-900 overflow-hidden">
                            <?php 
                                $imageSrc = '';
                                if (!empty($item['gambar'])) {
                                    if (strpos($item['gambar'], 'http') === 0) {
                                        $imageSrc = $item['gambar'];
                                    } elseif (file_exists(ROOTPATH . 'public/uploads/makanan/' . $item['gambar'])) {
                                        $imageSrc = base_url('uploads/makanan/' . $item['gambar']);
                                    } else {
                                        $imageSrc = base_url('uploads/makanan/sei-luat.jpg');
                                    }
                                } else {
                                    $imageSrc = base_url('uploads/makanan/sei-luat.jpg');
                                }
                            ?>
                            <img src="<?= esc($imageSrc) ?>" 
                                 alt="<?= esc($item['nama']) ?>" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>

                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-culinary-navy text-white border border-cyan-400/40">
                                    <?= esc($item['kategori']) ?>
                                </span>
                                <?php if ($item['status'] === 'tersedia') : ?>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-600 text-white">
                                        Siap Dipesan
                                    </span>
                                <?php else : ?>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-600 text-white">
                                        Habis
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Rating & Terjual -->
                            <div class="absolute top-3 right-3 flex items-center gap-1 px-2.5 py-1 rounded-full bg-black/70 text-amber-400 text-xs font-bold">
                                <i class="fa-solid fa-star text-[10px]"></i>
                                <span><?= number_format($item['rating'], 1) ?></span>
                                <span class="text-stone-300 text-[10px] font-normal">(<?= number_format($item['terjual']) ?> porsi)</span>
                            </div>

                            <!-- Berat Porsi -->
                            <div class="absolute bottom-3 right-3 bg-black/75 text-white px-2.5 py-1 rounded-lg text-xs font-semibold">
                                <i class="fa-solid fa-weight-hanging text-culinary-cyan mr-1"></i> <?= $item['berat'] ?>g
                            </div>
                        </div>

                        <!-- Body Card -->
                        <div class="p-6">
                            
                            <!-- Tingkat Kepedasan -->
                            <div class="flex items-center gap-1.5 mb-2.5">
                                <span class="text-xs text-stone-500 dark:text-stone-400 font-medium">Pedas:</span>
                                <div class="flex items-center gap-1">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <i class="fa-solid fa-pepper-hot text-xs <?= ($i <= $item['tingkat_pedas']) ? 'text-red-600' : 'text-stone-300 dark:text-stone-700' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-[11px] text-stone-500 font-bold ml-1">Lvl <?= $item['tingkat_pedas'] ?></span>
                            </div>

                            <!-- Nama Hidangan -->
                            <h3 class="text-xl font-bold text-stone-900 group-hover:text-culinary-navy dark:text-white dark:group-hover:text-culinary-cyan transition-colors font-serif leading-snug mb-2">
                                <a href="<?= base_url('makanan/detail/' . $item['id']) ?>">
                                    <?= esc($item['nama']) ?>
                                </a>
                            </h3>

                            <!-- Keterangan Rasa -->
                            <p class="text-stone-600 dark:text-stone-300 text-xs leading-relaxed line-clamp-2 mb-4 font-body">
                                <?= esc($item['deskripsi']) ?>
                            </p>
                        </div>
                    </div>

                    <!-- Bottom Card: Harga & Tombol Pesan -->
                    <div class="px-6 pb-6 pt-2 border-t border-stone-100 dark:border-stone-800">
                        <div class="flex items-baseline justify-between mb-4">
                            <div>
                                <span class="text-[11px] text-stone-500 dark:text-stone-400 uppercase tracking-wider block font-semibold">Harga Porsi</span>
                                <span class="text-2xl font-black text-culinary-navy dark:text-culinary-cyan font-sans">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </span>
                            </div>
                            
                            <a href="<?= base_url('makanan/detail/' . $item['id']) ?>" 
                               class="text-xs text-culinary-navy dark:text-culinary-cyan hover:underline font-bold flex items-center gap-1">
                                <span>Lihat Pilihan</span>
                                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                        </div>

                        <!-- Aksi Tombol Pesan & Admin -->
                        <div class="grid grid-cols-3 gap-2">
                            <a href="<?= base_url('makanan/detail/' . $item['id']) ?>" 
                               class="col-span-2 py-2.5 px-3 rounded-xl bg-culinary-navy hover:bg-culinary-navy-dark text-white text-xs font-bold text-center transition-colors flex items-center justify-center gap-1.5">
                                <i class="fa-solid fa-utensils text-culinary-cyan text-xs"></i>
                                <span>Pesan Menu</span>
                            </a>

                            <div class="flex gap-1.5">
                                <a href="<?= base_url('makanan/edit/' . $item['id']) ?>" 
                                   title="Ubah Hidangan"
                                   class="w-full py-2.5 rounded-xl bg-stone-100 hover:bg-stone-200 dark:bg-stone-800 dark:hover:bg-stone-700 text-stone-700 dark:text-stone-200 text-xs font-bold flex items-center justify-center transition-colors border border-stone-200 dark:border-stone-700">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <button type="button" 
                                        onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc($item['nama']) ?>')" 
                                        title="Hapus Menu"
                                        class="w-full py-2.5 rounded-xl bg-red-50 hover:bg-red-100 dark:bg-red-950/60 dark:hover:bg-red-900 text-red-600 text-xs font-bold flex items-center justify-center transition-colors border border-red-200 dark:border-red-900">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>

<!-- Section Tabel Pengelolaan Dapur / Menu Restoran -->
<section id="tabel-menu" class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-stone-200 dark:border-stone-800">
    <div class="bg-white dark:bg-[#182330] border-2 border-stone-200 dark:border-stone-700 rounded-3xl p-6 md:p-8 shadow-food">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <span class="text-xs font-bold text-culinary-navy dark:text-culinary-cyan uppercase tracking-wider block mb-1">
                    Buku Hidangan Kedai
                </span>
                <h3 class="text-xl font-bold text-stone-900 dark:text-white font-serif">Daftar Lengkap Menu Masakan</h3>
            </div>
            
            <a href="<?= base_url('makanan/create') ?>" 
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-culinary-navy text-white font-bold text-xs hover:bg-culinary-navy-dark transition-colors shadow-sm">
                <i class="fa-solid fa-plus-circle text-culinary-cyan"></i>
                <span>Tambah Hidangan Baru</span>
            </a>
        </div>

        <!-- Tabel Menu Sederhana & Jelas -->
        <div class="overflow-x-auto rounded-2xl border border-stone-200 dark:border-stone-700">
            <table class="w-full text-left text-xs text-stone-700 dark:text-stone-300">
                <thead class="bg-stone-100 dark:bg-stone-800 text-stone-800 dark:text-stone-200 uppercase font-bold tracking-wider text-[11px]">
                    <tr>
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama Hidangan</th>
                        <th class="py-3 px-4">Kategori</th>
                        <th class="py-3 px-4">Harga</th>
                        <th class="py-3 px-4">Porsi</th>
                        <th class="py-3 px-4">Pedas</th>
                        <th class="py-3 px-4">Rating</th>
                        <th class="py-3 px-4">Terjual</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200 dark:divide-stone-700 bg-white dark:bg-[#111922]">
                    <?php $no = 1; foreach ($makanan as $row) : ?>
                        <tr class="hover:bg-stone-50 dark:hover:bg-stone-800/60 transition-colors">
                            <td class="py-3.5 px-4 font-mono text-stone-500"><?= $no++ ?></td>
                            <td class="py-3.5 px-4 font-bold text-stone-900 dark:text-white">
                                <a href="<?= base_url('makanan/detail/' . $row['id']) ?>" class="hover:text-culinary-navy dark:hover:text-culinary-cyan transition-colors">
                                    <?= esc($row['nama']) ?>
                                </a>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2 py-0.5 rounded bg-stone-100 dark:bg-stone-800 border border-stone-300 dark:border-stone-700 text-stone-800 dark:text-stone-300 font-semibold">
                                    <?= esc($row['kategori']) ?>
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-bold text-culinary-navy dark:text-culinary-cyan">
                                Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                            </td>
                            <td class="py-3.5 px-4 font-medium"><?= $row['berat'] ?>g</td>
                            <td class="py-3.5 px-4">
                                <span class="text-red-600 font-bold">Lvl <?= $row['tingkat_pedas'] ?></span>
                            </td>
                            <td class="py-3.5 px-4 text-amber-600 font-bold">
                                <i class="fa-solid fa-star text-[10px]"></i> <?= number_format($row['rating'], 1) ?>
                            </td>
                            <td class="py-3.5 px-4 text-stone-800 dark:text-stone-200 font-medium">
                                <?= number_format($row['terjual']) ?> porsi
                            </td>
                            <td class="py-3.5 px-4">
                                <?php if ($row['status'] === 'tersedia') : ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300">
                                        Tersedia
                                    </span>
                                <?php else : ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-800 dark:bg-red-950 dark:text-red-300">
                                        Habis
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="<?= base_url('makanan/detail/' . $row['id']) ?>" 
                                       title="Buka Halaman Menu"
                                       class="w-7 h-7 rounded-lg bg-stone-100 dark:bg-stone-800 hover:bg-culinary-navy hover:text-white flex items-center justify-center transition-colors">
                                        <i class="fa-solid fa-eye text-xs"></i>
                                    </a>
                                    <a href="<?= base_url('makanan/edit/' . $row['id']) ?>" 
                                       title="Edit Hidangan"
                                       class="w-7 h-7 rounded-lg bg-stone-100 dark:bg-stone-800 hover:bg-culinary-navy hover:text-white flex items-center justify-center transition-colors">
                                        <i class="fa-solid fa-pen text-xs"></i>
                                    </a>
                                    <button type="button" 
                                            onclick="confirmDelete(<?= $row['id'] ?>, '<?= esc($row['nama']) ?>')" 
                                            title="Hapus Menu"
                                            class="w-7 h-7 rounded-lg bg-red-100 text-red-600 hover:bg-red-600 hover:text-white flex items-center justify-center transition-colors">
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

<!-- Section Filosofi & Tradisi Kuliner NTT (Kayu Kesambi & Sambal Lu'at) -->
<section id="filosofi" class="py-16 bg-[#F5EFE6] dark:bg-[#0c151e] border-t border-stone-200 dark:border-stone-800 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-xs uppercase font-bold tracking-widest text-culinary-navy dark:text-culinary-cyan">Warisan Kuliner Nusantara</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-stone-900 dark:text-white font-serif mt-1">
                Mengapa Se'i Sapi Begitu Disukai?
            </h2>
            <p class="text-sm text-stone-600 dark:text-stone-300 mt-3 leading-relaxed font-body">
                Keistimewaan Se'i Sapi terletak pada teknik pengasapan kuno masyarakat Nusa Tenggara Timur yang tidak dapat ditiru oleh olahan daging modern lainnya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white dark:bg-[#182330] border border-stone-200 dark:border-stone-700 rounded-3xl p-8 shadow-sm">
                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-700 flex items-center justify-center text-xl mb-5 font-bold">
                    <i class="fa-solid fa-tree"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-900 dark:text-white font-serif mb-2">Pohon Kesambi Timor</h3>
                <p class="text-xs text-stone-600 dark:text-stone-300 leading-relaxed font-body">
                    Hanya kayu pohon kesambi asli NTT yang digunakan untuk pengasapan. Kayu ini menghasilkan bara stabil beraroma harum dan dedaunan kesambi penutupnya menjaga kelembapan daging agar tetap *juicy* dan merah merona.
                </p>
            </div>

            <div class="bg-white dark:bg-[#182330] border border-stone-200 dark:border-stone-700 rounded-3xl p-8 shadow-sm">
                <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-700 flex items-center justify-center text-xl mb-5 font-bold">
                    <i class="fa-solid fa-pepper-hot"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-900 dark:text-white font-serif mb-2" id="sambal">Sambal Lu'at Khas Kupang</h3>
                <p class="text-xs text-stone-600 dark:text-stone-300 leading-relaxed font-body">
                    Sambal fermentasi alami berbahan cabai rawit pedas, perasan jeruk nipis purut khas Kupang, dan daun sapan hutan yang harum sitrus. Memberi kontras rasa asam-pedas yang memecah gurihnya lemak daging.
                </p>
            </div>

            <div class="bg-white dark:bg-[#182330] border border-stone-200 dark:border-stone-700 rounded-3xl p-8 shadow-sm">
                <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-800 flex items-center justify-center text-xl mb-5 font-bold">
                    <i class="fa-solid fa-bowl-rice"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-900 dark:text-white font-serif mb-2">Nasi Jagung & Bunga Pepaya</h3>
                <p class="text-xs text-stone-600 dark:text-stone-300 leading-relaxed font-body">
                    Masyarakat Timor menyantap se'i bersama nasi jagung pulen dan sayur *rumpu rampe* (tumisan bunga pepaya dan daun singkong) yang diolah khusus agar bebas dari rasa pahit.
                </p>
            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>
