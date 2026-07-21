<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANNING - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1E2869] flex items-center justify-center min-h-screen text-white overflow-hidden relative">

    <div class="absolute -top-12 -left-12 w-32 h-32 sm:w-48 sm:h-48 bg-[#164075] rounded-3xl shadow-lg"
         style="transform: rotate(125deg);"></div>

    <div class="absolute -top-12 -right-12 w-32 h-32 sm:w-48 sm:h-48 bg-[#5FDB59] rounded-3xl shadow-lg"
         style="transform: rotate(57deg);"></div>

    <div class="absolute -bottom-12 -left-12 w-32 h-32 sm:w-48 sm:h-48 bg-[#3A7953] rounded-3xl shadow-lg"
         style="transform: rotate(-125deg);"></div>

    <div class="absolute -bottom-12 -right-12 w-32 h-32 sm:w-48 sm:h-48 bg-[#FF8D28] rounded-3xl shadow-lg"
         style="transform: rotate(125deg);"></div>


    <div id="splash-container" class="relative z-10 flex items-center justify-center transition-all duration-1000 opacity-100 transform scale-100">
        <div class="w-72 h-72 sm:w-96 sm:h-96 flex items-center justify-center filter drop-shadow-2xl">
            <img src="{{ asset('sclg-removebg-preview.png') }}" 
                 alt="SC Logo" 
                 class="w-full h-full object-contain animate-pulse">
        </div>
    </div>

    <!-- <div class="absolute bottom-8 z-10 text-center tracking-widest text-gray-300 text-xs sm:text-sm font-semibold uppercase">
        <p class="text-gray-400 text-[10px] mb-1 font-normal lowercase opacity-70">powered by</p>
        Nama Brand Kamu
    </div> -->

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const splashContainer = document.getElementById('splash-container');

            // Durasi tampil splash screen 1 detik (1000ms)
            setTimeout(() => {
                splashContainer.classList.remove('opacity-100', 'scale-100');
                splashContainer.classList.add('opacity-0', 'scale-95');
                
                setTimeout(() => {
                    window.location.href = '/login';
                }, 800);
            }, 1000);
        });
    </script>
</body>
</html>