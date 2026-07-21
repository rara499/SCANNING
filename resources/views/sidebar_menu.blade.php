<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SC SCANING - Navigation Menu</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: sans-serif; }
        body { background-color: #E5E7EB; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        
        .phone-canvas { 
            width: 360px; height: 640px; background-color: #0B3364; 
            border-radius: 12px; position: relative; display: flex; 
            flex-direction: column; overflow: hidden; padding: 16px;
        }

        .header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
        .logo-box { display: flex; align-items: center; gap: 5px; color: white; font-weight: bold; font-size: 14px; }
         img { background-color: #276E4B; padding: 6px 10px; border-radius: 8px; color: #34C759; }
         h3 {color: white; font-weight: bold; font-size: 14px; margin-right: 150px; }
        .burger-icon { color: white; font-size: 20px; cursor: pointer; }

        .grid-container { flex: 1; overflow-y: auto; padding-bottom: 60px; }
        .grid-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        
        .menu-button { 
            background-color: #2643A3; color: white; text-decoration: none; 
            border-radius: 8px; font-size: 11px; font-weight: 500; 
            padding: 12px 8px; min-height: 52px; display: flex; 
            align-items: center; justify-content: center; text-align: center; 
        }
        .menu-button:hover { background-color: #1F388B; }

        .bottom-navbar { 
            position: absolute; bottom: 0; left: 0; right: 0; height: 60px; 
            background-color: #FFFFFF; display: flex; justify-content: space-around; 
            align-items: center; border-top-left-radius: 14px; border-top-right-radius: 14px;
        }
        .nav-item { display: flex; flex-direction: column; align-items: center; color: #718096; font-size: 9px; text-decoration: none; }
    </style>
</head>
<body>

    <div class="phone-canvas">
        <div class="header">
            <!-- <div class="logo-box">
                <div class="logo-bg">SC</div>
            </div> -->
           <img src="{{ asset('/img/WhatsApp_Image_2026-07-21_at_13.11.30-removebg-preview.png') }}" alt="Logo" style="height: 50px;">
           <h3>SC SCANING </h3>
            <div class="burger-icon">☰</div>
        </div>

        <div class="grid-container">
            <div class="grid-layout">
                <a href="{{ route('dashboardUmum') }}" class="menu-button">Dashboard Umum</a>
                <a href="{{ route('siswa.index') }}" class="menu-button">Data Siswa</a>
                <a href="{{ route('dashboard.guru') }}" class="menu-button">Dashboard Guru</a>
                <a href="{{ route('surat.panggilan') }}" class="menu-button">Surat Panggilan</a>
                <a href="{{ route('usulan.verifikasi') }}" class="menu-button">Daftar Usulan<br>Verifikasi</a>
                <a href="{{ route('pencatatan.karakter') }}" class="menu-button">Pencatatan Aktivitas<br>& Karakter</a>
                <a href="{{ route('dashboard.verifikasi') }}" class="menu-button">Dashboard Verifikasi</a>
                <a href="{{ route('verifikasi.catatan') }}" class="menu-button">Dashboard Verifikasi<br>Catatan</a>
                <a href="{{ route('input.catatan') }}" class="menu-button">Form Input Catatan</a>
                <a href="{{ route('riwayat.catatan') }}" class="menu-button">Daftar Riwayat<br>Catatan</a>
                <a href="{{ route('poin.siswa') }}" class="menu-button">Poin Siswa Perkelas</a>
                <a href="{{ route('profil') }}" class="menu-button">Halaman Profil<br>Pengguna</a>
            </div>
        </div>

        <div class="bottom-navbar">
            <a href="{{ route('sidebar_menu') }}" class="nav-item">🏠<span>Beranda</span></a>
            <a href="{{ route('siswa.index') }}" class="nav-item">📊<span>Data</span></a>
            <a href="{{ route('riwayat.catatan') }}" class="nav-item">📝<span>Catatan</span></a>
            <a href="{{ route('profil') }}" class="nav-item">⚙️<span>Pengaturan</span></a>
        </div>
    </div>

</body>
</html>