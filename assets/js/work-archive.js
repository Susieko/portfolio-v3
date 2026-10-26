
/* ==========================================
   PORTFOLIO 2.0 — INTERACTIVE WORK ARCHIVE
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
    const archive = document.querySelector("[data-p2a-archive]");
    if (!archive) return;

    const items = [
        ...archive.querySelectorAll("[data-p2a-item]")
    ];

    const screens = [
        ...archive.querySelectorAll("[data-p2a-screen]")
    ];

    const builds = [
        ...archive.querySelectorAll("[data-p2a-build]")
    ];

    const stage = archive.querySelector("[data-p2a-stage]");
    const title = archive.querySelector("[data-p2a-stage-title]");
    const kind = archive.querySelector("[data-p2a-stage-kind]");
    const counter = archive.querySelector("[data-p2a-stage-count]");

    const modeButtons = [
        ...archive.querySelectorAll("[data-p2a-mode]")
    ];

    let currentId = items[0]?.dataset.p2aItem;
    let mode = "design";

    function render() {
        items.forEach((item, index) => {
            const active = item.dataset.p2aItem === currentId;

            item.classList.toggle("is-current", active);

            item.querySelector("[data-p2a-pick]")
                .setAttribute("aria-expanded", String(active));

            item.querySelector(".p2a__detail").hidden = !active;

            if (active) {
                title.textContent = item.dataset.p2aTitle;
                kind.textContent = item.dataset.p2aKind;

                counter.textContent = String(index + 1)
                    .padStart(2, "0");
            }
        });

        screens.forEach(el => {
            const active = el.dataset.p2aScreen === currentId;

            el.classList.toggle("is-active", active);
            el.setAttribute(
                "aria-hidden",
                String(!active || mode !== "design")
            );
        });

        builds.forEach(el => {
            const active = el.dataset.p2aBuild === currentId;

            el.classList.toggle("is-active", active);
            el.setAttribute(
                "aria-hidden",
                String(!active || mode !== "development")
            );
        });

        stage.dataset.mode = mode;

        modeButtons.forEach(button => {
            const active = button.dataset.p2aMode === mode;

            button.classList.toggle("is-active", active);
            button.setAttribute("aria-pressed", String(active));
        });
    }

    /* Select projects */

    items.forEach((item, index) => {
        const button = item.querySelector("[data-p2a-pick]");

        button.addEventListener("click", () => {
            currentId = item.dataset.p2aItem;
            render();
        });

        /* Arrow-key navigation */

        button.addEventListener("keydown", event => {
            const keys = ["ArrowDown", "ArrowUp", "Home", "End"];
            if (!keys.includes(event.key)) return;

            event.preventDefault();

            const next = event.key === "Home"
                ? 0
                : event.key === "End"
                    ? items.length - 1
                    : (
                        index +
                        (event.key === "ArrowDown" ? 1 : -1) +
                        items.length
                    ) % items.length;

            items[next].querySelector("[data-p2a-pick]").focus();
        });
    });

    /* Design / Development */

    modeButtons.forEach(button => {
        button.addEventListener("click", () => {
            mode = button.dataset.p2aMode;
            render();
        });
    });

    if (currentId) render();
});
