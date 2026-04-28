<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Curator — Smart Plant Care</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1F6F5F;
            --secondary: #2FA084;
            --accent: #6FCF97;
            --darker: #0A2E25;
            --light: #F4F7F6;
            --text-muted: #a8c5be;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--darker);
            color: white;
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        .nav {
            position: fixed;
            top: 0; width: 100%; z-index: 1000;
            display: flex; justify-content: space-between; align-items: center;
            padding: 25px 8%;
            background: rgba(10, 46, 37, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(111, 207, 151, 0.1);
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent);
            text-decoration: none;
        }

        .nav-links { display: flex; gap: 40px; list-style: none; }
        .nav-links a { color: var(--text-muted); text-decoration: none; font-size: 0.9rem; transition: 0.3s; }
        .nav-links a:hover { color: white; }

        /* ── HERO SECTION ── */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 8%;
            background: radial-gradient(circle at 80% 20%, rgba(47, 160, 132, 0.15) 0%, transparent 50%);
        }

        .hero-content { max-width: 700px; }
        
        .badge {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(111, 207, 151, 0.1);
            border: 1px solid var(--accent);
            color: var(--accent);
            border-radius: 20px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 5.5rem);
            line-height: 1;
            margin-bottom: 25px;
        }

        .hero-title span { font-style: italic; font-weight: 400; color: var(--accent); }

        .hero-desc {
            font-size: 1.1rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 40px;
            max-width: 500px;
        }

        /* ── BUTTONS ── */
        .cta-group { display: flex; gap: 20px; align-items: center; }

        .btn {
            padding: 16px 35px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.4s;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--accent);
            color: var(--darker);
            box-shadow: 0 10px 30px rgba(111, 207, 151, 0.3);
        }
        .btn-primary:hover { transform: translateY(-5px); background: #fff; }

        .btn-outline {
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
        }
        .btn-outline:hover { background: rgba(255,255,255,0.05); }

        /* ── DECORATION ── */
        .leaf-decor {
            position: absolute;
            right: -5%;
            top: 20%;
            font-size: 25rem;
            opacity: 0.05;
            pointer-events: none;
            user-select: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hero { text-align: center; justify-content: center; }
            .cta-group { flex-direction: column; }
        }
    </style>
</head>
<body>

    <nav class="nav">
        <a href="/" class="brand">🌿 Botanical.</a>
        <ul class="nav-links">
            <li><a href="#fitur">Fitur</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#harga">Harga</a></li>
        </ul>
        <div>
            <a href="/dashboard" class="btn btn-outline" style="padding: 10px 25px; font-size: 0.8rem;">MASUK</a>
        </div>
    </nav>

    <main>
        <section class="hero">
            <div class="leaf-decor">🌿</div>
            <div class="hero-content">
                <div class="badge">Artificial Intelligence for Nature</div>
                <h1 class="hero-title">Bawa Hutan ke <span>Ruang Tamu.</span></h1>
                <p class="hero-desc">Satu-satunya asisten digital yang memastikan setiap helai daun di rumahmu tumbuh dengan bahagia dan sehat.</p>
                
                <div class="cta-group">
                    <a href="/dashboard" class="btn btn-primary">Mulai Kelola Sekarang</a>
                    <a href="#fitur" class="btn btn-outline">Lihat Demo</a>
                </div>

                <div style="margin-top: 50px; display: flex; gap: 30px; opacity: 0.5; font-size: 0.8rem;">
                    <div>● 10k+ Pengguna</div>
                    <div>● 500+ Spesies Data</div>
                    <div>● Smart Reminder</div>
                </div>
            </div>
        </section>
    </main>

</body>
</html>