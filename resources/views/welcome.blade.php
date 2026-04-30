<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Conservator - Plant Care Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
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
                            900: '#09120e',
                            800: '#111d18',
                            700: '#1b2d25',
                            accent: '#6ee7b7',
                            text: '#a7f3d0'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-botanical-900 text-gray-200 font-sans antialiased flex flex-col min-h-screen selection:bg-botanical-accent selection:text-botanical-900">

    <header class="fixed w-full top-0 z-50 bg-botanical-900/80 backdrop-blur-md border-b border-botanical-700/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <svg class="w-7 h-7 text-botanical-accent group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-white font-medium text-xl tracking-wide font-serif">The Conservator</span>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="#fitur" class="text-sm font-medium text-gray-400 hover:text-white transition">Fitur</a>
                <a href="#tentang" class="text-sm font-medium text-gray-400 hover:text-white transition">Tentang Sistem</a>
                
                <div class="flex items-center gap-4 ml-4 border-l border-botanical-700 pl-8">
                    @auth
                        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="text-sm font-medium text-white hover:text-botanical-accent transition">
                            Dashboard
                        </a>
                        
                        <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-lg text-sm font-medium bg-red-500/10 text-red-400 border border-red-500/20 hover:bg-red-500 hover:text-white transition-all">
                                Keluar
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-white hover:text-botanical-accent transition">Masuk</a>
                        
                        <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 shadow-[0_0_15px_rgba(110,231,183,0.2)] hover:shadow-[0_0_20px_rgba(110,231,183,0.4)] transition-all">
                            Daftar Gratis
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <main class="flex-grow pt-20">
        <section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Botany Background" class="w-full h-full object-cover opacity-20">
                <div class="absolute inset-0 bg-gradient-to-b from-botanical-900/60 via-botanical-900/90 to-botanical-900"></div>
            </div>

            <div class="relative z-10 max-w-4xl mx-auto px-6 text-center space-y-8">
                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium bg-botanical-accent/10 text-botanical-accent border border-botanical-accent/20 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-botanical-accent animate-pulse"></span>
                    Plant Care Management System 1.0
                </span>
                
                <h1 class="text-5xl md:text-7xl text-white font-serif font-light tracking-tight leading-tight">
                    Harmoni Sempurna Antara <br> <span class="italic text-botanical-accent">Alam & Teknologi</span>
                </h1>
                
                <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto leading-relaxed">
                    Sistem manajemen botani modern untuk memonitor, menjadwalkan, dan mencatat pertumbuhan koleksi tanaman Anda dengan standar profesional.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                    @auth
                        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-base font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 shadow-[0_0_20px_rgba(110,231,183,0.3)] transition-all flex items-center justify-center gap-2">
                            Masuk ke Dashboard
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-base font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 shadow-[0_0_20px_rgba(110,231,183,0.3)] transition-all flex items-center justify-center gap-2">
                            Mulai Merawat Tanaman
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @endauth
                    
                    <a href="#fitur" class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-base font-medium border border-botanical-700 text-white hover:bg-botanical-800 transition-all text-center">
                        Pelajari Fitur
                    </a>
                </div>
            </div>
        </section>

        <section id="fitur" class="py-24 bg-botanical-900">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
                    <h2 class="text-3xl md:text-4xl text-white font-serif font-light">Fitur Unggulan</h2>
                    <p class="text-gray-400">Semua alat yang Anda butuhkan untuk memastikan setiap spesimen tanaman tumbuh dalam kondisi optimal.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-botanical-800 rounded-3xl p-8 border border-botanical-700/50 hover:border-botanical-accent/30 transition-colors group">
                        <div class="w-14 h-14 rounded-2xl bg-botanical-900 border border-botanical-700 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:text-botanical-accent transition-all">
                            <svg class="w-7 h-7 text-gray-400 group-hover:text-botanical-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl text-white font-medium mb-3">Jadwal Perawatan</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Sistem otomatis yang mengingatkan waktu penyiraman, pemupukan, dan rotasi cahaya untuk setiap tanaman berdasarkan kebutuhannya.</p>
                    </div>

                    <div class="bg-botanical-800 rounded-3xl p-8 border border-botanical-700/50 hover:border-botanical-accent/30 transition-colors group">
                        <div class="w-14 h-14 rounded-2xl bg-botanical-900 border border-botanical-700 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:text-botanical-accent transition-all">
                            <svg class="w-7 h-7 text-gray-400 group-hover:text-botanical-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h3 class="text-xl text-white font-medium mb-3">Laporan Pertumbuhan</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Dokumentasikan perkembangan tanaman secara visual. Unggah foto secara berkala dan pantau rekam jejak kesehatan koleksi Anda.</p>
                    </div>

                    <div class="bg-botanical-800 rounded-3xl p-8 border border-botanical-700/50 hover:border-botanical-accent/30 transition-colors group">
                        <div class="w-14 h-14 rounded-2xl bg-botanical-900 border border-botanical-700 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:text-botanical-accent transition-all">
                            <svg class="w-7 h-7 text-gray-400 group-hover:text-botanical-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477-4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-xl text-white font-medium mb-3">Database & Tips</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Akses panduan dan tips perawatan khusus yang dibuat oleh admin konservator untuk setiap spesies tanaman yang Anda ampu.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 border-t border-botanical-700/50">
            <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
                <h2 class="text-3xl text-white font-serif font-light">Siap untuk mulai merawat?</h2>
                <p class="text-gray-400">Bergabunglah sekarang dan rasakan kemudahan mengelola manajemen perawatan tanaman secara sistematis.</p>
                <div class="pt-4">
                    @auth
                        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="inline-flex px-8 py-3.5 rounded-xl text-base font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 transition-all">
                            Buka Dashboard Anda
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex px-8 py-3.5 rounded-xl text-base font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 transition-all">
                            Buat Akun Sekarang
                        </a>
                    @endauth
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-botanical-900 py-8 border-t border-botanical-800 text-center">
        <p class="text-sm text-gray-500">
            &copy; 2026 The Conservator - Plant Care Management System. All rights reserved.
        </p>
    </footer>

</body>
</html>