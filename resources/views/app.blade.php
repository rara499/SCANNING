<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F4F6F9] h-screen w-screen overflow-hidden flex font-sans text-black">

    <div class="w-80 sm:w-96 md:w-[420px] bg-[#1E2869] h-full flex flex-col shrink-0 border-r border-blue-900/30 shadow-2xl relative z-10">
        <div class="flex items-center justify-between px-6 py-5 mt-2 border-b border-blue-900/40">
            <div class="flex items-center gap-3">
                <div class="bg-[#2a6d48] w-10 h-10 rounded-xl flex items-center justify-center shadow-md overflow-hidden">
                    <img src="{{ asset('logob-removebg-preview.png') }}" alt="SC" class="w-8 h-8 object-contain brightness-200">
                </div>
                <div class="text-white font-bold text-xl tracking-wider">
                    <span class="text-sm font-medium mr-0.5">SC</span> SCANING
                </div>
            </div>
            <button class="text-white text-xl p-1 hover:opacity-80">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div class="flex-1 px-5 py-6 overflow-y-auto no-scrollbar pb-10">
            <div class="grid grid-cols-2 gap-4">
                <a href="/dashboard-umum" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Dashboard Umum</a>
                <a href="/data-siswa" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Data Siswa</a>
                <a href="/dashboard-guru" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Dashboard Guru</a>
                <a href="/surat-panggilan" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Surat Panggilan</a>
                <a href="/daftar-usulan" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Daftar Usulan Verifikasi</a>
                <a href="/pencatatan-aktivitas" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Pencatatan Aktivitas & Karakter</a>
                <a href="/dashboard-verifikasi" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Dashboard Verifikasi</a>
                <a href="/dashboard-catatan" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Dashboard Verifikasi Catatan</a>
                <a href="/form-input" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Form Input Catatan</a>
                <a href="/riwayat-catatan" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Daftar Riwayat Catatan</a>
                <a href="/poin-siswa" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Poin Siswa Perkelas</a>
                <a href="/profil" class="bg-[#2E3B9E] text-white text-xs sm:text-sm font-medium p-4 rounded-xl min-h-[80px] flex items-center border border-blue-700/30">Halaman Profil Pengguna</a>
            </div>
        </div>

        <div class="p-4 bg-[#161F54] border-t border-blue-900/50 flex items-center justify-between">
            <span class="text-[11px] text-gray-400 font-medium">v1.0 Premium</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 text-white text-xs px-4 py-2 rounded-lg font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <div class="flex-1 h-full overflow-y-auto bg-[#F4F6F9] p-6 flex flex-col gap-6">
        @yield('content')
    </div>

</body>
</html>