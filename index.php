<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation with Profile Dropdown</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <link rel="stylesheet" href="css\about.css">
    <link rel="stylesheet" href="css\index.css">
    <style>
        /* Toggle Buttons */
        .theme-btn,
        .accessibility-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            transition: all 0.3s ease;
            background: var(--first-color-lighten, #f0f0f0);
            color: var(--title-color, #333);
            margin-right: 15px;
        }

        .theme-btn:hover,
        .accessibility-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* Dark Mode Variables */
        :root {
            --body-color: #ffffff;
            --text-color: #333333;
            --title-color: #1a1a1a;
            --first-color: #003153;
            --first-color-lighten: #f0f0f0;
            --container-color: #ffffff;
            --border-color: #e0e0e0;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --card-bg: #ffffff;
            --hero-bg: #f8f9fa;
            --btn-color: #003153;
        }

        [data-theme="dark"] {
            --body-color: #1a1a1a;
            --text-color: #e0e0e0;
            --title-color: #ffffff;
            --first-color: #white;
            --first-color-lighten: #2d2d2d;
            --container-color: #252525;
            --border-color: #404040;
            --shadow-color: rgba(255, 255, 255, 0.1);
            --card-bg: #2d2d2d;
            --hero-bg: #1a1a1a;
            --btn-color: white;
        }

        /* High Contrast Mode */
        [data-contrast="high"] {
            filter: contrast(1.2) brightness(1.1);
        }

        [data-theme="dark"][data-contrast="high"] {
            filter: contrast(1.3) brightness(0.9);
        }

        /* Apply theme to body and common elements */
        body {
            background-color: var(--body-color) !important;
            color: var(--text-color) !important;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        html, body{
            min-width: 400px;
        }

        h1{
            color: white !important;
        }

        .header {
            background-color: var(--container-color) !important;
            box-shadow: 0 2px 8px var(--shadow-color) !important;
        }

        .nav__logo {
            color: var(--title-color) !important;
        }

        .nav__name {
            color: var(--text-color) !important;
        }

        .nav__icon {
            color: var(--text-color) !important;
        }

        .nav__menu {
            background-color: var(--container-color) !important;
        }

        /* Hero Section */
        .atf_40 {
            background-color: var(--hero-bg) !important;
        }

        .text-blk.title {
            color: white !important;
        }

        .text-blk.heading {
            color: white !important;
        }

        .responsive-container-block.bg {
            background-color: var(--container-color) !important;
        }

        .responsive-container-block.big-cont {
            background-color: transparent !important;
        }

        .responsive-container-block.blue {
            display: none !important;
        }

          .responsive-container-block.bg {
            background-color: transparent !important;
        }

        /* About Section */
        .about-section {
            background-color: var(--body-color) !important;
        }

        .about-subtitle {
            color: var(--first-color) !important;
        }

        .about-title {
            color: var(--title-color) !important;
        }

        .about-description {
            color: var(--text-color) !important;
        }

        .stat-card {
            background-color: var(--card-bg) !important;
            border: 1px solid var(--border-color) !important;
        }

        .stat-number {
            color: var(--title-color) !important;
        }

        .stat-label {
            color: var(--text-color) !important;
        }

        /* Carousel Cards */
        .containerx article {
            background-color: var(--card-bg) !important;
            border: 1px solid var(--border-color) !important;
        }

        .containerx article h3 {
            color: black!important;
        }

        .containerx article p {
            color: black !important;
        }

        /* Carousel Slides */
        .slides {
            background-color: var(--body-color) !important;
        }

        .slideTitle {
            color: var(--title-color) !important;
        }

        .slideSubtitle,
        .slideDescription {
            color: var(--text-color) !important;
        }

        .slides button {
            background-color: var(--container-color) !important;
            color: var(--text-color) !important;
            border: 1px solid var(--border-color) !important;
        }

        /* Footer Styles */
        .footer {
            background-color: var(--container-color) !important;
            color: var(--text-color) !important;
        }

        .footer__title,
        .footer__logo span {
            color: var(--title-color) !important;
        }

        .footer__description,
        .footer__link {
            color: var(--text-color) !important;
        }

        .footer__copyright {
            color: var(--text-color) !important;
        }

        .footer__social-link {
            color: var(--text-color) !important;
        }

        .dropdown-menu {
            background-color: var(--container-color) !important;
            border-color: var(--border-color) !important;
            box-shadow: 0 4px 12px var(--shadow-color) !important;
        }

        .dropdown-item {
            color: var(--text-color) !important;
        }

        .dropdown-item:hover {
            background-color: var(--first-color-lighten) !important;
        }

        .btn-secondary{
            /* color: #003153; */
            color: var(--btn-color) !important;
        }


        /* Mobile responsiveness for buttons */
        @media screen and (max-width: 768px) {
            .theme-btn,
            .accessibility-btn {
                width: 35px;
                height: 35px;
                font-size: 1rem;
                margin-right: 10px;
            }
        }

        /* Skip link for accessibility */
        .skip-link {
            position: absolute;
            top: -40px;
            left: 0;
            background: var(--first-color);
            color: white;
            padding: 8px;
            text-decoration: none;
            z-index: 100;
        }

        .skip-link:focus {
            top: 0;
        }

        /* Hamburger Menu Toggle */
        .nav__toggle {
            display: none;
            font-size: 1.5rem;
            color: var(--title-color);
            cursor: pointer;
            transition: color 0.3s;
        }

        @media screen and (max-width: 768px) {
            .nav__toggle {
                display: block;
            }

            .nav__menu {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 100%;
                background-color: var(--container-color);
                padding: 2rem 0;
                transition: left 0.3s;
                box-shadow: 0 4px 12px var(--shadow-color);
            }

            .nav__menu.show-menu {
                left: 0;
            }

            .nav__list {
                flex-direction: column;
                gap: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Skip to main content link for keyboard users -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <header class="header" id="header">
        <nav class="nav container" aria-label="Main navigation"> 
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>

            <a href="index.php" class="nav__logo">VolunTribe</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link" aria-current="page">
                            <i class='bx bx-home-alt nav__icon' aria-hidden="true"></i>
                            <span class="nav__name">Home</span>
                        </a>
                    </li>
                    
                    <li class="nav__item">
                        <a href="about.php" class="nav__link">
                            <i class='bx bx-user nav__icon'></i>
                            <span class="nav__name">About</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="event.php" class="nav__link">
                            <i class='bx bx-book-alt nav__icon'></i>
                            <span class="nav__name">Events</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="gallery.php" class="nav__link">
                            <i class='bx bx-briefcase-alt nav__icon'></i>
                            <span class="nav__name">Gallery</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="contact.php" class="nav__link">
                            <i class='bx bx-message-square-detail nav__icon'></i>
                            <span class="nav__name">Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Dark Mode & Accessibility Toggle -->
            <div style="display: flex; align-items: center;">
                <!-- Dark Mode Toggle Button -->
                <button class="theme-btn" id="theme-toggle" aria-label="Toggle dark mode" aria-pressed="false">
                    <i class='bx bx-moon' aria-hidden="true"></i>
                </button>

                <!-- Accessibility Toggle Button -->
                <button class="accessibility-btn" id="accessibility-toggle" aria-label="Toggle high contrast mode" aria-pressed="false">
                    <i class='bx bx-low-vision' aria-hidden="true"></i>
                </button>

                <!-- Profile Dropdown -->
                <div class="profile-dropdown">
                    <button id="profile-toggle" aria-label="User profile menu" aria-expanded="false" aria-haspopup="true" style="background: none; border: none; cursor: pointer; padding: 0;">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&h=100&fit=crop" alt="User profile" class="nav__img">
                    </button>
                    <div class="dropdown-menu" id="dropdown-menu" role="menu" aria-labelledby="profile-toggle">
                        <a href="profile.php" class="dropdown-item" role="menuitem">
                            <i class='bx bx-user' aria-hidden="true"></i>
                            <span>Profile</span>
                        </a>
                        <a href="logout.php" class="dropdown-item" role="menuitem">
                            <i class='bx bx-log-out' aria-hidden="true"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main id="main-content">
        <section class="atf_40" aria-labelledby="hero-heading">
            <div class="responsive-container-block big-cont">
                <div class="responsive-container-block blue" aria-hidden="true"></div>
                <div class="responsive-container-block bg">
                    <h1 id="hero-heading" class="text-blk title">
                        Together, We Build a Better Tomorrow.
                    </h1>
                    <p class="text-blk heading">
                        We connect passionate volunteers with meaningful causes, empowering ordinary people to make extraordinary impact.        
                    </p>
                    <div class="form-blk">
                        <a class="text-blk button" style="text-decoration:none; background-color:#3e8fde;" href="event.php" role="button">
                            Explore Our Events
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section" aria-labelledby="about-heading">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <span class="about-subtitle">Who We Are?</span>
                        <h2 id="about-heading" class="about-title">We're a movement.</h2>
                        <p class="about-description">
                            VolunTribe is India’s first community-powered volunteering platform where passionate individuals come together to share their time, skills, and compassion to create real impact.
                            From supporting local causes to uplifting communities, VolunTribe connects people with opportunities that inspire purpose, unity, and positive change.
                        </p>
                        <p class="about-description">
                            Since 2025, we’ve been building a soulful network of verified volunteers and organizations across India — making community service more accessible, impactful, and meaningful.

                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-icon">🎯</div>
                                <div class="stat-content">
                                    <h3 class="stat-number">4,200+</h3>
                                    <p class="stat-label">Curated volunteering projects</p>
                                </div>
                                
                            </div>

                            <div class="stat-card">
                                <div class="stat-icon">⭐</div>
                                <div class="stat-content">
                                    <h3 class="stat-number">73+</h3>
                                    <p class="stat-label">Skilled Members</p>
                                </div>
                            </div>

                            <div class="stat-card">
                                <div class="stat-icon">🎒</div>
                                <div class="stat-content">
                                    <h3 class="stat-number">6 lakh+</h3>
                                    <p class="stat-label">Community of Volunteers</p>
                                </div>
                            </div>

                            <div class="stat-card">
                                <div class="stat-icon">🏔️</div>
                                <div class="stat-content">
                                    <h3 class="stat-number">45+</h3>
                                    <p class="stat-label">Places We Covered</p>
                                </div>
                            </div>
                        </div>

                        <div class="about-buttons">
                            <button class="btn-primary"  onclick="window.location.href='about.php';">Know More →</button>
                            <button class="btn-secondary" onclick="window.location.href='event.php';">Events</button>
                        </div>
                    </div>

                    <div class="about-images">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400&h=300&fit=crop" alt="Community" class="about-img about-img-1">
                        <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?w=400&h=300&fit=crop" alt="Travel" class="about-img about-img-2">
                    </div>
                </div>
            </div>
        </section>

        <!-- Hero Carousel Section -->
        <section class="hero-carousel">
            <div id="carousel-app"></div>
        </section>

        <section class="about-section py-10 bg-gray-50">
            <div class="containerx flex gap-6 overflow-x-auto px-6" id="infiniteScroll--left">

                <article class="flex-shrink-0 w-80 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="wrapper">
                    <div class="img">
                    <img src="./src/images/img1.jpg"
                        alt="Beach Cleanup Drive"
                        class="w-full h-48 object-cover">
                    </div>
                    <div class="content p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Beach Cleanup Drive</h3>
                    <p class="text-sm text-gray-600">Volunteers gathered to clean 5 km of coastline and promote ocean awareness.</p>
                    </div>
                </div>
                </article>

                <article class="flex-shrink-0 w-80 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="wrapper">
                    <div class="img">
                    <img src="./src/images/img2.jpg"
                        alt="Tree Plantation Campaign"
                        class="w-full h-48 object-cover">
                    </div>
                    <div class="content p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Tree Plantation Campaign</h3>
                    <p class="text-sm text-gray-600">Over 300 saplings were planted around the community park.</p>
                    </div>
                </div>
                </article>

                <article class="flex-shrink-0 w-80 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="wrapper">
                    <div class="img">
                    <img src="./src/images/img3.jpg"
                        alt="Blood Donation Camp"
                        class="w-full h-48 object-cover">
                    </div>
                    <div class="content p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Blood Donation Camp</h3>
                    <p class="text-sm text-gray-600">Organized at MIT Campus with 120+ donors supporting healthcare.</p>
                    </div>
                </div>
                </article>

                <article class="flex-shrink-0 w-80 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="wrapper">
                    <div class="img">
                    <img src="./src/images/img4.jpg"
                        alt="Rural Education Program"
                        class="w-full h-48 object-cover">
                    </div>
                    <div class="content p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Rural Education Program</h3>
                    <p class="text-sm text-gray-600">Volunteers taught children basic math and computer literacy.</p>
                    </div>
                </div>
                </article>

                <article class="flex-shrink-0 w-80 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="wrapper">
                    <div class="img">
                    <img src="./src/images/img5.jpg"
                        alt="Food Donation Drive"
                        class="w-full h-48 object-cover">
                    </div>
                    <div class="content p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Food Donation Drive</h3>
                    <p class="text-sm text-gray-600">Over 500 meal packs distributed to low-income families.</p>
                    </div>
                </div>
                </article>

            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer__container container">
                <div class="footer__content">
                    <div class="footer__info">
                        <div class="footer__logo">
                            <i class='bx bx-grid-alt'></i>
                            <span>VolunTribe</span>
                        </div>

                        <p class="footer__description">
                            VolunTribe is a platform that connects volunteers and organizations to make meaningful social impact together. 
                        </p>

                        <p class="footer__description">
                            Join hands with VolunTribe to build communities, empower change, and create a better tomorrow through volunteering.
                        </p>

                    </div>

                    <div class="footer__links">
                        <div class="footer__column">
                            <h3 class="footer__title">Quick Links</h3>
                            <ul class="footer__list">
                                <li><a href="index.php" class="footer__link">Home</a></li>
                                <li><a href="about.php" class="footer__link">About</a></li>
                                <li><a href="event.php" class="footer__link">Events</a></li>
                                <li><a href="gallery.php" class="footer__link">Gallery</a></li>
                            </ul>
                        </div>

                        <div class="footer__column">
                            <h3 class="footer__title">Connect</h3>
                            <ul class="footer__list">
                                <li><a href="login.php" class="footer__link">Login</a></li>
                                <li><a href="register.php" class="footer__link">Register</a></li>
                                <li><a href="contact.php" class="footer__link">Contact Us</a></li>
                            </ul>
                        </div>

                        <div class="footer__map">
                            <h3 class="footer__title">Our Location</h3>
                            <div class="map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7763.927438756527!2d74.78482487609999!3d13.352532100000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbca4a7d2c4edb7%3A0x8d588d4fb81d861f!2sManipal%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1761484628724!5m2!1sen!2sin" width="300" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer__bottom">
                    <p class="footer__copyright">© Copyright 2025 VolunTribe. All rights reserved.</p>
                    <div class="footer__social">
                        <a href="#" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                        <a href="#" class="footer__social-link"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="footer__social-link"><i class='bx bxl-facebook'></i></a>
                    </div>
                </div>
            </div>
        </footer>

        <script src ="js\script.js"></script>
        <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
        <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
        <script>
            // Hamburger Menu Toggle
            const navToggle = document.getElementById('nav-toggle');
            const navMenu = document.getElementById('nav-menu');

            navToggle.addEventListener('click', () => {
                navMenu.classList.toggle('show-menu');
                const icon = navToggle.querySelector('i');
                
                if (navMenu.classList.contains('show-menu')) {
                    icon.classList.remove('bx-menu');
                    icon.classList.add('bx-x');
                } else {
                    icon.classList.remove('bx-x');
                    icon.classList.add('bx-menu');
                }
            });

            // Close menu when clicking on a link
            const navLinks = document.querySelectorAll('.nav__link');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    navMenu.classList.remove('show-menu');
                    const icon = navToggle.querySelector('i');
                    icon.classList.remove('bx-x');
                    icon.classList.add('bx-menu');
                    
                    // Update active link
                    navLinks.forEach(l => l.classList.remove('active-link'));
                    link.classList.add('active-link');
                });
            });

            // Profile Dropdown Toggle
            const profileToggle = document.getElementById('profile-toggle');
            const dropdownMenu = document.getElementById('dropdown-menu');

            profileToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = dropdownMenu.classList.toggle('show');
                profileToggle.setAttribute('aria-expanded', isOpen);
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!profileToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });

            // Close dropdown when clicking a menu item
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', () => {
                    dropdownMenu.classList.remove('show');
                });
            });

            // ===== DARK MODE FUNCTIONALITY =====
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = themeToggle.querySelector('i');

            // Load saved theme preference
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
            updateThemeIcon(savedTheme);

            // Toggle theme on button click
            themeToggle.addEventListener('click', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                document.documentElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateThemeIcon(newTheme);
            });

            // Update icon based on theme
            function updateThemeIcon(theme) {
                if (theme === 'dark') {
                    themeIcon.classList.remove('bx-moon');
                    themeIcon.classList.add('bx-sun');
                } else {
                    themeIcon.classList.remove('bx-sun');
                    themeIcon.classList.add('bx-moon');
                }
            }

            // ===== ACCESSIBILITY (HIGH CONTRAST) FUNCTIONALITY =====
            const accessibilityToggle = document.getElementById('accessibility-toggle');

            // Load saved contrast preference
            const savedContrast = localStorage.getItem('contrast') || 'normal';
            document.documentElement.setAttribute('data-contrast', savedContrast);

            // Toggle contrast on button click
            accessibilityToggle.addEventListener('click', () => {
                const currentContrast = document.documentElement.getAttribute('data-contrast');
                const newContrast = currentContrast === 'high' ? 'normal' : 'high';
                
                document.documentElement.setAttribute('data-contrast', newContrast);
                localStorage.setItem('contrast', newContrast);
            });

            // Hero Carousel React Component
            const slides = [
                {
                    
                    image: "./src/images/ev1.jpg"
                },
                {
                    
                    image: "./src/images/ev2.jpg"
                },
                {
                    
                    image: "./src/images/ev3.jpg"
                },
                {
                    
                    image: "./src/images/ev4.jpg"
                },
                {
                    
                    image: "./src/images/ev5.jpg"
                }
            ];

            function useTilt(active) {
                const ref = React.useRef(null);

                React.useEffect(() => {
                    if (!ref.current || !active) {
                        return;
                    }

                    const state = {
                        rect: undefined,
                        mouseX: undefined,
                        mouseY: undefined
                    };

                    let el = ref.current;

                    const handleMouseMove = (e) => {
                        if (!el) {
                            return;
                        }
                        if (!state.rect) {
                            state.rect = el.getBoundingClientRect();
                        }
                        state.mouseX = e.clientX;
                        state.mouseY = e.clientY;
                        const px = (state.mouseX - state.rect.left) / state.rect.width;
                        const py = (state.mouseY - state.rect.top) / state.rect.height;

                        el.style.setProperty("--px", px);
                        el.style.setProperty("--py", py);
                    };

                    el.addEventListener("mousemove", handleMouseMove);

                    return () => {
                        el.removeEventListener("mousemove", handleMouseMove);
                    };
                }, [active]);

                return ref;
            }

            const initialState = {
                slideIndex: 0
            };

            const slidesReducer = (state, event) => {
                if (event.type === "NEXT") {
                    return {
                        ...state,
                        slideIndex: (state.slideIndex + 1) % slides.length
                    };
                }
                if (event.type === "PREV") {
                    return {
                        ...state,
                        slideIndex: state.slideIndex === 0 ? slides.length - 1 : state.slideIndex - 1
                    };
                }
            };

            function Slide({ slide, offset }) {
                const active = offset === 0 ? true : null;
                const ref = useTilt(active);

                return React.createElement(
                    "div",
                    {
                        ref: ref,
                        className: "slide",
                        "data-active": active,
                        style: {
                            "--offset": offset,
                            "--dir": offset === 0 ? 0 : offset > 0 ? 1 : -1
                        }
                    },
                    React.createElement("div", {
                        className: "slideBackground",
                        style: {
                            backgroundImage: `url('${slide.image}')`
                        }
                    }),
                    React.createElement(
                        "div",
                        {
                            className: "slideContent",
                            style: {
                                backgroundImage: `url('${slide.image}')`
                            }
                        },
                        React.createElement(
                            "div",
                            { className: "slideContentInner" },
                            // Removed empty heading/text elements to fix WAVE accessibility errors
                            // The carousel now shows only the background images
                            null
                        )
                    )
                );
            }

            function CarouselApp() {
                const [state, dispatch] = React.useReducer(slidesReducer, initialState);

                return React.createElement(
                    "div",
                    { className: "slides" },
                    React.createElement("button", { onClick: () => dispatch({ type: "PREV" }) }, "‹"),
                    [...slides, ...slides, ...slides].map((slide, i) => {
                        let offset = slides.length + (state.slideIndex - i);
                        return React.createElement(Slide, { slide: slide, offset: offset, key: i });
                    }),
                    React.createElement("button", { onClick: () => dispatch({ type: "NEXT" }) }, "›")
                );
            }

            const carouselRoot = ReactDOM.createRoot(document.getElementById("carousel-app"));
            carouselRoot.render(React.createElement(CarouselApp));

            const scrollContainers = document.querySelectorAll("#infiniteScroll--left");

            scrollContainers.forEach((container) => {
                const scrollWidth = container.scrollWidth;
                let isScrollingPaused = false;

                window.addEventListener("load", () => {
                    self.setInterval(() => {
                        if (isScrollingPaused) {
                            return;
                        }
                        const first = container.querySelector("article");

                        if (!isElementInViewport(first)) {
                            container.appendChild(first);
                            container.scrollTo(container.scrollLeft - first.offsetWidth, 0);
                        }
                        if (container.scrollLeft !== scrollWidth) {
                            container.scrollTo(container.scrollLeft + 1, 0);
                        }
                    }, 15);
                });

                function isElementInViewport(el) {
                    var rect = el.getBoundingClientRect();
                    return rect.right > 0;
                }

                function pauseScrolling() {
                    isScrollingPaused = true;
                }

                function resumeScrolling() {
                    isScrollingPaused = false;
                }
                const allArticles = container.querySelectorAll("article");
                for (let article of allArticles) {
                    article.addEventListener("mouseenter", pauseScrolling);
                    article.addEventListener("mouseleave", resumeScrolling);
                }
            });
        </script>
    </body>
</html>