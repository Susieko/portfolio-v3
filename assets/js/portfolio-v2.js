/* Portfolio 2.0 / featured work: progressive enhancement, no dependencies. */
document.addEventListener('DOMContentLoaded', () => {
    const work = document.querySelector('.v2-work');
    if (!work) return;

    const tabs = [...work.querySelectorAll('[data-v2-project]')];
    const panels = [...work.querySelectorAll('[data-v2-panel]')];
    const modeButtons = [...work.querySelectorAll('[data-v2-mode]')];
    let activeMode = 'design';

    function showProject(slug, moveFocus = false) {
        const chosen = tabs.find((tab) => tab.dataset.v2Project === slug);
        if (!chosen) return;

        tabs.forEach((tab) => {
            const selected = tab === chosen;
            tab.classList.toggle('is-selected', selected);
            tab.setAttribute('aria-selected', String(selected));
            tab.tabIndex = selected ? 0 : -1;
        });

        panels.forEach((panel) => {
            const selected = panel.dataset.v2Panel === slug;
            panel.hidden = !selected;
            panel.classList.toggle('is-active', selected);
        });

        if (moveFocus) chosen.focus();
    }

    function showMode(mode) {
        if (mode !== 'design' && mode !== 'development') return;
        activeMode = mode;
        modeButtons.forEach((button) => {
            const selected = button.dataset.v2Mode === activeMode;
            button.classList.toggle('is-selected', selected);
            button.setAttribute('aria-pressed', String(selected));
        });
        work.querySelectorAll('[data-v2-view]').forEach((view) => {
            view.hidden = view.dataset.v2View !== activeMode;
        });
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => showProject(tab.dataset.v2Project));
        tab.addEventListener('keydown', (event) => {
            let target = index;
            if (event.key === 'ArrowRight') target = (index + 1) % tabs.length;
            else if (event.key === 'ArrowLeft') target = (index - 1 + tabs.length) % tabs.length;
            else if (event.key === 'Home') target = 0;
            else if (event.key === 'End') target = tabs.length - 1;
            else return;
            event.preventDefault();
            showProject(tabs[target].dataset.v2Project, true);
        });
    });
    modeButtons.forEach((button) => button.addEventListener('click', () => showMode(button.dataset.v2Mode)));

    // The desktop portfolio scrolls inside .site-content, while on mobile
    // the normal document scroll is used. Track whichever is active.
    const fill = document.querySelector('.v2-reading-progress__fill');
    const content = document.querySelector('.site-content');
    if (fill && content) {
        let ticking = false;
        const updateProgress = () => {
            const scrollingInside = window.matchMedia('(min-width: 801px)').matches;
            const distance = scrollingInside
                ? content.scrollHeight - content.clientHeight
                : document.documentElement.scrollHeight - window.innerHeight;
            const current = scrollingInside ? content.scrollTop : window.scrollY;
            const progress = distance > 0 ? Math.max(0, Math.min(1, current / distance)) : 0;
            fill.style.transform = `scaleX(${progress})`;
            ticking = false;
        };
        const requestUpdate = () => {
            if (!ticking) {
                ticking = true;
                window.requestAnimationFrame(updateProgress);
            }
        };
        content.addEventListener('scroll', requestUpdate, { passive: true });
        window.addEventListener('scroll', requestUpdate, { passive: true });
        window.addEventListener('resize', requestUpdate, { passive: true });
        requestUpdate();
    }
});


/* ==========================================
   PORTFOLIO 2.0 — THE LAB
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    const lab = document.querySelector(".p2-lab");
    if (!lab) return;

    /* BirbBuds moods */

    const bird = lab.querySelector("[data-lab-mood]");
    const speech = lab.querySelector("[data-lab-speech]");
    const petButton = lab.querySelector("[data-lab-pet]");

    const moods = [
        ["curious", "Oh, hello!"],
        ["happy", "You made my day ♥"],
        ["sleepy", "Just five more minutes…"]
    ];

    let moodIndex = 0;

    petButton?.addEventListener("click", () => {
        moodIndex = (moodIndex + 1) % moods.length;

        bird.dataset.labMood = moods[moodIndex][0];
        speech.textContent = moods[moodIndex][1];
    });

    /* Morphing shape */

    const shape = lab.querySelector("[data-lab-shape]");

    shape?.addEventListener("click", () => {
        const next = shape.getAttribute("aria-pressed") !== "true";
        shape.setAttribute("aria-pressed", String(next));
    });

    /* Interactive button */

    const sendButton = lab.querySelector("[data-lab-send]");
    const feedback = lab.querySelector("[data-lab-feedback]");

    sendButton?.addEventListener("click", () => {
        const done = sendButton.classList.toggle("is-done");

        sendButton.querySelector(".p2-lab__send-label").textContent =
            done ? "Nice!" : "Try me";

        feedback.textContent = done
            ? "Delight is in the details ✨"
            : "Small details matter.";
    });
});


/* ==========================================
   PORTFOLIO 2.0 — ABOUT TECH SHELF
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    const about = document.querySelector(".p2-about");

    if (!about) return;

    const buttons = [
        ...about.querySelectorAll("[data-about-skill]")
    ];

    const panels = [
        ...about.querySelectorAll("[data-about-panel]")
    ];

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const skill = button.dataset.aboutSkill;

            buttons.forEach((item) => {
                const active =
                    item.dataset.aboutSkill === skill;

                item.classList.toggle("is-active", active);
                item.setAttribute(
                    "aria-pressed",
                    String(active)
                );
            });

            panels.forEach((panel) => {
                panel.hidden =
                    panel.dataset.aboutPanel !== skill;
            });
        });
    });
});


/* ==========================================
   PORTFOLIO 2.0 — CONTACT
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    const button = document.querySelector("[data-p2-copy-email]");
    const feedback = document.querySelector("[data-p2-copy-feedback]");

    if (!button || !feedback) return;

    // Fallback for local HTTP environments where the
    // modern Clipboard API may not be available.
    const copyFallback = (text) => {
        const textarea = document.createElement("textarea");
        textarea.value = text;
        textarea.readOnly = true;
        textarea.style.position = "fixed";
        textarea.style.opacity = "0";

        document.body.appendChild(textarea);
        textarea.select();

        let success = false;

        try {
            success = document.execCommand("copy");
        } catch (error) {
            success = false;
        } finally {
            textarea.remove();
        }

        return success;
    };

    button.addEventListener("click", async () => {
        const email = button.dataset.p2CopyEmail;
        if (!email) return;

        let copied = false;

        try {
            if (navigator.clipboard?.writeText && window.isSecureContext) {
                await navigator.clipboard.writeText(email);
                copied = true;
            } else {
                copied = copyFallback(email);
            }
        } catch (error) {
            copied = copyFallback(email);
        }

        feedback.textContent = copied
            ? "E-mailadres gekopieerd! ✦"
            : "Kopiëren niet beschikbaar. Gebruik de e-maillink.";

        button.setAttribute(
            "aria-label",
            copied ? "E-mailadres gekopieerd" : "Kopieer e-mailadres"
        );
    });
});



/* ==========================================
   PORTFOLIO 2.0 — THE LAB INTERACTIONS
   ========================================== */

document.addEventListener('DOMContentLoaded', () => {

    const lab = document.querySelector('[data-p2-playlab]');

    if (!lab) return;

    const reduceMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    );

    /* ======================================
       ORBIT
       ====================================== */

    const orbit = lab.querySelector('[data-lab-orbit]');

    orbit?.addEventListener('click', () => {
        const on = orbit.classList.toggle('is-energized');

        orbit.setAttribute('aria-pressed', String(on));
    });

    /* ======================================
       LIVING TYPOGRAPHY
       ====================================== */

    const type = lab.querySelector('[data-lab-type]');

    type?.addEventListener('click', () => {
        const on = type.classList.toggle('is-alive');

        type.setAttribute('aria-pressed', String(on));
    });

    /* ======================================
       CATCH ME
       ====================================== */

    const chase = lab.querySelector('[data-lab-chase]');
    const chaseResult = lab.querySelector('[data-lab-chase-result]');

    if (chase && chaseResult) {

        let dodges = 0;
        let caught = false;

        const destinations = [
            [-61, -29],
            [61, 24],
            [-48, 28]
        ];

        chase.addEventListener('pointerenter', (event) => {

            // Don't dodge touch or keyboard users.
            if (
                event.pointerType !== 'mouse' ||
                reduceMotion.matches ||
                caught ||
                dodges >= destinations.length ||
                chase.matches(':focus')
            ) {
                return;
            }

            const [x, y] = destinations[dodges];

            chase.style.setProperty('--chase-x', `${x}px`);
            chase.style.setProperty('--chase-y', `${y}px`);

            dodges += 1;

            if (dodges === destinations.length) {
                chaseResult.textContent =
                    'Oké, nu mag je me pakken!';
            }
        });

        chase.addEventListener('click', () => {

            if (caught) {
                // Reset the little game.
                caught = false;
                dodges = 0;

                chase.style.setProperty('--chase-x', '0px');
                chase.style.setProperty('--chase-y', '0px');

                chase.textContent = 'Pak me ✦';
                chaseResult.textContent = 'Probeer me te pakken';

            } else {
                caught = true;

                chase.textContent = 'Gevangen! ♡';
                chaseResult.textContent = 'Nog een keer?';
            }
        });
    }

    /* ======================================
       LIGHT BULB
       ====================================== */

    const light = lab.querySelector('[data-lab-light]');
    const lightTile = lab.querySelector('[data-lab-light-tile]');
    const lightResult = lab.querySelector('[data-lab-light-result]');

    light?.addEventListener('click', () => {

        const on = lightTile.classList.toggle('is-on');

        light.setAttribute('aria-pressed', String(on));

        if (lightResult) {
            lightResult.textContent = on
                ? 'Het licht brandt ✦'
                : 'Klik voor licht';
        }
    });

    /* ======================================
       BUTTON FEEDBACK
       ====================================== */

    const send = lab.querySelector('[data-lab-send]');
    const sendLabel = lab.querySelector('[data-lab-send-label]');
    const sendResult = lab.querySelector('[data-lab-send-result]');
    const sendTile = lab.querySelector('.p2-playlab__tile--send');

    send?.addEventListener('click', () => {

        const sent = sendTile.classList.toggle('is-sent');

        if (sendLabel) {
            sendLabel.textContent = sent
                ? 'Signaal verzonden ✓'
                : 'Verstuur signaal';
        }

        if (sendResult) {
            sendResult.textContent = sent
                ? 'Mooi! Klik om te resetten'
                : 'Interactiedemo · geen echt bericht';
        }
    });

    /* ======================================
       CURSOR ORB
       ====================================== */

    const orbZone = lab.querySelector('[data-lab-orb-zone]');

    if (orbZone) {

        orbZone.addEventListener('pointermove', (event) => {

            if (
                event.pointerType !== 'mouse' ||
                reduceMotion.matches
            ) {
                return;
            }

            const rect = orbZone.getBoundingClientRect();

            const x = Math.max(
                -78,
                Math.min(
                    78,
                    (
                        event.clientX -
                        rect.left -
                        rect.width / 2
                    ) * .42
                )
            );

            const y = Math.max(
                -43,
                Math.min(
                    43,
                    (
                        event.clientY -
                        rect.top -
                        rect.height / 2
                    ) * .42
                )
            );

            orbZone.style.setProperty('--orb-x', `${x}px`);
            orbZone.style.setProperty('--orb-y', `${y}px`);
        });

        orbZone.addEventListener('pointerleave', () => {
            orbZone.style.setProperty('--orb-x', '0px');
            orbZone.style.setProperty('--orb-y', '0px');
        });

        orbZone.addEventListener('click', () => {

            const active = orbZone.classList.toggle('is-bright');

            orbZone.setAttribute('aria-pressed', String(active));
        });
    }
});


/* ==========================================
   PORTFOLIO 2.0 — SCROLL ENTRANCES
   ========================================== */

(() => {

    function startScrollMotion() {

        // Homepage only.
        // Keep case studies and other pages untouched.

        if (!document.querySelector('.meta-hero')) {
            return;
        }

        if (!('IntersectionObserver' in window)) {
            return;
        }

        if (
            window.matchMedia(
                '(prefers-reduced-motion: reduce)'
            ).matches
        ) {
            return;
        }

        /* ==================================
           ELEMENTS TO ANIMATE
           ================================== */

        const groups = [

            // FEATURED WORK — KLABEN

            {
                section: '.klaben-feature',
                elements: `
                    .klaben-feature__eyebrow,
                    .klaben-feature__header h2,
                    .klaben-feature__subtitle,
                    .klaben-feature__header-aside,
                    .klaben-feature__stage,
                    .klaben-feature__chapters,
                    .klaben-feature__footer
                `
            },

            // WORK ARCHIVE — HEADING ONLY
            // Individual projects already have
            // their own reveal system.

            {
                section: '.p2-gallery',
                elements: `
                    .p2-gallery__eyebrow,
                    .p2-gallery__header h2,
                    .p2-gallery__lead
                `
            },

            // IN DE MAAK

            {
                section: '.p2-making',
                elements: `
                    .p2-making__eyebrow,
                    .p2-making__header h2,
                    .p2-making__intro,
                    .p2-making__feature,
                    .p2-making__experimental-heading,
                    .p2-making__mini
                `
            },

            // DIENSTEN

            {
                section: '.p2-offers',
                elements: `
                    .p2-offers__eyebrow,
                    .p2-offers__header h2,
                    .p2-offers__intro,
                    .p2-offers__card,
                    .p2-offers__approach
                `
            },

            // THE LAB

            {
                section: '.p2-playlab',
                elements: `
                    .p2-playlab__eyebrow,
                    .p2-playlab__header h2,
                    .p2-playlab__intro,
                    .p2-playlab__tile,
                    .p2-playlab__closing
                `
            },

            // BEHIND THE BUILD

            {
                section: '#about',
                elements: `
                    h2,
                    .v2-about__eyebrow,
                    .v2-about__intro,
                    .v2-about__tech-shelf,
                    .v2-about__skills,
                    .p2-about-invite
                `
            },

            // CONTACT

            {
                section: '#contact',
                elements: `
                    h2,
                    .v2-contact__eyebrow,
                    .v2-contact__intro,
                    .v2-contact__panel,
                    .v2-contact__signal,
                    .v2-contact__connection
                `
            }
        ];

        /* ==================================
           REGISTER ANIMATED ELEMENTS
           ================================== */

        const targets = [];

        groups.forEach(({ section, elements }) => {

            const root = document.querySelector(
                section
            );

            if (!root) return;

            const items = root.querySelectorAll(
                elements
            );

            items.forEach((element, index) => {

                // Avoid registering twice.

                if (
                    element.classList.contains(
                        'p2-enter'
                    )
                ) {
                    return;
                }

                element.classList.add('p2-enter');

                // Gentle stagger between elements.
                // Cap the delay at 300ms.

                const delay =
                    Math.min(index, 4) * 75;

                element.style.setProperty(
                    '--p2-enter-delay',
                    `${delay}ms`
                );

                targets.push(element);
            });
        });

        if (!targets.length) return;

        /* ==================================
           WATCH THE VIEWPORT
           ================================== */

        const observer = new IntersectionObserver(

            (entries, currentObserver) => {

                entries.forEach(entry => {

                    if (!entry.isIntersecting) {
                        return;
                    }

                    // Reveal the element.

                    entry.target.classList.add(
                        'p2-enter--shown'
                    );

                    // Once revealed, never hide again.

                    currentObserver.unobserve(
                        entry.target
                    );
                });
            },

            {
                root: null,
                threshold: 0.06,
                rootMargin: '0px 0px -5% 0px'
            }
        );

        /* ==================================
           ACTIVATE MOTION
           ================================== */

        // CSS will only hide elements once
        // the observer has been initialized.

        document.documentElement.classList.add(
            'p2-scroll-motion-ready'
        );

        targets.forEach(element => {
            observer.observe(element);
        });
    }

    /* ======================================
       SAFE INITIALIZATION
       ====================================== */

    if (document.readyState === 'loading') {

        document.addEventListener(
            'DOMContentLoaded',
            startScrollMotion,
            { once: true }
        );

    } else {

        startScrollMotion();

    }

})();
