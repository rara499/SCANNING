<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Verifikasi – SCANNING SMKN 1 Air Naningan</title>
    <meta name="description" content="Dashboard ringkasan status verifikasi usulan poin prestasi dan pelanggaran siswa.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

    <style>
        :root {
            --primary:       #1E2869;
            --primary-dark:  #0F172A;
            --accent-blue:   #2563EB;
            --accent-orange: #FF8D28;
            --bg-canvas:     #F1F5F9;
        }
        * { box-sizing:border-box; margin:0; padding:0;
            font-family:'Plus Jakarta Sans',-apple-system,BlinkMacSystemFont,sans-serif; }
        body { background:var(--bg-canvas); color:#1E293B; min-height:100vh; display:flex; flex-direction:column; }

        /* NAVBAR */
        .navbar-main { background:var(--primary); color:#fff; padding:12px 20px;
            box-shadow:0 4px 20px rgba(15,23,42,.15); position:sticky; top:0; z-index:1000; }
        .navbar-brand-custom { display:flex; align-items:center; gap:12px; text-decoration:none; color:#fff; }
        .brand-logo { width:38px; height:38px; background:#FFFFFF;
            border-radius:10px; display:flex; align-items:center; justify-content:center; padding:4px; box-shadow:0 2px 8px rgba(0,0,0,0.15); flex-shrink:0; }
        .brand-logo img { width:100%; height:100%; object-fit:contain; }
        .brand-text { font-size:14px; font-weight:700; line-height:1.2; }
        .brand-sub  { font-size:11px; font-weight:400; opacity:.75; }
        .nav-btn { background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.2); color:#fff;
            border-radius:8px; padding:7px 14px; font-size:13px; font-weight:600; text-decoration:none; transition:background .2s; }
        .nav-btn:hover { background:rgba(255,255,255,.22); color:#fff; }

        /* HERO */
        .page-hero { background:linear-gradient(135deg,var(--primary) 0%,#2a3990 60%,var(--accent-blue) 100%);
            color:#fff; padding:32px 0 24px; }
        .page-hero h1 { font-size:22px; font-weight:800; margin-bottom:4px; }
        .page-hero p  { font-size:13px; opacity:.8; }

        /* STAT CARDS */
        .stat-card { border-radius:16px; padding:20px 22px; display:flex; align-items:center; gap:16px;
            color:#fff; box-shadow:0 4px 16px rgba(0,0,0,.12); transition:transform .2s,box-shadow .2s; }
        .stat-card:hover { transform:translateY(-3px); box-shadow:0 8px 24px rgba(0,0,0,.18); }
        .stat-icon { width:52px; height:52px; border-radius:14px; background:rgba(255,255,255,.2);
            display:flex; align-items:center; justify-content:center; font-size:24px; flex-shrink:0; }
        .stat-label { font-size:12px; font-weight:500; opacity:.85; margin-bottom:2px; }
        .stat-value { font-size:30px; font-weight:800; line-height:1; }
        .stat-sub   { font-size:11px; opacity:.7; margin-top:4px; }
        .stat-total       { background:linear-gradient(135deg,#1E2869,#2a3990); }
        .stat-menunggu    { background:linear-gradient(135deg,#B45309,#F59E0B); }
        .stat-disetujui   { background:linear-gradient(135deg,#065F46,#10B981); }
        .stat-ditolak     { background:linear-gradient(135deg,#991B1B,#EF4444); }
        .stat-prestasi    { background:linear-gradient(135deg,#1D4ED8,#60A5FA); }
        .stat-pelanggaran { background:linear-gradient(135deg,#7C3AED,#A78BFA); }

        /* PANELS */
        .panel-card { background:#fff; border-radius:16px; box-shadow:0 2px 16px rgba(0,0,0,.07); overflow:hidden; }
        .panel-header { padding:16px 22px; border-bottom:1px solid #F1F5F9;
            display:flex; align-items:center; justify-content:space-between; gap:12px; }
        .panel-title { font-size:15px; font-weight:700; color:#1E293B; display:flex; align-items:center; gap:8px; }
        .panel-body  { padding:20px 22px; }

        /* TABLE */
        .vtable { font-size:13px; width:100%; border-collapse:collapse; }
        .vtable thead th { background:var(--primary); color:#fff; font-weight:600;
            font-size:11px; text-transform:uppercase; letter-spacing:.5px;
            padding:12px 14px; white-space:nowrap; }
        .vtable tbody tr { border-bottom:1px solid #F1F5F9; transition:background .15s; }
        .vtable tbody tr:hover { background:#F8FAFF; }
        .vtable tbody td { padding:11px 14px; vertical-align:middle; }
        .vtable tbody tr:last-child { border-bottom:none; }

        /* BADGES */
        .badge-jenis       { padding:4px 11px; border-radius:20px; font-size:11px; font-weight:600; display:inline-block; }
        .badge-prestasi    { background:#EFF6FF; color:#1D4ED8; }
        .badge-pelanggaran { background:#F5F3FF; color:#6D28D9; }
        .badge-menunggu    { background:#FFFBEB; color:#92400E; border:1px solid #FCD34D; }
        .badge-disetujui   { background:#ECFDF5; color:#065F46; border:1px solid #6EE7B7; }
        .badge-ditolak     { background:#FEF2F2; color:#991B1B; border:1px solid #FCA5A5; }
        .poin-badge        { display:inline-flex; align-items:center; gap:3px; padding:3px 9px; border-radius:8px; font-weight:700; font-size:13px; }
        .poin-prestasi     { background:#EFF6FF; color:#1D4ED8; }
        .poin-pelanggaran  { background:#F5F3FF; color:#6D28D9; }

        /* CHART LEGEND */
        .progress-ring-wrap { display:flex; align-items:center; gap:20px; flex-wrap:wrap; }
        .donut-legend { display:flex; flex-direction:column; gap:8px; }
        .legend-item  { display:flex; align-items:center; gap:8px; font-size:13px; }
        .legend-dot   { width:12px; height:12px; border-radius:50%; flex-shrink:0; }

        /* FILTER */
        .form-control-sm-custom,.form-select-sm-custom {
            border-radius:9px; border:1.5px solid #E2E8F0; font-size:13px; padding:7px 12px; transition:all .2s; }
        .form-control-sm-custom:focus,.form-select-sm-custom:focus {
            border-color:var(--accent-blue); box-shadow:0 0 0 3px rgba(37,99,235,.1); outline:none; }

        /* ACTIVITY FEED */
        .activity-item { display:flex; align-items:flex-start; gap:12px;
            padding:12px 22px; border-bottom:1px solid #F1F5F9; }
        .activity-item:last-child { border-bottom:none; }
        .activity-dot { width:36px; height:36px; border-radius:10px; flex-shrink:0;
            display:flex; align-items:center; justify-content:center; font-size:16px; }
        .ad-disetujui { background:#ECFDF5; color:#059669; }
        .ad-ditolak   { background:#FEF2F2; color:#DC2626; }
        .ad-menunggu  { background:#FFFBEB; color:#D97706; }
        .activity-name { font-size:13px; font-weight:600; color:#1E293B; }
        .activity-desc { font-size:12px; color:#64748B; margin-top:2px; }
        .activity-time { font-size:11px; color:#94A3B8; margin-top:3px; }

        /* ALERT FLOATING */
        .alert-floating { position:fixed; top:78px; right:20px; z-index:9999;
            min-width:300px; border-radius:12px;
            box-shadow:0 8px 24px rgba(0,0,0,.15); animation:slideIn .3s ease; }
        @keyframes slideIn { from{transform:translateX(120%);opacity:0;} to{transform:translateX(0);opacity:1;} }

        /* QUICK ACTIONS */
        .qa-btn { display:flex; flex-direction:column; align-items:center; gap:8px;
            background:#F8FAFF; border:1.5px solid #E2E8F0; border-radius:14px;
            padding:18px 12px; text-decoration:none; color:#1E293B;
            transition:all .2s; font-size:12px; font-weight:600; text-align:center; }
        .qa-btn:hover { border-color:var(--accent-blue); background:#EFF6FF;
            color:var(--accent-blue); transform:translateY(-2px); }
        .qa-icon { font-size:26px; }

        /* EMPTY STATE */
        .empty-mini { padding:32px 20px; text-align:center; color:#94A3B8; font-size:13px; }
        .empty-mini i { font-size:36px; display:block; margin-bottom:8px; }

        /* TABS */
        .custom-tabs { border-bottom:2px solid #E2E8F0; margin-bottom:0; }
        .custom-tabs .nav-link { color:#64748B; font-weight:600; font-size:13px; border:none;
            padding:10px 18px; border-radius:8px 8px 0 0; transition:all .2s; }
        .custom-tabs .nav-link.active { color:var(--primary); background:transparent;
            border-bottom:2px solid var(--primary); margin-bottom:-2px; }
        .custom-tabs .nav-link:hover { color:var(--primary); background:#F8FAFF; }

        /* PCT BAR */
        .pct-bar  { height:8px; border-radius:99px; background:#E2E8F0; overflow:hidden; margin-top:6px; }
        .pct-fill { height:100%; border-radius:99px; transition:width .6s ease; }

        @media(max-width:768px) { .stat-value{font-size:22px;} .page-hero h1{font-size:18px;} }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar-main d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboardUmum') }}" class="navbar-brand-custom">
            <div class="brand-logo"><img src="{{ asset('sclg-removebg-preview.png') }}" alt="Logo"></div>
            <div>
                <div class="brand-text">SCANNING</div>
                <div class="brand-sub">SMKN 1 Air Naningan</div>
            </div>
        </a>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('sidebar_menu') }}" class="nav-btn"><i class="bi bi-grid-3x3-gap-fill me-1"></i> Menu</a>
            <a href="{{ route('usulan.verifikasi') }}" class="nav-btn"><i class="bi bi-clipboard-check me-1"></i> Usulan</a>
            <a href="{{ route('dashboard') }}" class="nav-btn"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
        </div>
    </nav>

    {{-- HERO --}}
    <div class="page-hero">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center gap-3 mb-1">
                <div style="width:48px;height:48px;background:rgba(255,255,255,.15);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:24px;">&#128737;</div>
                <div>
                    <h1>Dashboard Verifikasi</h1>
                    <p>Pantau status dan statistik seluruh usulan poin siswa secara real-time</p>
                </div>
            </div>
        </div>
    </div>

    {{-- FLOATING ALERTS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible alert-floating" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible alert-floating" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container-fluid px-4 py-4 flex-grow-1">

        {{-- ═══ ROW 1: STAT CARDS ═══ --}}
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="stat-card stat-total h-100">
                    <div class="stat-icon"><i class="bi bi-clipboard-data"></i></div>
                    <div>
                        <div class="stat-label">Total Usulan</div>
                        <div class="stat-value" id="numTotal">{{ $stats['total'] }}</div>
                        <div class="stat-sub">Semua waktu</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="stat-card stat-menunggu h-100">
                    <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
                    <div>
                        <div class="stat-label">Menunggu</div>
                        <div class="stat-value" id="numMenunggu">{{ $stats['menunggu'] }}</div>
                        <div class="stat-sub">Belum diproses</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="stat-card stat-disetujui h-100">
                    <div class="stat-icon"><i class="bi bi-check-circle"></i></div>
                    <div>
                        <div class="stat-label">Disetujui</div>
                        <div class="stat-value" id="numDisetujui">{{ $stats['disetujui'] }}</div>
                        <div class="stat-sub">Poin diterapkan</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="stat-card stat-ditolak h-100">
                    <div class="stat-icon"><i class="bi bi-x-circle"></i></div>
                    <div>
                        <div class="stat-label">Ditolak</div>
                        <div class="stat-value" id="numDitolak">{{ $stats['ditolak'] }}</div>
                        <div class="stat-sub">Tidak disetujui</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="stat-card stat-prestasi h-100">
                    <div class="stat-icon"><i class="bi bi-trophy"></i></div>
                    <div>
                        <div class="stat-label">Prestasi</div>
                        <div class="stat-value" id="numPrestasi">{{ $stats['prestasi'] }}</div>
                        <div class="stat-sub">Usulan prestasi</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="stat-card stat-pelanggaran h-100">
                    <div class="stat-icon"><i class="bi bi-exclamation-triangle"></i></div>
                    <div>
                        <div class="stat-label">Pelanggaran</div>
                        <div class="stat-value" id="numPelanggaran">{{ $stats['pelanggaran'] }}</div>
                        <div class="stat-sub">Usulan pelanggaran</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ ROW 2: CHART + ACTIVITY ═══ --}}
        <div class="row g-3 mb-4">
            {{-- Donut Chart --}}
            <div class="col-12 col-md-4">
                <div class="panel-card h-100">
                    <div class="panel-header">
                        <span class="panel-title"><i class="bi bi-pie-chart-fill text-primary"></i> Distribusi Status</span>
                    </div>
                    <div class="panel-body d-flex flex-column align-items-center justify-content-center" style="min-height:220px;">
                        @if($stats['total'] > 0)
                            <div class="progress-ring-wrap justify-content-center">
                                <div style="position:relative;width:140px;height:140px;">
                                    <canvas id="donutStatus" width="140" height="140"></canvas>
                                    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center;">
                                        <div style="font-size:24px;font-weight:800;color:#1E293B;">{{ $stats['total'] }}</div>
                                        <div style="font-size:10px;color:#94A3B8;">Total</div>
                                    </div>
                                </div>
                                <div class="donut-legend">
                                    <div class="legend-item"><div class="legend-dot" style="background:#F59E0B;"></div><div>Menunggu <strong>{{ $stats['menunggu'] }}</strong></div></div>
                                    <div class="legend-item"><div class="legend-dot" style="background:#10B981;"></div><div>Disetujui <strong>{{ $stats['disetujui'] }}</strong></div></div>
                                    <div class="legend-item"><div class="legend-dot" style="background:#EF4444;"></div><div>Ditolak <strong>{{ $stats['ditolak'] }}</strong></div></div>
                                </div>
                            </div>
                            @php $t = max($stats['total'], 1); @endphp
                            <div class="w-100 mt-4">
                                <div class="d-flex justify-content-between" style="font-size:12px;color:#64748B;"><span>Disetujui</span><span>{{ round($stats['disetujui']/$t*100) }}%</span></div>
                                <div class="pct-bar"><div class="pct-fill" style="width:{{ round($stats['disetujui']/$t*100) }}%;background:#10B981;"></div></div>
                                <div class="d-flex justify-content-between mt-2" style="font-size:12px;color:#64748B;"><span>Ditolak</span><span>{{ round($stats['ditolak']/$t*100) }}%</span></div>
                                <div class="pct-bar"><div class="pct-fill" style="width:{{ round($stats['ditolak']/$t*100) }}%;background:#EF4444;"></div></div>
                                <div class="d-flex justify-content-between mt-2" style="font-size:12px;color:#64748B;"><span>Menunggu</span><span>{{ round($stats['menunggu']/$t*100) }}%</span></div>
                                <div class="pct-bar"><div class="pct-fill" style="width:{{ round($stats['menunggu']/$t*100) }}%;background:#F59E0B;"></div></div>
                            </div>
                        @else
                            <div class="empty-mini"><i class="bi bi-pie-chart"></i>Belum ada data usulan</div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Bar Chart --}}
            <div class="col-12 col-md-4">
                <div class="panel-card h-100">
                    <div class="panel-header">
                        <span class="panel-title"><i class="bi bi-bar-chart-fill text-info"></i> Prestasi vs Pelanggaran</span>
                    </div>
                    <div class="panel-body d-flex align-items-center justify-content-center" style="min-height:260px;">
                        @if($stats['total'] > 0)
                            <canvas id="barJenis" height="200"></canvas>
                        @else
                            <div class="empty-mini"><i class="bi bi-bar-chart"></i>Belum ada data</div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Aktivitas Terbaru --}}
            <div class="col-12 col-md-4">
                <div class="panel-card h-100">
                    <div class="panel-header">
                        <span class="panel-title"><i class="bi bi-activity text-warning"></i> Aktivitas Terbaru</span>
                        <a href="{{ route('usulan.verifikasi') }}" style="font-size:12px;color:var(--accent-blue);text-decoration:none;font-weight:600;">Lihat semua →</a>
                    </div>
                    <div>
                        @forelse($aktivitasTerbaru as $ak)
                            <div class="activity-item">
                                <div class="activity-dot {{ $ak->status === 'disetujui' ? 'ad-disetujui' : ($ak->status === 'ditolak' ? 'ad-ditolak' : 'ad-menunggu') }}">
                                    @if($ak->status === 'disetujui') <i class="bi bi-check-lg"></i>
                                    @elseif($ak->status === 'ditolak') <i class="bi bi-x-lg"></i>
                                    @else <i class="bi bi-hourglass"></i>
                                    @endif
                                </div>
                                <div>
                                    <div class="activity-name">{{ $ak->siswa?->nama_lengkap ?? $ak->nis }}</div>
                                    <div class="activity-desc">
                                        {{ ucfirst($ak->jenis) }} &bull;
                                        {{ $ak->jenis === 'prestasi' ? '+' : '-' }}{{ $ak->poin }} poin
                                        &bull; {{ $ak->nama_pengusul }}
                                    </div>
                                    <div class="activity-time">{{ $ak->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-mini"><i class="bi bi-inbox"></i>Belum ada aktivitas</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ ROW 3: QUICK ACTIONS ═══ --}}
        <div class="panel-card mb-4">
            <div class="panel-header">
                <span class="panel-title"><i class="bi bi-lightning-fill text-warning"></i> Aksi Cepat</span>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="{{ route('usulan.verifikasi') }}?status=menunggu" class="qa-btn">
                            <span class="qa-icon">&#9203;</span>
                            <span>Usulan Menunggu</span>
                            @if($stats['menunggu'] > 0)
                                <span class="badge bg-warning text-dark rounded-pill">{{ $stats['menunggu'] }}</span>
                            @endif
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="{{ route('usulan.verifikasi') }}?status=disetujui" class="qa-btn">
                            <span class="qa-icon">&#9989;</span>
                            <span>Sudah Disetujui</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="{{ route('usulan.verifikasi') }}?status=ditolak" class="qa-btn">
                            <span class="qa-icon">&#10060;</span>
                            <span>Sudah Ditolak</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="{{ route('usulan.verifikasi') }}" class="qa-btn">
                            <span class="qa-icon">&#128203;</span>
                            <span>Semua Usulan</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="{{ route('data.siswa') }}" class="qa-btn">
                            <span class="qa-icon">&#128101;</span>
                            <span>Data Siswa</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="{{ route('dashboardUmum') }}" class="qa-btn">
                            <span class="qa-icon">&#128202;</span>
                            <span>Dashboard Umum</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ ROW 4: TABEL RIWAYAT ═══ --}}
        <div class="panel-card">
            <div class="panel-header">
                <span class="panel-title"><i class="bi bi-table text-primary"></i> Riwayat Verifikasi</span>
                <a href="{{ route('usulan.verifikasi') }}" class="btn btn-sm btn-outline-primary rounded-3 fw-semibold" style="font-size:12px;">
                    <i class="bi bi-pencil-square me-1"></i> Kelola Usulan
                </a>
            </div>

            {{-- Filter --}}
            <div class="px-4 pt-3">
                <form method="GET" action="{{ route('dashboard.verifikasi') }}" id="formFilter">
                    <div class="row g-2 align-items-end">
                        <div class="col-12 col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-white" style="border-radius:9px 0 0 9px;border:1.5px solid #E2E8F0;border-right:none;">
                                    <i class="bi bi-search text-muted" style="font-size:13px;"></i>
                                </span>
                                <input type="text" name="search" class="form-control form-control-sm-custom"
                                       placeholder="Cari siswa, NIS, pengusul, keterangan..."
                                       value="{{ request('search') }}"
                                       style="border-radius:0 9px 9px 0;border:1.5px solid #E2E8F0;border-left:none;">
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <select name="status" class="form-select form-select-sm-custom w-100" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="menunggu"  {{ request('status')=='menunggu'  ? 'selected':'' }}>Menunggu</option>
                                <option value="disetujui" {{ request('status')=='disetujui' ? 'selected':'' }}>Disetujui</option>
                                <option value="ditolak"   {{ request('status')=='ditolak'   ? 'selected':'' }}>Ditolak</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-2">
                            <select name="jenis" class="form-select form-select-sm-custom w-100" onchange="this.form.submit()">
                                <option value="">Semua Jenis</option>
                                <option value="prestasi"    {{ request('jenis')=='prestasi'    ? 'selected':'' }}>Prestasi</option>
                                <option value="pelanggaran" {{ request('jenis')=='pelanggaran' ? 'selected':'' }}>Pelanggaran</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-2">
                            <button type="submit" class="btn btn-primary w-100 fw-semibold rounded-3" style="font-size:13px;padding:8px;">
                                <i class="bi bi-funnel me-1"></i> Filter
                            </button>
                        </div>
                        <div class="col-6 col-md-1">
                            <a href="{{ route('dashboard.verifikasi') }}" class="btn btn-outline-secondary w-100 rounded-3" style="font-size:13px;padding:8px;" title="Reset Filter">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Status Tabs --}}
            <div class="px-4 pt-3">
                <ul class="nav custom-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ !request('status') ? 'active':'' }}"
                           href="{{ route('dashboard.verifikasi') }}{{ request('search') ? '?search='.urlencode(request('search')):'' }}{{ request('jenis') ? (request('search')?'&':'?').'jenis='.request('jenis'):'' }}">
                            Semua <span class="badge bg-secondary rounded-pill ms-1">{{ $stats['total'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status')=='menunggu' ? 'active':'' }}"
                           href="{{ route('dashboard.verifikasi') }}?status=menunggu{{ request('search') ? '&search='.urlencode(request('search')):'' }}{{ request('jenis') ? '&jenis='.request('jenis'):'' }}">
                            Menunggu <span class="badge bg-warning text-dark rounded-pill ms-1">{{ $stats['menunggu'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status')=='disetujui' ? 'active':'' }}"
                           href="{{ route('dashboard.verifikasi') }}?status=disetujui{{ request('search') ? '&search='.urlencode(request('search')):'' }}{{ request('jenis') ? '&jenis='.request('jenis'):'' }}">
                            Disetujui <span class="badge bg-success rounded-pill ms-1">{{ $stats['disetujui'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status')=='ditolak' ? 'active':'' }}"
                           href="{{ route('dashboard.verifikasi') }}?status=ditolak{{ request('search') ? '&search='.urlencode(request('search')):'' }}{{ request('jenis') ? '&jenis='.request('jenis'):'' }}">
                            Ditolak <span class="badge bg-danger rounded-pill ms-1">{{ $stats['ditolak'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Table --}}
            <div class="table-responsive mt-0">
                <table class="vtable">
                    <thead>
                        <tr>
                            <th style="width:45px;">#</th>
                            <th>Siswa</th>
                            <th>Pengusul</th>
                            <th>Jenis</th>
                            <th style="width:75px;">Poin</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Catatan Verifikasi</th>
                            <th>Waktu Verif</th>
                            <th>Tgl Usulan</th>
                            <th style="width:100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $index => $u)
                            <tr>
                                <td class="text-muted" style="font-size:12px;">{{ $riwayat->firstItem() + $index }}</td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $u->siswa?->nama_lengkap ?? '—' }}</div>
                                    <div class="text-muted" style="font-size:11px;">NIS: {{ $u->nis }}</div>
                                    @if($u->siswa?->kelas)
                                        <div class="text-muted" style="font-size:11px;">{{ $u->siswa->kelas }}</div>
                                    @endif
                                </td>
                                <td style="font-size:13px;">{{ $u->nama_pengusul }}</td>
                                <td>
                                    <span class="badge-jenis {{ $u->jenis === 'prestasi' ? 'badge-prestasi' : 'badge-pelanggaran' }}">
                                        {{ $u->jenis === 'prestasi' ? 'Prestasi' : 'Pelanggaran' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="poin-badge {{ $u->jenis === 'prestasi' ? 'poin-prestasi' : 'poin-pelanggaran' }}">
                                        {{ $u->jenis === 'prestasi' ? '+' : '-' }}{{ $u->poin }}
                                    </span>
                                </td>
                                <td style="max-width:180px;">
                                    <span style="font-size:12px;color:#334155;" title="{{ $u->keterangan }}">
                                        {{ Str::limit($u->keterangan, 55) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-jenis
                                        @if($u->status === 'menunggu') badge-menunggu
                                        @elseif($u->status === 'disetujui') badge-disetujui
                                        @else badge-ditolak @endif">
                                        @if($u->status === 'menunggu') Menunggu
                                        @elseif($u->status === 'disetujui') Disetujui
                                        @else Ditolak @endif
                                    </span>
                                </td>
                                <td style="font-size:12px;color:#64748B;max-width:160px;">
                                    {{ $u->catatan_verifikasi ? Str::limit($u->catatan_verifikasi, 45) : '—' }}
                                </td>
                                <td style="font-size:12px;color:#64748B;white-space:nowrap;">
                                    @if($u->verified_at)
                                        {{ $u->verified_at->format('d M Y') }}
                                        <div style="font-size:10px;color:#94A3B8;">{{ $u->verified_at->format('H:i') }}</div>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td style="font-size:12px;color:#64748B;white-space:nowrap;">
                                    {{ $u->created_at->format('d M Y') }}
                                    <div style="font-size:10px;color:#94A3B8;">{{ $u->created_at->format('H:i') }}</div>
                                </td>
                                <td>
                                    @if($u->status === 'menunggu')
                                        <a href="{{ route('usulan.verifikasi') }}"
                                           class="btn btn-sm btn-warning rounded-3 fw-semibold" style="font-size:11px;padding:4px 10px;">
                                            <i class="bi bi-pencil"></i> Proses
                                        </a>
                                    @else
                                        <span class="text-muted" style="font-size:11px;font-style:italic;">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">
                                    <div class="empty-mini">
                                        <i class="bi bi-inbox"></i>
                                        <div class="fw-semibold" style="color:#475569;font-size:14px;">Tidak ada data</div>
                                        <div>Coba ubah filter atau kata kunci pencarian.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($riwayat->hasPages())
                <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top"
                     style="background:#FAFAFA;font-size:13px;">
                    <div class="text-muted">
                        Menampilkan {{ $riwayat->firstItem() }}–{{ $riwayat->lastItem() }}
                        dari {{ $riwayat->total() }} data
                    </div>
                    <div>{{ $riwayat->links() }}</div>
                </div>
            @endif
        </div>

    </div>{{-- end container --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts
        document.querySelectorAll('.alert-floating').forEach(function(el) {
            setTimeout(function() { new bootstrap.Alert(el).close(); }, 5000);
        });

        @if($stats['total'] > 0)
        // Donut chart status
        (function() {
            var ctx = document.getElementById('donutStatus');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Menunggu', 'Disetujui', 'Ditolak'],
                    datasets: [{
                        data: [{{ $stats['menunggu'] }}, {{ $stats['disetujui'] }}, {{ $stats['ditolak'] }}],
                        backgroundColor: ['#F59E0B', '#10B981', '#EF4444'],
                        borderWidth: 0,
                        hoverOffset: 6,
                    }]
                },
                options: {
                    cutout: '68%',
                    plugins: { legend: { display: false } },
                    animation: { animateRotate: true, duration: 800 },
                }
            });
        })();

        // Bar chart jenis
        (function() {
            var ctx2 = document.getElementById('barJenis');
            if (!ctx2) return;
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Prestasi', 'Pelanggaran'],
                    datasets: [{
                        label: 'Jumlah Usulan',
                        data: [{{ $stats['prestasi'] }}, {{ $stats['pelanggaran'] }}],
                        backgroundColor: ['rgba(37,99,235,.75)', 'rgba(109,40,217,.75)'],
                        borderRadius: 10,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: { callbacks: { label: function(c) { return ' ' + c.raw + ' usulan'; } } }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { color: '#F1F5F9' }, ticks: { stepSize: 1 } },
                        x: { grid: { display: false } }
                    },
                    animation: { duration: 700 },
                }
            });
        })();
        @endif

        // Counter-up animation
        function animateCounter(el, target) {
            var start = 0, duration = 600, step = target / (duration / 16);
            var timer = setInterval(function() {
                start += step;
                if (start >= target) { start = target; clearInterval(timer); }
                el.textContent = Math.floor(start);
            }, 16);
        }
        ['numTotal','numMenunggu','numDisetujui','numDitolak','numPrestasi','numPelanggaran'].forEach(function(id) {
            var el = document.getElementById(id);
            if (el) animateCounter(el, parseInt(el.textContent));
        });
    </script>
</body>
</html>
