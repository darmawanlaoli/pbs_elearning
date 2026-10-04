<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 | Page Expired</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 2.5s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-8px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .dark .glass-card {
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }

        * {
            transition: background-color 0.25s ease, border-color 0.25s ease, color 0.25s ease, transform 0.2s ease, opacity 0.2s ease;
        }
    </style>
</head>

<body
    class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 font-sans min-h-screen flex flex-col justify-between items-center p-4 selection:bg-brand-500 selection:text-white relative">

    <!-- Soft Background Gradients -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div
            class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-brand-500/10 dark:bg-brand-600/10 rounded-full blur-3xl">
        </div>
    </div>

    <!-- Top Bar / Dark Mode Toggle -->
    <header class="w-full max-w-4xl flex justify-end items-center py-2 relative z-10">
        <button id="themeToggleBtn" onclick="toggleDarkMode()"
            class="p-2.5 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 shadow-sm focus:outline-none"
            title="Ubah Tema">
            <i id="themeIcon" class="fa-solid fa-moon text-base"></i>
        </button>
    </header>

    <!-- Main Card Container -->
    <main class="w-full max-w-md my-auto relative z-10">
        <div class="glass-card rounded-3xl p-8 sm:p-10 shadow-xl text-center relative overflow-hidden">

            <!-- Animated Expired Icon -->
            <div class="relative w-20 h-20 mx-auto mb-6 flex items-center justify-center">
                <div class="absolute inset-0 rounded-2xl bg-brand-500/10 dark:bg-brand-500/20 animate-pulse-slow"></div>
                <div
                    class="relative w-16 h-16 bg-brand-600 dark:bg-brand-500 text-white rounded-2xl shadow-lg shadow-brand-500/30 flex items-center justify-center text-2xl animate-float">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>
            </div>

            <!-- Error Title -->
            <span
                class="inline-block px-3 py-1 mb-3 rounded-full bg-brand-50 dark:bg-brand-950/60 text-brand-600 dark:text-brand-400 text-xs font-bold tracking-widest uppercase border border-brand-200 dark:border-brand-800">
                Error 419
            </span>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-2">
                419 Page Expired
            </h1>

            <!-- Subtext Required by User -->
            <p class="text-slate-600 dark:text-slate-300 text-base mb-8 leading-relaxed font-normal">
                Session Anda telah habis, silahkan login kembali.
            </p>

            <!-- Primary Action Button -->
            <div class="space-y-3">
                <a href="{{ route('login') }}"
                    class="w-full py-3.5 px-6 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-semibold shadow-lg shadow-brand-600/25 hover:shadow-brand-600/40 hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 transition-all">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Login Kembali</span>
                </a>

                <button onclick="refreshPage()"
                    class="w-full py-3 px-6 rounded-xl bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400 font-medium text-sm flex items-center justify-center gap-2 transition-all">
                    <i class="fa-solid fa-rotate-right text-xs"></i>
                    <span>Muat Ulang Halaman</span>
                </button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full text-center py-4 text-xs text-slate-400 dark:text-slate-500 relative z-10">
        &copy; 2026 Peachblossoms School. All rights reserved.
    </footer>


    <!-- Toast Notification -->
    <div id="toast"
        class="fixed bottom-6 z-50 transform translate-y-16 opacity-0 transition-all duration-300 pointer-events-none">
        <div
            class="glass-card px-4 py-2.5 rounded-2xl shadow-lg flex items-center gap-2.5 text-sm font-medium text-slate-800 dark:text-slate-100">
            <i id="toastIcon" class="fa-solid fa-circle-check text-emerald-500"></i>
            <span id="toastMessage">Pesan Toast</span>
        </div>
    </div>

    <!-- JavaScript Interactivity -->
    <script>
        // Init logic
        window.onload = function() {
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
                document.getElementById('themeIcon').className = 'fa-solid fa-sun text-base';
            }
        };

        // Theme Toggle
        function toggleDarkMode() {
            const html = document.documentElement;
            const icon = document.getElementById('themeIcon');
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                icon.className = 'fa-solid fa-moon text-base';
            } else {
                html.classList.add('dark');
                icon.className = 'fa-solid fa-sun text-base';
            }
        }

        // Refresh Page Action
        function refreshPage() {
            showToast('Memuat ulang halaman...');
            setTimeout(() => {
                window.location.reload();
            }, 600);
        }

        // Modal Handlers
        function openLoginModal() {
            const modal = document.getElementById('loginModal');
            const content = document.getElementById('modalContent');

            modal.classList.remove('opacity-0', 'pointer-events-none');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
        }

        function closeLoginModal() {
            const modal = document.getElementById('loginModal');
            const content = document.getElementById('modalContent');

            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            modal.classList.add('opacity-0', 'pointer-events-none');
        }

        // Submit Form Handler
        function handleLoginSubmit(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            submitBtn.disabled = true;
            btnText.innerText = "Memproses...";
            btnSpinner.classList.remove('hidden');

            setTimeout(() => {
                submitBtn.disabled = false;
                btnText.innerText = "Masuk";
                btnSpinner.classList.add('hidden');

                showToast("Sesi berhasil dipulihkan!");
                closeLoginModal();
            }, 1200);
        }

        // Toast Message Helper
        function showToast(msg) {
            const toast = document.getElementById('toast');
            document.getElementById('toastMessage').innerText = msg;

            toast.classList.remove('translate-y-16', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-16', 'opacity-0');
            }, 3000);
        }
    </script>
</body>

</html>
