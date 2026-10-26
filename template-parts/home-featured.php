
<?php
/**
 * Portfolio 2.0 — Featured Work: Klaben Autos
 *
 * Design: Animated GIF
 * Development: Screenshot / optional video
 * CMS & Workflow: Screenshot / optional video
 */

$klaben_chapters = [
    [
        'id' => 'design',
        'number' => '01',
        'name' => 'Design',
        'short' => 'Van eerste concept tot digitale showroom.',
        'detail' => 'De visuele richting, voertuigkaarten, zoekervaring en responsive uitwerking — ontworpen met aandacht voor rust en detail.',
        'poster' => 'assets/images/projects/klaben-preview.webp',
        'alt' => 'Klaben Autos ontwerp en digitale showroom',
        'video' => 'assets/videos/klaben-design.mp4',
    ],
    [
        'id' => 'development',
        'number' => '02',
        'name' => 'Development',
        'short' => 'Een eigen thema, niet een standaard template.',
        'detail' => 'Een custom WordPress-thema met PHP, JavaScript en dynamische voertuigpagina’s. Ontwerp en techniek vormen samen één ervaring.',
        'poster' => 'assets/images/projects/klaben-autos.png',
        'alt' => 'Klaben Autos development preview',
        'video' => 'assets/videos/klaben-development.mp4',
    ],
[
    'id' => 'workflow',
    'number' => '03',
    'name' => 'CMS & Workflow',
    'short' => 'De slimme achterkant van de website.',
    'detail' => 'Voertuigbeheer met ACF, aanvragen via Fluent Forms en een eigen CRM-dashboard om alles overzichtelijk te verwerken. De HubSpot-koppeling is nog in ontwikkeling.',
    'poster' => 'assets/images/featured/klaben-workflow-poster.webp',
    'alt' => 'Klaben Autos voertuigbeheer in WordPress',
    'video' => 'assets/videos/klaben-workflow.mp4',
],
];
?>

<section
    class="v2-work klaben-feature"
    id="selected-work"
    aria-labelledby="klaben-feature-title"
    data-klaben-feature
>
    <div class="klaben-feature__inner">

        <!-- SECTION HEADER -->

        <header class="klaben-feature__header">

            <div>
                <p class="klaben-feature__eyebrow">
                    01 / FEATURED WORK

                    <span
                        class="klaben-feature__eyebrow-star"
                        aria-hidden="true"
                    >✦</span>
                </p>



<h2 id="klaben-feature-title">
    Klaben <em>Autos.</em>
</h2>

<p class="klaben-feature__subtitle">
    Van eerste schets tot slimme showroom.
</p>

            </div>

            <div class="klaben-feature__header-aside">

                <span class="klaben-feature__type">
                    PORTFOLIOCONCEPT / WORDPRESS MAATWERK
                </span>

                <p>
                    Van eerste ontwerp tot digitale showroom,
                    met de techniek en processen erachter.
                </p>

            
<div class="klaben-feature__cta-row">
    <a
        class="klaben-feature__case-cta"
        href="<?php echo esc_url(home_url('/klaben-autos/')); ?>"
    >
        Ontdek de volledige case
        <span aria-hidden="true">↗</span>
    </a>

    <a
        class="klaben-feature__demo-cta"
        href="<?php echo esc_url('https://klaben-autos.freepage.cc/'); ?>"
        target="_blank"
        rel="noopener noreferrer"
    >
        Bekijk de live demo
        <span aria-hidden="true">↗</span>
    </a>
</div>

            </div>

        </header>

        <!-- MAIN CONTENT -->

        <div class="klaben-feature__layout">

            <!-- MEDIA STAGE -->

            <div class="klaben-feature__stage">

                <div class="klaben-feature__media">

                    <!--
                        Initial media: Design GIF.
                        JavaScript changes this image when
                        switching chapters.
                    -->
                    
<img
    class="klaben-feature__poster"
    src="<?php echo esc_url(
        get_theme_file_uri($klaben_chapters[0]['poster'])
    ); ?>"
    alt="<?php echo esc_attr($klaben_chapters[0]['alt']); ?>"
    srcset="<?php echo esc_url(get_theme_file_uri('assets/images/projects/klaben-preview-480.webp')); ?> 480w, <?php echo esc_url(get_theme_file_uri('assets/images/projects/klaben-preview-800.webp')); ?> 800w, <?php echo esc_url(get_theme_file_uri('assets/images/projects/klaben-preview.webp')); ?> 976w"
    sizes="(max-width: 700px) 94vw, (max-width: 1100px) 65vw, 720px"
    loading="lazy"
    decoding="async"
    data-klaben-poster
>

                    <img
                        src="<?php echo esc_url(
                            get_theme_file_uri(
                                $klaben_chapters[0]['poster']
                            )
                        ); ?>"
                        alt="<?php echo esc_attr(
                            $klaben_chapters[0]['alt']
                        ); ?>"
                        srcset="<?php echo esc_url(get_theme_file_uri('assets/images/projects/klaben-preview-480.webp')); ?> 480w, <?php echo esc_url(get_theme_file_uri('assets/images/projects/klaben-preview-800.webp')); ?> 800w, <?php echo esc_url(get_theme_file_uri('assets/images/projects/klaben-preview.webp')); ?> 976w"
                        sizes="(max-width: 700px) 94vw, (max-width: 1100px) 65vw, 720px"
                        loading="lazy"
                        decoding="async"
                        data-klaben-poster
                    >

                    <!--
                        Optional video player.
                        Remains hidden when no video exists.
                    -->

                    <video
                        class="klaben-feature__video"
                        data-klaben-video
                        muted
                        playsinline
                        loop
                        preload="none"
                        aria-hidden="true"
                    ></video>

                </div>


<div class="klaben-feature__stage-foot">
    <span data-klaben-stage-number>
        01 / DESIGN
    </span>

    <span data-klaben-media-label>
        PROJECT PREVIEW
    </span>

    <button
        type="button"
        class="klaben-feature__expand"
        data-klaben-expand
        aria-label="Bekijk Klaben preview op volledig scherm"
    >
        ⤢ Groot beeld
    </button>
</div>


            </div>

            <!-- CHAPTER SELECTOR -->

            <div class="klaben-feature__chapters">

                <p class="klaben-feature__aside-label">
                    ONTDEK DE DRIE KANTEN
                </p>

                <div
                    class="klaben-feature__buttons"
                    role="group"
                    aria-label="Onderdelen van Klaben Autos"
                >

                    <?php foreach ($klaben_chapters as $index => $chapter) :

                        /*
                         * Only load a video if its path
                         * is not empty AND its file exists.
                         */

                        $video_url = !empty($chapter['video'])
                            && is_file(
                                get_theme_file_path($chapter['video'])
                            )
                                ? get_theme_file_uri($chapter['video'])
                                : '';

                    ?>

                        <button
                            type="button"

                            class="klaben-feature__chapter <?php
                                echo $index === 0
                                    ? 'is-active'
                                    : '';
                            ?>"

                            aria-pressed="<?php
                                echo $index === 0
                                    ? 'true'
                                    : 'false';
                            ?>"

                            data-klaben-chapter

                            data-number="<?php
                                echo esc_attr($chapter['number']);
                            ?>"

                            data-name="<?php
                                echo esc_attr($chapter['name']);
                            ?>"

                            data-detail="<?php
                                echo esc_attr($chapter['detail']);
                            ?>"

                            data-poster="<?php
                                echo esc_url(
                                    get_theme_file_uri(
                                        $chapter['poster']
                                    )
                                );
                            ?>"

                            data-alt="<?php
                                echo esc_attr($chapter['alt']);
                            ?>"

                            data-video="<?php
                                echo esc_url($video_url);
                            ?>"
                        >

                            <span class="klaben-feature__chapter-number">
                                <?php
                                    echo esc_html($chapter['number']);
                                ?>
                            </span>

                            <span class="klaben-feature__chapter-copy">

                                <strong>
                                    <?php
                                        echo esc_html($chapter['name']);
                                    ?>
                                </strong>

                                <small>
                                    <?php
                                        echo esc_html($chapter['short']);
                                    ?>
                                </small>

                            </span>

                            <span
                                class="klaben-feature__chapter-arrow"
                                aria-hidden="true"
                            >↗</span>

                        </button>

                    <?php endforeach; ?>

                </div>

                <!-- ACTIVE CHAPTER DESCRIPTION -->

                <div
                    class="klaben-feature__detail"
                    aria-live="polite"
                    aria-atomic="true"
                >

                    <p data-klaben-detail>
                        <?php
                            echo esc_html(
                                $klaben_chapters[0]['detail']
                            );
                        ?>
                    </p>

                </div>

            </div>

        </div>

        <!-- SECTION FOOTER -->

        <footer class="klaben-feature__footer">

            <div
                class="klaben-feature__stack"
                aria-label="Gebruikte tools"
            >
                <span>FIGMA</span>
                <span>WORDPRESS</span>
                <span>PHP</span>
                <span>ACF</span>
                <span>FLUENT FORMS</span>
            </div>

            <a href="<?php echo esc_url(home_url('/#work-archive')); ?>"">
                Ontdek mijn andere projecten
                <span aria-hidden="true">↗</span>
            </a>

        </footer>

    </div>
</section>

