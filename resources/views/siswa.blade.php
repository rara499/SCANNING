<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - SCANNING SMKN 1 Air Naningan</title>
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

        /* TOP NAVIGATION */
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

        /* MAIN CONTAINER */
        .main-container {
            flex: 1;
            max-width: 1320px;
            width: 100%;
            margin: 0 auto;
            padding: 24px 16px 48px 16px;
        }

        /* PAGE HEADER BANNER */
        .page-header-card {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            border: 1px solid #E2E8F0;
            margin-bottom: 20px;
        }

        /* FILTER HORIZONTAL SCROLL */
        .filter-pills-wrapper {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding-bottom: 6px;
            scrollbar-width: thin;
        }

        .filter-pills-wrapper::-webkit-scrollbar {
            height: 4px;
        }
        .filter-pills-wrapper::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }

        .filter-pill {
            background: #FFFFFF;
            color: #475569;
            border: 1px solid #CBD5E1;
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.2s ease;
        }

        .filter-pill:hover {
            background: #F1F5F9;
            color: #1E293B;
            border-color: #94A3B8;
        }

        .filter-pill.active {
            background: #FF8D28;
            color: white;
            border-color: #FF8D28;
            box-shadow: 0 2px 8px rgba(255, 141, 40, 0.3);
        }

        /* SEARCH BAR */
        .search-box-large {
            position: relative;
            width: 100%;
        }

        .search-box-large input {
            background: #FFFFFF;
            border: 1px solid #CBD5E1;
            border-radius: 12px;
            padding: 10px 16px 10px 42px;
            font-size: 14px;
            width: 100%;
            outline: none;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
            transition: all 0.2s;
        }

        .search-box-large input:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
        }

        .search-box-large .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748B;
            font-size: 16px;
        }

        /* DATA TABLE STYLING */
        .table-card {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            border: 1px solid #E2E8F0;
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

        /* STUDENT AVATAR */
        .avatar-box {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #1E2869, #3B82F6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(30, 40, 105, 0.2);
        }

        /* POINT BADGE */
        .badge-poin {
            font-size: 12px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .badge-poin-aman { background-color: #DCFCE7; color: #166534; }
        .badge-poin-waspada { background-color: #FEF9C3; color: #854D0E; }
        .badge-poin-bahaya { background-color: #FEE2E2; color: #991B1B; }

        /* MOBILE STUDENT CARD (Alternative to Table on Mobile) */
        .student-mobile-card {
            background: #FFFFFF;
            border-radius: 14px;
            padding: 14px;
            border: 1px solid #E2E8F0;
            margin-bottom: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
            transition: all 0.2s;
        }

        .student-mobile-card:hover {
            border-color: #94A3B8;
        }
    </style>
</head>
<body>

    <!-- TOP NAVBAR -->
    <nav class="navbar-main">
        <div class="d-flex align-items-center justify-content-between max-w-7xl mx-auto w-100" style="max-width: 1320px;">
            
            <a href="{{ route('dashboardUmum') }}" class="navbar-brand-custom">
                <div class="brand-logo-box">
                    <img src="{{ asset('sclg-removebg-preview.png') }}" alt="Logo">
                </div>
                <div>
                    <div class="brand-title">SCANNING</div>
                    <div class="text-white-50" style="font-size: 11px;">Data Siswa SMKN 1 Air Naningan</div>
                </div>
            </a>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('dashboardUmum') }}" class="btn-nav-action">
                    <i class="bi bi-speedometer2"></i>
                    <span class="d-none d-sm-inline">Dashboard</span>
                </a>

                <a href="{{ route('sidebar_menu') }}" class="btn-nav-action">
                    <i class="bi bi-grid-fill"></i>
                    <span class="d-none d-sm-inline">Menu</span>
                </a>

                @if(auth()->check() && auth()->user()->role === 'guru')
                    <button type="button" class="btn btn-warning btn-sm rounded-3 fw-bold d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahSiswa">
                        <i class="bi bi-person-plus-fill"></i>
                        <span class="d-none d-sm-inline">Tambah Siswa</span>
                    </button>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                    @csrf
                    <button type="submit" class="btn-nav-action btn-nav-logout" title="Keluar / Logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="d-none d-sm-inline">Logout</span>
                    </button>
                </form>
            </div>

        </div>
    </nav>

    <!-- MAIN CONTAINER -->
    <div class="main-container">

        <!-- SUCCESS ALERT -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3 shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- PAGE TITLE & CONTROLS -->
        <div class="page-header-card">
            <div class="row align-items-center g-3">
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-2">
                        <h1 class="fs-4 fw-bold text-dark mb-0">Buku Induk Data Siswa</h1>
                        <span class="badge bg-primary rounded-pill px-2.5 py-1">{{ $siswas->count() }} Siswa</span>
                    </div>
                    <p class="text-muted mb-0 mt-1" style="font-size: 13px;">
                        Kelola data pribadi, riwayat kelas, dan akumulasi poin kedisiplinan siswa.
                    </p>
                </div>
                <div class="col-md-6">
                    <!-- Search Input -->
                    <form action="{{ route('data.siswa') }}" method="GET" class="search-box-large">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan NIS atau Nama Lengkap...">
                        @if(request('kelas'))
                            <input type="hidden" name="kelas" value="{{ request('kelas') }}">
                        @endif
                    </form>
                </div>
            </div>

            <!-- Filter Pills by Class -->
            <div class="mt-3 pt-3 border-top">
                <div class="d-flex align-items-center gap-2 mb-2 text-muted" style="font-size: 12px; font-weight: 600;">
                    <i class="bi bi-funnel-fill text-primary"></i> Filter Menurut Kelas:
                </div>
                <div class="filter-pills-wrapper">
                    <a href="{{ route('data.siswa', request()->only('search')) }}" class="filter-pill {{ !request('kelas') ? 'active' : '' }}">Semua Kelas</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'X RPL'])) }}" class="filter-pill {{ request('kelas') == 'X RPL' ? 'active' : '' }}">X RPL</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'XI RPL'])) }}" class="filter-pill {{ request('kelas') == 'XI RPL' ? 'active' : '' }}">XI RPL</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'XII RPL'])) }}" class="filter-pill {{ request('kelas') == 'XII RPL' ? 'active' : '' }}">XII RPL</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'X APHP'])) }}" class="filter-pill {{ request('kelas') == 'X APHP' ? 'active' : '' }}">X APHP</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'XI APHP'])) }}" class="filter-pill {{ request('kelas') == 'XI APHP' ? 'active' : '' }}">XI APHP</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'XII APHP'])) }}" class="filter-pill {{ request('kelas') == 'XII APHP' ? 'active' : '' }}">XII APHP</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'X TSM'])) }}" class="filter-pill {{ request('kelas') == 'X TSM' ? 'active' : '' }}">X TSM</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'XI TSM'])) }}" class="filter-pill {{ request('kelas') == 'XI TSM' ? 'active' : '' }}">XI TSM</a>
                    <a href="{{ route('data.siswa', array_merge(request()->only('search'), ['kelas' => 'XII TSM'])) }}" class="filter-pill {{ request('kelas') == 'XII TSM' ? 'active' : '' }}">XII TSM</a>
                </div>
            </div>
        </div>

        <!-- DESKTOP DATA TABLE (Visible on medium and large screens) -->
        <div class="table-card d-none d-md-block">
            <div class="table-responsive">
                <table class="table table-custom align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Profil Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Total Poin</th>
                            <th>Pelanggaran / Prestasi</th>
                            <th class="text-end" style="min-width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswas as $index => $siswa)
                            <tr>
                                <td class="text-muted font-monospace">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar-box">
                                            {{ strtoupper(substr($siswa->nama_lengkap, 0, 2)) }}
                                        </div>
                                        <div>
                                            <a href="{{ route('siswa.show', $siswa->nis) }}" class="fw-bold text-dark text-decoration-none hover-primary">
                                                {{ $siswa->nama_lengkap }}
                                            </a>
                                            <div class="text-muted" style="font-size: 11px;">{{ $siswa->jenis_kelamin }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border font-monospace px-2 py-1">{{ $siswa->nis }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2 py-1">
                                        {{ $siswa->kelas }}
                                    </span>
                                </td>
                                <td>
                                    @if($siswa->total_poin >= 100)
                                        <span class="badge-poin badge-poin-aman">
                                            <i class="bi bi-shield-check"></i> {{ $siswa->total_poin }}
                                        </span>
                                    @elseif($siswa->total_poin >= 80)
                                        <span class="badge-poin badge-poin-waspada">
                                            <i class="bi bi-shield-exclamation"></i> {{ $siswa->total_poin }}
                                        </span>
                                    @else
                                        <span class="badge-poin badge-poin-bahaya">
                                            <i class="bi bi-shield-x"></i> {{ $siswa->total_poin }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-danger bg-opacity-10 text-danger me-1">
                                        -{{ $siswa->poin_kurang ?? 0 }}
                                    </span>
                                    <span class="badge bg-success bg-opacity-10 text-success">
                                        +{{ $siswa->poin_tambah ?? 0 }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        
                                        {{-- DETAIL --}}
                                        <a href="{{ route('siswa.show', $siswa->nis) }}" class="btn btn-outline-secondary" title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        {{-- EDIT (ADMIN ONLY) --}}
                                        @if(auth()->check() && auth()->user()->role === 'admin')
                                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editSiswa{{ $siswa->nis }}" title="Edit Data">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            {{-- HAPUS (ADMIN ONLY) --}}
                                            <form action="{{ route('siswa.destroy', $siswa->nis) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Hapus Siswa">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 text-secondary mb-2 d-block"></i>
                                    Tidak ada data siswa yang sesuai dengan pencarian atau filter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MOBILE CARDS LIST (Visible on small screens) -->
        <div class="d-block d-md-none">
            @forelse($siswas as $siswa)
                <div class="student-mobile-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-box" style="width: 34px; height: 34px; font-size: 12px;">
                                {{ strtoupper(substr($siswa->nama_lengkap, 0, 2)) }}
                            </div>
                            <div>
                                <a href="{{ route('siswa.show', $siswa->nis) }}" class="fw-bold text-dark text-decoration-none" style="font-size: 13px;">
                                    {{ $siswa->nama_lengkap }}
                                </a>
                                <div class="text-muted" style="font-size: 11px;">NIS: {{ $siswa->nis }} &bull; {{ $siswa->kelas }}</div>
                            </div>
                        </div>

                        <div>
                            @if($siswa->total_poin >= 100)
                                <span class="badge-poin badge-poin-aman" style="font-size: 11px;">
                                    {{ $siswa->total_poin }}
                                </span>
                            @else
                                <span class="badge-poin badge-poin-bahaya" style="font-size: 11px;">
                                    {{ $siswa->total_poin }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-2 border-top mt-2">
                        <div style="font-size: 11px;" class="text-muted">
                            <span class="text-danger">-{{ $siswa->poin_kurang ?? 0 }}</span> / 
                            <span class="text-success">+{{ $siswa->poin_tambah ?? 0 }}</span>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="{{ route('siswa.show', $siswa->nis) }}" class="btn btn-sm btn-light border px-2 py-1" style="font-size: 11px;">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <button type="button" class="btn btn-sm btn-warning px-2 py-1" style="font-size: 11px;" data-bs-toggle="modal" data-bs-target="#editSiswa{{ $siswa->nis }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('siswa.destroy', $siswa->nis) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger px-2 py-1" style="font-size: 11px;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 bg-white rounded-4 border p-4 text-muted">
                    <i class="bi bi-inbox fs-2 d-block mb-2 text-secondary"></i>
                    Data siswa tidak ditemukan.
                </div>
            @endforelse
        </div>

    </div>

    {{-- ====================================================== --}}
    {{-- MODAL TAMBAH SISWA --}}
    {{-- ====================================================== --}}
    <div class="modal fade" id="modalTambahSiswa" tabindex="-1" aria-labelledby="modalTambahSiswaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-primary text-white py-3 px-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-person-plus-fill fs-5"></i>
                        <h5 class="modal-title fs-6 fw-bold mb-0" id="modalTambahSiswaLabel">
                            Formulir Tambah Siswa Baru
                        </h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        
                        <div class="row g-3">
                            {{-- NIS --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Nomor Induk Siswa (NIS) <span class="text-danger">*</span></label>
                                <input type="text" name="nis" value="{{ old('nis') }}" class="form-control rounded-3" placeholder="Masukkan NIS unik" required>
                            </div>

                            {{-- NAMA LENGKAP --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Nama Lengkap Siswa <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control rounded-3" placeholder="Nama lengkap sesuai ijazah" required>
                            </div>

                            {{-- KELAS --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Tingkat & Jurusan / Kelas <span class="text-danger">*</span></label>
                                <select name="kelas" class="form-select rounded-3" required>
                                    <option value="">-- Pilih Kelas --</option>
                                    <option value="X RPL" {{ old('kelas') == 'X RPL' ? 'selected' : '' }}>X RPL (Rekayasa Perangkat Lunak)</option>
                                    <option value="XI RPL" {{ old('kelas') == 'XI RPL' ? 'selected' : '' }}>XI RPL</option>
                                    <option value="XII RPL" {{ old('kelas') == 'XII RPL' ? 'selected' : '' }}>XII RPL</option>
                                    <option value="X APHP" {{ old('kelas') == 'X APHP' ? 'selected' : '' }}>X APHP (Agribisnis Pengolahan Hasil Pertanian)</option>
                                    <option value="XI APHP" {{ old('kelas') == 'XI APHP' ? 'selected' : '' }}>XI APHP</option>
                                    <option value="XII APHP" {{ old('kelas') == 'XII APHP' ? 'selected' : '' }}>XII APHP</option>
                                    <option value="X TSM" {{ old('kelas') == 'X TSM' ? 'selected' : '' }}>X TSM (Teknik Sepeda Motor)</option>
                                    <option value="XI TSM" {{ old('kelas') == 'XI TSM' ? 'selected' : '' }}>XI TSM</option>
                                    <option value="XII TSM" {{ old('kelas') == 'XII TSM' ? 'selected' : '' }}>XII TSM</option>
                                </select>
                            </div>

                            {{-- JENIS KELAMIN --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-select rounded-3" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Kata Sandi Akun Siswa <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control rounded-3" placeholder="Minimal 6 karakter" required>
                                <div class="form-text" style="font-size: 11px;">Digunakan siswa untuk login ke portal.</div>
                            </div>

                            {{-- ALAMAT --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Alamat Tempat Tinggal</label>
                                <textarea name="alamat" class="form-control rounded-3" rows="2" placeholder="Alamat lengkap...">{{ old('alamat') }}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer bg-light py-3 px-4">
                        <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-3 px-4 fw-bold">Simpan Data Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ====================================================== --}}
    {{-- MODAL EDIT SISWA --}}
    {{-- ====================================================== --}}
    @foreach($siswas as $siswa)
        <div class="modal fade" id="editSiswa{{ $siswa->nis }}" tabindex="-1" aria-labelledby="editSiswaLabel{{ $siswa->nis }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="modal-header bg-warning py-3 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-pencil-square fs-5 text-dark"></i>
                            <h5 class="modal-title fs-6 fw-bold mb-0 text-dark" id="editSiswaLabel{{ $siswa->nis }}">
                                Edit Data Siswa: {{ $siswa->nama_lengkap }}
                            </h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('siswa.update', $siswa->nis) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-body p-4">
                            <div class="row g-3">
                                {{-- NIS (READONLY) --}}
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold text-dark" style="font-size: 13px;">NIS (Nomor Induk Siswa)</label>
                                    <input type="text" class="form-control rounded-3 bg-light" value="{{ $siswa->nis }}" readonly>
                                </div>

                                {{-- NAMA LENGKAP --}}
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_lengkap" class="form-control rounded-3" value="{{ $siswa->nama_lengkap }}" required>
                                </div>

                                {{-- KELAS --}}
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Kelas <span class="text-danger">*</span></label>
                                    <select name="kelas" class="form-select rounded-3" required>
                                        <option value="X RPL" {{ trim($siswa->kelas) == 'X RPL' ? 'selected' : '' }}>X RPL</option>
                                        <option value="XI RPL" {{ trim($siswa->kelas) == 'XI RPL' ? 'selected' : '' }}>XI RPL</option>
                                        <option value="XII RPL" {{ trim($siswa->kelas) == 'XII RPL' ? 'selected' : '' }}>XII RPL</option>
                                        <option value="X APHP" {{ trim($siswa->kelas) == 'X APHP' ? 'selected' : '' }}>X APHP</option>
                                        <option value="XI APHP" {{ trim($siswa->kelas) == 'XI APHP' ? 'selected' : '' }}>XI APHP</option>
                                        <option value="XII APHP" {{ trim($siswa->kelas) == 'XII APHP' ? 'selected' : '' }}>XII APHP</option>
                                        <option value="X TSM" {{ trim($siswa->kelas) == 'X TSM' ? 'selected' : '' }}>X TSM</option>
                                        <option value="XI TSM" {{ trim($siswa->kelas) == 'XI TSM' ? 'selected' : '' }}>XI TSM</option>
                                        <option value="XII TSM" {{ trim($siswa->kelas) == 'XII TSM' ? 'selected' : '' }}>XII TSM</option>
                                    </select>
                                </div>

                                {{-- JENIS KELAMIN --}}
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" class="form-select rounded-3" required>
                                        <option value="Laki-Laki" {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                {{-- ALAMAT --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-dark" style="font-size: 13px;">Alamat Tempat Tinggal</label>
                                    <textarea name="alamat" class="form-control rounded-3" rows="2">{{ $siswa->alamat }}</textarea>
                                </div>

                                {{-- RESET PASSWORD --}}
                                <div class="col-12 mt-4 pt-3 border-top">
                                    <label class="form-label fw-bold text-danger mb-1" style="font-size: 13px;"><i class="bi bi-key"></i> Reset Kata Sandi (Opsional)</label>
                                    <p class="text-muted mb-2" style="font-size: 11px;">Biarkan kosong jika tidak ingin mengubah kata sandi siswa ini.</p>
                                    <input type="password" name="password" class="form-control rounded-3 border-danger-subtle" placeholder="Masukkan kata sandi baru">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer bg-light py-3 px-4">
                            <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning rounded-3 px-4 fw-bold">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>