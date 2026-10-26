

/* ==========================================
   KLABEN AUTOS — FEATURED WORK
   Video chapters + fullscreen viewer
   ========================================== */

document.addEventListener('DOMContentLoaded', () => {
    const section = document.querySelector(
        '[data-klaben-feature]'
    );

    if (!section) return;

    const stage = section.querySelector(
        '.klaben-feature__stage'
    );

    const buttons = [
        ...section.querySelectorAll('[data-klaben-chapter]')
    ];

    const poster = section.querySelector('[data-klaben-poster]');
    const video = section.querySelector('[data-klaben-video]');
    const detail = section.querySelector('[data-klaben-detail]');
    const number = section.querySelector('[data-klaben-stage-number]');
    const mediaLabel = section.querySelector('[data-klaben-media-label]');
    const expand = section.querySelector('[data-klaben-expand]');

    if (
        !stage ||
        !buttons.length ||
        !poster ||
        !video ||
        !detail ||
        !number ||
        !mediaLabel
    ) {
        return;
    }

    const reducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    );

    let active = buttons[0];
    let visible = false;
    let loadedSource = '';
    let generation = 0;

    /* ======================================
       FULLSCREEN STATE
       ====================================== */

    const isFullscreen = () =>
        document.fullscreenElement === stage ||
        document.webkitFullscreenElement === stage;

    /* ======================================
       STOP VIDEO
       ====================================== */

    function stop() {
        video.pause();
        video.classList.remove('is-playing');

        const isGif = /\.gif(?:$|\?)/i.test(
            active.dataset.poster || ''
        );

        mediaLabel.textContent = isGif
            ? 'ANIMATED PREVIEW'
            : 'PROJECT PREVIEW';
    }

    /* ======================================
       VIDEO PLAYBACK
       ====================================== */

    function syncVideo() {
        const source = active.dataset.video || '';
        const expanded = isFullscreen();

        // Load the correct video for the selected chapter
        if (loadedSource !== source) {
            stop();

            loadedSource = source;

            if (source) {
                video.src = source;
            } else {
                video.removeAttribute('src');
            }

            video.load();
        }

        video.classList.toggle(
            'has-source',
            Boolean(source)
        );

        // Native playback controls only in fullscreen
        video.controls = expanded && Boolean(source);

        video.setAttribute(
            'aria-hidden',
            expanded && source ? 'false' : 'true'
        );

        video.setAttribute(
            'aria-label',
            `${active.dataset.name} — Klaben Autos`
        );

        // No autoplay when hidden or reduced motion is enabled
        if (
            !source ||
            document.hidden ||
            (!visible && !expanded) ||
            reducedMotion.matches
        ) {
            stop();
            return;
        }

        const currentGeneration = generation;
        const playResult = video.play();

        if (
            playResult &&
            typeof playResult.then === 'function'
        ) {
            playResult
                .then(() => {
                    if (
                        generation === currentGeneration &&
                        !document.hidden &&
                        (visible || isFullscreen()) &&
                        !reducedMotion.matches
                    ) {
                        video.classList.add('is-playing');

                        mediaLabel.textContent =
                            'MOTION PREVIEW';
                    }
                })
                .catch(() => {
                    if (generation === currentGeneration) {
                        stop();
                    }
                });
        }
    }

    /* ======================================
       SWITCH CHAPTER
       ====================================== */

    function choose(button) {
        if (!button) return;

        generation++;
        stop();

        active = button;

        buttons.forEach(item => {
            const selected = item === button;

            item.classList.toggle(
                'is-active',
                selected
            );

            item.setAttribute(
                'aria-pressed',
                String(selected)
            );
        });

        // Update screenshot fallback. Only the Design screenshot has responsive variants.
        const posterUrl = button.dataset.poster || '';
        if (/\/klaben-preview\.webp(?:[?#].*)?$/.test(posterUrl)) {
            const base = posterUrl.replace(/klaben-preview\.webp(?:[?#].*)?$/, '');
            poster.srcset = `${base}klaben-preview-480.webp 480w, ${base}klaben-preview-800.webp 800w, ${posterUrl} 976w`;
            poster.sizes = '(max-width: 700px) 94vw, (max-width: 1100px) 65vw, 720px';
        } else {
            poster.removeAttribute('srcset');
            poster.removeAttribute('sizes');
        }
        poster.src = posterUrl;
        poster.alt = button.dataset.alt || '';

        // Update description
        detail.textContent =
            button.dataset.detail || '';

        // Update chapter number / label
        number.textContent =
            `${button.dataset.number} / ${button.dataset.name.toUpperCase()}`;

        syncVideo();
    }

    /* ======================================
       CHAPTER BUTTON EVENTS
       ====================================== */

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            choose(button);
        });
    });

    /* ======================================
       UPDATE FULLSCREEN UI
       ====================================== */

    function updateFullscreen() {
        const expanded = isFullscreen();

        stage.classList.toggle(
            'is-fullscreen',
            expanded
        );

        if (expand) {
            expand.textContent = expanded
                ? '⤡ Sluit groot beeld'
                : '⤢ Groot beeld';

            expand.setAttribute(
                'aria-label',
                expanded
                    ? 'Sluit volledig scherm'
                    : 'Bekijk Klaben preview op volledig scherm'
            );
        }

        syncVideo();
    }

    /* ======================================
       FULLSCREEN BUTTON
       ====================================== */

    if (expand) {
        expand.addEventListener('click', () => {
            // Leave fullscreen
            if (isFullscreen()) {
                (
                    document.exitFullscreen ||
                    document.webkitExitFullscreen
                )?.call(document);

                return;
            }

            // Modern browsers
            if (typeof stage.requestFullscreen === 'function') {
                const result = stage.requestFullscreen();

                result?.catch?.(() => {
                    // Fallback for devices that only
                    // support fullscreen on video elements
                    if (
                        video.webkitEnterFullscreen &&
                        active.dataset.video
                    ) {
                        video.controls = true;
                        video.webkitEnterFullscreen();
                    }
                });

            // Older WebKit browsers
            } else if (
                typeof stage.webkitRequestFullscreen === 'function'
            ) {
                stage.webkitRequestFullscreen();

            // iOS video fullscreen fallback
            } else if (
                typeof video.webkitEnterFullscreen === 'function' &&
                active.dataset.video
            ) {
                video.controls = true;
                video.webkitEnterFullscreen();

            // Last resort: open media separately
            } else {
                const src =
                    active.dataset.video ||
                    active.dataset.poster;

                if (src) {
                    window.open(
                        src,
                        '_blank',
                        'noopener'
                    );
                }
            }
        });
    }

    /* ======================================
       FULLSCREEN EVENTS
       ====================================== */

    document.addEventListener(
        'fullscreenchange',
        updateFullscreen
    );

    document.addEventListener(
        'webkitfullscreenchange',
        updateFullscreen
    );

    video.addEventListener(
        'webkitendfullscreen',
        () => {
            video.controls = false;
            syncVideo();
        }
    );

    /* ======================================
       SCROLL / VISIBILITY DETECTION
       ====================================== */

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            entries => {
                visible =
                    entries[0]?.isIntersecting ?? false;

                syncVideo();
            },
            {
                threshold: 0.15
            }
        );

        observer.observe(section);
    } else {
        visible = true;
    }

    /* ======================================
       TAB VISIBILITY
       ====================================== */

    document.addEventListener(
        'visibilitychange',
        syncVideo
    );

    /* ======================================
       ACCESSIBILITY — REDUCED MOTION
       ====================================== */

    reducedMotion.addEventListener?.(
        'change',
        syncVideo
    );

    /* ======================================
       INITIALIZE
       ====================================== */

    choose(active);
});
