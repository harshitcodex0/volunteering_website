<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

// Example data (can be replaced with database values)
$user = [
  "name" => isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "John Doe",
  "email" => "johndoe@example.com",
  "role" => "Volunteer",
  "joined" => "March 2025",
  "location" => "Manipal, Karnataka, India",
  "bio" => "Passionate about community service and helping others. Believes in teamwork, empathy, and positive impact."
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VolunTribe - Profile</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/style.css">
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
      --gradient-from: #6366f1;
      --gradient-to: #2563eb;
      --profile-bg: #f9fafb;
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
      --gradient-from: #4f46e5;
      --gradient-to: #1e40af;
      --profile-bg: #1a1a1a;
    }

    /* High Contrast Mode */
    [data-contrast="high"] {
      filter: contrast(1.2) brightness(1.1);
    }

    [data-theme="dark"][data-contrast="high"] {
      filter: contrast(1.3) brightness(0.9);
    }

    /* Apply theme to body */
    body {
      background-color: var(--profile-bg);
      color: var(--text-color);
      transition: background-color 0.3s ease, color 0.3s ease;
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

    .nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 70px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1.5rem;
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

    /* Profile Dropdown */
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

    /* Profile Section Styles */
    .profile-card {
      background-color: var(--card-bg);
      color: var(--text-color);
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .profile-gradient {
      background: linear-gradient(to right, var(--gradient-from), var(--gradient-to));
      transition: background 0.3s ease;
    }

    .profile-info-box {
      background-color: var(--first-color-lighten);
      color: var(--text-color);
      transition: background-color 0.3s ease;
    }

    .profile-text {
      color: var(--text-color);
    }

    .profile-title {
      color: var(--title-color);
    }

    /* Footer Dark Mode Styles */
    .footer {
      background-color: var(--first-color-lighten);
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

    .footer__copyright {
      color: var(--text-color);
    }

    .footer__social-link {
      color: var(--text-color);
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

  <!-- Header -->
  <header class="header" id="header">
    <nav class="nav" role="navigation" aria-label="Main navigation"> 
      <div class="nav__toggle" id="nav-toggle">
        <i class='bx bx-menu'></i>
      </div>

      <a href="index.php" class="nav__logo">VolunTribe</a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list" role="menubar">
          <li class="nav__item" role="none">
            <a href="index.php" class="nav__link" role="menuitem">
              <i class='bx bx-home-alt nav__icon' aria-hidden="true"></i>
              <span class="nav__name">Home</span>
            </a>
          </li>
          
          <li class="nav__item" role="none">
            <a href="about.php" class="nav__link" role="menuitem">
              <i class='bx bx-user nav__icon' aria-hidden="true"></i>
              <span class="nav__name">About</span>
            </a>
          </li>

          <li class="nav__item" role="none">
            <a href="event.php" class="nav__link" role="menuitem">
              <i class='bx bx-book-alt nav__icon' aria-hidden="true"></i>
              <span class="nav__name">Events</span>
            </a>
          </li>

          <li class="nav__item" role="none">
            <a href="gallery.php" class="nav__link" role="menuitem">
              <i class='bx bx-briefcase-alt nav__icon' aria-hidden="true"></i>
              <span class="nav__name">Gallery</span>
            </a>
          </li>

          <li class="nav__item" role="none">
            <a href="contact.php" class="nav__link" role="menuitem">
              <i class='bx bx-message-square-detail nav__icon' aria-hidden="true"></i>
              <span class="nav__name">Contact Us</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Dark Mode, Accessibility & Profile -->
      <div style="display: flex; align-items: center;">
        <!-- Dark Mode Toggle Button -->
        <button class="theme-btn" id="theme-toggle" title="Toggle Dark Mode" aria-label="Toggle dark mode" aria-pressed="false">
          <i class='bx bx-moon' aria-hidden="true"></i>
        </button>

        <!-- Accessibility Toggle Button -->
        <button class="accessibility-btn" id="accessibility-toggle" title="Toggle High Contrast" aria-label="Toggle high contrast mode" aria-pressed="false">
          <i class='bx bx-low-vision' aria-hidden="true"></i>
        </button>

        <!-- Profile Dropdown -->
        <div class="profile-dropdown">
          <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&h=100&fit=crop" alt="User profile picture" class="nav__img" id="profile-toggle" role="button" tabindex="0" aria-haspopup="true" aria-expanded="false">
          <div class="dropdown-menu" id="dropdown-menu" role="menu" aria-label="Profile menu">
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

  <!-- Profile Section -->
  <main>
  <section class="pt-8 pb-20" style="padding-top: 100px;" aria-labelledby="profile-heading">
    <div class="container mx-auto px-6 max-w-5xl">
      <div class="profile-card shadow-lg rounded-2xl overflow-hidden">
        <!-- Top Banner -->
        <div class="h-48 profile-gradient" aria-hidden="true"></div>

        <!-- Profile Card -->
        <div class="px-6 pb-10 -mt-16 flex flex-col items-center">
          <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&h=150&fit=crop"
               alt="Profile picture of <?= htmlspecialchars($user['name']); ?>"
               class="w-32 h-32 rounded-full border-4 shadow-md object-cover mb-4"
               style="border-color: var(--card-bg);">

          <h2 id="profile-heading" class="text-2xl font-bold profile-title"><?= htmlspecialchars($user['name']); ?></h2>
          <p class="profile-text opacity-75"><?= htmlspecialchars($user['email']); ?></p>
          <p class="font-medium mt-1" style="color: #6366f1;"><?= htmlspecialchars($user['role']); ?></p>

          <!-- Info Grid -->
          <div class="grid sm:grid-cols-2 gap-6 mt-8 w-full max-w-3xl text-center">
            <div class="p-4 rounded-xl profile-info-box shadow-sm">
              <i class='bx bx-map text-2xl' style="color: #6366f1;" aria-hidden="true"></i>
              <h4 class="text-sm font-semibold mt-2 profile-title">Location</h4>
              <p class="profile-text text-sm opacity-75"><?= htmlspecialchars($user['location']); ?></p>
            </div>
            <div class="p-4 rounded-xl profile-info-box shadow-sm">
              <i class='bx bx-calendar text-2xl' style="color: #6366f1;" aria-hidden="true"></i>
              <h4 class="text-sm font-semibold mt-2 profile-title">Joined</h4>
              <p class="profile-text text-sm opacity-75"><?= htmlspecialchars($user['joined']); ?></p>
            </div>
          </div>

          <!-- Bio Section -->
          <div class="mt-8 max-w-3xl text-center">
            <h3 class="text-lg font-semibold profile-title mb-2">About Me</h3>
            <p class="profile-text leading-relaxed opacity-90"><?= htmlspecialchars($user['bio']); ?></p>
          </div>

          <!-- Buttons -->
          <div class="mt-8 flex flex-col gap-3 w-48">
            <button class="text-white px-6 py-2 rounded-full font-semibold transition shadow-md" 
                    style="background-color: #6366f1;"
                    onmouseover="this.style.backgroundColor='#4f46e5'"
                    onmouseout="this.style.backgroundColor='#6366f1'"
                    aria-label="Edit profile information">
              Edit Profile
            </button>

            <!-- Logout Button -->
            <form action="logout.php" method="POST">
              <button type="submit"
                class="w-full bg-red-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-red-700 transition shadow-md"
                aria-label="Logout from account">
                Logout
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
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
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7763.927438756527!2d74.78482487609999!3d13.352532100000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbca4a7d2c4edb7%3A0x8d588d4fb81d861f!2sManipal%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1761484628724!5m2!1sen!2sin" width="300" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Location map of Manipal Institute of Technology"></iframe>
            </div>
          </div>
        </div>
      </div>

      <div class="footer__bottom">
        <p class="footer__copyright">© Copyright 2025 VolunTribe. All rights reserved.</p>
        <div class="footer__social" aria-label="Social media links">
          <a href="https://twitter.com/voluntribe" class="footer__social-link" aria-label="Follow us on Twitter"><i class='bx bxl-twitter' aria-hidden="true"></i></a>
          <a href="https://instagram.com/voluntribe" class="footer__social-link" aria-label="Follow us on Instagram"><i class='bx bxl-instagram' aria-hidden="true"></i></a>
          <a href="https://facebook.com/voluntribe" class="footer__social-link" aria-label="Follow us on Facebook"><i class='bx bxl-facebook' aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- JS -->
  <script>
    // Hamburger Menu Toggle
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');

    if (navToggle && navMenu) {
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
    }

    // Close menu when clicking on a link
    const navLinks = document.querySelectorAll('.nav__link');
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (navMenu) {
          navMenu.classList.remove('show-menu');
          const icon = navToggle.querySelector('i');
          icon.classList.remove('bx-x');
          icon.classList.add('bx-menu');
        }
      });
    });

    // Profile Dropdown Toggle
    const profileToggle = document.getElementById('profile-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');

    if (profileToggle && dropdownMenu) {
      profileToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        const isExpanded = dropdownMenu.classList.toggle('show');
        profileToggle.setAttribute('aria-expanded', isExpanded);
      });

      // Handle keyboard accessibility
      profileToggle.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          profileToggle.click();
        }
      });

      // Close dropdown when clicking outside
      document.addEventListener('click', (e) => {
        if (!profileToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
          dropdownMenu.classList.remove('show');
          profileToggle.setAttribute('aria-expanded', 'false');
        }
      });

      document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', () => {
          dropdownMenu.classList.remove('show');
          profileToggle.setAttribute('aria-expanded', 'false');
        });
      });
    }

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