<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - Sidebar</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
        
        body {
            background-color: #E5E7EB; /* Latar belakang luar seperti area kerja Figma */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Pembungkus utama berbentuk device canvas figma */
        .phone-canvas {
            width: 360px;
            height: 640px;
            background-color: #0F294A; /* Warna Biru Tua Pekat Background Menu */
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* HEADER AREA */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 16px 15px 16px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-box {
            background-color: #276E4B; /* Hijau Logo SC */
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }

        .logo-text {
            color: white;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        .hamburger-icon {
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        /* GRID MENU UTAMA */
        .menu-grid-container {
            flex: 1;
            padding: 5px 16px;
            overflow-y: auto;
            margin-bottom: 65px; /* Memberi ruang agar tidak tertutup bottom nav */
        }

        /* Sembunyikan scrollbar tapi fungsi tetap bisa di-scroll jika menu banyak */
        .menu-grid-container::-webkit-scrollbar {
            width: 0px;
        }

        .grid-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .menu-button {
            background-color: #253C9B; /* Biru Tombol Menu */
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 500;
            padding: 12px 8px;
            min-height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            line-height: 1.3;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .menu-button:active {
            background-color: #1F3282;
        }

        /* BOTTOM NAV BAR (BAR PUTIH DI BAWAH) */
        .bottom-navbar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #FFFFFF;
            border-top-left-radius: 14px; /* Lengkungan atas figma */
            border-top-right-radius: 14px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 10px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #718096;
            font-size: 9px;
            font-weight: 600;
            text-decoration: none;
            gap: 4px;
            flex: 1;
        }

        .nav-item.active {
            color: #121F3E; /* Text hitam/biru tua saat aktif */
        }

        /* Ikon SVG Custom Agar Mirip Persis Lingkaran Figma */
        .nav-icon {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
    </style>
</head>
<body>

    <div class="phone-canvas">
        
        <div class="header">
            <div class="logo-container">
                <div class="logo-box">SC</div>
                <div class="logo-text">SC &nbsp; SCANING</div>
            </div>
            <div class="hamburger-icon">☰</div>
        </div>

        <div class="menu-grid-container">
            <div class="grid-layout">
                <a href="#" class="menu-button">Dashboard Umum</a>
                <a href="#" class="menu-button">Data Siswa</a>
                <a href="#" class="menu-button">Dashboard Guru</a>
                <a href="#" class="menu-button">Surat Panggilan</a>
                <a href="#" class="menu-button">Daftar Usulan<br>Verifikasi</a>
                <a href="#" class="menu-button">Pencatatan Aktivitas<br>& Karakter</a>
                <a href="#" class="menu-button">Dashboard Verifikasi</a>
                <a href="#" class="menu-button">Dashboard Verifikasi<br>Catatan</a>
                <a href="#" class="menu-button">Form Input Catatan</a>
                <a href="#" class="menu-button">Daftar Riwayat<br>Catatan</a>
                <a href="#" class="menu-button">Poin Siswa Perkelas</a>
                <a href="#" class="menu-button">Halaman Profil<br>Pengguna</a>
            </div>
        </div>

        <div class="bottom-navbar">
            <a href="#" class="nav-item active">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span>Beranda</span>
            </a>
            <a href="#" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                <span>Data</span>
            </a>
            <a href="#" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>Catatan</span>
            </a>
            <a href="#" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <circle cx="8" cy="12" r="1"></circle>
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="16" cy="12" r="1"></circle>
                </svg>
                <span>Pengaturan</span>
            </a>
        </div>

    </div>

</body>
</html>