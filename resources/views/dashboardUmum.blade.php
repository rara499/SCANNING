<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - Dashboard Umum SMKN 1 Air Naningan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary: #1E2869;
            --primary-dark: #0F172A;
            --accent-blue: #2563EB;
            --accent-orange: #FF8D28;
            --bg-canvas: #F1F5F9;
            --card-surface: #FFFFFF;
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

        /* TOP NAVIGATION BAR */
        .navbar-main {
            background-color: var(--primary);
            color: #FFFFFF;
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
            color: white;
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
            font-size: 17px;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #93C5FD;
            font-weight: 500;
        }

        /* SEARCH BAR */
        .search-container-nav {
            position: relative;
            max-width: 260px;
            width: 100%;
        }

        .search-container-nav input {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: white;
            border-radius: 24px;
            padding: 8px 16px 8px 38px;
            font-size: 13px;
            font-weight: 500;
            width: 100%;
            outline: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .search-container-nav input::placeholder {
            color: rgba(203, 213, 225, 0.7);
            font-weight: 400;
        }

        .search-container-nav input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(96, 165, 250, 0.5);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15), 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .search-container-nav .search-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(203, 213, 225, 0.7);
            font-size: 13px;
            pointer-events: none;
        }

        /* BUTTONS IN NAVBAR */
        .btn-nav-action {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-nav-action:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-nav-logout {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.4);
            color: #FCA5A5;
        }

        .btn-nav-logout:hover {
            background: #EF4444;
            color: white;
        }
        /* FLOATING MENU BUTTON (FAB) */
        .fab-menu-btn {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, #1E2869, #2563EB);
            color: #FFFFFF;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(30, 40, 105, 0.45);
            z-index: 900;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
        }

        .fab-menu-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 28px rgba(37, 99, 235, 0.5);
        }

        .fab-menu-btn .fab-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: #EF4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 9px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }

        /* MAIN CONTENT LAYOUT */
        .main-wrapper {
            flex: 1;
            max-width: 1320px;
            width: 100%;
            margin: 0 auto;
            padding: 24px 16px 48px 16px;
        }

        /* HERO CARD */
        .hero-banner-card {
            background: linear-gradient(135deg, #1E2869 0%, #172554 50%, #0F172A 100%);
            border-radius: 20px;
            color: white;
            padding: 24px;
            box-shadow: 0 10px 25px -5px rgba(30, 40, 105, 0.3);
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-banner-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(255, 141, 40, 0.2) 0%, transparent 70%);
            pointer-events: none;
        }

        /* STATS WIDGETS */
        .stat-card {
            background: var(--card-surface);
            border-radius: 16px;
            padding: 18px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            border: 1px solid #E2E8F0;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            height: 100%;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .stat-icon-wrapper {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        /* QUICK SHORTCUT MENU CARDS */
        .shortcut-card {
            background: var(--card-surface);
            border-radius: 14px;
            padding: 16px;
            border: 1px solid #E2E8F0;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #1E293B;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .shortcut-card:hover {
            border-color: #3B82F6;
            background-color: #F8FAFC;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(59, 130, 246, 0.12);
            color: #1E40AF;
        }

        .shortcut-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
            flex-shrink: 0;
        }

        /* DATA TABLE CONTAINER */
        .table-card-container {
            background: var(--card-surface);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
            border: 1px solid #E2E8F0;
        }

        .table-custom {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table-custom thead th {
            background-color: #F8FAFC;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px;
            border-bottom: 2px solid #E2E8F0;
        }

        .table-custom tbody td {
            padding: 14px 16px;
            font-size: 13px;
            color: #334155;
            border-bottom: 1px solid #F1F5F9;
        }

        .table-custom tbody tr:hover {
            background-color: #F8FAFC;
        }

        /* BADGES */
        .badge-poin {
            font-size: 12px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-block;
        }
        .badge-poin-aman { background-color: #DCFCE7; color: #166534; }
        .badge-poin-waspada { background-color: #FEF9C3; color: #854D0E; }
        .badge-poin-bahaya { background-color: #FEE2E2; color: #991B1B; }

        /* AVATAR */
        .avatar-initial {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3B82F6, #1D4ED8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
        }

        /* MODAL OVERLAY MENU (Mobile / Quick Drawer) */
        .menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.85);
            backdrop-blur: 8px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            transform: translateY(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            visibility: hidden;
            pointer-events: none;
        }

        .menu-overlay.active {
            transform: translateY(0);
            visibility: visible;
            pointer-events: auto;
        }

        .menu-overlay-content {
            background: #0F172A;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0;
            max-height: 90vh;
            overflow-y: auto;
            border-bottom-left-radius: 24px;
            border-bottom-right-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        /* Hub Cards for overlay menu (matches sidebar_menu style) */
        .menu-overlay-hub-card {
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

        .menu-overlay-hub-card:hover {
            background: #FFFFFF;
            border-color: #2563EB;
            transform: translateY(-5px);
            box-shadow: 0 16px 32px rgba(37, 99, 235, 0.12);
            color: #1E293B;
        }

        .menu-overlay-icon-box {
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

        .menu-overlay-hub-card:hover .menu-overlay-icon-box {
            transform: scale(1.1);
        }

        .menu-overlay-title {
            font-weight: 700;
            font-size: 15px;
            color: #0F172A;
            line-height: 1.3;
        }

        .menu-overlay-desc {
            font-size: 12px;
            color: #64748B;
            font-weight: 500;
            line-height: 1.4;
        }
    </style>
</head>
<body>

    <!-- TOP NAVIGATION BAR -->
    <nav class="navbar-main">
        <div class="d-flex align-items-center justify-content-between max-w-7xl mx-auto w-100" style="max-width: 1320px;">
            
            <!-- Left: Brand Logo & Title -->
            <a href="{{ route('dashboardUmum') }}" class="navbar-brand-custom">
                <div class="brand-logo-box">
                    <img src="{{ asset('sclg-removebg-preview.png') }}" alt="Logo">
                </div>
                <div>
                    <div class="brand-title">SCANNING</div>
                    <div class="brand-subtitle d-none d-sm-block">SMKN 1 Air Naningan</div>
                </div>
            </a>

            <!-- Center/Right Controls -->
            <div class="d-flex align-items-center gap-2 gap-sm-3">
                
                <!-- Quick Search (Admin Only) -->
                @if(!auth('siswa')->check())
                <form action="{{ route('data.siswa') }}" method="GET" class="search-container-nav d-none d-md-block">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" name="search" placeholder="Cari nama atau NIS...">
                </form>

                <!-- Shortcut Data Siswa Button (Desktop) -->
                <a href="{{ route('data.siswa') }}" class="btn-nav-action d-none d-sm-inline-flex">
                    <i class="bi bi-people-fill"></i>
                    <span>Data Siswa</span>
                </a>
                @else
                <a href="{{ route('siswa.show', auth('siswa')->user()->nis) }}" class="btn-nav-action d-none d-sm-inline-flex">
                    <i class="bi bi-person-bounding-box"></i>
                    <span>Data Diri Saya</span>
                </a>
                @endif

                <!-- User Badge (Role Check) -->
                @if(auth('web')->check())
                    <span class="btn-nav-action d-none d-lg-inline-flex" style="background: rgba(245, 158, 11, 0.15); border-color: rgba(245, 158, 11, 0.3);">
                        <i class="bi bi-shield-lock-fill text-warning"></i>
                        <span>{{ ucfirst(auth()->user()->role) }}</span>
                    </span>
                @elseif(auth('siswa')->check())
                    <span class="btn-nav-action d-none d-lg-inline-flex" style="background: rgba(59, 130, 246, 0.15); border-color: rgba(59, 130, 246, 0.3);">
                        <i class="bi bi-person-circle text-info"></i>
                        <span>Siswa: {{ auth('siswa')->user()->nama_lengkap }}</span>
                    </span>
                @endif

                @php
                    $navPending = (auth()->check() && auth()->user()->role === 'admin') 
                        ? \App\Models\CatatanVerifikasi::where('status', 'menunggu')->count() 
                        : 0;
                @endphp

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
                    @csrf
                    <button type="submit" class="btn-nav-action btn-nav-logout" title="Logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="d-none d-sm-inline">Keluar</span>
                    </button>
                </form>

            </div>

        </div>
    </nav>

    <!-- FLOATING MENU BUTTON (FAB) -->
    <button type="button" id="openMenuBtn" class="fab-menu-btn position-fixed" title="Menu Lengkap">
        <i class="bi bi-three-dots-vertical"></i>
        @if($navPending > 0)
            <span class="fab-badge">{{ $navPending }}</span>
        @endif
    </button>

    <!-- MAIN DASHBOARD CONTENT -->
    <div class="main-wrapper">

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 text-white p-3 mb-4 shadow-sm" style="background: linear-gradient(135deg, #EF4444, #DC2626);" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-shield-lock-fill fs-4 me-2"></i>
                    <div>
                        <strong>Perhatian:</strong> {{ session('error') }}
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 text-white p-3 mb-4 shadow-sm" style="background: linear-gradient(135deg, #10B981, #059669);" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-4 me-2"></i>
                    <div>
                        <strong>Berhasil:</strong> {{ session('success') }}
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- HERO BANNER -->
        <div class="hero-banner-card">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-white/10 border border-white/20 text-xs font-semibold text-warning mb-3">
                        <i class="bi bi-award-fill"></i>
                        Buku Induk Digital & Pencatatan Karakter
                    </div>
                    @if(auth('siswa')->check())
                        <h1 class="fw-bold fs-3 fs-md-2 mb-2">Halo, {{ auth('siswa')->user()->nama_lengkap }}!</h1>
                        <p class="text-white-50 mb-4" style="max-width: 650px; font-size: 14px; line-height: 1.6;">
                            Selamat datang di Portal SCANNING. Saat ini Anda memiliki <strong class="text-warning">{{ auth('siswa')->user()->total_poin }} Poin Kedisiplinan</strong>. Terus pertahankan perilaku baik Anda di lingkungan sekolah!
                        </p>
                    @else
                        <h1 class="fw-bold fs-3 fs-md-2 mb-1">Selamat Datang di Portal SCANING</h1>
                        <div class="text-warning fw-semibold mb-3" style="font-size: 13px; letter-spacing: 0.3px;">
                            Student Character and Activity Network SMKN 1 Air Naningan
                        </div>
                        <p class="text-white-50 mb-4" style="max-width: 650px; font-size: 14px; line-height: 1.6;">
                            Sistem manajemen Buku Induk Digital siswa SMKN 1 Air Naningan. Pantau catatan perilaku, poin kedisiplinan, dan rekap prestasi secara transparan, mudah, dan akurat.
                        </p>
                    @endif
                    <div class="d-flex flex-wrap gap-2">
                        @if(auth('siswa')->check())
                        <a href="{{ route('siswa.show', auth('siswa')->user()->nis) }}" class="btn btn-warning btn-sm px-3 py-2 fw-bold text-dark rounded-3 d-inline-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-person-lines-fill"></i> Lihat Data Diri Saya
                        </a>
                        @else
                        <a href="{{ route('data.siswa') }}" class="btn btn-warning btn-sm px-3 py-2 fw-bold text-dark rounded-3 d-inline-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-search"></i> Lihat Data Seluruh Siswa
                        </a>
                        @endif
                        <button type="button" id="heroOpenMenuBtn" class="btn btn-outline-light btn-sm px-3 py-2 fw-semibold rounded-3 d-inline-flex align-items-center gap-2">
                            <i class="bi bi-grid"></i> Jelajahi Fitur Lainnya
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end d-none d-lg-block">
                    <img src="{{ asset('sclg-removebg-preview.png') }}" alt="SC Logo" class="img-fluid" style="max-height: 160px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));">
                </div>
            </div>
        </div>

        <!-- STATS WIDGETS (Admin Only) -->
        @if(!auth('siswa')->check())
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon-wrapper bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted text-uppercase" style="font-size: 11px; font-weight: 700;">Total Siswa</div>
                        <div class="fs-4 fw-bold text-dark">{{ $siswas->count() }}</div>
                        <div class="text-muted" style="font-size: 11px;">Terdaftar di database</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon-wrapper bg-info bg-opacity-10 text-info">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted text-uppercase" style="font-size: 11px; font-weight: 700;">Total Catatan</div>
                        <div class="fs-4 fw-bold text-dark">{{ $totalCatatan ?? 8 }} <span class="fs-6 fw-normal text-muted">Catatan</span></div>
                        <div class="text-muted" style="font-size: 11px;">
                            <span class="text-success fw-bold">{{ $disetujuiCount ?? 6 }} Setuju</span> &bull; 
                            <span class="text-warning fw-bold">{{ $usulanMenungguCount ?? 1 }} Nunggu</span> &bull; 
                            <span class="text-danger fw-bold">{{ $ditolakCount ?? 1 }} Tolak</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon-wrapper bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div>
                        <div class="text-muted text-uppercase" style="font-size: 11px; font-weight: 700;">Usulan Menunggu</div>
                        <div class="fs-4 fw-bold text-warning">{{ $usulanMenungguCount ?? 0 }}</div>
                        <div class="text-muted" style="font-size: 11px;">Perlu verifikasi admin</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon-wrapper bg-success bg-opacity-10 text-success">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <div class="text-muted text-uppercase" style="font-size: 11px; font-weight: 700;">Poin Aman (>=100)</div>
                        <div class="fs-4 fw-bold text-success">{{ $siswas->where('total_poin', '>=', 100)->count() }}</div>
                        <div class="text-muted" style="font-size: 11px;">Kedisiplinan prima</div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- QUICK SHORTCUT GRID (LAPTOP / DESKTOP FRIENDLY) -->
        <div class="mb-4">
            <h2 class="fs-6 fw-bold text-dark text-uppercase tracking-wider mb-3">
                <i class="bi bi-lightning-charge-fill text-warning me-1"></i> Menu Pintasan Cepat
            </h2>
            <div class="row g-2 g-md-3">
                <div class="col-6 col-md-4 col-lg-3">
                    @if(auth('siswa')->check())
                    <a href="{{ route('siswa.show', auth('siswa')->user()->nis) }}" class="shortcut-card">
                        <div class="shortcut-icon bg-primary">
                            <i class="bi bi-person-lines-fill"></i>
                        </div>
                        <div>
                            <div class="fw-bold" style="font-size: 13px;">Data Diri Saya</div>
                            <div class="text-muted" style="font-size: 11px;">Profil & poin pribadi</div>
                        </div>
                    </a>
                    @else
                    <a href="{{ route('data.siswa') }}" class="shortcut-card">
                        <div class="shortcut-icon bg-primary">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <div class="fw-bold" style="font-size: 13px;">Data Siswa</div>
                            <div class="text-muted" style="font-size: 11px;">Daftar & kelola siswa</div>
                        </div>
                    </a>
                    @endif
                </div>

                @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('usulan.verifikasi') }}" class="shortcut-card">
                        <div class="shortcut-icon bg-success">
                            <i class="bi bi-check2-circle"></i>
                        </div>
                        <div>
                            <div class="fw-bold" style="font-size: 13px;">Usulan Verifikasi</div>
                            <div class="text-muted" style="font-size: 11px;">Konfirmasi poin</div>
                        </div>
                    </a>
                </div>
                @endif

                @if(!auth('siswa')->check())
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('input.catatan') }}" class="shortcut-card">
                        <div class="shortcut-icon bg-warning">
                            <i class="bi bi-pencil-square text-dark"></i>
                        </div>
                        <div>
                            <div class="fw-bold" style="font-size: 13px;">Input Catatan</div>
                            <div class="text-muted" style="font-size: 11px;">Catat sikap siswa</div>
                        </div>
                    </a>
                </div>
                @endif

                @if(!auth('siswa')->check())
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('riwayat.catatan') }}" class="shortcut-card">
                        <div class="shortcut-icon bg-info">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <div class="fw-bold" style="font-size: 13px;">Riwayat Catatan</div>
                            <div class="text-muted" style="font-size: 11px;">Histori pelanggaran</div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- RECENT STUDENTS DATA TABLE -->
        <div class="table-card-container">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-3 pb-3 border-bottom">
                @if(auth('siswa')->check())
                <div>
                    <h3 class="fs-5 fw-bold text-dark mb-1">Data Pribadi & Kedisiplinan</h3>
                    <p class="text-muted mb-0" style="font-size: 12px;">Menampilkan ringkasan informasi data diri dan status poin kedisiplinan Anda.</p>
                </div>
                <div>
                    <a href="{{ route('siswa.show', auth('siswa')->user()->nis) }}" class="btn btn-outline-primary btn-sm rounded-3 fw-semibold">
                        Lihat Profil Lengkap <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                @else
                <div>
                    <h3 class="fs-5 fw-bold text-dark mb-1">Daftar Buku Induk Siswa</h3>
                    <p class="text-muted mb-0" style="font-size: 12px;">Menampilkan ringkasan seluruh siswa terdaftar dan perolehan poin saat ini.</p>
                </div>
                <div>
                    <a href="{{ route('data.siswa') }}" class="btn btn-outline-primary btn-sm rounded-3 fw-semibold">
                        Lihat Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-custom align-middle">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Status Poin</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswas as $s)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar-initial">
                                            {{ strtoupper(substr($s->nama_lengkap, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $s->nama_lengkap }}</div>
                                            <div class="text-muted" style="font-size: 11px;">{{ $s->jenis_kelamin }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark font-monospace border px-2 py-1">{{ $s->nis }}</span></td>
                                <td><span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2 py-1">{{ $s->kelas }}</span></td>
                                <td>
                                    @if($s->total_poin >= 100)
                                        <span class="badge-poin badge-poin-aman">
                                            <i class="bi bi-check-circle-fill me-1"></i> {{ $s->total_poin }} Poin
                                        </span>
                                    @elseif($s->total_poin >= 80)
                                        <span class="badge-poin badge-poin-waspada">
                                            <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $s->total_poin }} Poin
                                        </span>
                                    @else
                                        <span class="badge-poin badge-poin-bahaya">
                                            <i class="bi bi-x-circle-fill me-1"></i> {{ $s->total_poin }} Poin
                                        </span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('siswa.show', $s->nis) }}" class="btn btn-sm btn-light border px-2 py-1" title="Lihat Detail">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder2-open fs-1 text-secondary mb-2 d-block"></i>
                                    Belum ada data siswa. Silakan tambahkan siswa di menu <strong>Data Siswa</strong>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- FULLSCREEN / DRAWER MENU OVERLAY -->
    <div class="menu-overlay" id="menuOverlay">
        <div class="menu-overlay-content" style="background: transparent; border: none; box-shadow: none; max-height: 100vh; border-radius: 0;">
            
            <!-- Close Button (top right) -->
            <button type="button" class="btn btn-outline-light btn-sm rounded-circle position-fixed" id="closeMenuBtn" style="width: 42px; height: 42px; top: 16px; right: 16px; z-index: 10001;">
                <i class="bi bi-x-lg"></i>
            </button>

            <!-- Hero Header -->
            <div style="background: linear-gradient(135deg, var(--primary) 0%, #3b4db0 60%, #8B5CF6 100%); padding: 50px 0 90px; text-align: center;">
                <div class="container px-3">
                    <h2 style="font-weight: 800; font-size: 28px; color: #fff; margin-bottom: 10px; letter-spacing: -0.5px;">Menu Navigasi SCANNING</h2>
                    <p style="font-size: 14px; opacity: 0.85; max-width: 600px; margin: 0 auto; line-height: 1.6; color: #fff;">Pusat akses cepat modul pencatatan karakter, rekap data siswa, validasi poin, serta pengaturan profil pengguna SMKN 1 Air Naningan.</p>
                </div>
            </div>

            <!-- Menu Hub Cards Container -->
            <div style="max-width: 1050px; margin: -60px auto 40px; padding: 0 20px; position: relative; z-index: 10;">
                <div style="background: #FFFFFF; border-radius: 24px; padding: 36px 30px; box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08); border: 1px solid rgba(226, 232, 240, 0.8);">
                    
                    <div class="row g-3 g-md-4">

                        <!-- 1. Dashboard Umum -->
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('dashboardUmum') }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #2563EB, #1D4ED8);">
                                    <i class="bi bi-speedometer2"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Dashboard Umum</div>
                                    <div class="menu-overlay-desc">Ringkasan sistem</div>
                                </div>
                            </a>
                        </div>

                        <!-- 2. Data Siswa / Data Diri -->
                        <div class="col-6 col-md-4 col-lg-3">
                            @if(auth('siswa')->check())
                            <a href="{{ route('siswa.show', auth('siswa')->user()->nis) }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #06B6D4, #0891B2);">
                                    <i class="bi bi-person-lines-fill"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Data Diri Saya</div>
                                    <div class="menu-overlay-desc">Profil & buku poin</div>
                                </div>
                            </a>
                            @else
                            <a href="{{ route('data.siswa') }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #06B6D4, #0891B2);">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Data Siswa</div>
                                    <div class="menu-overlay-desc">Buku induk siswa</div>
                                </div>
                            </a>
                            @endif
                        </div>

                        <!-- 3. Usulan Verifikasi -->
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('usulan.verifikasi') }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #10B981, #059669);">
                                    <i class="bi bi-clipboard-check-fill"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Usulan Verifikasi</div>
                                    <div class="menu-overlay-desc">Validasi poin</div>
                                </div>
                            </a>
                        </div>

                        <!-- 4. Dashboard Verifikasi -->
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('dashboard.verifikasi') }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #F59E0B, #D97706);">
                                    <i class="bi bi-shield-shaded"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Dashboard Verifikasi</div>
                                    <div class="menu-overlay-desc">Status usulan</div>
                                </div>
                            </a>
                        </div>

                        <!-- 5. Verifikasi Catatan -->
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('verifikasi.catatan') }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #8B5CF6, #6D28D9);">
                                    <i class="bi bi-journal-check"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Verifikasi Catatan</div>
                                    <div class="menu-overlay-desc">Pemeriksaan catatan</div>
                                </div>
                            </a>
                        </div>
                        @endif

                        <!-- 6. Form Input (Admin Only) -->
                        @if(!auth('siswa')->check())
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('input.catatan') }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #EC4899, #DB2777);">
                                    <i class="bi bi-pencil-square"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Form Input</div>
                                    <div class="menu-overlay-desc">Catat prestasi/pelanggaran</div>
                                </div>
                            </a>
                        </div>
                        @endif

                        <!-- 7. Riwayat Catatan -->
                        @if(!auth('siswa')->check())
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('riwayat.catatan') }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #14B8A6, #0D9488);">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Riwayat Catatan</div>
                                    <div class="menu-overlay-desc">Histori buku sikap</div>
                                </div>
                            </a>
                        </div>
                        @endif

                        <!-- 8. Profil Pengguna -->
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('profil') }}" class="menu-overlay-hub-card">
                                <div class="menu-overlay-icon-box" style="background: linear-gradient(135deg, #64748B, #475569);">
                                    <i class="bi bi-person-badge"></i>
                                </div>
                                <div>
                                    <div class="menu-overlay-title">Profil Pengguna</div>
                                    <div class="menu-overlay-desc">Akun & kredensial</div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Footer in overlay -->
            <div style="text-align: center; font-size: 12px; color: #94A3B8; padding-bottom: 24px;">
                &copy; {{ date('Y') }} SCANNING – SMKN 1 Air Naningan. Hak Cipta Dilindungi.
            </div>

        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const openMenuBtn = document.getElementById('openMenuBtn');
            const heroOpenMenuBtn = document.getElementById('heroOpenMenuBtn');
            const closeMenuBtn = document.getElementById('closeMenuBtn');
            const menuOverlay = document.getElementById('menuOverlay');

            function toggleOverlay(open) {
                if (menuOverlay) {
                    if (open) {
                        menuOverlay.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    } else {
                        menuOverlay.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                }
            }

            if (openMenuBtn) openMenuBtn.addEventListener('click', () => toggleOverlay(true));
            if (heroOpenMenuBtn) heroOpenMenuBtn.addEventListener('click', () => toggleOverlay(true));
            if (closeMenuBtn) closeMenuBtn.addEventListener('click', () => toggleOverlay(false));

            // Close on background click
            if (menuOverlay) {
                menuOverlay.addEventListener('click', (e) => {
                    if (e.target === menuOverlay) toggleOverlay(false);
                });
            }
        });
    </script>
</body>
</html>