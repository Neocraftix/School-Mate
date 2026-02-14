<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<footer class="mega-footer">
    <div class="mega-decor-bg">
        <div class="m-circle mc-1"></div>
        <div class="m-circle mc-2"></div>
        <div class="m-dots"></div>
    </div>

    <div class="mega-container">

        <div class="mega-brand-section">
            <div class="sl-pride-badge">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/11/Flag_of_Sri_Lanka.svg" alt="SL Flag"
                    class="mini-flag">
                100% SRI LANKAN PRODUCT
            </div>
            <h1 class="mega-logo">SCHOOL<span>MATE</span></h1>
            <p class="mega-description">
                The ultimate digital ecosystem for Sri Lankan education. Built locally, engineered for the world.
            </p>
            @if (env('APP_BETA_VERSION') == 'true')
                <div class="version-pill">
                    <span class="pulse-ring"></span>
                    BETA {{ env('APP_VERSION') ? env('APP_VERSION') : 'N/A' }} - PRE-RELEASE
                </div>
            @else
                <div class="version-pill">
                    <span class="pulse-ring"></span>
                    {{ env('APP_VERSION') ? env('APP_VERSION') : 'N/A' }} - STABLE-RELEASE
                </div>
            @endif
        </div>

        <div class="mega-partners">

            <div class="partner-glass-card">
                <div class="card-glow"></div>
                <div class="card-content">
                    <div class="p-icon-large"><i class="fas fa-microchip"></i></div>
                    <h3>NeocraftiX</h3>
                    <p>Core System Architecture, Advanced Logic & AI Integration.</p>
                    {{-- <a href="https://neocraftix.com" target="_blank" class="visit-btn">
                        Explore Studio <i class="fas fa-chevron-right"></i>
                    </a> --}}
                </div>
            </div>

            <div class="partner-glass-card">
                <div class="card-glow"></div>
                <div class="card-content">
                    <div class="p-icon-large"><i class="fas fa-cloud-bolt"></i></div>
                    <h3>Clicknet.lk <span>(Pvt) Ltd</span></h3>
                    <p>Project Sponsor & Strategic Partner.</p>
                    <a href="https://clicknet.lk" target="_blank" class="visit-btn">
                        Explore Cloud <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="mega-bottom-bar">
        <div class="national-strip">
            <div class="s1"></div>
            <div class="s2"></div>
            <div class="s3"></div>
            <div class="s4"></div>
        </div>
        <div class="bottom-inner">
            <p>Developed & Maintained by a Strategic Joint Venture of <b>NeocraftiX</b> and <b>Clicknet.lk</b></p>
            <div class="sl-heart">Handcrafted with <i class="fas fa-heart"></i> in Sri Lanka</div>
        </div>
    </div>
</footer>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');

    .mega-footer {
        --primary-blue: #2563eb;
        --card-bg: rgba(255, 255, 255, 0.8);
        background-color: #f8fafc;
        font-family: 'Plus Jakarta Sans', sans-serif;
        position: relative;
        overflow: hidden;
        padding-top: 100px;
        /* උස වැඩි කළා */
    }

    /* Background Decorations */
    .mega-decor-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .m-circle {
        position: absolute;
        border-radius: 50%;
        background: var(--primary-blue);
        opacity: 0.04;
    }

    .mc-1 {
        width: 500px;
        height: 500px;
        top: -200px;
        right: -100px;
    }

    .mc-2 {
        width: 300px;
        height: 300px;
        bottom: -100px;
        left: -50px;
    }

    .m-dots {
        position: absolute;
        top: 50px;
        left: 50px;
        width: 200px;
        height: 200px;
        background-image: radial-gradient(#cbd5e1 1.5px, transparent 1.5px);
        background-size: 20px 20px;
        opacity: 0.5;
    }

    .mega-container {
        max-width: 1300px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 50px;
        padding: 0 30px 80px 30px;
        position: relative;
        z-index: 1;
    }

    /* Brand Styling */
    .sl-pride-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 800;
        color: #b91c1c;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #fee2e2;
    }

    .mini-flag {
        width: 20px;
        border-radius: 2px;
    }

    .mega-logo {
        font-size: 45px;
        font-weight: 800;
        color: #0f172a;
        margin: 20px 0 10px 0;
    }

    .mega-logo span {
        color: var(--primary-blue);
    }

    .mega-description {
        color: #64748b;
        font-size: 16px;
        line-height: 1.6;
        max-width: 400px;
    }

    .version-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #e0f2fe;
        color: #0369a1;
        padding: 6px 15px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        margin-top: 20px;
    }

    .pulse-ring {
        width: 8px;
        height: 8px;
        background: #0ea5e9;
        border-radius: 50%;
        box-shadow: 0 0 10px #0ea5e9;
        animation: pulse 1.5s infinite;
    }

    /* Partner Cards (WOW Factor) */
    .mega-partners {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .partner-glass-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 1);
        border-radius: 35px;
        padding: 45px 35px;
        position: relative;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.02);
        cursor: pointer;
    }

    .partner-glass-card:hover {
        transform: translateY(-15px) scale(1.02);
        background: #ffffff;
        box-shadow: 0 40px 80px rgba(37, 99, 235, 0.12);
    }

    .p-icon-large {
        width: 70px;
        height: 70px;
        background: #eff6ff;
        color: var(--primary-blue);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin-bottom: 25px;
        transition: 0.3s;
    }

    .partner-glass-card:hover .p-icon-large {
        background: var(--primary-blue);
        color: #fff;
        transform: rotateY(180deg);
    }

    .partner-glass-card h3 {
        font-size: 24px;
        color: #1e293b;
        margin: 0 0 12px 0;
    }

    .partner-glass-card h3 span {
        font-size: 14px;
        opacity: 0.5;
    }

    .partner-glass-card p {
        font-size: 14px;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .visit-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 800;
        font-size: 14px;
        transition: 0.3s;
    }

    .visit-btn:hover {
        gap: 15px;
    }

    /* Bottom Bar */
    .mega-bottom-bar {
        background: #ffffff;
        border-top: 1px solid #f1f5f9;
        position: relative;
    }

    .national-strip {
        display: flex;
        height: 6px;
        width: 100%;
    }

    .national-strip div {
        flex: 1;
    }

    .s1 {
        background: #800000;
    }

    .s2 {
        background: #FFD700;
    }

    .s3 {
        background: #006400;
    }

    .s4 {
        background: #FF8C00;
    }

    .bottom-inner {
        max-width: 1300px;
        margin: 0 auto;
        padding: 40px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        color: #94a3b8;
    }

    .sl-heart {
        font-weight: 800;
        color: #1e293b;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.5);
            opacity: 0.4;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Responsive */
    @media (max-width: 1100px) {
        .mega-container {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .mega-partners {
            grid-template-columns: 1fr;
        }

        .mega-description {
            margin: 15px auto;
        }

        .sl-pride-badge,
        .version-pill {
            margin: 10px auto;
        }

        .p-icon-large {
            margin: 0 auto 25px auto;
        }

        .bottom-inner {
            flex-direction: column;
            gap: 20px;
        }
    }
</style>
