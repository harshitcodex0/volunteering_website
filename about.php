<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - VolunTribe</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
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
            --footer-bg: #f8f9fa;
            --accent-color: #0066cc;
        }

        [data-theme="dark"] {
            --body-color: #1a1a1a;
            --text-color: #e0e0e0;
            --title-color: #ffffff;
            --first-color: #003153;
            --first-color-lighten: #2d2d2d;
            --container-color: #252525;
            --border-color: #404040;
            --shadow-color: rgba(255, 255, 255, 0.1);
            --card-bg: #2d2d2d;
            --footer-bg: #252525;
            --accent-color: #4da6ff;
        }

        [data-contrast="high"] {
            filter: contrast(1.2) brightness(1.1);
        }

        [data-theme="dark"][data-contrast="high"] {
            filter: contrast(1.3) brightness(0.9);
        }

        body {
            background-color: var(--body-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: var(--container-color);
            box-shadow: 0 2px 10px var(--shadow-color);
            z-index: 1000;
            transition: background-color 0.3s ease;
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
            color: var(--title-color);
            text-decoration: none;
            transition: color 0.3s ease;
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
            margin: 0;
            padding: 0;
        }

        .nav__link {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s;
            padding: 0.5rem;
        }

        .nav__link:hover,
        .nav__link.active-link {
            color: var(--first-color);
        }

        .nav__icon {
            font-size: 1.5rem;
            color: var(--text-color);
            transition: color 0.3s;
        }

        .nav__link:hover .nav__icon,
        .nav__link.active-link .nav__icon {
            color: var(--first-color);
        }

        .nav__name {
            font-size: 0.875rem;
            color: var(--text-color);
            transition: color 0.3s;
        }

        .nav__toggle {
            display: none;
            font-size: 1.5rem;
            color: var(--title-color);
            cursor: pointer;
            transition: color 0.3s;
        }

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
            background: var(--first-color-lighten);
            color: var(--title-color);
            margin-right: 15px;
        }

        .theme-btn:hover,
        .accessibility-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px var(--shadow-color);
        }

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
            border: 2px solid var(--first-color);
        }

        .nav__img:hover {
            transform: scale(1.1);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background-color: var(--container-color);
            border-radius: 8px;
            box-shadow: 0 4px 12px var(--shadow-color);
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
            color: var(--text-color);
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
            background-color: var(--first-color-lighten);
        }

        .dropdown-item i {
            font-size: 1.2rem;
            color: var(--first-color);
        }

        .dropdown-item span {
            font-size: 0.95rem;
            color: var(--text-color);
        }

        .about-section {
            background-color: var(--body-color);
            padding-top: 100px;
            padding-bottom: 60px;
            transition: background-color 0.3s ease;
        }

        .about-hero {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(135deg, var(--first-color) 0%, var(--accent-color) 100%);
            border-radius: 20px;
            margin-bottom: 60px;
            color: #ffffff;
        }

        .about-hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .about-hero p {
            font-size: 1.25rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.95);
        }

        .about-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Updated Values Grid - 2 rows, 3 columns */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }

        .value-card {
            background-color: var(--card-bg);
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 8px 20px var(--shadow-color);
            transition: all 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px var(--shadow-color);
        }

        .value-icon {
            font-size: 3.5rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .value-card h3 {
            color: var(--title-color);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .value-card p {
            color: var(--text-color);
            line-height: 1.7;
        }

        /* Mission Section - Now after values */
        .about-mission {
            background-color: var(--card-bg);
            border-radius: 20px;
            padding: 50px;
            margin-bottom: 60px;
            box-shadow: 0 10px 30px var(--shadow-color);
            transition: background-color 0.3s ease;
        }

        .about-mission h2 {
            color: var(--title-color);
            font-size: 2.5rem;
            margin-bottom: 25px;
            text-align: center;
        }

        .about-mission p {
            color: var(--text-color);
            font-size: 1.1rem;
            line-height: 1.9;
            text-align: center;
            max-width: 900px;
            margin: 0 auto 20px;
        }

        .team-section {
            margin-bottom: 60px;
        }

        .team-section h2 {
            color: var(--title-color);
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 50px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .team-member {
            background-color: var(--card-bg);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 8px 20px var(--shadow-color);
            transition: all 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-icon {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--first-color) 0%, var(--accent-color) 100%);
            font-size: 3rem;
            color: #ffffff;
        }

        .team-member h4 {
            color: var(--title-color);
            font-size: 1.3rem;
            margin-bottom: 8px;
        }

        .team-member p {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .team-member .bio {
            color: var(--text-color);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .stats-section {
            background-color: var(--card-bg);
            border-radius: 20px;
            padding: 50px;
            margin-bottom: 60px;
            box-shadow: 0 10px 30px var(--shadow-color);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .stat-item h3 {
            color: var(--accent-color);
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .stat-item p {
            color: var(--text-color);
            font-size: 1.1rem;
            font-weight: 600;
        }

        .footer {
            background-color: var(--footer-bg);
            color: var(--text-color);
            padding: 60px 20px 20px;
        }

        .footer__container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer__content {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 60px;
            margin-bottom: 40px;
        }

        .footer__logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer__logo i {
            font-size: 2rem;
            color: var(--accent-color);
        }

        .footer__logo span {
            color: var(--title-color);
        }

        .footer__description {
            color: var(--text-color);
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .footer__links {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .footer__title {
            color: var(--title-color);
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .footer__list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer__list li {
            margin-bottom: 12px;
        }

        .footer__link {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer__link:hover {
            color: var(--accent-color);
        }

        .map-container iframe {
            border-radius: 10px;
            width: 100%;
        }

        .footer__bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 30px;
            border-top: 1px solid var(--border-color);
        }

        .footer__copyright {
            color: var(--text-color);
        }

        .footer__social {
            display: flex;
            gap: 15px;
        }

        .footer__social-link {
            color: var(--text-color);
            font-size: 1.5rem;
            transition: color 0.3s;
        }

        .footer__social-link:hover {
            color: var(--accent-color);
        }

        /* Mobile responsiveness */
        @media screen and (max-width: 968px) {
            .values-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (max-width: 768px) {
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

            .nav__toggle {
                display: block;
            }

            .theme-btn,
            .accessibility-btn {
                width: 35px;
                height: 35px;
                font-size: 1rem;
                margin-right: 10px;
            }

            .about-hero h1 {
                font-size: 2rem;
            }

            .about-hero p {
                font-size: 1rem;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .about-mission {
                padding: 30px 20px;
            }

            .about-mission h2 {
                font-size: 2rem;
            }

            .footer__content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .footer__links {
                grid-template-columns: 1fr;
            }

            .footer__bottom {
                flex-direction: column;
                gap: 20px;
                text-align: center;
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

            <a href="index.php" class="nav__logo">VolunTribe</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link">
                            <i class='bx bx-home-alt nav__icon'></i>
                            <span class="nav__name">Home</span>
                        </a>
                    </li>
                    
                    <li class="nav__item">
                        <a href="about.php" class="nav__link active-link">
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

            <div style="display: flex; align-items: center;">
                <button class="theme-btn" id="theme-toggle" title="Toggle Dark Mode">
                    <i class='bx bx-moon'></i>
                </button>

                <button class="accessibility-btn" id="accessibility-toggle" title="Toggle High Contrast">
                    <i class='bx bx-low-vision'></i>
                </button>

                <div class="profile-dropdown">
                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&h=100&fit=crop" alt="Profile" class="nav__img" id="profile-toggle">
                    <div class="dropdown-menu" id="dropdown-menu">
                        <a href="profile.php" class="dropdown-item">
                            <i class='bx bx-user'></i>
                            <span>Profile</span>
                        </a>
                        
                        <a href="logout.php" class="dropdown-item">
                            <i class='bx bx-log-out'></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="about-section">
        <div class="about-content">
            <div class="about-hero">
                <h1>About VolunTribe</h1>
                <p>Empowering communities through meaningful volunteer connections. We believe that together, we can create lasting positive change in the world.</p>
            </div>

            <!-- Values Section - Now 2 rows x 3 columns -->
            <div class="values-grid">
                <div class="value-card">
                    <i class='bx bx-heart value-icon'></i>
                    <h3>Compassion</h3>
                    <p>We lead with empathy and understanding, ensuring every volunteer and organization feels valued and supported in their mission to help others.</p>
                </div>

                <div class="value-card">
                    <i class='bx bx-group value-icon'></i>
                    <h3>Community</h3>
                    <p>We foster connections that bring people together, creating a network of volunteers united by the shared goal of making a positive impact.</p>
                </div>

                <div class="value-card">
                    <i class='bx bx-bulb value-icon'></i>
                    <h3>Innovation</h3>
                    <p>We continuously improve our platform to make volunteering more accessible, engaging, and effective for everyone involved.</p>
                </div>

                <div class="value-card">
                    <i class='bx bx-medal value-icon'></i>
                    <h3>Integrity</h3>
                    <p>We operate with transparency and honesty, building trust between volunteers and organizations through authentic partnerships.</p>
                </div>

                <div class="value-card">
                    <i class='bx bx-leaf value-icon'></i>
                    <h3>Sustainability</h3>
                    <p>We promote long-term solutions and sustainable practices that create lasting positive change in communities worldwide.</p>
                </div>

                <div class="value-card">
                    <i class='bx bx-trophy value-icon'></i>
                    <h3>Excellence</h3>
                    <p>We strive for excellence in everything we do, from our platform features to the support we provide to our community members.</p>
                </div>
            </div>

            <!-- Mission Section - Now after values -->
            <div class="about-mission">
                <h2>Our Mission</h2>
                <p>VolunTribe exists to revolutionize the way people connect with causes they care about. We envision a world where volunteering is accessible, impactful, and deeply rewarding for everyone involved.</p>
                <p>Our mission is threefold: First, to break down barriers that prevent people from volunteering by creating an intuitive platform that matches volunteers with opportunities perfectly suited to their skills, interests, and availability. Second, to empower organizations with the tools and volunteer network they need to amplify their impact and achieve their goals. Third, to cultivate a thriving community where every act of service is celebrated, and where volunteers and organizations grow together in their shared commitment to positive change.</p>
                <p>We believe that when people come together with purpose and compassion, incredible things happen. Through technology, community, and unwavering dedication to our values, we're making it easier than ever for individuals to find their place in the movement toward a better world.</p>
            </div>

            <!-- Stats Section -->
            <div class="stats-section">
                <div class="stats-grid">
                    <div class="stat-item">
                        <h3>10,000+</h3>
                        <p>Active Volunteers</p>
                    </div>
                    <div class="stat-item">
                        <h3>500+</h3>
                        <p>Partner Organizations</p>
                    </div>
                    <div class="stat-item">
                        <h3>25,000+</h3>
                        <p>Hours Volunteered</p>
                    </div>
                    <div class="stat-item">
                        <h3>50+</h3>
                        <p>Cities Reached</p>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="team-section">
                <h2>Meet Our Team</h2>
                <div class="team-grid">
                    <div class="team-member">
                        <h4>Harshit Choudhary</h4>
                        <p>Developer</p>
                        <p class="bio">Developed Login, Register, Backend, Event Page.</p>
                    </div>

                    <div class="team-member">
                        <h4>Akshat Jain</h4>
                        <p>Developer</p>
                        <p class="bio">Developed Home, Gallery, Contact, Accessibility Features.</p>
                    </div>

                    <div class="team-member">
                       <h4>Anjali</h4>
                        <p>Developer</p>
                        <p class="bio">Developed About, Profile, Dark Mode implementation.</p>
                    </div>

                   
                </div>
            </div>
        </div>
    </section>

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

    <script>
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

        const navLinks = document.querySelectorAll('.nav__link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('show-menu');
                const icon = navToggle.querySelector('i');
                icon.classList.remove('bx-x');
                icon.classList.add('bx-menu');
                
                navLinks.forEach(l => l.classList.remove('active-link'));
                link.classList.add('active-link');
            });
        });

        const profileToggle = document.getElementById('profile-toggle');
        const dropdownMenu = document.getElementById('dropdown-menu');

        profileToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', (e) => {
            if (!profileToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });

        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', () => {
                dropdownMenu.classList.remove('show');
            });
        });

        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = themeToggle.querySelector('i');

        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
        updateThemeIcon(savedTheme);

        themeToggle.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        });

        function updateThemeIcon(theme) {
            if (theme === 'dark') {
                themeIcon.classList.remove('bx-moon');
                themeIcon.classList.add('bx-sun');
            } else {
                themeIcon.classList.remove('bx-sun');
                themeIcon.classList.add('bx-moon');
            }
        }

        const accessibilityToggle = document.getElementById('accessibility-toggle');

        const savedContrast = localStorage.getItem('contrast') || 'normal';
        document.documentElement.setAttribute('data-contrast', savedContrast);

        accessibilityToggle.addEventListener('click', () => {
            const currentContrast = document.documentElement.getAttribute('data-contrast');
            const newContrast = currentContrast === 'high' ? 'normal' : 'high';
            
            document.documentElement.setAttribute('data-contrast', newContrast);
            localStorage.setItem('contrast', newContrast);
        });
    </script>
</body>
</html>