<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Plant Care Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'], serif: ['Playfair Display', 'serif'] }, colors: { botanical: { 900: '#09120e', 800: '#111d18', 700: '#1b2d25', accent: '#6ee7b7' } } } }
        }
    </script>
</head>
<body class="bg-botanical-900 text-gray-200 font-sans antialiased selection:bg-botanical-accent selection:text-botanical-900 min-h-screen flex">

    <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
        <div class="absolute inset-0 bg-botanical-900/40 z-10"></div>
        <img src="https://images.unsplash.com/photo-1542838686-37ed7a7ef6e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Monstera Leaves" class="w-full h-full object-cover">
        
        <div class="absolute bottom-12 left-12 z-20">
            <a href="/" class="flex items-center gap-3 text-white mb-4 hover:scale-105 transition-transform origin-left">
                <svg class="w-8 h-8 text-botanical-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium text-2xl tracking-wide font-serif">Plant Care Management System</span>
            </a>
            <p class="text-gray-300 max-w-md">"Merawat tanaman bukan hanya tentang menyiramnya, tapi tentang memahami bahasanya."</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center lg:text-left">
                <h2 class="text-3xl text-white font-serif font-light mb-2">Selamat Datang Kembali</h2>
                <p class="text-gray-400 text-sm">Silakan masuk ke akun Anda untuk melanjutkan perawatan.</p>
            </div>

            <!-- Pesan Error Global dari Breeze -->
            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/50 text-red-400 p-4 rounded-xl text-sm">
                    Terjadi kesalahan pada kredensial Anda.
                </div>
            @endif

            <!-- Form Action menuju route('login') dan Method POST -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6 mt-8">
                @csrf <!-- Wajib ada di Laravel -->
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300 block">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <!-- Name = email, value old('email') agar teks tidak hilang jika salah password -->
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" class="w-full bg-botanical-800 text-sm text-white rounded-xl pl-11 pr-4 py-3.5 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition" required autofocus>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label class="text-sm font-medium text-gray-300">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs font-medium text-botanical-accent hover:text-emerald-400 transition">Lupa Password?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <!-- Name = password -->
                        <input type="password" name="password" placeholder="••••••••" class="w-full bg-botanical-800 text-sm text-white rounded-xl pl-11 pr-4 py-3.5 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition" required>
                    </div>
                </div>

                <div class="flex items-center">
                    <!-- Name = remember -->
                    <input id="remember_me" name="remember" type="checkbox" class="w-4 h-4 rounded border-botanical-700 text-botanical-accent focus:ring-botanical-accent bg-botanical-800">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-400 cursor-pointer">
                        Ingat saya di perangkat ini
                    </label>
                </div>

                <button type="submit" class="w-full flex justify-center py-3.5 px-4 rounded-xl text-sm font-medium text-botanical-900 bg-botanical-accent hover:bg-emerald-300 shadow-[0_0_15px_rgba(110,231,183,0.2)] hover:shadow-[0_0_20px_rgba(110,231,183,0.4)] transition-all">
                    Masuk ke Sistem
                </button>
            </form>

            <p class="text-center text-sm text-gray-400 mt-8">
                Belum memiliki akun? <a href="{{ route('register') }}" class="font-medium text-botanical-accent hover:text-emerald-400 transition">Daftar Gratis di sini</a>
            </p>
        </div>
    </div>
</body>
</html>
