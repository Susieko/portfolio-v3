
<?php
/**
 * Portfolio 2.0 — Work archive (editorial alternating layout).
 * Featured Klaben lives earlier on the homepage; this is the full index.
 * Each project shows Design + Development together, without extra tabs.
 */

$archive_projects = [
    [
        'id' => 'clientboard',
        'name' => 'Clientboard',
        'type' => 'Laravel / Full-stack',
        'eyebrow' => 'DASHBOARD / WEB APPLICATION',
        'intro' => 'Een speels dashboard voor projecten, klanten en deadlines — van interface tot database.',
        'tags' => ['Laravel', 'PHP', 'MySQL', 'Blade'],
        'design' => 'Een dashboard met karakter: duidelijke statusinformatie, rustige hiërarchie en speelse details.',
        'development' => 'Laravel MVC, Eloquent-relaties en CRUD-functionaliteit met validatie en databaseopslag.',
        'desktop' => 'projects/clientboard-preview.png',
        'mobile' => 'projects/clientboard-mobile.png',
        'alt' => 'Clientboard projectdashboard op desktop',
        'case' => '/clientboard/',
        'demo' => 'https://clientboard-production.up.railway.app/',
        'accent' => 'lavender',
    ],
    [
        'id' => 'eventflow',
        'name' => 'EventFlow',
        'type' => 'React / TypeScript',
        'eyebrow' => 'EVENT DISCOVERY / FRONT-END',
        'intro' => 'Evenementen ontdekken moet intuïtief voelen, niet als zoeken in een spreadsheet.',
        'tags' => ['React', 'TypeScript', 'Tailwind', 'Motion'],
        'design' => 'Een visuele ontdekervaring met filters, favorieten en verfijnde micro-interacties.',
        'development' => 'Herbruikbare React-componenten, getypeerde data, state-management en responsieve interacties.',
        'desktop' => 'projects/eventflow-preview.png',
        'mobile' => 'projects/eventflow-mobile.png',
        'alt' => 'EventFlow evenementoverzicht en zoekervaring',
        'case' => '/eventflow/',
        'demo' => 'https://eventflow-gamma-eight.vercel.app/',
        'accent' => 'blue',
    ],
    [
        'id' => 'ehbo',
        'name' => 'EHBO Petrus Donders',
        'type' => 'WordPress / Vereniging',
        'eyebrow' => 'ORGANISATIE / WEBSITE',
        'intro' => 'Een toegankelijke, herkenbare website voor een vereniging met een lange geschiedenis.',
        'tags' => ['WordPress', 'PHP', 'UX/UI', 'Forms'],
        'design' => 'Een frisse uitstraling met een duidelijke informatiehiërarchie en gebruiksvriendelijke routes.',
        'development' => 'Een maatwerk WordPress-thema met aanmeld- en aanvraagformulieren en responsive opbouw.',
        'desktop' => 'work/ehbo-desktop.webp',
        'mobile' => 'work/ehbo-mobile.webp',
        'alt' => 'Websiteconcept EHBO Petrus Donders',
        'case' => '/ehbo-petrus-donders/',
        'demo' => 'https://ehbo-preview.mr-lily.workers.dev/',
        'accent' => 'rose',
    ],
    [
        'id' => 'noordgroeit',
        'name' => 'NoordgroeiT',
        'type' => 'Community / WordPress',
        'eyebrow' => 'STICHTING / COMMUNITY',
        'intro' => 'Een warm digitaal thuis voor initiatieven, vrijwilligers en bewoners van Tilburg-Noord.',
        'tags' => ['WordPress', 'PHP', 'JavaScript', 'UX'],
        'design' => 'Een menselijk, toegankelijk ontwerp dat bewoners en projecten helder met elkaar verbindt.',
        'development' => 'Maatwerk WordPress-ontwikkeling met responsive componenten en flexibele inhoud.',
        'desktop' => 'work/noordgroeit-desktop.webp',
        'mobile' => 'work/noordgroeit-mobile.webp',
        'alt' => 'NoordgroeiT homepage met Tilburg-Noord fotografie',
        'case' => '/noordgroeit/',
        'demo' => 'https://noordgroeit.nl/',
        'accent' => 'mint',
    ],
    [
        'id' => 'cartnip',
        'name' => 'Cartnip',
        'type' => 'WooCommerce / E-commerce',
        'eyebrow' => 'WEBSHOP / DIGITAL COMMERCE',
        'intro' => 'Een eigenzinnige webwinkel waar speelse vormgeving en e-commerce elkaar ontmoeten.',
        'tags' => ['WooCommerce', 'WordPress', 'PHP', 'UI'],
        'design' => 'Een herkenbare shopervaring met productfocus, speelse typografie en verzorgde productpresentatie.',
        'development' => 'WooCommerce-functionaliteit, maatwerk styling en een responsive winkelervaring.',
        'desktop' => 'work/cartnip-desktop.webp',
        'mobile' => 'work/cartnip-mobile.webp',
        'alt' => 'Cartnip WooCommerce webshopconcept',
        'case' => '/cartnip/',
        'demo' => 'https://cartnip.mr-lily.workers.dev/',
        'accent' => 'peach',
    ],
    [
        'id' => 'wobbi',
        'name' => 'Wobbi',
        'type' => 'C# / .NET Desktop',
        'eyebrow' => 'DESKTOP COMPANION / V0.2',
        'intro' => 'Een kleine desktop-companion met een verrassend grote persoonlijkheid. Wobbi v0.2 is een werkend prototype in C# en .NET.',
        'tags' => ['C#', '.NET 10', 'WPF', 'Ollama'],
        'design' => 'Een eigen galaxy-karakter met expressieve emoties, soepele animaties en speelse interacties.',
        'development' => 'Een WPF-app met slepen, aaien, slaapstand en lokale AI-gesprekken via Ollama en Qwen3.',
        'desktop' => 'workbench/wobbi.png',
        'mobile' => '',
        'alt' => 'Wobbi, een rond galaxy-karakter met sterrenogen en een ster aan zijn staart',
        'case' => '/wobbi/',
        'demo' => 'https://github.com/Susieko/Wobbi',
        'demo_label' => 'Bekijk GitHub',
        'accent' => 'wobbi',
    ],
];
?>
<section class="p2-gallery" id="work-archive" aria-labelledby="p2-gallery-title">
    <div class="p2-gallery__inner">
        <header class="p2-gallery__header">
            <div>
                <p class="p2-gallery__eyebrow">02 / THE WORK ARCHIVE <span aria-hidden="true">✦</span></p>
                <h2 id="p2-gallery-title">Built with <em>curiosity.</em></h2>
            </div>
            <p class="p2-gallery__lead">Van de eerste schets tot werkende code. Zes projecten, elk met een eigen verhaal.</p>
        </header>

        <div class="p2-gallery__collection">
            <?php foreach ($archive_projects as $index => $project) :
                $number = sprintf('%02d', $index + 1);
                $desktop_url = get_theme_file_uri('assets/images/' . $project['desktop']);
                $has_mobile = !empty($project['mobile']) && is_file(get_theme_file_path('assets/images/' . $project['mobile']));
                $mobile_url = $has_mobile ? get_theme_file_uri('assets/images/' . $project['mobile']) : '';
            ?>
                <article
                    class="p2-gallery__project p2-gallery__project--<?php echo esc_attr($project['accent']); ?>"
                    id="archive-<?php echo esc_attr($project['id']); ?>"
                    aria-labelledby="gallery-<?php echo esc_attr($project['id']); ?>"
                    data-gallery-project
                >
                    <div class="p2-gallery__story">
                        <div class="p2-gallery__meta">
                            <span><?php echo esc_html($number); ?> / <?php echo esc_html($project['type']); ?></span>
                            <span class="p2-gallery__meta-star" aria-hidden="true">✦</span>
                        </div>
                        <h3 id="gallery-<?php echo esc_attr($project['id']); ?>"><?php echo esc_html($project['name']); ?><span aria-hidden="true">.</span></h3>
                        <p class="p2-gallery__intro"><?php echo esc_html($project['intro']); ?></p>
                        <ul class="p2-gallery__tags" aria-label="Technieken">
                            <?php foreach ($project['tags'] as $tag) : ?>
                                <li><?php echo esc_html($tag); ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="p2-gallery__discipline">
                            <div>
                                <span class="p2-gallery__discipline-title">DESIGN</span>
                                <p><?php echo esc_html($project['design']); ?></p>
                            </div>
                            <div>
                                <span class="p2-gallery__discipline-title">DEVELOPMENT</span>
                                <p><?php echo esc_html($project['development']); ?></p>
                            </div>
                        </div>
                        <div class="p2-gallery__actions">
                            <a class="p2-gallery__action p2-gallery__action--primary" href="<?php echo esc_url(home_url($project['case'])); ?>"><span class="p2-gallery__action-label">Ontdek de case</span></a>
                            <?php if (!empty($project['demo'])) : ?>
                                <a class="p2-gallery__action p2-gallery__action--secondary" href="<?php echo esc_url($project['demo']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr(($project['demo_label'] ?? 'Bekijk demo') . ' van ' . $project['name'] . ' (opent in een nieuw tabblad)'); ?>"><span class="p2-gallery__action-label"><?php echo esc_html($project['demo_label'] ?? 'Bekijk demo'); ?></span></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="p2-gallery__visual<?php echo $has_mobile ? '' : ' p2-gallery__visual--solo'; ?>" aria-label="Projectafbeelding: <?php echo esc_attr($project['name']); ?>">
                        <span class="p2-gallery__huge-index" aria-hidden="true"><?php echo esc_html($number); ?></span>
                        <span class="p2-gallery__orbit" aria-hidden="true"></span>
                        <a class="p2-gallery__screenshot<?php echo $project['id'] === 'wobbi' ? ' p2-gallery__screenshot--wobbi' : ''; ?>" href="<?php echo esc_url(home_url($project['case'])); ?>" aria-label="Bekijk de case van <?php echo esc_attr($project['name']); ?>">
                            <?php if ($project['id'] === 'wobbi') : ?>
                                <span class="p2-gallery__wobbi-showcase" aria-hidden="true">
                                    <span class="p2-gallery__wobbi-version">A LITTLE COSMIC COMPANION <span>✦</span></span>
                                    <?php if (is_file(get_theme_file_path('assets/images/workbench/wobbi.png'))) : ?>
                                        <img src="<?php echo esc_url($desktop_url); ?>" alt="" loading="lazy" decoding="async">
                                    <?php else : ?>
                                        <span class="p2-gallery__wobbi-fallback">W<span>✦</span></span>
                                    <?php endif; ?>
                                    <span class="p2-gallery__wobbi-caption">WOBBI <small>VERSION 0.2 · C# / WPF / LOCAL AI</small></span>
                                </span>
                            <?php else : ?>
                                <img
                                    src="<?php echo esc_url($desktop_url); ?>"
                                    <?php if ($project['id'] === 'clientboard') : ?>
                                        srcset="<?php echo esc_url(get_theme_file_uri('assets/images/projects/clientboard-preview-480.webp')); ?> 480w, <?php echo esc_url(get_theme_file_uri('assets/images/projects/clientboard-preview-800.webp')); ?> 800w, <?php echo esc_url(get_theme_file_uri('assets/images/projects/clientboard-preview-1200.webp')); ?> 1200w, <?php echo esc_url($desktop_url); ?> 1839w"
                                        sizes="(max-width: 700px) 92vw, (max-width: 1100px) 60vw, 720px"
                                    <?php endif; ?>
                                    alt="" loading="lazy" decoding="async"
                                >
                            <?php endif; ?>
                        </a>
                        <?php if ($has_mobile) : ?>
                            <div class="p2-gallery__mobile" aria-hidden="true">
                                <img src="<?php echo esc_url($mobile_url); ?>" alt="" loading="lazy" decoding="async">
                            </div>
                        <?php endif; ?>
                        <span class="p2-gallery__visual-label"><?php echo esc_html($project['eyebrow']); ?></span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <footer class="p2-gallery__footer">
            <span>END OF COLLECTION / 2026</span>
            <a href="<?php echo esc_url(home_url('/#contact')); ?>">Samen iets maken?</a>
        </footer>
    </div>
</section>