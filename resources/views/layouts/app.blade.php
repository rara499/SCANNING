<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - SMKN 1 Air Naning</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9; /* Warna dasar abu-abu terang agar konten terlihat terpisah */
        }

        /* Wrapper Utama pembungkus Sidebar & Konten */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Kodingan CSS Sidebar (Tetap di Kiri) */
        .sidebar {
            width: 280px;
            background-color: #1e3a8a; /* Biru tua sesuai gambar kamu */
            color: #ffffff;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            position: fixed; /* Membuat sidebar tidak ikut ter-scroll */
            height: 100vh;
        }

        .sidebar-brand {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 30px;
            padding-left: 10px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu li a {
            display: block;
            padding: 12px 15px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }

        /* Style ketika menu aktif / di-hover */
        .sidebar-menu li a:hover, 
        .sidebar-menu li a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        /* Kodingan Area Konten Utama (Di Kanan) */
        .main-container {
            flex: 1;
            margin-left: 280px; /* Jaraknya disamakan dengan lebar sidebar agar tidak tertimpa */
            padding: 30px;
        }

        /* Box putih terpisah untuk isi halaman (Handoff Page) */
        .content-card {
            background-color: #ffffff;
            border-radius: 12px; /* Membuat sudutnya melengkung terpisah */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); /* Efek bayangan halus */
            padding: 25px;
            min-height: 80vh;
        }
    </style>
</head>
<body>

    <div class="app-wrapper">
        
        <aside class="sidebar">
            <div class="sidebar-brand">
                SC SCANING
            </div>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        Dashboard Umum
                    </a>
                </li>
                <li>
                    <a href="{{ route('data.siswa') }}" class="{{ Request::is('data-siswa') ? 'active' : '' }}">
                        Data Siswa
                    </a>
                </li>
                <li>
                    <a href="{{ route('input.catatan') }}" class="{{ Request::is('input-catatan') ? 'active' : '' }}">
                        Form Input Catatan
                    </a>
                </li>
                </ul>
        </aside>

        <main class="main-container">
            <div class="content-card">
                @yield('content')
            </div>
        </main>

    </div>

</body>
</html>