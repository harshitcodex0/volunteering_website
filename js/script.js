// Safe nav toggle
const navToggle = document.getElementById("nav-toggle");
const navMenu = document.getElementById("nav-menu");
if (navToggle && navMenu) {
  navToggle.addEventListener("click", () => {
    navMenu.classList.toggle("show-menu");
    const icon = navToggle.querySelector("i");
    if (icon) {
      if (navMenu.classList.contains("show-menu")) {
        icon.classList.remove("bx-menu");
        icon.classList.add("bx-x");
      } else {
        icon.classList.remove("bx-x");
        icon.classList.add("bx-menu");
      }
    }
  });

  // Close menu when clicking on a link
  const navLinks = document.querySelectorAll(".nav__link");
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      navMenu.classList.remove("show-menu");
      const icon = navToggle.querySelector("i");
      if (icon) {
        icon.classList.remove("bx-x");
        icon.classList.add("bx-menu");
      }
      navLinks.forEach((l) => l.classList.remove("active-link"));
      link.classList.add("active-link");
    });
  });
}

// Profile Dropdown Toggle (safe guards for pages without profile UI)
// Profile Dropdown Toggle (Tailwind-safe version)
const profileToggle = document.getElementById("profile-toggle");
const dropdownMenu = document.getElementById("dropdown-menu");

if (profileToggle && dropdownMenu) {
  profileToggle.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdownMenu.classList.toggle("hidden");
    dropdownMenu.classList.toggle("opacity-0");
    dropdownMenu.classList.toggle("scale-95");
  });

  // Close dropdown when clicking outside
  document.addEventListener("click", (e) => {
    if (!profileToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
      dropdownMenu.classList.add("hidden", "opacity-0", "scale-95");
    }
  });

  // Close dropdown when clicking a menu item
  document.querySelectorAll(".dropdown-item").forEach((item) => {
    item.addEventListener("click", () => {
      dropdownMenu.classList.add("hidden", "opacity-0", "scale-95");
    });
  });
}


// Slider (React) — run only if React is available and #app exists
console.clear();

// const slides = [
//   {
//     title: "Machu Picchu",
//     subtitle: "Peru",
//     description: "Adventure is never far away",
//     image:
//       "https://images.unsplash.com/photo-1571771019784-3ff35f4f4277?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ",
//   },
//   {
//     title: "Chamonix",
//     subtitle: "France",
//     description: "Let your dreams come true",
//     image:
//       "https://images.unsplash.com/photo-1581836499506-4a660b39478a?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ",
//   },
//   {
//     title: "Mimisa Rocks",
//     subtitle: "Australia",
//     description: "A piece of heaven",
//     image:
//       "https://images.unsplash.com/photo-1566522650166-bd8b3e3a2b4b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ",
//   },
//   {
//     title: "Four",
//     subtitle: "Australia",
//     description: "A piece of heaven",
//     image:
//       "https://images.unsplash.com/flagged/photo-1564918031455-72f4e35ba7a6?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ",
//   },
//   {
//     title: "Five",
//     subtitle: "Australia",
//     description: "A piece of heaven",
//     image:
//       "https://images.unsplash.com/photo-1579130781921-76e18892b57b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ",
//   },
// ];

// function useTilt(active) {
//   const ref = React.useRef(null);

//   React.useEffect(() => {
//     if (!ref.current || !active) {
//       return;
//     }

//     const state = {
//       rect: undefined,
//       mouseX: undefined,
//       mouseY: undefined,
//     };

//     let el = ref.current;

//     const handleMouseMove = (e) => {
//       if (!el) {
//         return;
//       }
//       if (!state.rect) {
//         state.rect = el.getBoundingClientRect();
//       }
//       state.mouseX = e.clientX;
//       state.mouseY = e.clientY;
//       const px = (state.mouseX - state.rect.left) / state.rect.width;
//       const py = (state.mouseY - state.rect.top) / state.rect.height;

//       el.style.setProperty("--px", px);
//       el.style.setProperty("--py", py);
//     };

//     el.addEventListener("mousemove", handleMouseMove);

//     return () => {
//       el.removeEventListener("mousemove", handleMouseMove);
//     };
//   }, [active]);

//   return ref;
// }

// const initialState = {
//   slideIndex: 0,
// };

// const slidesReducer = (state, event) => {
//   if (event.type === "NEXT") {
//     return {
//       ...state,
//       slideIndex: (state.slideIndex + 1) % slides.length,
//     };
//   }
//   if (event.type === "PREV") {
//     return {
//       ...state,
//       slideIndex:
//         state.slideIndex === 0 ? slides.length - 1 : state.slideIndex - 1,
//     };
//   }
// };

// function Slide({ slide, offset }) {
//   const active = offset === 0 ? true : null;
//   const ref = useTilt(active);

//   return (
//     <div
//       ref={ref}
//       className="slide"
//       data-active={active}
//       style={{
//         "--offset": offset,
//         "--dir": offset === 0 ? 0 : offset > 0 ? 1 : -1,
//       }}
//     >
//       <div
//         className="slideBackground"
//         style={{
//           backgroundImage: `url('${slide.image}')`,
//         }}
//       />
//       <div
//         className="slideContent"
//         style={{
//           backgroundImage: `url('${slide.image}')`,
//         }}
//       >
//         <div className="slideContentInner">
//           <h2 className="slideTitle">{slide.title}</h2>
//           <h3 className="slideSubtitle">{slide.subtitle}</h3>
//           <p className="slideDescription">{slide.description}</p>
//         </div>
//       </div>
//     </div>
//   );
// }

// function App() {
//   const [state, dispatch] = React.useReducer(slidesReducer, initialState);

//   return (
//     <div className="slides">
//       <button onClick={() => dispatch({ type: "PREV" })}>‹</button>

//       {[...slides, ...slides, ...slides].map((slide, i) => {
//         let offset = slides.length + (state.slideIndex - i);
//         return <Slide slide={slide} offset={offset} key={i} />;
//       })}
//       <button onClick={() => dispatch({ type: "NEXT" })}>›</button>
//     </div>
//   );
// }

const elApp = document.getElementById("app");
ReactDOM.render(<App />, elApp);
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

const elApp = document.getElementById("app");
ReactDOM.render(<App />, elApp);
