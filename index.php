<?php include 'includes/header.php'; ?>

<style>
/* ===== FULL PAGE HERO FIX ===== */
.hero-section {
    position: relative;
    width: 100vw;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;

    height: 100vh;
    overflow: hidden;
}

/* Cinematic gradient overlay */
.hero-gradient {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        to bottom,
        rgba(0,0,0,0.60),
        rgba(0,0,0,0.20),
        rgba(0,0,0,0.60)
    );
    z-index: 2;
}

.hero-video {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: translate(-50%, -50%);
    filter: brightness(55%);
    z-index: 1;
}

.hero-content {
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    z-index: 10;
    width: 90%;
}

.hero-title {
    font-size: 4.3rem;
    font-weight: 800;
    text-shadow: 0 0 35px rgba(0, 180, 255, 0.9), 0px 8px 20px rgba(0,0,0,0.8);
    animation: fadeDown 1.4s ease-out forwards;
}

.hero-subtitle {
    font-size: 1.5rem;
    margin-top: 15px;
    animation: fadeUp 1.5s ease-out forwards;
}

.hero-slogan {
    font-size: 1.2rem;
    margin-top: 10px;
    font-style: italic;
    opacity: 0.85;
    animation: fadeUp 1.9s ease-out forwards;
}

/* Shop Now Button */
.hero-btn {
    background: linear-gradient(135deg, #00b4ff, #0077c2);
    border: none;
    padding: 14px 42px;
    font-size: 1.2rem;
    border-radius: 50px;
    margin-top: 25px;
    font-weight: 600;
    color: white;
    box-shadow: 0 0 18px rgba(0, 180, 255, 0.9);
    transition: 0.3s ease;
}

.hero-btn:hover {
    background: #0097e6;
    transform: translateY(-3px);
    box-shadow: 0 0 32px rgba(0, 180, 255, 1);
}

/* Animations */
@keyframes fadeDown { from {opacity: 0; transform: translateY(-40px);} to {opacity: 1; transform: translateY(0);} }
@keyframes fadeUp   { from {opacity: 0; transform: translateY(40px);}  to {opacity: 1; transform: translateY(0);} }

/* ===== PREMIUM CAROUSEL ===== */
.premium-carousel {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    margin-top: 20px;
    border-radius: 18px;
    overflow: hidden;
    backdrop-filter: blur(12px);
    background: rgba(255, 255, 255, 0.08);
    box-shadow: 0 0 25px rgba(0, 180, 255, 0.3);
}

.carousel-img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 18px;
    transition: transform 0.6s ease, filter 0.6s ease;
}

.carousel-item.active .carousel-img {
    transform: scale(1.03);
    filter: brightness(1.05);
}

/* Dots */
.carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(0, 180, 255, 0.6);
    transition: 0.3s ease;
}

.carousel-indicators .active {
    background-color: var(--tech-blue);
    box-shadow: 0 0 10px var(--tech-blue);
}

/* Arrow buttons */
.custom-arrow {
    width: 60px;
    height: 60px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    filter: drop-shadow(0px 0px 6px rgba(0, 180, 255, 0.9));
}
</style>

<!-- ===== HERO SECTION ===== -->
<div class="hero-section">
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="pics/hero.mp4" type="video/mp4">
    </video>
    <div class="hero-gradient"></div>

    <div class="hero-content">
        <h1 class="hero-title">TechZone</h1>
        <p class="hero-subtitle">Powering Your Digital Future</p>
        <p class="hero-slogan">One click away from building something innovative.</p>

        <a href="products.php" class="btn hero-btn">Shop Now</a>
    </div>
</div>

<div class="my-4"></div>

<!-- ===== PREMIUM CAROUSEL ===== -->
<div id="premiumCarousel" class="carousel slide premium-carousel" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#premiumCarousel" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#premiumCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#premiumCarousel" data-bs-slide-to="2"></button>
  </div>

  <button class="carousel-control-prev custom-arrow" type="button" data-bs-target="#premiumCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next custom-arrow" type="button" data-bs-target="#premiumCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>

<!-- ================= FEATURED PRODUCTS SECTION ================= -->
<style>
/* Title */
.featured-title {
    text-align: center;
    font-size: 2.6rem;
    font-weight: 700;
    margin-top: 60px;
    margin-bottom: 35px;
    color: var(--tech-blue);
    text-shadow: 0 0 12px rgba(0, 180, 255, 0.5);
}

/* Grid Layout */
.featured-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    padding: 0px 50px 50px 50px;
}

/* Product Card */
.featured-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(15px);
    border-radius: 18px;
    border: 1px solid rgba(0, 180, 255, 0.25);
    padding: 20px;
    text-align: center;
    box-shadow: 0px 10px 25px rgba(0, 180, 255, 0.18);
    transition: 0.3s ease-in-out;
}

.featured-card:hover {
    transform: translateY(-10px);
    box-shadow: 0px 14px 35px rgba(0, 180, 255, 0.4);
}

/* Product Images */
.featured-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 15px;
}

/* Name + Price */
.featured-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: white;
}

.featured-price {
    font-size: 1.1rem;
    margin-top: 6px;
    color: var(--tech-blue);
    font-weight: 700;
}

/* Button */
.featured-btn {
    margin-top: 12px;
    padding: 9px 22px;
    background: var(--tech-blue);
    border: none;
    color: white;
    font-weight: 600;
    border-radius: 25px;
    transition: 0.3s;
}

.featured-btn:hover {
    background: var(--tech-blue-dark);
}
</style>

<h2 class="featured-title">Shop Black Friday deals on select products</h2>

<div class="featured-grid">

    <!-- 1 -->
    <div class="featured-card">
        <img src="pics/laptop.jpeg">
        <div class="featured-name">Gaming Laptop 2025</div>
        <div class="featured-price">$1299</div>
        <a href="products.php" class="btn featured-btn">View</a>
    </div>

    <!-- 2 -->
    <div class="featured-card">
        <img src="pics/gpu.jpeg">
        <div class="featured-name">NVIDIA RTX Graphics Card</div>
        <div class="featured-price">$899</div>
        <a href="products.php" class="btn featured-btn">View</a>
    </div>

    <!-- 3 -->
    <div class="featured-card">
        <img src="pics/monitor.jpeg">
        <div class="featured-name">4K Ultra HD Monitor</div>
        <div class="featured-price">$299</div>
        <a href="products.php" class="btn featured-btn">View</a>
    </div>

    <!-- 4 -->
    <div class="featured-card">
        <img src="pics/keyboard.png">
        <div class="featured-name">RGB Mechanical Keyboard</div>
        <div class="featured-price">$99</div>
        <a href="products.php" class="btn featured-btn">View</a>
    </div>

    <!-- 5 -->
    <div class="featured-card">
        <img src="pics/pc.jpeg">
        <div class="featured-name">RGB Gaming PC Case</div>
        <div class="featured-price">$199</div>
        <a href="products.php" class="btn featured-btn">View</a>
    </div>


</div>

<!-- ================= CLEAN & SMALL INFO HIGHLIGHTS ================= -->
<style>
.info-section {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 15px 10px;       /* SMALLER HEIGHT */
    margin-top: 20px;
    background: linear-gradient(to right, #0b0f19, #12243d);
    border-top: 1px solid rgba(0, 180, 255, 0.15);
    border-bottom: 1px solid rgba(0, 180, 255, 0.15);
    color: white;
    flex-wrap: wrap;
}

.info-box {
    text-align: center;
    width: 160px;            
    margin: 5px;
}

.info-icon {
    font-size: 1.8rem;       /* SMALLER ICON */
    color: var(--tech-blue);
    text-shadow: 0px 0px 10px rgba(0, 180, 255, 0.5);
}

.info-text {
    font-size: 1rem;         /* SMALLER TEXT */
    margin-top: 6px;         /* LESS SPACING */
    opacity: 0.85;
    font-weight: 500;
}
</style>

<div class="info-section">

    <div class="info-box">
        <div class="info-icon">🚚</div>
        <div class="info-text">Fast Delivery</div>
    </div>

    <div class="info-box">
        <div class="info-icon">💳</div>
        <div class="info-text">Secure Payments</div>
    </div>

    <div class="info-box">
        <div class="info-icon">⭐</div>
        <div class="info-text">Top Rated</div>
    </div>

    <div class="info-box">
        <div class="info-icon">🔧</div>
        <div class="info-text">1-Year Warranty</div>
    </div>

</div>

<!-- ================= PREMIUM MODERN FOOTER ================= -->
<style>
/* FOOTER MAIN */
.footer-section {
    background: linear-gradient(to right, #0b0f19, #12243d);
    padding: 45px 40px 25px 40px;
    color: #d6e6ff;
    border-top: 1px solid rgba(0, 180, 255, 0.25);
}

.footer-columns {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1.5fr; 
    gap: 40px;
    align-items: start;
}


/* 2 Column Layout */
.footer-container {
    display: grid;
    grid-template-columns: 1.2fr 1fr; /* LEFT wider, right tighter */
    gap: 60px;  /* smaller gap */
}

/* LEFT PANEL (Quick Links + Support + Apps) */
.footer-left {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

/* SECTION HEADINGS */
.footer-left h4 {
    color: white;
    font-size: 1.25rem;
    margin-bottom: 10px;
}

/* LINKS */
.footer-left a {
    display: block;
    color: #d5eaff;
    text-decoration: none;
    margin-bottom: 6px;
    font-size: 1rem;
    transition: 0.3s ease;
}

.footer-left a:hover {
    color: var(--tech-blue);
    transform: translateX(6px);
}

/* RIGHT SIDE */
.footer-info-container {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    text-align: right;
    gap: 12px;
}

/* TechZone Title */
.footer-logo {
    font-size: 2rem;
    font-weight: 800;
    color: var(--tech-blue);
}

/* TechZone Description */
.footer-desc {
    font-size: 1rem;
    max-width: 280px;
    opacity: 0.85;
}

/* Follow Us */
.footer-social h4 {
    margin-top: 10px;
    font-size: 1.25rem;
}

.social-icons i {
    font-size: 1.7rem;
    margin-left: 12px;
    cursor: pointer;
    color: var(--tech-blue);
    transition: 0.3s ease;
}

.social-icons i:hover {
    color: white;
    transform: translateY(-5px);
}

/* Copyright */
.footer-bottom {
    text-align: center;
    margin-top: 35px;
    padding-top: 18px;
    border-top: 1px solid rgba(255,255,255,0.1);
    font-size: 0.9rem;
    color: #a7b7d4;
}

/* RESPONSIVE */
@media (max-width: 800px) {
    .footer-container {
        grid-template-columns: 1fr;
        text-align: center;
    }
    .footer-info-container {
        align-items: center;
        text-align: center;
    }
    .social-icons i {
        margin-left: 6px;
    }
}
</style>

<footer class="footer-section">
    <div class="footer-container">

        <!-- LEFT SIDE -->
        <div class="footer-left">
            
            <!-- QUICK LINKS -->
            <div class="footer-links">                          
                <h4>Quick Links</h4>
                <a href="index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="cart.php">Cart</a>
                <a href="login.php">Login</a>
                <a href="signup.php">Sign Up</a>
            </div>

            <!-- CUSTOMER SUPPORT -->
            <div class="footer-support">
                <h4>Customer Support</h4>
                <a href="#">Contact Us</a>
                <a href="#">Help Centre</a>
                <a href="#">Returns & Exchanges</a>
                <a href="#">Warranty & Repair</a>
            </div>

            <!-- MOBILE APPS -->
            <div class="footer-apps">
                <h4>Mobile Apps</h4>
                <a href="#">📱 Android App</a>
                <a href="#">🍏 iOS App</a>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="footer-info-container">
            <div class="footer-logo">TechZone</div>
            <p class="footer-desc">
                Your one-stop shop for premium computer hardware, gaming components, and tech essentials.
            </p>

            <div class="footer-social">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <i>📘</i>
                    <i>📸</i>
                    <i>🐦</i>
                    <i>▶️</i>
                </div>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        © 2025 TechZone. All rights reserved.
    </div>
</footer>
