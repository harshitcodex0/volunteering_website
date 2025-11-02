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
  <title>MITVOL - Gallery</title>

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-white text-gray-800">

  <!-- Header -->
  <header class="header shadow-md bg-white fixed top-0 w-full z-50">
    <nav class="nav container mx-auto flex justify-between items-center px-6 py-4">
      <div class="nav__toggle block md:hidden text-2xl text-blue-600" id="nav-toggle">
        <i class='bx bx-menu'></i>
      </div>

      <a href="index.php" class="nav__logo text-2xl font-bold text-blue-700">MITVOL</a>

      <div class="nav__menu hidden md:flex space-x-6" id="nav-menu">
        <a href="index.php" class="nav__link text-gray-700 hover:text-blue-600">Home</a>
        <a href="about.php" class="nav__link text-gray-700 hover:text-blue-600">About</a>
        <a href="event.php" class="nav__link text-gray-700 hover:text-blue-600">Events</a>
        <a href="gallery.php" class="nav__link text-blue-600 font-semibold border-b-2 border-blue-600">Gallery</a>
        <a href="contact.php" class="nav__link text-gray-700 hover:text-blue-600">Contact</a>
      </div>

      <!-- Profile Dropdown -->
      <div class="profile-dropdown relative">
        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&h=100&fit=crop"
             alt="Profile"
             class="nav__img w-10 h-10 rounded-full border-2 border-blue-600 cursor-pointer object-cover"
             id="profile-toggle">
        <div class="dropdown-menu absolute right-0 mt-3 w-48 bg-white rounded-lg shadow-lg hidden" id="dropdown-menu">
          <a href="#profile" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class='bx bx-user text-blue-600'></i> <span>Profile</span>
          </a>
          <a href="logout.php" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class='bx bx-log-out text-blue-600'></i> <span>Logout</span>
          </a>
        </div>
      </div>
    </nav>
  </header>

  <!-- Gallery Section -->
  <main class="pt-28 pb-16 container mx-auto px-6">
    <h1 class="text-3xl font-bold text-center text-blue-700 mb-10">MITVOL Gallery</h1>

    <!-- Responsive Image Grid -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://vkfoundation.org/index.php/volunteer/"
          alt="gallery-photo" />
      </div>
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://images.unsplash.com/photo-1432462770865-65b70566d673?auto=format&fit=crop&w=1950&q=80"
          alt="gallery-photo" />
      </div>
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?auto=format&fit=crop&w=2560&q=80"
          alt="gallery-photo" />
      </div>
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://images.unsplash.com/photo-1493246507139-91e8fad9978e?auto=format&fit=crop&w=2940&q=80"
          alt="gallery-photo" />
      </div>
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://images.unsplash.com/photo-1518623489648-a173ef7824f3?auto=format&fit=crop&w=2762&q=80"
          alt="gallery-photo" />
      </div>
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://images.unsplash.com/photo-1682407186023-12c70a4a35e0?auto=format&fit=crop&w=2832&q=80"
          alt="gallery-photo" />
      </div>
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://demos.creative-tim.com/material-kit-pro/assets/img/examples/blog5.jpg" alt="gallery-photo" />
      </div>
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://material-taillwind-pro-ct-tailwind-team.vercel.app/img/content2.jpg" alt="gallery-photo" />
      </div>
      <div>
        <img class="object-cover object-center w-full h-52 rounded-lg"
          src="https://images.unsplash.com/photo-1620064916958-605375619af8?auto=format&fit=crop&w=1493&q=80"
          alt="gallery-photo" />
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
                        <span>MITVOL</span>
                    </div>

                    <p class="footer__description">
                        MITVOL is a platform that connects volunteers and organizations to make meaningful social impact together. 
                    </p>

                    <p class="footer__description">
                        Join hands with MITVOL to build communities, empower change, and create a better tomorrow through volunteering.
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
                <p class="footer__copyright">© Copyright 2025 MITVOL. All rights reserved.</p>
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
    // Profile Dropdown Toggle
    const profileToggle = document.getElementById('profile-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');
    profileToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdownMenu.classList.toggle('hidden');
    });
    document.addEventListener('click', (e) => {
      if (!profileToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
