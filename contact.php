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
    <link rel="stylesheet" href="css\contact.css">
    <link rel="stylesheet" href="css\about.css">
    <link rel="stylesheet" href="css\style.css">
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
            --input-bg: #ffffff;
            --card-bg: #ffffff;
            --footer-bg: #f8f9fa;
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
            --input-bg: #2d2d2d;
            --card-bg: #2d2d2d;
            --footer-bg: #252525;
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
            background-color: var(--body-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, sans-serif;
        }

        /* Header Styles */
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

        /* Hamburger Menu */
        .nav__toggle {
            display: none;
            font-size: 1.5rem;
            color: var(--title-color);
            cursor: pointer;
            transition: color 0.3s;
        }

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
            background: var(--first-color-lighten);
            color: var(--title-color);
            margin-right: 15px;
        }

        .theme-btn:hover,
        .accessibility-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px var(--shadow-color);
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

        /* Contact Section Styles */
        .contact-section {
            background-color: var(--body-color);
            padding-top: 100px;
            transition: background-color 0.3s ease;
        }

        .contact-title,
        .contact-form-title {
            color: var(--title-color);
        }

        .contact-left {
            background-color: var(--card-bg);
        }

        .contact-right {
            background-color: var(--card-bg);
        }

        .contact-info-box {
            background-color: var(--container-color);
            border-color: var(--border-color);
        }

        .contact-info-item,
        .contact-info-item h5 {
            color: black;
        }

        .contact-input,
        .contact-textarea {
            background-color: var(--input-bg);
            color: var(--text-color);
            border-color: var(--border-color);
        }

        .contact-input::placeholder,
        .contact-textarea::placeholder {
            color: var(--text-color);
            opacity: 0.6;
        }

        .contact-radio-label {
            color: var(--text-color);
        }

        .contact-radio-option span {
            color: var(--text-color);
        }

        .contact-submit {
            background-color: var(--first-color);
        }

        .contact-submit:hover {
            opacity: 0.9;
        }

        /* Footer Styles */
        .footer {
           background-color: var(--footer-bg);
           color: var(--text-color);
        } 

        .footer__title,
        .footer__logo span {
            color: var(--title-color);
        }

        .footer__description,
        .footer__link {
            color: var(--text-color);
        }

        .footer__link:hover {
            color: var(--first-color);
        }

        .footer__copyright {
            color: var(--text-color);
        }

        .footer__social-link {
            color: var(--text-color);
            transition: color 0.3s;
        }

        .footer__social-link:hover {
            color: var(--first-color);
        }

        /* Mobile responsiveness */
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
                        <a href="contact.php" class="nav__link active-link">
                            <i class='bx bx-message-square-detail nav__icon'></i>
                            <span class="nav__name">Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Dark Mode & Accessibility Toggle -->
            <div style="display: flex; align-items: center;">
                <!-- Dark Mode Toggle Button -->
                <button class="theme-btn" id="theme-toggle" title="Toggle Dark Mode">
                    <i class='bx bx-moon'></i>
                </button>

                <!-- Accessibility Toggle Button -->
                <button class="accessibility-btn" id="accessibility-toggle" title="Toggle High Contrast">
                    <i class='bx bx-low-vision'></i>
                </button>

                <!-- Profile Dropdown -->
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

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-grid">
                
                <!-- Left Side -->
                <div class="contact-left">
                    <img src="https://pagedone.io/asset/uploads/1696488602.png" 
                         alt="Contact Us - VolunTribe"
                         class="contact-image">
                    <h1 class="contact-title">Contact Us</h1>
                    <div class="contact-info-box">
                        <div class="contact-info">
                            <a href="tel:+4706011911" class="contact-info-item">
                                <i class='bx bx-phone'></i>
                                <h5>+470-601-1911</h5>
                            </a>
                            <a href="mailto:voluntribe@gmail.com" class="contact-info-item">
                                <i class='bx bx-envelope'></i>
                                <h5>voluntribe@gmail.com</h5>
                            </a>
                            <div class="contact-info-item">
                                <i class='bx bx-map'></i>
                                <h5>MIT Campus, Manipal Institute of Technology, Karnataka, India</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="contact-right">
                    <h2 class="contact-form-title">Send Us A Message</h2>

                    <form id="contact-form" method="POST" action="https://formspree.io/f/mrbojggn" class="contact-form">
                        <input type="text" name="name" required placeholder="Name" class="contact-input" />

                        <input type="email" name="email" required placeholder="Email" class="contact-input" />

                        <input type="text" name="phone" placeholder="Phone" class="contact-input" />

                        <div class="contact-radio-group">
                            <label class="contact-radio-label">Preferred method of communication</label>
                            <div class="contact-radio-options">
                                <label class="contact-radio-option">
                                    <input type="radio" name="contact_method" value="Email">
                                    <span>Email</span>
                                </label>
                                <label class="contact-radio-option">
                                    <input type="radio" name="contact_method" value="Phone">
                                    <span>Phone</span>
                                </label>
                            </div>
                        </div>

                        <textarea name="message" placeholder="Message" rows="4" class="contact-textarea"></textarea>

                        <button type="submit" class="contact-submit">Send Message</button>
                    </form>
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

    <script src="js\script.js"></script>
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
    </script>
</body>
</html>