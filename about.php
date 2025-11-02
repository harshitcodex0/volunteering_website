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

    <!-- Hero Carousel Section -->
    <section class="hero-carousel">
        <div id="carousel-app"></div>
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