<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Usulan Verifikasi - SCANNING SMKN 1 Air Naningan</title>
    <meta name="description" content="Halaman daftar dan verifikasi usulan poin prestasi maupun pelanggaran siswa.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary:        #1E2869;
            --primary-dark:   #0F172A;
            --accent-blue:    #2563EB;
            --accent-orange:  #FF8D28;
            --bg-canvas:      #F1F5F9;
            --card-surface:   #FFFFFF;
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

        .navbar-main {
            background-color: var(--primary);
            color: #FFFFFF;
            padding: 12px 24px;
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
            color: #FFFFFF;
            transition: opacity 0.2s ease;
        }
        .navbar-brand-custom:hover { opacity: 0.9; color: #FFFFFF; }

        .brand-logo-box {
            width: 40px;
            height: 40px;
            background: #FFFFFF;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            flex-shrink: 0;
        }
        .brand-logo-box img { width: 100%; height: 100%; object-fit: contain; }

        .brand-title { font-size: 15px; font-weight: 800; letter-spacing: 0.5px; line-height: 1.2; color: #FFFFFF; }
        .brand-subtitle { font-size: 11px; font-weight: 500; color: rgba(255,255,255,0.7); line-height: 1.2; }

        .btn-nav-action {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #FFFFFF;
            border-radius: 10px;
            padding: 7px 14px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        .btn-nav-action:hover {
            background: rgba(255, 255, 255, 0.22);
            color: #FFFFFF;
            transform: translateY(-1px);
        }
        .btn-nav-logout {
            background: rgba(239, 68, 68, 0.85);
            border-color: rgba(239, 68, 68, 0.4);
            cursor: pointer;
        }
        .btn-nav-logout:hover {
            background: #DC2626;
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .page-hero {
            background: linear-gradient(135deg, var(--primary) 0%, #2a3990 60%, var(--accent-blue) 100%);
            color: #fff;
            padding: 32px 0 24px;
        }
        .page-hero h1 { font-size: 22px; font-weight: 800; margin-bottom: 4px; }
        .page-hero p  { font-size: 13px; opacity: 0.8; }

        .stat-card {
            border-radius: 14px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            color: #fff;
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.18); }
        .stat-icon {
            width: 48px; height: 48px; border-radius: 12px;
            background: rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
        }
        .stat-label { font-size: 12px; font-weight: 500; opacity: 0.85; }
        .stat-value { font-size: 28px; font-weight: 800; line-height: 1; }

        .stat-total     { background: linear-gradient(135deg, #1E2869, #2a3990); }
        .stat-menunggu  { background: linear-gradient(135deg, #D97706, #F59E0B); }
        .stat-disetujui { background: linear-gradient(135deg, #059669, #10B981); }
        .stat-ditolak   { background: linear-gradient(135deg, #DC2626, #EF4444); }

        .filter-card {
            background: #fff;
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            margin-bottom: 16px;
        }

        .table-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
            overflow: hidden;
        }
        .table-card .table { margin: 0; font-size: 13px; }
        .table-card .table thead th {
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 16px;
            border: none;
        }
        .table-card .table tbody tr {
            transition: background 0.15s;
            border-bottom: 1px solid #F1F5F9;
        }
        .table-card .table tbody tr:hover { background-color: #F8FAFF; }
        .table-card .table tbody td { padding: 12px 16px; vertical-align: middle; border: none; }

        .badge-jenis       { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; letter-spacing: 0.3px; }
        .badge-prestasi    { background: #EFF6FF; color: #1D4ED8; }
        .badge-pelanggaran { background: #FEF2F2; color: #DC2626; }
        .badge-menunggu    { background: #FFFBEB; color: #92400E; border: 1px solid #FCD34D; }
        .badge-disetujui   { background: #ECFDF5; color: #065F46; border: 1px solid #6EE7B7; }
        .badge-ditolak     { background: #FEF2F2; color: #991B1B; border: 1px solid #FCA5A5; }

        .poin-badge       { display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 8px; font-weight: 700; font-size: 13px; }
        .poin-prestasi    { background: #EFF6FF; color: #1D4ED8; }
        .poin-pelanggaran { background: #FFF7ED; color: #C2410C; }

        .btn-aksi    { border-radius: 8px; padding: 5px 12px; font-size: 12px; font-weight: 600; border: none; transition: all 0.2s; cursor: pointer; }
        .btn-setujui { background: #ECFDF5; color: #065F46; border: 1px solid #6EE7B7; }
        .btn-setujui:hover { background: #059669; color: #fff; border-color: #059669; }
        .btn-tolak   { background: #FEF2F2; color: #991B1B; border: 1px solid #FCA5A5; }
        .btn-tolak:hover   { background: #DC2626; color: #fff; border-color: #DC2626; }
        .btn-hapus   { background: #F8FAFC; color: #64748B; border: 1px solid #CBD5E1; }
        .btn-hapus:hover   { background: #EF4444; color: #fff; border-color: #EF4444; }

        .btn-add-usulan {
            background: linear-gradient(135deg, var(--accent-orange), #FF6B00);
            color: #fff; border: none; border-radius: 10px;
            padding: 9px 20px; font-size: 13px; font-weight: 700;
            display: flex; align-items: center; gap: 8px;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(255,141,40,0.35);
            cursor: pointer; width: 100%; justify-content: center;
        }
        .btn-add-usulan:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(255,141,40,0.45); color: #fff; }

        .empty-state { padding: 60px 20px; text-align: center; color: #94A3B8; }
        .empty-state i { font-size: 48px; margin-bottom: 12px; display: block; }
        .empty-state p { font-size: 14px; }

        .alert-floating {
            position: fixed; top: 80px; right: 20px; z-index: 9999;
            min-width: 300px; border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { transform: translateX(120%); opacity: 0; }
            to   { transform: translateX(0);    opacity: 1; }
        }

        .modal-content { border-radius: 16px; overflow: hidden; border: none; }
        .modal-header-primary { background: linear-gradient(135deg, var(--primary), #2a3990); color: #fff; padding: 18px 24px; }
        .modal-header-success { background: linear-gradient(135deg, #059669, #10B981); color: #fff; padding: 18px 24px; }
        .modal-header-danger  { background: linear-gradient(135deg, #DC2626, #EF4444); color: #fff; padding: 18px 24px; }
        .modal-header-warning { background: linear-gradient(135deg, #D97706, #F59E0B); color: #fff; padding: 18px 24px; }
        .modal-header-primary .btn-close,
        .modal-header-success .btn-close,
        .modal-header-danger  .btn-close,
        .modal-header-warning .btn-close { filter: brightness(0) invert(1); }

        .form-label-custom {
            font-size: 12px; font-weight: 600; color: #475569;
            margin-bottom: 5px; text-transform: uppercase; letter-spacing: 0.4px;
            display: block;
        }
        .form-control-custom, .form-select-custom {
            border-radius: 10px; border: 1.5px solid #E2E8F0;
            font-size: 13px; padding: 9px 14px; transition: all 0.2s;
            width: 100%;
        }
        .form-control-custom:focus, .form-select-custom:focus {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
            outline: none;
        }
        .nis-preview {
            background: #F8FAFC; border: 1.5px solid #E2E8F0;
            border-radius: 10px; padding: 10px 14px;
            font-size: 13px; color: #475569; min-height: 40px;
        }

        @media (max-width: 768px) {
            .stat-card .stat-value { font-size: 22px; }
            .page-hero h1 { font-size: 18px; }
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar-main">
        <div class="d-flex align-items-center justify-content-between max-w-7xl mx-auto w-100">
            <a href="{{ route('dashboardUmum') }}" class="navbar-brand-custom">
                <div class="brand-logo-box">
                    <img src="{{ asset('sclg-removebg-preview.png') }}" alt="Logo SCANNING">
                </div>
                <div>
                    <div class="brand-title">SCANNING</div>
                    <div class="brand-subtitle d-none d-sm-block">SMKN 1 Air Naningan</div>
                </div>
            </a>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('dashboardUmum') }}" class="btn-nav-action">
                    <i class="bi bi-speedometer2"></i>
                    <span class="d-none d-sm-inline">Dashboard</span>
                </a>
                <a href="{{ route('data.siswa') }}" class="btn-nav-action">
                    <i class="bi bi-people-fill"></i>
                    <span class="d-none d-sm-inline">Data Siswa</span>
                </a>
                <a href="{{ route('sidebar_menu') }}" class="btn-nav-action">
                    <i class="bi bi-grid-fill"></i>
                    <span class="d-none d-sm-inline">Menu</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                    @csrf
                    <button type="submit" class="btn-nav-action btn-nav-logout" title="Keluar">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="d-none d-sm-inline">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    {{-- PAGE HERO --}}
    <div class="page-hero">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center gap-3 mb-2">
                <div style="width:44px;height:44px;background:rgba(255,255,255,0.15);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:22px;">
                    &#128203;
                </div>
                <div>
                    <h1>Daftar Usulan Verifikasi</h1>
                    <p>Kelola usulan poin prestasi dan pelanggaran dari guru / wali kelas</p>
                </div>
            </div>
        </div>
    </div>

    {{-- FLOATING ALERTS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible alert-floating" role="alert" id="alertSuccess">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible alert-floating" role="alert" id="alertError">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- MAIN CONTENT --}}
    <div class="container-fluid px-4 py-4 flex-grow-1">

        {{-- STATISTIK --}}
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card stat-total">
                    <div class="stat-icon"><i class="bi bi-clipboard-data"></i></div>
                    <div>
                        <div class="stat-label">Total Usulan</div>
                        <div class="stat-value">{{ $stats['total'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-menunggu">
                    <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
                    <div>
                        <div class="stat-label">Menunggu</div>
                        <div class="stat-value">{{ $stats['menunggu'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-disetujui">
                    <div class="stat-icon"><i class="bi bi-check-circle"></i></div>
                    <div>
                        <div class="stat-label">Disetujui</div>
                        <div class="stat-value">{{ $stats['disetujui'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-ditolak">
                    <div class="stat-icon"><i class="bi bi-x-circle"></i></div>
                    <div>
                        <div class="stat-label">Ditolak</div>
                        <div class="stat-value">{{ $stats['ditolak'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FILTER & SEARCH --}}
        <div class="filter-card">
            <form method="GET" action="{{ route('usulan.verifikasi') }}" id="filterForm">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-5 col-lg-5">
                        <label class="fw-semibold" style="font-size:12px;color:#475569;display:block;margin-bottom:5px;">Cari Usulan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white" style="border-radius:10px 0 0 10px;border:1.5px solid #E2E8F0;border-right:none;">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" name="search" id="inputSearch"
                                   class="form-control"
                                   placeholder="Cari nama, NIS, pengusul, keterangan... (tekan Enter)"
                                   value="{{ request('search') }}"
                                   style="border-radius:0 10px 10px 0;border:1.5px solid #E2E8F0;border-left:none;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3">
                        <label class="fw-semibold" style="font-size:12px;color:#475569;display:block;margin-bottom:5px;">Filter Jenis</label>
                        <select name="jenis" id="filterJenis" class="form-select" onchange="this.form.submit()"
                                style="border-radius:10px;border:1.5px solid #E2E8F0;font-size:13px;">
                            <option value="">Semua Jenis</option>
                            <option value="prestasi"    {{ request('jenis') == 'prestasi'    ? 'selected' : '' }}>Prestasi</option>
                            <option value="pelanggaran" {{ request('jenis') == 'pelanggaran' ? 'selected' : '' }}>Pelanggaran</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            @if(request('search') || request('jenis'))
                                <a href="{{ route('usulan.verifikasi') }}" class="btn btn-outline-secondary fw-semibold d-flex align-items-center justify-content-center"
                                   title="Reset Pencarian & Filter"
                                   style="border-radius:10px;font-size:13px;padding:9px 14px;white-space:nowrap;">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                                </a>
                            @endif
                            <button type="button" onclick="printDataUsulan()" class="btn btn-info fw-semibold text-white flex-grow-1"
                                    style="border-radius:10px;font-size:13px;padding:9px;box-shadow: 0 4px 12px rgba(13, 202, 240, 0.2);">
                                <i class="bi bi-printer-fill me-1"></i> Print
                            </button>
                            <button type="button" class="btn-add-usulan flex-grow-1" id="btnTambahUsulan"
                                    data-bs-toggle="modal" data-bs-target="#modalTambahUsulan">
                                <i class="bi bi-plus-circle-fill"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- TABLE --}}
        <div class="table-card">
            <div class="table-responsive">
                <table class="table" id="tabelUsulan">
                    <thead>
                        <tr>
                            <th style="width:45px;">#</th>
                            <th>Siswa</th>
                            <th>Pengusul</th>
                            <th>Jenis</th>
                            <th style="width:80px;">Poin</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Catatan Verifikasi</th>
                            <th>Tanggal</th>
                            <th style="width:160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usulans as $index => $usulan)
                            <tr>
                                <td class="text-muted" style="font-size:12px;">{{ $usulans->firstItem() + $index }}</td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $usulan->siswa?->nama_lengkap ?? '—' }}</div>
                                    <div class="text-muted" style="font-size:11px;">NIS: {{ $usulan->nis }}</div>
                                    @if($usulan->siswa?->kelas)
                                        <div class="text-muted" style="font-size:11px;">{{ $usulan->siswa->kelas }}</div>
                                    @endif
                                </td>
                                <td style="font-size:13px;">{{ $usulan->nama_pengusul }}</td>
                                <td>
                                    <span class="badge-jenis {{ $usulan->jenis === 'prestasi' ? 'badge-prestasi' : 'badge-pelanggaran' }}">
                                        {{ $usulan->jenis === 'prestasi' ? 'Prestasi' : 'Pelanggaran' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="poin-badge {{ $usulan->jenis === 'prestasi' ? 'poin-prestasi' : 'poin-pelanggaran' }}">
                                        {{ $usulan->jenis === 'prestasi' ? '+' : '-' }}{{ $usulan->poin }}
                                    </span>
                                </td>
                                <td style="max-width:200px;">
                                    <span style="font-size:12px;color:#334155;" title="{{ $usulan->keterangan }}">
                                        {{ Str::limit($usulan->keterangan, 60) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-jenis
                                        @if($usulan->status === 'menunggu')    badge-menunggu
                                        @elseif($usulan->status === 'disetujui') badge-disetujui
                                        @else badge-ditolak
                                        @endif">
                                        @if($usulan->status === 'menunggu')    Menunggu
                                        @elseif($usulan->status === 'disetujui') Disetujui
                                        @else Ditolak
                                        @endif
                                    </span>
                                </td>
                                <td style="font-size:12px;color:#64748B;max-width:160px;">
                                    {{ $usulan->catatan_verifikasi ? Str::limit($usulan->catatan_verifikasi, 50) : '—' }}
                                    @if($usulan->verified_at)
                                        <div style="font-size:10px;color:#94A3B8;margin-top:2px;">
                                            {{ \Carbon\Carbon::parse($usulan->verified_at)->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                                        </div>
                                    @endif
                                </td>
                                <td style="font-size:12px;color:#64748B;">
                                    {{ \Carbon\Carbon::parse($usulan->created_at)->timezone('Asia/Jakarta')->format('d M Y') }}
                                    <div style="font-size:10px;color:#94A3B8;">{{ \Carbon\Carbon::parse($usulan->created_at)->timezone('Asia/Jakarta')->format('H:i') }}</div>
                                </td>
                                <td>
                                    <div class="d-flex gap-1 flex-wrap">
                                        @if($usulan->status === 'menunggu')
                                            <button class="btn-aksi btn-setujui"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalSetujui{{ $usulan->id }}"
                                                    id="btnSetujui{{ $usulan->id }}">
                                                <i class="bi bi-check-lg"></i> Setujui
                                            </button>
                                            <button class="btn-aksi btn-tolak"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalTolak{{ $usulan->id }}"
                                                    id="btnTolak{{ $usulan->id }}">
                                                <i class="bi bi-x-lg"></i> Tolak
                                            </button>
                                            <button class="btn-aksi btn-hapus"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalHapus{{ $usulan->id }}"
                                                    id="btnHapus{{ $usulan->id }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        @else
                                            <span class="text-muted" style="font-size:11px;font-style:italic;">Sudah diproses</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            {{-- MODALS per baris --}}
                            @if($usulan->status === 'menunggu')

                            {{-- MODAL SETUJUI --}}
                            <div class="modal fade" id="modalSetujui{{ $usulan->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header-success d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-check-circle-fill fs-5"></i>
                                                <h5 class="modal-title mb-0 fw-bold fs-6">Setujui Usulan</h5>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="p-3 rounded-3 mb-3" style="background:#F0FDF4;border:1px solid #BBF7D0;">
                                                <div class="fw-semibold" style="font-size:13px;color:#065F46;">{{ $usulan->siswa?->nama_lengkap ?? $usulan->nis }}</div>
                                                <div style="font-size:12px;color:#047857;">{{ ucfirst($usulan->jenis) }} &bull; {{ $usulan->jenis === 'prestasi' ? '+' : '-' }}{{ $usulan->poin }} poin</div>
                                                <div style="font-size:12px;color:#6B7280;margin-top:4px;">{{ $usulan->keterangan }}</div>
                                            </div>
                                            <p style="font-size:13px;color:#374151;">Dengan menyetujui usulan ini, poin siswa akan diperbarui secara otomatis.</p>
                                            <form action="{{ route('usulan.proses', $usulan->id) }}" method="POST" id="formSetujui{{ $usulan->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="aksi" value="disetujui">
                                                <div class="mt-3">
                                                    <label class="form-label-custom">Catatan (opsional)</label>
                                                    <textarea name="catatan_verifikasi" class="form-control form-control-custom" rows="2" placeholder="Catatan verifikasi..."></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer bg-light py-3 px-4 gap-2">
                                            <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" form="formSetujui{{ $usulan->id }}" class="btn btn-success rounded-3 px-4 fw-bold">
                                                <i class="bi bi-check-lg me-1"></i> Setujui &amp; Perbarui Poin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MODAL TOLAK --}}
                            <div class="modal fade" id="modalTolak{{ $usulan->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header-danger d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-x-circle-fill fs-5"></i>
                                                <h5 class="modal-title mb-0 fw-bold fs-6">Tolak Usulan</h5>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="p-3 rounded-3 mb-3" style="background:#FEF2F2;border:1px solid #FECACA;">
                                                <div class="fw-semibold" style="font-size:13px;color:#991B1B;">{{ $usulan->siswa?->nama_lengkap ?? $usulan->nis }}</div>
                                                <div style="font-size:12px;color:#DC2626;">{{ ucfirst($usulan->jenis) }} &bull; {{ $usulan->poin }} poin</div>
                                                <div style="font-size:12px;color:#6B7280;margin-top:4px;">{{ $usulan->keterangan }}</div>
                                            </div>
                                            <form action="{{ route('usulan.proses', $usulan->id) }}" method="POST" id="formTolak{{ $usulan->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="aksi" value="ditolak">
                                                <div class="mt-2">
                                                    <label class="form-label-custom">Alasan Penolakan <span class="text-danger">*</span></label>
                                                    <textarea name="catatan_verifikasi" class="form-control form-control-custom" rows="3" placeholder="Tuliskan alasan penolakan..." required></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer bg-light py-3 px-4 gap-2">
                                            <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" form="formTolak{{ $usulan->id }}" class="btn btn-danger rounded-3 px-4 fw-bold">
                                                <i class="bi bi-x-lg me-1"></i> Tolak Usulan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MODAL HAPUS --}}
                            <div class="modal fade" id="modalHapus{{ $usulan->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header-warning d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-trash3-fill fs-5"></i>
                                                <h5 class="modal-title mb-0 fw-bold fs-6">Hapus Usulan</h5>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4 text-center">
                                            <div style="font-size:48px;margin-bottom:12px;">&#128465;</div>
                                            <p style="font-size:14px;color:#374151;">
                                                Yakin ingin menghapus usulan dari
                                                <strong>{{ $usulan->siswa?->nama_lengkap ?? $usulan->nis }}</strong>?
                                            </p>
                                            <p style="font-size:12px;color:#94A3B8;margin-top:6px;">Tindakan ini tidak dapat dibatalkan.</p>
                                            <form action="{{ route('usulan.hapus', $usulan->id) }}" method="POST" id="formHapus{{ $usulan->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                        <div class="modal-footer bg-light py-3 px-4 justify-content-center gap-2">
                                            <button type="button" class="btn btn-secondary rounded-3 px-4" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" form="formHapus{{ $usulan->id }}" class="btn btn-danger rounded-3 px-4 fw-bold">
                                                <i class="bi bi-trash3 me-1"></i> Ya, Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif

                        @empty
                            <tr>
                                <td colspan="10">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox"></i>
                                        <p class="fw-semibold" style="color:#475569;font-size:15px;">Belum ada usulan ditemukan</p>
                                        <p>Tidak ada data usulan yang sesuai dengan kriteria filter/pencarian Anda.</p>
                                        @if(request('search') || request('jenis'))
                                            <a href="{{ route('usulan.verifikasi') }}" class="btn btn-sm btn-outline-primary mt-2 rounded-pill px-3">
                                                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Pencarian & Filter
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($usulans->hasPages())
                <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top"
                     style="background:#FAFAFA;font-size:13px;">
                    <div class="text-muted">
                        Menampilkan {{ $usulans->firstItem() }}–{{ $usulans->lastItem() }}
                        dari {{ $usulans->total() }} usulan
                    </div>
                    <div>{{ $usulans->links() }}</div>
                </div>
            @endif
        </div>

    </div>{{-- end container --}}

    {{-- MODAL TAMBAH USULAN --}}
    <div class="modal fade" id="modalTambahUsulan" tabindex="-1" aria-labelledby="labelTambahUsulan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header-primary d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle-fill fs-5"></i>
                        <h5 class="modal-title mb-0 fw-bold fs-6" id="labelTambahUsulan">Tambah Usulan Baru</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('usulan.simpan') }}" method="POST" id="formTambahUsulan">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Siswa <span class="text-danger">*</span></label>
                                <select name="nis" id="selectSiswa" class="form-select form-select-custom" required onchange="updateNisPreview(this)">
                                    <option value="">-- Pilih Siswa --</option>
                                    @foreach($siswas as $s)
                                        <option value="{{ $s->nis }}" data-kelas="{{ $s->kelas }}" {{ old('nis') == $s->nis ? 'selected' : '' }}>
                                            {{ $s->nama_lengkap }} – {{ $s->kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">NIS Terpilih</label>
                                <div class="nis-preview" id="nisPreview">
                                    <span class="text-muted">— pilih siswa terlebih dahulu —</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Nama Pengusul <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pengusul" class="form-control form-control-custom"
                                       placeholder="Nama guru / wali kelas"
                                       value="{{ old('nama_pengusul') }}" required>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label-custom">Jenis <span class="text-danger">*</span></label>
                                <select name="jenis" class="form-select form-select-custom" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="prestasi"    {{ old('jenis') == 'prestasi'    ? 'selected' : '' }}>Prestasi</option>
                                    <option value="pelanggaran" {{ old('jenis') == 'pelanggaran' ? 'selected' : '' }}>Pelanggaran</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label-custom">Poin <span class="text-danger">*</span></label>
                                <input type="number" name="poin" class="form-control form-control-custom"
                                       placeholder="1 – 500" min="1" max="500"
                                       value="{{ old('poin') }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Keterangan <span class="text-danger">*</span></label>
                                <textarea name="keterangan" class="form-control form-control-custom" rows="3"
                                          placeholder="Jelaskan alasan / deskripsi usulan..." required>{{ old('keterangan') }}</textarea>
                            </div>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger mt-3 rounded-3" style="font-size:13px;">
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer bg-light py-3 px-4 gap-2">
                        <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-3 px-4 fw-bold" id="btnSubmitUsulan">
                            <i class="bi bi-send-fill me-1"></i> Kirim Usulan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts
        document.querySelectorAll('.alert-floating').forEach(function(el) {
            setTimeout(function() {
                var a = new bootstrap.Alert(el);
                a.close();
            }, 5000);
        });

        // NIS preview
        function updateNisPreview(sel) {
            var preview = document.getElementById('nisPreview');
            if (sel.value) {
                var opt = sel.options[sel.selectedIndex];
                preview.innerHTML = '<strong>' + sel.value + '</strong>' +
                    '<span class="text-muted ms-2" style="font-size:12px;">' + opt.getAttribute('data-kelas') + '</span>';
            } else {
                preview.innerHTML = '<span class="text-muted">— pilih siswa terlebih dahulu —</span>';
            }
        }

        // Re-open modal tambah jika ada error validasi
        @if($errors->any())
            var m = new bootstrap.Modal(document.getElementById('modalTambahUsulan'));
            m.show();
        @endif

        // Fungsi Cetak Laporan Usulan Verifikasi
        function printDataUsulan() {
            var usulanRows = '';
            @if(isset($usulansPrint) && count($usulansPrint) > 0)
                @foreach($usulansPrint as $idx => $item)
                    usulanRows += `
                        <tr>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1; text-align: center;">{{ $idx + 1 }}</td>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1; white-space: nowrap;">
                                {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->timezone('Asia/Jakarta')->format('d/m/Y H:i') : '-' }}
                            </td>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1;">
                                <strong>{{ addslashes($item->siswa?->nama_lengkap ?? '—') }}</strong><br>
                                <span style="color: #64748b; font-size: 10px;">NIS: {{ $item->nis }} | Kelas: {{ addslashes($item->siswa?->kelas ?? '—') }}</span>
                            </td>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1;">
                                {{ addslashes($item->nama_pengusul) }}
                            </td>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1; font-weight: bold; color: {{ $item->jenis == 'prestasi' ? '#166534' : '#991b1b' }};">
                                {{ ucfirst($item->jenis) }}
                            </td>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1; text-align: center; font-weight: bold; color: {{ $item->jenis == 'prestasi' ? '#166534' : '#991b1b' }};">
                                {{ $item->jenis == 'prestasi' ? '+' : '-' }}{{ $item->poin }}
                            </td>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1; max-width: 220px; word-break: break-word;">
                                {{ addslashes($item->keterangan) }}
                            </td>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1; text-align: center;">
                                <span style="display: inline-block; padding: 2px 8px; border-radius: 4px; font-weight: bold; font-size: 10px; 
                                    background: {{ $item->status == 'disetujui' ? '#dcfce7' : ($item->status == 'menunggu' ? '#fef3c7' : '#fee2e2') }}; 
                                    color: {{ $item->status == 'disetujui' ? '#166534' : ($item->status == 'menunggu' ? '#92400e' : '#991b1b') }};">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td style="padding: 6px 8px; border: 1px solid #cbd5e1; font-size: 10px; color: #475569;">
                                {{ addslashes($item->catatan_verifikasi ?: '—') }}
                                @if($item->verified_at)
                                    <br><span style="color: #94a3b8;">{{ \Carbon\Carbon::parse($item->verified_at)->timezone('Asia/Jakarta')->format('d/m/Y H:i') }}</span>
                                @endif
                            </td>
                        </tr>
                    `;
                @endforeach
            @else
                usulanRows = `
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 20px; color: #94a3b8;">Tidak ada data usulan</td>
                    </tr>
                `;
            @endif

            var filterSummary = [];
            @if(request('search')) filterSummary.push('Pencarian: "{{ addslashes(request('search')) }}"'); @endif
            @if(request('status')) filterSummary.push('Status: {{ ucfirst(request('status')) }}'); @endif
            @if(request('jenis')) filterSummary.push('Jenis: {{ ucfirst(request('jenis')) }}'); @endif
            var filterText = filterSummary.length > 0 ? filterSummary.join(' | ') : 'Semua Data Usulan';

            var printContents = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Laporan Daftar Usulan Verifikasi Poin Siswa</title>
                    <style>
                        @page { size: A4 landscape; margin: 12mm; }
                        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
                        body { color: #1e293b; line-height: 1.3; margin: 0; padding: 0; background: #fff; font-size: 11px; }
                        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
                        th { background: #1e2869; color: #fff; padding: 7px 8px; border: 1px solid #1e2869; font-size: 11px; text-transform: uppercase; font-weight: 600; }
                        td { vertical-align: top; }
                    </style>
                </head>
                <body>
                    <div style="text-align: center; border-bottom: 2px solid #1e2869; padding-bottom: 8px; margin-bottom: 12px;">
                        <h3 style="margin: 0; font-size: 13px; text-transform: uppercase; color: #1e2869; letter-spacing: 0.5px;">PEMERINTAH PROVINSI LAMPUNG</h3>
                        <h3 style="margin: 2px 0; font-size: 13px; text-transform: uppercase; color: #1e2869;">DINAS PENDIDIKAN DAN KEBUDAYAAN</h3>
                        <h2 style="margin: 2px 0; font-size: 16px; text-transform: uppercase; color: #1e2869; font-weight: 800;">SMK NEGERI 1 AIR NANINGAN</h2>
                        <p style="margin: 2px 0 0 0; font-size: 10px; color: #475569;">Jl. Makam Batu Ruguk, Karang Sari, Kec. Air Naningan, Kab. Tanggamus, Lampung, 35377</p>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 10px;">
                        <div>
                            <h3 style="margin: 0 0 4px 0; font-size: 14px; color: #1e2869; text-transform: uppercase; font-weight: 700;">
                                LAPORAN DAFTAR USULAN VERIFIKASI POIN SISWA
                            </h3>
                            <div style="font-size: 10.5px; color: #64748b;">
                                Filter: <strong>${filterText}</strong> &bull; Dicetak: <strong>${new Date().toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit'})} WIB</strong>
                            </div>
                        </div>
                        <div style="text-align: right; font-size: 10.5px; color: #475569;">
                            Total Dicetak: <strong>{{ isset($usulansPrint) ? count($usulansPrint) : $usulans->count() }} Data</strong>
                        </div>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th style="width: 30px; text-align: center;">No</th>
                                <th style="width: 90px;">Tanggal</th>
                                <th style="width: 170px;">Siswa</th>
                                <th style="width: 110px;">Pengusul</th>
                                <th style="width: 75px;">Jenis</th>
                                <th style="width: 50px; text-align: center;">Poin</th>
                                <th>Keterangan</th>
                                <th style="width: 75px; text-align: center;">Status</th>
                                <th style="width: 130px;">Catatan Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${usulanRows}
                        </tbody>
                    </table>

                    <div style="display: flex; justify-content: flex-end; margin-top: 25px; page-break-inside: avoid;">
                        <div style="text-align: center; width: 220px; font-size: 11px;">
                            <p style="margin-bottom: 45px;">Air Naningan, ${new Date().toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'})}<br>Tim Verifikator / Guru BK,</p>
                            <p style="font-weight: bold; margin: 0; text-decoration: underline;">( __________________________ )</p>
                            <p style="margin: 2px 0 0 0; color: #64748b;">NIP. .....................................</p>
                        </div>
                    </div>
                </body>
                </html>
            `;

            // Buat atau gunakan iframe tersembunyi untuk proses print
            var oldFrame = document.getElementById('print_frame_usulan');
            if (oldFrame) {
                oldFrame.remove();
            }

            var iframe = document.createElement('iframe');
            iframe.id = 'print_frame_usulan';
            iframe.style.position = 'fixed';
            iframe.style.right = '0';
            iframe.style.bottom = '0';
            iframe.style.width = '0';
            iframe.style.height = '0';
            iframe.style.border = '0';
            document.body.appendChild(iframe);

            var frameDoc = iframe.contentWindow || iframe.contentDocument.document || iframe.contentDocument;
            frameDoc.document.open();
            frameDoc.document.write(printContents);
            frameDoc.document.close();

            setTimeout(function() {
                try {
                    iframe.contentWindow.focus();
                    iframe.contentWindow.print();
                } catch(e) {
                    window.print();
                }
            }, 300);
        }
    </script>
</body>
</html>