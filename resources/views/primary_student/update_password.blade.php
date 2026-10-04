<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kata Sandi</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .strength-bar {
            transition: width 0.3s ease, background-color 0.3s ease;
        }
    </style>
</head>

<body
    class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-x-hidden">

    <!-- Ambient Background Glows -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-violet-600/20 rounded-full blur-3xl pointer-events-none">
    </div>

    <!-- Toast Notification -->
    <div id="toast"
        class="fixed top-5 right-5 z-50 flex items-center gap-3 px-5 py-4 rounded-xl shadow-2xl transition-all duration-300 transform translate-y-[-100px] opacity-0 border max-w-md w-full sm:w-auto">
        <i id="toast-icon" data-lucide="info" class="w-6 h-6 flex-shrink-0"></i>
        <span id="toast-message" class="text-sm font-medium">Pesan notifikasi</span>
    </div>

    <!-- Card Container -->
    <div
        class="w-full max-w-md bg-slate-800/80 backdrop-blur-xl border border-slate-700/60 rounded-2xl shadow-2xl p-6 sm:p-8 relative z-10">

        <!-- Header -->
        <div class="text-center mb-8">
            <div
                class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-600/10 border border-indigo-500/20 text-indigo-400 mb-4 shadow-inner">
                <i data-lucide="shield-check" class="w-7 h-7"></i>
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Ubah Kata Sandi</h1>
            <p class="text-slate-400 text-sm mt-1">Perbarui kata sandi Anda untuk menjaga keamanan akun.</p>
        </div>

        <!-- FORM START -->
        <form action="{{ route('primary_student.update_password') }}" method="POST">
            @csrf

            <!-- 2. Password Baru -->
            <div>
                <label for="newPassword"
                    class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Kata Sandi
                    Baru</label>
                <div class="relative">
                    <input type="password" name="password" id="newPassword" required placeholder="••••••••"
                        class="w-full px-4 py-3 bg-slate-900/60 border border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-100 placeholder-slate-500 outline-none transition duration-200 pr-12 text-sm">
                    <button type="button" onclick="togglePasswordVisibility('newPassword', 'eyeNew')"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-200 p-1 focus:outline-none transition">
                        <i id="eyeNew" data-lucide="eye" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Strength Indicator Bar -->
                <div class="mt-3">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs text-slate-400 font-medium">Kekuatan Kata Sandi:</span>
                        <span id="strengthText" class="text-xs font-bold text-slate-500">Belum diisi</span>
                    </div>
                    <div class="w-full bg-slate-700/50 rounded-full h-1.5 overflow-hidden">
                        <div id="strengthBar" class="strength-bar h-full w-0 bg-transparent rounded-full"></div>
                    </div>
                </div>


            </div>

            <!-- 3. Konfirmasi Password Baru -->
            <div style="margin-top: 1rem;">
                <label for="confirmPassword"
                    class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Konfirmasi Kata
                    Sandi Baru</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="confirmPassword" required placeholder="••••••••"
                        class="w-full px-4 py-3 bg-slate-900/60 border border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-100 placeholder-slate-500 outline-none transition duration-200 pr-12 text-sm">
                    <button type="button" onclick="togglePasswordVisibility('confirmPassword', 'eyeConfirm')"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-200 p-1 focus:outline-none transition">
                        <i id="eyeConfirm" data-lucide="eye" class="w-5 h-5"></i>
                    </button>
                </div>


                <!-- Password Checklist Criteria -->
                <ul class="mt-3 space-y-1.5 text-xs text-slate-400">
                    <li id="reqLength" class="flex items-center gap-2 transition-colors duration-200">
                        <i id="iconLength" data-lucide="circle" class="w-3.5 h-3.5 text-slate-500 transition-all"></i>
                        <span>Minimal 8 karakter</span>
                    </li>
                    <li id="reqCase" class="flex items-center gap-2 transition-colors duration-200">
                        <i id="iconCase" data-lucide="circle" class="w-3.5 h-3.5 text-slate-500 transition-all"></i>
                        <span>Huruf besar (A-Z) & huruf kecil (a-z)</span>
                    </li>
                    <li id="reqNumber" class="flex items-center gap-2 transition-colors duration-200">
                        <i id="iconNumber" data-lucide="circle" class="w-3.5 h-3.5 text-slate-500 transition-all"></i>
                        <span>Mengandung angka (0-9)</span>
                    </li>
                </ul>

                <!-- Real-time Match Feedback -->
                <div id="matchFeedback" class="hidden items-center gap-1.5 mt-2 text-xs">
                    <i id="matchIcon" data-lucide="info" class="w-3.5 h-3.5"></i>
                    <span id="matchText"></span>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submitBtn"
                class="w-full mt-2 py-3.5 px-4 bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-500 hover:to-violet-500 active:scale-[0.99] text-white font-semibold rounded-xl shadow-lg shadow-indigo-600/30 transition-all duration-200 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-slate-800 disabled:opacity-60 disabled:cursor-not-allowed">
                <span id="btnText">Simpan Kata Sandi</span>
                <i id="btnSpinner" class="hidden animate-spin" data-lucide="loader-2" class="w-5 h-5"></i>
            </button>

        </form>
    </div>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        const newPasswordInput = document.getElementById('newPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');

        // Event listener 'input' for real-time validation
        newPasswordInput.addEventListener('input', validateNewPassword);
        confirmPasswordInput.addEventListener('input', validateMatch);

        // Toggle Show/Hide Password function
        function togglePasswordVisibility(inputId, eyeIconId) {
            const input = document.getElementById(inputId);
            const eyeIcon = document.getElementById(eyeIconId);

            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.setAttribute('data-lucide', 'eye-off');
            } else {
                input.type = 'password';
                eyeIcon.setAttribute('data-lucide', 'eye');
            }
            lucide.createIcons();
        }

        // Validate New Password Strength and Rules
        function validateNewPassword() {
            const val = newPasswordInput.value;

            // Check individual criteria with strict regex rules
            const hasLength = val.length >= 8;
            const hasCase = /[a-z]/.test(val) && /[A-Z]/.test(val);
            const hasNumber = /[0-9]/.test(val);

            // Update UI Checklist Items independently
            updateCriterion('reqLength', 'iconLength', hasLength);
            updateCriterion('reqCase', 'iconCase', hasCase);
            updateCriterion('reqNumber', 'iconNumber', hasNumber);

            // Calculate score based on met conditions
            let score = 0;
            if (hasLength) score++;
            if (hasCase) score++;
            if (hasNumber) score++;

            console.log(`Password Strength Score: ${score} (Length: ${hasLength}, Case: ${hasCase}, Number: ${hasNumber})`);

            // Strength bar & text elements
            const bar = document.getElementById('strengthBar');
            const text = document.getElementById('strengthText');

            if (val.length === 0) {
                bar.style.width = '0%';
                bar.className = 'strength-bar h-full rounded-full bg-transparent';
                text.innerText = 'Belum diisi';
                text.className = 'text-xs font-bold text-slate-500';
            } else if (score === 1) {
                bar.style.width = '25%';
                bar.className = 'strength-bar h-full rounded-full bg-rose-500';
                text.innerText = 'Sangat Lemah';
                text.className = 'text-xs font-bold text-rose-500';
            } else if (score === 2) {
                bar.style.width = '65%';
                bar.className = 'strength-bar h-full rounded-full bg-yellow-500';
                text.innerText = 'Sedang';
                text.className = 'text-xs font-bold text-yellow-500';
            } else if (score === 3) {
                bar.style.width = '100%';
                bar.className = 'strength-bar h-full rounded-full bg-emerald-500';
                text.innerText = 'Sangat Kuat';
                text.className = 'text-xs font-bold text-emerald-400';
            }

            // Re-validate password match if user typed in confirmation field
            if (confirmPasswordInput.value !== '') {
                validateMatch();
            }

            return score;
        }

        // Helper function to update checklist item styles & icons
        function updateCriterion(reqId, iconId, isValid) {
            const reqEl = document.getElementById(reqId);
            const iconEl = document.getElementById(iconId);

            if (isValid) {
                reqEl.classList.remove('text-slate-400');
                reqEl.classList.add('text-emerald-400');
                iconEl.setAttribute('data-lucide', 'check-circle-2');
                iconEl.classList.remove('text-slate-500');
                iconEl.classList.add('text-emerald-400');
            } else {
                reqEl.classList.remove('text-emerald-400');
                reqEl.classList.add('text-slate-400');
                iconEl.setAttribute('data-lucide', 'circle');
                iconEl.classList.remove('text-emerald-400');
                iconEl.classList.add('text-slate-500');
            }
            lucide.createIcons();
        }

        // Validate if Confirm Password matches New Password
        function validateMatch() {
            const newPass = newPasswordInput.value;
            const confirmPass = confirmPasswordInput.value;
            const feedback = document.getElementById('matchFeedback');
            const icon = document.getElementById('matchIcon');
            const text = document.getElementById('matchText');

            if (confirmPass === '') {
                feedback.classList.add('hidden');
                feedback.classList.remove('flex');
                return false;
            }

            feedback.classList.remove('hidden');
            feedback.classList.add('flex');

            if (newPass === confirmPass) {
                feedback.className = 'flex items-center gap-1.5 mt-2 text-xs text-emerald-400';
                icon.setAttribute('data-lucide', 'check');
                text.innerText = 'Kata sandi cocok';
                lucide.createIcons();
                return true;
            } else {
                feedback.className = 'flex items-center gap-1.5 mt-2 text-xs text-rose-400';
                icon.setAttribute('data-lucide', 'x');
                text.innerText = 'Kata sandi tidak cocok';
                lucide.createIcons();
                return false;
            }
        }

        // Handle Form Submission
        // function handleFormSubmit(e) {
        //     e.preventDefault();

        //     const currentPass = document.getElementById('currentPassword').value;
        //     const newPass = newPasswordInput.value;
        //     const score = validateNewPassword();
        //     const isMatched = validateMatch();

        //     // Form Validations
        //     if (score < 4) {
        //         showToast('Harap penuhi semua syarat kata sandi baru.', 'error');
        //         return;
        //     }

        //     if (!isMatched) {
        //         showToast('Konfirmasi kata sandi tidak cocok dengan kata sandi baru.', 'error');
        //         return;
        //     }

        //     if (currentPass === newPass) {
        //         showToast('Kata sandi baru tidak boleh sama dengan kata sandi saat ini.', 'error');
        //         return;
        //     }

        //     // Simulate Loading State
        //     setLoading(true);

        //     setTimeout(() => {
        //         setLoading(false);
        //         showToast('Kata sandi Anda berhasil diperbarui!', 'success');

        //         // Reset form after successful submission
        //         document.getElementById('changePasswordForm').reset();
        //         validateNewPassword();
        //         validateMatch();
        //     }, 1800);
        // }

        // Toggle Loading state on button
        function setLoading(isLoading) {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            btn.disabled = isLoading;
            if (isLoading) {
                btnText.innerText = 'Memproses...';
                btnSpinner.classList.remove('hidden');
            } else {
                btnText.innerText = 'Simpan Kata Sandi';
                btnSpinner.classList.add('hidden');
            }
        }

        // Toast Notification Function
        function showToast(message, type = 'info') {
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toast-message');
            const toastIcon = document.getElementById('toast-icon');

            toastMsg.innerText = message;

            if (type === 'success') {
                toast.className = 'fixed top-5 right-5 z-50 flex items-center gap-3 px-5 py-4 rounded-xl shadow-2xl transition-all duration-300 transform translate-y-0 opacity-100 bg-slate-800 border-emerald-500/50 text-emerald-400 border';
                toastIcon.setAttribute('data-lucide', 'check-circle');
            } else if (type === 'error') {
                toast.className = 'fixed top-5 right-5 z-50 flex items-center gap-3 px-5 py-4 rounded-xl shadow-2xl transition-all duration-300 transform translate-y-0 opacity-100 bg-slate-800 border-rose-500/50 text-rose-400 border';
                toastIcon.setAttribute('data-lucide', 'alert-triangle');
            } else {
                toast.className = 'fixed top-5 right-5 z-50 flex items-center gap-3 px-5 py-4 rounded-xl shadow-2xl transition-all duration-300 transform translate-y-0 opacity-100 bg-slate-800 border-indigo-500/50 text-indigo-400 border';
                toastIcon.setAttribute('data-lucide', 'info');
            }

            lucide.createIcons();

            // Auto Hide Toast after 4 seconds
            setTimeout(() => {
                toast.classList.add('translate-y-[-100px]', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 4000);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if(session('error'))
            Swal.fire({
                icon: "error",
                title: "Gagal Update Password!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });

            Swal.fire({
                icon: "error",
                title: "Gagal Update Password!",
                text: "{{ session('error') }}"
            });
        @endif

    </script>
</body>

</html>
