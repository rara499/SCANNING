<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANING - SMKN 1 Air Naningan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.4', transform: 'scale(1)' },
                            '50%': { opacity: '0.8', transform: 'scale(1.08)' },
                        }
                    },
                    animation: {
                        float: 'float 3s ease-in-out infinite',
                        pulseGlow: 'pulseGlow 4s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#0B132B] font-sans flex items-center justify-center min-h-screen text-white overflow-hidden relative selection:bg-blue-500 selection:text-white">

    <!-- Ambient Glowing Orbs Background -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/30 rounded-full blur-3xl animate-pulseGlow pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl animate-pulseGlow pointer-events-none" style="animation-delay: 1.5s;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-indigo-600/15 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Main Splash Card -->
    <div id="splash-container" class="relative z-10 flex flex-col items-center justify-center px-6 transition-all duration-700 opacity-100 transform scale-100 text-center max-w-md w-full">
        
        <!-- Logo with Floating and Glow Effect -->
        <div class="relative mb-6">
            <div class="absolute inset-0 bg-blue-500/20 rounded-full blur-xl scale-125"></div>
            <div class="w-32 h-32 sm:w-40 sm:h-40 flex items-center justify-center relative animate-float drop-shadow-2xl">
                <img src="{{ asset('sclg-removebg-preview.png') }}" 
                     alt="Logo SCANING" 
                     class="w-full h-full object-contain filter drop-shadow-[0_10px_20px_rgba(59,130,246,0.3)]">
            </div>
        </div>

        <!-- Typography Branding -->
        <div class="space-y-2 mb-8">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs text-blue-300 font-medium tracking-wide">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                Sistem Buku Induk Digital
            </div>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white via-blue-100 to-blue-300">
                SCANNING
            </h1>
            <p class="text-gray-300 text-sm sm:text-base font-medium">
                SMKN 1 Air Naningan
            </p>
        </div>

        <!-- Modern Progress Bar -->
        <div class="w-48 sm:w-56 h-1.5 bg-slate-800/80 rounded-full overflow-hidden p-0.5 border border-slate-700/50 relative">
            <div class="h-full bg-gradient-to-r from-blue-500 via-emerald-400 to-amber-400 rounded-full w-full animate-[progress_1.2s_ease-in-out_infinite]"
                 style="animation: progress 1.2s ease-in-out infinite;"></div>
        </div>

        <p class="text-xs text-slate-400 mt-4 tracking-wider uppercase font-medium">Memuat Aplikasi...</p>
    </div>

    <!-- Subtitle / Footer -->
    <div class="absolute bottom-6 z-10 text-center text-slate-500 text-xs font-medium tracking-wider">
        &copy; {{ date('Y') }} SMKN 1 Air Naningan. All rights reserved.
    </div>

    <style>
        @keyframes progress {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const splashContainer = document.getElementById('splash-container');

            // Durasi splash screen sebelum dialihkan ke login
            setTimeout(() => {
                splashContainer.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    window.location.href = "{{ route('login') }}";
                }, 500);
            }, 1200);
        });
    </script>
</body>
</html>