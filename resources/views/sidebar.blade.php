<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - Dashboard Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

    <div class="bg-[#1E2869] w-[90%] max-w-[450px] h-[750px] rounded-2xl shadow-2xl relative flex flex-col overflow-hidden">
        
        <div id="sidebar" class="absolute top-0 right-0 w-64 h-full bg-[#162055] z-30 transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl flex flex-col">
            <div class="p-5 flex items-center justify-between border-b border-[#253075]">
                <span class="text-white font-bold text-base">Menu Navigasi</span>
                <button id="close-sidebar" class="text-gray-400 hover:text-white text-xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="flex-1 p-4 flex flex-col gap-2 text-white">
                <a href="/profil" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#2E3B9E] transition-all">
                    <i class="fa-solid fa-user w-5 text-center"></i> Profil Saya
                </a>
                <a href="/notifikasi" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#2E3B9E] transition-all">
                    <i class="fa-solid fa-bell w-5 text-center"></i> Notifikasi
                </a>
                <a href="/bantuan" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#2E3B9E] transition-all">
                    <i class="fa-solid fa-circle-info w-5 text-center"></i> Bantuan
                </a>
                <hr class="border-[#253075] my-2">
                <a href="/login" class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-600 text-red-300 hover:text-white transition-all">
                    <i class="fa-solid fa-right-from-bracket w-5 text-center"></i> Keluar (Logout)
                </a>
            </div>
        </div>

        <div id="sidebar-overlay" class="absolute inset-0 bg-black/50 z-20 hidden transition-opacity duration-300"></div>

        <div class="flex items-center justify-between px-5 py-4 mt-2 relative z-10">
            <div class="flex items-center gap-3">
                <div class="bg-[#2a6d48] w-10 h-10 rounded-xl flex items-center justify-center shadow-md overflow-hidden">
                    <img src="{{ asset('logob-removebg-preview.png') }}" alt="SC" class="w-8 h-8 object-contain brightness-200">
                </div>
                <div class="text-white font-bold text-lg tracking-wider">
                    <span class="text-sm font-medium mr-1">SC</span> SCANING
                </div>
            </div>
            <button id="open-sidebar" class="text-white text-xl p-1 hover:opacity-80">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div class="flex-1 px-5 py-2 overflow-y-auto pb-24 relative z-10">
            <div class="grid grid-cols-2 gap-4">
                <a href="/dashboard-umum" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Dashboard Umum</a>
                <a href="/data-siswa" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Data Siswa</a>
                
                <a href="/dashboard-guru" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Dashboard Guru</a>
                <a href="/surat-panggilan" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Surat Panggilan</a>
                
                <a href="/daftar-usulan" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Daftar Usulan Verifikasi</a>
                <a href="/pencatatan-aktivitas" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Pencatatan Aktivitas & Karakter</a>
                
                <a href="/dashboard-verifikasi" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Dashboard Verifikasi</a>
                <a href="/dashboard-catatan" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Dashboard Verifikasi Catatan</a>
                
                <a href="/form-input" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Form Input Catatan</a>
                <a href="/riwayat-catatan" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Daftar Riwayat Catatan</a>
                
                <a href="/poin-siswa" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Poin Siswa Perkelas</a>
                <a href="/profil" class="bg-[#2E3B9E] hover:bg-[#253085] text-white text-sm font-medium p-4 rounded-xl shadow-md h-20 flex items-center transition-all">Halaman Profil Pengguna</a>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-200 rounded-t-xl flex justify-around items-center py-2 shadow-[0_-4px_10px_rgba(0,0,0,0.1)] z-10">
            <a href="/home" class="flex flex-col items-center gap-1 text-[#1E2869]"><i class="fa-solid fa-house text-lg"></i><span class="text-[10px] font-medium">Beranda</span></a>
            <a href="/data" class="flex flex-col items-center gap-1 text-gray-400"><i class="fa-solid fa-database text-lg"></i><span class="text-[10px] font-medium">Data</span></a>
            <a href="/catatan" class="flex flex-col items-center gap-1 text-gray-400"><i class="fa-regular fa-clipboard text-lg"></i><span class="text-[10px] font-medium">Catatan</span></a>
            <a href="/pengaturan" class="flex flex-col items-center gap-1 text-gray-400"><i class="fa-solid fa-sliders text-lg"></i><span class="text-[10px] font-medium">Pengaturan</span></a>
        </div>

    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const openBtn = document.getElementById('open-sidebar');
        const closeBtn = document.getElementById('close-sidebar');

        function toggleSidebar(open) {
            if (open) {
                sidebar.classList.remove('translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        openBtn.addEventListener('click', () => toggleSidebar(true));
        closeBtn.addEventListener('click', () => toggleSidebar(false));
        overlay.addEventListener('click', () => toggleSidebar(false));
    </script>

</body>
</html> -->

<!-- <aside class="w-64 h-full bg-[#1E2869] text-white flex flex-col shrink-0 shadow-xl border-r border-blue-900/30">
    <div class="p-6 flex items-center gap-3 border-b border-blue-900/50">
        <div class="bg-[#2a6d48] w-9 h-9 rounded-xl flex items-center justify-center shadow-md overflow-hidden shrink-0">
            <img src="{{ asset('logob-removebg-preview.png') }}" alt="SC" class="w-7 h-7 object-contain brightness-200">
        </div>
        <div class="font-bold text-base tracking-wider">
            <span class="text-xs font-medium mr-1 opacity-80">SC</span> SCANING
        </div>
    </div>

    <nav class="flex-1 p-4 flex flex-col gap-1.5 overflow-y-auto text-sm font-medium">
        <a href="/dashboard-umum" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all bg-[#2E3B9E]">
            <i class="fa-solid fa-chart-pie w-5 text-center text-green-400"></i> Dashboard Umum
        </a>
        <a href="/data-siswa" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-users w-5 text-center"></i> Data Siswa
        </a>
        <a href="/dashboard-guru" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-user-tie w-5 text-center"></i> Dashboard Guru
        </a>
        <a href="/surat-panggilan" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-envelope-open-text w-5 text-center"></i> Surat Panggilan
        </a>
        <a href="/daftar-usulan" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-clipboard-check w-5 text-center"></i> Daftar Usulan Verifikasi
        </a>
        <a href="/pencatatan-aktivitas" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-pen-to-square w-5 text-center"></i> Pencatatan Aktivitas
        </a>
        <a href="/dashboard-verifikasi" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-user-check w-5 text-center"></i> Dashboard Verifikasi
        </a>
        <a href="/dashboard-catatan" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-paste w-5 text-center"></i> Verifikasi Catatan
        </a>
        <a href="/form-input" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-file-circle-plus w-5 text-center"></i> Form Input Catatan
        </a>
        <a href="/riwayat-catatan" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-clock-rotate-left w-5 text-center"></i> Daftar Riwayat Catatan
        </a>
        <a href="/poin-siswa" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-award w-5 text-center"></i> Poin Siswa Perkelas
        </a>
        <a href="/profil" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-user-gear w-5 text-center"></i> Halaman Profil
        </a>
    </nav>

    <div class="p-4 border-t border-blue-900/50">
        <a href="/login" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-600/20 text-red-400 hover:text-red-300 transition-all">
            <i class="fa-solid fa-right-from-bracket w-5 text-center"></i> Keluar (Logout)
        </a>
    </div>
</aside> -->

<aside class="w-64 h-full bg-[#1E2869] text-white flex flex-col shrink-0 shadow-xl border-r border-blue-900/30">
    <div class="p-6 flex items-center gap-3 border-b border-blue-900/50">
        <div class="bg-[#2a6d48] w-9 h-9 rounded-xl flex items-center justify-center shadow-md overflow-hidden shrink-0">
            <img src="{{ asset('logob-removebg-preview.png') }}" alt="SC" class="w-7 h-7 object-contain brightness-200">
        </div>
        <div class="font-bold text-base tracking-wider">
            <span class="text-xs font-medium mr-1 opacity-80">SC</span> SCANING
        </div>
    </div>

    <nav class="flex-1 p-4 flex flex-col gap-1.5 overflow-y-auto text-sm font-medium">
        <a href="/dashboard-umum" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-chart-pie w-5 text-center text-green-400"></i> Dashboard Umum
        </a>
        <a href="/data-siswa" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-users w-5 text-center"></i> Data Siswa
        </a>
        <a href="/dashboard-guru" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-user-tie w-5 text-center"></i> Dashboard Guru
        </a>
        <a href="/surat-panggilan" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-envelope-open-text w-5 text-center"></i> Surat Panggilan
        </a>
        <a href="/form-input" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-[#2E3B9E] transition-all">
            <i class="fa-solid fa-file-circle-plus w-5 text-center"></i> Form Input Catatan
        </a>
    </nav>

    <div class="p-4 border-t border-blue-900/50">
        <a href="/login" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-600/20 text-red-400 hover:text-red-300 transition-all">
            <i class="fa-solid fa-right-from-bracket w-5 text-center"></i> Keluar (Logout)
        </a>
    </div>
</aside>