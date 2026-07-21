<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANNING - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

    <div class="bg-[#1E2869] w-[90%] max-w-[550px] rounded-2xl p-8 sm:p-12 shadow-2xl flex flex-col items-center">
        
        <div class="flex flex-col items-center mb-10">
            <div class="w-28 h-20 sm:w-36 sm:h-24 flex items-center justify-center mb-2">
                <img src="{{ asset('sclg-removebg-preview.png') }}" alt="SC Logo Baru" class="w-full h-full object-contain">
            </div>
        </div>

        <form action="/login" method="POST" class="w-full flex flex-col gap-5">
            @csrf

            <div class="relative w-full">
                <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                    <i class="fa-regular fa-user text-lg"></i>
                </span>
                <input type="text" name="nis" placeholder="Masukkan NIS" required
                    class="w-full bg-[#1E2869] border border-[#3B4796] rounded-full py-3 pl-12 pr-4 text-white placeholder-gray-400 outline-none focus:border-blue-400 transition-all text-sm sm:text-base">
            </div>

            <div class="relative w-full">
                <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                    <i class="fa-solid fa-lock text-lg"></i>
                </span>
                <input type="password" name="password" placeholder="Masukkan Kata Sandi" required
                    class="w-full bg-[#1E2869] border border-[#3B4796] rounded-full py-3 pl-12 pr-4 text-white placeholder-gray-400 outline-none focus:border-blue-400 transition-all text-sm sm:text-base">
            </div>

            <button type="submit" 
                class="w-full bg-[#FF8D28] hover:bg-[#e07b20] text-white font-semibold py-3 rounded-full mt-4 transition-all shadow-md text-sm sm:text-base tracking-wide">
                Login
            </button>
        </form>

    </div>

</body>
</html>