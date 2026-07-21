<!-- <aside class="w-64 bg-[#1a369b] text-white flex flex-col justify-between p-4 shadow-lg h-full shrink-0">
    <div class="overflow-y-auto pr-1">
        <div class="flex flex-col items-center pb-6 border-b border-white/20 mb-6">
            <span class="text-3xl font-extrabold tracking-wider">S<span class="text-[#34c759]">C</span></span>
            <span class="text-sm font-semibold tracking-widest mt-1">SCANING</span>
        </div>

        <nav class="space-y-1">
            <p class="text-[10px] text-gray-300 uppercase tracking-wider font-bold px-2 mb-1">Beranda</p>
            <a href="/dashboard" class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition text-sm">
                <span>🏠</span> <span>Beranda</span>
            </a>
            <a href="/dashboard-umum" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>📊</span> <span>Dashboard Umum</span>
            </a>

            <p class="text-[10px] text-gray-300 uppercase tracking-wider font-bold px-2 pt-4 mb-1">Data & Guru</p>
            <a href="/dashboard-guru" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>👨‍🏫</span> <span>Dashboard Guru</span>
            </a>
            <a href="/data-siswa" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>👥</span> <span>Data Siswa</span>
            </a>
            <a href="/poin-siswa" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>🏫</span> <span>Poin Siswa Perkelas</span>
            </a>

            <p class="text-[10px] text-gray-300 uppercase tracking-wider font-bold px-2 pt-4 mb-1">Catatan</p>
            <a href="/pencatatan-aktivitas" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>📝</span> <span>Pencatatan Aktivitas</span>
            </a>
            <a href="/form-input" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>➕</span> <span>Form Input Catatan</span>
            </a>
            <a href="/riwayat-catatan" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>📜</span> <span>Daftar Riwayat Catatan</span>
            </a>

            <p class="text-[10px] text-gray-300 uppercase tracking-wider font-bold px-2 pt-4 mb-1">Verifikasi</p>
            <a href="/dashboard-verifikasi" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>🛡️</span> <span>Dashboard Verifikasi</span>
            </a>
            <a href="/dashboard-catatan" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>🔍</span> <span>Dashboard Catatan</span>
            </a>
            <a href="/daftar-usulan" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>📋</span> <span>Daftar Usulan</span>
            </a>
            <a href="/surat-panggilan" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
                <span>✉️</span> <span>Surat Panggilan</span>
            </a>
        </nav>
    </div>

    <div class="pt-6 border-t border-white/20 space-y-1">
        <a href="/profil" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
            <span>👤</span> <span>Profil Pengguna</span>
        </a>
        <a href="/pengaturan" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-white/10 transition text-sm">
            <span>⚙️</span> <span>Pengaturan</span>
        </a>
        
        <form action="{{ route('logout') }}" method="POST" class="pt-2">
            @csrf
            <button type="submit" class="w-full flex items-center space-x-3 px-3 py-2 rounded-lg bg-red-600 hover:bg-red-700 transition text-sm text-left text-white font-semibold">
                <span>🚪</span> <span>Keluar</span>
            </button>
        </form>
    </div>
</aside> -->