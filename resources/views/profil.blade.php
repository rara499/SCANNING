<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna – SCANNING</title>
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
            color:#fff; padding:60px 0 100px; text-align:center; }
        .page-header h1 { font-weight:800; font-size:32px; margin-bottom:12px; }
        .page-header p { font-size:15px; opacity:0.85; max-width:600px; margin:0 auto; }

        .profile-card { background:#fff; border-radius:24px; padding:40px; box-shadow:0 12px 40px rgba(0,0,0,.08);
            max-width:700px; margin:-70px auto 50px; position:relative; }
        
        .avatar-circle { width:120px; height:120px; background:linear-gradient(135deg,#3b4db0,#8B5CF6); border-radius:50%;
            display:flex; align-items:center; justify-content:center; font-size:48px; color:#fff; font-weight:bold;
            margin:0 auto 20px; border:6px solid #fff; box-shadow:0 8px 25px rgba(139,92,246,0.3); }

        .form-label-custom { font-size:13px; font-weight:700; color:#475569; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;}
        .form-control-custom { border-radius:12px; border:1.5px solid #E2E8F0; padding:14px 18px; font-size:14px; transition:all 0.3s; background-color:#F8FAFC;}
        .form-control-custom:focus { border-color:var(--accent-blue); box-shadow:0 0 0 4px rgba(37,99,235,.1); background-color:#fff;}
        
        .btn-submit { background:linear-gradient(135deg,var(--accent-blue),#4F46E5); color:#fff; border:none;
            border-radius:14px; padding:16px; font-weight:800; font-size:16px; width:100%; transition:transform 0.2s,box-shadow 0.2s; }
        .btn-submit:hover { transform:translateY(-3px); box-shadow:0 10px 25px rgba(79,70,229,.4); color:#fff; }
        
        .role-badge { display:inline-block; padding:6px 16px; background:#EFF6FF; color:#1D4ED8; font-weight:700; font-size:12px; border-radius:30px; margin-top:8px;}
        
        /* Info Box Siswa */
        .info-box-siswa { background:#F0F9FF; border:1.5px solid #BAE6FD; border-radius:16px; padding:20px 24px; margin-bottom:28px; }
        .info-box-siswa .label { font-size:11px; font-weight:700; color:#0369A1; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:4px; }
        .info-box-siswa .value { font-size:18px; font-weight:800; color:#0C4A6E; letter-spacing:1px; }
        .info-box-siswa .value.password-masked { font-size:22px; letter-spacing:4px; color:#64748B; }
        .btn-toggle-pw { background:none; border:none; color:#0369A1; font-size:13px; font-weight:600; cursor:pointer; padding:0; margin-top:4px; text-decoration:underline; }
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
            <a href="{{ route('riwayat.catatan') }}" class="nav-btn"><i class="bi bi-clock-history"></i> Riwayat</a>
            <a href="{{ route('logout') }}" class="nav-btn text-white" style="background: rgba(239, 68, 68, 0.8); border-color: rgba(239, 68, 68, 0.4);"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1>Profil Akun</h1>
            <p>Kelola informasi akun Anda dan ubah kata sandi untuk menjaga keamanan.</p>
        </div>
    </div>

    <div class="container px-4">
        <div class="profile-card">
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center mb-4 rounded-4 border-0 bg-success text-white p-3" style="background:linear-gradient(135deg,#10B981,#059669) !important;box-shadow:0 8px 20px rgba(16,185,129,.2);">
                    <i class="bi bi-check-circle-fill fs-3 me-3"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center mb-4 rounded-4 border-0 text-white p-3" style="background:linear-gradient(135deg,#EF4444,#DC2626) !important;box-shadow:0 8px 20px rgba(239,68,68,.2);">
                    <i class="bi bi-exclamation-triangle-fill fs-3 me-3"></i>
                    <div>{{ session('error') }}</div>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger mb-4 rounded-4 border-0 text-white p-4" style="background:linear-gradient(135deg,#EF4444,#DC2626) !important;box-shadow:0 8px 20px rgba(239,68,68,.2);">
                    <ul class="mb-0 ps-3" style="font-size:14px;">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="text-center mb-5">
                <div class="avatar-circle">
                    {{ $user ? strtoupper(substr($user->name, 0, 1)) : 'U' }}
                </div>
                <h3 class="fw-bold text-dark mb-0">{{ $user ? $user->name : 'Pengguna Guest' }}</h3>
                <div class="role-badge"><i class="bi bi-shield-check me-1"></i> {{ $user ? ucfirst($user->role) : 'Guest' }}</div>
            </div>


            {{-- ====== SECTION KHUSUS SISWA: NIS & PASSWORD ====== --}}
            @if(auth('siswa')->check())
            <div class="info-box-siswa mb-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-person-badge-fill text-info fs-5"></i>
                    <span class="fw-bold text-dark" style="font-size:15px;">Informasi Akun Siswa</span>
                </div>
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <div class="label">Nomor Induk Siswa (NIS)</div>
                        <div class="value">{{ auth('siswa')->user()->nis }}</div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="label">Password Akun</div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <div class="value password-masked" id="pwDisplay">••••••••</div>
                            <input type="text" id="pwPlain" class="form-control form-control-sm" 
                                value="{{ auth('siswa')->user()->plain_password ?? '(tidak tersedia)' }}" 
                                style="display:none; max-width:200px; font-weight:700; letter-spacing:1px; border-radius:10px;" readonly>
                        </div>
                        <button type="button" class="btn-toggle-pw mt-1" id="btnTogglePw" onclick="togglePassword()">
                            <i class="bi bi-eye me-1" id="eyeIcon"></i>Tampilkan Password
                        </button>
                    </div>
                </div>
            </div>
            @endif
            {{-- ====================================================== --}}

            @if($user)
            <form action="{{ route('profil.update') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label-custom">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control form-control-custom" value="{{ old('name', $user->name) }}" required>
                    </div>
                    
                    <div class="col-12">
                        <hr class="my-2" style="border-color:#E2E8F0;">
                        <h6 class="fw-bold text-dark mt-3 mb-0">Ubah Kata Sandi</h6>
                        <p class="text-muted" style="font-size:12px;">Biarkan kosong jika tidak ingin mengubah kata sandi.</p>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label-custom">Kata Sandi Baru</label>
                        <input type="password" name="password" class="form-control form-control-custom" placeholder="Minimal 6 karakter">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label-custom">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-custom" placeholder="Ulangi kata sandi baru">
                    </div>

                    <div class="col-12 mt-5">
                        <button type="submit" class="btn-submit">
                            <i class="bi bi-save2-fill me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
            @else
            <div class="text-center py-4">
                <p class="text-muted mb-4" style="font-size:14px;">Anda belum login sehingga profil tidak dapat diubah.</p>
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">Login Sekarang</a>
            </div>
            @endif
        </div>
    </div>
    <script>
        function togglePassword() {
            const pwDisplay = document.getElementById('pwDisplay');
            const pwPlain   = document.getElementById('pwPlain');
            const eyeIcon   = document.getElementById('eyeIcon');
            const btn       = document.getElementById('btnTogglePw');

            if (pwPlain.style.display === 'none') {
                pwDisplay.style.display = 'none';
                pwPlain.style.display   = 'block';
                eyeIcon.className       = 'bi bi-eye-slash me-1';
                btn.innerHTML           = '<i class="bi bi-eye-slash me-1" id="eyeIcon"></i>Sembunyikan Password';
            } else {
                pwDisplay.style.display = '';
                pwPlain.style.display   = 'none';
                eyeIcon.className       = 'bi bi-eye me-1';
                btn.innerHTML           = '<i class="bi bi-eye me-1" id="eyeIcon"></i>Tampilkan Password';
            }
        }
    </script>
</body>
</html>
