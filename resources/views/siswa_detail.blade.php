<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa - {{ $siswa->nama_lengkap }} ({{ $siswa->nis }})</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary: #1E2869;
            --bg-canvas: #F1F5F9;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-canvas);
            color: #1E293B;
            min-height: 100vh;
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

        .profile-hero {
            background: linear-gradient(135deg, #1E2869 0%, #0F172A 100%);
            border-radius: 20px;
            color: white;
            padding: 28px;
            box-shadow: 0 10px 25px rgba(30, 40, 105, 0.2);
            margin-bottom: 24px;
        }

        .card-custom {
            background: #FFFFFF;
            border-radius: 18px;
            padding: 24px;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            height: 100%;
        }

        .avatar-large {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: linear-gradient(135deg, #3B82F6, #1D4ED8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
            flex-shrink: 0;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar-main">
        <div class="d-flex align-items-center justify-content-between max-w-7xl mx-auto w-100" style="max-width: 1100px;">
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
                @if(!auth('siswa')->check())
                <a href="{{ route('data.siswa') }}" class="btn-nav-action">
                    <i class="bi bi-arrow-left"></i>
                    <span>Data Siswa</span>
                </a>
                @endif
                <a href="{{ route('sidebar_menu') }}" class="btn-nav-action">
                    <i class="bi bi-grid-fill"></i>
                    <span class="d-none d-sm-inline">Menu</span>
                </a>
                <a href="{{ route('dashboardUmum') }}" class="btn-nav-action">
                    <i class="bi bi-speedometer2"></i>
                    <span class="d-none d-sm-inline">Dashboard</span>
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

    <!-- CONTENT -->
    <div class="container py-4" style="max-width: 1100px;">

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- HERO PROFILE -->
        <div class="profile-hero">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="avatar-large">
                        {{ strtoupper(substr($siswa->nama_lengkap, 0, 2)) }}
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h1 class="fs-4 fw-bold mb-0 text-white">{{ $siswa->nama_lengkap }}</h1>
                            <span class="badge bg-warning text-dark font-monospace">{{ $siswa->nis }}</span>
                        </div>
                        <div class="text-white-50" style="font-size: 13px;">
                            Kelas: <strong>{{ $siswa->kelas }}</strong> &bull; Jenis Kelamin: <strong>{{ $siswa->jenis_kelamin }}</strong>
                        </div>
                    </div>
                </div>

                @if(!auth('siswa')->check())
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" onclick="printDataSiswa()" class="btn btn-info btn-sm fw-bold px-3 py-2 rounded-3 d-inline-flex align-items-center gap-2 text-white shadow-sm">
                        <i class="bi bi-printer-fill"></i> Print Data
                    </button>
                    <a href="{{ route('surat.cetak', $siswa->nis) }}" target="_blank" class="btn btn-outline-light btn-sm fw-bold px-3 py-2 rounded-3 d-inline-flex align-items-center gap-2" title="Download Surat Resmi (PDF)">
                        <i class="bi bi-file-earmark-pdf-fill text-danger"></i> Unduh PDF
                    </a>
                    <button type="button" class="btn btn-warning btn-sm fw-bold px-3 py-2 rounded-3 d-inline-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCatatanSikap">
                        <i class="bi bi-plus-circle-fill"></i> Catat Sikap / Poin
                    </button>
                </div>
                @endif
            </div>
        </div>

        <!-- STATS & DETAILS GRID -->
        <div class="row g-4 mb-4">
            
            <!-- TOTAL POIN CARD -->
            <div class="col-12 col-md-4">
                <div class="card-custom text-center d-flex flex-column justify-content-center">
                    <div class="text-muted text-uppercase fw-bold" style="font-size: 12px;">Akumulasi Poin Saat Ini</div>
                    <div class="display-4 fw-bold my-2 {{ $siswa->total_poin >= 100 ? 'text-success' : ($siswa->total_poin >= 80 ? 'text-warning' : 'text-danger') }}">
                        {{ $siswa->total_poin }}
                    </div>
                    <div>
                        <span class="badge {{ $siswa->total_poin >= 100 ? 'bg-success bg-opacity-10 text-success' : 'bg-danger bg-opacity-10 text-danger' }} px-3 py-2 rounded-pill">
                            {{ $siswa->total_poin >= 100 ? 'Status Disiplin: Baik' : 'Status: Perlu Pembinaan' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- BIODATA CARD -->
            <div class="col-12 col-md-8">
                <div class="card-custom">
                    <h3 class="fs-6 fw-bold mb-3 pb-2 border-bottom text-dark">
                        <i class="bi bi-person-lines-fill text-primary me-2"></i>Informasi Biodata Siswa
                    </h3>
                    <div class="row g-3" style="font-size: 13px;">
                        <div class="col-sm-6">
                            <div class="text-muted mb-1">Nomor Induk Siswa (NIS)</div>
                            <div class="fw-bold text-dark">{{ $siswa->nis }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted mb-1">Nama Lengkap</div>
                            <div class="fw-bold text-dark">{{ $siswa->nama_lengkap }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted mb-1">Kelas</div>
                            <div class="fw-bold text-dark">{{ $siswa->kelas }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted mb-1">Jenis Kelamin</div>
                            <div class="fw-bold text-dark">{{ $siswa->jenis_kelamin }}</div>
                        </div>
                        <div class="col-12">
                            <div class="text-muted mb-1">Alamat Tempat Tinggal</div>
                            <div class="fw-bold text-dark">{{ $siswa->alamat ?: 'Belum diisi' }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- 3 KARTU POIN: POIN AWAL, PRESTASI, PELANGGARAN -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-4">
                <div class="card-custom d-flex align-items-center gap-3 p-3">
                    <div class="rounded-4 bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; font-size: 22px; flex-shrink: 0;">
                        <i class="bi bi-flag-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted text-uppercase fw-bold" style="font-size: 11px;">Poin Awal</div>
                        <div class="fs-4 fw-bold text-dark">{{ $siswa->poin_awal }} <span class="fs-6 fw-normal text-muted">Poin</span></div>
                        <div class="text-muted" style="font-size: 11px;">Poin dasar awal masuk sekolah</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card-custom d-flex align-items-center gap-3 p-3">
                    <div class="rounded-4 bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; font-size: 22px; flex-shrink: 0;">
                        <i class="bi bi-arrow-up-right-circle-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted text-uppercase fw-bold" style="font-size: 11px;">Poin Prestasi</div>
                        <div class="fs-4 fw-bold text-success">+{{ $siswa->poin_tambah }} <span class="fs-6 fw-normal text-muted">Poin</span></div>
                        <div class="text-muted" style="font-size: 11px;">Total penambahan poin prestasi</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card-custom d-flex align-items-center gap-3 p-3">
                    <div class="rounded-4 bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; font-size: 22px; flex-shrink: 0;">
                        <i class="bi bi-arrow-down-right-circle-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted text-uppercase fw-bold" style="font-size: 11px;">Poin Pelanggaran</div>
                        <div class="fs-4 fw-bold text-danger">-{{ $siswa->poin_kurang }} <span class="fs-6 fw-normal text-muted">Poin</span></div>
                        <div class="text-muted" style="font-size: 11px;">Total pengurangan akibat pelanggaran</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DETAIL KETERANGAN PRESTASI & PELANGGARAN -->
        <div class="row g-4 mb-4">
            
            <!-- KETERANGAN PRESTASI -->
            <div class="col-12 col-md-6">
                <div class="card-custom">
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-trophy-fill text-success fs-5"></i>
                            <h3 class="fs-6 fw-bold mb-0 text-dark">Keterangan Prestasi</h3>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1 fw-bold">
                            +{{ $siswa->poin_tambah }} Poin
                        </span>
                    </div>

                    @php
                        $listPrestasi = isset($riwayatCatatan) ? $riwayatCatatan->where('jenis', 'prestasi') : collect([]);
                    @endphp

                    @if($listPrestasi->isNotEmpty())
                        <div class="text-muted fw-bold mb-2" style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">
                            Riwayat Catatan Prestasi ({{ $listPrestasi->count() }})
                        </div>
                        <div class="d-flex flex-column gap-2">
                            @foreach($listPrestasi as $item)
                                <div class="p-3 bg-white rounded-3 border">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <div class="fw-bold text-dark" style="font-size: 13px;">
                                            {{ $item->kategori ?: 'Prestasi Siswa' }}
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            @if(isset($item->status) && $item->status !== 'disetujui')
                                                <span class="badge {{ $item->status === 'menunggu' ? 'bg-warning text-dark' : 'bg-danger' }}" style="font-size: 10px;">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            @endif
                                            <span class="badge bg-success text-white fw-bold font-monospace">
                                                +{{ $item->nilai_poin }}
                                            </span>
                                        </div>
                                    </div>
                                    <p class="mb-2 text-secondary" style="font-size: 12px;">{{ $item->keterangan }}</p>
                                    <div class="d-flex align-items-center justify-content-between text-muted" style="font-size: 11px;">
                                        <span><i class="bi bi-calendar-event me-1"></i>{{ \Carbon\Carbon::parse($item->tanggal_catatan)->format('d M Y') }}</span>
                                        <span><i class="bi bi-person me-1"></i>{{ $item->nama_pencatat }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif(!empty($siswa->prestasi))
                        <div class="p-3 bg-light rounded-3 mb-2 border border-success-subtle" style="font-size: 13px; white-space: pre-line; line-height: 1.6; color: #1e293b;">
                            {{ $siswa->prestasi }}
                        </div>
                    @elseif($siswa->poin_tambah > 0)
                        <div class="p-3 bg-light rounded-3 text-secondary" style="font-size: 13px;">
                            <i class="bi bi-info-circle me-1 text-primary"></i> Tercatat akumulasi prestasi sebesar <strong>+{{ $siswa->poin_tambah }} Poin</strong>.
                        </div>
                    @else
                        <div class="text-center py-4 text-muted" style="font-size: 13px;">
                            <i class="bi bi-patch-check fs-2 text-secondary d-block mb-2 opacity-50"></i>
                            Belum ada catatan prestasi atau penghargaan untuk siswa ini.
                        </div>
                    @endif
                </div>
            </div>

            <!-- KETERANGAN PELANGGARAN -->
            <div class="col-12 col-md-6">
                <div class="card-custom">
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
                            <h3 class="fs-6 fw-bold mb-0 text-dark">Keterangan Pelanggaran</h3>
                        </div>
                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-1 fw-bold">
                            -{{ $siswa->poin_kurang }} Poin
                        </span>
                    </div>

                    @php
                        $listPelanggaran = isset($riwayatCatatan) ? $riwayatCatatan->where('jenis', 'pelanggaran') : collect([]);
                    @endphp

                    @if($listPelanggaran->isNotEmpty())
                        <div class="text-muted fw-bold mb-2" style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">
                            Riwayat Catatan Pelanggaran ({{ $listPelanggaran->count() }})
                        </div>
                        <div class="d-flex flex-column gap-2">
                            @foreach($listPelanggaran as $item)
                                <div class="p-3 bg-white rounded-3 border">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <div class="fw-bold text-dark" style="font-size: 13px;">
                                            {{ $item->kategori ?: 'Pelanggaran Disiplin' }}
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            @if(isset($item->status) && $item->status !== 'disetujui')
                                                <span class="badge {{ $item->status === 'menunggu' ? 'bg-warning text-dark' : 'bg-danger' }}" style="font-size: 10px;">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            @endif
                                            <span class="badge bg-danger text-white fw-bold font-monospace">
                                                -{{ $item->nilai_poin }}
                                            </span>
                                        </div>
                                    </div>
                                    <p class="mb-2 text-secondary" style="font-size: 12px;">{{ $item->keterangan }}</p>
                                    <div class="d-flex align-items-center justify-content-between text-muted" style="font-size: 11px;">
                                        <span><i class="bi bi-calendar-event me-1"></i>{{ \Carbon\Carbon::parse($item->tanggal_catatan)->format('d M Y') }}</span>
                                        <span><i class="bi bi-person me-1"></i>{{ $item->nama_pencatat }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif(!empty($siswa->pelanggaran))
                        <div class="p-3 bg-light rounded-3 mb-2 border border-danger-subtle" style="font-size: 13px; white-space: pre-line; line-height: 1.6; color: #1e293b;">
                            {{ $siswa->pelanggaran }}
                        </div>
                    @elseif($siswa->poin_kurang > 0)
                        <div class="p-3 bg-light rounded-3 text-secondary" style="font-size: 13px;">
                            <i class="bi bi-info-circle me-1 text-danger"></i> Tercatat akumulasi pengurangan sebesar <strong>-{{ $siswa->poin_kurang }} Poin</strong>.
                        </div>
                    @else
                        <div class="text-center py-4 text-muted" style="font-size: 13px;">
                            <i class="bi bi-shield-check fs-2 text-success d-block mb-2 opacity-50"></i>
                            Tidak ada catatan pelanggaran tata tertib untuk siswa ini.
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>

    <!-- MODAL CATAT SIKAP -->
    <div class="modal fade" id="modalCatatanSikap" tabindex="-1" aria-labelledby="modalCatatanSikapLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-primary text-white py-3 px-4">
                    <h5 class="modal-title fs-6 fw-bold mb-0" id="modalCatatanSikapLabel">
                        Update Catatan Sikap: {{ $siswa->nama_lengkap }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('catatan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nis" value="{{ $siswa->nis }}">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size: 13px;">Jenis Catatan <span class="text-danger">*</span></label>
                            <select name="jenis" class="form-select rounded-3" required>
                                <option value="prestasi">Prestasi (Menambah Poin)</option>
                                <option value="pelanggaran">Pelanggaran (Mengurangi Poin)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size: 13px;">Jumlah Poin <span class="text-danger">*</span></label>
                            <input type="number" name="poin" min="1" max="100" class="form-control rounded-3" placeholder="Contoh: 10" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size: 13px;">Keterangan / Deskripsi</label>
                            <textarea name="keterangan" class="form-control rounded-3" rows="3" placeholder="Deskripsi aktivitas atau kejadian..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light py-3 px-4">
                        <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-3 px-4 fw-bold">Simpan Catatan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function printDataSiswa() {
            var riwayatHtml = '';
            @if(isset($riwayatCatatan) && $riwayatCatatan->isNotEmpty())
                riwayatHtml = `
                    <h4 style="margin-top: 20px; margin-bottom: 8px; font-size: 13px; color: #1e2869; text-transform: uppercase;">3. Riwayat Catatan Sikap & Karakter</h4>
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px; font-size: 11px;">
                        <thead>
                            <tr style="background: #f1f5f9; color: #1e293b;">
                                <th style="padding: 6px 8px; border: 1px solid #cbd5e1; text-align: center; width: 30px;">No</th>
                                <th style="padding: 6px 8px; border: 1px solid #cbd5e1; width: 80px;">Tanggal</th>
                                <th style="padding: 6px 8px; border: 1px solid #cbd5e1; width: 90px;">Jenis</th>
                                <th style="padding: 6px 8px; border: 1px solid #cbd5e1;">Keterangan Aktivitas</th>
                                <th style="padding: 6px 8px; border: 1px solid #cbd5e1; text-align: center; width: 65px;">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayatCatatan as $idx => $r)
                                <tr>
                                    <td style="padding: 6px 8px; border: 1px solid #cbd5e1; text-align: center;">{{ $idx + 1 }}</td>
                                    <td style="padding: 6px 8px; border: 1px solid #cbd5e1;">{{ \Carbon\Carbon::parse($r->tanggal_catatan)->format('d/m/Y') }}</td>
                                    <td style="padding: 6px 8px; border: 1px solid #cbd5e1; font-weight: bold; color: {{ $r->jenis == 'prestasi' ? '#166534' : '#991b1b' }};">
                                        {{ ucfirst($r->jenis) }}
                                    </td>
                                    <td style="padding: 6px 8px; border: 1px solid #cbd5e1;">
                                        <strong>{{ $r->kategori }}</strong><br>
                                        <span style="color: #475569;">{{ $r->keterangan }}</span>
                                    </td>
                                    <td style="padding: 6px 8px; border: 1px solid #cbd5e1; text-align: center; font-weight: bold; color: {{ $r->jenis == 'prestasi' ? '#166534' : '#991b1b' }};">
                                        {{ $r->jenis == 'prestasi' ? '+' . $r->nilai_poin : '-' . $r->nilai_poin }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                `;
            @endif

            var printContents = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print Data Siswa - ${ {!! json_encode($siswa->nama_lengkap) !!} }</title>
                    <style>
                        @page { size: A4 portrait; margin: 15mm; }
                        * { box-sizing: border-box; font-family: 'Segoe UI', Arial, sans-serif; }
                        body { color: #1e293b; line-height: 1.4; margin: 0; padding: 0; background: #fff; }
                        table { width: 100%; border-collapse: collapse; }
                        th, td { vertical-align: top; }
                    </style>
                </head>
                <body>
                    <div style="text-align: center; border-bottom: 2px solid #1e2869; padding-bottom: 10px; margin-bottom: 18px;">
                        <h3 style="margin: 0; font-size: 14px; text-transform: uppercase; color: #1e2869; letter-spacing: 0.5px;">PEMERINTAH PROVINSI LAMPUNG</h3>
                        <h3 style="margin: 2px 0; font-size: 14px; text-transform: uppercase; color: #1e2869;">DINAS PENDIDIKAN DAN KEBUDAYAAN</h3>
                        <h2 style="margin: 2px 0; font-size: 17px; text-transform: uppercase; color: #1e2869;">SMK NEGERI 1 AIR NANINGAN</h2>
                        <p style="margin: 2px 0 0 0; font-size: 10.5px; color: #475569;">Jl. Makam Batu Ruguk, Karang Sari, Kec. Air Naningan, Kab. Tanggamus, Lampung, 35377</p>
                    </div>

                    <h4 style="margin-bottom: 8px; font-size: 13px; color: #1e2869; text-transform: uppercase;">1. Informasi Biodata Siswa</h4>
                    <table style="margin-bottom: 18px; font-size: 12px;">
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; width: 28%; background: #f8fafc;">Nomor Induk Siswa (NIS)</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold;">{{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; background: #f8fafc;">Nama Lengkap</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; color: #1e2869;">{{ $siswa->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; background: #f8fafc;">Kelas</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1;">{{ $siswa->kelas }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; background: #f8fafc;">Jenis Kelamin</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1;">{{ $siswa->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; background: #f8fafc;">Alamat Tempat Tinggal</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1;">{{ $siswa->alamat ?: '-' }}</td>
                        </tr>
                    </table>

                    <h4 style="margin-bottom: 8px; font-size: 13px; color: #1e2869; text-transform: uppercase;">2. Akumulasi Poin Kedisiplinan</h4>
                    <table style="margin-bottom: 18px; font-size: 12px;">
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; width: 28%; background: #f8fafc;">Poin Awal (Standar)</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1;">{{ $siswa->poin_awal }} Poin</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; background: #f8fafc;">Total Poin Prestasi</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; color: #166534; font-weight: bold;">+{{ $siswa->poin_tambah }} Poin</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; background: #f8fafc;">Total Poin Pelanggaran</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; color: #991b1b; font-weight: bold;">-{{ $siswa->poin_kurang }} Poin</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-weight: bold; background: #f8fafc;">Total Akumulasi Saat Ini</td>
                            <td style="padding: 6px 10px; border: 1px solid #cbd5e1; font-size: 13px;">
                                <strong style="color: {{ $siswa->total_poin >= 100 ? '#166534' : ($siswa->total_poin >= 80 ? '#854d0e' : '#991b1b') }};">
                                    {{ $siswa->total_poin }} Poin
                                </strong>
                                &bull; <span style="font-weight: 600;">{{ $siswa->total_poin >= 100 ? 'Status Disiplin: Baik' : 'Status: Perlu Pembinaan' }}</span>
                            </td>
                        </tr>
                    </table>

                    ${riwayatHtml}

                    <div style="display: flex; justify-content: flex-end; margin-top: 30px; page-break-inside: avoid;">
                        <div style="text-align: center; width: 220px; font-size: 11px;">
                            <p style="margin-bottom: 50px;">Air Naningan, ${new Date().toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'})}<br>Petugas Kesiswaan / Guru BK,</p>
                            <p style="font-weight: bold; margin: 0; text-decoration: underline;">( __________________________ )</p>
                            <p style="margin: 2px 0 0 0; color: #64748b;">NIP. .....................................</p>
                        </div>
                    </div>
                </body>
                </html>
            `;

            // Buat iframe tersembunyi untuk proses print langsung
            var oldFrame = document.getElementById('print_frame_siswa');
            if (oldFrame) {
                oldFrame.remove();
            }

            var iframe = document.createElement('iframe');
            iframe.id = 'print_frame_siswa';
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
