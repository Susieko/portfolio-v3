<?php
/**
 * Portfolio 2.0 — Work Archive
 * Later we'll move this data to a WordPress Project CPT.
 */

$archive_projects = array(
    array(
        'id' => 'clientboard',
        'name' => 'Clientboard',
        'kind' => 'Laravel / Full-stack',
        'summary' => 'Een dashboard voor projecten, taken en deadlines, van interface tot database.',
        'image' => 'assets/images/projects/clientboard-preview.png',
        'design' => 'Rustige informatiehiërarchie, overzichtelijke kaarten en een dashboard dat prettig werkt.',
        'build' => 'Laravel MVC, Eloquent-relaties, Form Requests, Blade en MySQL.',
        'stack' => array('Laravel', 'PHP', 'MySQL', 'Blade'),
        'case' => '/clientboard/',
    ),
    array(
        'id' => 'eventflow',
        'name' => 'EventFlow',
        'kind' => 'React / Front-end',
        'summary' => 'Een responsive eventapp waarin ontdekken en navigeren vanzelfsprekend voelen.',
        'image' => 'assets/images/projects/eventflow-preview.png',
        'design' => 'Editoriale eventkaarten, overzichtelijke filters en een heldere responsive layout.',
        'build' => 'React-componenten met TypeScript, Vite en Tailwind CSS.',
        'stack' => array('React', 'TypeScript', 'Vite', 'Tailwind'),
        'case' => '/eventflow/',
    ),
    array(
        'id' => 'ehbo',
        'name' => 'EHBO Petrus Donders',
        'kind' => 'WordPress / Clientwerk',
        'summary' => 'Een toegankelijk verenigingsplatform met duidelijke routes en praktische formulieren.',
        'image' => 'assets/images/work/ehbo-desktop.webp',
        'design' => 'Een menselijke uitstraling, leesbare informatie en toegankelijke aanmeldroutes.',
        'build' => 'Custom WordPress-thema, PHP-templates, JavaScript en formulierintegraties.',
        'stack' => array('WordPress', 'PHP', 'JavaScript'),
        'case' => '/ehbo-petrus-donders/',
    ),
    array(
        'id' => 'noordgroeit',
        'name' => 'NoordgroeiT',
        'kind' => 'WordPress / Community',
        'summary' => 'Een warm digitaal platform voor bewoners en initiatieven in Tilburg-Noord.',
        'image' => 'assets/images/work/noordgroeit-desktop.webp',
        'design' => 'Fotografie, toegankelijke navigatie en een herkenbare identiteit.',
        'build' => 'Custom WordPress-thema, PHP, responsive CSS en JavaScript.',
        'stack' => array('WordPress', 'PHP', 'CSS'),
        'case' => '/noordgroeit/',
    ),
    array(
        'id' => 'cartnip',
        'name' => 'Cartnip',
        'kind' => 'WooCommerce / Concept',
        'summary' => 'Een speels webshopconcept waar e-commerce en kattenliefde samenkomen.',
        'image' => 'assets/images/work/cartnip-desktop.webp',
        'design' => 'Een warme winkelidentiteit met productfotografie en speelse details.',
        'build' => 'WordPress, WooCommerce, PHP, JavaScript en eigen themastijlen.',
        'stack' => array('WooCommerce', 'PHP', 'SCSS'),
        'case' => '/cartnip/',
    ),
    array(
        'id' => 'klaben',
        'name' => 'KLABEN Autos',
        'kind' => 'Automotive / Concept',
        'summary' => 'Een premium automotive concept met duidelijke voertuigpresentaties.',
        'image' => 'assets/images/projects/klaben-preview.webp',
        'design' => 'Grote autofotografie, hiërarchie en een rustige, premium uitstraling.',
        'build' => 'Custom WordPress-ontwikkeling en formulieren; CRM-koppeling in ontwikkeling.',
        'stack' => array('WordPress', 'PHP', 'UI/UX'),
        'case' => '/klaben-autos/',
    ),
);

get_header();
?>

<section class="p2a" id="work-archive" aria-labelledby="p2a-heading">
    <div class="p2a__inner">

        <header class="p2a__intro">
            <p class="p2a__eyebrow">
                01 / THE WORK ARCHIVE
                <span aria-hidden="true">✦</span>
            </p>

            <h1 id="p2a-heading">
                Built with <em>curiosity.</em>
            </h1>

            <p>
                Van de eerste schets tot werkende code.
                Kies een project, ontdek de keuzes en bekijk
                wat er achter de schermen gebeurt.
            </p>
        </header>

        <div class="p2a__layout" data-p2a-archive>

            <!-- PROJECT ACCORDION -->
            <div class="p2a__list" aria-label="Projecten">

                <?php foreach ($archive_projects as $index => $project) :
                    $current = $index === 0;
                ?>
                    <article
                        class="p2a__item <?php echo $current ? 'is-current' : ''; ?>"
                        data-p2a-item="<?php echo esc_attr($project['id']); ?>"
                        data-p2a-title="<?php echo esc_attr($project['name']); ?>"
                        data-p2a-kind="<?php echo esc_attr($project['kind']); ?>"
                    >
                        <h2 class="p2a__item-heading">
                            <button
                                class="p2a__pick"
                                type="button"
                                aria-expanded="<?php echo $current ? 'true' : 'false'; ?>"
                                aria-controls="p2a-description-<?php echo esc_attr($project['id']); ?>"
                                data-p2a-pick="<?php echo esc_attr($project['id']); ?>"
                            >
                                <span class="p2a__number">
                                    <?php echo esc_html(sprintf('%02d', $index + 1)); ?>
                                </span>

                                <span class="p2a__name">
                                    <?php echo esc_html($project['name']); ?>
                                </span>

                                <span class="p2a__plus" aria-hidden="true">↗</span>
                            </button>
                        </h2>

                        <div
                            class="p2a__detail"
                            id="p2a-description-<?php echo esc_attr($project['id']); ?>"
                            <?php echo $current ? '' : 'hidden'; ?>
                        >
                            <p class="p2a__kind">
                                <?php echo esc_html($project['kind']); ?>
                            </p>

                            <p><?php echo esc_html($project['summary']); ?></p>

                            <div class="p2a__pills">
                                <?php foreach ($project['stack'] as $tech) : ?>
                                    <span><?php echo esc_html($tech); ?></span>
                                <?php endforeach; ?>
                            </div>

                            <a
                                class="p2a__case"
                                href="<?php echo esc_url(home_url($project['case'])); ?>"
                            >
                                Ontdek de case
                                <span aria-hidden="true">↗</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>

                <p class="p2a__list-note">
                    SELECT A PROJECT
                    <span aria-hidden="true">✳</span>
                    WATCH IT CHANGE
                </p>
            </div>

            <!-- STICKY VISUAL STAGE -->
            <aside
                class="p2a__stage"
                aria-label="Projectpresentatie"
                data-p2a-stage
                data-mode="design"
            >
                <div class="p2a__stage-head">
                    <span>
                        PROJECT VIEW /
                        <span data-p2a-stage-count>01</span>
                    </span>

                    <div class="p2a__modes" role="group"
                         aria-label="Bekijk als ontwerp of development">
                        <button type="button" class="is-active"
                                data-p2a-mode="design"
                                aria-pressed="true">
                            Design
                        </button>
                        <button type="button"
                                data-p2a-mode="development"
                                aria-pressed="false">
                            Development
                        </button>
                    </div>
                </div>

                <div class="p2a__stage-body">

                    <!-- REAL PROJECT SCREENSHOTS -->
                    <div class="p2a__screens">
                        <?php foreach ($archive_projects as $index => $project) : ?>
                            <div
                                class="p2a__screen <?php echo $index === 0 ? 'is-active' : ''; ?>"
                                data-p2a-screen="<?php echo esc_attr($project['id']); ?>"
                                aria-hidden="<?php echo $index === 0 ? 'false' : 'true'; ?>"
                            >
                                <div class="p2a__browser-bar" aria-hidden="true">
                                    <i></i><i></i><i></i>
                                    <span>design / <?php echo esc_html($project['id']); ?></span>
                                </div>

                                <img
                                    src="<?php echo esc_url(get_template_directory_uri() . '/' . $project['image']); ?>"
                                    alt="<?php echo esc_attr('Websitevoorbeeld: ' . $project['name']); ?>"
                                    loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>"
                                    decoding="async"
                                >
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- DEVELOPMENT / DESIGN DETAILS -->
                    <div class="p2a__builds">
                        <?php foreach ($archive_projects as $index => $project) : ?>
                            <div
                                class="p2a__build <?php echo $index === 0 ? 'is-active' : ''; ?>"
                                data-p2a-build="<?php echo esc_attr($project['id']); ?>"
                                aria-hidden="true"
                            >
                                <span class="p2a__build-kicker">
                                    BEHIND THE INTERFACE /
                                    <?php echo esc_html(sprintf('%02d', $index + 1)); ?>
                                </span>

                                <span class="p2a__build-symbol" aria-hidden="true">{ }</span>

                                <h3><?php echo esc_html($project['name']); ?></h3>

                                <p class="p2a__build-label">DESIGN THINKING</p>
                                <p><?php echo esc_html($project['design']); ?></p>

                                <p class="p2a__build-label">DEVELOPMENT</p>
                                <p><?php echo esc_html($project['build']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <div class="p2a__stage-foot">
                    <strong data-p2a-stage-title>
                        <?php echo esc_html($archive_projects[0]['name']); ?>
                    </strong>

                    <span data-p2a-stage-kind>
                        <?php echo esc_html($archive_projects[0]['kind']); ?>
                    </span>
                </div>
            </aside>

        </div>
    </div>
</section>

<?php get_footer(); ?>
