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
  <title>VolunTribe - Gallery</title>

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
        --gallery-title-color: #003153;
        --footer-bg: #f8f9fa;
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
        --gallery-title-color: #66b3ff;
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

    .footer {
        background-color: var(--footer-bg) !important;
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

    /* Gallery Section Styles */
    .gallery-main {
        padding-top: 2rem;
        padding-bottom: 4rem;
        max-width: 1280px;
        margin: 0 auto;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
        background-color: var(--body-color);
    }

    .gallery-title {
        font-size: 1.875rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2.5rem;
        color: var(--gallery-title-color);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .gallery-item {
        width: 100%;
        overflow: hidden;
        border-radius: 0.5rem;
        background-color: var(--container-color);
    }

    .gallery-img {
        width: 100%;
        height: 13rem;
        object-fit: cover;
        object-position: center;
        border-radius: 0.5rem;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover .gallery-img {
        transform: scale(1.05);
    }

    /* Tablet - 2 Columns */
    @media (min-width: 640px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Desktop - 3 Columns */
    @media (min-width: 768px) {
        .gallery-grid {
            grid-template-columns: repeat(3, 1fr);
        }
        
        .gallery-title {
            font-size: 2.25rem;
        }
    }

    /* Large Desktop */
    @media (min-width: 1024px) {
        .gallery-main {
            padding-top: 3rem;
            padding-bottom: 5rem;
        }
        
        .gallery-img {
            height: 14rem;
        }
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
  </style>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- Header -->
  <header class="header" id="header">
        <nav class="nav container"> 
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>

            <a href="index.php" class="nav__logo">VolunTribe</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link ">
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
                        <a href="gallery.php" class="nav__link active-link">
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
                        <a href="#logout" class="dropdown-item">
                            <i class='bx bx-log-out'></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

  <!-- Gallery Section -->
  <main class="gallery-main">
    <h1 class="gallery-title">VolunTribe Gallery</h1>

    <!-- Responsive Image Grid -->
    <div class="gallery-grid">
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img1.jpg" alt="gallery-photo" />
        </div>
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img2.jpg" alt="gallery-photo" />
        </div>
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img3.jpg" alt="gallery-photo" />
        </div>
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img4.jpg" alt="gallery-photo" />
        </div>
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img5.jpg" alt="gallery-photo" />
        </div>
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img6.jpeg" alt="gallery-photo" />
        </div>
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img7.png" alt="gallery-photo" />
        </div>
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img8.jpeg" alt="gallery-photo" />
        </div>
        <div class="gallery-item">
            <img class="gallery-img" src="./src/images/img9.png" alt="gallery-photo" />
        </div>
    </div>
</main>

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

  <!-- JS -->
  <script src="js/script.js"></script>
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