# Portfolio 2.0 — First prototype (22 October 2026)

This is a **separate copy** of the supplied `susan-portfolio` WordPress theme.
The existing **Meta Vision hero**, **sidebar**, existing **Werk carousel**, and individual case study templates were not redesigned.

## What was added

- A galaxy-blue / lavender **Featured Work** section underneath the existing homepage hero.
- Three real project previews from the supplied theme: **Clientboard**, **EHBO Petrus Donders**, and **EventFlow**.
- Accessible tab selection for projects (click, Arrow Left/Right, Home, End).
- A **Design / Development** switch for each project, with focused explanations.
- A minimal **page reading progress line**; on desktop it follows the scrolling `.site-content` panel, on mobile it follows the window.
- An additional scroll-enabled state on the homepage **inside the existing desktop frame**, so the sidebar remains in place.
- Responsive styling and reduced-motion adjustments.

## Exact files changed/added

Changed:
- `front-page.php` (adds the section after the hero)
- `functions.php` (loads new assets on homepage only)

Added:
- `template-parts/home-featured.php` (project data & markup)
- `assets/css/portfolio-v2.css` (all new appearance, separated from old main.css)
- `assets/js/portfolio-v2.js` (tabs, view switch and progress)

Everything else is inherited from the supplied theme unchanged.

## How to preview safely

1. Unzip into `wp-content/themes/susan-portfolio-v2/` in **LocalWP**. The folder should contain `style.css`, `functions.php`, etc. **directly**, not under an extra nested folder.
2. In LocalWP **Appearance → Themes**, switch to *Susan Aben Portfolio*. The ZIP has the **same theme display name** as the current theme, so be careful to select the new folder, or rename the existing folder temporarily in a disposable local test site.
3. If you prefer testing against the existing site without activating a duplicate-name theme, **back up the current folder** and copy only the five files described above into it.
4. Open the homepage. **Scroll inside the right-hand framed content** on desktop to get to Featured Work. On mobile use normal page scrolling.
5. Test all three tabs, the Design/Development switch, keyboard arrows, narrower screens, and the progress line.

## Important scope notes

- **Not yet CMS-driven:** featured project details live in `template-parts/home-featured.php`. ACF / custom post types are a future stage after visual approval.
- **Not yet implemented:** Playground, About, Contact, full day/night theme toggle, GSAP animation system.
- The demo deliberately uses CSS and vanilla JS to stay small and reversible; TypeScript/GSAP can be introduced in later passes.
- No production WordPress environment was available for full integration QA. PHP syntax and in-browser component behaviors were checked separately.
- Existing project case-study links use their currently expected WordPress slugs; verify they resolve on your local installation.
