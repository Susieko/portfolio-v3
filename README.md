# Susan Aben — Portfolio V3

**Creative Designer & Developer** · Tilburg, the Netherlands

A custom WordPress portfolio where **design meets development**. Portfolio V3 brings together interactive storytelling, thoughtful UI, subtle motion, and selected projects in one responsive experience.

**Custom WordPress theme** · **Dark & light mode** · **NL / EN** · **Responsive design**

---

## ✨ Highlights

- **Immersive homepage** — animated hero, custom sidebar navigation, and mobile-friendly layouts.
- **Featured Klaben Autos project** — interactive Design, Development, and CMS & Workflow previews, with links to the case study and live demo.
- **Selected work archive** — client websites, creative experiments, and full-stack applications.
- **Interactive Lab & Behind the Build** — a playful look at the tools and ideas behind the work.
- **Dedicated case studies** — consistent project pages for deeper exploration.
- **Thoughtful implementation** — reduced-motion support, responsive images, and accessibility-minded interactions.

## 🛠️ Technology

| This portfolio is built with | Used in featured projects |
| --- | --- |
| WordPress, PHP, HTML, CSS, vanilla JavaScript | Laravel, MySQL, React, TypeScript, Tailwind CSS, WooCommerce, C#/.NET |

The portfolio itself uses a **custom WordPress theme**, without a page builder or front-end JavaScript framework. **TranslatePress** handles Dutch and English content.

> Technologies shown in project case studies are not necessarily dependencies of this WordPress theme. No Node.js build step is required to run the theme.

## 💼 Selected work

| Project | Focus |
| --- | --- |
| **Klaben Autos** | UX/UI, custom WordPress development, automotive workflows |
| **Clientboard** | Laravel application for clients, projects, and deadlines |
| **EventFlow** | React and TypeScript event-discovery application |
| **EHBO Petrus Donders** | Custom WordPress website for an association |
| **NoordgroeiT** | Community-focused WordPress platform |
| **Cartnip** | WooCommerce storefront concept |
| **Wobbi** | C#/.NET desktop companion, presented as a case study |

Additional experiments and works in progress appear in the portfolio's *In de maak* section.

## 📁 Theme structure

```text
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
```

## 🚀 Run locally

1. Install WordPress locally (for example, using **LocalWP**).
2. Place this repository in `wp-content/themes/susan-portfolio/`.
3. Activate the theme in **Appearance → Themes**.
4. Set up the required WordPress pages and homepage.
5. Install and configure **TranslatePress** for Dutch/English content.

**Important:** This repository contains **theme source code only**. WordPress settings, pages, media-library data, and TranslatePress translations are stored in the site's database and are not recreated by cloning the theme.

## 📊 Lighthouse results

Measured on the **LocalWP development site (October 2026)**:

| Audit | Mobile | Desktop |
| --- | ---: | ---: |
| **Performance** | **90** | **99** |
| **Accessibility** | **100** | **100** |
| **SEO** | **100** | **100** |
| Best Practices | 78 | 78 |

*The local development URL uses HTTP, which Lighthouse flags in Best Practices. Scores may differ on production hosting; HTTPS and production performance still need verification.*

## 👋 About

Designed and developed by **Susan Aben**, a creative designer and developer based in Tilburg, the Netherlands.

[Explore my GitHub profile](https://github.com/Susieko)

---

<sub>This repository contains the custom WordPress theme—not WordPress core, site database, or private credentials.</sub>
