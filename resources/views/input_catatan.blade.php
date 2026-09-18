<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Catatan – SCANNING SMKN 1 Air Naningan</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary:       #1E2869;
            --accent-blue:   #2563EB;
            --bg-canvas:     #F1F5F9;
        }
        * { box-sizing:border-box; font-family:'Plus Jakarta Sans',sans-serif; }
        body { background:var(--bg-canvas); color:#1E293B; min-height:100vh; }
        
        .navbar-main { background:var(--primary); color:#fff; padding:12px 20px; box-shadow:0 4px 20px rgba(15,23,42,.15); }
        .nav-btn { background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.2); color:#fff;
            border-radius:8px; padding:7px 14px; font-size:13px; font-weight:600; text-decoration:none; transition:all 0.2s;}
        .nav-btn:hover { background:rgba(255,255,255,.25); color:#fff; }
        
        .page-header { background:linear-gradient(135deg,var(--primary) 0%,#3b4db0 60%,#8B5CF6 100%);
            color:#fff; padding:60px 0 80px; text-align:center; }
        .page-header h1 { font-weight:800; font-size:32px; margin-bottom:12px; }
        .page-header p { font-size:15px; opacity:0.85; max-width:600px; margin:0 auto; }

        .form-card { background:#fff; border-radius:24px; padding:40px; box-shadow:0 12px 40px rgba(0,0,0,.08);
            max-width:850px; margin:-50px auto 50px; position:relative; }
            
        .form-label-custom { font-size:13px; font-weight:700; color:#475569; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;}
        .form-control-custom, .form-select-custom { border-radius:12px; border:1.5px solid #E2E8F0; padding:14px 18px; font-size:14px; transition:all 0.3s; background-color:#F8FAFC;}
        .form-control-custom:focus, .form-select-custom:focus { border-color:var(--accent-blue); box-shadow:0 0 0 4px rgba(37,99,235,.1); background-color:#fff;}
        
        .btn-submit { background:linear-gradient(135deg,var(--accent-blue),#4F46E5); color:#fff; border:none;
            border-radius:14px; padding:16px; font-weight:800; font-size:16px; width:100%; transition:transform 0.2s,box-shadow 0.2s; }
        .btn-submit:hover { transform:translateY(-3px); box-shadow:0 10px 25px rgba(79,70,229,.4); color:#fff; }
        
        .select2-container--bootstrap-5 .select2-selection { border-radius:12px; border:1.5px solid #E2E8F0; padding:8px; font-size:14px; background-color:#F8FAFC;}
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
            <a href="{{ route('riwayat.catatan') }}" class="nav-btn"><i class="bi bi-clock-history"></i> Riwayat</a>
            <a href="{{ route('profil') }}" class="nav-btn"><i class="bi bi-person-circle"></i> Profil</a>
            <a href="{{ route('logout') }}" class="nav-btn text-white" style="background: rgba(239, 68, 68, 0.8); border-color: rgba(239, 68, 68, 0.4);"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1>Input Catatan Siswa</h1>
            <p>Laporkan prestasi atau pelanggaran siswa untuk diverifikasi oleh admin. Pastikan data yang dimasukkan akurat dan sesuai kejadian.</p>
        </div>
    </div>

    <div class="container px-4">
        <div class="form-card">
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center mb-4 rounded-4 border-0 bg-success text-white p-4" style="background:linear-gradient(135deg,#10B981,#059669) !important;box-shadow:0 8px 20px rgba(16,185,129,.2);">
                    <i class="bi bi-check-circle-fill fs-3 me-3"></i>
                    <div>
                        <h6 class="mb-1 fw-bold">Berhasil!</h6>
                        <div style="font-size:14px;opacity:0.9;">{{ session('success') }}</div>
                    </div>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger mb-4 rounded-4 border-0 text-white p-4" style="background:linear-gradient(135deg,#EF4444,#DC2626) !important;box-shadow:0 8px 20px rgba(239,68,68,.2);">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-exclamation-triangle-fill fs-4 me-2"></i>
                        <h6 class="mb-0 fw-bold">Terdapat Kesalahan</h6>
                    </div>
                    <ul class="mb-0 ps-4" style="font-size:13px;opacity:0.9;">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('input.catatan.simpan') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <label class="form-label-custom">Pilih Siswa <span class="text-danger">*</span></label>
                        <select name="nis" class="form-select form-select-custom" required>
                            <option value="">-- Cari Nama atau NIS Siswa --</option>
                            @foreach($siswas as $s)
                                <option value="{{ $s->nis }}" {{ old('nis') == $s->nis ? 'selected' : '' }}>
                                    {{ $s->nama_lengkap }} ({{ $s->kelas }}) - NIS: {{ $s->nis }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label-custom">Tanggal Kejadian <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_catatan" class="form-control form-control-custom"
                               max="{{ date('Y-m-d') }}" value="{{ old('tanggal_catatan', date('Y-m-d')) }}" required>
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <label class="form-label-custom">Jenis Catatan <span class="text-danger">*</span></label>
                        <select name="jenis" class="form-select form-select-custom" required>
                            <option value="">-- Pilih --</option>
                            <option value="prestasi" {{ old('jenis') == 'prestasi' ? 'selected' : '' }}>🌟 Prestasi (+)</option>
                            <option value="pelanggaran" {{ old('jenis') == 'pelanggaran' ? 'selected' : '' }}>⚠️ Pelanggaran (-)</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label-custom">Kategori <span class="text-muted fw-normal text-lowercase">(Opsional)</span></label>
                        <input type="text" name="kategori" class="form-control form-control-custom"
                               placeholder="Contoh: Akademik, Sikap..." value="{{ old('kategori') }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label-custom">Nilai Poin <span class="text-danger">*</span></label>
                        <input type="number" name="nilai_poin" class="form-control form-control-custom"
                               placeholder="1 - 500" min="1" max="500" value="{{ old('nilai_poin') }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label-custom">Keterangan Detail <span class="text-danger">*</span></label>
                        <textarea name="keterangan" class="form-control form-control-custom" rows="4"
                                  placeholder="Ceritakan kronologi kejadian secara rinci agar mudah diverifikasi admin..." required>{{ old('keterangan') }}</textarea>
                    </div>

                    <div class="col-12 mt-5">
                        <button type="submit" class="btn-submit">
                            <i class="bi bi-send-fill me-2"></i> Kirim Catatan untuk Verifikasi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
