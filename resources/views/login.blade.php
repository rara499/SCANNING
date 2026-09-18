<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - Masuk ke Sistem</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --primary: #1E2869;
            --primary-dark: #0F172A;
            --accent-orange: #FF8D28;
            --bg-gradient-start: #0B132B;
            --bg-gradient-mid: #1E2869;
            --bg-gradient-end: #0D1B2A;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-mid), var(--bg-gradient-end));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f8f9fa;
            position: relative;
            overflow-x: hidden;
        }

        /* Ambient Glowing Orbs Background */
        .glow-orb-1, .glow-orb-2 {
            position: fixed;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 0;
        }
        .glow-orb-1 {
            top: 10%;
            left: 20%;
            background: rgba(13, 110, 253, 0.2);
        }
        .glow-orb-2 {
            bottom: 10%;
            right: 20%;
            background: rgba(255, 141, 40, 0.15);
        }

        .login-container {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            z-index: 10;
            width: 100%;
            max-width: 1000px;
            margin: 20px;
        }

        .left-col {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.08), transparent);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .right-col {
            background: rgba(15, 26, 59, 0.8);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo-box {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 14px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .logo-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .feature-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 12px;
        }

        .form-control-custom {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
            border-radius: 16px;
            padding: 12px 16px 12px 45px;
            font-size: 15px;
            transition: all 0.3s;
        }
        .form-control-custom:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #60A5FA;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
            color: white;
        }
        .form-control-custom::placeholder {
            color: #94A3B8;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 18px;
            pointer-events: none;
            transition: color 0.3s;
        }
        
        .form-group-custom:focus-within .input-icon {
            color: #60A5FA;
        }

        .btn-toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            background: transparent;
            border: none;
            padding: 0;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s;
        }
        .btn-toggle-password:hover, .btn-toggle-password:focus {
            color: white;
            outline: none;
        }

        .btn-login {
            background: linear-gradient(to right, var(--accent-orange), #F97316);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 14px 24px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
            transition: all 0.2s;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-login:hover {
            background: linear-gradient(to right, #ff9b40, #ea580c);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(249, 115, 22, 0.4);
            color: white;
        }
        .btn-login:active {
            transform: translateY(1px);
        }

        .hint-box {
            background: rgba(30, 58, 138, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            padding: 16px;
            font-size: 12px;
            color: #94A3B8;
        }

        /* Mobile adjustments */
        @media (max-width: 991px) {
            .left-col {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding: 2rem;
            }
            .right-col {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Ambient Glowing Orbs Background -->
    <div class="glow-orb-1"></div>
    <div class="glow-orb-2"></div>

    <div class="login-container">
        <div class="row g-0 h-100">
            <!-- Left Column: Branding & Info -->
            <div class="col-lg-6 left-col">
                <div>
                    <!-- School & App Badge -->
                    <div class="d-flex align-items-center gap-3 mb-4 mb-lg-5">
                        <div class="logo-box">
                            <img src="{{ asset('sclg-removebg-preview.png') }}" alt="Logo SCANING">
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0 text-white fs-5" style="letter-spacing: 0.5px;">SCANNING</h2>
                            <p class="mb-0 text-info fw-medium" style="font-size: 13px; opacity: 0.9;">SMKN 1 Air Naningan</p>
                        </div>
                    </div>

                    <!-- Hero Headline -->
                    <div class="mb-4">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(249, 115, 22, 0.1); border: 1px solid rgba(249, 115, 22, 0.3); color: #fb923c; font-size: 12px; font-weight: 600;">
                            <i class="bi bi-shield-check"></i>
                            Portal Buku Induk & Sikap Siswa
                        </div>
                        <h1 class="fw-bolder text-white mb-3" style="font-size: clamp(24px, 4vw, 36px); line-height: 1.2;">
                            Pencatatan Poin & Prestasi Siswa Terpadu
                        </h1>
                        <p class="text-light" style="font-size: 15px; line-height: 1.6; opacity: 0.85;">
                            Sistem digital terintegrasi untuk monitoring kedisiplinan, poin pelanggaran, serta rekam jejak prestasi siswa secara transparan dan akurat.
                        </p>
                    </div>
                </div>

                <!-- Highlights / Features -->
                <div class="d-none d-sm-flex gap-3 pt-4 border-top border-secondary border-opacity-25 mt-4">
                    <div class="feature-box flex-fill">
                        <div class="text-warning mb-2 fs-5"><i class="bi bi-award-fill"></i></div>
                        <div class="fw-bold text-white mb-1" style="font-size: 13px;">Rekam Prestasi</div>
                        <div style="font-size: 11px; color: #94a3b8;">Poin penghargaan siswa</div>
                    </div>
                    <div class="feature-box flex-fill">
                        <div class="text-info mb-2 fs-5"><i class="bi bi-journal-check"></i></div>
                        <div class="fw-bold text-white mb-1" style="font-size: 13px;">Buku Induk Digital</div>
                        <div style="font-size: 11px; color: #94a3b8;">Data terpusat & real-time</div>
                    </div>
                </div>

                <div class="mt-4 text-secondary d-none d-lg-block" style="font-size: 12px;">
                    &copy; {{ date('Y') }} SMKN 1 Air Naningan.
                </div>
            </div>

            <!-- Right Column: Login Form -->
            <div class="col-lg-6 right-col">
                <div class="w-100 mx-auto" style="max-width: 400px;">
                    <div class="mb-5">
                        <h2 class="fw-bold text-white mb-2" style="font-size: clamp(24px, 3vw, 32px);">Selamat Datang</h2>
                        <p style="color: #94A3B8; font-size: 14px;">Silakan masukkan NIS dan kata sandi akun Anda untuk masuk.</p>
                    </div>

                    {{-- NOTIFIKASI SUKSES (MISAL SETELAH LOGOUT) --}}
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center gap-2 border-0 rounded-4" style="background: rgba(16, 185, 129, 0.15); color: #6EE7B7; box-shadow: inset 0 0 0 1px rgba(16, 185, 129, 0.3);">
                            <i class="bi bi-check-circle-fill fs-5"></i>
                            <div style="font-size: 14px;">{{ session('success') }}</div>
                        </div>
                    @endif

                    {{-- NOTIFIKASI ERROR --}}
                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger d-flex align-items-center gap-2 border-0 rounded-4" style="background: rgba(244, 63, 94, 0.15); color: #FDA4AF; box-shadow: inset 0 0 0 1px rgba(244, 63, 94, 0.3);">
                            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                            <div style="font-size: 14px;">{{ $errors->first() }}</div>
                        </div>
                    @endif

                    <!-- Form Login -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Input NIS -->
                        <div class="mb-4">
                            <label for="nis" class="form-label text-uppercase fw-bold" style="font-size: 11px; color: #cbd5e1; letter-spacing: 0.5px;">
                                Nomor Induk Siswa (NIS) / Akun
                            </label>
                            <div class="position-relative form-group-custom">
                                <i class="bi bi-person-badge input-icon"></i>
                                <input 
                                    type="text" 
                                    id="nis"
                                    name="nis" 
                                    value="{{ old('nis') }}" 
                                    placeholder="Contoh: 000000 atau NIS Siswa" 
                                    required
                                    autofocus
                                    class="form-control form-control-custom w-100">
                            </div>
                        </div>

                        <!-- Input Password with Show/Hide Toggle -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label mb-0 text-uppercase fw-bold" style="font-size: 11px; color: #cbd5e1; letter-spacing: 0.5px;">
                                    Kata Sandi
                                </label>
                            </div>
                            <div class="position-relative form-group-custom">
                                <i class="bi bi-lock input-icon"></i>
                                <input 
                                    type="password" 
                                    id="password"
                                    name="password" 
                                    placeholder="Masukkan kata sandi Anda" 
                                    required
                                    class="form-control form-control-custom w-100"
                                    style="padding-right: 45px;">
                                <button 
                                    type="button" 
                                    id="togglePasswordBtn"
                                    class="btn-toggle-password">
                                    <i class="bi bi-eye" id="togglePasswordIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-login mt-2">
                            <span>Masuk ke Akun</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>

                    <!-- Helpful Quick Hint Badge -->
                    <div class="mt-5 hint-box d-flex align-items-start gap-3">
                        <i class="bi bi-info-circle-fill text-info mt-1 fs-5"></i>
                        <div>
                            <strong class="text-info d-block mb-1" style="font-size: 13px;">Petunjuk Login:</strong>
                            Gunakan <span class="badge bg-light text-dark mx-1">NIS</span> Anda yang telah terdaftar resmi di sekolah beserta kata sandi akun Anda.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script for Show/Hide Password Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const togglePasswordBtn = document.getElementById('togglePasswordBtn');
            const passwordInput = document.getElementById('password');
            const togglePasswordIcon = document.getElementById('togglePasswordIcon');

            if (togglePasswordBtn && passwordInput && togglePasswordIcon) {
                togglePasswordBtn.addEventListener('click', () => {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    
                    if (isPassword) {
                        togglePasswordIcon.classList.remove('bi-eye');
                        togglePasswordIcon.classList.add('bi-eye-slash');
                    } else {
                        togglePasswordIcon.classList.remove('bi-eye-slash');
                        togglePasswordIcon.classList.add('bi-eye');
                    }
                });
            }
        });
    </script>
</body>
</html>