<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PlantCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-900 text-white">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 min-h-screen bg-green-800 p-5">
        <h2 class="text-xl font-bold mb-6">🌱 PlantCare</h2>

        <ul class="space-y-3">
            <li><a href="#" class="block hover:text-green-300">Dashboard</a></li>
            <li><a href="/tips" class="block hover:text-green-300">Tips</a></li>
            <li><a href="/jadwal" class="block hover:text-green-300">Jadwal</a></li>
            <li><a href="/laporan" class="block hover:text-green-300">Laporan</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-8">
        @yield('content')
    </div>

</div>

</body>
</html>