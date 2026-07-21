<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - Dashboard Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link class="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#F4F6F9] min-h-screen font-sans text-black p-6 flex flex-col items-center">

    <div class="w-full max-w-4xl flex flex-col gap-6">
        
        <div class="w-full bg-[#1E2869] text-white py-4 px-6 rounded-xl font-semibold shadow-md flex justify-between items-center">
            <span>SMKN 1 AIR NANINGAN</span>
            <a href="/menu" class="bg-blue-800/50 hover:bg-blue-700 px-4 py-1.5 rounded-lg text-xs font-medium flex items-center gap-2 transition-all">
                <i class="fa-solid fa-grid-2"></i> Kembali ke Menu
            </a>
        </div>

        <div class="w-full bg-white border border-gray-200 rounded-xl p-8 shadow-sm flex flex-col items-center justify-center min-h-[260px] text-center">
            <div class="mb-4">
                <span class="text-6xl font-black text-black tracking-tighter">S<span class="text-[#34c759]">C</span></span>
            </div>
            <h2 class="text-[#1E2869] text-2xl font-bold tracking-wider mb-2">SCANING</h2>
            <p class="text-gray-500 text-sm font-medium max-w-md">Student Character & Activity Network</p>
        </div>

        <div class="grid grid-cols-3 gap-4 w-full">
            <div class="bg-[#1E2869] text-white text-center font-bold py-4 rounded-xl shadow-md text-sm">Dasbor</div>
            <div class="bg-[#34c759] text-white text-center font-bold py-4 rounded-xl shadow-md text-sm">Catatan Sikap</div>
            <div class="bg-[#FF8D28] text-white text-center font-bold py-4 rounded-xl shadow-md text-sm">Surat</div>
        </div>

        <div class="w-full bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-start gap-5">
            <div class="bg-gray-100 p-4 rounded-full flex items-center justify-center shrink-0 w-16 h-16 text-2xl border border-gray-200">
                👤
            </div>
            <div class="flex flex-col gap-1.5">
                <h3 class="text-gray-800 font-bold text-base">SMKN 1 Air Naningan</h3>
                <p class="text-gray-600 text-sm leading-relaxed text-justify">
                    SCANING dibuat untuk membangun database "Buku Induk Digital" siswa SMKN 1 Air Naningan, menyediakan sistem penginputan poin pelanggaran dan prestasi yang kolaboratif.
                </p>
            </div>
        </div>

    </div>

</body>
</html>