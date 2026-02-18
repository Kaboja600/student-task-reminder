<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow – Stay on Top of Your Day</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
    /* Landing-page-only styles */
    body.landing-page {
        font-family: 'DM Sans', sans-serif;
        background: #f5f4ff;
        color: #1e1b4b;
        margin: 0;
        min-height: 100vh;
    }

    /* NAV */
    .nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 22px 48px;
        background: #fff;
        border-bottom: 1px solid #e0dff5;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .nav-logo {
        font-family: 'Sora', sans-serif;
        font-weight: 800;
        font-size: 1.4rem;
        color: #3730a3;
        text-decoration: none;
        letter-spacing: -0.5px;
    }

    .nav-logo span {
        color: #6d5de6;
    }

    .nav-links {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .btn-outline {
        padding: 9px 22px;
        border-radius: 10px;
        border: 2px solid #3730a3;
        color: #3730a3;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        transition: background 0.18s, color 0.18s;
    }

    .btn-outline:hover {
        background: #3730a3;
        color: #fff;
    }

    .btn-primary {
        padding: 9px 22px;
        border-radius: 10px;
        background: #3730a3;
        color: #fff;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        transition: background 0.18s, box-shadow 0.18s;
    }

    .btn-primary:hover {
        background: #312e81;
        box-shadow: 0 6px 18px rgba(55, 48, 163, 0.25);
    }

    /* HERO */
    .hero {
        max-width: 780px;
        margin: 0 auto;
        text-align: center;
        padding: 90px 24px 60px;
    }

    .hero-badge {
        display: inline-block;
        background: #ede9fe;
        color: #4338ca;
        font-weight: 600;
        font-size: 0.8rem;
        padding: 5px 14px;
        border-radius: 20px;
        margin-bottom: 24px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .hero h1 {
        font-family: 'Sora', sans-serif;
        font-size: clamp(2.2rem, 6vw, 3.6rem);
        font-weight: 800;
        line-height: 1.15;
        margin: 0 0 20px;
        color: #1e1b4b;
        letter-spacing: -1px;
    }

    .hero h1 em {
        font-style: normal;
        color: #4338ca;
        text-decoration: underline;
        text-decoration-color: #c7d2fe;
        text-underline-offset: 6px;
    }

    .hero p {
        font-size: 1.15rem;
        color: #4b5563;
        line-height: 1.7;
        margin: 0 auto 36px;
        max-width: 560px;
    }

    .hero-cta {
        display: flex;
        gap: 14px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .hero-cta .btn-primary {
        padding: 14px 32px;
        font-size: 1rem;
        border-radius: 12px;
    }

    .hero-cta .btn-outline {
        padding: 14px 32px;
        font-size: 1rem;
        border-radius: 12px;
    }



    /* FEATURES */
    .features {
        max-width: 960px;
        margin: 0 auto;
        padding: 60px 24px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 24px;
    }

    .feature-card {
        background: #fff;
        border: 1px solid #e0dff5;
        border-radius: 16px;
        padding: 30px 28px;
        transition: box-shadow 0.2s, transform 0.2s;
    }

    .feature-card:hover {
        box-shadow: 0 10px 30px rgba(55, 48, 163, 0.1);
        transform: translateY(-3px);
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        background: #ede9fe;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 18px;
    }

    .feature-card h3 {
        font-family: 'Sora', sans-serif;
        font-size: 1.05rem;
        font-weight: 700;
        margin: 0 0 8px;
        color: #1e1b4b;
    }

    .feature-card p {
        font-size: 0.92rem;
        color: #6b7280;
        line-height: 1.65;
        margin: 0;
    }

    /* PREVIEW MOCKUP */
    .preview-section {
        max-width: 860px;
        margin: 0 auto;
        padding: 0 24px 80px;
        text-align: center;
    }

    .preview-section h2 {
        font-family: 'Sora', sans-serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: #1e1b4b;
        margin-bottom: 32px;
    }

    .mockup {
        background: #fff;
        border: 1px solid #e0dff5;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 20px 50px rgba(55, 48, 163, 0.1);
    }

    .mockup-bar {
        background: #3730a3;
        border-radius: 10px;
        padding: 14px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .mockup-bar span {
        color: #fff;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .mockup-bar a {
        background: #ef4444;
        color: #fff;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none;
    }

    .mockup-task {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 16px;
        border: 1px solid #e0dff5;
        border-radius: 10px;
        margin-bottom: 10px;
        font-size: 0.9rem;
        color: #374151;
    }

    .mockup-task span {
        color: #6b7280;
        font-size: 0.82rem;
    }

    .mockup-task button {
        background: #f97316;
        color: #fff;
        border: none;
        padding: 5px 12px;
        border-radius: 7px;
        font-size: 0.78rem;
        font-weight: 600;
        cursor: default;
    }

    /* CTA SECTION */
    .cta-section {
        background: #3730a3;
        color: #fff;
        text-align: center;
        padding: 70px 24px;
    }

    .cta-section h2 {
        font-family: 'Sora', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        margin: 0 0 14px;
    }

    .cta-section p {
        font-size: 1rem;
        color: #c7d2fe;
        margin: 0 0 30px;
    }

    .cta-section .btn-white {
        display: inline-block;
        background: #fff;
        color: #3730a3;
        font-weight: 700;
        padding: 14px 36px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 1rem;
        transition: box-shadow 0.18s;
    }

    .cta-section .btn-white:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    /* FOOTER */
    footer {
        text-align: center;
        padding: 24px;
        color: #9ca3af;
        font-size: 0.85rem;
        background: #fff;
        border-top: 1px solid #e0dff5;
    }

    @media (max-width: 600px) {
        .nav {
            padding: 16px 20px;
        }

        .hero {
            padding: 60px 20px 40px;
        }
    }
    </style>
</head>

<body class="landing-page">

    <!-- NAV -->
    <nav class="nav">
        <a href="landing.php" class="nav-logo">Task<span>Flow</span></a>
        <div class="nav-links">
            <a href="index.php" class="btn-outline">Login</a>
            <a href="register.php" class="btn-primary">Get Started</a>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-badge">📋 Simple. Personal. Powerful.</div>
        <h1>Manage your tasks<br><em>without the chaos</em></h1>
        <p>TaskFlow helps you plan your day, hit your deadlines, and stay focused — all in one clean, distraction-free
            space.</p>
        <div class="hero-cta">
            <a href="register.php" class="btn-primary">Create Free Account</a>
            <a href="index.php" class="btn-outline">Log In</a>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="features">
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>Quick Task Entry</h3>
            <p>Add tasks in seconds with a name, date, and time. No complicated setup — just type and go.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📅</div>
            <h3>Scheduled Reminders</h3>
            <p>Attach a date and time to every task so you always know what's coming up next.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🗂️</div>
            <h3>Archive & Declutter</h3>
            <p>Done with a task? Archive it with one click to keep your dashboard clean and focused.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🔒</div>
            <h3>Your Tasks, Private</h3>
            <p>Each account sees only their own tasks. No sharing, no clutter from others.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📱</div>
            <h3>Works on Any Device</h3>
            <p>Access your task list from phone, tablet, or desktop — install it as an app for even faster access.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🚀</div>
            <h3>No Friction Sign-Up</h3>
            <p>Create an account with just a username and password. You're up and running in under 30 seconds.</p>
        </div>
    </section>

    <!-- PREVIEW MOCKUP -->
    <section class="preview-section">
        <h2>Clean dashboard. Zero distractions.</h2>
        <div class="mockup">
            <div class="mockup-bar">
                <span>Hello, Alex 👋</span>
                <a href="#">Logout</a>
            </div>
            <div class="mockup-task">
                <strong>Submit project report</strong>
                <span>Feb 20 · 09:00</span>
                <button>Archive</button>
            </div>
            <div class="mockup-task">
                <strong>Team stand-up meeting</strong>
                <span>Feb 20 · 10:30</span>
                <button>Archive</button>
            </div>
            <div class="mockup-task">
                <strong>Review client feedback</strong>
                <span>Feb 21 · 14:00</span>
                <button>Archive</button>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <h2>Ready to take control of your day?</h2>
        <p>Join TaskFlow for free. No credit card needed.</p>
        <a href="register.php" class="btn-white">Get Started Now →</a>
    </section>

    <!-- FOOTER -->
    <footer>
        &copy; <?= date('Y') ?> TaskFlow. Built for productivity.
    </footer>



</body>

</html>