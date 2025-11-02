<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//   header("Location: login.php");
//   exit;
// }    
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
    <!-- <link rel="stylesheet" href="css\style.css"> -->
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, sans-serif;
  background: #003153;
  min-height: 100vh;
  padding-top: 80px;
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
  color: #003153;
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
  color: #003153;
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
  color: #003153;
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
  border: 2px solid #003153;
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
  color: #003153;
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












.atf_40 * {
  font-family: Nunito, sans-serif;
}

.atf_40 .text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  line-height: 25px;
  opacity: 1;
}

.atf_40 .responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

.atf_40 .responsive-container-block.bg {
  flex-direction: column;
  align-items: center;
  max-width: 1500px;
  opacity: 1;
  z-index: 1;
  position: relative; /* ensure content stacks above the overlay */
}

.atf_40 .text-blk.title {
  font-size: 70px;
  line-height: 80.49px;
  font-family: "Times New Roman", Times, serif;
  font-weight: 700;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 0px;
  padding-left: 10px;
  margin-top: 200px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  text-align: center;
  color: white;
}

.atf_40 .text-blk.heading {
  font-size: 25px;
  line-height: 34.1px;
  max-width: 700px;
  text-align: center;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 20px;
  margin-left: 0px;
  color: white;
}

.atf_40 .text-blk.button {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 200px;
  margin-left: 0px;
  width: 302px;
  font-size: 20px;
  line-height: 27.28px;
  text-align: center;
  font-weight: 700;
  background-color: #f49892;
  color: white;
  display: flex;
  cursor: pointer;
  opacity: 1;
  z-index: 2;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
  height: 60px;
  justify-content: center;
  align-items: center;
}

.atf_40 .form-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
}

.atf_40 .responsive-container-block.blue {
  background-size: cover;
  background-position-x: 50%;
  background-position-y: 100%;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  /* background-image: url("https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/P1.2.png"); */
  opacity: 0.9;
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: -1;
  top: 0px;
  left: 0px;
}

.atf_40 .responsive-container-block.big-cont {
  position: relative;
  background-image: url("https://taking.care/cdn/shop/articles/volunteering-1160x500-compressed.jpg?v=1685027719");
  background-size: cover;
  background-position-x: 50%;
  background-position-y: 100%;
  z-index: 1;
}

/* Black overlay over the hero background image */
.atf_40 .responsive-container-block.big-cont::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5); /* adjust opacity as needed */
  z-index: 0; /* sits between background image and .bg content */
}


@media (max-width: 768px) {
  .atf_40 .text-blk.heading {
    width: 700px;
    max-width: 100%;
  }
}

@media (max-width: 500px) {
  .atf_40 .text-blk.title {
    font-size: 55px;
    margin-top: 100px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .atf_40 .text-blk.button {
    max-width: 100%;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 100px;
    margin-left: 0px;
  }

  .atf_40 .form-blk {
    max-width: 100%;
  }

  .atf_40 .text-blk.button {
    height: 53px;
  }
}


@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap');


.wk-desk-1 {
  width: 8.333333%;
}

.wk-desk-2 {
  width: 16.666667%;
}

.wk-desk-3 {
  width: 25%;
}

.wk-desk-4 {
  width: 33.333333%;
}

.wk-desk-5 {
  width: 41.666667%;
}

.wk-desk-6 {
  width: 50%;
}

.wk-desk-7 {
  width: 58.333333%;
}

.wk-desk-8 {
  width: 66.666667%;
}

.wk-desk-9 {
  width: 75%;
}

.wk-desk-10 {
  width: 83.333333%;
}

.wk-desk-11 {
  width: 91.666667%;
}

.wk-desk-12 {
  width: 100%;
}

@media (max-width: 1024px) {
  .wk-ipadp-1 {
    width: 8.333333%;
  }

  .wk-ipadp-2 {
    width: 16.666667%;
  }

  .wk-ipadp-3 {
    width: 25%;
  }

  .wk-ipadp-4 {
    width: 33.333333%;
  }

  .wk-ipadp-5 {
    width: 41.666667%;
  }

  .wk-ipadp-6 {
    width: 50%;
  }

  .wk-ipadp-7 {
    width: 58.333333%;
  }

  .wk-ipadp-8 {
    width: 66.666667%;
  }

  .wk-ipadp-9 {
    width: 75%;
  }

  .wk-ipadp-10 {
    width: 83.333333%;
  }

  .wk-ipadp-11 {
    width: 91.666667%;
  }

  .wk-ipadp-12 {
    width: 100%;
  }
}

@media (max-width: 768px) {
  .wk-tab-1 {
    width: 8.333333%;
  }

  .wk-tab-2 {
    width: 16.666667%;
  }

  .wk-tab-3 {
    width: 25%;
  }

  .wk-tab-4 {
    width: 33.333333%;
  }

  .wk-tab-5 {
    width: 41.666667%;
  }

  .wk-tab-6 {
    width: 50%;
  }

  .wk-tab-7 {
    width: 58.333333%;
  }

  .wk-tab-8 {
    width: 66.666667%;
  }

  .wk-tab-9 {
    width: 75%;
  }

  .wk-tab-10 {
    width: 83.333333%;
  }

  .wk-tab-11 {
    width: 91.666667%;
  }

  .wk-tab-12 {
    width: 100%;
  }
}

@media (max-width: 500px) {
  .wk-mobile-1 {
    width: 8.333333%;
  }

  .wk-mobile-2 {
    width: 16.666667%;
  }

  .wk-mobile-3 {
    width: 25%;
  }

  .wk-mobile-4 {
    width: 33.333333%;
  }

  .wk-mobile-5 {
    width: 41.666667%;
  }

  .wk-mobile-6 {
    width: 50%;
  }

  .wk-mobile-7 {
    width: 58.333333%;
  }

  .wk-mobile-8 {
    width: 66.666667%;
  }

  .wk-mobile-9 {
    width: 75%;
  }

  .wk-mobile-10 {
    width: 83.333333%;
  }

  .wk-mobile-11 {
    width: 91.666667%;
  }

  .wk-mobile-12 {
    width: 100%;
  }
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
  color: #003153;
  font-size: 0.95rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.about-title {
  font-size: 2.5rem;
  color: #003153;
  margin: 1rem 0 1.5rem;
  line-height: 1.2;
}

.about-title .highlight {
  color: #003153;
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
  color: #003153;
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
  background: #003153;
  color: #fff;
  border: none;
  padding: 0.9rem 1.8rem;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s, transform 0.3s;
}

.btn-primary:hover {
  background: rgba(0, 49, 83, 0.9);
  transform: translateY(-2px);
}

.btn-secondary {
  background: transparent;
  color: #003153;
  border: 2px solid #e0e0e0;
  padding: 0.9rem 1.8rem;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
}

.btn-secondary:hover {
  border-color: #003153;
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

/* .sun-decoration {
  position: absolute;
  bottom: 10%;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 60px;
  background: #003153;
  border-radius: 50%;
  box-shadow: 0 0 30px rgba(255, 193, 7, 0.6);
  z-index: 1;
}

.sun-decoration::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80px;
  height: 80px;
  background: radial-gradient(circle, rgba(0, 49, 83, 0.3), transparent);
  border-radius: 50%;
} */

/* Responsive */

@media screen and (max-width: 400px) {
  
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
    display: none;
  }

  .about-img-1,
  .about-img-2 {
    display: none;
  }
}

@media screen and (max-width: 748px) {
  
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
    display: none;
  }

  .about-img-1,
  .about-img-2 {
    display: none;
  }
}


.containerx {
  margin: auto;
  max-width: 1440px;
  overflow-x: scroll;
  white-space: nowrap;
  background-color: #fff;
  display: flex;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.scroll-disabler {
  width: 100vw;
  height: 450px;
  position: absolute;
  background-color: rgba(0,0,0 , 0.0001);
}

 ::-webkit-scrollbar {
  display: none;
}

article {
  min-width: 350px;
  height: 400px;
  padding: 1rem;
}
article .wrapper {
  padding 1rem;
  background-color: #fff;
  height: 100%;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  border-radius: 25px;
}
article .img {
  height: 50%;
  background-color: lightgray;
  border-radius: 25px 25px 0 0;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.10);
  /* optional */
  display: flex;
  justify-content: center;
  align-items:center;
  font-size: 3rem;
  font-weight: bold;
  color: #fff;
}

article .content > div {
  height: 2rem;
  background-color: lightgray;
  margin: 2rem auto 0 auto;
  width: 85%;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.10);
  border-radius: 5px;
}
article .content > div:last-child {
  height: 5rem;
}
    </style>
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
                Together, We Build a Better Tomorrow.
            </p>
            <p class="text-blk heading">
            MITVOL is more than a platform — it’s a movement built on compassion and community.
            We connect passionate volunteers with meaningful causes, empowering ordinary people to make extraordinary impact.        
        </p>
            <form class="form-blk bg-[#003153]">
                <a class="text-blk button bg-[#003153]">
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

    <!-- Hero Carousel Section -->
    <section class="hero-carousel">
        <div id="carousel-app"></div>
    </section>


    <section class="about-section">
    <div class="containerx" id="infiniteScroll--left">
        <article>
            <div class="wrapper">
            <div class="img">1</div>
            <div class="content">
                <div></div>
                <div></div>
            </div>
            </div>
        </article>
        
        <!-- Make as many articles as you need -->
        <article>
            <div class="wrapper">
            <div class="img">2</div>
            <div class="content">
                <div></div>
                <div></div>
            </div>
            </div>
        </article>
        <article>
            <div class="wrapper">
            <div class="img">3</div>
            <div class="content">
                <div></div>
                <div></div>
            </div>
            </div>
        </article>
        <article>
            <div class="wrapper">
            <div class="img">4</div>
            <div class="content">
                <div></div>
                <div></div>
            </div>
            </div>
        </article>
        <article>
            <div class="wrapper">
            <div class="img">5</div>
            <div class="content">
                <div></div>
                <div></div>
            </div>
            </div>
        </article>
        <article>
            <div class="wrapper">
            <div class="img">
                6
            </div>
            <div class="content">
                <div></div>
                <div></div>
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
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
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