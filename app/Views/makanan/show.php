<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Top Navigation Breadcrumb & Back -->
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <a href="<?= base_url('makanan') ?>" 
           class="inline-flex items-center gap-2 text-xs font-bold text-culinary-navy dark:text-culinary-cyan hover:underline transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Hidangan</span>
        </a>

        <!-- Admin Quick Actions & Share -->
        <div class="flex items-center gap-2">
            <button type="button" 
                    onclick="copyMenuLink()" 
                    title="Bagikan Tautan Menu"
                    class="px-3.5 py-2 rounded-xl bg-white hover:bg-stone-100 dark:bg-stone-800 dark:hover:bg-stone-700 border border-stone-200 dark:border-stone-700 text-stone-700 dark:text-stone-200 text-xs font-bold transition-colors flex items-center gap-1.5 shadow-sm">
                <i class="fa-solid fa-share-nodes text-culinary-navy dark:text-culinary-cyan"></i>
                <span class="hidden sm:inline">Bagikan</span>
            </button>

            <a href="<?= base_url('makanan/edit/' . $item['id']) ?>" 
               class="px-3.5 py-2 rounded-xl bg-white hover:bg-stone-100 dark:bg-stone-800 dark:hover:bg-stone-700 border border-stone-200 dark:border-stone-700 text-stone-700 dark:text-stone-200 text-xs font-bold transition-colors flex items-center gap-1.5 shadow-sm">
                <i class="fa-solid fa-pen text-culinary-navy dark:text-culinary-cyan"></i>
                <span>Edit Hidangan</span>
            </a>

            <button type="button" 
                    onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc($item['nama']) ?>')" 
                    class="px-3.5 py-2 rounded-xl bg-red-50 hover:bg-red-100 dark:bg-red-950/60 dark:hover:bg-red-900 border border-red-200 dark:border-red-900 text-red-600 text-xs font-bold transition-colors flex items-center gap-1.5 shadow-sm">
                <i class="fa-solid fa-trash"></i>
                <span>Hapus</span>
            </button>
        </div>
    </div>

    <!-- Product Showcase Main Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mb-16">
        
        <!-- Left: Image Section & Badges -->
        <div class="lg:col-span-6 space-y-4">
            <div class="relative rounded-3xl overflow-hidden bg-stone-900 border-2 border-stone-200 dark:border-stone-700 shadow-food group">
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
                <img id="main-product-img" 
                     src="<?= esc($imageSrc) ?>" 
                     alt="<?= esc($item['nama']) ?>" 
                     class="w-full h-[400px] sm:h-[460px] object-cover transition-transform duration-700 group-hover:scale-105 cursor-pointer"
                     onclick="openImageModal('<?= esc($imageSrc) ?>')">

                <!-- Image Overlays -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent pointer-events-none"></div>

                <!-- Top Floating Badges -->
                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-culinary-navy text-white border border-cyan-400/40 shadow-sm">
                        <?= esc($item['kategori']) ?>
                    </span>
                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-black/70 text-cyan-200 border border-white/20 shadow-sm">
                        <i class="fa-solid fa-fire text-amber-400 mr-1"></i> Asap Kayu Kesambi
                    </span>
                </div>

                <div class="absolute top-4 right-4">
                    <?php if ($item['status'] === 'tersedia') : ?>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-600 text-white shadow-sm flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                            <span>Siap Disajikan</span>
                        </span>
                    <?php else : ?>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-600 text-white shadow-sm">
                            Stok Habis
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Bottom Floating Quick Specs -->
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-xs text-white bg-black/75 p-3 rounded-2xl border border-white/15 backdrop-blur-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-lg bg-cyan-900 text-culinary-cyan flex items-center justify-center font-bold">
                            <i class="fa-solid fa-weight-scale text-xs"></i>
                        </div>
                        <div>
                            <span class="text-[10px] text-stone-300 block uppercase font-medium">Porsi Netto</span>
                            <span class="font-bold"><?= $item['berat'] ?> Gram</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-lg bg-cyan-900 text-amber-400 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-star text-xs"></i>
                        </div>
                        <div>
                            <span class="text-[10px] text-stone-300 block uppercase font-medium">Kepuasan Rasa</span>
                            <span class="font-bold"><?= number_format($item['rating'], 1) ?> / 5.0</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-lg bg-cyan-900 text-emerald-400 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-bag-shopping text-xs"></i>
                        </div>
                        <div>
                            <span class="text-[10px] text-stone-300 block uppercase font-medium">Terjual</span>
                            <span class="font-bold"><?= number_format($item['terjual']) ?> porsi</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Guarantee Badges Resto -->
            <div class="grid grid-cols-3 gap-3 text-center text-xs text-stone-700 dark:text-stone-300">
                <div class="p-3 rounded-2xl bg-white dark:bg-[#182330] border border-stone-200 dark:border-stone-700 shadow-sm">
                    <i class="fa-solid fa-certificate text-culinary-navy dark:text-culinary-cyan text-base mb-1 block"></i>
                    <span class="font-bold block text-stone-900 dark:text-white">100% Halal</span>
                    <span class="text-[10px] text-stone-500">Daging Sapi Pilihan</span>
                </div>
                <div class="p-3 rounded-2xl bg-white dark:bg-[#182330] border border-stone-200 dark:border-stone-700 shadow-sm">
                    <i class="fa-solid fa-box text-culinary-navy dark:text-culinary-cyan text-base mb-1 block"></i>
                    <span class="font-bold block text-stone-900 dark:text-white">Higienis & Bersih</span>
                    <span class="text-[10px] text-stone-500">Standar Dapur Modern</span>
                </div>
                <div class="p-3 rounded-2xl bg-white dark:bg-[#182330] border border-stone-200 dark:border-stone-700 shadow-sm">
                    <i class="fa-solid fa-truck-fast text-culinary-navy dark:text-culinary-cyan text-base mb-1 block"></i>
                    <span class="font-bold block text-stone-900 dark:text-white">Kirim Cepat</span>
                    <span class="text-[10px] text-stone-500">Paxel Frozen & Instant</span>
                </div>
            </div>
        </div>

        <!-- Right: Kalkulator Pesanan Kedai & Pilihan Sambal -->
        <div class="lg:col-span-6 bg-white dark:bg-[#182330] border-2 border-stone-200 dark:border-stone-700 rounded-3xl p-6 sm:p-8 shadow-food space-y-6">
            
            <!-- Category & Title -->
            <div>
                <span class="text-xs uppercase font-extrabold tracking-widest text-culinary-navy dark:text-culinary-cyan block mb-1">
                    Kuliner Khas Kupang, NTT &bull; <?= esc($item['kategori']) ?>
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-stone-900 dark:text-white font-serif leading-tight">
                    <?= esc($item['nama']) ?>
                </h1>
            </div>

            <!-- Price & Spice Meter -->
            <div class="flex items-center justify-between py-4 border-y border-stone-200 dark:border-stone-700">
                <div>
                    <span class="text-[11px] text-stone-500 dark:text-stone-400 uppercase tracking-widest block font-bold">Harga Porsi</span>
                    <div class="text-3xl sm:text-4xl font-black text-culinary-navy dark:text-culinary-cyan font-sans mt-0.5">
                        Rp <span id="base-price"><?= number_format($item['harga'], 0, ',', '.') ?></span>
                    </div>
                </div>

                <div class="bg-[#FAF7F2] dark:bg-[#111922] p-3 rounded-2xl border border-stone-200 dark:border-stone-700 text-right">
                    <span class="text-[11px] text-stone-500 dark:text-stone-400 block mb-1 font-bold">Level Pedas:</span>
                    <div class="flex items-center gap-1 justify-end">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <i class="fa-solid fa-pepper-hot text-sm <?= ($i <= $item['tingkat_pedas']) ? 'text-red-600' : 'text-stone-300 dark:text-stone-700' ?>"></i>
                        <?php endfor; ?>
                    </div>
                    <span class="text-xs font-bold text-red-600 block mt-0.5">Level <?= $item['tingkat_pedas'] ?></span>
                </div>
            </div>

            <!-- Ringkasan Cita Rasa -->
            <p class="text-stone-700 dark:text-stone-300 text-sm leading-relaxed font-body">
                <?= esc($item['deskripsi']) ?>
            </p>

            <!-- Kalkulator Pemesanan Porsi & Pendamping Makanan -->
            <div class="bg-[#FAF7F2] dark:bg-[#111922] rounded-2xl p-5 border border-stone-200 dark:border-stone-700 space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-stone-800 dark:text-stone-200 flex items-center gap-1.5">
                        <i class="fa-solid fa-clipboard-list text-culinary-navy dark:text-culinary-cyan"></i>
                        <span>Pilihan Porsi & Pendamping Makanan</span>
                    </h3>
                    <span class="text-[11px] font-bold text-culinary-navy dark:text-culinary-cyan">Hitung Total Otomatis</span>
                </div>

                <!-- Customizer: Jumlah Porsi -->
                <div class="flex items-center justify-between">
                    <label class="text-xs font-bold text-stone-700 dark:text-stone-300">
                        Jumlah Porsi:
                    </label>
                    <div class="flex items-center gap-3">
                        <button type="button" 
                                onclick="changeQuantity(-1)"
                                class="w-8 h-8 rounded-lg bg-white dark:bg-stone-800 border border-stone-300 dark:border-stone-600 text-stone-700 dark:text-white flex items-center justify-center font-bold hover:bg-stone-200 transition-colors">
                            <i class="fa-solid fa-minus text-xs"></i>
                        </button>
                        <span id="qty-display" class="font-mono text-base font-extrabold text-stone-900 dark:text-white w-8 text-center">1</span>
                        <button type="button" 
                                onclick="changeQuantity(1)"
                                class="w-8 h-8 rounded-lg bg-white dark:bg-stone-800 border border-stone-300 dark:border-stone-600 text-stone-700 dark:text-white flex items-center justify-center font-bold hover:bg-stone-200 transition-colors">
                            <i class="fa-solid fa-plus text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Customizer: Pilihan Sambal Tradisional -->
                <div>
                    <label class="block text-xs font-bold text-stone-700 dark:text-stone-300 mb-1.5">
                        Pilihan Sambal Khas:
                    </label>
                    <select id="extra-sambal" 
                            onchange="calculateTotal()"
                            class="w-full bg-white dark:bg-[#182330] border border-stone-300 dark:border-stone-600 rounded-xl px-3 py-2 text-xs text-stone-900 dark:text-white focus:outline-none focus:border-culinary-navy">
                        <option value="Sambal Lu'at Khas Kupang NTT (Default)" data-price="0">Sambal Lu'at Kupang (Asli Pedas Asam Jeruk) - Sudah Termasuk</option>
                        <option value="Sambal Matah Kecombrang (+Rp 5.000)" data-price="5000">Tambah Sambal Matah Kecombrang (+Rp 5.000)</option>
                        <option value="Sambal Rica Membara (+Rp 5.000)" data-price="5000">Tambah Sambal Rica Rawit Pedas (+Rp 5.000)</option>
                        <option value="Mix 2 Sambal: Lu'at + Matah (+Rp 8.000)" data-price="8000">Paket 2 Sambal: Lu'at + Matah (+Rp 8.000)</option>
                    </select>
                </div>

                <!-- Customizer: Pilihan Nasi / Sayur Rumpu Rampe -->
                <div>
                    <label class="block text-xs font-bold text-stone-700 dark:text-stone-300 mb-1.5">
                        Pilihan Nasi & Sayur:
                    </label>
                    <select id="extra-karbo" 
                            onchange="calculateTotal()"
                            class="w-full bg-white dark:bg-[#182330] border border-stone-300 dark:border-stone-600 rounded-xl px-3 py-2 text-xs text-stone-900 dark:text-white focus:outline-none focus:border-culinary-navy">
                        <option value="Tanpa Tambahan Nasi" data-price="0">Hanya Daging Saja (Tanpa Nasi)</option>
                        <option value="Nasi Jagung Khas Timor (+Rp 8.000)" data-price="8000">Nasi Jagung Pulen Tradisional Timor (+Rp 8.000)</option>
                        <option value="Nasi Putih Wangi (+Rp 5.000)" data-price="5000">Nasi Putih Hangat (+Rp 5.000)</option>
                        <option value="Paket Lengkap: Nasi Jagung + Sayur Rumpu Rampe (+Rp 15.000)" data-price="15000">Komplit Adat Timor: Nasi Jagung + Rumpu Rampe (+Rp 15.000)</option>
                    </select>
                </div>

                <!-- Estimasi Pengiriman / Ongkir -->
                <div class="pt-2 border-t border-stone-200 dark:border-stone-700">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-xs font-bold text-stone-700 dark:text-stone-300">
                            <i class="fa-solid fa-location-dot text-culinary-navy dark:text-culinary-cyan mr-1"></i> Kota / Wilayah Pengiriman:
                        </label>
                        <span id="shipping-label" class="text-[11px] font-bold text-culinary-navy dark:text-culinary-cyan">Rp 15.000</span>
                    </div>
                    <select id="shipping-dest" 
                            onchange="calculateTotal()"
                            class="w-full bg-white dark:bg-[#182330] border border-stone-300 dark:border-stone-600 rounded-xl px-3 py-2 text-xs text-stone-900 dark:text-white focus:outline-none focus:border-culinary-navy">
                        <option value="Jabodetabek (Instant / Sameday)" data-shipping="15000">Jabodetabek - Kurir Instant / Sameday (Rp 15.000)</option>
                        <option value="Jawa Barat & Banten" data-shipping="20000">Jawa Barat & Banten (Rp 20.000)</option>
                        <option value="Jawa Tengah & Yogyakarta" data-shipping="22000">Jawa Tengah & DI Yogyakarta (Rp 22.000)</option>
                        <option value="Jawa Timur (Surabaya, Malang, dll)" data-shipping="25000">Jawa Timur (Surabaya, Malang, dll) (Rp 25.000)</option>
                        <option value="Bali & Kupang / Nusa Tenggara Timur" data-shipping="30000">Bali & Kupang / NTT (Rp 30.000)</option>
                        <option value="Luar Pulau (Sumatra, Kalimantan, Sulawesi)" data-shipping="38000">Luar Pulau (Sumatra, Kalimantan, Sulawesi) (Rp 38.000)</option>
                    </select>
                </div>

                <!-- Total Kalkulasi -->
                <div class="flex items-center justify-between pt-3 border-t border-stone-200 dark:border-stone-700">
                    <span class="text-xs font-bold uppercase tracking-wider text-stone-700 dark:text-stone-300">Total Perkiraan Bayar:</span>
                    <div class="text-2xl font-black text-culinary-navy dark:text-culinary-cyan font-sans">
                        Rp <span id="grand-total"><?= number_format($item['harga'] + 15000, 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>

            <!-- Tombol Pesan via WhatsApp -->
            <div class="space-y-3 pt-2">
                <button type="button" 
                        onclick="sendWhatsAppOrder()"
                        class="w-full py-4 rounded-2xl bg-emerald-700 hover:bg-emerald-800 text-white font-extrabold text-sm shadow-sm transition-all duration-200 flex items-center justify-center gap-2">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                    <span>Pesan Langsung via WhatsApp ke Kedai prakoso</span>
                </button>

                <p class="text-[11px] text-center text-stone-500 dark:text-stone-400">
                    <i class="fa-solid fa-check text-emerald-600 mr-1"></i> Pesanan dikonfirmasi langsung oleh kasir / admin kedai.
                </p>
            </div>

        </div>

    </div>

    <!-- Tab Pengetahuan Rasa, Rempah NTT & Cara Hangatkan -->
    <div class="bg-white dark:bg-[#182330] border-2 border-stone-200 dark:border-stone-700 rounded-3xl p-6 sm:p-10 shadow-food mb-16">
        
        <!-- Tab Navigation Buttons -->
        <div class="flex flex-wrap gap-2 border-b border-stone-200 dark:border-stone-700 pb-4 mb-8">
            <button type="button" 
                    id="tab-btn-1" 
                    onclick="switchTab(1)" 
                    class="tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-culinary-navy text-white shadow-sm transition-all flex items-center gap-2">
                <i class="fa-solid fa-fire text-culinary-cyan"></i>
                <span>Keunikan Asap Kesambi</span>
            </button>
            <button type="button" 
                    id="tab-btn-2" 
                    onclick="switchTab(2)" 
                    class="tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-stone-100 dark:bg-stone-800 text-stone-700 dark:text-stone-300 hover:bg-stone-200 transition-all flex items-center gap-2">
                <i class="fa-solid fa-mortar-pestle"></i>
                <span>Rempah Tradisional NTT</span>
            </button>
            <button type="button" 
                    id="tab-btn-3" 
                    onclick="switchTab(3)" 
                    class="tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-stone-100 dark:bg-stone-800 text-stone-700 dark:text-stone-300 hover:bg-stone-200 transition-all flex items-center gap-2">
                <i class="fa-solid fa-kitchen-set"></i>
                <span>Cara Memanaskan (Reheat)</span>
            </button>
            <button type="button" 
                    id="tab-btn-4" 
                    onclick="switchTab(4)" 
                    class="tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-stone-100 dark:bg-stone-800 text-stone-700 dark:text-stone-300 hover:bg-stone-200 transition-all flex items-center gap-2">
                <i class="fa-solid fa-comments"></i>
                <span>Ulasan Penikmat Se'i</span>
            </button>
        </div>

        <!-- Tab 1: Keunikan Asap Kesambi -->
        <div id="tab-content-1" class="tab-pane space-y-4">
            <h3 class="text-xl font-bold text-stone-900 dark:text-white font-serif">
                Tradisi Pengasapan Daun & Kayu Kesambi Pulau Timor
            </h3>
            <p class="text-sm text-stone-700 dark:text-stone-300 leading-relaxed font-body">
                "Se'i" dalam bahasa daerah Rote berarti daging yang diiris tipis memanjang. Proses pembuatannya diawali dengan marinasi garam dan bumbu, lalu digantung di atas bara kayu kesambi (*Schleichera oleosa*). Di atas tumpukan daging, diletakkan daun kesambi segar untuk memerangkap asap dan uap panas.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                <div class="p-4 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700">
                    <h4 class="font-bold text-stone-900 dark:text-white text-xs uppercase tracking-wider text-culinary-navy dark:text-culinary-cyan mb-2">
                        Warna Merah Alami (Smoke Ring)
                    </h4>
                    <p class="text-xs text-stone-600 dark:text-stone-300 leading-relaxed">
                        Reaksi asap kesambi alami menciptakan lingkar merah cerah pada daging tanpa bahan kimia pewarna buatan.
                    </p>
                </div>
                <div class="p-4 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700">
                    <h4 class="font-bold text-stone-900 dark:text-white text-xs uppercase tracking-wider text-culinary-navy dark:text-culinary-cyan mb-2">
                        Bebas Rasa Jelaga Pahit
                    </h4>
                    <p class="text-xs text-stone-600 dark:text-stone-300 leading-relaxed">
                        Kandungan getah kesambi sangat bersih, memberikan aroma wangi yang lembut dan gurih alami yang disukai semua usia.
                    </p>
                </div>
            </div>
        </div>

        <!-- Tab 2: Rempah Tradisional NTT -->
        <div id="tab-content-2" class="tab-pane hidden space-y-4">
            <h3 class="text-xl font-bold text-stone-900 dark:text-white font-serif">
                Kandungan Bumbu & Rempah Khas Nusa Tenggara Timur
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 pt-2">
                <div class="p-4 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700">
                    <span class="text-xs font-bold text-culinary-navy dark:text-culinary-cyan block mb-1">Daging Sapi Lokal Segar</span>
                    <p class="text-xs text-stone-600 dark:text-stone-300">Dipilih dari bagian paha atau brisket yang kenyal dan empuk saat diasap.</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700">
                    <span class="text-xs font-bold text-culinary-navy dark:text-culinary-cyan block mb-1">Daun Sapan (*Zanthoxylum*)</span>
                    <p class="text-xs text-stone-600 dark:text-stone-300">Daun bumbu khas Timor yang memberi aroma jeruk purut hutan pada Sambal Lu'at.</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700">
                    <span class="text-xs font-bold text-culinary-navy dark:text-culinary-cyan block mb-1">Garam Pesisir Pulau Rote</span>
                    <p class="text-xs text-stone-600 dark:text-stone-300">Garam kristal murni dari laut NTT untuk marinasi gurih meresap sampai ke serat terdalam.</p>
                </div>
            </div>
        </div>

        <!-- Tab 3: Cara Memanaskan (Reheat) -->
        <div id="tab-content-3" class="tab-pane hidden space-y-4">
            <h3 class="text-xl font-bold text-stone-900 dark:text-white font-serif">
                Cara Menghangatkan Daging Se'i di Rumah
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                <div class="p-4 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700 text-xs text-stone-700 dark:text-stone-300 space-y-2">
                    <div class="w-8 h-8 rounded-lg bg-orange-100 text-orange-800 flex items-center justify-center font-bold text-sm">1</div>
                    <h5 class="font-bold text-stone-900 dark:text-white">Wajan Teflon (Paling Enak)</h5>
                    <p>Panaskan teflon dengan api kecil tanpa minyak. Panggang daging se'i selama 2-3 menit sampai hangat dan lemaknya kembali berkilau gurih.</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700 text-xs text-stone-700 dark:text-stone-300 space-y-2">
                    <div class="w-8 h-8 rounded-lg bg-orange-100 text-orange-800 flex items-center justify-center font-bold text-sm">2</div>
                    <h5 class="font-bold text-stone-900 dark:text-white">Air Fryer</h5>
                    <p>Atur suhu pada 160&deg;C selama 3 menit. Pinggiran daging akan renyah tipis dengan aroma harum kesambi yang semerbak.</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700 text-xs text-stone-700 dark:text-stone-300 space-y-2">
                    <div class="w-8 h-8 rounded-lg bg-orange-100 text-orange-800 flex items-center justify-center font-bold text-sm">3</div>
                    <h5 class="font-bold text-stone-900 dark:text-white">Microwave</h5>
                    <p>Tutup wadah dengan rapat, panaskan dengan panas sedang selama 45 detik saja agar sari daging tetap juicy.</p>
                </div>
            </div>
        </div>

        <!-- Tab 4: Ulasan Penikmat Se'i -->
        <div id="tab-content-4" class="tab-pane hidden space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-stone-200 dark:border-stone-700">
                <div>
                    <h3 class="text-xl font-bold text-stone-900 dark:text-white font-serif">Kesan Penikmat Daging Se'i prakoso</h3>
                    <p class="text-xs text-stone-500">Testimoni pelanggan yang telah memesan hidangan khas NTT kami.</p>
                </div>
                <button type="button" 
                        onclick="openReviewModal()"
                        class="px-4 py-2 rounded-xl bg-culinary-navy text-white font-bold text-xs hover:bg-culinary-navy-dark transition-colors flex items-center gap-1.5 self-start sm:self-auto">
                    <i class="fa-solid fa-pen text-culinary-cyan"></i>
                    <span>Tulis Ulasan Makanan</span>
                </button>
            </div>

            <!-- Ulasan Kartu -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-5 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700 space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-culinary-navy text-white font-bold flex items-center justify-center text-xs">BP</div>
                            <div>
                                <span class="font-bold text-stone-900 dark:text-white text-xs block">Budi Prasetyo</span>
                                <span class="text-[10px] text-stone-500">Pelanggan Setia &bull; Jakarta</span>
                            </div>
                        </div>
                        <div class="text-amber-500 text-xs">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <p class="text-xs text-stone-700 dark:text-stone-300 leading-relaxed font-body">
                        "Aroma asap kesambinya benar-benar berasa dan beda dari daging panggang biasa. Sambal lu'atnya nendang banget pedas asamnya!"
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-[#FAF7F2] dark:bg-[#111922] border border-stone-200 dark:border-stone-700 space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-teal-800 text-white font-bold flex items-center justify-center text-xs">SR</div>
                            <div>
                                <span class="font-bold text-stone-900 dark:text-white text-xs block">Siti Rahmawati</span>
                                <span class="text-[10px] text-stone-500">Pesan Frozen Pack &bull; Surabaya</span>
                            </div>
                        </div>
                        <div class="text-amber-500 text-xs">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <p class="text-xs text-stone-700 dark:text-stone-300 leading-relaxed font-body">
                        "Kemasan frozen 250gr sampai dalam kondisi dingin dan rapi. Dihangatkan di wajan sebentar wanginya langsung semerbak satu rumah."
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Rekomendasi Menu Pilihan Lainnya -->
    <?php if (!empty($related)) : ?>
        <div class="border-t border-stone-200 dark:border-stone-700 pt-12">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs uppercase font-extrabold tracking-widest text-culinary-navy dark:text-culinary-cyan">Menu Lainnya</span>
                    <h3 class="text-2xl font-bold text-stone-900 dark:text-white font-serif mt-1">Hidangan Pendamping Se'i Sapi</h3>
                </div>
                <a href="<?= base_url('makanan') ?>" class="text-xs font-bold text-culinary-navy dark:text-culinary-cyan hover:underline flex items-center gap-1">
                    <span>Lihat Seluruh Menu</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($related as $rel) : ?>
                    <a href="<?= base_url('makanan/detail/' . $rel['id']) ?>" 
                       class="group bg-white dark:bg-[#182330] border-2 border-stone-200 dark:border-stone-700 hover:border-culinary-navy dark:hover:border-culinary-cyan rounded-3xl p-4 transition-all duration-200 block shadow-food">
                        
                        <!-- Related Thumbnail -->
                        <div class="relative h-40 rounded-2xl overflow-hidden mb-3 bg-stone-900">
                            <?php 
                                $rSrc = '';
                                if (!empty($rel['gambar'])) {
                                    if (strpos($rel['gambar'], 'http') === 0) {
                                        $rSrc = $rel['gambar'];
                                    } elseif (file_exists(ROOTPATH . 'public/uploads/makanan/' . $rel['gambar'])) {
                                        $rSrc = base_url('uploads/makanan/' . $rel['gambar']);
                                    } else {
                                        $rSrc = base_url('uploads/makanan/sei-luat.jpg');
                                    }
                                } else {
                                    $rSrc = base_url('uploads/makanan/sei-luat.jpg');
                                }
                            ?>
                            <img src="<?= esc($rSrc) ?>" alt="<?= esc($rel['nama']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute top-2 right-2 bg-black/70 text-amber-400 px-2 py-0.5 rounded-lg text-[10px] font-bold">
                                <i class="fa-solid fa-star text-[9px]"></i> <?= number_format($rel['rating'], 1) ?>
                            </div>
                        </div>

                        <div class="text-[11px] text-culinary-navy dark:text-culinary-cyan font-bold mb-1"><?= esc($rel['kategori']) ?></div>
                        <h4 class="text-sm font-bold text-stone-900 dark:text-white group-hover:text-culinary-navy dark:group-hover:text-culinary-cyan transition-colors line-clamp-1 mb-2 font-serif">
                            <?= esc($rel['nama']) ?>
                        </h4>
                        <div class="flex items-center justify-between text-xs pt-1 border-t border-stone-100 dark:border-stone-800">
                            <span class="font-black text-culinary-navy dark:text-culinary-cyan">Rp <?= number_format($rel['harga'], 0, ',', '.') ?></span>
                            <span class="text-stone-400 text-[11px]"><?= $rel['berat'] ?>g</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

</div>

<!-- Modal Foto Hidangan Fullscreen -->
<div id="image-modal" 
     class="fixed inset-0 z-50 bg-black/90 hidden items-center justify-center p-4"
     onclick="closeImageModal()">
    <div class="relative max-w-4xl max-h-[90vh]" onclick="event.stopPropagation()">
        <img id="modal-img" src="" alt="Foto Hidangan Se'i Sapi" class="w-full h-full object-contain rounded-2xl border-2 border-stone-600 shadow-2xl">
        <button type="button" 
                onclick="closeImageModal()" 
                class="absolute -top-4 -right-4 w-10 h-10 rounded-full bg-culinary-navy text-white font-bold flex items-center justify-center shadow-lg hover:scale-105 transition-transform border border-culinary-cyan">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
    </div>
</div>

<script>
    const itemPrice = <?= (float)$item['harga'] ?>;
    const itemName  = "<?= esc($item['nama']) ?>";
    let quantity    = 1;

    // Customizer Quantity Changer
    function changeQuantity(delta) {
        quantity += delta;
        if (quantity < 1) quantity = 1;
        if (quantity > 50) quantity = 50;
        document.getElementById('qty-display').innerText = quantity;
        calculateTotal();
    }

    // Dynamic Live Calculator for Total Price
    function calculateTotal() {
        const extraSambalSelect = document.getElementById('extra-sambal');
        const extraKarboSelect  = document.getElementById('extra-karbo');
        const shippingSelect    = document.getElementById('shipping-dest');

        const extraSambalPrice = parseInt(extraSambalSelect.options[extraSambalSelect.selectedIndex].getAttribute('data-price') || 0);
        const extraKarboPrice  = parseInt(extraKarboSelect.options[extraKarboSelect.selectedIndex].getAttribute('data-price') || 0);
        const shippingCost     = parseInt(shippingSelect.options[shippingSelect.selectedIndex].getAttribute('data-shipping') || 0);

        // Update shipping label
        document.getElementById('shipping-label').innerText = 'Rp ' + shippingCost.toLocaleString('id-ID');

        const totalProduct = (itemPrice + extraSambalPrice + extraKarboPrice) * quantity;
        const grandTotal   = totalProduct + shippingCost;

        document.getElementById('grand-total').innerText = grandTotal.toLocaleString('id-ID');
    }

    // Send WhatsApp Order with Formatted Template
    function sendWhatsAppOrder() {
        const extraSambal = document.getElementById('extra-sambal').value;
        const extraKarbo  = document.getElementById('extra-karbo').value;
        const shipping    = document.getElementById('shipping-dest').value;
        const grandTotal  = document.getElementById('grand-total').innerText;

        const message = 
            `Halo Kedai prakoso! 🥩✨\n` +
            `Saya ingin memesan hidangan Se'i Sapi khas NTT:\n\n` +
            `📌 Menu: *${itemName}*\n` +
            `🔢 Jumlah Porsi: *${quantity} porsi*\n` +
            `🌶️ Sambal: *${extraSambal}*\n` +
            `🍚 Nasi & Sayur: *${extraKarbo}*\n` +
            `📍 Kota Tujuan Kirim: *${shipping}*\n` +
            `💰 Total Estimasi Bayar: *Rp ${grandTotal}*\n\n` +
            `Mohon info ketersediaan stok dan cara pembayarannya. Terima kasih! 🙏`;

        const waUrl = `https://wa.me/6281234567890?text=${encodeURIComponent(message)}`;
        window.open(waUrl, '_blank');
    }

    // Tab Switching
    function switchTab(tabIndex) {
        for (let i = 1; i <= 4; i++) {
            const btn = document.getElementById(`tab-btn-${i}`);
            const pane = document.getElementById(`tab-content-${i}`);
            
            if (i === tabIndex) {
                btn.className = "tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-culinary-navy text-white shadow-sm transition-all flex items-center gap-2";
                pane.classList.remove('hidden');
            } else {
                btn.className = "tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-stone-100 dark:bg-stone-800 text-stone-700 dark:text-stone-300 hover:bg-stone-200 transition-all flex items-center gap-2";
                pane.classList.add('hidden');
            }
        }
    }

    // Copy Link with Toast
    function copyMenuLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const isDark = document.documentElement.classList.contains('dark');
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Tautan hidangan disalin!',
                showConfirmButton: false,
                timer: 2000,
                background: isDark ? '#14202B' : '#FFFFFF',
                color: isDark ? '#22D3EE' : '#1c1917'
            });
        });
    }

    // Fullscreen Modal for Image Preview
    function openImageModal(src) {
        document.getElementById('modal-img').src = src;
        const modal = document.getElementById('image-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeImageModal() {
        const modal = document.getElementById('image-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Review Modal
    function openReviewModal() {
        const isDark = document.documentElement.classList.contains('dark');
        Swal.fire({
            title: 'Tulis Ulasan Menu',
            html: `
                <div class="space-y-3 text-left">
                    <label class="block text-xs font-bold text-stone-700 dark:text-stone-300">Nama Anda:</label>
                    <input id="swal-name" class="w-full bg-stone-50 dark:bg-stone-800 border border-stone-300 dark:border-stone-700 rounded-xl px-3 py-2 text-xs" placeholder="Contoh: Rian Kupang">
                    
                    <label class="block text-xs font-bold text-stone-700 dark:text-stone-300 mt-2">Nilai Rasa (1-5 Bintang):</label>
                    <select id="swal-rating" class="w-full bg-stone-50 dark:bg-stone-800 border border-stone-300 dark:border-stone-700 rounded-xl px-3 py-2 text-xs">
                        <option value="5">⭐⭐⭐⭐⭐ 5 - Sangat Enak, Asap Kesambinya Terasa!</option>
                        <option value="4">⭐⭐⭐⭐ 4 - Enak & Sambalnya Segar</option>
                        <option value="3">⭐⭐⭐ 3 - Cukup Enak</option>
                    </select>

                    <label class="block text-xs font-bold text-stone-700 dark:text-stone-300 mt-2">Komentar Rasa:</label>
                    <textarea id="swal-review" rows="3" class="w-full bg-stone-50 dark:bg-stone-800 border border-stone-300 dark:border-stone-700 rounded-xl p-3 text-xs" placeholder="Ceritakan sensasi daging se'i dan sambal favorit Anda..."></textarea>
                </div>
            `,
            background: isDark ? '#14202B' : '#FFFFFF',
            color: isDark ? '#f8fafc' : '#1c1917',
            showCancelButton: true,
            confirmButtonColor: '#0C4A6E',
            cancelButtonColor: '#78716c',
            confirmButtonText: 'Kirim Ulasan',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                const name = document.getElementById('swal-name').value;
                const review = document.getElementById('swal-review').value;
                if (!name || !review) {
                    Swal.showValidationMessage('Nama dan komentar wajib diisi!');
                    return false;
                }
                return { name, review };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Terima Kasih!',
                    text: 'Ulasan Anda berhasil dikirim ke kedai kami.',
                    confirmButtonColor: '#0C4A6E',
                    background: isDark ? '#14202B' : '#FFFFFF',
                    color: isDark ? '#f8fafc' : '#1c1917',
                });
            }
        });
    }
</script>

<?= $this->endSection() ?>
