document.documentElement.classList.add("js");

document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.querySelector(".sidebar");
    const toggle = document.querySelector(".sidebar__toggle");
    const navigation = document.querySelector(".sidebar__navigation");
    const mainContent = document.querySelector("#main-content");

    if (!sidebar || !toggle || !navigation) {
        return;
    }

    const getMenuFocusables = () =>
        Array.from(
            sidebar.querySelectorAll(
                'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'
            )
        ).filter((element) => !element.hidden);

    const setMainInert = (isInert) => {
        if (!mainContent || !("inert" in mainContent)) {
            return;
        }

        mainContent.inert = isInert;
    };

    const closeMenu = (returnFocus = false) => {
        sidebar.classList.remove("is-open");
        document.body.classList.remove("mobile-menu-open");
        setMainInert(false);

        toggle.setAttribute("aria-expanded", "false");
        toggle.setAttribute("aria-label", "Menu openen");

        if (returnFocus) {
            toggle.focus();
        }
    };

    const openMenu = () => {
        sidebar.classList.add("is-open");
        document.body.classList.add("mobile-menu-open");
        setMainInert(true);

        toggle.setAttribute("aria-expanded", "true");
        toggle.setAttribute("aria-label", "Menu sluiten");

        window.setTimeout(() => {
            const firstLink = navigation.querySelector("a");

            if (firstLink) {
                firstLink.focus();
            }
        }, 250);
    };

    toggle.addEventListener("click", () => {
        const menuIsOpen = sidebar.classList.contains("is-open");

        if (menuIsOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    navigation.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", closeMenu);
    });

    document.addEventListener("keydown", (event) => {
        if (!sidebar.classList.contains("is-open")) {
            return;
        }

        if (event.key === "Escape") {
            closeMenu(true);
            return;
        }

        if (event.key !== "Tab") {
            return;
        }

        const focusables = getMenuFocusables();

        if (!focusables.length) {
            return;
        }

        const first = focusables[0];
        const last = focusables[focusables.length - 1];

        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault();
            first.focus();
        }
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth > 800) {
            closeMenu();
        }
    });
});

/* =========================================================
   PORTFOLIO MOTION SYSTEM
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
    const reducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    if (reducedMotion) {
        return;
    }

    document.documentElement.classList.add("motion-ready");

    /*
     * Trigger the cinematic page entrance.
     */
    window.requestAnimationFrame(() => {
        window.requestAnimationFrame(() => {
            document.body.classList.add("motion-loaded");
        });
    });

    /*
     * Reusable scroll reveal.
     */
    const revealElements = [];

    const registerReveal = (
        selector,
        direction = "up",
        delayStep = 70
    ) => {
        document.querySelectorAll(selector).forEach((element, index) => {
            element.classList.add(
                "motion-reveal",
                `motion-reveal--${direction}`
            );

            element.style.setProperty(
                "--motion-delay",
                `${Math.min(index, 6) * delayStep}ms`
            );

            revealElements.push(element);
        });
    };

    registerReveal(".services-hero__content", "left");
    registerReveal(".services-hero__aside", "right");
    registerReveal(".services-list", "up");

    registerReveal(".contact-page__intro", "left");
    registerReveal(".contact-page__form-area", "right");
    registerReveal(".contact-form__field", "up", 65);

    if ("IntersectionObserver" in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                });
            },
            {
                threshold: 0.12,
                rootMargin: "0px 0px -7% 0px"
            }
        );

        revealElements.forEach((element) => {
            observer.observe(element);
        });
    } else {
        revealElements.forEach((element) => {
            element.classList.add("is-visible");
        });
    }

    /*
     * Soft desktop cursor glow.
     */
    const finePointer = window.matchMedia(
        "(hover: hover) and (pointer: fine)"
    ).matches;

    const siteContent = document.querySelector(".site-content");

    if (finePointer && siteContent) {
        const glow = document.createElement("div");

        glow.className = "portfolio-cursor-glow";
        glow.setAttribute("aria-hidden", "true");

        siteContent.appendChild(glow);

        let animationFrame = null;
        let pointerX = 0;
        let pointerY = 0;

        siteContent.addEventListener("pointerenter", () => {
            glow.classList.add("is-visible");
        });

        siteContent.addEventListener("pointerleave", () => {
            glow.classList.remove("is-visible");
        });

        siteContent.addEventListener("pointermove", (event) => {
            pointerX = event.clientX;
            pointerY = event.clientY;

            if (animationFrame) {
                return;
            }

            animationFrame = window.requestAnimationFrame(() => {
                glow.style.left = `${pointerX}px`;
                glow.style.top = `${pointerY}px`;
                animationFrame = null;
            });
        });
    }

    /*
     * Very subtle magnetic movement for important controls.
     */
    if (finePointer) {
        const magneticElements = document.querySelectorAll(
            ".contact-form__submit"
        );

        magneticElements.forEach((element) => {
            element.classList.add("is-magnetic");

            element.addEventListener("pointermove", (event) => {
                const bounds = element.getBoundingClientRect();

                const x =
                    event.clientX -
                    bounds.left -
                    bounds.width / 2;

                const y =
                    event.clientY -
                    bounds.top -
                    bounds.height / 2;

                element.style.transform =
                    `translate(${x * 0.1}px, ${y * 0.14}px)`;
            });

            element.addEventListener("pointerleave", () => {
                element.style.transform = "";
            });
        });
    }
});

/* =========================================================
   HOMEPAGE INTRO TRANSITION
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
    const transition = document.querySelector(".page-transition");

    if (!transition) {
        return;
    }

    const reducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    if (reducedMotion) {
        document.body.classList.add("page-is-ready");
        return;
    }

    window.requestAnimationFrame(() => {
        window.setTimeout(() => {
            document.body.classList.add("page-is-ready");
        }, 650);
    });
});

/* =========================================================
   CONTACT FORM
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("#portfolio-contact-form");
    const status = document.querySelector("#contact-form-status");

    if (!form || !status) {
        return;
    }

    const submitButton = form.querySelector(
        ".contact-form__submit"
    );

    const projectSelect = form.querySelector("#contact-project");
    const requestedService = new URLSearchParams(
        window.location.search
    ).get("dienst");

    const serviceOptions = {
        "complete-website": "New website",
        "website-redesign": "Website redesign",
        "logo-identiteit": "Visual identity",
        "wordpress-support": "WordPress support"
    };

    if (
        projectSelect &&
        requestedService &&
        serviceOptions[requestedService]
    ) {
        projectSelect.value = serviceOptions[requestedService];
    }

    const isEnglish = () =>
        document.documentElement.lang
            .toLowerCase()
            .startsWith("en");

    const messages = {
        nl: {
            sendingTitle: "Even geduld…",
            sendingText: "Je bericht wordt verzonden.",
            successTitle: "Bericht verzonden!",
            successText:
                "Dankjewel. Ik neem zo snel mogelijk contact met je op.",
            errorTitle: "Dat ging helaas niet goed.",
            errorText:
                "Probeer het opnieuw of stuur me rechtstreeks een e-mail."
        },
        en: {
            sendingTitle: "One moment…",
            sendingText: "Your message is being sent.",
            successTitle: "Message sent!",
            successText:
                "Thank you. I’ll get back to you as soon as possible.",
            errorTitle: "Something went wrong.",
            errorText:
                "Please try again or send me an email directly."
        }
    };

    const showMessage = (type, title, text) => {
        status.hidden = false;

        status.className = "contact-message";

        if (type === "success") {
            status.classList.add("contact-message--success");
        }

        if (type === "error") {
            status.classList.add("contact-message--error");
        }

        const icon =
            type === "success"
                ? "✓"
                : type === "error"
                    ? "!"
                    : "…";

        status.innerHTML = `
            <span aria-hidden="true">${icon}</span>
            <div>
                <strong>${title}</strong>
                <p>${text}</p>
            </div>
        `;
    };

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        const language = isEnglish() ? "en" : "nl";
        const copy = messages[language];

        showMessage(
            "sending",
            copy.sendingTitle,
            copy.sendingText
        );

        submitButton.disabled = true;
        form.setAttribute("aria-busy", "true");

        try {
            const response = await fetch(form.action, {
                method: "POST",
                body: new FormData(form),
                credentials: "same-origin",
                headers: {
                    Accept: "application/json"
                }
            });

            const result = await response.json();

            if (!response.ok || !result.success) {
                throw new Error(
                    result?.data?.message ||
                    result?.message ||
                    "Form submission failed"
                );
            }

            showMessage(
                "success",
                copy.successTitle,
                copy.successText
            );

            form.reset();
        } catch {
            showMessage(
                "error",
                copy.errorTitle,
                copy.errorText
            );
        } finally {
            submitButton.disabled = false;
            form.removeAttribute("aria-busy");
        }
    });
});

/* =========================================================
   META VISION - MULTI ITEM ORBIT
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

    const hero =
        document.querySelector(".meta-hero");

const cards =
    document.querySelectorAll(
        ".meta-card[data-orbit-angle], " +
        ".meta-orbit-token[data-orbit-angle]"
    );

    if (!hero || !cards.length) {
        return;
    }


    const prefersReducedMotion =
        window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        ).matches;


    /*
     * One global angle rotates the entire system.
     */
    let systemAngle = 0;

    let lastTime =
        performance.now();


    function animateMetaVision(time) {

        const delta =
            time - lastTime;

        lastTime = time;


        const width =
            hero.clientWidth;

        const height =
            hero.clientHeight;


        /*
         * Orbit centre.
         *
         * Slightly right of centre because Susan
         * occupies the left/middle of the hero.
         */
const centerX =
    width * 0.51;

const centerY =
    height * 0.47;

const radiusX =
    width * 0.39;

const radiusY =
    height * 0.29;

        cards.forEach((card) => {

            const startAngle =
                Number(
                    card.dataset.orbitAngle
                );


            const angle =
                (
                    startAngle +
                    systemAngle
                ) *
                Math.PI /
                180;


            /*
             * Position around ellipse.
             */
            const x =
                centerX +
                Math.cos(angle) *
                radiusX;


            const y =
                centerY +
                Math.sin(angle) *
                radiusY;


            /*
             * Depth:
             *
             * cos/sin could both work here.
             * We're using sin so bottom part of
             * orbit feels closer to the viewer.
             */
            const depth =
                Math.sin(angle);


            const normalizedDepth =
                (depth + 1) / 2;


            /*
             * Rear cards become smaller,
             * front cards become larger.
             */
const scale =
    0.74 +
    normalizedDepth * 0.42;


            /*
             * Rear cards become faint.
             */
            const opacity =
                0.22 +
                normalizedDepth * 0.72;


            /*
             * Slight atmospheric blur at rear.
             */
            const blur =
                (1 - normalizedDepth) *
                1.5;


            /*
             * Perspective direction.
             */
            const rotateY =
                Math.cos(angle) *
                -11;


            card.style.left =
                `${x}px`;

            card.style.top =
                `${y}px`;


            card.style.transform = `
                translate(-50%, -50%)
                perspective(1200px)
                rotateY(${rotateY}deg)
                scale(${scale})
            `;


            card.style.opacity =
                opacity;


            card.style.filter =
                `blur(${blur}px)`;


            /*
             * THE IMPORTANT PART:
             *
             * rear half → behind Susan
             * front half → in front
             */
            card.style.zIndex =
                depth < 0
                    ? "1"
                    : "4";
        });


        /*
         * Slow, continuous movement.
         */
        if (!prefersReducedMotion) {

            systemAngle +=
                delta * 0.0025;

        }


        if (!prefersReducedMotion) {
            requestAnimationFrame(
                animateMetaVision
            );
        }
    }


    requestAnimationFrame(
        animateMetaVision
    );

});

/* =========================================================
   META VISION - MOUSE DEPTH
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

    const hero =
        document.querySelector(".meta-hero");

    if (!hero) {
        return;
    }


    const reduceMotion =
        window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        ).matches;


    if (reduceMotion) {
        return;
    }


    let targetX = 0;
    let targetY = 0;

    let currentX = 0;
    let currentY = 0;


    hero.addEventListener(
        "pointermove",
        (event) => {

            const rect =
                hero.getBoundingClientRect();


            /*
             * Converts cursor position to:
             *
             * -1 -------- 0 -------- +1
             */
            targetX =
                (
                    event.clientX -
                    rect.left
                ) /
                rect.width *
                2 -
                1;


            targetY =
                (
                    event.clientY -
                    rect.top
                ) /
                rect.height *
                2 -
                1;


            /*
             * Glow follows actual cursor.
             */
            hero.style.setProperty(
                "--glow-x",
                `${event.clientX - rect.left}px`
            );

            hero.style.setProperty(
                "--glow-y",
                `${event.clientY - rect.top}px`
            );
        }
    );


    hero.addEventListener(
        "pointerleave",
        () => {

            targetX = 0;
            targetY = 0;

        }
    );


    function animateDepth() {

        /*
         * Smooth interpolation.
         */
        currentX +=
            (targetX - currentX) * 0.045;

        currentY +=
            (targetY - currentY) * 0.045;


        hero.style.setProperty(
            "--meta-x",
            currentX
        );

        hero.style.setProperty(
            "--meta-y",
            currentY
        );


        requestAnimationFrame(
            animateDepth
        );
    }


    requestAnimationFrame(
        animateDepth
    );

});

/* =========================================================
   META VISION - WORK CAROUSEL
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

    const stage =
        document.querySelector(".work-stage");

    if (!stage) {
        return;
    }


    const themeUri =
        stage.dataset.themeUri;

    const siteUrl =
        stage.dataset.siteUrl || "/";


    const items =
        Array.from(
            stage.querySelectorAll(
                ".work-carousel__item"
            )
        );


    const prevButton =
        stage.querySelector(
            ".work-carousel__arrow--prev"
        );


    const nextButton =
        stage.querySelector(
            ".work-carousel__arrow--next"
        );


    /*
     * Content targets
     */

    const count =
        stage.querySelector(
            ".work-project__count strong"
        );

    const title =
        stage.querySelector(
            ".work-project__title"
        );

    const type =
        stage.querySelector(
            ".work-project__type"
        );

    const description =
        stage.querySelector(
            ".work-project__description"
        );

    const tags =
        stage.querySelector(
            ".work-project__tags"
        );

    const caseLink =
        stage.querySelector(
            ".work-project__case"
        );

    const liveLink =
        stage.querySelector(
            ".work-project__live"
        );

    const note =
        stage.querySelector(
            ".work-project__note p"
        );

    const desktopImage =
        stage.querySelector(
            ".work-laptop__viewport img"
        );

    const mobileImage =
        stage.querySelector(
            ".work-phone__viewport img"
        );

    const deviceAnnotation =
        stage.querySelector(
            ".work-devices__annotation p"
        );


    /*
     * =====================================================
     * PROJECT DATA
     * =====================================================
     *
     * This becomes our little project database.
     *
     * Later we can move this into WordPress fields,
     * but for now this is perfect.
     */

    const projects = {

        ehbo: {
            title: "EHBO Petrus Donders",
            type: "Website redesign",

            description:
                "Een duidelijke en toegankelijke website voor een EHBO-vereniging, met opleidingen, informatie en hulpverlening overzichtelijk op één plek.",

            tags: [
                "WordPress",
                "PHP",
                "JavaScript",
                "CSS",
                "Responsive"
            ],

            desktop:
                "ehbo-desktop.webp",

            mobile:
                "ehbo-mobile.webp",

            note:
                "Helder wanneer\nhet ertoe doet.",

            caseUrl:
                new URL("ehbo-petrus-donders/", siteUrl).href,

            caseLabel:
                "Bekijk case",

            liveUrl:
                "https://ehbo-petrus-donders.mr-lily.workers.dev/",

            liveLabel:
                "Live demo"
        },


        cartnip: {
            title: "Cartnip",
            type: "WooCommerce concept",

            description:
                "Een speelse webshop rond kattenwelzijn, waarin e-commerce, educatie en een eigen visuele identiteit samenkomen.",

            tags: [
                "WordPress",
                "WooCommerce",
                "Sass",
                "JavaScript",
                "Git",
                "UI / UX"
            ],

            desktop:
                "cartnip-desktop.webp",

            mobile:
                "cartnip-mobile.webp",

            note:
                "Approved by\nmanagement. 🐾",

            caseUrl:
                new URL("cartnip/", siteUrl).href,

            caseLabel:
                "Bekijk case",

            liveUrl:
                "https://cartnip.mr-lily.workers.dev/",

            liveLabel:
                "Live demo"
        },


        noordgroeit: {
            title: "NoordgroeiT",
            type: "Website redesign",

            description:
                "Een moderne en toegankelijke website voor Stichting NoordgroeiT, die buurtinitiatieven, projecten en bewoners samenbrengt in Tilburg-Noord.",

            tags: [
                "WordPress",
                "PHP",
                "JavaScript",
                "CSS",
                "UI / UX",
                "Responsive"
            ],

            desktop:
                "noordgroeit-desktop.webp",

            mobile:
                "noordgroeit-mobile.webp",

            note:
                "Hier krijgt\nNoord vorm.",

            caseUrl:
                new URL("noordgroeit/", siteUrl).href,

            caseLabel:
                "Bekijk case",

            liveUrl:
                "https://noordgroeit.nl/",

            liveLabel:
                "Live site"
        },

                eventflow: {
            title: "EventFlow",
            type: "Event discovery app",

            description:
                "Een responsive event discovery app voor conventions, fantasy fairs, gaming, cosplay en collectibles, gebouwd met een moderne component-based front-end stack.",

            tags: [
                "React",
                "TypeScript",
                "Tailwind CSS",
                "Vite",
                "Motion",
                "Responsive"
            ],

            desktop:
                "assets/images/projects/eventflow-preview.png",

            mobile:
                "assets/images/projects/eventflow-mobile.png",

            note:
                "Find your next\nadventure.",

            caseUrl:
                new URL("eventflow/", siteUrl).href,

            caseLabel:
                "Bekijk case",

            liveUrl:
                "https://eventflow-gamma-eight.vercel.app/",

            liveLabel:
                "Live demo"
        },


        clientboard: {
            title: "Clientboard",
            type: "Client & project dashboard",

            description:
                "Een speels projectmanagement-dashboard voor klanten, projecten, deadlines en voortgang, gebouwd als mijn eerste grotere Laravel-applicatie.",

            tags: [
                "Laravel",
                "PHP",
                "Blade",
                "JavaScript",
                "Tailwind CSS",
                "MySQL"
            ],

            desktop:
                "assets/images/projects/clientboard-preview.png",

            mobile:
                "assets/images/projects/clientboard-mobile.png",

            note:
                "Projects under\ncontrol.",

            caseUrl:
                new URL("clientboard/", siteUrl).href,

            caseLabel:
                "Bekijk case",

            liveUrl:
                "https://github.com/Susieko/clientboard",

            liveLabel:
                "GitHub"
        },


        eaa: {
            title: "Initiatief EAA",
            type: "Informatieplatform",

            description:
                "Een digitaal platform dat complexe lokale energievraagstukken begrijpelijk maakt en bewoners meeneemt in het initiatief.",

            tags: [
                "WordPress",
                "PHP",
                "JavaScript",
                "CSS",
                "Information Design"
            ],

            desktop:
                null,

            mobile:
                null,

            note:
                "Complex onderwerp.\nHeldere uitleg.",

            caseUrl:
                null,

            caseLabel:
                "Coming soon",

            liveUrl:
                null,

            liveLabel:
                "Coming soon",

            actionsDisabled:
                true
        },


        portfolio: {
            title: "Meta Vision",
            type: "Creative portfolio",

            description:
                "Mijn eigen digitale speeltuin waarin design, development, interactie en creative coding samenkomen.",

            tags: [
                "WordPress",
                "PHP",
                "JavaScript",
                "CSS",
                "Motion",
                "Creative Frontend"
            ],

            desktop:
                "portfolio-desktop.webp",

            mobile:
                "portfolio-mobile.webp",

            note:
                "Design.\nDevelop.\nCreate.",

            caseUrl:
                new URL("meta-vision/", siteUrl).href,

            caseLabel:
                "Bekijk case",

            liveUrl:
                siteUrl,

            liveLabel:
                "Live site"
        }

    };


    /*
     * Order is determined by the HTML buttons.
     */

    const projectKeys =
        items.map(
            item => item.dataset.project
        );


    /*
     * NoordgroeiT starts active.
     */

    let currentIndex =
        projectKeys.indexOf(
            "noordgroeit"
        );


    if (currentIndex < 0) {
        currentIndex = 0;
    }


    /*
     * =====================================================
     * CURVED ORBIT POSITIONS
     * =====================================================
     *
     * Each slot represents one position
     * along the visible project arc.
     */

    const slots = [

        {
            left: 18,
            top: 43,
            scale: 0.82,
            opacity: 0.50
        },

        {
            left: 33,
            top: 24,
            scale: 0.91,
            opacity: 0.76
        },

        {
            left: 50,
            top: 2,
            scale: 1,
            opacity: 1
        },

        {
            left: 67,
            top: 24,
            scale: 0.91,
            opacity: 0.76
        },

        {
            left: 82,
            top: 43,
            scale: 0.82,
            opacity: 0.50
        }

    ];


    function wrapIndex(index) {

        const total =
            projectKeys.length;

        return (
            (index % total) +
            total
        ) % total;

    }


    /*
     * Returns:
     *
     * -2  -1   0   1   2
     *
     * relative to the current project.
     */

    function getRelativePosition(
        itemIndex
    ) {

        let difference =
            itemIndex -
            currentIndex;


        const half =
            Math.floor(
                projectKeys.length / 2
            );


        if (difference > half) {

            difference -=
                projectKeys.length;

        }


        if (difference < -half) {

            difference +=
                projectKeys.length;

        }


        return difference;
    }


    /*
     * =====================================================
     * MOVE PROJECTS AROUND ORBIT
     * =====================================================
     */

    function renderOrbit() {

        items.forEach(
            (item, index) => {

                const relative =
                    getRelativePosition(
                        index
                    );


                const slotIndex =
                    relative + 2;


                const slot =
                    slots[slotIndex];

                if (!slot) {

                    item.style.opacity = "0";
                    item.style.pointerEvents = "none";
                    item.style.zIndex = "0";

                    item.setAttribute(
                        "aria-hidden",
                        "true"
                    );

                    item.tabIndex = -1;

                    return;
                }


                item.style.pointerEvents = "";

                item.removeAttribute(
                    "aria-hidden"
                );

                item.tabIndex = 0;

                item.style.left =
                    `${slot.left}%`;

                item.style.top =
                    `${slot.top}%`;

                item.style.opacity =
                    slot.opacity;

                item.style.transform = `
                    translateX(-50%)
                    scale(${slot.scale})
                `;


                const isActive =
                    relative === 0;


                item.classList.toggle(
                    "is-active",
                    isActive
                );


                item.setAttribute(
                    "aria-pressed",
                    isActive ? "true" : "false"
                );


                item.style.zIndex =
                    String(
                        10 -
                        Math.abs(relative)
                    );
            }
        );

    }


    /*
     * =====================================================
     * UPDATE MAIN PROJECT
     * =====================================================
     */

function setImage(
    image,
    file,
    projectTitle = ""
) {

    if (!image) {
        return;
    }


    const viewport =
        image.parentElement;


    /*
     * Reset previous placeholder.
     */
    viewport?.classList.remove(
        "is-coming-soon"
    );

    image.classList.remove(
        "is-missing"
    );


    /*
     * Store project name for CSS placeholder.
     */
    if (viewport) {

        viewport.dataset.project =
            projectTitle;

    }


    /*
     * Projects without screenshots get the intentional
     * coming soon device state without requesting a missing file.
     */
    if (!file) {

        image.onload = null;
        image.onerror = null;
        image.removeAttribute("src");
        image.classList.add("is-missing");
        viewport?.classList.add("is-coming-soon");
        return;

    }


    /*
     * Screenshot loaded normally.
     */
    image.onload = () => {

        viewport?.classList.remove(
            "is-coming-soon"
        );

        image.classList.remove(
            "is-missing"
        );

    };


    /*
     * Screenshot doesn't exist yet.
     */
    image.onerror = () => {

        image.onload = null;
        image.onerror = null;

        image.classList.add(
            "is-missing"
        );

        viewport?.classList.add(
            "is-coming-soon"
        );

    };


    const imagePath =
        file.includes("/")
            ? file
            : `assets/images/work/${file}`;

    image.src =
        `${themeUri}/${imagePath}`;

}


    function renderProject(
        animate = true
    ) {

        const projectKey =
            projectKeys[currentIndex];


        const project =
            projects[projectKey];


        if (!project) {
            return;
        }


        if (animate) {

            stage.classList.add(
                "is-changing"
            );

        }


        const update = () => {

            count.textContent =
                String(
                    currentIndex + 1
                ).padStart(
                    2,
                    "0"
                );


            title.textContent =
                project.title;


            type.textContent =
                project.type;


            description.textContent =
                project.description;


            /*
             * Rebuild tags.
             */

            tags.innerHTML = "";


            project.tags.forEach(
                tag => {

                    const element =
                        document.createElement(
                            "span"
                        );

                    element.textContent =
                        tag;

                    tags.appendChild(
                        element
                    );

                }
            );


            /*
             * Project actions.
             * EAA stays visible as a deliberate coming soon state.
             */

            const updateAction = (
                link,
                url,
                label,
                disabled = false
            ) => {

                if (!link) {
                    return;
                }

                const labelElement =
                    link.querySelector(
                        ".work-project__action-label"
                    );

                if (labelElement) {
                    labelElement.textContent =
                        label;
                }

                link.hidden = false;
                link.classList.toggle(
                    "is-disabled",
                    disabled
                );

                if (disabled || !url) {
                    link.removeAttribute("href");
                    link.setAttribute(
                        "aria-disabled",
                        "true"
                    );
                    link.setAttribute(
                        "tabindex",
                        "-1"
                    );
                    return;
                }

                link.href = url;
                link.removeAttribute("aria-disabled");
                link.removeAttribute("tabindex");

                const targetUrl = new URL(url, window.location.href);
                const isExternal = targetUrl.origin !== window.location.origin;

                if (isExternal) {
                    link.target = "_blank";
                    link.rel = "noopener noreferrer";
                    link.setAttribute(
                        "aria-label",
                        `${label} (opent in een nieuw tabblad)`
                    );
                } else {
                    link.removeAttribute("target");
                    link.removeAttribute("rel");
                    link.removeAttribute("aria-label");
                }

            };

            updateAction(
                caseLink,
                project.caseUrl,
                project.caseLabel || "Bekijk case",
                project.actionsDisabled === true
            );

            updateAction(
                liveLink,
                project.liveUrl,
                project.liveLabel || "Live site",
                project.actionsDisabled === true
            );


            /*
             * Little handwritten note.
             */

            note.textContent =
                project.note;

            if (deviceAnnotation) {
                deviceAnnotation.innerHTML =
                    project.actionsDisabled === true
                        ? "Concept in<br>ontwikkeling"
                        : "Desktop &amp; mobile<br>geoptimaliseerd";
            }


            /*
             * Device previews.
             * Missing screenshots use the built-in
             * coming-soon state.
             */

setImage(
    desktopImage,
    project.desktop,
    project.title
);

setImage(
    mobileImage,
    project.mobile,
    project.title
);


            desktopImage.alt =
                `${project.title} op desktop`;


            mobileImage.alt =
                `${project.title} op mobiel`;


            /*
             * Reveal new project.
             */

            requestAnimationFrame(
                () => {

                    stage.classList.remove(
                        "is-changing"
                    );

                }
            );

        };


        if (
            animate &&
            !window.matchMedia(
                "(prefers-reduced-motion: reduce)"
            ).matches
        ) {

            window.setTimeout(
                update,
                210
            );

        } else {

            update();

        }

    }


    /*
     * Keep the active project centered in the compact
     * mobile carousel. Desktop keeps the orbital layout.
     */
    function centerActiveMobileProject(behavior = "auto") {

        if (!window.matchMedia("(max-width: 800px)").matches) {
            return;
        }

        const projectStrip = stage.querySelector(
            ".work-carousel__projects"
        );

        const activeItem = stage.querySelector(
            ".work-carousel__item.is-active"
        );

        if (!projectStrip || !activeItem) {
            return;
        }

        const targetLeft =
            activeItem.offsetLeft -
            (projectStrip.clientWidth - activeItem.offsetWidth) / 2;

        projectStrip.scrollTo({
            left: Math.max(0, targetLeft),
            behavior
        });
    }


    /*
     * =====================================================
     * GO TO PROJECT
     * =====================================================
     */

    function goToProject(index) {

        currentIndex =
            wrapIndex(index);


        renderOrbit();

        centerActiveMobileProject(
            window.matchMedia("(prefers-reduced-motion: reduce)").matches
                ? "auto"
                : "smooth"
        );

        renderProject();

    }


    /*
     * Clicking a project in the orbit.
     */

    items.forEach(
        (item, index) => {

            item.addEventListener(
                "click",
                () => {

                    if (
                        index ===
                        currentIndex
                    ) {
                        return;
                    }

                    goToProject(index);

                }
            );

        }
    );


    /*
     * Previous / next.
     */

    prevButton?.addEventListener(
        "click",
        () => {

            goToProject(
                currentIndex - 1
            );

        }
    );


    nextButton?.addEventListener(
        "click",
        () => {

            goToProject(
                currentIndex + 1
            );

        }
    );


    /*
     * Keyboard arrows while focus is
     * within the carousel.
     */

    stage
        .querySelector(
            ".work-carousel"
        )
        ?.addEventListener(
            "keydown",
            event => {

                const focusedProject = event.target.closest(
                    ".work-carousel__item"
                );

                if (!focusedProject) {
                    return;
                }

                if (event.key === "ArrowLeft" || event.key === "ArrowRight") {
                    event.preventDefault();

                    const direction = event.key === "ArrowLeft" ? -1 : 1;
                    const nextIndex = wrapIndex(currentIndex + direction);

                    goToProject(nextIndex);
                    items[nextIndex]?.focus();
                }

            }
        );


    /*
     * Initial render.
     */

    renderOrbit();

    requestAnimationFrame(() => {
        centerActiveMobileProject("auto");
    });

    renderProject(false);

});

/* =========================================================
   ABOUT - WORKSPACE FOCUS
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
    const workspace = document.querySelector(".about-workspace");

    if (!workspace) {
        return;
    }

    const desktop = workspace.querySelector(".about-desktop");
    const folders = Array.from(
        workspace.querySelectorAll(".about-folder[data-window]")
    );
    const windows = Array.from(
        workspace.querySelectorAll(".about-window[data-about-window]")
    );
    const skillsWindow = workspace.querySelector(".about-window--skills");
    const scrollContainer = document.querySelector(".site-content");

    if (!desktop || !folders.length || !windows.length) {
        return;
    }

    let lockedName = null;
    let lockedFolder = null;

    const findWindow = (name) =>
        windows.find(
            (windowElement) =>
                windowElement.dataset.aboutWindow === name
        );

    const setSkillSection = (section) => {
        if (!skillsWindow) {
            return;
        }

        const skillsContainer = skillsWindow.querySelector(".about-skills");
        const skillSections = skillsWindow.querySelectorAll(
            "[data-skill-section]"
        );

        if (!skillsContainer) {
            return;
        }

        skillsContainer.classList.remove("has-skill-focus");
        skillSections.forEach((skillSection) => {
            skillSection.classList.remove("is-skill-active");
        });

        if (!section) {
            return;
        }

        const target = skillsWindow.querySelector(
            `[data-skill-section="${section}"]`
        );

        if (!target) {
            return;
        }

        skillsContainer.classList.add("has-skill-focus");
        target.classList.add("is-skill-active");
    };

    const clearLock = () => {
        lockedName = null;
        lockedFolder = null;

        windows.forEach((windowElement) => {
            windowElement.classList.remove("is-focused");
        });

        folders.forEach((folder) => {
            folder.classList.remove("is-active");
            folder.setAttribute("aria-pressed", "false");
        });

        setSkillSection(null);
        desktop.classList.remove("has-window-emphasis");
    };

    const scrollToWindow = (target) => {
        const reducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        ).matches;

        window.setTimeout(() => {
            if (scrollContainer) {
                const containerRect = scrollContainer.getBoundingClientRect();
                const targetRect = target.getBoundingClientRect();
                const top =
                    scrollContainer.scrollTop +
                    targetRect.top -
                    containerRect.top -
                    34;

                scrollContainer.scrollTo({
                    top,
                    behavior: reducedMotion ? "auto" : "smooth"
                });

                return;
            }

            target.scrollIntoView({
                behavior: reducedMotion ? "auto" : "smooth",
                block: "start"
            });
        }, 60);
    };

    const lockWindow = (
        name,
        sourceFolder = null,
        section = null
    ) => {
        if (lockedName === name) {
            if (
                !sourceFolder ||
                !lockedFolder ||
                sourceFolder === lockedFolder
            ) {
                clearLock();
                return;
            }
        }

        const target = findWindow(name);

        if (!target) {
            return;
        }

        windows.forEach((windowElement) => {
            windowElement.classList.remove("is-focused");
        });

        folders.forEach((folder) => {
            folder.classList.remove("is-active");
            folder.setAttribute("aria-pressed", "false");
        });

        lockedName = name;
        lockedFolder = sourceFolder;

        desktop.classList.add("has-window-emphasis");
        target.classList.add("is-focused");

        setSkillSection(name === "skills" ? section : null);

        if (sourceFolder) {
            sourceFolder.classList.add("is-active");
            sourceFolder.setAttribute("aria-pressed", "true");
        }

        scrollToWindow(target);
    };

    folders.forEach((folder) => {
        const name = folder.dataset.window;
        const section = folder.dataset.section || null;

        folder.addEventListener("click", () => {
            lockWindow(name, folder, section);
        });
    });

    windows.forEach((windowElement) => {
        const name = windowElement.dataset.aboutWindow;

        windowElement.addEventListener("click", (event) => {
            if (
                event.target.closest(
                    "a, button, input, textarea, select"
                )
            ) {
                return;
            }

            if (lockedName === name) {
                clearLock();
                return;
            }

            lockWindow(name);
        });
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && lockedName) {
            clearLock();
        }
    });

    clearLock();
});


/* ==========================================
   PORTFOLIO 2.0 — THEME SWITCH
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.querySelector(
        ".portfolio-theme-toggle"
    );

    if (!toggle) return;

    const root = document.documentElement;
    const storageKey = "susan-portfolio-theme";

    const applyTheme = (theme) => {
        const isLight = theme === "light";

        root.dataset.portfolioTheme = theme;

        toggle.setAttribute(
            "aria-pressed",
            String(isLight)
        );

        toggle.setAttribute(
            "aria-label",
            isLight
                ? "Schakel naar donkere modus"
                : "Schakel naar lichte modus"
        );
    };

    let savedTheme = "dark";

    try {
        if (localStorage.getItem(storageKey) === "light") {
            savedTheme = "light";
        }
    } catch (error) {
        // Storage may be unavailable.
    }

    applyTheme(savedTheme);

    toggle.addEventListener("click", () => {
        const nextTheme =
            root.dataset.portfolioTheme === "dark"
                ? "light"
                : "dark";

        applyTheme(nextTheme);

        try {
            localStorage.setItem(storageKey, nextTheme);
        } catch (error) {
            // The switch still works without storage.
        }
    });
});


/* ==========================================
   PORTFOLIO 2.0 — INTERACTIVE NAME
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    const title = document.querySelector(
        ".meta-hero__title"
    );

    if (!title) return;

    const canHover = window.matchMedia(
        "(hover: hover) and (pointer: fine)"
    ).matches;

    const reducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    if (!canHover || reducedMotion) return;

    const lines = title.querySelectorAll(
        ".meta-hero__name-line"
    );

    title.addEventListener("pointermove", (event) => {
        const rect = title.getBoundingClientRect();

        // Glow coordinates relative to the heading
        title.style.setProperty(
            "--glow-x",
            `${event.clientX - rect.left + 40}px`
        );

        title.style.setProperty(
            "--glow-y",
            `${event.clientY - rect.top + 40}px`
        );

        // Match the spotlight across both text lines
        lines.forEach((line) => {
            const lineRect = line.getBoundingClientRect();

            line.style.setProperty(
                "--shine-x",
                `${event.clientX - lineRect.left}px`
            );

            line.style.setProperty(
                "--shine-y",
                `${event.clientY - lineRect.top}px`
            );
        });

        title.classList.add("is-spotlit");
    });

    title.addEventListener("pointerleave", () => {
        title.classList.remove("is-spotlit");
    });
});


/* ==========================================
   PORTFOLIO 2.0 — GALAXY CURSOR
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    const shell = document.querySelector(".site-shell");

    if (!shell) return;

    const finePointer = window.matchMedia(
        "(hover: hover) and (pointer: fine)"
    ).matches;

    const reducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    if (!finePointer || reducedMotion) return;

    // Create our custom cursor
    const cursor = document.createElement("div");
    cursor.className = "galaxy-cursor";
    cursor.setAttribute("aria-hidden", "true");

    const dot = document.createElement("span");
    dot.className = "galaxy-cursor__dot";

    cursor.appendChild(dot);
    document.body.appendChild(cursor);

    document.documentElement.classList.add("has-galaxy-cursor");

    let frame = 0;
    let mouseX = 0;
    let mouseY = 0;

    let lastSpark = 0;
    let lastSparkX = -1000;
    let lastSparkY = -1000;

    function createSparkle(x, y) {
        const sparkle = document.createElement("span");

        sparkle.className = "galaxy-cursor__sparkle";
        sparkle.setAttribute("aria-hidden", "true");
        sparkle.textContent = "✦";

        // Small random offset, so the stars feel organic
        sparkle.style.left =
            `${x + (Math.random() - .5) * 24}px`;

        sparkle.style.top =
            `${y + (Math.random() - .5) * 24}px`;

        sparkle.style.setProperty(
            "--spark-drift",
            `${(Math.random() - .5) * 24}px`
        );

        document.body.appendChild(sparkle);

        // Clean up each particle after its animation
        sparkle.addEventListener(
            "animationend",
            () => sparkle.remove(),
            { once: true }
        );
    }

    function moveCursor(event) {
        if (event.pointerType !== "mouse") return;

        // Keep the native cursor in editable fields
        const editing = event.target.closest(
            'input, textarea, select, [contenteditable="true"]'
        );

        if (editing) {
            cursor.classList.remove("is-visible");
            return;
        }

        mouseX = event.clientX;
        mouseY = event.clientY;

        cursor.classList.add("is-visible");

        const interactive = event.target.closest(
            "a, button, [role='button']"
        );

        cursor.classList.toggle(
            "is-interactive",
            Boolean(interactive)
        );

        // Limit visual updates to one per animation frame
        if (!frame) {
            frame = requestAnimationFrame(() => {
                cursor.style.left = `${mouseX}px`;
                cursor.style.top = `${mouseY}px`;
                frame = 0;
            });
        }

        // Occasional sparkles, only while actually moving
        const now = performance.now();
        const distance = Math.hypot(
            mouseX - lastSparkX,
            mouseY - lastSparkY
        );

        if (now - lastSpark > 105 && distance > 28) {
            createSparkle(mouseX, mouseY);

            lastSpark = now;
            lastSparkX = mouseX;
            lastSparkY = mouseY;
        }
    }

    shell.addEventListener(
        "pointermove",
        moveCursor,
        { passive: true }
    );

    // Hide the cursor when leaving the portfolio frame
    shell.addEventListener("pointerleave", () => {
        cursor.classList.remove(
            "is-visible",
            "is-interactive"
        );
    });

    window.addEventListener("blur", () => {
        cursor.classList.remove("is-visible");
    });

    document.addEventListener("visibilitychange", () => {
        if (document.hidden) {
            cursor.classList.remove("is-visible");
        }
    });
});


/* ==========================================
   PORTFOLIO 2.0 — GALAXY RAIL PROGRESS
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.querySelector(".sidebar");
    const content = document.querySelector(".site-content");

    const desktop = window.matchMedia(
        "(min-width: 801px)"
    );

    // The homepage scrolls inside .site-content.
    if (
        !document.body.classList.contains("home") ||
        !sidebar ||
        !content
    ) {
        return;
    }

    const svgNS = "http://www.w3.org/2000/svg";

    const make = (tag, className) => {
        const node = document.createElementNS(svgNS, tag);

        node.setAttribute("class", className);

        return node;
    };

    const graphic = make(
        "svg",
        "sidebar__reading-progress"
    );

    graphic.setAttribute("aria-hidden", "true");
    graphic.setAttribute("focusable", "false");

    const track = make("path", "sidebar__reading-track");
    const fill = make("path", "sidebar__reading-fill");
    const light = make("circle", "sidebar__reading-light");

    light.setAttribute("r", "3.5");

    graphic.append(track, fill, light);
    sidebar.appendChild(graphic);

    let pathLength = 0;
    let pending = false;

    /* Update the line and glowing point */

    const paint = () => {
        pending = false;

        if (!desktop.matches || pathLength <= 0) {
            return;
        }

        const available = Math.max(
            0,
            content.scrollHeight - content.clientHeight
        );

        const progress = available > 0
            ? Math.min(
                1,
                Math.max(0, content.scrollTop / available)
            )
            : 0;

        const drawn = progress * pathLength;

        fill.style.strokeDashoffset = String(
            pathLength - drawn
        );

        const point = fill.getPointAtLength(drawn);

        light.setAttribute("cx", String(point.x));
        light.setAttribute("cy", String(point.y));
    };

    /* Throttle visual updates to animation frames */

    const requestPaint = () => {
        if (pending) return;

        pending = true;

        window.requestAnimationFrame(paint);
    };

    /* Match the real sidebar outline */

    const measure = () => {
        graphic.hidden = !desktop.matches;

        if (!desktop.matches) return;

        const { width, height } =
            graphic.getBoundingClientRect();

        if (!width || !height) return;

        const edgeX = width - 2;
        const bottomY = height - 2;
        const cut = Math.min(76, height * 0.18);

        const path = `
            M ${edgeX} 2
            L ${edgeX} ${height - cut}
            L 2 ${bottomY}
        `;

        graphic.setAttribute(
            "viewBox",
            `0 0 ${width} ${height}`
        );

        track.setAttribute("d", path);
        fill.setAttribute("d", path);

        pathLength = fill.getTotalLength();

        fill.style.strokeDasharray = String(pathLength);

        requestPaint();
    };

    content.addEventListener(
        "scroll",
        requestPaint,
        { passive: true }
    );

    window.addEventListener(
        "resize",
        measure,
        { passive: true }
    );

    desktop.addEventListener("change", measure);

    window.addEventListener(
        "load",
        measure,
        { once: true }
    );

    measure();
});


/* ==========================================
   CASE STUDIES — PROJECT LOG PROGRESS
   ========================================== */

document.addEventListener('DOMContentLoaded', () => {
    const story = document.querySelector('.mv-case__story');
    if (!story) return;

    const heading = story.querySelector(
        '.mv-case__story-heading'
    );

    const current = story.querySelector(
        '[data-case-chapter-current]'
    );

    const chapters = [
        ...story.querySelectorAll('.mv-case__chapter')
    ];

    if (!heading || !current || !chapters.length) return;

    const scrollRoot = document.querySelector('.site-content');
    let pending = false;

    function update() {
        pending = false;

        const rootRect = scrollRoot
            ? scrollRoot.getBoundingClientRect()
            : {
                top: 0,
                height: window.innerHeight
            };

        const focusY =
            rootRect.top + rootRect.height * 0.4;

        const storyRect = story.getBoundingClientRect();

        const travel = Math.max(
            1,
            storyRect.height - 60
        );

        const progress = Math.max(
            0,
            Math.min(
                1,
                (focusY - storyRect.top - 40) / travel
            )
        );

        heading.style.setProperty(
            '--case-progress',
            String(progress)
        );

        // Determine which chapter we are reading
        let active = 0;

        chapters.forEach((chapter, index) => {
            if (
                chapter.getBoundingClientRect().top
                <= focusY
            ) {
                active = index;
            }
        });

        current.textContent = String(
            active + 1
        ).padStart(2, '0');

        chapters.forEach((chapter, index) => {
            chapter.classList.toggle(
                'is-current',
                index === active
            );
        });
    }

    // Only calculate once per animation frame
    function requestUpdate() {
        if (pending) return;

        pending = true;
        requestAnimationFrame(update);
    }

    scrollRoot?.addEventListener(
        'scroll',
        requestUpdate,
        { passive: true }
    );

    window.addEventListener(
        'scroll',
        requestUpdate,
        { passive: true }
    );

    window.addEventListener(
        'resize',
        requestUpdate,
        { passive: true }
    );

    requestUpdate();
});


/* ==========================================
   PORTFOLIO 2.0 — SECTION NAVIGATION
   Scroll-spy + smooth anchor navigation
   ========================================== */

document.addEventListener('DOMContentLoaded', () => {

    const nav = document.querySelector(
        '.sidebar__navigation[data-section-nav]'
    );

    if (!nav) return;

    const links = [
        ...nav.querySelectorAll('a[data-section]')
    ];

    const scrollRoot = document.querySelector(
        '.site-content'
    );

    // Only activate scroll-spy on our homepage.
    // Other pages retain normal links back to home.
    if (!document.getElementById('home')) return;

    const sections = links
        .map(link => ({
            link,
            id: link.dataset.section,
            element: document.getElementById(
                link.dataset.section
            )
        }))
        .filter(item => item.element);

    if (!sections.length) return;

    const reducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    );

    let framePending = false;

    /* ======================================
       ACTIVE ITEM
       ====================================== */

    function setActive(id) {

        links.forEach(link => {

            const active =
                link.dataset.section === id;

            link.classList.toggle(
                'is-active',
                active
            );

            if (active) {
                link.setAttribute(
                    'aria-current',
                    'location'
                );
            } else {
                link.removeAttribute(
                    'aria-current'
                );
            }
        });
    }

    /* ======================================
       FIND CURRENT SECTION
       ====================================== */

    function updateActiveSection() {

        framePending = false;

        const rootTop = scrollRoot
            ? scrollRoot.getBoundingClientRect().top
            : 0;

        const rootHeight = scrollRoot
            ? scrollRoot.clientHeight
            : window.innerHeight;

        // Pick the section around the upper quarter
        // of the visible content area.
        const focusLine =
            rootTop + rootHeight * 0.26;

        let current = sections[0].id;

        sections.forEach(item => {

            const top =
                item.element.getBoundingClientRect().top;

            if (top <= focusLine) {
                current = item.id;
            }
        });

        // Ensure Contact is highlighted at page bottom.
        if (scrollRoot) {

            const remaining =
                scrollRoot.scrollHeight
                - scrollRoot.clientHeight
                - scrollRoot.scrollTop;

            if (
                scrollRoot.scrollHeight > scrollRoot.clientHeight &&
                remaining <= 12
            ) {
                current = sections[sections.length - 1].id;
            }
        }

        setActive(current);
    }

    function scheduleUpdate() {

        if (framePending) return;

        framePending = true;

        requestAnimationFrame(updateActiveSection);
    }

    /* ======================================
       SMOOTH SECTION LINKS
       ====================================== */

    nav.addEventListener('click', event => {

        const link = event.target.closest(
            'a[data-section]'
        );

        if (!link) return;

        const target = document.getElementById(
            link.dataset.section
        );

        if (!target) return;

        event.preventDefault();

        const hash = '#' + target.id;

        if (window.location.hash !== hash) {
            window.history.pushState(
                null,
                '',
                hash
            );
        }

        target.scrollIntoView({
            behavior: reducedMotion.matches
                ? 'auto'
                : 'smooth',
            block: 'start'
        });

        setActive(target.id);
    });

    /* ======================================
       LISTEN FOR SCROLL CHANGES
       ====================================== */

    scrollRoot?.addEventListener(
        'scroll',
        scheduleUpdate,
        { passive: true }
    );

    window.addEventListener(
        'scroll',
        scheduleUpdate,
        { passive: true }
    );

    window.addEventListener(
        'resize',
        scheduleUpdate,
        { passive: true }
    );

    window.addEventListener(
        'hashchange',
        scheduleUpdate
    );

    scheduleUpdate();

});

