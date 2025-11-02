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
    <title>MITVOLS - Home</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
    <header class="header" id="header">
        <nav class="nav container"> 
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>

            <a href="index.php" class="nav__logo">MITVOLS</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link active-link">
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
                        <a href="contact.php" class="nav__link">
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

    <div class="atf_40">
        <div class=" responsive-container-block big-cont">
            <div class="responsive-container-block blue">
            </div>
            <div class="responsive-container-block bg">
            <p class="text-blk title">
                I'M A UI/UX DESIGNER
            </p>
            <p class="text-blk heading">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget purus lectus viverra in semper nec pretium mus
            </p>
            <form class="form-blk">
                <a class="text-blk button">
                Explore Our Events
                </a>
            </form>
            </div>
        </div>
    </div>





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
                        <button class="btn-secondary">Events</button>
                    </div>
                </div>

                <div class="about-images">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400&h=300&fit=crop" alt="Community" class="about-img about-img-1">
                    <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?w=400&h=300&fit=crop" alt="Travel" class="about-img about-img-2">
                    <!-- <div class="sun-decoration"></div> -->
                </div>
            </div>
        </div>
    </section>

    <div>
        <div id="app"></div>

        
    </div>


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

    <script src ="js\script.js"></script>
</body>
</html>