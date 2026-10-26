Susan Aben — Creative Designer & Developer
Meta Vision / Portfolio 2.0 is a custom WordPress portfolio designed and developed by Susan Aben. It brings together visual design, front-end development, interactive storytelling, and selected project case studies in a responsive interface.

Highlights
- Custom-built WordPress theme, without a page builder or front-end framework for the portfolio itself.
- Animated hero and responsive sidebar/mobile navigation.
- Featured Klaben Autos case study with switchable Design, Development, and CMS & Workflow previews.
- Project archive featuring client work and applications built with different technologies.
- Interactive Lab and Behind the Build sections.
- Dark and light themes, plus Dutch and English content via TranslatePress.
- Dedicated case-study layouts, accessibility details, and reduced-motion support.
- Responsive image delivery and performance-focused asset loading.
Technology
This WordPress theme: PHP, WordPress, HTML, CSS, vanilla JavaScript, and TranslatePress.

Technologies featured in the projects: Laravel, MySQL, React, TypeScript, Tailwind CSS, WooCommerce, and C#/.NET, among others. These are showcased in the portfolio; they are not all dependencies of the portfolio theme.

The theme does not require a Node.js build step.
Selected work
Project	Focus
Klaben Autos	UX/UI, custom WordPress theme, vehicle workflows
Clientboard	Laravel application for projects, clients, and deadlines
EventFlow	React and TypeScript event-discovery interface
EHBO Petrus Donders	Custom WordPress website for an association
NoordgroeiT	Community-oriented WordPress platform
Cartnip	WooCommerce storefront concept
Wobbi	C#/.NET desktop companion, showcased as a case study


Additional work-in-progress concepts appear in the portfolio's In de maak section.
Theme structure
susan-portfolio/
├── assets/
│   ├── css/
│   ├── images/
│   ├── js/
│   └── videos/
├── template-parts/
│   ├── home-about.php
│   ├── home-archive.php
│   ├── home-contact.php
│   ├── home-featured.php
│   └── ...
├── front-page.php
├── functions.php
├── header.php
├── footer.php
├── page-*.php
├── style.css
└── README.md
Running locally
1. Set up a local WordPress installation (for example, with LocalWP).
2. Place the theme folder in wp-content/themes/susan-portfolio/.
3. Activate Susan Aben Portfolio under Appearance → Themes.
4. Set up the site's pages and homepage in WordPress to match the templates.
5. Install and configure TranslatePress if you want the Dutch/English experience.
Translation note: TranslatePress translations and WordPress settings are stored in the site's database. Cloning this theme repository alone does not reproduce those translations or settings.

No API keys or credentials should be committed to this repository.
Performance and accessibility
During local Lighthouse testing (October 2026), the portfolio achieved:
Audit	Mobile	Desktop
Performance	90	99
Accessibility	100	100
SEO	100	100


Best Practices measured 78 on the local HTTP development address. An HTTPS production audit is needed to evaluate the deployed site; these local results are not guarantees of production performance.
About
Designed and developed by Susan Aben, based in Tilburg, the Netherlands.
- GitHub profile
This repository contains the portfolio theme, not WordPress core or the database.