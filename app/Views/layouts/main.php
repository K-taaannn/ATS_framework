<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? "prakoso - Se'i Sapi Nusa Tenggara Timur") ?></title>
    <meta name="description" content="prakoso - Pelopor Kuliner Tradisional Se'i Sapi Khas Nusa Tenggara Timur dengan sentuhan modern, resep otentik kayu kesambi.">
    
    <!-- Theme Detection Script (Prevents FOUC) -->
    <script>
        if (localStorage.getItem('color-theme') === 'light' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches)) {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>

    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,800;1,600&display=swap" rel="stylesheet">

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
                        brand: {
                            cyan: '#22D3EE',
                            'cyan-hover': '#06B6D4',
                            'cyan-dark': '#0891b2',
                            navy: '#0C4A6E',
                            'navy-dark': '#082f49',
                            'navy-light': '#0369a1',
                            surface: '#071626',
                            card: '#0f2744',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    },
                    boxShadow: {
                        'glow': '0 0 25px -5px rgba(34, 211, 238, 0.3)',
                        'glow-lg': '0 0 40px -10px rgba(34, 211, 238, 0.45)',
                        'accent': '0 10px 30px -10px rgba(12, 74, 110, 0.5)',
                        'card-light': '0 4px 20px -2px rgba(12, 74, 110, 0.08), 0 2px 6px -1px rgba(0, 0, 0, 0.04)',
                    }
                }
            }
        }
    </script>

    <!-- SweetAlert2 CDN for modern notifications & confirmations -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
        }
        .dark ::-webkit-scrollbar-track {
            background: #082f49;
        }
        ::-webkit-scrollbar-thumb {
            background: #0891b2;
            border-radius: 4px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #22D3EE;
        }
        .bg-mesh-dark {
            background-image: radial-gradient(at 10% 20%, rgba(34, 211, 238, 0.12) 0px, transparent 50%),
                              radial-gradient(at 90% 80%, rgba(12, 74, 110, 0.25) 0px, transparent 50%);
        }
        .bg-mesh-light {
            background-image: radial-gradient(at 10% 20%, rgba(34, 211, 238, 0.18) 0px, transparent 50%),
                              radial-gradient(at 90% 80%, rgba(12, 74, 110, 0.08) 0px, transparent 50%);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 dark:bg-[#05111F] dark:text-slate-100 font-sans antialiased min-h-screen flex flex-col selection:bg-brand-cyan selection:text-brand-navy transition-colors duration-200">

    <!-- Top Announcement Bar: NTT Heritage -->
    <div class="bg-gradient-to-r from-sky-900 via-cyan-900 to-sky-950 dark:from-brand-navy dark:via-[#0e3b5a] dark:to-brand-navy text-xs py-2 px-4 text-center border-b border-cyan-400/30 dark:border-cyan-500/20 text-cyan-100 dark:text-cyan-200 flex items-center justify-center gap-2 transition-colors">
        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-brand-cyan text-brand-navy uppercase tracking-wider shadow-sm">NTT Pride</span>
        <span class="font-medium">Tradisi Pengasapan Asli Kayu Kesambi Kupang, Nusa Tenggara Timur &bull; Pengiriman ke Seluruh Indonesia</span>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-white/90 dark:bg-[#05111F]/85 border-b border-slate-200/80 dark:border-cyan-500/15 shadow-sm dark:shadow-xl transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand identity -->
                <a href="<?= base_url('makanan') ?>" class="flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-brand-navy to-brand-cyan p-0.5 shadow-glow transition-transform group-hover:scale-105 duration-300">
                        <div class="w-full h-full bg-white dark:bg-[#05111F] rounded-[14px] flex items-center justify-center text-cyan-600 dark:text-brand-cyan transition-colors">
                            <i class="fa-solid fa-fire-burner text-2xl transition-transform group-hover:rotate-12 duration-300"></i>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-white font-serif group-hover:text-cyan-600 dark:group-hover:text-brand-cyan transition-colors">
                                prakoso
                            </span>
                            <span class="text-[10px] uppercase font-bold px-2 py-0.5 rounded-md bg-cyan-100 dark:bg-brand-cyan/15 text-cyan-800 dark:text-brand-cyan border border-cyan-300 dark:border-brand-cyan/30">
                                Se'i Sapi NTT
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium tracking-wide">Elevating NTT Heritage Cuisine</p>
                    </div>
                </a>

                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <a href="<?= base_url('makanan') ?>" class="text-slate-900 dark:text-white hover:text-cyan-600 dark:hover:text-brand-cyan transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-utensils text-cyan-600 dark:text-brand-cyan"></i>
                        <span>Katalog Menu</span>
                    </a>
                    <a href="<?= base_url('makanan') ?>#filosofi" class="text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-brand-cyan transition-colors">
                        Filosofi Se'i
                    </a>
                    <a href="<?= base_url('makanan') ?>#sambal" class="text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-brand-cyan transition-colors">
                        Sambal Lu'at NTT
                    </a>
                </nav>

                <!-- Actions: Theme Toggle & Add Button -->
                <div class="flex items-center gap-3">
                    
                    <!-- THEME TOGGLE BUTTON (Light Mode / Dark Mode) -->
                    <button type="button" 
                            id="theme-toggle" 
                            onclick="toggleTheme()" 
                            title="Beralih Mode Tampilan (Light / Dark)"
                            class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 dark:bg-[#0C4A6E]/60 dark:hover:bg-[#0C4A6E] border border-slate-300 dark:border-cyan-500/30 text-slate-700 dark:text-cyan-200 flex items-center justify-center transition-all duration-300 shadow-sm focus:outline-none">
                        <i id="theme-toggle-dark-icon" class="fa-solid fa-moon text-sm hidden"></i>
                        <i id="theme-toggle-light-icon" class="fa-solid fa-sun text-amber-500 text-sm hidden"></i>
                    </button>

                    <a href="<?= base_url('makanan/create') ?>" 
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-brand-cyan to-cyan-400 text-brand-navy font-bold text-sm shadow-glow hover:shadow-glow-lg transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                        <i class="fa-solid fa-circle-plus text-base"></i>
                        <span>Tambah Menu</span>
                    </a>
                </div>

            </div>
        </div>
    </header>

    <!-- Flash Notifications -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="bg-cyan-50 dark:bg-cyan-950/60 border border-cyan-300 dark:border-brand-cyan/40 text-cyan-900 dark:text-cyan-200 px-5 py-4 rounded-2xl flex items-center justify-between shadow-sm dark:shadow-glow">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-cyan-500 dark:bg-brand-cyan text-white dark:text-brand-navy flex items-center justify-center font-bold">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 dark:text-white text-sm">Sukses!</h4>
                        <p class="text-xs text-slate-700 dark:text-cyan-200"><?= session()->getFlashdata('success') ?></p>
                    </div>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-cyan-600 dark:text-cyan-400 hover:text-slate-900 dark:hover:text-white transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="bg-red-50 dark:bg-red-950/60 border border-red-300 dark:border-red-500/40 text-red-900 dark:text-red-200 px-5 py-4 rounded-2xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-red-500 text-white flex items-center justify-center font-bold">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 dark:text-white text-sm">Peringatan</h4>
                        <p class="text-xs text-slate-700 dark:text-red-200"><?= session()->getFlashdata('error') ?></p>
                    </div>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-600 dark:text-red-400 hover:text-slate-900 dark:hover:text-white transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 dark:bg-[#030B14] border-t border-slate-800 dark:border-cyan-500/15 pt-16 pb-12 mt-20 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="space-y-4 md:col-span-2">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-navy to-brand-cyan p-0.5">
                            <div class="w-full h-full bg-[#05111F] rounded-[10px] flex items-center justify-center text-brand-cyan">
                                <i class="fa-solid fa-fire-burner"></i>
                            </div>
                        </div>
                        <span class="text-2xl font-serif font-extrabold text-white">prakoso</span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-md">
                        Mengangkat kuliner legendaris Nusa Tenggara Timur, <span class="text-cyan-400 font-semibold">Se'i Sapi</span>, dengan teknik pengasapan kayu kesambi tradisional berstandar modern internasional. Menyajikan pengalaman rasa smoky, gurih, dan pedas otentik.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <span class="inline-flex items-center gap-1.5 text-xs text-slate-300 bg-slate-800 dark:bg-brand-navy/60 px-3 py-1.5 rounded-lg border border-slate-700 dark:border-cyan-500/20">
                            <i class="fa-solid fa-location-dot text-cyan-400"></i> Asli Kupang, Nusa Tenggara Timur
                        </span>
                        <span class="inline-flex items-center gap-1.5 text-xs text-slate-300 bg-slate-800 dark:bg-brand-navy/60 px-3 py-1.5 rounded-lg border border-slate-700 dark:border-cyan-500/20">
                            <i class="fa-solid fa-shield-halved text-cyan-400"></i> 100% Halal Certified
                        </span>
                    </div>
                </div>

                <div>
                    <h5 class="text-white font-bold text-sm tracking-wider uppercase mb-4 text-cyan-400">Menu Unggulan</h5>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="<?= base_url('makanan') ?>?search=lu%27at" class="hover:text-cyan-300 transition-colors">Se'i Sapi Sambal Lu'at NTT</a></li>
                        <li><a href="<?= base_url('makanan') ?>?search=kesambi" class="hover:text-cyan-300 transition-colors">Se'i Original Asap Kesambi</a></li>
                        <li><a href="<?= base_url('makanan') ?>?search=sultan" class="hover:text-cyan-300 transition-colors">Paket Sultan Nasi Jagung</a></li>
                        <li><a href="<?= base_url('makanan') ?>?kategori=Frozen+Pack" class="hover:text-cyan-300 transition-colors">Frozen Vacuum Pack 250g</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-bold text-sm tracking-wider uppercase mb-4 text-cyan-400">Warisan Kuliner NTT</h5>
                    <p class="text-slate-400 text-xs leading-relaxed mb-4">
                        "Se'i" berasal dari bahasa Rote yang berarti daging yang disayat memanjang dan diasap di atas bara kayu kesambi dengan ditutupi daun kesambi.
                    </p>
                    <div class="text-xs text-slate-400 space-y-1">
                        <p><i class="fa-solid fa-phone text-cyan-400 mr-2"></i> +62 812-3456-7890</p>
                        <p><i class="fa-solid fa-envelope text-cyan-400 mr-2"></i> info@prakoso-seisapi.id</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-slate-400 gap-4">
                <p>&copy; <?= date('Y') ?> <span class="text-white font-semibold">prakoso</span>. All rights reserved. Makanan Khas Nusa Tenggara Timur.</p>
                <div class="flex items-center gap-6">
                    <span class="text-slate-400">Dibuat dengan CodeIgniter 4 & Tailwind CSS</span>
                    <a href="<?= base_url('makanan') ?>" class="text-cyan-400 hover:underline">Kembali ke Atas <i class="fa-solid fa-arrow-up ml-1"></i></a>
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

        // Konfirmasi Hapus Data dengan SweetAlert2 (Dynamic theme support)
        function confirmDelete(id, nama) {
            const isDark = document.documentElement.classList.contains('dark');
            Swal.fire({
                title: 'Hapus Menu?',
                text: `Apakah Anda yakin ingin menghapus menu "${nama}"? Tindakan ini tidak dapat dibatalkan.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#22D3EE',
                cancelButtonColor: '#ef4444',
                confirmButtonText: '<span class="text-slate-900 font-bold">Ya, Hapus</span>',
                cancelButtonText: 'Batal',
                background: isDark ? '#071626' : '#ffffff',
                color: isDark ? '#f8fafc' : '#0f172a',
                customClass: {
                    popup: isDark ? 'border border-cyan-500/30 rounded-2xl shadow-glow' : 'border border-slate-200 rounded-2xl shadow-xl'
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
