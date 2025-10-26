<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation with Profile Dropdown</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #fff;
            min-height: 100vh;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            position: relative;
        }

        .nav__logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
            text-decoration: none;
        }

        .nav__menu {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .nav__list {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav__link {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
            padding: 0.5rem;
        }

        .nav__link:hover,
        .nav__link.active-link {
            color: #667eea;
        }

        .nav__icon {
            font-size: 1.5rem;
        }

        .nav__name {
            font-size: 0.875rem;
        }

        /* Hamburger Menu */
        .nav__toggle {
            display: none;
            font-size: 1.5rem;
            color: #667eea;
            cursor: pointer;
        }

        /* Profile Dropdown Styles */
        .profile-dropdown {
            position: relative;
        }

        .nav__img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.3s;
            object-fit: cover;
            border: 2px solid #667eea;
        }

        .nav__img:hover {
            transform: scale(1.1);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 180px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
        }

        .dropdown-item:first-child {
            border-radius: 8px 8px 0 0;
        }

        .dropdown-item:last-child {
            border-radius: 0 0 8px 8px;
        }

        .dropdown-item:hover {
            background: #f5f5f5;
        }

        .dropdown-item i {
            font-size: 1.2rem;
            color: #667eea;
        }

        .dropdown-item span {
            font-size: 0.95rem;
        }

        /* Demo Content */
        .demo-content {
            text-align: center;
            color: white;
            padding: 2rem;
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .demo-content h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .demo-content p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Footer Styles */
        .footer {
            background: #f8f9fa;
            padding: 4rem 0 2rem;
            color: #666;
        }

        .footer__container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .footer__content {
            display: grid;
            grid-template-columns: 1.5fr 2fr;
            gap: 4rem;
            margin-bottom: 3rem;
        }

        .footer__info {
            max-width: 400px;
        }

        .footer__logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .footer__logo i {
            font-size: 2rem;
            color: #667eea;
        }

        .footer__logo span {
            font-size: 1.25rem;
            font-weight: 700;
            color: #333;
        }

        .footer__description {
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            color: #666;
        }

        .footer__links {
            display: grid;
            grid-template-columns: 1fr 1fr 1.5fr;
            gap: 2rem;
        }

        .footer__title {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1.25rem;
        }

        .footer__list {
            list-style: none;
        }

        .footer__list li {
            margin-bottom: 0.75rem;
        }

        .footer__link {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer__link:hover {
            color: #667eea;
        }

        .footer__map {
            grid-column: span 1;
        }

        .map-container {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .map-container iframe {
            display: block;
        }

        .footer__bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 2rem;
            border-top: 1px solid #e0e0e0;
        }

        .footer__copyright {
            font-size: 0.85rem;
            color: #999;
        }

        .footer__social {
            display: flex;
            gap: 1rem;
        }

        .footer__social-link {
            color: #999;
            font-size: 1.25rem;
            transition: color 0.3s;
        }

        .footer__social-link:hover {
            color: #667eea;
        }

        /* About Section Styles */
        .about-section {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-subtitle {
            color: #ffc107;
            font-size: 0.95rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .about-title {
            font-size: 2.5rem;
            color: #2c3e50;
            margin: 1rem 0 1.5rem;
            line-height: 1.2;
        }

        .about-title .highlight {
            color: #2c3e50;
            font-weight: 700;
        }

        .about-description {
            color: #6c757d;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin: 2rem 0;
        }

        .stat-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 1rem;
            align-items: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            font-size: 2rem;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #6c757d;
            margin: 0.25rem 0 0;
        }

        .about-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-primary {
            background: #ffc107;
            color: #000;
            border: none;
            padding: 0.9rem 1.8rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background: #ffb300;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: #2c3e50;
            border: 2px solid #e0e0e0;
            padding: 0.9rem 1.8rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            border-color: #2c3e50;
            background: #f8f9fa;
        }

        .about-images {
            position: relative;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            height: 500px;
        }

        .about-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .about-img-1 {
            grid-row: 1 / 2;
            margin-top: 2rem;
        }

        .about-img-2 {
            grid-row: 1 / 2;
            margin-top: 4rem;
        }

        .sun-decoration {
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            background: #ffc107;
            border-radius: 50%;
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.6);
            z-index: 1;
        }

        .sun-decoration::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(255, 193, 7, 0.3), transparent);
            border-radius: 50%;
        }

        /* Hero Carousel Styles */
        .hero-carousel {
            height: 80vh;
            width: 100%;
            max-width: 1400px;
            margin: 2rem auto;
            background: #151515;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .slides {
            display: grid;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .slides > .slide {
            grid-area: 1 / -1;
        }

        .slides > button {
            appearance: none;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            color: white;
            position: absolute;
            font-size: 3rem;
            width: 4rem;
            height: 4rem;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s;
            opacity: 0.8;
            z-index: 5;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slides > button:hover {
            opacity: 1;
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-50%) scale(1.1);
        }

        .slides > button:focus {
            outline: none;
        }

        .slides > button:first-child {
            left: -30rem;
        }

        .slides > button:last-child {
            right: -30rem;
        }

        .slideContent {
            width: 30vw;
            height: 40vw;
            max-width: 400px;
            max-height: 500px;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            transition: transform 0.5s ease-in-out;
            opacity: 0.7;
            display: grid;
            align-content: center;
            transform-style: preserve-3d;
            transform: perspective(1000px) translateX(calc(100% * var(--offset)))
                rotateY(calc(-45deg * var(--dir)));
            border-radius: 12px;
            overflow: hidden;
        }

        .slideContentInner {
            transform-style: preserve-3d;
            transform: translateZ(2rem);
            transition: opacity 0.3s linear;
            text-shadow: 0 0.1rem 1rem #000;
            opacity: 0;
            padding: 2rem;
        }

        .slideSubtitle,
        .slideTitle {
            font-size: 2rem;
            font-weight: normal;
            letter-spacing: 0.2ch;
            text-transform: uppercase;
            margin: 0;
            color: #fff;
        }

        .slideSubtitle::before {
            content: "— ";
        }

        .slideDescription {
            margin: 0;
            font-size: 0.8rem;
            letter-spacing: 0.2ch;
            color: #fff;
        }

        .slideBackground {
            position: absolute;
            top: -10%;
            left: -10%;
            right: -10%;
            bottom: -10%;
            background-size: cover;
            background-position: center center;
            z-index: 0;
            opacity: 0;
            transition: opacity 0.3s linear, transform 0.3s ease-in-out;
            pointer-events: none;
            transform: translateX(calc(10% * var(--dir)));
            filter: blur(20px);
        }

        .slide[data-active] {
            z-index: 2;
            pointer-events: auto;
        }

        .slide[data-active] .slideBackground {
            opacity: 0.3;
            transform: none;
        }

        .slide[data-active] .slideContentInner {
            opacity: 1;
        }

        .slide[data-active] .slideContent {
            --x: calc(var(--px) - 0.5);
            --y: calc(var(--py) - 0.5);
            opacity: 1;
            transform: perspective(1000px);
        }

        .slide[data-active] .slideContent:hover {
            transition: none;
            transform: perspective(1000px) rotateY(calc(var(--x) * 45deg))
                rotateX(calc(var(--y) * -45deg));
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .nav__toggle {
                display: block;
                order: 1;
            }

            .nav__logo {
                order: 2;
            }

            .nav__menu {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 100%;
                background: #fff;
                padding: 2rem 0;
                transition: left 0.4s;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            .nav__menu.show-menu {
                left: 0;
            }

            .nav__list {
                flex-direction: column;
                gap: 1.5rem;
            }

            .nav__link {
                flex-direction: row;
                gap: 0.75rem;
                padding: 0.75rem 1.5rem;
                width: 100%;
                justify-content: flex-start;
            }

            .nav__name {
                font-size: 1rem;
            }

            .nav__icon {
                font-size: 1.5rem;
            }

            .profile-dropdown {
                order: 3;
            }

            .nav__img {
                width: 40px;
                height: 40px;
            }

            .dropdown-menu {
                right: -10px;
            }

            /* Footer Responsive */
            .footer__content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer__links {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }

            .footer__map {
                grid-column: span 2;
            }

            .footer__bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            .hero-carousel {
                height: 30vh;
                margin: 0rem;
                /* border-radius: 12px; */
            }
            .slides > button:first-child {
                left: -8rem;
            }

            .slides > button:last-child {
                right: -8rem;
            }
        }

        @media screen and (max-width: 400px) {
            .demo-content h1 {
                font-size: 1.8rem;
            }

            .demo-content p {
                font-size: 1rem;
            }

            .footer__links {
                grid-template-columns: 1fr;
            }

            .footer__map {
                grid-column: span 1;
            }

            /* About Section Responsive */
            .about-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .about-title {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .about-buttons {
                flex-direction: column;
            }

            .about-images {
                height: 400px;
            }

            .about-img-1,
            .about-img-2 {
                margin-top: 0;
            }

            /* Carousel Responsive */
            .hero-carousel {
                height: 60vh;
                margin: 0rem;
                /* border-radius: 12px; */
            }

            .slides > button:first-child {
                left: 0.5rem;
            }

            .slides > button:last-child {
                right: 0.5rem;
            }

            .slides > button {
                font-size: 2rem;
                width: 3rem;
                height: 3rem;
            }

            .slideContent {
                width: 60vw;
                height: 70vw;
                max-width: 300px;
                max-height: 400px;
            }

            .slideTitle {
                font-size: 1.5rem;
            }

            .slideSubtitle {
                font-size: 1.2rem;
            }
            .slides > button:first-child {
                left: -8rem;
            }

            .slides > button:last-child {
                right: -8rem;
            }
        }
    </style>
</head>
<body>
    <header class="header" id="header">
        <nav class="nav container">
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>

            <a href="#" class="nav__logo">Marlon</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">
                            <i class='bx bx-home-alt nav__icon'></i>
                            <span class="nav__name">Home</span>
                        </a>
                    </li>
                    
                    <li class="nav__item">
                        <a href="#about" class="nav__link">
                            <i class='bx bx-user nav__icon'></i>
                            <span class="nav__name">About</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#skills" class="nav__link">
                            <i class='bx bx-book-alt nav__icon'></i>
                            <span class="nav__name">Events</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#portfolio" class="nav__link">
                            <i class='bx bx-briefcase-alt nav__icon'></i>
                            <span class="nav__name">Gallery</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#contactme" class="nav__link">
                            <i class='bx bx-message-square-detail nav__icon'></i>
                            <span class="nav__name">Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Profile Dropdown -->
            <div class="profile-dropdown">
                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&h=100&fit=crop" alt="Profile" class="nav__img" id="profile-toggle">
                <div class="dropdown-menu" id="dropdown-menu">
                    <a href="#profile" class="dropdown-item">
                        <i class='bx bx-user'></i>
                        <span>Profile</span>
                    </a>
                    <a href="#logout" class="dropdown-item">
                        <i class='bx bx-log-out'></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="demo-content">
        <h1>Navigation with Profile Dropdown</h1>
        <p>Click on the profile picture to see the dropdown menu!</p>
        <p style="margin-top: 1rem; font-size: 1rem;">📱 Resize your browser to see the hamburger menu in action</p>
    </div>

    <!-- Hero Carousel Section -->
    <section class="hero-carousel">
        <div id="carousel-app"></div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <span class="about-subtitle">Who We Are?</span>
                    <h2 class="about-title">We're not a travel company. <span class="highlight">We're a movement.</span></h2>
                    <p class="about-description">
                        Volunteer Yatra is India's first community-powered platform where travelers exchange their time and skills for safe stays, home-cooked meals, and something far bigger—real stories, real people, and a sense of purpose.
                    </p>
                    <p class="about-description">
                        Since 2021, we've been building a soulful network of verified hosts and volunteers across India—making travel more human, affordable, and meaningful.
                    </p>

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
                                <p class="stat-label">Skills</p>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon">🎒</div>
                            <div class="stat-content">
                                <h3 class="stat-number">6 lakh+</h3>
                                <p class="stat-label">Community of Travelers</p>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon">🏔️</div>
                            <div class="stat-content">
                                <h3 class="stat-number">45+</h3>
                                <p class="stat-label">Touristic Places</p>
                            </div>
                        </div>
                    </div>

                    <div class="about-buttons">
                        <button class="btn-primary">Know More →</button>
                        <button class="btn-secondary">▶ Watch Video</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer__container container">
            <div class="footer__content">
                <div class="footer__info">
                    <div class="footer__logo">
                        <i class='bx bx-grid-alt'></i>
                        <span>COMPANY</span>
                    </div>
                    <p class="footer__description">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                    </p>
                    <p class="footer__description">
                        Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    </p>
                </div>

                <div class="footer__links">
                    <div class="footer__column">
                        <h3 class="footer__title">Category</h3>
                        <ul class="footer__list">
                            <li><a href="#" class="footer__link">News</a></li>
                            <li><a href="#" class="footer__link">World</a></li>
                            <li><a href="#" class="footer__link">Games</a></li>
                            <li><a href="#" class="footer__link">References</a></li>
                        </ul>
                    </div>

                    <div class="footer__column">
                        <h3 class="footer__title">Business</h3>
                        <ul class="footer__list">
                            <li><a href="#" class="footer__link">Web</a></li>
                            <li><a href="#" class="footer__link">eCommerce</a></li>
                            <li><a href="#" class="footer__link">Business</a></li>
                            <li><a href="#" class="footer__link">Entertainment</a></li>
                            <li><a href="#" class="footer__link">Portfolio</a></li>
                        </ul>
                    </div>

                    <div class="footer__map">
                        <h3 class="footer__title">Our Location</h3>
                        <div class="map-container">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30596073366!2d-74.25986548248684!3d40.69714941932609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1635859405498!5m2!1sen!2sin" 
                                width="100%" 
                                height="200" 
                                style="border:0; border-radius: 8px;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer__bottom">
                <p class="footer__copyright">© Copyright 2020 Lorem Inc. All rights reserved.</p>
                <div class="footer__social">
                    <a href="#" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="footer__social-link"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social-link"><i class='bx bxl-facebook'></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Hamburger Menu Toggle
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');

        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('show-menu');
            // Change icon
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
            dropdownMenu.classList.toggle('show');
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

        // Hero Carousel React Component
        const slides = [
            {
                title: "Machu Picchu",
                subtitle: "Peru",
                description: "Adventure is never far away",
                image: "https://images.unsplash.com/photo-1571771019784-3ff35f4f4277?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
            },
            {
                title: "Chamonix",
                subtitle: "France",
                description: "Let your dreams come true",
                image: "https://images.unsplash.com/photo-1581836499506-4a660b39478a?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
            },
            {
                title: "Mimisa Rocks",
                subtitle: "Australia",
                description: "A piece of heaven",
                image: "https://images.unsplash.com/photo-1566522650166-bd8b3e3a2b4b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
            },
            {
                title: "Four",
                subtitle: "Australia",
                description: "A piece of heaven",
                image: "https://images.unsplash.com/flagged/photo-1564918031455-72f4e35ba7a6?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
            },
            {
                title: "Five",
                subtitle: "Australia",
                description: "A piece of heaven",
                image: "https://images.unsplash.com/photo-1579130781921-76e18892b57b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
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
                        React.createElement("h2", { className: "slideTitle" }, slide.title),
                        React.createElement("h3", { className: "slideSubtitle" }, slide.subtitle),
                        React.createElement("p", { className: "slideDescription" }, slide.description)
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
    </script>
</body>
</html>