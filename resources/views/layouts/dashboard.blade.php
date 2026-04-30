<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Plant Care Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        botanical: {
                            900: '#09120e', // Background paling gelap
                            800: '#111d18', // Card background
                            700: '#1b2d25', // Hover state
                            accent: '#6ee7b7', // Hijau terang (teal/emerald)
                            text: '#a7f3d0' // Teks sekunder hijau
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-botanical-900 text-gray-200 font-sans antialiased flex h-screen overflow-hidden">

    @include('components.sidebar')

    <div class="flex-1 flex flex-col h-screen overflow-y-auto">
        <header class="flex justify-between items-center p-6 bg-botanical-900/80 backdrop-blur-md sticky top-0 z-10">
            <div class="flex-1 max-w-xl">
                <div class="relative">
                    <input type="text" placeholder="Search conservancy..." class="w-full bg-botanical-800 text-sm text-gray-300 rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700">
                    <svg class="w-4 h-4 absolute left-4 top-2.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="text-gray-400 hover:text-white relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-botanical-accent rounded-full"></span>
                </button>
                <div class="w-8 h-8 rounded-full bg-botanical-700 overflow-hidden border border-botanical-accent/30">
                    <img src="https://i.pravatar.cc/150?img=11" alt="Profile" class="w-full h-full object-cover">
                </div>
            </div>
        </header>

        <main class="p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>