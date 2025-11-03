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
    <link rel="stylesheet" href="css\about.css">
    <link rel="stylesheet" href="css\event.css">
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
            --first-color: #4CAF50;
            --first-color-lighten: #f0f0f0;
            --container-color: #ffffff;
            --border-color: #e0e0e0;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --card-bg: #ffffff;
            --card-hover-shadow: rgba(0, 0, 0, 0.15);
            --button-bg: #4CAF50;
            --button-hover: #45a049;
            --button-text: #ffffff;
            --modal-overlay: rgba(0, 0, 0, 0.5);
            --input-bg: #ffffff;
            --input-border: #ddd;
        }

        [data-theme="dark"] {
            --body-color: #1a1a1a;
            --text-color: #e0e0e0;
            --title-color: #ffffff;
            --first-color: #66bb6a;
            --first-color-lighten: #2d2d2d;
            --container-color: #252525;
            --border-color: #404040;
            --shadow-color: rgba(255, 255, 255, 0.1);
            --card-bg: #2d2d2d;
            --card-hover-shadow: rgba(255, 255, 255, 0.15);
            --button-bg: #66bb6a;
            --button-hover: #81c784;
            --button-text: #1a1a1a;
            --modal-overlay: rgba(0, 0, 0, 0.8);
            --input-bg: #2d2d2d;
            --input-border: #404040;
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

        /* Card List Styles */
        .card-list {
            background-color: var(--body-color) !important;
        }

        .card-item {
            background-color: var(--card-bg) !important;
            color: var(--text-color) !important;
            border: 1px solid var(--border-color) !important;
            position: relative;
            padding-bottom: 100px !important;
            display: flex;
            flex-direction: column;
            text-decoration: none;
        }

        .card-item:hover {
            box-shadow: 0 8px 20px var(--card-hover-shadow) !important;
        }

        .card-item h3 {
            color: var(--title-color) !important;
            margin-bottom: 12px;
        }

        .card-item p {
            color: var(--text-color) !important;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        /* Join Button Styles */
        .join-btn {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--button-bg);
            color: var(--button-text);
            border: none;
            padding: 12px 32px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px var(--shadow-color);
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 10;
        }

        .join-btn:hover {
            background: var(--button-hover);
            transform: translateX(-50%) translateY(-2px);
            box-shadow: 0 6px 16px var(--shadow-color);
        }

        .join-btn:active {
            transform: translateX(-50%) translateY(0);
        }

        .join-btn i {
            font-size: 1.2rem;
        }

        /* Remove arrow from cards */
        .card-item .arrow {
            display: none;
        }

        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--modal-overlay);
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }

        .modal-overlay.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-content {
            background: var(--container-color);
            border-radius: 16px;
            padding: 32px;
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideUp 0.3s ease;
            box-shadow: 0 10px 40px var(--shadow-color);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .modal-title {
            color: var(--title-color);
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .modal-close {
            background: var(--first-color-lighten);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: var(--text-color);
        }

        .modal-close:hover {
            background: var(--border-color);
            transform: rotate(90deg);
        }

        .modal-close i {
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: var(--title-color);
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--input-border);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--input-bg);
            color: var(--text-color);
            font-family: inherit;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--button-bg);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        [data-theme="dark"] .form-input:focus,
        [data-theme="dark"] .form-textarea:focus,
        [data-theme="dark"] .form-select:focus {
            box-shadow: 0 0 0 3px rgba(102, 187, 106, 0.2);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-submit {
            background: var(--button-bg);
            color: var(--button-text);
            border: none;
            padding: 14px 32px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        .form-submit:hover {
            background: var(--button-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px var(--shadow-color);
        }

        .form-submit:active {
            transform: translateY(0);
        }

        /* Success Message */
        .success-message {
            display: none;
            text-align: center;
            padding: 40px 20px;
        }

        .success-message.show {
            display: block;
            animation: slideUp 0.3s ease;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: var(--button-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            animation: scaleIn 0.5s ease;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .success-icon i {
            font-size: 3rem;
            color: var(--button-text);
        }

        .success-title {
            color: var(--title-color);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .success-text {
            color: var(--text-color);
            font-size: 1rem;
            margin-bottom: 24px;
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

        /* Mobile responsiveness */
        @media screen and (max-width: 768px) {
            .theme-btn,
            .accessibility-btn {
                width: 35px;
                height: 35px;
                font-size: 1rem;
                margin-right: 10px;
            }

            .modal-content {
                padding: 24px;
            }

            .modal-title {
                font-size: 1.25rem;
            }

            .join-btn {
                padding: 10px 24px;
                font-size: 0.9rem;
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
                        <a href="event.php" class="nav__link  active-link">
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

    <div class="card-list">
        <div class="card-item">
            <img src="./src/images/ev1.jpg" alt="Card Image">
            <h3>Beach Cleanup Drive – Coastal Conservation</h3>
            <p>Join hands to clear 3 km of coastline, raise awareness about plastic waste and help restore natural habitat.</p>
            <button class="join-btn" data-event="Beach Cleanup Drive">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>

        <div class="card-item">
            <img src="./src/images/ev2.jpg" alt="Card Image">
            <h3>Tree Plantation Campaign – Green Our Neighbourhood</h3>
            <p>Help plant 300+ young trees in the city-edge park, contributing to cleaner air and greener spaces for all.</p>
            <button class="join-btn" data-event="Tree Plantation Campaign">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>

        <div class="card-item">
            <img src="./src/images/ev3.jpg" alt="Card Image">
            <h3>Blood Donation Camp – Life Gives Life</h3>
            <p>Support our campaign to collect 150+ units of blood; your time can save multiple lives today.</p>
            <button class="join-btn" data-event="Blood Donation Camp">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>

        <div class="card-item">
            <img src="./src/images/ev4.jpg" alt="Card Image">
            <h3>Rural Education Outreach – Teach & Empower</h3>
            <p>Empower children in underserved villages by teaching basic English and digital skills for a brighter future.</p>
            <button class="join-btn" data-event="Rural Education Outreach">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>

        <div class="card-item">
            <img src="./src/images/ev5.jpg" alt="Card Image">
            <h3>Food Donation Drive – Share a Meal</h3>
            <p>Distribute 500+ meal packs to families in need this festive season — you can brighten many lives in just one afternoon.</p>
            <button class="join-btn" data-event="Food Donation Drive">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>

        <div class="card-item">
            <img src="./src/images/ev6.jpg" alt="Card Image">
            <h3>Virtual Mentoring Session – Online Volunteers</h3>
            <p>Join our virtual mentoring program: spend 1-2 hours with a student online and help shape their future from anywhere.</p>
            <button class="join-btn" data-event="Virtual Mentoring Session">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>

        <div class="card-item">
            <img src="./src/images/ev7.jpg" alt="Card Image">
            <h3>Community Garden Revitalization</h3>
            <p>Help greenify the city by creating eco-friendly gardens and providing free, fresh produce for underprivileged families.</p>
            <button class="join-btn" data-event="Community Garden Revitalization">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>

        <div class="card-item">
            <img src="./src/images/ev8.jpg" alt="Card Image">
            <h3>School Renovation Drive</h3>
            <p>Bring color and comfort to classrooms—volunteer your time to improve education spaces for rural students.</p>
            <button class="join-btn" data-event="School Renovation Drive">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>

        <div class="card-item">
            <img src="./src/images/ev9.jpg" alt="Card Image">
            <h3>Elderly Care Visit – "Moments of Joy"</h3>
            <p>Share your time and heart—bring smiles and companionship to our beloved elders.</p>
            <button class="join-btn" data-event="Elderly Care Visit">
                <i class='bx bx-user-plus'></i>
                Join Event
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal-overlay" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-event-title">Join Event</h2>
                <button class="modal-close" id="modal-close">
                    <i class='bx bx-x'></i>
                </button>
            </div>

            <form id="join-form">
                <div class="form-group">
                    <label class="form-label">Full Name *</label>
                    <input type="text" class="form-input" name="fullname" required placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label class="form-label">Email *</label>
                    <input type="email" class="form-input" name="email" required placeholder="your.email@example.com">
                </div>

                <div class="form-group">
                    <label class="form-label">Phone Number *</label>
                    <input type="tel" class="form-input" name="phone" required placeholder="+91 XXXXX XXXXX">
                </div>

                <div class="form-group">
                    <label class="form-label">Age *</label>
                    <input type="number" class="form-input" name="age" required min="15" max="100" placeholder="Enter your age">
                </div>

                <div class="form-group">
                    <label class="form-label">Previous Volunteer Experience</label>
                    <select class="form-select" name="experience">
                        <option value="none">No Experience</option>
                        <option value="beginner">Beginner (1-2 events)</option>
                        <option value="intermediate">Intermediate (3-5 events)</option>
                        <option value="experienced">Experienced (6+ events)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Why do you want to join this event?</label>
                    <textarea class="form-textarea" name="reason" placeholder="Tell us what motivates you..."></textarea>
                </div>

                <button type="submit" class="form-submit">Submit Registration</button>
            </form>

            <div class="success-message" id="success-message">
                <div class="success-icon">
                    <i class='bx bx-check'></i>
                </div>
                <h3 class="success-title">Successfully Registered!</h3>
                <p class="success-text">Thank you for joining our event. We'll send you confirmation details via email.</p>
                <button class="form-submit" id="close-success">Close</button>
            </div>
        </div>
    </div>

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

        // Dark Mode
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

        // Accessibility
        const accessibilityToggle = document.getElementById('accessibility-toggle');
        const savedContrast = localStorage.getItem('contrast') || 'normal';
        document.documentElement.setAttribute('data-contrast', savedContrast);

        accessibilityToggle.addEventListener('click', () => {
            const currentContrast = document.documentElement.getAttribute('data-contrast');
            const newContrast = currentContrast === 'high' ? 'normal' : 'high';
            document.documentElement.setAttribute('data-contrast', newContrast);
            localStorage.setItem('contrast', newContrast);
        });

        // Modal Functionality
        const modal = document.getElementById('modal');
        const modalClose = document.getElementById('modal-close');
        const joinForm = document.getElementById('join-form');
        const successMessage = document.getElementById('success-message');
        const closeSuccess = document.getElementById('close-success');
        const modalEventTitle = document.getElementById('modal-event-title');
        let currentEvent = '';

        // Open modal when Join button is clicked
        document.querySelectorAll('.join-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                currentEvent = btn.getAttribute('data-event');
                modalEventTitle.textContent = `Join ${currentEvent}`;
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            });
        });

        // Close modal
        function closeModal() {
            modal.classList.remove('show');
            document.body.style.overflow = '';
            joinForm.style.display = 'block';
            successMessage.classList.remove('show');
            joinForm.reset();
        }

        modalClose.addEventListener('click', closeModal);

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Handle form submission
        joinForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(joinForm);
            const data = {
                event: currentEvent,
                fullname: formData.get('fullname'),
                email: formData.get('email'),
                phone: formData.get('phone'),
                age: formData.get('age'),
                experience: formData.get('experience'),
                reason: formData.get('reason')
            };

            // Log the data (in production, send to server)
            console.log('Event Registration:', data);

            // Here you can add AJAX call to send data to your PHP backend
            // Example:
            /*
            fetch('submit_registration.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                console.log('Success:', result);
            })
            .catch(error => {
                console.error('Error:', error);
            });
            */

            // Show success message
            joinForm.style.display = 'none';
            successMessage.classList.add('show');
        });

        // Close success message
        closeSuccess.addEventListener('click', closeModal);

        // Prevent modal content clicks from closing modal
        document.querySelector('.modal-content').addEventListener('click', (e) => {
            e.stopPropagation();
        });

        // Escape key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('show')) {
                closeModal();
            }
        });
    </script>
</body>
</html>