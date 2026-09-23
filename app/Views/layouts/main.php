<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? "Kedai prakoso - Se'i Sapi Asap Khas NTT") ?></title>
    <meta name="description" content="Kedai prakoso - Cita rasa otentik Se'i Sapi khas Kupang, Nusa Tenggara Timur. Diasap tradisional dengan kayu kesambi pilihan dan disajikan bersama Sambal Lu'at segar.">
    
    <!-- Theme Detection Script -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Google Fonts: Plus Jakarta Sans & Merriweather (Warm Culinary Typography) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,600&family=Lora:ital,wght@0,500;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        culinary: {
                            cyan: '#22D3EE',        // Warna utama sesuai request
                            'cyan-dark': '#0891b2',
                            navy: '#0C4A6E',        // Warna aksen sesuai request
                            'navy-dark': '#062d44',
                            warm: '#FAF6F0',        // Latar hangat khas resto kuliner
                            'warm-card': '#FFFFFF',
                            amber: '#D97706',
                            chili: '#DC2626',
                            wood: '#451A03',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                        body: ['"Lora"', 'serif'],
                    },
                    boxShadow: {
                        'food': '0 4px 20px -2px rgba(12, 74, 110, 0.08), 0 2px 6px -1px rgba(0, 0, 0, 0.04)',
                        'food-hover': '0 12px 30px -4px rgba(12, 74, 110, 0.15)',
                    }
                }
            }
        }
    </script>

    <!-- SweetAlert2 CDN for modern notifications & confirmations -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Warm Culinary scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #F1ECE4;
        }
        .dark ::-webkit-scrollbar-track {
            background: #182026;
        }
        ::-webkit-scrollbar-thumb {
            background: #0C4A6E;
            border-radius: 4px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #22D3EE;
        }
    </style>
</head>
<body class="bg-[#FAF7F2] text-stone-800 dark:bg-[#111922] dark:text-stone-100 font-sans antialiased min-h-screen flex flex-col selection:bg-culinary-cyan selection:text-culinary-navy transition-colors duration-200">

    <!-- Top Culinary Announcement: Keaslian Masakan Daerah NTT -->
    <div class="bg-culinary-navy text-white text-xs py-2 px-4 border-b border-cyan-400/30">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 text-center sm:text-left">
            <div class="flex items-center gap-2 justify-center">
                <span class="inline-flex items-center px-2 py-0.5 rounded bg-culinary-cyan text-culinary-navy font-extrabold text-[10px] tracking-wide uppercase">
                    Kuliner Khas NTT
                </span>
                <span class="text-cyan-100">
                    Daging Sapi Asli Diasap Kayu Kesambi & Sambal Lu'at Segar Khas Kupang
                </span>
            </div>
            <div class="text-[11px] text-cyan-200 hidden md:flex items-center gap-4">
                <span><i class="fa-solid fa-clock text-culinary-cyan mr-1"></i> Buka Setiap Hari: 10.00 - 21.30 WITA</span>
                <span><i class="fa-solid fa-phone text-culinary-cyan mr-1"></i> Pesanan: 0812-3456-7890</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar: Restoran & Toko Kuliner -->
    <header class="sticky top-0 z-50 bg-[#FFFDF9]/95 dark:bg-[#14202B]/95 backdrop-blur-md border-b border-stone-200 dark:border-stone-800 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand identity: Kedai prakoso -->
                <a href="<?= base_url('makanan') ?>" class="flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-culinary-navy border-2 border-culinary-cyan flex items-center justify-center text-culinary-cyan shadow-sm group-hover:scale-105 transition-transform duration-300">
                        <i class="fa-solid fa-bowl-food text-2xl"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold tracking-tight text-stone-900 dark:text-white font-serif group-hover:text-culinary-cyan transition-colors">
                                prakoso
                            </span>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-cyan-100 dark:bg-culinary-navy text-cyan-900 dark:text-culinary-cyan border border-cyan-300 dark:border-cyan-600">
                                Se'i Sapi NTT
                            </span>
                        </div>
                        <p class="text-xs text-stone-500 dark:text-stone-400 font-medium">Kuliner Daging Asap Khas Kupang</p>
                    </div>
                </a>

                <!-- Navigation Links: Menu Warung / Resto -->
                <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-stone-700 dark:text-stone-300">
                    <a href="<?= base_url('makanan') ?>" class="text-culinary-navy dark:text-culinary-cyan flex items-center gap-1.5 hover:underline">
                        <i class="fa-solid fa-utensils text-xs"></i>
                        <span>Daftar Menu</span>
                    </a>
                    <a href="<?= base_url('makanan') ?>#filosofi" class="hover:text-culinary-navy dark:hover:text-culinary-cyan transition-colors">
                        Rahasia Asap Kesambi
                    </a>
                    <a href="<?= base_url('makanan') ?>#sambal" class="hover:text-culinary-navy dark:hover:text-culinary-cyan transition-colors">
                        Sambal Lu'at Otentik
                    </a>
                    <a href="<?= base_url('makanan') ?>#tabel-menu" class="hover:text-culinary-navy dark:hover:text-culinary-cyan transition-colors">
                        Kelola Menu
                    </a>
                </nav>

                <!-- Actions: Theme Toggle & Tombol Tambah Menu -->
                <div class="flex items-center gap-3">
                    
                    <!-- Theme Toggle: Light / Dark -->
                    <button type="button" 
                            id="theme-toggle" 
                            onclick="toggleTheme()" 
                            title="Beralih Mode Tampilan"
                            class="w-10 h-10 rounded-xl bg-stone-100 hover:bg-stone-200 dark:bg-stone-800 dark:hover:bg-stone-700 border border-stone-200 dark:border-stone-700 text-stone-700 dark:text-stone-200 flex items-center justify-center transition-colors shadow-sm">
                        <i id="theme-toggle-dark-icon" class="fa-solid fa-moon text-sm hidden"></i>
                        <i id="theme-toggle-light-icon" class="fa-solid fa-sun text-amber-500 text-sm hidden"></i>
                    </button>

                    <a href="<?= base_url('makanan/create') ?>" 
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-culinary-navy hover:bg-culinary-navy-dark text-white font-bold text-xs sm:text-sm border border-culinary-cyan/50 shadow-sm transition-all duration-200 hover:shadow">
                        <i class="fa-solid fa-plus-circle text-culinary-cyan text-sm"></i>
                        <span>Tambah Menu</span>
                    </a>
                </div>

            </div>
        </div>
    </header>

    <!-- Flash Notifications -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-300 dark:border-emerald-600 text-emerald-900 dark:text-emerald-200 px-5 py-4 rounded-2xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm">Berhasil!</h4>
                        <p class="text-xs"><?= session()->getFlashdata('success') ?></p>
                    </div>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="bg-red-50 dark:bg-red-950/40 border border-red-300 dark:border-red-600 text-red-900 dark:text-red-200 px-5 py-4 rounded-2xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-red-600 text-white flex items-center justify-center font-bold">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm">Perhatian</h4>
                        <p class="text-xs"><?= session()->getFlashdata('error') ?></p>
                    </div>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer: Hangat, Tradisional & Mengangkat Kuliner NTT -->
    <footer class="bg-culinary-navy dark:bg-[#0c151e] text-stone-300 pt-16 pb-12 mt-20 border-t-4 border-culinary-cyan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                
                <div class="space-y-4 md:col-span-2">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-cyan-400 text-culinary-navy flex items-center justify-center text-xl font-bold">
                            <i class="fa-solid fa-bowl-food"></i>
                        </div>
                        <span class="text-2xl font-serif font-bold text-white tracking-wide">Kedai Se'i Sapi prakoso</span>
                    </div>
                    <p class="text-stone-300 text-sm leading-relaxed max-w-md font-body">
                        Menghadirkan kenikmatan asli daging se'i sapi dari bumi Nusa Tenggara Timur langsung ke meja makan Anda. Daging sapi segar dibumbui rempah warisan, diasap tradisional di atas bara kayu kesambi dengan daun kesambi penutup asap.
                    </p>
                    <div class="flex flex-wrap items-center gap-2 pt-2">
                        <span class="inline-flex items-center gap-1.5 text-xs text-cyan-200 bg-cyan-950/80 px-3 py-1.5 rounded-lg border border-cyan-500/30">
                            <i class="fa-solid fa-certificate text-culinary-cyan"></i> 100% Halal & Bersih
                        </span>
                        <span class="inline-flex items-center gap-1.5 text-xs text-cyan-200 bg-cyan-950/80 px-3 py-1.5 rounded-lg border border-cyan-500/30">
                            <i class="fa-solid fa-fire text-amber-400"></i> Asap Tradisional Kesambi Kupang
                        </span>
                    </div>
                </div>

                <div>
                    <h5 class="text-white font-bold text-sm tracking-wider uppercase mb-4 text-culinary-cyan font-serif">Menu Favorit</h5>
                    <ul class="space-y-2.5 text-sm text-stone-300">
                        <li><a href="<?= base_url('makanan') ?>?search=lu%27at" class="hover:text-culinary-cyan transition-colors">&bull; Se'i Sapi Sambal Lu'at Kupang</a></li>
                        <li><a href="<?= base_url('makanan') ?>?search=kesambi" class="hover:text-culinary-cyan transition-colors">&bull; Se'i Original Asap Kesambi</a></li>
                        <li><a href="<?= base_url('makanan') ?>?search=sultan" class="hover:text-culinary-cyan transition-colors">&bull; Paket Sultan Nasi Jagung</a></li>
                        <li><a href="<?= base_url('makanan') ?>?kategori=Frozen+Pack" class="hover:text-culinary-cyan transition-colors">&bull; Kemasan Vakum Frozen 250gr</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-bold text-sm tracking-wider uppercase mb-4 text-culinary-cyan font-serif">Pemesanan & Alamat</h5>
                    <div class="text-xs text-stone-300 space-y-2.5 leading-relaxed">
                        <p><i class="fa-solid fa-location-dot text-culinary-cyan mr-2"></i> Jl. Frans Seda, Kupang, Nusa Tenggara Timur</p>
                        <p><i class="fa-solid fa-whatsapp text-culinary-cyan mr-2"></i> 0812-3456-7890 (WhatsApp Cepat)</p>
                        <p><i class="fa-solid fa-truck-fast text-culinary-cyan mr-2"></i> Melayani Pengiriman Frozen ke Seluruh Indonesia via Paxel</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-cyan-950 pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-stone-400 gap-4">
                <p>&copy; <?= date('Y') ?> <strong class="text-white">prakoso</strong>. Warisan Kuliner Asli Nusa Tenggara Timur.</p>
                <div class="flex items-center gap-6">
                    <span>Cita Rasa Nusantara</span>
                    <a href="<?= base_url('makanan') ?>" class="text-culinary-cyan hover:underline">Kembali ke Atas &uarr;</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Theme Logic & SweetAlert2 Script -->
    <script>
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        function updateThemeIcons() {
            if (document.documentElement.classList.contains('dark')) {
                themeToggleLightIcon.classList.remove('hidden');
                themeToggleDarkIcon.classList.add('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
                themeToggleLightIcon.classList.add('hidden');
            }
        }

        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
            updateThemeIcons();
        }

        // Initialize icons on load
        updateThemeIcons();

        // Konfirmasi Hapus Data dengan SweetAlert2
        function confirmDelete(id, nama) {
            const isDark = document.documentElement.classList.contains('dark');
            Swal.fire({
                title: 'Hapus Menu?',
                text: `Apakah Anda yakin ingin menghapus menu "${nama}" dari daftar hidangan?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0C4A6E',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                background: isDark ? '#14202B' : '#FFFFFF',
                color: isDark ? '#f8fafc' : '#1c1917',
                customClass: {
                    popup: 'rounded-2xl border border-stone-300 dark:border-stone-700 shadow-xl'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `<?= base_url('makanan/delete') ?>/${id}`;
                }
            });
        }
    </script>
</body>
</html>
