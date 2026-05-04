<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PlantCare</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- 🔥 Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#022c22] text-[#ecfdf5]">

<div class="flex">

    <!-- 🔥 SIDEBAR -->
    <div class="w-64 min-h-screen bg-[#064e3b] p-6 shadow-lg">

        <h2 class="text-2xl font-bold mb-8 flex items-center gap-2">
            🌱 PlantCare
        </h2>

        <ul class="space-y-4 text-sm">

            <li>
                <a href="/" class="flex items-center gap-2 hover:text-green-300 transition">
                    🏠 Dashboard
                </a>
            </li>

            <li>
                <a href="/tips" class="flex items-center gap-2 hover:text-green-300 transition">
                    🌿 Tips
                </a>
            </li>

            <li>
                <a href="/jadwal" class="flex items-center gap-2 hover:text-green-300 transition">
                    📅 Jadwal
                </a>
            </li>

            <li>
                <a href="/laporan" class="flex items-center gap-2 hover:text-green-300 transition">
                    📊 Laporan
                </a>
            </li>

        </ul>
    </div>


    <!-- 🔥 MAIN CONTENT -->
    <div class="flex-1 p-8">

        <!-- 🔥 NAVBAR -->
        <div class="flex justify-between items-center mb-6">

            <h1 class="text-lg font-semibold">
                Dashboard
            </h1>

            <div class="flex items-center gap-3">
                <span class="text-sm">👤 User</span>
                <button class="bg-red-500 px-3 py-1 rounded-lg hover:bg-red-600 transition text-sm">
                    Logout
                </button>
            </div>

        </div>

        <!-- 🔥 CONTENT -->
        <div class="bg-[#064e3b] p-6 rounded-xl shadow-lg">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>
