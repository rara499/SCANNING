<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Catatan – SCANNING SMKN 1 Air Naningan</title>
    <meta name="description" content="Halaman verifikasi catatan perilaku siswa (prestasi dan pelanggaran).">
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
        .page-hero { background:linear-gradient(135deg,var(--primary) 0%,#3b4db0 60%,#8B5CF6 100%);
            color:#fff; padding:32px 0 24px; }
        .page-hero h1 { font-size:22px; font-weight:800; margin-bottom:4px; }
        .page-hero p  { font-size:13px; opacity:.8; }

        /* STAT CARDS */
        .stat-card { border-radius:16px; padding:18px 20px; display:flex; align-items:center; gap:14px;
            color:#fff; box-shadow:0 4px 16px rgba(0,0,0,.12); transition:transform .2s,box-shadow .2s; }
        .stat-card:hover { transform:translateY(-3px); box-shadow:0 8px 24px rgba(0,0,0,.18); }
        .stat-icon { width:48px; height:48px; border-radius:12px; background:rgba(255,255,255,.2);
            display:flex; align-items:center; justify-content:center; font-size:22px; flex-shrink:0; }
        .stat-label { font-size:12px; font-weight:500; opacity:.85; }
        .stat-value { font-size:28px; font-weight:800; line-height:1; }
        .stat-sub   { font-size:11px; opacity:.7; margin-top:3px; }
        .stat-total       { background:linear-gradient(135deg,#3730A3,#4F46E5); }
        .stat-menunggu    { background:linear-gradient(135deg,#B45309,#F59E0B); }
        .stat-disetujui   { background:linear-gradient(135deg,#065F46,#10B981); }
        .stat-ditolak     { background:linear-gradient(135deg,#991B1B,#EF4444); }
        .stat-prestasi    { background:linear-gradient(135deg,#1D4ED8,#60A5FA); }
        .stat-pelanggaran { background:linear-gradient(135deg,#7C3AED,#A78BFA); }

        /* FILTER CARD */
        .filter-card { background:#fff; border-radius:14px; padding:18px 22px;
            box-shadow:0 2px 12px rgba(0,0,0,.06); margin-bottom:16px; }
        .form-control-custom,.form-select-custom { border-radius:10px; border:1.5px solid #E2E8F0;
            font-size:13px; padding:8px 13px; transition:all .2s; width:100%; }
        .form-control-custom:focus,.form-select-custom:focus { border-color:var(--accent-blue);
            box-shadow:0 0 0 3px rgba(37,99,235,.1); outline:none; }

        /* TABLE */
        .table-card { background:#fff; border-radius:16px; box-shadow:0 2px 16px rgba(0,0,0,.07); overflow:hidden; }
        .vtable { font-size:13px; width:100%; border-collapse:collapse; }
        .vtable thead th { background:var(--primary); color:#fff; font-weight:600;
            font-size:11px; text-transform:uppercase; letter-spacing:.5px; padding:13px 14px; white-space:nowrap; }
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

        .poin-badge       { display:inline-flex; align-items:center; gap:3px; padding:3px 9px; border-radius:8px; font-weight:700; font-size:13px; }
        .poin-prestasi    { background:#EFF6FF; color:#1D4ED8; }
        .poin-pelanggaran { background:#F5F3FF; color:#6D28D9; }

        /* ACTION BUTTONS */
        .btn-aksi    { border-radius:8px; padding:5px 11px; font-size:12px; font-weight:600; border:none; transition:all .2s; cursor:pointer; }
        .btn-setujui { background:#ECFDF5; color:#065F46; border:1px solid #6EE7B7; }
        .btn-setujui:hover { background:#059669; color:#fff; border-color:#059669; }
        .btn-tolak   { background:#FEF2F2; color:#991B1B; border:1px solid #FCA5A5; }
        .btn-tolak:hover   { background:#DC2626; color:#fff; border-color:#DC2626; }
        .btn-hapus   { background:#F8FAFC; color:#64748B; border:1px solid #CBD5E1; }
        .btn-hapus:hover   { background:#EF4444; color:#fff; border-color:#EF4444; }

        /* ADD BUTTON */
        .btn-add-catatan {
            background:linear-gradient(135deg,#8B5CF6,#6D28D9);
            color:#fff; border:none; border-radius:10px;
            padding:9px 20px; font-size:13px; font-weight:700;
            display:flex; align-items:center; gap:8px;
            transition:all .2s; box-shadow:0 4px 12px rgba(109,40,217,.35);
            cursor:pointer; width:100%; justify-content:center;
        }
        .btn-add-catatan:hover { transform:translateY(-2px); box-shadow:0 6px 18px rgba(109,40,217,.45); color:#fff; }

        /* TABS */
        .custom-tabs { border-bottom:2px solid #E2E8F0; }
        .custom-tabs .nav-link { color:#64748B; font-weight:600; font-size:13px; border:none;
            padding:10px 18px; border-radius:8px 8px 0 0; transition:all .2s; }
        .custom-tabs .nav-link.active { color:var(--primary); background:transparent;
            border-bottom:2px solid var(--primary); margin-bottom:-2px; }
        .custom-tabs .nav-link:hover { color:var(--primary); background:#F8FAFF; }

        /* MODAL */
        .modal-content { border-radius:16px; overflow:hidden; border:none; }
        .modal-header-primary { background:linear-gradient(135deg,var(--primary),#2a3990); color:#fff; padding:18px 24px; }
        .modal-header-success { background:linear-gradient(135deg,#059669,#10B981); color:#fff; padding:18px 24px; }
        .modal-header-danger  { background:linear-gradient(135deg,#DC2626,#EF4444); color:#fff; padding:18px 24px; }
        .modal-header-warning { background:linear-gradient(135deg,#D97706,#F59E0B); color:#fff; padding:18px 24px; }
        .modal-header-primary .btn-close,.modal-header-success .btn-close,
        .modal-header-danger .btn-close,.modal-header-warning .btn-close { filter:brightness(0) invert(1); }
        .form-label-custom { font-size:12px; font-weight:600; color:#475569;
            margin-bottom:5px; text-transform:uppercase; letter-spacing:.4px; display:block; }

        /* ALERT */
        .alert-floating { position:fixed; top:78px; right:20px; z-index:9999;
            min-width:300px; border-radius:12px;
            box-shadow:0 8px 24px rgba(0,0,0,.15); animation:slideIn .3s ease; }
        @keyframes slideIn { from{transform:translateX(120%);opacity:0;} to{transform:translateX(0);opacity:1;} }

        /* EMPTY */
        .empty-state { padding:60px 20px; text-align:center; color:#94A3B8; }
        .empty-state i { font-size:48px; display:block; margin-bottom:12px; }
        .empty-state p { font-size:14px; }

        /* NIS PREVIEW */
        .nis-preview { background:#F8FAFC; border:1.5px solid #E2E8F0;
            border-radius:10px; padding:10px 14px; font-size:13px; color:#475569; min-height:40px; }

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
                <div style="width:48px;height:48px;background:rgba(255,255,255,.15);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:24px;">&#128221;</div>
                <div>
                    <h1>Verifikasi Catatan</h1>
                    <p>Kelola dan verifikasi catatan perilaku siswa (prestasi &amp; pelanggaran) dari guru / wali kelas</p>
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

        {{-- STAT CARDS --}}
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="stat-card stat-total h-100">
                    <div class="stat-icon"><i class="bi bi-journal-text"></i></div>
                    <div>
                        <div class="stat-label">Total Catatan</div>
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
                        <div class="stat-sub">Perlu diverifikasi</div>
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
                        <div class="stat-sub">Catatan prestasi</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="stat-card stat-pelanggaran h-100">
                    <div class="stat-icon"><i class="bi bi-exclamation-triangle"></i></div>
                    <div>
                        <div class="stat-label">Pelanggaran</div>
                        <div class="stat-value" id="numPelanggaran">{{ $stats['pelanggaran'] }}</div>
                        <div class="stat-sub">Catatan pelanggaran</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FILTER + TAMBAH --}}
        <div class="filter-card">
            <form method="GET" action="{{ route('verifikasi.catatan') }}" id="filterForm">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-4">
                        <label style="font-size:12px;font-weight:600;color:#475569;display:block;margin-bottom:5px;">Cari Catatan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white" style="border-radius:10px 0 0 10px;border:1.5px solid #E2E8F0;border-right:none;">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" name="search" id="inputSearch" class="form-control"
                                   placeholder="Nama, NIS, pencatat, kategori, keterangan..."
                                   value="{{ request('search') }}"
                                   style="border-radius:0 10px 10px 0;border:1.5px solid #E2E8F0;border-left:none;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <label style="font-size:12px;font-weight:600;color:#475569;display:block;margin-bottom:5px;">Status</label>
                        <select name="status" class="form-select form-select-custom" onchange="this.form.submit()">
                            <option value="">Semua Status</option>
                            <option value="menunggu"  {{ request('status')=='menunggu'  ? 'selected':'' }}>Menunggu</option>
                            <option value="disetujui" {{ request('status')=='disetujui' ? 'selected':'' }}>Disetujui</option>
                            <option value="ditolak"   {{ request('status')=='ditolak'   ? 'selected':'' }}>Ditolak</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-2">
                        <label style="font-size:12px;font-weight:600;color:#475569;display:block;margin-bottom:5px;">Jenis</label>
                        <select name="jenis" class="form-select form-select-custom" onchange="this.form.submit()">
                            <option value="">Semua Jenis</option>
                            <option value="prestasi"    {{ request('jenis')=='prestasi'    ? 'selected':'' }}>Prestasi</option>
                            <option value="pelanggaran" {{ request('jenis')=='pelanggaran' ? 'selected':'' }}>Pelanggaran</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-2">
                        <button type="submit" class="btn btn-primary w-100 fw-semibold rounded-3" style="font-size:13px;padding:9px;">
                            <i class="bi bi-funnel me-1"></i> Filter
                        </button>
                    </div>
                    <div class="col-6 col-md-2">
                        <button type="button" class="btn-add-catatan" data-bs-toggle="modal" data-bs-target="#modalTambahCatatan" id="btnTambahCatatan">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Catatan
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- STATUS TABS --}}
        <ul class="nav custom-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link {{ !request('status') ? 'active':'' }}"
                   href="{{ route('verifikasi.catatan') }}{{ request('search') ? '?search='.urlencode(request('search')):'' }}{{ request('jenis') ? (request('search')?'&':'?').'jenis='.request('jenis'):'' }}">
                    Semua <span class="badge bg-secondary rounded-pill ms-1">{{ $stats['total'] }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('status')=='menunggu' ? 'active':'' }}"
                   href="{{ route('verifikasi.catatan') }}?status=menunggu{{ request('search') ? '&search='.urlencode(request('search')):'' }}{{ request('jenis') ? '&jenis='.request('jenis'):'' }}">
                    Menunggu <span class="badge bg-warning text-dark rounded-pill ms-1">{{ $stats['menunggu'] }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('status')=='disetujui' ? 'active':'' }}"
                   href="{{ route('verifikasi.catatan') }}?status=disetujui{{ request('search') ? '&search='.urlencode(request('search')):'' }}{{ request('jenis') ? '&jenis='.request('jenis'):'' }}">
                    Disetujui <span class="badge bg-success rounded-pill ms-1">{{ $stats['disetujui'] }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('status')=='ditolak' ? 'active':'' }}"
                   href="{{ route('verifikasi.catatan') }}?status=ditolak{{ request('search') ? '&search='.urlencode(request('search')):'' }}{{ request('jenis') ? '&jenis='.request('jenis'):'' }}">
                    Ditolak <span class="badge bg-danger rounded-pill ms-1">{{ $stats['ditolak'] }}</span>
                </a>
            </li>
        </ul>

        {{-- TABLE --}}
        <div class="table-card">
            <div class="table-responsive">
                <table class="vtable">
                    <thead>
                        <tr>
                            <th style="width:40px;">#</th>
                            <th>Siswa</th>
                            <th>Pencatat</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th style="width:75px;">Poin</th>
                            <th>Keterangan</th>
                            <th>Tgl Catatan</th>
                            <th>Status</th>
                            <th>Catatan Admin</th>
                            <th>Waktu Verif</th>
                            <th style="width:170px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($catatans as $index => $c)
                            <tr>
                                <td class="text-muted" style="font-size:12px;">{{ $catatans->firstItem() + $index }}</td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $c->siswa?->nama_lengkap ?? '—' }}</div>
                                    <div class="text-muted" style="font-size:11px;">NIS: {{ $c->nis }}</div>
                                    @if($c->siswa?->kelas)
                                        <div class="text-muted" style="font-size:11px;">{{ $c->siswa->kelas }}</div>
                                    @endif
                                </td>
                                <td style="font-size:13px;">{{ $c->nama_pencatat }}</td>
                                <td>
                                    <span class="badge-jenis {{ $c->jenis === 'prestasi' ? 'badge-prestasi' : 'badge-pelanggaran' }}">
                                        {{ $c->jenis === 'prestasi' ? 'Prestasi' : 'Pelanggaran' }}
                                    </span>
                                </td>
                                <td style="font-size:12px;color:#475569;">{{ $c->kategori ?? '—' }}</td>
                                <td>
                                    <span class="poin-badge {{ $c->jenis === 'prestasi' ? 'poin-prestasi' : 'poin-pelanggaran' }}">
                                        {{ $c->jenis === 'prestasi' ? '+' : '-' }}{{ $c->nilai_poin }}
                                    </span>
                                </td>
                                <td style="max-width:180px;">
                                    <span style="font-size:12px;color:#334155;" title="{{ $c->keterangan }}">
                                        {{ Str::limit($c->keterangan, 55) }}
                                    </span>
                                </td>
                                <td style="font-size:12px;color:#64748B;white-space:nowrap;">
                                    {{ $c->tanggal_catatan->format('d M Y') }}
                                </td>
                                <td>
                                    <span class="badge-jenis
                                        @if($c->status==='menunggu') badge-menunggu
                                        @elseif($c->status==='disetujui') badge-disetujui
                                        @else badge-ditolak @endif">
                                        @if($c->status==='menunggu') Menunggu
                                        @elseif($c->status==='disetujui') Disetujui
                                        @else Ditolak @endif
                                    </span>
                                </td>
                                <td style="font-size:12px;color:#64748B;max-width:150px;">
                                    {{ $c->catatan_admin ? Str::limit($c->catatan_admin, 45) : '—' }}
                                </td>
                                <td style="font-size:12px;color:#64748B;white-space:nowrap;">
                                    @if($c->verified_at)
                                        {{ $c->verified_at->format('d M Y') }}
                                        <div style="font-size:10px;color:#94A3B8;">{{ $c->verified_at->format('H:i') }}</div>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1 flex-wrap">
                                        @if($c->status === 'menunggu')
                                            <button class="btn-aksi btn-setujui"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalSetujui{{ $c->id }}"
                                                    id="btnSetujui{{ $c->id }}">
                                                <i class="bi bi-check-lg"></i> Setujui
                                            </button>
                                            <button class="btn-aksi btn-tolak"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalTolak{{ $c->id }}"
                                                    id="btnTolak{{ $c->id }}">
                                                <i class="bi bi-x-lg"></i> Tolak
                                            </button>
                                            <button class="btn-aksi btn-hapus"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalHapus{{ $c->id }}"
                                                    id="btnHapus{{ $c->id }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        @else
                                            <span class="text-muted" style="font-size:11px;font-style:italic;">Sudah diproses</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            {{-- MODALS per baris --}}
                            @if($c->status === 'menunggu')

                            {{-- MODAL SETUJUI --}}
                            <div class="modal fade" id="modalSetujui{{ $c->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header-success d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-check-circle-fill fs-5"></i>
                                                <h5 class="modal-title mb-0 fw-bold fs-6">Setujui Catatan</h5>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="p-3 rounded-3 mb-3" style="background:#F0FDF4;border:1px solid #BBF7D0;">
                                                <div class="fw-semibold" style="font-size:13px;color:#065F46;">{{ $c->siswa?->nama_lengkap ?? $c->nis }}</div>
                                                <div style="font-size:12px;color:#047857;">{{ ucfirst($c->jenis) }} &bull; {{ $c->jenis==='prestasi' ? '+' : '-' }}{{ $c->nilai_poin }} poin &bull; {{ $c->kategori ?? '—' }}</div>
                                                <div style="font-size:12px;color:#6B7280;margin-top:4px;">{{ $c->keterangan }}</div>
                                            </div>
                                            <p style="font-size:13px;color:#374151;">Dengan menyetujui catatan ini, poin siswa akan diperbarui secara otomatis.</p>
                                            <form action="{{ route('verifikasi.catatan.proses', $c->id) }}" method="POST" id="formSetujui{{ $c->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="sumber" value="{{ $c->sumber ?? 'catatan' }}">
                                                <input type="hidden" name="aksi" value="disetujui">
                                                <div class="mt-3">
                                                    <label class="form-label-custom">Catatan Admin (opsional)</label>
                                                    <textarea name="catatan_admin" class="form-control form-control-custom" rows="2" placeholder="Catatan verifikasi..."></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer bg-light py-3 px-4 gap-2">
                                            <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" form="formSetujui{{ $c->id }}" class="btn btn-success rounded-3 px-4 fw-bold">
                                                <i class="bi bi-check-lg me-1"></i> Setujui &amp; Perbarui Poin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MODAL TOLAK --}}
                            <div class="modal fade" id="modalTolak{{ $c->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header-danger d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-x-circle-fill fs-5"></i>
                                                <h5 class="modal-title mb-0 fw-bold fs-6">Tolak Catatan</h5>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="p-3 rounded-3 mb-3" style="background:#FEF2F2;border:1px solid #FECACA;">
                                                <div class="fw-semibold" style="font-size:13px;color:#991B1B;">{{ $c->siswa?->nama_lengkap ?? $c->nis }}</div>
                                                <div style="font-size:12px;color:#DC2626;">{{ ucfirst($c->jenis) }} &bull; {{ $c->nilai_poin }} poin &bull; {{ $c->kategori ?? '—' }}</div>
                                                <div style="font-size:12px;color:#6B7280;margin-top:4px;">{{ $c->keterangan }}</div>
                                            </div>
                                            <form action="{{ route('verifikasi.catatan.proses', $c->id) }}" method="POST" id="formTolak{{ $c->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="sumber" value="{{ $c->sumber ?? 'catatan' }}">
                                                <input type="hidden" name="aksi" value="ditolak">
                                                <div class="mt-2">
                                                    <label class="form-label-custom">Alasan Penolakan <span class="text-danger">*</span></label>
                                                    <textarea name="catatan_admin" class="form-control form-control-custom" rows="3" placeholder="Tuliskan alasan penolakan..." required></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer bg-light py-3 px-4 gap-2">
                                            <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" form="formTolak{{ $c->id }}" class="btn btn-danger rounded-3 px-4 fw-bold">
                                                <i class="bi bi-x-lg me-1"></i> Tolak Catatan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MODAL HAPUS --}}
                            <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header-warning d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-trash3-fill fs-5"></i>
                                                <h5 class="modal-title mb-0 fw-bold fs-6">Hapus Catatan</h5>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4 text-center">
                                            <div style="font-size:48px;margin-bottom:12px;">&#128465;</div>
                                            <p style="font-size:14px;color:#374151;">
                                                Yakin ingin menghapus catatan dari
                                                <strong>{{ $c->siswa?->nama_lengkap ?? $c->nis }}</strong>?
                                            </p>
                                            <p style="font-size:12px;color:#94A3B8;margin-top:6px;">Tindakan ini tidak dapat dibatalkan.</p>
                                            <form action="{{ route('verifikasi.catatan.hapus', $c->id) }}" method="POST" id="formHapus{{ $c->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="sumber" value="{{ $c->sumber ?? 'catatan' }}">
                                            </form>
                                        </div>
                                        <div class="modal-footer bg-light py-3 px-4 justify-content-center gap-2">
                                            <button type="button" class="btn btn-secondary rounded-3 px-4" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" form="formHapus{{ $c->id }}" class="btn btn-danger rounded-3 px-4 fw-bold">
                                                <i class="bi bi-trash3 me-1"></i> Ya, Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif

                        @empty
                            <tr>
                                <td colspan="12">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox"></i>
                                        <p class="fw-semibold" style="color:#475569;font-size:15px;">Belum ada catatan</p>
                                        <p>Catatan yang masuk dari guru akan tampil di sini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($catatans->hasPages())
                <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top"
                     style="background:#FAFAFA;font-size:13px;">
                    <div class="text-muted">
                        Menampilkan {{ $catatans->firstItem() }}–{{ $catatans->lastItem() }}
                        dari {{ $catatans->total() }} catatan
                    </div>
                    <div>{{ $catatans->links() }}</div>
                </div>
            @endif
        </div>

    </div>{{-- end container --}}

    {{-- MODAL TAMBAH CATATAN --}}
    <div class="modal fade" id="modalTambahCatatan" tabindex="-1" aria-labelledby="labelTambahCatatan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header-primary d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-journal-plus fs-5"></i>
                        <h5 class="modal-title mb-0 fw-bold fs-6" id="labelTambahCatatan">Tambah Catatan Baru</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('verifikasi.catatan.simpan') }}" method="POST" id="formTambahCatatan">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            {{-- Siswa --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Siswa <span class="text-danger">*</span></label>
                                <select name="nis" id="selectSiswa" class="form-select form-select-custom" required onchange="updateSiswaPreview(this)">
                                    <option value="">-- Pilih Siswa --</option>
                                    @foreach($siswas as $s)
                                        <option value="{{ $s->nis }}" data-kelas="{{ $s->kelas }}" {{ old('nis')==$s->nis ? 'selected':'' }}>
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
                            {{-- Pencatat --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Nama Pencatat <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pencatat" class="form-control form-control-custom"
                                       placeholder="Nama guru / wali kelas"
                                       value="{{ old('nama_pencatat') }}" required>
                            </div>
                            {{-- Tanggal --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Tanggal Kejadian <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_catatan" class="form-control form-control-custom"
                                       max="{{ date('Y-m-d') }}"
                                       value="{{ old('tanggal_catatan', date('Y-m-d')) }}" required>
                            </div>
                            {{-- Jenis --}}
                            <div class="col-6 col-md-3">
                                <label class="form-label-custom">Jenis <span class="text-danger">*</span></label>
                                <select name="jenis" class="form-select form-select-custom" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="prestasi"    {{ old('jenis')=='prestasi'    ? 'selected':'' }}>Prestasi</option>
                                    <option value="pelanggaran" {{ old('jenis')=='pelanggaran' ? 'selected':'' }}>Pelanggaran</option>
                                </select>
                            </div>
                            {{-- Poin --}}
                            <div class="col-6 col-md-3">
                                <label class="form-label-custom">Poin <span class="text-danger">*</span></label>
                                <input type="number" name="nilai_poin" class="form-control form-control-custom"
                                       placeholder="1–500" min="1" max="500"
                                       value="{{ old('nilai_poin') }}" required>
                            </div>
                            {{-- Kategori --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label-custom">Kategori</label>
                                <input type="text" name="kategori" class="form-control form-control-custom"
                                       placeholder="Kedisiplinan, Akademik, Sosial, dll."
                                       value="{{ old('kategori') }}">
                            </div>
                            {{-- Keterangan --}}
                            <div class="col-12">
                                <label class="form-label-custom">Keterangan <span class="text-danger">*</span></label>
                                <textarea name="keterangan" class="form-control form-control-custom" rows="3"
                                          placeholder="Jelaskan secara singkat catatan ini..." required>{{ old('keterangan') }}</textarea>
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
                        <button type="submit" class="btn rounded-3 px-4 fw-bold" style="background:linear-gradient(135deg,#8B5CF6,#6D28D9);color:#fff;" id="btnSubmitCatatan">
                            <i class="bi bi-send-fill me-1"></i> Kirim Catatan
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
            setTimeout(function() { new bootstrap.Alert(el).close(); }, 5000);
        });

        // NIS preview
        function updateSiswaPreview(sel) {
            var preview = document.getElementById('nisPreview');
            if (sel.value) {
                var opt = sel.options[sel.selectedIndex];
                preview.innerHTML = '<strong>' + sel.value + '</strong>' +
                    '<span class="text-muted ms-2" style="font-size:12px;">' + opt.getAttribute('data-kelas') + '</span>';
            } else {
                preview.innerHTML = '<span class="text-muted">— pilih siswa terlebih dahulu —</span>';
            }
        }

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

        // Re-open modal tambah jika ada error validasi
        @if($errors->any())
            var m = new bootstrap.Modal(document.getElementById('modalTambahCatatan'));
            m.show();
        @endif
    </script>
</body>
</html>
