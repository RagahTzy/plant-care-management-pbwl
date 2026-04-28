<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard — Botanical Curator</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --navbar-height: 70px;
            --bg-body: #050a09;       /* Hitam pekat sedikit kehijauan */
            --bg-sidebar: #08110f;    /* Hitam sidebar */
            --bg-card: #0d1a17;       /* Hitam kartu */
            --primary: #1F6F5F;       /* Hijau botol */
            --accent: #6FCF97;        /* Hijau neon/mint */
            --text-main: #e0e0e0;
            --text-muted: #889491;
            --border: rgba(111, 207, 151, 0.1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* ── SIDEBAR (KIRI) ── */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--bg-sidebar);
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--border);
            z-index: 100;
        }

        .sidebar-header {
            height: var(--navbar-height);
            display: flex;
            align-items: center;
            padding: 0 25px;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--accent);
            letter-spacing: -0.5px;
        }

        .sidebar-menu {
            padding: 20px 15px;
            flex: 1;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            text-decoration: none;
            color: var(--text-muted);
            border-radius: 10px;
            margin-bottom: 8px;
            transition: 0.3s;
            font-size: 0.9rem;
        }

        .menu-item:hover, .menu-item.active {
            background-color: rgba(111, 207, 151, 0.1);
            color: var(--accent);
        }

        /* ── MAIN WRAPPER ── */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* ── NAVBAR (ATAS) ── */
        .navbar {
            height: var(--navbar-height);
            background-color: var(--bg-sidebar);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .search-bar {
            background: #12221e;
            border: 1px solid var(--border);
            padding: 10px 20px;
            border-radius: 12px;
            width: 350px;
            color: white;
            outline: none;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 40px; height: 40px;
            background: var(--primary);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: bold; border: 2px solid var(--accent);
        }

        /* ── KONTEN (KANAN) ── */
        .content {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        .welcome-msg h1 { font-size: 1.8rem; margin-bottom: 8px; }
        .welcome-msg p { color: var(--text-muted); margin-bottom: 30px; }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .card {
            background: var(--bg-card);
            padding: 25px;
            border-radius: 16px;
            border: 1px solid var(--border);
            transition: 0.3s;
        }

        .card:hover { border-color: var(--accent); transform: translateY(-3px); }

        .card h3 { font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; }
        .card .value { font-size: 2rem; font-weight: 700; margin-top: 10px; color: white; }

        /* TABLE AREA */
        .data-section {
            background: var(--bg-card);
            padding: 25px;
            border-radius: 16px;
            border: 1px solid var(--border);
        }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { text-align: left; padding: 15px; color: var(--text-muted); border-bottom: 1px solid var(--border); font-size: 0.85rem; }
        td { padding: 18px 15px; border-bottom: 1px solid var(--border); font-size: 0.9rem; }

        .badge-status {
            padding: 6px 12px; border-radius: 8px; font-size: 0.75rem; font-weight: 600;
        }
        .status-good { background: rgba(111, 207, 151, 0.1); color: var(--accent); }

        /* SCROLLBAR CUSTOM */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-body); }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 10px; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            🌿 Curator<span style="color:white">.</span>
        </div>
        <nav class="sidebar-menu">
            <a href="{{ route('dashboard') }}" class="menu-item active">📊 Overview</a>
            <a href="{{ route('tanaman.index') }}" class="menu-item">🌱 Koleksi Tanaman</a>
            <a href="{{ route('laporan.index') }}" class="menu-item">📈 Laporan Berkala</a>
            <a href="#" class="menu-item">🔔 Notifikasi</a>
            <a href="#" class="menu-item">⚙️ Pengaturan Akun</a>
        </nav>
        <div style="padding: 20px;">
            <a href="{{ route('welcome') }}" class="menu-item" style="color: #ff5e5e;">🚪 Log Out</a>
        </div>
    </aside>

    <div class="main-wrapper">
        
        <header class="navbar">
            <input type="text" class="search-bar" placeholder="Cari ID Tanaman atau Lokasi...">
            <div class="user-profile">
                <div style="text-align: right;">
                    <p style="font-size: 0.85rem; font-weight: 600;">{{ $name ?? 'Curator User' }}</p>
                    <p style="font-size: 0.7rem; color: var(--accent);">Level: Master Gardener</p>
                </div>
                <div class="avatar">U</div>
            </div>
        </header>

        <main class="content">
            <div class="welcome-msg">
                <h1>Selamat Datang Kembali!</h1>
                <p>Koleksi tanamanmu dalam kondisi prima hari ini.</p>
            </div>

            <div class="stats-grid">
                <div class="card">
                    <h3>Tanaman Aktif</h3>
                    <div class="value">32</div>
                </div>
                <div class="card">
                    <h3>Kelembaban Tanah</h3>
                    <div class="value" style="color: #4facfe;">68%</div>
                </div>
                <div class="card">
                    <h3>Tugas Hari Ini</h3>
                    <div class="value" style="color: var(--accent);">4</div>
                </div>
            </div>

            <div class="data-section">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h2>Daftar Pantauan Terbaru</h2>
                    <a href="{{ route('tanaman.index') }}" style="color: var(--accent); text-decoration: none; font-size: 0.8rem;">Lihat Semua →</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Tanaman</th>
                            <th>Penempatan</th>
                            <th>Suhu Ruang</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Monstera King</td>
                            <td>Ruang Tamu</td>
                            <td>24°C</td>
                            <td><span class="badge-status status-good">Terjaga</span></td>
                        </tr>
                        <tr>
                            <td>Alocasia Black Velvet</td>
                            <td>Kamar Kerja</td>
                            <td>26°C</td>
                            <td><span class="badge-status status-good">Optimal</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>