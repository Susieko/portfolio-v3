
<?php
/**
 * Portfolio 2.0 — Services
 * Visual service showcase.
 */

$services = [
    [
        'number' => '01',
        'title' => 'Webdesign',
        'category' => 'WEBSITES & WEBSHOPS',
        'description' =>
            'Een website of webshop die niet alleen mooi is, '
            . 'maar logisch werkt, prettig navigeert en echt '
            . 'bij jouw merk past.',
        'tags' => [
            'UI / UX',
            'Responsive',
            'WooCommerce',
        ],
        'image' => 'webdesign.webp',
        'icon' => 'design',
    ],
    [
        'number' => '02',
        'title' => 'Branding',
        'category' => 'VISUELE IDENTITEIT',
        'description' =>
            'Van logo en huisstijl tot een herkenbare '
            . 'digitale uitstraling. Een visuele identiteit '
            . 'die jouw verhaal vertelt.',
        'tags' => [
            'Logo',
            'Huisstijl',
            'Visual identity',
        ],
        'image' => 'branding.webp',
        'icon' => 'branding',
    ],
    [
        'number' => '03',
        'title' => 'Webdevelopment',
        'category' => 'MAATWERK & SLIMME TOOLS',
        'description' =>
            'Van WordPress-maatwerk tot dashboards, '
            . 'webapps en koppelingen die processen '
            . 'eenvoudiger maken.',
        'tags' => [
            'WordPress',
            'Webapps',
            'Integraties',
        ],
        'image' => 'development.webp',
        'icon' => 'code',
    ],
];
?>

<section
    class="p2-offers"
    id="services"
    aria-labelledby="p2-offers-title"
>
    <div class="p2-offers__inner">

        <header class="p2-offers__header">
            <div>
                <p class="p2-offers__eyebrow">
                    04 / DIENSTEN
                    <span aria-hidden="true">✦</span>
                </p>

                <h2 id="p2-offers-title">
                    Meer dan alleen
                    <em>mooie websites.</em>
                </h2>
            </div>

            <div class="p2-offers__intro">
                <p>
                    Ik combineer design en development
                    om ideeën tot leven te brengen.
                    Van de eerste schets tot iets
                    dat écht voor je werkt.
                </p>


<a
    class="p2-offers__cta"
    href="<?php echo esc_url(home_url('/#contact')); ?>"
>
    <span>Bespreek jouw idee</span>
    <span class="p2-offers__cta-star" aria-hidden="true">✦</span>
</a>

            </div>
        </header>

        <div class="p2-offers__grid">

            <?php foreach ($services as $service) : ?>

                <article class="p2-offers__card">

                    <!-- IMAGE -->

                    <div class="p2-offers__visual">
                        <img
                            src="<?php echo esc_url(
                                get_theme_file_uri(
                                    'assets/images/services/'
                                    . $service['image']
                                )
                            ); ?>"
                            alt=""
                            loading="lazy"
                            decoding="async"
                            width="900"
                            height="1200"
                        >

                        <span class="p2-offers__image-label">
                            <?php echo esc_html(
                                $service['category']
                            ); ?>
                        </span>
                    </div>

                    <!-- CONTENT -->

                    <div class="p2-offers__body">

                        <div class="p2-offers__meta">

                            <span class="p2-offers__icon"
                                  aria-hidden="true">

                                <?php if ($service['icon'] === 'design') : ?>

                                    <svg viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.5">
                                        <rect x="3" y="4"
                                              width="18" height="13"
                                              rx="2"/>
                                        <path d="M8 21h8M12 17v4"/>
                                    </svg>

                                <?php elseif ($service['icon'] === 'branding') : ?>

                                    <svg viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.5">
                                        <circle cx="12" cy="12" r="9"/>
                                        <circle cx="8" cy="9" r="1"/>
                                        <circle cx="14" cy="7" r="1"/>
                                        <circle cx="17" cy="13" r="1"/>
                                        <path d="M7 16c2 0 3 1 4 3"/>
                                    </svg>

                                <?php else : ?>

                                    <svg viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.5">
                                        <path d="m8 5-6 7 6 7"/>
                                        <path d="m16 5 6 7-6 7"/>
                                        <path d="m14 3-4 18"/>
                                    </svg>

                                <?php endif; ?>

                            </span>

                            <span class="p2-offers__number">
                                <?php echo esc_html(
                                    $service['number']
                                ); ?>
                            </span>

                        </div>

                        <h3>
                            <?php echo esc_html(
                                $service['title']
                            ); ?>
                        </h3>

                        <p>
                            <?php echo esc_html(
                                $service['description']
                            ); ?>
                        </p>

                        <ul class="p2-offers__tags">
                            <?php foreach ($service['tags'] as $tag) : ?>
                                <li><?php echo esc_html($tag); ?></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

        <!-- MY APPROACH -->

        <div class="p2-offers__approach">

            <span class="p2-offers__approach-star"
                  aria-hidden="true">✦</span>

            <div class="p2-offers__approach-copy">
                <span>// MIJN AANPAK</span>

                <p>
                    Design gaat niet alleen over hoe iets
                    <em>eruitziet.</em>
                    Het gaat vooral over hoe het
                    <em>werkt.</em>
                </p>
            </div>

            <a
                class="p2-offers__more"
                href="<?php echo esc_url(
                    home_url('/diensten/')
                ); ?>"
            >
                Bekijk alle diensten
                <span aria-hidden="true">↗</span>
            </a>

        </div>

    </div>
</section>
