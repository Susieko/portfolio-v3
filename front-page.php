<?php get_header(); ?>


<section class="meta-hero" id="home">


    <div
        class="meta-hero__background"
        aria-hidden="true"
    ></div>


    <!-- =====================================================
         META VISION SYSTEM
         ===================================================== -->
    <div
        class="meta-vision"
        aria-hidden="true"
    >

    <!-- META VISION MICRO OBJECTS -->

<div
    class="meta-orbit-token meta-orbit-token--code"
    data-orbit-angle="15"
    aria-hidden="true"
>
    &lt;/&gt;
</div>

<div
    class="meta-orbit-token meta-orbit-token--braces"
    data-orbit-angle="75"
    aria-hidden="true"
>
    { }
</div>

<div
    class="meta-orbit-token meta-orbit-token--type"
    data-orbit-angle="195"
    aria-hidden="true"
>
    Aa
</div>

<div
    class="meta-orbit-token meta-orbit-token--cursor"
    data-orbit-angle="260"
    aria-hidden="true"
>
    ↗
</div>

        <div class="meta-vision__track"></div>


        <!-- 01 - BROWSER / WIREFRAME -->
        <div
    class="meta-card meta-card--browser"
    data-orbit-angle="290"
>

            <div class="meta-card__bar">

                <div class="meta-card__dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <span>
                    Meta Vision
                </span>

            </div>

            <div class="browser-ui">

                <div class="browser-ui__nav"></div>

                <div class="browser-ui__layout">

                    <div class="browser-ui__copy">

                        <span></span>
                        <span></span>
                        <span></span>

                        <div class="browser-ui__button"></div>

                    </div>

                    <div class="browser-ui__image"></div>

                </div>

                <div class="browser-ui__cards">

                    <span></span>
                    <span></span>
                    <span></span>

                </div>

            </div>

        </div>


        <!-- 02 - CODE -->
        <div
    class="meta-card meta-card--code"
    data-orbit-angle="345"
>

            <div class="meta-card__bar">

                <div class="meta-card__dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <span>
                    hero.css
                </span>

            </div>

            <div class="meta-code">

                <div>
                    <b>.creative-dev</b> {
                </div>

                <div>
                    &nbsp;&nbsp;display:
                    <em>grid</em>;
                </div>

                <div>
                    &nbsp;&nbsp;perspective:
                    <strong>1200px</strong>;
                </div>

                <div>
                    &nbsp;&nbsp;overflow:
                    <em>visible</em>;
                </div>

                <div>
                    }
                </div>

            </div>

        </div>


        <!-- 03 - ANALYTICS -->
        <div
    class="meta-card meta-card--analytics"
    data-orbit-angle="40"
>

            <div class="meta-card__label">
                interaction
            </div>

            <svg
                class="analytics-chart"
                viewBox="0 0 260 110"
                aria-hidden="true"
            >
                <path
                    class="analytics-chart__grid"
                    d="
                        M0 25 H260
                        M0 55 H260
                        M0 85 H260
                    "
                />

                <path
                    class="analytics-chart__line"
                    d="
                        M5 83
                        C34 74 42 45 70 52
                        S108 91 137 62
                        S173 33 194 49
                        S223 28 255 18
                    "
                />

                <circle cx="70" cy="52" r="4"></circle>
                <circle cx="137" cy="62" r="4"></circle>
                <circle cx="194" cy="49" r="4"></circle>
                <circle cx="255" cy="18" r="4"></circle>
            </svg>

            <div class="analytics-stats">

                <span>
                    <b>99</b>
                    performance
                </span>

                <span>
                    <b>100%</b>
                    responsive
                </span>

            </div>

        </div>


        <!-- 04 - DESIGN SYSTEM -->
        <div
    class="meta-card meta-card--design"
    data-orbit-angle="110"
>

            <div class="meta-card__label">
                design system
            </div>

            <div class="design-colors">

                <span></span>
                <span></span>
                <span></span>
                <span></span>

            </div>

            <div class="design-type">

                <strong>Aa</strong>

                <div>
                    <span>Display / 64</span>
                    <span>Body / 16</span>
                    <span>Label / 12</span>
                </div>

            </div>

        </div>


        <!-- 05 - TERMINAL -->
        <div
    class="meta-card meta-card--terminal"
    data-orbit-angle="165"
>

            <div class="meta-card__bar">

                <div class="meta-card__dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <span>
                    terminal
                </span>

            </div>

            <div class="terminal-lines">

                <p>
                    <span>›</span>
                    npm run build
                </p>

                <p>
                    ✓ compiling styles
                </p>

                <p>
                    ✓ interactions loaded
                </p>

                <p>
                    ✓ ready to create
                    <i></i>
                </p>

            </div>

        </div>


        <!-- 06 - COMPONENTS -->
        <div
    class="meta-card meta-card--components"
    data-orbit-angle="225"
>

            <div class="meta-card__label">
                components
            </div>

            <div class="component-demo">

                <div class="component-demo__top">

                    <span></span>

                    <div>
                        <i></i>
                        <i></i>
                        <i></i>
                    </div>

                </div>

                <div class="component-demo__body">

                    <span></span>
                    <span></span>
                    <span></span>

                </div>

                <span class="component-demo__fake-button">
                    Explore
                </span>

            </div>

        </div>


        <!-- little system nodes -->
        <span class="meta-node meta-node--1"></span>
        <span class="meta-node meta-node--2"></span>
        <span class="meta-node meta-node--3"></span>
        <span class="meta-node meta-node--4"></span>

    </div>


    <!-- =====================================================
         PORTRAIT
         ===================================================== -->
    <div class="meta-hero__portrait">

        <img
            src="<?php
                echo esc_url(
                    get_template_directory_uri()
                    . '/assets/images/susan-hero.webp'
                );
            ?>"
            srcset="<?php echo esc_url(get_theme_file_uri('assets/images/susan-hero-640.webp')); ?> 640w, <?php echo esc_url(get_theme_file_uri('assets/images/susan-hero-960.webp')); ?> 960w, <?php echo esc_url(get_theme_file_uri('assets/images/susan-hero-1200.webp')); ?> 1200w, <?php echo esc_url(get_theme_file_uri('assets/images/susan-hero.webp')); ?> 1448w"
            sizes="(max-width: 600px) 146vw, (max-width: 900px) 82vw, 60vw"
            alt=""
            width="1448"
            height="1086"
            decoding="async"
            fetchpriority="high"
        >

    </div>


    <!-- =====================================================
         HERO CONTENT
         ===================================================== -->
    <div class="meta-hero__content">

        <p class="meta-hero__eyebrow">
            Hallo, ik ben
        </p>


<h1 class="meta-hero__title">
    <span class="meta-hero__name-line">Susan</span>
    <span class="meta-hero__name-line">Aben</span>
</h1>


        <p class="meta-hero__role">
            Creative Designer
            <span>&amp;</span>
            Developer
        </p>

<div class="meta-hero__availability">
    <span class="meta-hero__availability-dot" aria-hidden="true"></span>
    Open voor projecten
</div>


<!-- Your existing skills -->
<div class="meta-hero__tags" aria-label="Vaardigheden">
    <span>Wordpress</span>
    <span>PHP</span>
    <span>Laravel</span>
    <span>JavaScript</span>
    <span>Typescript</span>
    <span>Git</span>
    <span>React</span>
    <span>Figma</span>
</div>

<!-- Both hero buttons belong inside ONE wrapper -->
<div class="meta-hero__actions">

    <a
        class="meta-hero__cta"
        href="<?php echo esc_url(home_url('/#work-archive')); ?>"
    >
        Bekijk projecten
        <span aria-hidden="true">→</span>
    </a>

    <a
        href="https://github.com/Susieko"
        class="meta-hero__github"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Bekijk mijn GitHub-profiel (opent in nieuw tabblad)"
    >

<svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 16 16"
    width="20"
    height="20"
    fill="currentColor"
    aria-hidden="true"
    focusable="false"
>
    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82a7.65 7.65 0 0 1 2-.27c.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.28.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
</svg>


        <span>GitHub</span>
    </a>

</div>


</section>


<?php // Portfolio 2.0 preview: additions only; the original Meta Vision hero above remains untouched. ?>
<div class="v2-reading-progress" aria-hidden="true"><span class="v2-reading-progress__fill"></span></div>

<?php get_template_part('template-parts/home-featured'); ?>

<?php get_template_part('template-parts/home-archive'); ?>

<?php get_template_part('template-parts/home-workbench'); ?>

<?php get_template_part('template-parts/home-services'); ?>

<?php get_template_part('template-parts/home-lab'); ?>


<?php get_template_part('template-parts/home-about'); ?>

<?php get_template_part('template-parts/home-contact'); ?>

<?php get_footer(); ?>
