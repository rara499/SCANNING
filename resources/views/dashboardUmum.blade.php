<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - Dashboard Umum</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        
        body {
            background-color: #E5E7EB;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Container Device Canvas */
        .phone-canvas {
            width: 360px;
            height: 640px;
            background-color: #F4F6F9;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Dashboard Utama */
        .dashboard-view {
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
            overflow-y: auto;
            padding-bottom: 70px;
        }

        .dashboard-view::-webkit-scrollbar { width: 0; }

        .top-blue-bar {
            background-color: #1E2869;
            color: white;
            padding: 12px 14px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar-icons {
            display: flex;
            gap: 12px;
            font-size: 14px;
            cursor: pointer;
            position: relative;
            z-index: 20;
        }

        .main-banner {
            background-color: #FFFFFF;
            margin: 12px;
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        }

        .sc-logo-big {
            font-size: 38px;
            font-weight: 900;
            letter-spacing: -2px;
            margin-bottom: 4px;
            color: #1E2869;
        }
        .sc-green { color: #34C759; }

        .banner-title {
            color: #1E2869;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .banner-subtitle {
            color: #718096;
            font-size: 10px;
            margin-top: 2px;
        }

        /* Tab Tombol Pintasan Cepat */
        .quick-tabs {
            display: grid;
            grid-template-columns: 1.2fr 1.5fr 1fr;
            gap: 6px;
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .tab-btn {
            color: white;
            font-size: 11px;
            font-weight: bold;
            text-align: center;
            padding: 10px 0;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn-blue { background-color: #1E2869; }
        .btn-green { background-color: #34C759; }
        .btn-orange { background-color: #FF8D28; }

        /* Card Informasi Sekolah */
        .info-card {
            background-color: white;
            margin: 0 12px 12px 12px;
            border-radius: 12px;
            padding: 14px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .avatar-box {
            background-color: #F4F6F9;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            border: 1px solid #E5E7EB;
            flex-shrink: 0;
        }

        .info-text h3 {
            font-size: 12px;
            color: #1A202C;
            margin-bottom: 4px;
        }

        .info-text p {
            font-size: 9.5px;
            color: #718096;
            line-height: 1.4;
            text-align: justify;
        }

        /* Tabel Hasil Data Siswa */
        .table-card {
            background-color: white;
            margin: 0 12px;
            border-radius: 12px;
            padding: 14px;
        }

        .table-title {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }

        .data-table th {
            background-color: #E5E7EB;
            color: #4A5568;
            text-align: left;
            padding: 6px 8px;
            font-weight: 600;
        }

        .data-table td {
            padding: 8px;
            border-bottom: 1px solid #EDF2F7;
            color: #2D3748;
        }

        /* Overlay Menu Full Screen */
        .menu-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #0F294A;
            z-index: 9999; /* Dibuat paling atas agar tidak tertutup apapun */
            display: flex;
            flex-direction: column;
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
            pointer-events: none; /* Mencegah memblokir klik saat tersembunyi */
            visibility: hidden;
        }

        .menu-overlay.active {
            transform: translateY(0);
            pointer-events: auto;
            visibility: visible;
        }

        .menu-overlay.active .menu-button {
            pointer-events: auto;
        }

        .menu-header {
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
            background-color: #276E4B;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
            overflow: hidden;
        }
        
        .logo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .logo-text {
            color: white;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        .close-icon {
            color: white;
            font-size: 18px;
            cursor: pointer;
            padding: 5px;
        }

        .menu-grid-container {
            flex: 1;
            padding: 5px 16px;
            overflow-y: auto;
            margin-bottom: 70px;
        }

        .menu-grid-container::-webkit-scrollbar { width: 0; }

        .grid-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .menu-button {
            background-color: #253C9B;
            color: white;
            border: none;
            outline: none;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 500;
            padding: 12px 8px;
            min-height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            width: 100%;
            text-decoration: none;
            box-sizing: border-box;
            position: relative;
            z-index: 10000;
        }

        .menu-button:active { background-color: #1F3282; }

        /* Bottom Nav Bar */
        .bottom-navbar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #FFFFFF;
            border-top-left-radius: 14px;
            border-top-right-radius: 14px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 10px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
            z-index: 100; 
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #718096;
            font-size: 9px;
            font-weight: 600;
            cursor: pointer;
            gap: 4px;
            flex: 1;
            text-decoration: none;
        }

        .nav-item.active { color: #121F3E; }

        .nav-icon {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
        }

        .btn-back{
            color: white;
            font-size: 11px;
            font-weight: bold;
            text-align: center;
            padding: 10px 0;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="phone-canvas">
        
        <div class="dashboard-view">
            <div class="top-blue-bar">
                <span>SMKN 1 AIR NANINGAN</span>
                <div class="top-bar-icons">
                    <span>🔍</span>
                    <span id="openMenuBtn" style="cursor: pointer; padding: 2px 5px;">☰</span>
                </div>
            </div>

            <div class="main-banner">
                <img src="{{ asset('/img/WhatsApp_Image_2026-07-21_at_13.27.52-removebg-preview.png') }}" alt="Logo" style="height: 110px; margin-bottom: 8px;">
                <!-- <div class="sc-logo-big">S<span class="sc-green">C</span></div>
                <div class="banner-title">SCANING</div>
                <div class="banner-subtitle">Student Character & Activity Network</div> -->
            </div>

            <div class="quick-tabs">
                <a href="{{ route('dashboard') }}" class="tab-btn btn-blue">Dasbor</a>
                <a href="{{ route('pencatatan.karakter') }}" class="tab-btn btn-green">@ Catatan Sikap</a>
                <a href="{{ route('surat.panggilan') }}" class="tab-btn btn-orange">✉ Surat</a>
            </div>

            <div class="info-card">
                <div class="avatar-box">👤</div>
                <div class="info-text">
                    <h3>SMKN 1 Air Naningan</h3>
                    <p>SCANING dibuat untuk membangun database "Buku Induk Digital" siswa SMKN 1 Air Naningan, menyediakan sistem penginputan poin pelanggaran dan prestasi yang kolaboratif.</p>
                </div>
            </div>

            <div class="table-card">
                <div class="table-title">
                    <span>Hasil Data Siswa</span>
                    <span>▼</span>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>FOTO</th>
                            <th>NISN</th>
                            <th>POIN</th>
                            <th>JURUSAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($siswa)
                            @foreach($siswa as $s)
                            <tr>
                                <td>👤</td>
                                <td>#{{ $s->nisn }}</td>
                                <td>{{ number_format($s->poin) }}</td>
                                <td>{{ $s->jurusan }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>👤</td>
                                <td>012460</td>
                                <td>10.000</td>
                                <td>PPLG</td>
                            </tr>
                            <tr>
                                <td>👤</td>
                                <td>019875</td>
                                <td>10.000</td>
                                <td>APHP</td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>

        <div class="menu-overlay" id="menuOverlay">
            <div class="menu-header">
                <div class="logo-container">
                    <div class="logo-box">
                        <img src="{{ asset('logob-removebg-preview.png') }}" alt="Logo">
                    </div>
                    <div class="logo-text">SC &nbsp; SCANING</div>
                </div>
                <div class="close-icon" id="closeMenuBtn">☰</div>
            </div>

            <div class="menu-grid-container">
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
        </div>

            <a href="{{ route('sidebar_menu') }}" class="btn-back btn-blue">
                ⬅️ Kembali ke Menu
            </a>

        <!-- <div class="bottom-navbar">
            <a href="{{ route('dashboard') }}" class="nav-item active" id="navBeranda">
                <svg class="nav-icon" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                <span>Beranda</span>
            </a>
            <a href="{{ route('siswa.index') }}" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                <span>Data</span>
            </a>
            <a href="{{ route('riwayat.catatan') }}" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Catatan</span>
            </a>
            <a href="{{ route('profil') }}" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><circle cx="8" cy="12" r="1"></circle><circle cx="12" cy="12" r="1"></circle><circle cx="16" cy="12" r="1"></circle></svg>
                <span>Pengaturan</span>
            </a>
        </div> -->

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const openMenuBtn = document.getElementById('openMenuBtn');
            const closeMenuBtn = document.getElementById('closeMenuBtn');
            const menuOverlay = document.getElementById('menuOverlay');

            if (openMenuBtn) {
                openMenuBtn.addEventListener('click', function() {
                    menuOverlay.classList.add('active');
                });
            }

            if (closeMenuBtn) {
                closeMenuBtn.addEventListener('click', function() {
                    menuOverlay.classList.remove('active');
                });
            }
        });
    </script>
</body>
</html>