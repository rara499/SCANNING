<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Catatan – SCANNING SMKN 1 Air Naningan</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary:       #1E2869;
            --accent-blue:   #2563EB;
            --bg-canvas:     #F8FAFC;
        }
        * { box-sizing:border-box; font-family:'Plus Jakarta Sans',sans-serif; }
        body { background:var(--bg-canvas); color:#1E293B; min-height:100vh; }
        
        .navbar-main { background:var(--primary); color:#fff; padding:12px 20px; box-shadow:0 4px 20px rgba(15,23,42,.15); }
        .nav-btn { background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.2); color:#fff;
            border-radius:8px; padding:7px 14px; font-size:13px; font-weight:600; text-decoration:none; transition:all 0.2s;}
        .nav-btn:hover { background:rgba(255,255,255,.25); color:#fff; }
        
        .page-header { background:linear-gradient(135deg,var(--primary) 0%,#3b4db0 60%,#8B5CF6 100%);
            color:#fff; padding:50px 0 60px; }
        .page-header h1 { font-weight:800; font-size:28px; margin-bottom:8px; }
        
        .stat-card { border-radius:16px; padding:20px; display:flex; align-items:center; gap:16px;
            color:#fff; box-shadow:0 8px 24px rgba(0,0,0,.1); transition:transform .2s; margin-top:-35px; margin-bottom:24px;}
        .stat-card:hover { transform:translateY(-5px); }
        .stat-icon { width:52px; height:52px; border-radius:14px; background:rgba(255,255,255,.25);
            display:flex; align-items:center; justify-content:center; font-size:24px; flex-shrink:0; }
        
        .stat-total       { background:linear-gradient(135deg,#3730A3,#4F46E5); }
        .stat-menunggu    { background:linear-gradient(135deg,#B45309,#F59E0B); }
        .stat-disetujui   { background:linear-gradient(135deg,#065F46,#10B981); }
        .stat-ditolak     { background:linear-gradient(135deg,#991B1B,#EF4444); }

        .table-card { background:#fff; border-radius:20px; box-shadow:0 10px 40px rgba(0,0,0,.04); overflow:hidden; padding:28px;}
        .vtable { font-size:13px; width:100%; border-collapse:collapse; }
        .vtable thead th { background:var(--bg-canvas); color:#475569; font-weight:700;
            font-size:12px; text-transform:uppercase; letter-spacing:.5px; padding:16px 18px; white-space:nowrap; border-bottom:1px solid #E2E8F0; border-top:1px solid #E2E8F0;}
        .vtable tbody tr { border-bottom:1px solid #F1F5F9; transition:background .15s; }
        .vtable tbody tr:hover { background:#F8FAFF; }
        .vtable tbody td { padding:16px 18px; vertical-align:middle; }
        
        .badge-jenis { padding:5px 12px; border-radius:8px; font-size:11px; font-weight:800; display:inline-block; }
        .badge-prestasi { background:#EFF6FF; color:#1D4ED8; }
        .badge-pelanggaran { background:#FEF2F2; color:#DC2626; }
        
        .badge-status { padding:6px 14px; border-radius:30px; font-size:12px; font-weight:700; display:inline-flex; align-items:center; gap:6px;}
        .badge-menunggu { background:#FFFBEB; color:#D97706; border:1px solid #FCD34D; }
        .badge-disetujui { background:#ECFDF5; color:#059669; border:1px solid #6EE7B7; }
        .badge-ditolak { background:#FEF2F2; color:#DC2626; border:1px solid #FCA5A5; }
    </style>
</head>
<body>

    <nav class="navbar-main d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboardUmum') }}" class="d-flex align-items-center gap-2 text-white text-decoration-none">
            <div style="width:38px;height:38px;background:#FFFFFF;border-radius:10px;display:flex;align-items:center;justify-content:center;padding:4px;box-shadow:0 2px 8px rgba(0,0,0,0.15);flex-shrink:0;">
                <img src="{{ asset('sclg-removebg-preview.png') }}" alt="Logo" style="width:100%;height:100%;object-fit:contain;">
            </div>
            <div>
                <div style="font-size:14px;font-weight:700;line-height:1.2;">SCANNING</div>
                <div style="font-size:11px;opacity:0.75;">SMKN 1 Air Naningan</div>
            </div>
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('sidebar_menu') }}" class="nav-btn"><i class="bi bi-grid-fill"></i> Menu</a>
            @if(!auth('siswa')->check())
            <a href="{{ route('input.catatan') }}" class="nav-btn"><i class="bi bi-pencil-square"></i> Input Baru</a>
            @endif
            <a href="{{ route('profil') }}" class="nav-btn"><i class="bi bi-person-circle"></i> Profil</a>
            <a href="{{ route('logout') }}" class="nav-btn text-white" style="background: rgba(239, 68, 68, 0.8); border-color: rgba(239, 68, 68, 0.4);"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1>Riwayat Catatan Saya</h1>
            <p>Daftar riwayat prestasi dan pelanggaran siswa yang telah Anda laporkan.</p>
        </div>
    </div>

    <div class="container px-4">
        @if(session('success'))
            <div class="alert alert-success mt-3 mb-0 rounded-4 border-0 text-white p-3" style="background:linear-gradient(135deg,#10B981,#059669) !important;box-shadow:0 8px 20px rgba(16,185,129,.2);">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row g-3">
            <div class="col-6 col-md-3">
                <div class="stat-card stat-total">
                    <div class="stat-icon"><i class="bi bi-journal-text"></i></div>
                    <div>
                        <div style="font-size:13px;font-weight:600;opacity:0.9;">Total Catatan</div>
                        <div style="font-size:28px;font-weight:800;line-height:1;margin-top:2px;">{{ $stats['total'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-menunggu">
                    <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
                    <div>
                        <div style="font-size:13px;font-weight:600;opacity:0.9;">Menunggu</div>
                        <div style="font-size:28px;font-weight:800;line-height:1;margin-top:2px;">{{ $stats['menunggu'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-disetujui">
                    <div class="stat-icon"><i class="bi bi-check-circle"></i></div>
                    <div>
                        <div style="font-size:13px;font-weight:600;opacity:0.9;">Disetujui</div>
                        <div style="font-size:28px;font-weight:800;line-height:1;margin-top:2px;">{{ $stats['disetujui'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-ditolak">
                    <div class="stat-icon"><i class="bi bi-x-circle"></i></div>
                    <div>
                        <div style="font-size:13px;font-weight:600;opacity:0.9;">Ditolak</div>
                        <div style="font-size:28px;font-weight:800;line-height:1;margin-top:2px;">{{ $stats['ditolak'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-card mt-3 mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-table text-primary me-2"></i> Daftar Riwayat Pengajuan</h5>
                <form method="GET" action="{{ route('riwayat.catatan') }}">
                    <select name="status" class="form-select border-0 bg-light fw-bold text-primary" onchange="this.form.submit()" style="border-radius:12px;padding:10px 35px 10px 15px;cursor:pointer;font-size:13px;box-shadow:inset 0 0 0 1px #E2E8F0;">
                        <option value="">Semua Status</option>
                        <option value="menunggu" {{ request('status')=='menunggu' ? 'selected':'' }}>⏳ Menunggu</option>
                        <option value="disetujui" {{ request('status')=='disetujui' ? 'selected':'' }}>✅ Disetujui</option>
                        <option value="ditolak" {{ request('status')=='ditolak' ? 'selected':'' }}>❌ Ditolak</option>
                    </select>
                </form>
            </div>
            
            <div class="table-responsive">
                <table class="vtable">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>Tanggal</th>
                            <th>Jenis / Poin</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Tanggapan Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $r)
                        @php
                            $siswa = \App\Models\Siswa::where('nis', $r->nis)->first();
                        @endphp
                        <tr>
                            <td>
                                <div class="fw-bold text-dark fs-6">{{ $siswa?->nama_lengkap ?? 'Siswa (NIS: '.$r->nis.')' }}</div>
                                <div class="text-muted" style="font-size:12px;">NIS: {{ $r->nis }} &bull; {{ $siswa?->kelas ?? '-' }}</div>
                            </td>
                            <td class="text-muted fw-bold">{{ \Carbon\Carbon::parse($r->tanggal_catatan)->format('d M Y') }}</td>
                            <td>
                                <span class="badge-jenis {{ $r->jenis === 'prestasi' ? 'badge-prestasi' : 'badge-pelanggaran' }}">
                                    <i class="bi {{ $r->jenis === 'prestasi' ? 'bi-trophy-fill' : 'bi-exclamation-triangle-fill' }} me-1"></i>
                                    {{ ucfirst($r->jenis) }}
                                </span>
                                <div class="mt-2 text-dark fw-bold" style="font-size:13px;">{{ $r->jenis==='prestasi'?'+':'-' }}{{ $r->nilai_poin }} Poin</div>
                            </td>
                            <td style="max-width:280px;">
                                <div class="fw-bold text-primary mb-1" style="font-size:12px; text-transform:uppercase; letter-spacing:0.5px;">{{ $r->kategori ?: 'Tanpa Kategori' }}</div>
                                <div class="text-secondary" style="font-size:13px; line-height:1.4;">{{ Str::limit($r->keterangan, 70) }}</div>
                            </td>
                            <td>
                                @if($r->status === 'menunggu')
                                    <span class="badge-status badge-menunggu"><i class="bi bi-hourglass-split"></i> Menunggu</span>
                                @elseif($r->status === 'disetujui')
                                    <span class="badge-status badge-disetujui"><i class="bi bi-check-circle-fill"></i> Disetujui</span>
                                @else
                                    <span class="badge-status badge-ditolak"><i class="bi bi-x-circle-fill"></i> Ditolak</span>
                                @endif
                            </td>
                            <td style="max-width:220px;">
                                @if($r->catatan_admin)
                                    <div style="font-size:12px;background:#F8FAFC;padding:10px;border-radius:10px;color:#334155;border:1px solid #E2E8F0;line-height:1.4;">
                                        "{{ $r->catatan_admin }}"
                                    </div>
                                    @if($r->verified_at)
                                        <div class="text-muted mt-2 fw-semibold" style="font-size:10px;"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($r->verified_at)->format('d M Y H:i') }}</div>
                                    @endif
                                @else
                                    <span class="text-muted fw-medium" style="font-size:12px;opacity:0.7;">— Belum ada tanggapan —</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div style="font-size:48px;color:#CBD5E1;margin-bottom:15px;"><i class="bi bi-folder2-open"></i></div>
                                <div class="fw-bold text-dark fs-5">Belum ada riwayat</div>
                                <p class="text-muted" style="font-size:14px; margin-top:5px;">{{ auth('siswa')->check() ? 'Anda belum memiliki catatan sikap/prestasi/pelanggaran.' : 'Anda belum pernah mengajukan catatan apapun.' }}</p>
                                @if(!auth('siswa')->check())
                                <a href="{{ route('input.catatan') }}" class="btn btn-primary rounded-pill px-5 py-2 mt-3 fw-bold shadow-sm">Buat Catatan Baru</a>
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($riwayat->hasPages())
                <div class="mt-4 pt-4 border-top">
                    {{ $riwayat->links() }}
                </div>
            @endif
        </div>
    </div>

</body>
</html>
