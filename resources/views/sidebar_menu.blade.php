<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Navigasi – SCANNING SMKN 1 Air Naningan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary:       #1E2869;
            --primary-dark:  #0F172A;
            --accent-blue:   #2563EB;
            --accent-orange: #FF8D28;
            --bg-canvas:     #F1F5F9;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--bg-canvas);
            color: #1E293B;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .navbar-main {
            background: var(--primary);
            color: #fff;
            padding: 12px 20px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #fff;
        }

        .brand-logo-box {
            width: 40px;
            height: 40px;
            background: #FFFFFF;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            flex-shrink: 0;
        }

        .brand-logo-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-title {
            font-weight: 800;
            font-size: 16px;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #93C5FD;
            font-weight: 500;
        }

        .nav-btn {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 8px;
            padding: 7px 14px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
            transform: translateY(-1px);
        }

        /* PAGE HEADER HERO */
        .page-header {
            background: linear-gradient(135deg, var(--primary) 0%, #3b4db0 60%, #8B5CF6 100%);
            color: #fff;
            padding: 50px 0 90px;
            text-align: center;
            position: relative;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: 30px;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .page-header p {
            font-size: 14px;
            opacity: 0.85;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* MAIN CONTAINER & HUB CARDS */
        .menu-container {
            max-width: 1050px;
            margin: -60px auto 60px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .menu-card-wrapper {
            background: #FFFFFF;
            border-radius: 24px;
            padding: 36px 30px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .menu-hub-card {
            background: #F8FAFC;
            border: 1.5px solid #E2E8F0;
            border-radius: 20px;
            padding: 24px 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            color: #1E293B;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 12px;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .menu-hub-card:hover {
            background: #FFFFFF;
            border-color: var(--accent-blue);
            transform: translateY(-5px);
            box-shadow: 0 16px 32px rgba(37, 99, 235, 0.12);
            color: #1E293B;
        }

        .menu-icon-box {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: #FFFFFF;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transition: transform 0.28s ease;
        }

        .menu-hub-card:hover .menu-icon-box {
            transform: scale(1.1);
        }

        .menu-title {
            font-weight: 700;
            font-size: 15px;
            color: #0F172A;
            line-height: 1.3;
        }

        .menu-desc {
            font-size: 12px;
            color: #64748B;
            font-weight: 500;
            line-height: 1.4;
        }

        /* GRADIENT ICON THEMES */
        .icon-blue     { background: linear-gradient(135deg, #2563EB, #1D4ED8); }
        .icon-cyan     { background: linear-gradient(135deg, #06B6D4, #0891B2); }
        .icon-green    { background: linear-gradient(135deg, #10B981, #059669); }
        .icon-yellow   { background: linear-gradient(135deg, #F59E0B, #D97706); }
        .icon-purple   { background: linear-gradient(135deg, #8B5CF6, #6D28D9); }
        .icon-pink     { background: linear-gradient(135deg, #EC4899, #DB2777); }
        .icon-teal     { background: linear-gradient(135deg, #14B8A6, #0D9488); }
        .icon-slate    { background: linear-gradient(135deg, #64748B, #475569); }

        /* FOOTER */
        .footer-text {
            text-align: center;
            font-size: 12px;
            color: #94A3B8;
            padding-bottom: 24px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar-main d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboardUmum') }}" class="navbar-brand-custom">
            <div class="brand-logo-box">
                <img src="{{ asset('sclg-removebg-preview.png') }}" alt="Logo">
            </div>
            <div>
                <div class="brand-title">SCANNING</div>
                <div class="brand-subtitle">SMKN 1 Air Naningan</div>
            </div>
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('dashboardUmum') }}" class="nav-btn">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('profil') }}" class="nav-btn">
                <i class="bi bi-person-circle"></i> Profil
            </a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                @csrf
                <button type="submit" class="nav-btn border-0 text-white" style="background: rgba(239, 68, 68, 0.85); cursor: pointer;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- PAGE HERO HEADER -->
    <div class="page-header">
        <div class="container px-3">
            <h1>Menu Navigasi SCANNING</h1>
            <p>Pusat akses cepat modul pencatatan karakter, rekap data siswa, validasi poin, serta pengaturan profil pengguna SMKN 1 Air Naningan.</p>
        </div>
    </div>

    <!-- MAIN MENU HUB CONTAINER -->
    <div class="menu-container">
        <div class="menu-card-wrapper">
            
            <div class="row g-3 g-md-4">
                
                <!-- 1. Dashboard Umum -->
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('dashboardUmum') }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-blue">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <div>
                            <div class="menu-title">Dashboard Umum</div>
                            <div class="menu-desc">Ringkasan sistem</div>
                        </div>
                    </a>
                </div>

                <!-- 2. Data Siswa / Data Diri -->
                <div class="col-6 col-md-4 col-lg-3">
                    @if(auth('siswa')->check())
                    <a href="{{ route('siswa.show', auth('siswa')->user()->nis) }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-cyan">
                            <i class="bi bi-person-lines-fill"></i>
                        </div>
                        <div>
                            <div class="menu-title">Data Diri Saya</div>
                            <div class="menu-desc">Profil & buku poin</div>
                        </div>
                    </a>
                    @else
                    <a href="{{ route('data.siswa') }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-cyan">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <div class="menu-title">Data Siswa</div>
                            <div class="menu-desc">Buku induk siswa</div>
                        </div>
                    </a>
                    @endif
                </div>

                <!-- 3. Usulan Verifikasi -->
                @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('usulan.verifikasi') }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-green">
                            <i class="bi bi-clipboard-check-fill"></i>
                        </div>
                        <div>
                            <div class="menu-title">Usulan Verifikasi</div>
                            <div class="menu-desc">Validasi poin</div>
                        </div>
                    </a>
                </div>
                @endif

                <!-- 4. Dashboard Verifikasi -->
                @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('dashboard.verifikasi') }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-yellow">
                            <i class="bi bi-shield-shaded"></i>
                        </div>
                        <div>
                            <div class="menu-title">Dashboard Verifikasi</div>
                            <div class="menu-desc">Status usulan</div>
                        </div>
                    </a>
                </div>
                @endif

                <!-- 5. Verifikasi Catatan -->
                @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('verifikasi.catatan') }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-purple position-relative">
                            <i class="bi bi-journal-check"></i>
                            @if(isset($pendingCatatan) && $pendingCatatan > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px; border: 2px solid white;">
                                    {{ $pendingCatatan }}
                                </span>
                            @endif
                        </div>
                        <div>
                            <div class="menu-title">Verifikasi Catatan</div>
                            <div class="menu-desc">Pemeriksaan catatan</div>
                        </div>
                    </a>
                </div>
                @endif

                <!-- 6. Form Input -->
                @if(!auth('siswa')->check())
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('input.catatan') }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-pink">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <div>
                            <div class="menu-title">Form Input</div>
                            <div class="menu-desc">Catat prestasi/pelanggaran</div>
                        </div>
                    </a>
                </div>
                @endif

                <!-- 7. Riwayat Catatan -->
                @if(!auth('siswa')->check())
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('riwayat.catatan') }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-teal">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <div class="menu-title">Riwayat Catatan</div>
                            <div class="menu-desc">Histori buku sikap</div>
                        </div>
                    </a>
                </div>
                @endif

                <!-- 8. Profil Pengguna -->
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('profil') }}" class="menu-hub-card">
                        <div class="menu-icon-box icon-slate">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div>
                            <div class="menu-title">Profil Pengguna</div>
                            <div class="menu-desc">Akun & kredensial</div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer-text">
        &copy; {{ date('Y') }} SCANNING – SMKN 1 Air Naningan. Hak Cipta Dilindungi.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>