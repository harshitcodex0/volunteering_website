<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//   header("Location: login.php");
//   exit;
// }
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VolunTribe - Contact</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/style.css" />

  <script>
    // Tailwind dark mode config
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
</head>

<body class="bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500">

  <!-- Header -->
  <header class="header fixed top-0 w-full bg-white dark:bg-gray-800 shadow-md z-50 transition-all duration-500">
    <nav class="nav container mx-auto flex justify-between items-center px-6 py-4">
      <a href="index.php" class="text-2xl font-bold text-[#003153] dark:text-indigo-400">VolunTribe</a>

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
                        <a href="contact.php" class="nav__link  active-link">
                            <i class='bx bx-message-square-detail nav__icon'></i>
                            <span class="nav__name">Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>

      <!-- Right Section -->
      <div class="flex items-center gap-4">
        <!-- Dark Mode Toggle -->
        <button id="theme-toggle" class="text-2xl focus:outline-none transition-colors duration-300">
          <i id="theme-toggle-icon" class="bx bx-moon text-[#003153] dark:text-yellow-400"></i>
        </button>

        <!-- Profile Dropdown -->
        <div class="relative">
          <img 
            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&h=100&fit=crop" 
            alt="Profile"
            class="nav__img w-10 h-10 rounded-full border-2 border-indigo-500 cursor-pointer object-cover"
            id="profile-toggle">

          <div id="dropdown-menu"
               class="absolute right-0 mt-3 w-48 bg-white dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-lg hidden opacity-0 scale-95 transform transition-all duration-200 origin-top-right">
            <a href="profile.php" class="dropdown-item flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
              <i class='bx bx-user text-indigo-600 dark:text-indigo-400'></i><span>Profile</span>
            </a>
            <a href="logout.php" class="dropdown-item flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
              <i class='bx bx-log-out text-indigo-600 dark:text-indigo-400'></i><span>Logout</span>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- Contact Section -->
  <section class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 grid-cols-1 gap-10">
        
        <!-- Left Side -->
        <div class="group w-full h-full relative drop-shadow-[0_5px_5px_rgba(0,0,255,0.4)]">
          <img src="https://pagedone.io/asset/uploads/1696488602.png" 
               alt="Contact Us - VolunTribe"
               class="w-full h-full lg:rounded-l-2xl rounded-2xl bg-indigo-700 object-cover opacity-90">
          <h1 class="text-white text-4xl font-bold absolute top-11 left-11">Contact Us</h1>
          <div class="absolute bottom-0 w-full lg:p-11 p-5">
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md">
              <a href="tel:+4706011911" class="flex items-center mb-6">
                <i class="bx bx-phone text-[#003153] dark:text-indigo-400 text-2xl"></i>
                <h5 class="ml-4">+470-601-1911</h5>
              </a>
              <a href="mailto:mitvol@gmail.com" class="flex items-center mb-6">
                <i class="bx bx-envelope text-[#003153] dark:text-indigo-400 text-2xl"></i>
                <h5 class="ml-4">voluntribe@gmail.com</h5>
              </a>
              <div class="flex items-start">
                <i class="bx bx-map text-[#003153] dark:text-indigo-400 text-2xl"></i>
                <h5 class="ml-4">MIT Campus, Manipal Institute of Technology, Karnataka, India</h5>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Side -->
        <div class="bg-gray-50 dark:bg-gray-800 p-6 lg:p-11 lg:rounded-r-2xl rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,255,0.4)]">
          <h2 class="text-[#003153] dark:text-indigo-400 text-3xl font-semibold mb-8">Send Us A Message</h2>

          <form id="contact-form" method="POST" action="https://formspree.io/f/mrbojggn" class="space-y-5">
            <input type="text" name="name" required placeholder="Name"
                   class="w-full h-12 bg-transparent text-gray-700 dark:text-gray-200 dark:placeholder-gray-400 border border-gray-200 dark:border-gray-600 rounded-full pl-4 focus:outline-none focus:ring-2 focus:ring-indigo-500" />

            <input type="email" name="email" required placeholder="Email"
                   class="w-full h-12 bg-transparent text-gray-700 dark:text-gray-200 dark:placeholder-gray-400 border border-gray-200 dark:border-gray-600 rounded-full pl-4 focus:outline-none focus:ring-2 focus:ring-indigo-500" />

            <input type="text" name="phone" placeholder="Phone"
                   class="w-full h-12 bg-transparent text-gray-700 dark:text-gray-200 dark:placeholder-gray-400 border border-gray-200 dark:border-gray-600 rounded-full pl-4 focus:outline-none focus:ring-2 focus:ring-indigo-500" />

            <div>
              <h4 class="text-gray-600 dark:text-gray-300 mb-3">Preferred method of communication</h4>
              <div class="flex space-x-8">
                <label class="flex items-center space-x-2 text-gray-600 dark:text-gray-300">
                  <input type="radio" name="contact_method" value="Email" class="accent-indigo-600">
                  <span>Email</span>
                </label>
                <label class="flex items-center space-x-2 text-gray-600 dark:text-gray-300">
                  <input type="radio" name="contact_method" value="Phone" class="accent-indigo-600">
                  <span>Phone</span>
                </label>
              </div>
            </div>

            <textarea name="message" placeholder="Message" rows="4"
                      class="w-full bg-transparent text-gray-700 dark:text-gray-200 dark:placeholder-gray-400 border border-gray-200 dark:border-gray-600 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>

            <button type="submit"
                    class="w-full h-12 bg-[#003153] dark:bg-indigo-600 text-white font-semibold rounded-full hover:bg-indigo-700 transition-all duration-300 shadow-md">
              Send Message
            </button>
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

  <!-- JS -->
  <script>
    // Profile Dropdown
    const profileToggle = document.getElementById("profile-toggle");
    const dropdownMenu = document.getElementById("dropdown-menu");
    if (profileToggle && dropdownMenu) {
      profileToggle.addEventListener("click", (e) => {
        e.stopPropagation();
        dropdownMenu.classList.toggle("hidden");
        dropdownMenu.classList.toggle("opacity-0");
        dropdownMenu.classList.toggle("scale-95");
      });
      document.addEventListener("click", (e) => {
        if (!profileToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
          dropdownMenu.classList.add("hidden", "opacity-0", "scale-95");
        }
      });
    }

    // Dark Mode Toggle
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-toggle-icon');
    const htmlElement = document.documentElement;

    // Load mode
    if (localStorage.theme === 'dark' || 
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      htmlElement.classList.add('dark');
      themeIcon.classList.replace('bx-moon', 'bx-sun');
    } else {
      htmlElement.classList.remove('dark');
      themeIcon.classList.replace('bx-sun', 'bx-moon');
    }

    // Toggle mode
    themeToggle.addEventListener('click', () => {
      htmlElement.classList.toggle('dark');
      if (htmlElement.classList.contains('dark')) {
        themeIcon.classList.replace('bx-moon', 'bx-sun');
        localStorage.theme = 'dark';
      } else {
        themeIcon.classList.replace('bx-sun', 'bx-moon');
        localStorage.theme = 'light';
      }
    });
  </script>
</body>
</html>
