<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Top Navigation Breadcrumb & Back -->
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <a href="<?= base_url('makanan') ?>" 
           class="inline-flex items-center gap-2 text-xs font-bold text-cyan-600 dark:text-brand-cyan hover:underline transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Katalog Menu Se'i Sapi</span>
        </a>

        <!-- Admin Quick Actions & Share -->
        <div class="flex items-center gap-2.5">
            <button type="button" 
                    onclick="copyMenuLink()" 
                    title="Salin Link Menu"
                    class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 dark:bg-[#0C4A6E]/50 dark:hover:bg-[#0C4A6E] border border-slate-300 dark:border-cyan-500/30 text-slate-700 dark:text-cyan-200 text-xs font-semibold transition-colors flex items-center gap-1.5 shadow-sm">
                <i class="fa-solid fa-share-nodes text-cyan-600 dark:text-brand-cyan"></i>
                <span class="hidden sm:inline">Bagikan</span>
            </button>

            <a href="<?= base_url('makanan/edit/' . $item['id']) ?>" 
               class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 dark:bg-brand-navy dark:hover:bg-cyan-900 border border-slate-300 dark:border-cyan-500/40 text-slate-800 dark:text-cyan-200 text-xs font-semibold transition-colors flex items-center gap-1.5 shadow-sm">
                <i class="fa-solid fa-pen-to-square text-cyan-600 dark:text-brand-cyan"></i>
                <span>Edit</span>
            </a>

            <button type="button" 
                    onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc($item['nama']) ?>')" 
                    class="px-3.5 py-2 rounded-xl bg-red-50 hover:bg-red-100 dark:bg-red-950/60 dark:hover:bg-red-900 border border-red-200 dark:border-red-500/30 text-red-700 dark:text-red-300 text-xs font-semibold transition-colors flex items-center gap-1.5 shadow-sm">
                <i class="fa-solid fa-trash-can text-red-500 dark:text-red-400"></i>
                <span>Hapus</span>
            </button>
        </div>
    </div>

    <!-- Product Showcase Main Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mb-16">
        
        <!-- Left: Image Section & Badges -->
        <div class="lg:col-span-6 space-y-4">
            <div class="relative rounded-3xl overflow-hidden bg-slate-900 border border-slate-200 dark:border-cyan-500/30 shadow-card-light dark:shadow-glow-lg group">
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
                <img id="main-product-img" 
                     src="<?= esc($imageSrc) ?>" 
                     alt="<?= esc($item['nama']) ?>" 
                     class="w-full h-[430px] sm:h-[480px] object-cover transition-transform duration-700 group-hover:scale-105 cursor-pointer"
                     onclick="openImageModal('<?= esc($imageSrc) ?>')">

                <!-- Image Overlays -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-transparent to-black/30 pointer-events-none"></div>

                <!-- Top Floating Badges -->
                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                    <span class="px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-wider bg-brand-navy/90 text-cyan-200 border border-brand-cyan/40 backdrop-blur-md shadow-md">
                        <?= esc($item['kategori']) ?>
                    </span>
                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-[#05111F]/80 text-brand-cyan border border-brand-cyan/30 backdrop-blur-md shadow-md">
                        <i class="fa-solid fa-fire text-amber-400 mr-1"></i> Asli Asap Kesambi
                    </span>
                </div>

                <div class="absolute top-4 right-4">
                    <?php if ($item['status'] === 'tersedia') : ?>
                        <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-emerald-500/80 text-white backdrop-blur-md shadow-md flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                            <span>Ready Stock</span>
                        </span>
                    <?php else : ?>
                        <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-red-600/90 text-white backdrop-blur-md shadow-md">
                            Stok Habis
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Bottom Floating Quick Specs -->
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-xs text-slate-200 bg-[#05111F]/85 p-3.5 rounded-2xl border border-cyan-500/25 backdrop-blur-md">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-cyan-950 text-brand-cyan flex items-center justify-center font-bold">
                            <i class="fa-solid fa-weight-scale"></i>
                        </div>
                        <div>
                            <span class="text-[10px] text-slate-400 block uppercase">Berat Netto</span>
                            <span class="font-bold text-white"><?= $item['berat'] ?> Gram</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-cyan-950 text-amber-400 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div>
                            <span class="text-[10px] text-slate-400 block uppercase">Rating Pembeli</span>
                            <span class="font-bold text-white"><?= number_format($item['rating'], 1) ?> / 5.0</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-cyan-950 text-emerald-400 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <div>
                            <span class="text-[10px] text-slate-400 block uppercase">Terjual</span>
                            <span class="font-bold text-white"><?= number_format($item['terjual']) ?> porsi</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Guarantee Badges -->
            <div class="grid grid-cols-3 gap-3 text-center text-xs text-slate-600 dark:text-slate-300">
                <div class="p-3 rounded-2xl bg-white dark:bg-[#07192C] border border-slate-200 dark:border-cyan-500/20 shadow-sm">
                    <i class="fa-solid fa-shield-halved text-cyan-600 dark:text-brand-cyan text-lg mb-1 block"></i>
                    <span class="font-bold block text-slate-900 dark:text-white">100% Halal</span>
                    <span class="text-[10px] text-slate-500">Daging Sapi Pilihan</span>
                </div>
                <div class="p-3 rounded-2xl bg-white dark:bg-[#07192C] border border-slate-200 dark:border-cyan-500/20 shadow-sm">
                    <i class="fa-solid fa-temperature-arrow-down text-cyan-600 dark:text-brand-cyan text-lg mb-1 block"></i>
                    <span class="font-bold block text-slate-900 dark:text-white">Vacuum Sealed</span>
                    <span class="text-[10px] text-slate-500">Tahan Dingin 3 Bulan</span>
                </div>
                <div class="p-3 rounded-2xl bg-white dark:bg-[#07192C] border border-slate-200 dark:border-cyan-500/20 shadow-sm">
                    <i class="fa-solid fa-truck-fast text-cyan-600 dark:text-brand-cyan text-lg mb-1 block"></i>
                    <span class="font-bold block text-slate-900 dark:text-white">Kirim Nasional</span>
                    <span class="text-[10px] text-slate-500">Paxel Frozen & Instant</span>
                </div>
            </div>
        </div>

        <!-- Right: Interactive Order Calculator & Details -->
        <div class="lg:col-span-6 bg-white dark:bg-[#07192C]/90 border border-slate-200 dark:border-cyan-500/25 rounded-3xl p-6 sm:p-8 shadow-card-light dark:shadow-2xl backdrop-blur-xl space-y-6 transition-all">
            
            <!-- Category & Title -->
            <div>
                <span class="text-xs uppercase font-extrabold tracking-widest text-cyan-600 dark:text-brand-cyan block mb-1">
                    Kuliner Khas Nusa Tenggara Timur &bull; <?= esc($item['kategori']) ?>
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white font-serif leading-tight">
                    <?= esc($item['nama']) ?>
                </h1>
            </div>

            <!-- Price & Spice Meter -->
            <div class="flex items-center justify-between py-4 border-y border-slate-200 dark:border-cyan-500/20">
                <div>
                    <span class="text-[11px] text-slate-500 dark:text-slate-400 uppercase tracking-widest block font-medium">Harga Satuan</span>
                    <div class="text-3xl sm:text-4xl font-extrabold text-cyan-700 dark:text-brand-cyan font-sans mt-0.5">
                        Rp <span id="base-price"><?= number_format($item['harga'], 0, ',', '.') ?></span>
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-[#05111F] p-3 rounded-2xl border border-slate-200 dark:border-cyan-500/15 text-right">
                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block mb-1 font-medium">Level Pedas:</span>
                    <div class="flex items-center gap-1.5 justify-end">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <i class="fa-solid fa-pepper-hot text-sm <?= ($i <= $item['tingkat_pedas']) ? 'text-red-500 animate-pulse' : 'text-slate-300 dark:text-slate-700' ?>"></i>
                        <?php endfor; ?>
                    </div>
                    <span class="text-xs font-bold text-red-500 block mt-0.5">Level <?= $item['tingkat_pedas'] ?></span>
                </div>
            </div>

            <!-- Ringkasan Cita Rasa -->
            <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                <?= esc($item['deskripsi']) ?>
            </p>

            <!-- FITUR TAMBAHAN #1: Interactive Order Customizer & Live Price Calculator -->
            <div class="bg-slate-50 dark:bg-[#05111F]/90 rounded-2xl p-5 border border-slate-200 dark:border-cyan-500/20 space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-800 dark:text-cyan-300 flex items-center gap-1.5">
                        <i class="fa-solid fa-calculator text-cyan-600 dark:text-brand-cyan"></i>
                        <span>Kalkulator & Kustomisasi Pesanan</span>
                    </h3>
                    <span class="text-[10px] text-cyan-700 dark:text-brand-cyan bg-cyan-100 dark:bg-brand-navy px-2 py-0.5 rounded-md font-bold">Live Calculator</span>
                </div>

                <!-- Customizer: Jumlah Porsi -->
                <div class="flex items-center justify-between">
                    <label class="text-xs font-bold text-slate-700 dark:text-slate-300">
                        Jumlah Porsi / Bungkus:
                    </label>
                    <div class="flex items-center gap-3">
                        <button type="button" 
                                onclick="changeQuantity(-1)"
                                class="w-8 h-8 rounded-lg bg-white dark:bg-[#0C4A6E] border border-slate-300 dark:border-cyan-500/40 text-slate-700 dark:text-white flex items-center justify-center font-bold hover:bg-slate-200 dark:hover:bg-cyan-600 transition-colors">
                            <i class="fa-solid fa-minus text-xs"></i>
                        </button>
                        <span id="qty-display" class="font-mono text-base font-extrabold text-slate-900 dark:text-white w-8 text-center">1</span>
                        <button type="button" 
                                onclick="changeQuantity(1)"
                                class="w-8 h-8 rounded-lg bg-white dark:bg-[#0C4A6E] border border-slate-300 dark:border-cyan-500/40 text-slate-700 dark:text-white flex items-center justify-center font-bold hover:bg-slate-200 dark:hover:bg-cyan-600 transition-colors">
                            <i class="fa-solid fa-plus text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Customizer: Pilihan Sambal Khas NTT -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                        Pilihan Sambal Pendamping:
                    </label>
                    <select id="extra-sambal" 
                            onchange="calculateTotal()"
                            class="w-full bg-white dark:bg-[#07192C] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan">
                        <option value="Sambal Lu'at Khas Kupang NTT (Default)" data-price="0">Sambal Lu'at Kupang NTT (Otentik Asam Pedas) - Termasuk</option>
                        <option value="Sambal Matah Kecombrang (+Rp 5.000)" data-price="5000">Extra Sambal Matah Kecombrang (+Rp 5.000)</option>
                        <option value="Sambal Rica Membara (+Rp 5.000)" data-price="5000">Extra Sambal Rica Pedas Membara (+Rp 5.000)</option>
                        <option value="Mix Sambal Lu'at + Matah (+Rp 8.000)" data-price="8000">Mix 2 Sambal: Lu'at + Matah (+Rp 8.000)</option>
                    </select>
                </div>

                <!-- Customizer: Nasi Jagung / Pendamping Karbo -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                        Pilihan Karbohidrat Tradisional:
                    </label>
                    <select id="extra-karbo" 
                            onchange="calculateTotal()"
                            class="w-full bg-white dark:bg-[#07192C] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan">
                        <option value="Tanpa Tambahan Nasi" data-price="0">Tanpa Tambahan Nasi</option>
                        <option value="Nasi Jagung Pulen Khas Timor (+Rp 8.000)" data-price="8000">Nasi Jagung Pulen Khas Timor (+Rp 8.000)</option>
                        <option value="Nasi Putih Wangi (+Rp 5.000)" data-price="5000">Nasi Putih Wangi Pandan (+Rp 5.000)</option>
                        <option value="Paket Nasi Jagung + Sayur Rumpu Rampe (+Rp 15.000)" data-price="15000">Komplit: Nasi Jagung + Rumpu Rampe (+Rp 15.000)</option>
                    </select>
                </div>

                <!-- FITUR TAMBAHAN #2: Estimasi Ongkos Kirim Antar Kota / Pulau -->
                <div class="pt-2 border-t border-slate-200 dark:border-cyan-500/15">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-xs font-bold text-slate-700 dark:text-slate-300">
                            <i class="fa-solid fa-location-dot text-cyan-600 dark:text-brand-cyan mr-1"></i> Estimasi Wilayah Kirim:
                        </label>
                        <span id="shipping-label" class="text-[11px] font-semibold text-cyan-700 dark:text-brand-cyan">Rp 15.000</span>
                    </div>
                    <select id="shipping-dest" 
                            onchange="calculateTotal()"
                            class="w-full bg-white dark:bg-[#07192C] border border-slate-300 dark:border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-cyan-500 dark:focus:border-brand-cyan">
                        <option value="Jabodetabek (Instant / Sameday)" data-shipping="15000">Jabodetabek - Instant / Sameday (Rp 15.000)</option>
                        <option value="Jawa Barat & Banten" data-shipping="20000">Jawa Barat & Banten (Rp 20.000)</option>
                        <option value="Jawa Tengah & DI Yogyakarta" data-shipping="22000">Jawa Tengah & DIY (Rp 22.000)</option>
                        <option value="Jawa Timur (Surabaya, Malang, dll)" data-shipping="25000">Jawa Timur (Rp 25.000)</option>
                        <option value="Bali & Nusa Tenggara (Kupang/NTT)" data-shipping="30000">Bali & Nusa Tenggara / Kupang NTT (Rp 30.000)</option>
                        <option value="Sumatra / Kalimantan / Sulawesi" data-shipping="38000">Sumatra, Kalimantan, Sulawesi (Rp 38.000)</option>
                    </select>
                </div>

                <!-- Total Kalkulasi -->
                <div class="flex items-center justify-between pt-3 border-t border-slate-200 dark:border-cyan-500/20">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Estimasi Total Bayar:</span>
                    <div class="text-2xl font-black text-cyan-700 dark:text-brand-cyan font-sans">
                        Rp <span id="grand-total"><?= number_format($item['harga'] + 15000, 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>

            <!-- WhatsApp Direct Order CTA Button -->
            <div class="space-y-3 pt-2">
                <button type="button" 
                        onclick="sendWhatsAppOrder()"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-600 hover:from-emerald-500 hover:to-teal-500 text-white font-extrabold text-sm shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-2.5 hover:scale-[1.01] active:scale-[0.99]">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                    <span>Pesan Langsung via WhatsApp Sekarang</span>
                </button>

                <p class="text-[11px] text-center text-slate-500 dark:text-slate-400">
                    <i class="fa-solid fa-bolt text-amber-500 mr-1"></i> Admin toko prakoso responsif dalam waktu kurang dari 5 menit.
                </p>
            </div>

        </div>

    </div>

    <!-- FITUR TAMBAHAN #3: Tab Interaktif (Filosofi Kesambi, Rempah NTT, Cara Penyajian) -->
    <div class="bg-white dark:bg-[#07192C]/90 border border-slate-200 dark:border-cyan-500/25 rounded-3xl p-6 sm:p-10 shadow-card-light dark:shadow-2xl mb-16 backdrop-blur-xl">
        
        <!-- Tab Navigation Buttons -->
        <div class="flex flex-wrap gap-2 border-b border-slate-200 dark:border-cyan-500/20 pb-4 mb-8">
            <button type="button" 
                    id="tab-btn-1" 
                    onclick="switchTab(1)" 
                    class="tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-brand-cyan text-brand-navy shadow-sm transition-all flex items-center gap-2">
                <i class="fa-solid fa-fire"></i>
                <span>Tradisi Asap Kesambi</span>
            </button>
            <button type="button" 
                    id="tab-btn-2" 
                    onclick="switchTab(2)" 
                    class="tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-slate-100 dark:bg-[#0C4A6E]/50 text-slate-700 dark:text-cyan-200 hover:bg-slate-200 dark:hover:bg-[#0C4A6E] transition-all flex items-center gap-2">
                <i class="fa-solid fa-leaf"></i>
                <span>Komposisi Rempah NTT</span>
            </button>
            <button type="button" 
                    id="tab-btn-3" 
                    onclick="switchTab(3)" 
                    class="tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-slate-100 dark:bg-[#0C4A6E]/50 text-slate-700 dark:text-cyan-200 hover:bg-slate-200 dark:hover:bg-[#0C4A6E] transition-all flex items-center gap-2">
                <i class="fa-solid fa-kitchen-set"></i>
                <span>Panduan Memanaskan (Reheat)</span>
            </button>
            <button type="button" 
                    id="tab-btn-4" 
                    onclick="switchTab(4)" 
                    class="tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-slate-100 dark:bg-[#0C4A6E]/50 text-slate-700 dark:text-cyan-200 hover:bg-slate-200 dark:hover:bg-[#0C4A6E] transition-all flex items-center gap-2">
                <i class="fa-solid fa-comments"></i>
                <span>Ulasan Pembeli (<?= number_format($item['terjual']) ?>)</span>
            </button>
        </div>

        <!-- Tab 1: Tradisi Asap Kesambi -->
        <div id="tab-content-1" class="tab-pane space-y-4">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white font-serif">
                Keunikan Pengasapan Kayu Kesambi Asli Pulau Timor
            </h3>
            <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                Berbeda dengan barbekyu gaya Barat yang menggunakan kayu ek (*oak*) atau apel, Se'i Sapi Kupang menggunakan kayu dan daun dari pohon kesambi (*Schleichera oleosa*) yang tumbuh subur di iklim savana Nusa Tenggara Timur.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15">
                    <h4 class="font-bold text-slate-900 dark:text-white text-xs uppercase tracking-wider text-cyan-600 dark:text-brand-cyan mb-2">
                        Warna Merah Alami (Smoke Ring)
                    </h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Pengasapan tertutup dengan daun kesambi membuat daging matang tanpa tersentuh jilatan api langsung, menghasilkan warna merah kemerahan alami yang khas tanpa bahan pengawet sintetik.
                    </p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15">
                    <h4 class="font-bold text-slate-900 dark:text-white text-xs uppercase tracking-wider text-cyan-600 dark:text-brand-cyan mb-2">
                        Aroma Lembut Tidak Menusuk
                    </h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Kadar getah kesambi yang sangat rendah memastikan asap yang terserap ke dalam daging tidak meninggalkan rasa pahit jelaga, melainkan aroma gurih wangi yang membuat ketagihan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Tab 2: Komposisi Rempah NTT -->
        <div id="tab-content-2" class="tab-pane hidden space-y-4">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white font-serif">
                Rempah & Bahan Baku Berkualitas Tinggi
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 pt-2">
                <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15">
                    <span class="text-xs font-bold text-cyan-600 dark:text-brand-cyan block mb-1">Daging Sapi Segar</span>
                    <p class="text-xs text-slate-600 dark:text-slate-300">Potongan paha belakang (*round*) atau *brisket* pilihan dengan marbling lemak pas, dipotong memanjang tipis.</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15">
                    <span class="text-xs font-bold text-cyan-600 dark:text-brand-cyan block mb-1">Daun Sapan (*Zanthoxylum*)</span>
                    <p class="text-xs text-slate-600 dark:text-slate-300">Daun khas pegunungan Timor beraroma sitrus aromatik yang dimasukkan dalam sambal lu'at asli.</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15">
                    <span class="text-xs font-bold text-cyan-600 dark:text-brand-cyan block mb-1">Garam Laut Rote</span>
                    <p class="text-xs text-slate-600 dark:text-slate-300">Kristal garam laut alami dari pesisir Pulau Rote dengan rasa gurih murni tanpa rasa pahit.</p>
                </div>
            </div>
        </div>

        <!-- Tab 3: Panduan Memanaskan (Reheat) -->
        <div id="tab-content-3" class="tab-pane hidden space-y-4">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white font-serif">
                Cara Terbaik Memanaskan Se'i Sapi prakoso di Rumah
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15 text-xs text-slate-600 dark:text-slate-300 space-y-2">
                    <div class="w-8 h-8 rounded-lg bg-cyan-100 dark:bg-brand-navy text-cyan-700 dark:text-brand-cyan flex items-center justify-center font-bold text-sm">1</div>
                    <h5 class="font-bold text-slate-900 dark:text-white">Teflon / Wajan (Direkomendasikan)</h5>
                    <p>Panaskan teflon dengan api kecil-sedang tanpa minyak atau hanya dengan setetes mentega. Panggang daging se'i selama 2-3 menit hingga hangat dan harum kesambi keluar kembali.</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15 text-xs text-slate-600 dark:text-slate-300 space-y-2">
                    <div class="w-8 h-8 rounded-lg bg-cyan-100 dark:bg-brand-navy text-cyan-700 dark:text-brand-cyan flex items-center justify-center font-bold text-sm">2</div>
                    <h5 class="font-bold text-slate-900 dark:text-white">Air Fryer</h5>
                    <p>Atur suhu air fryer pada 160&deg;C selama 3-4 menit. Tekstur pinggiran akan menjadi sedikit renyah sementara bagian tengah tetap *tender* dan *juicy*.</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15 text-xs text-slate-600 dark:text-slate-300 space-y-2">
                    <div class="w-8 h-8 rounded-lg bg-cyan-100 dark:bg-brand-navy text-cyan-700 dark:text-brand-cyan flex items-center justify-center font-bold text-sm">3</div>
                    <h5 class="font-bold text-slate-900 dark:text-white">Microwave</h5>
                    <p>Masukkan ke dalam wadah tertutup khusus microwave. Panaskan dengan daya sedang selama 45-60 detik. Jangan terlalu lama agar daging tidak menjadi kering.</p>
                </div>
            </div>
        </div>

        <!-- Tab 4: Ulasan & Testimoni Pelanggan -->
        <div id="tab-content-4" class="tab-pane hidden space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-slate-200 dark:border-cyan-500/15">
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white font-serif">Ulasan Pecinta Se'i Sapi</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Total 120+ ulasan terverifikasi dari penikmat kuliner di seluruh Indonesia.</p>
                </div>
                <button type="button" 
                        onclick="openReviewModal()"
                        class="px-4 py-2 rounded-xl bg-brand-cyan text-brand-navy font-bold text-xs shadow-sm hover:bg-cyan-300 transition-colors flex items-center gap-1.5 self-start sm:self-auto">
                    <i class="fa-solid fa-pen"></i>
                    <span>Tulis Ulasan Anda</span>
                </button>
            </div>

            <!-- Review Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-5 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15 space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-cyan-700 text-white font-bold flex items-center justify-center text-xs">BP</div>
                            <div>
                                <span class="font-bold text-slate-900 dark:text-white text-xs block">Budi Prasetyo</span>
                                <span class="text-[10px] text-slate-400">Jakarta Selatan &bull; Pembeli Terverifikasi</span>
                            </div>
                        </div>
                        <div class="text-amber-400 text-xs">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        "Aroma asap kayu kesambinya benar-benar otentik seperti waktu makan langsung di Kupang! Daging empuk dan sambal lu'atnya juara banget pedas asam segarnya."
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-50 dark:bg-[#05111F] border border-slate-200 dark:border-cyan-500/15 space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-teal-700 text-white font-bold flex items-center justify-center text-xs">SR</div>
                            <div>
                                <span class="font-bold text-slate-900 dark:text-white text-xs block">Siti Rahmawati</span>
                                <span class="text-[10px] text-slate-400">Surabaya &bull; Pembeli Terverifikasi</span>
                            </div>
                        </div>
                        <div class="text-amber-400 text-xs">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        "Pesan kemasan frozen pack 250gr sampai dengan aman dan masih beku. Dipanaskan di teflon sebentar rasanya sama sekali tidak berubah, tetap juicy!"
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Related Menu Section -->
    <?php if (!empty($related)) : ?>
        <div class="border-t border-slate-200 dark:border-cyan-500/15 pt-12">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs uppercase font-extrabold tracking-widest text-cyan-600 dark:text-brand-cyan">Rekomendasi Lainnya</span>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white font-serif mt-1">Menu Se'i Sapi Pilihan</h3>
                </div>
                <a href="<?= base_url('makanan') ?>" class="text-xs font-bold text-cyan-700 dark:text-brand-cyan hover:underline flex items-center gap-1">
                    <span>Lihat Semua</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($related as $rel) : ?>
                    <a href="<?= base_url('makanan/detail/' . $rel['id']) ?>" 
                       class="group bg-white dark:bg-[#07192C]/80 border border-slate-200 dark:border-cyan-500/20 hover:border-cyan-500 dark:hover:border-brand-cyan rounded-3xl p-4 transition-all hover:-translate-y-1 block shadow-card-light dark:shadow-none">
                        
                        <!-- Related Thumbnail -->
                        <div class="relative h-40 rounded-2xl overflow-hidden mb-3 bg-slate-900">
                            <?php 
                                $rSrc = '';
                                if (!empty($rel['gambar'])) {
                                    if (strpos($rel['gambar'], 'http') === 0) {
                                        $rSrc = $rel['gambar'];
                                    } elseif (file_exists(ROOTPATH . 'public/uploads/makanan/' . $rel['gambar'])) {
                                        $rSrc = base_url('uploads/makanan/' . $rel['gambar']);
                                    } else {
                                        $rSrc = 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=400&q=80';
                                    }
                                } else {
                                    $rSrc = 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=400&q=80';
                                }
                            ?>
                            <img src="<?= esc($rSrc) ?>" alt="<?= esc($rel['nama']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute top-2 right-2 bg-black/60 text-amber-400 px-2 py-0.5 rounded-lg text-[10px] font-bold backdrop-blur-md">
                                <i class="fa-solid fa-star text-[9px]"></i> <?= number_format($rel['rating'], 1) ?>
                            </div>
                        </div>

                        <div class="text-[11px] text-cyan-600 dark:text-brand-cyan font-bold mb-1"><?= esc($rel['kategori']) ?></div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-brand-cyan transition-colors line-clamp-1 mb-2 font-serif">
                            <?= esc($rel['nama']) ?>
                        </h4>
                        <div class="flex items-center justify-between text-xs pt-1 border-t border-slate-100 dark:border-cyan-500/15">
                            <span class="font-extrabold text-cyan-700 dark:text-brand-cyan">Rp <?= number_format($rel['harga'], 0, ',', '.') ?></span>
                            <span class="text-slate-400 text-[11px]"><?= $rel['berat'] ?>g</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

</div>

<!-- Fullscreen Image Modal Preview -->
<div id="image-modal" 
     class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4 transition-opacity"
     onclick="closeImageModal()">
    <div class="relative max-w-4xl max-h-[90vh]" onclick="event.stopPropagation()">
        <img id="modal-img" src="" alt="Fullscreen Food Preview" class="w-full h-full object-contain rounded-2xl border border-cyan-500/30 shadow-2xl">
        <button type="button" 
                onclick="closeImageModal()" 
                class="absolute -top-4 -right-4 w-10 h-10 rounded-full bg-brand-cyan text-brand-navy font-bold flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
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
            `Halo Toko prakoso! 🥩✨\n` +
            `Saya ingin memesan Se'i Sapi khas NTT:\n\n` +
            `📌 Menu: *${itemName}*\n` +
            `🔢 Jumlah Porsi: *${quantity} porsi*\n` +
            `🌶️ Sambal: *${extraSambal}*\n` +
            `🍚 Karbohidrat: *${extraKarbo}*\n` +
            `📍 Wilayah Pengiriman: *${shipping}*\n` +
            `💰 Estimasi Total Bayar: *Rp ${grandTotal}*\n\n` +
            `Mohon konfirmasi ketersediaan & nomor rekening untuk pembayaran. Terima kasih! 🙏`;

        const waUrl = `https://wa.me/6281234567890?text=${encodeURIComponent(message)}`;
        window.open(waUrl, '_blank');
    }

    // Tab Switching
    function switchTab(tabIndex) {
        for (let i = 1; i <= 4; i++) {
            const btn = document.getElementById(`tab-btn-${i}`);
            const pane = document.getElementById(`tab-content-${i}`);
            
            if (i === tabIndex) {
                btn.className = "tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-brand-cyan text-brand-navy shadow-sm transition-all flex items-center gap-2";
                pane.classList.remove('hidden');
            } else {
                btn.className = "tab-btn px-5 py-2.5 rounded-xl font-bold text-xs bg-slate-100 dark:bg-[#0C4A6E]/50 text-slate-700 dark:text-cyan-200 hover:bg-slate-200 dark:hover:bg-[#0C4A6E] transition-all flex items-center gap-2";
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
                title: 'Tautan menu disalin!',
                showConfirmButton: false,
                timer: 2000,
                background: isDark ? '#071626' : '#ffffff',
                color: isDark ? '#22D3EE' : '#0f172a'
            });
        });
    }

    // Fullscreen Modal for AI Image Preview
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

    // Dummy Review Modal
    function openReviewModal() {
        const isDark = document.documentElement.classList.contains('dark');
        Swal.fire({
            title: 'Tulis Ulasan Menu',
            html: `
                <div class="space-y-3 text-left">
                    <label class="block text-xs font-bold text-slate-300">Nama Anda:</label>
                    <input id="swal-name" class="w-full bg-[#05111F] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-white" placeholder="Contoh: Andi Pratama">
                    
                    <label class="block text-xs font-bold text-slate-300 mt-2">Bintang Rating (1-5):</label>
                    <select id="swal-rating" class="w-full bg-[#05111F] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-white">
                        <option value="5">⭐⭐⭐⭐⭐ 5 - Sangat Enak & Smoky Otentik!</option>
                        <option value="4">⭐⭐⭐⭐ 4 - Enak, Porsi Cukup</option>
                        <option value="3">⭐⭐⭐ 3 - Cukup Baik</option>
                    </select>

                    <label class="block text-xs font-bold text-slate-300 mt-2">Ulasan Anda:</label>
                    <textarea id="swal-review" rows="3" class="w-full bg-[#05111F] border border-cyan-500/30 rounded-xl p-3 text-xs text-white" placeholder="Ceritakan rasa asap dan sambal favorit Anda..."></textarea>
                </div>
            `,
            background: isDark ? '#071626' : '#ffffff',
            color: isDark ? '#ffffff' : '#0f172a',
            showCancelButton: true,
            confirmButtonColor: '#22D3EE',
            cancelButtonColor: '#64748b',
            confirmButtonText: '<span class="text-slate-900 font-bold">Kirim Ulasan</span>',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                const name = document.getElementById('swal-name').value;
                const review = document.getElementById('swal-review').value;
                if (!name || !review) {
                    Swal.showValidationMessage('Nama dan ulasan wajib diisi!');
                    return false;
                }
                return { name, review };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Terima Kasih!',
                    text: 'Ulasan Anda berhasil dikirim dan menunggu verifikasi.',
                    confirmButtonColor: '#22D3EE',
                    background: isDark ? '#071626' : '#ffffff',
                    color: isDark ? '#ffffff' : '#0f172a',
                });
            }
        });
    }
</script>

<?= $this->endSection() ?>
