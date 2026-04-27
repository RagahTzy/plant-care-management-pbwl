<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Curator — Plant Care Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:   #1F6F5F;
            --secondary: #2FA084;
            --accent:    #6FCF97;
            --light:     #EEEEEE;
            --dark:      #0D3D32;
            --darker:    #0A2E25;
            --card-bg:   #163E35;
            --border:    rgba(111,207,151,0.15);
            --text-muted:#a8c5be;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { font-size: 15px; scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--darker);
            color: var(--light);
            overflow-x: hidden;
        }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: var(--dark); }
        ::-webkit-scrollbar-thumb { background: var(--secondary); border-radius: 3px; }

        /* ── NOISE TEXTURE overlay ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: .4;
        }

        /* ── NAVBAR ── */
        .nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 60px;
            background: rgba(10,46,37,0.75);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-brand .brand-icon {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
        }

        .nav-brand .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--light);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: .88rem;
            font-weight: 500;
            transition: color .2s;
        }

        .nav-links a:hover { color: var(--light); }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 20px;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: .85rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            text-decoration: none;
            transition: all .2s;
        }

        .btn-ghost {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-muted);
        }

        .btn-ghost:hover { border-color: var(--secondary); color: var(--light); }

        .btn-primary {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: #fff;
            box-shadow: 0 4px 16px rgba(47,160,132,0.35);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(47,160,132,0.45);
        }

        .btn-lg { padding: 14px 32px; font-size: .95rem; border-radius: 10px; }

        .btn-outline {
            background: transparent;
            border: 1px solid rgba(111,207,151,0.35);
            color: var(--accent);
        }

        .btn-outline:hover { background: rgba(111,207,151,0.1); }

        /* ── HERO ── */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 24px 80px;
            overflow: hidden;
        }

        /* Radial glow bg */
        .hero::after {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 800px; height: 600px;
            background: radial-gradient(ellipse, rgba(47,160,132,0.18) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Floating leaves decoration */
        .leaf {
            position: absolute;
            font-size: 3rem;
            opacity: .07;
            pointer-events: none;
            animation: float 8s ease-in-out infinite;
        }

        .leaf:nth-child(1)  { top: 10%; left: 5%;  font-size:4rem; animation-delay:0s;   }
        .leaf:nth-child(2)  { top: 20%; right: 8%; font-size:2.5rem; animation-delay:1.5s; }
        .leaf:nth-child(3)  { bottom: 20%; left: 12%; font-size:3.5rem; animation-delay:3s; }
        .leaf:nth-child(4)  { bottom: 30%; right: 6%; font-size:2rem; animation-delay:4.5s; }
        .leaf:nth-child(5)  { top: 50%; left: 2%; font-size:2.5rem; animation-delay:2s; }
        .leaf:nth-child(6)  { top: 40%; right: 3%; font-size:3rem; animation-delay:3.5s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            33%       { transform: translateY(-18px) rotate(5deg); }
            66%       { transform: translateY(10px) rotate(-4deg); }
        }

        .hero-content { position: relative; z-index: 1; max-width: 780px; }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(111,207,151,0.1);
            border: 1px solid rgba(111,207,151,0.25);
            border-radius: 99px;
            padding: 6px 18px;
            font-size: .78rem;
            font-weight: 600;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 28px;
            animation: fadeDown .6s ease both;
        }

        .hero-badge span { width: 6px; height: 6px; border-radius: 50%; background: var(--accent); }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 6vw, 5rem);
            font-weight: 900;
            line-height: 1.05;
            margin-bottom: 24px;
            animation: fadeDown .7s .1s ease both;
        }

        .hero-title .italic { font-style: italic; color: var(--accent); }

        .hero-title .line2 {
            display: block;
            color: var(--text-muted);
            font-weight: 400;
            font-size: .72em;
        }

        .hero-desc {
            font-size: 1.05rem;
            color: var(--text-muted);
            line-height: 1.75;
            max-width: 560px;
            margin: 0 auto 40px;
            animation: fadeDown .7s .2s ease both;
        }

        .hero-cta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            animation: fadeDown .7s .3s ease both;
        }

        .hero-stats {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid var(--border);
            animation: fadeDown .7s .4s ease both;
        }

        .hero-stat .val {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--light);
            line-height: 1;
        }

        .hero-stat .label {
            font-size: .75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 4px;
        }

        .hero-stat-sep {
            width: 1px;
            height: 40px;
            background: var(--border);
        }

        /* ── SCROLL INDICATOR ── */
        .scroll-hint {
            position: absolute;
            bottom: 32px; left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            animation: bounce 2s ease-in-out infinite;
        }

        .scroll-hint svg { opacity: .5; }

        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50%       { transform: translateX(-50%) translateY(8px); }
        }

        /* ── FEATURES SECTION ── */
        .section {
            padding: 96px 60px;
            position: relative;
        }

        .section-label {
            display: inline-block;
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            color: var(--accent);
            margin-bottom: 12px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 14px;
        }

        .section-title .italic { font-style: italic; color: var(--accent); }

        .section-desc {
            font-size: .95rem;
            color: var(--text-muted);
            line-height: 1.7;
            max-width: 520px;
        }

        .section-header { margin-bottom: 52px; }

        /* Features grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .feature-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 28px;
            transition: all .3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--secondary), transparent);
            opacity: 0;
            transition: opacity .3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: rgba(111,207,151,0.3);
            box-shadow: 0 16px 40px rgba(0,0,0,0.4);
        }

        .feature-card:hover::before { opacity: 1; }

        .feature-icon {
            width: 52px; height: 52px;
            border-radius: 12px;
            background: rgba(111,207,151,0.1);
            border: 1px solid rgba(111,207,151,0.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .feature-card p {
            font-size: .85rem;
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* ── DASHBOARD PREVIEW ── */
        .preview-section {
            padding: 80px 60px;
            background: var(--dark);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .preview-wrapper {
            max-width: 1000px;
            margin: 0 auto;
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0,0,0,0.5);
        }

        .preview-topbar {
            background: var(--dark);
            border-bottom: 1px solid var(--border);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot-r { background: #e85d5d; }
        .dot-y { background: #f5a623; }
        .dot-g { background: var(--accent); }

        .preview-topbar-url {
            flex: 1;
            margin-left: 12px;
            background: rgba(255,255,255,0.05);
            border-radius: 6px;
            padding: 5px 12px;
            font-size: .75rem;
            color: var(--text-muted);
            max-width: 300px;
        }

        .preview-body {
            display: grid;
            grid-template-columns: 200px 1fr;
            min-height: 380px;
        }

        .preview-sidebar {
            background: var(--dark);
            border-right: 1px solid var(--border);
            padding: 20px 14px;
        }

        .preview-logo {
            font-family: 'Playfair Display', serif;
            font-size: .85rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
        }

        .preview-nav-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 10px;
            border-radius: 7px;
            font-size: .75rem;
            color: var(--text-muted);
            margin-bottom: 3px;
        }

        .preview-nav-item.active {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: #fff;
        }

        .preview-main {
            padding: 20px;
        }

        .preview-stat-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 16px;
        }

        .preview-stat {
            background: var(--dark);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 12px;
        }

        .preview-stat.hl {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            border-color: transparent;
        }

        .preview-stat .pv {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .preview-stat .pl {
            font-size: .62rem;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .preview-stat.hl .pl { color: rgba(238,238,238,.7); }

        .preview-schedule {
            background: var(--dark);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 14px;
        }

        .preview-sched-title {
            font-family: 'Playfair Display', serif;
            font-size: .85rem;
            font-style: italic;
            margin-bottom: 10px;
        }

        .preview-task {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 7px 0;
            border-bottom: 1px solid var(--border);
        }

        .preview-task:last-child { border-bottom: none; }

        .pt-dot { width: 3px; height: 32px; border-radius: 3px; flex-shrink: 0; }

        .pt-info { flex: 1; }
        .pt-name { font-size: .72rem; font-weight: 600; }
        .pt-sub  { font-size: .65rem; color: var(--text-muted); }

        .pt-badge {
            font-size: .6rem;
            padding: 2px 7px;
            border-radius: 99px;
            background: rgba(111,207,151,0.12);
            color: var(--accent);
            border: 1px solid rgba(111,207,151,0.2);
        }

        /* ── HOW IT WORKS ── */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            position: relative;
        }

        .step-card {
            text-align: center;
            padding: 32px 24px;
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 14px;
            transition: all .25s;
        }

        .step-card:hover { transform: translateY(-4px); border-color: rgba(111,207,151,.3); }

        .step-num {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 900;
            font-style: italic;
            line-height: 1;
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 16px;
        }

        .step-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .step-card p {
            font-size: .82rem;
            color: var(--text-muted);
            line-height: 1.65;
        }

        /* ── TESTIMONIAL ── */
        .testi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .testi-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 26px;
            transition: all .25s;
        }

        .testi-card:hover { border-color: rgba(111,207,151,.25); transform: translateY(-3px); }

        .testi-stars {
            color: var(--accent);
            font-size: .85rem;
            letter-spacing: 2px;
            margin-bottom: 14px;
        }

        .testi-text {
            font-size: .88rem;
            color: var(--text-muted);
            line-height: 1.7;
            font-style: italic;
            margin-bottom: 20px;
        }

        .testi-author {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .testi-avatar {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            display: flex; align-items: center; justify-content: center;
            font-weight: 700;
            font-size: .85rem;
            color: var(--darker);
            flex-shrink: 0;
        }

        .testi-name { font-size: .88rem; font-weight: 600; }
        .testi-role { font-size: .75rem; color: var(--text-muted); }

        /* ── CTA SECTION ── */
        .cta-section {
            padding: 100px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 600px; height: 400px;
            background: radial-gradient(ellipse, rgba(47,160,132,0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .cta-content { position: relative; z-index: 1; }

        .cta-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 900;
            font-style: italic;
            margin-bottom: 16px;
        }

        .cta-content p {
            font-size: .95rem;
            color: var(--text-muted);
            margin-bottom: 36px;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-note {
            margin-top: 20px;
            font-size: .78rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
        }

        .cta-note span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* ── FOOTER ── */
        .footer {
            background: var(--dark);
            border-top: 1px solid var(--border);
            padding: 48px 60px 28px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr repeat(3, 1fr);
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-brand .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 10px;
        }

        .footer-brand p {
            font-size: .82rem;
            color: var(--text-muted);
            line-height: 1.65;
            max-width: 240px;
        }

        .footer-col h4 {
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: 1.8px;
            color: var(--text-muted);
            font-weight: 600;
            margin-bottom: 16px;
        }

        .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 9px; }

        .footer-col ul a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: .84rem;
            transition: color .2s;
        }

        .footer-col ul a:hover { color: var(--accent); }

        .footer-bottom {
            border-top: 1px solid var(--border);
            padding-top: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: .78rem;
            color: var(--text-muted);
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .nav { padding: 14px 20px; }
            .nav-links { display: none; }
            .section { padding: 60px 20px; }
            .preview-section { padding: 60px 20px; }
            .preview-body { grid-template-columns: 1fr; }
            .preview-sidebar { display: none; }
            .preview-stat-row { grid-template-columns: repeat(2, 1fr); }
            .footer { padding: 40px 20px 20px; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
            .footer-bottom { flex-direction: column; gap: 10px; text-align: center; }
            .cta-section { padding: 70px 20px; }
            .hero-stats { gap: 24px; flex-wrap: wrap; }
        }
    </style>
</head>
<body>

    {{-- ── NAVBAR ── --}}
    <nav class="nav">
        <a href="#" class="nav-brand">
            <div class="brand-icon">🌿</div>
            <span class="brand-text">Botanical Curator</span>
        </a>

        <ul class="nav-links">
            <li><a href="#fitur">Fitur</a></li>
            <li><a href="#cara-kerja">Cara Kerja</a></li>
            <li><a href="#ulasan">Ulasan</a></li>
            <li><a href="#tentang">Tentang</a></li>
        </ul>

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="btn btn-ghost">Masuk</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Mulai Gratis →</a>
        </div>
    </nav>

    {{-- ── HERO ── --}}
    <section class="hero">
        {{-- Floating leaves --}}
        <span class="leaf">🌿</span>
        <span class="leaf">🌱</span>
        <span class="leaf">🍃</span>
        <span class="leaf">🌾</span>
        <span class="leaf">🌵</span>
        <span class="leaf">🪴</span>

        <div class="hero-content">
            <div class="hero-badge">
                <span></span>
                Platform Perawatan Tanaman #1 di Indonesia
            </div>

            <h1 class="hero-title">
                Rawat Tanamanmu<br>
                dengan <span class="italic">Lebih Cerdas</span>
                <span class="line2">— bukan lebih keras.</span>
            </h1>

            <p class="hero-desc">
                Botanical Curator membantu kamu menjadwalkan perawatan, memantau kesehatan,
                dan mendapatkan tips terbaik untuk setiap tanaman dalam koleksimu.
            </p>

            <div class="hero-cta">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                    🌿 Mulai Sekarang — Gratis
                </a>
                <a href="#fitur" class="btn btn-outline btn-lg">
                    Lihat Fitur
                </a>
            </div>

            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="val">12K+</div>
                    <div class="label">Pengguna Aktif</div>
                </div>
                <div class="hero-stat-sep"></div>
                <div class="hero-stat">
                    <div class="val">480K+</div>
                    <div class="label">Tanaman Terdaftar</div>
                </div>
                <div class="hero-stat-sep"></div>
                <div class="hero-stat">
                    <div class="val">98%</div>
                    <div class="label">Tingkat Kepuasan</div>
                </div>
                <div class="hero-stat-sep"></div>
                <div class="hero-stat">
                    <div class="val">200+</div>
                    <div class="label">Jenis Tanaman</div>
                </div>
            </div>
        </div>

        <div class="scroll-hint">
            <span>Scroll</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"/>
            </svg>
        </div>
    </section>

    {{-- ── DASHBOARD PREVIEW ── --}}
    <div class="preview-section">
        <div style="text-align:center;margin-bottom:40px;">
            <span class="section-label">✦ App Preview</span>
            <h2 class="section-title" style="max-width:none;">
                Dashboard yang <span class="italic">Intuitif</span>
            </h2>
        </div>

        <div class="preview-wrapper">
            {{-- Browser chrome --}}
            <div class="preview-topbar">
                <div class="dot dot-r"></div>
                <div class="dot dot-y"></div>
                <div class="dot dot-g"></div>
                <div class="preview-topbar-url">botanicalcurator.app/dashboard</div>
            </div>

            {{-- App body --}}
            <div class="preview-body">
                {{-- Mini sidebar --}}
                <div class="preview-sidebar">
                    <div class="preview-logo">🌿 Botanical Curator</div>
                    @foreach([
                        ['icon'=>'◼', 'label'=>'Dashboard',  'active'=>true],
                        ['icon'=>'◇', 'label'=>'Tanaman',    'active'=>false],
                        ['icon'=>'◈', 'label'=>'Jadwal',     'active'=>false],
                        ['icon'=>'◉', 'label'=>'Tips',       'active'=>false],
                        ['icon'=>'◻', 'label'=>'Laporan',    'active'=>false],
                    ] as $item)
                    <div class="preview-nav-item {{ $item['active'] ? 'active' : '' }}">
                        <span>{{ $item['icon'] }}</span> {{ $item['label'] }}
                    </div>
                    @endforeach
                </div>

                {{-- Mini main content --}}
                <div class="preview-main">
                    <div style="font-size:.7rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:1.5px;margin-bottom:3px;">Maintenance Hub</div>
                    <div style="font-family:'Playfair Display',serif;font-size:1.3rem;font-style:italic;margin-bottom:16px;">Jadwal Perawatan</div>

                    <div class="preview-stat-row">
                        @foreach([
                            ['v'=>'04','l'=>'High Priority','hl'=>false],
                            ['v'=>'12','l'=>'Hari Ini',     'hl'=>true],
                            ['v'=>'28','l'=>'Antrean',      'hl'=>false],
                            ['v'=>'47','l'=>'Tanaman',      'hl'=>false],
                        ] as $s)
                        <div class="preview-stat {{ $s['hl'] ? 'hl' : '' }}">
                            <div class="pv">{{ $s['v'] }}</div>
                            <div class="pl">{{ $s['l'] }}</div>
                        </div>
                        @endforeach
                    </div>

                    <div class="preview-schedule">
                        <div class="preview-sched-title">Next 24 Hours</div>
                        @foreach([
                            ['time'=>'08 AM','name'=>'Watering: Monstera Variegata','sub'=>'Living Room · 500ml','color'=>'#e85d5d'],
                            ['time'=>'10 AM','name'=>'Soil Aeration: Sansevieria',  'sub'=>'Bedroom · Routine', 'color'=>'#2FA084'],
                            ['time'=>'02 PM','name'=>'Fertilizing: Ficus Elastica', 'sub'=>'Balcony · Mix A',   'color'=>'#6FCF97'],
                        ] as $t)
                        <div class="preview-task">
                            <span style="font-size:.65rem;color:var(--text-muted);min-width:38px;">{{ $t['time'] }}</span>
                            <div class="pt-dot" style="background:{{ $t['color'] }}"></div>
                            <div class="pt-info">
                                <div class="pt-name">{{ $t['name'] }}</div>
                                <div class="pt-sub">{{ $t['sub'] }}</div>
                            </div>
                            <span class="pt-badge">Selesai</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── FEATURES ── --}}
    <section class="section" id="fitur">
        <div class="section-header">
            <span class="section-label">✦ Fitur Unggulan</span>
            <h2 class="section-title">
                Semua yang kamu butuhkan<br>
                untuk merawat <span class="italic">koleksi terbaik</span>
            </h2>
            <p class="section-desc">
                Dari penjadwalan hingga analisis kesehatan tanaman —
                semuanya tersedia dalam satu platform yang elegan.
            </p>
        </div>

        <div class="features-grid">
            @php
            $features = [
                ['icon'=>'📅','title'=>'Jadwal Perawatan Cerdas','desc'=>'Atur jadwal siram, pupuk, dan aerasi secara otomatis. Dapatkan pengingat sebelum tanaman layu.'],
                ['icon'=>'🌡️','title'=>'Monitor Kondisi Lingkungan','desc'=>'Pantau suhu, kelembaban, dan intensitas cahaya secara real-time untuk setiap ruangan.'],
                ['icon'=>'📋','title'=>'Riwayat Laporan Lengkap','desc'=>'Catat setiap aktivitas perawatan dengan foto, catatan, dan kondisi kesehatan tanaman.'],
                ['icon'=>'🌿','title'=>'Database 200+ Tanaman','desc'=>'Akses panduan perawatan untuk ratusan jenis tanaman hias populer dari seluruh dunia.'],
                ['icon'=>'💡','title'=>'Growth Tips Personalisasi','desc'=>'Tips dan rekomendasi khusus berdasarkan jenis tanaman, cuaca lokal, dan pola perawatanmu.'],
                ['icon'=>'📊','title'=>'Analitik Kesehatan Tanaman','desc'=>'Visualisasi tren pertumbuhan dan kesehatan tanaman dengan grafik yang mudah dipahami.'],
            ];
            @endphp

            @foreach($features as $f)
            <div class="feature-card">
                <div class="feature-icon">{{ $f['icon'] }}</div>
                <h3>{{ $f['title'] }}</h3>
                <p>{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ── HOW IT WORKS ── --}}
    <section class="section" id="cara-kerja" style="background:var(--dark);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
        <div class="section-header" style="text-align:center;">
            <span class="section-label">✦ Cara Kerja</span>
            <h2 class="section-title">Mulai dalam <span class="italic">3 langkah</span> mudah</h2>
        </div>

        <div class="steps-grid">
            @php
            $steps = [
                ['num'=>'01','title'=>'Daftar & Tambah Tanaman','desc'=>'Buat akun gratis dan tambahkan tanaman koleksimu dengan foto, nama, dan lokasi penempatannya.'],
                ['num'=>'02','title'=>'Atur Jadwal Perawatan','desc'=>'Sistem akan merekomendasikan jadwal siram dan pupuk berdasarkan jenis tanaman dan kondisi lingkungan.'],
                ['num'=>'03','title'=>'Pantau & Catat Progress','desc'=>'Tandai tugas selesai, catat kondisi tanaman, dan lihat perkembangan koleksimu dari waktu ke waktu.'],
                ['num'=>'04','title'=>'Dapatkan Tanaman Sehat','desc'=>'Nikmati tanaman yang tumbuh subur dengan panduan perawatan berbasis data yang akurat dan personal.'],
            ];
            @endphp

            @foreach($steps as $s)
            <div class="step-card">
                <div class="step-num">{{ $s['num'] }}</div>
                <h3>{{ $s['title'] }}</h3>
                <p>{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ── TESTIMONIALS ── --}}
    <section class="section" id="ulasan">
        <div class="section-header">
            <span class="section-label">✦ Ulasan Pengguna</span>
            <h2 class="section-title">
                Dipercaya oleh ribuan<br>
                <span class="italic">plant parents</span> Indonesia
            </h2>
        </div>

        <div class="testi-grid">
            @php
            $testimoni = [
                ['inisial'=>'AS','nama'=>'Andini Saraswati','role'=>'Interior Plant Enthusiast, Jakarta','teks'=>'Botanical Curator benar-benar mengubah cara saya merawat tanaman. Sebelumnya selalu lupa siram, sekarang semua terjadwal rapi dan Monstera saya makin subur!'],
                ['inisial'=>'BR','nama'=>'Budi Raharjo','role'=>'Home Gardener, Bandung','teks'=>'Fitur laporan dan kondisi lingkungannya keren banget. Saya bisa tahu kapan kelembaban ruangan terlalu rendah sebelum tanaman stress.'],
                ['inisial'=>'CN','nama'=>'Citra Ningrum','role'=>'Plant Shop Owner, Surabaya','teks'=>'Saya pakai ini untuk mengelola 50+ tanaman di toko. Database tanamannya lengkap dan tips perawatannya sangat akurat dan berguna.'],
                ['inisial'=>'DH','nama'=>'Dian Handayani','role'=>'Landscape Designer, Yogyakarta','teks'=>'Tampilannya elegan dan modern, tapi tetap mudah digunakan. Riwayat laporan membantu saya membuktikan ke klien bahwa tanaman terawat dengan baik.'],
                ['inisial'=>'EW','nama'=>'Eko Wibowo','role'=>'Kolektor Kaktus, Malang','teks'=>'Fitur jadwal penyiraman untuk kaktus dan sukulen sangat membantu. Tidak ada lagi kaktus yang overwatered gara-gara lupa jadwal!'],
                ['inisial'=>'FP','nama'=>'Fatimah Putri','role'=>'Urban Gardener, Depok','teks'=>'Aplikasi ini membuat hobi merawat tanaman jadi lebih terstruktur dan menyenangkan. Highly recommended untuk semua plant lovers!'],
            ];
            @endphp

            @foreach($testimoni as $t)
            <div class="testi-card">
                <div class="testi-stars">★★★★★</div>
                <p class="testi-text">"{{ $t['teks'] }}"</p>
                <div class="testi-author">
                    <div class="testi-avatar">{{ $t['inisial'] }}</div>
                    <div>
                        <div class="testi-name">{{ $t['nama'] }}</div>
                        <div class="testi-role">{{ $t['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ── CTA ── --}}
    <section class="cta-section">
        <div class="cta-content">
            <h2>Siap memulai perjalananmu<br>sebagai <em>Plant Curator</em>?</h2>
            <p>Daftar gratis sekarang dan mulai rawat tanamanmu dengan lebih cerdas. Tidak perlu kartu kredit.</p>

            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                🌿 Buat Akun Gratis Sekarang
            </a>

            <div class="cta-note">
                <span>✓ Gratis selamanya</span>
                <span>✓ Tanpa kartu kredit</span>
                <span>✓ Setup dalam 2 menit</span>
            </div>
        </div>
    </section>

    {{-- ── FOOTER ── --}}
    <footer class="footer" id="tentang">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="logo">🌿 Botanical Curator</div>
                <p>Platform manajemen perawatan tanaman terpadu untuk para plant lovers Indonesia.</p>
            </div>

            <div class="footer-col">
                <h4>Produk</h4>
                <ul>
                    <li><a href="#">Fitur</a></li>
                    <li><a href="#">Harga</a></li>
                    <li><a href="#">Changelog</a></li>
                    <li><a href="#">Roadmap</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Dukungan</h4>
                <ul>
                    <li><a href="#">Dokumentasi</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Komunitas</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Perusahaan</h4>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>© {{ date('Y') }} Botanical Curator. Dibuat dengan 🌿 di Indonesia.</span>
            <span>Versi 2.4.1 · Semua hak dilindungi.</span>
        </div>
    </footer>

</body>
</html>