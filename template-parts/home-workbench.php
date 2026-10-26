<?php
/**
 * Portfolio 2.0 — In de maak.
 * Replace template-parts/home-workbench.php with this file.
 * Images are optional; each project has an intentionally designed fallback.
 */

$making_projects = [
    [
        'slug' => 'eaa',
        'name' => 'Initiatief EAA',
        'status' => 'CONCEPT & ONTWIKKELING',
        'category' => 'ENERGIE / DIGITALE IDENTITEIT',
        'description' => 'Een helder digitaal verhaal rond energiepieken en lokale samenwerking. De visuele richting en inhoud krijgen stap voor stap vorm.',
        'stack' => 'Branding · UX/UI · Webconcept',
        'image' => 'assets/images/workbench/iniatiefEAA.png',
        'alt' => 'Visuele uitwerking voor Initiatief EAA',
    ],
    [
        'slug' => 'sportgala',
        'name' => 'Tilburgs Sportgala',
        'status' => 'VAN ONTWERP NAAR BOUW',
        'category' => 'SPORT / WEB EXPERIENCE',
        'description' => 'Een nieuwe digitale uitstraling met ruimte voor sporters, nominaties en stemmen. Het homepage-ontwerp is uitgewerkt; de website volgt.',
        'stack' => 'Figma · WordPress · UI design',
        'image' => 'assets/images/workbench/sportgala.png',
        'alt' => 'Homepageconcept voor Tilburgs Sportgala',
    ],
    [
        'slug' => 'birbbuds',
        'name' => 'BirbBuds',
        'status' => 'INTERACTIEF EXPERIMENT',
        'category' => 'PLAYGROUND / MOTION',
        'description' => 'Een expressieve SVG-valkparkiet met moods, micro-interacties en een eigen persoonlijkheid.',
        'stack' => 'React · TypeScript · Motion',
        'image' => 'assets/images/workbench/birbbuds-preview.webp',
        'alt' => 'BirbBuds interactieve valkparkiet',
    ],
    [
        'slug' => 'crowdpulse',
        'name' => 'CrowdPulse',
        'status' => 'CONCEPT / GEPLAND',
        'category' => 'DASHBOARD / DATAVISUALISATIE',
        'description' => 'Een idee voor een expressief datadashboard waar inzichten en visualisaties centraal staan. De visuele en technische verkenning moet nog beginnen.',
        'stack' => 'Concept · React · Datavisualisatie',
        'image' => 'assets/images/workbench/crowdpulse-preview.webp',
        'alt' => 'Conceptillustratie voor CrowdPulse: grafieken en dashboards',
    ],
    [
        'slug' => 'flowforge',
        'name' => 'FlowForge',
        'status' => 'CONCEPT / GEPLAND',
        'category' => 'NODE.JS / WORKFLOW AUTOMATION',
        'description' => 'Een concept voor een visuele workflowbouwer met verbonden stappen. Een toekomstig oefenproject om Node.js en Express te leren.',
        'stack' => 'Concept · Node.js · Express',
        'image' => 'assets/images/workbench/flowforge-preview.webp',
        'alt' => 'Conceptillustratie voor FlowForge: verbonden werkflownodes',
    ],
];
?>
<section class="p2-making" id="currently-crafting" aria-labelledby="p2-making-title">
    <div class="p2-making__inner">
        <header class="p2-making__header">
            <div>
                <p class="p2-making__eyebrow">IN THE MAKING <span aria-hidden="true">✦</span></p>
                <h2 id="p2-making-title">In de maak<span class="p2-making__dot">.</span></h2>
            </div>
            <p class="p2-making__intro">Niet alles hoeft al af te zijn. Een kijkje in wat ik ontwerp, bouw en uitprobeer — van echte websites tot kleine experimenten.</p>
        </header>

        <div class="p2-making__featured">
            <?php foreach (array_slice($making_projects, 0, 2) as $index => $project) :
                $has_image = is_file(get_theme_file_path($project['image']));
            ?>
                <article class="p2-making__feature p2-making__feature--<?php echo esc_attr($project['slug']); ?>" aria-labelledby="p2-making-<?php echo esc_attr($project['slug']); ?>">
                    <div class="p2-making__art p2-making__art--<?php echo esc_attr($project['slug']); ?>">
                        <span class="p2-making__index"><?php echo esc_html(sprintf('%02d', $index + 1)); ?> / IN PROGRESS</span>
                        <?php if ($has_image) : ?>
                            <img src="<?php echo esc_url(get_theme_file_uri($project['image'])); ?>" alt="<?php echo esc_attr($project['alt']); ?>" loading="lazy" decoding="async">
                        <?php elseif ($project['slug'] === 'eaa') : ?>
                            <div class="p2-making__eaa-art" aria-hidden="true">
                                <span class="p2-making__art-label">ENERGIE IN BEWEGING</span>
                                <svg viewBox="0 0 600 170" role="presentation" focusable="false">
                                    <path d="M0 105 H65 L100 105 L135 42 L183 148 L240 78 L292 78 L330 25 L388 137 L435 78 L493 78 L530 105 H600" fill="none" stroke="currentColor" stroke-width="4" stroke-linejoin="round" stroke-linecap="round"/>
                                    <path d="M0 105 H65 L100 105 L135 42 L183 148 L240 78 L292 78 L330 25 L388 137 L435 78 L493 78 L530 105 H600" fill="none" stroke="currentColor" stroke-opacity=".15" stroke-width="18"/>
                                </svg>
                                <strong>Initiatief EAA</strong>
                            </div>
                        <?php else : ?>
                            <div class="p2-making__gala-art" aria-hidden="true">
                                <span>TILBURG</span>
                                <strong>SPORT<br>GALA<span class="p2-making__gala-star">✦</span></strong>
                                <small>TROTS OP ONZE SPORTERS</small>
                            </div>
                        <?php endif; ?>
                        <span class="p2-making__status"><?php echo esc_html($project['status']); ?></span>
                    </div>
                    <div class="p2-making__feature-copy">
                        <div class="p2-making__meta"><?php echo esc_html($project['category']); ?></div>
                        <h3 id="p2-making-<?php echo esc_attr($project['slug']); ?>"><?php echo esc_html($project['name']); ?></h3>
                        <p><?php echo esc_html($project['description']); ?></p>
                        <span class="p2-making__stack"><?php echo esc_html($project['stack']); ?></span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="p2-making__experimental">
            <div class="p2-making__experimental-heading">
                <span>02 / THE PLAYGROUND</span>
                <span>AND THE IDEAS KEEP COMING <span aria-hidden="true">✳</span></span>
            </div>
            <div class="p2-making__mini-grid">
                <?php foreach (array_slice($making_projects, 2) as $project) :
                    $has_image = is_file(get_theme_file_path($project['image']));
                ?>
                    <article class="p2-making__mini p2-making__mini--<?php echo esc_attr($project['slug']); ?>" aria-labelledby="p2-making-<?php echo esc_attr($project['slug']); ?>">
                        <div class="p2-making__mini-visual p2-making__mini-visual--<?php echo esc_attr($project['slug']); ?>">
                            <?php if ($project['slug'] === 'birbbuds' && is_file(get_theme_file_path('assets/svg/birbbuds.svg'))) : ?>
                                <div class="p2-making__pip-wrap">
                                    <img
                                        class="p2-making__pip"
                                        src="<?php echo esc_url(get_theme_file_uri('assets/svg/birbbuds.svg')); ?>"
                                        alt="<?php echo esc_attr($project['alt']); ?>"
                                        loading="lazy"
                                        decoding="async"
                                        width="220"
                                        height="220"
                                    >
                                    <span class="p2-making__pip-heart p2-making__pip-heart--one" aria-hidden="true">♥</span>
                                    <span class="p2-making__pip-heart p2-making__pip-heart--two" aria-hidden="true">♥</span>
                                    <span class="p2-making__pip-heart p2-making__pip-heart--three" aria-hidden="true">♥</span>
                                </div>
                            <?php elseif ($has_image) : ?>
                                <img src="<?php echo esc_url(get_theme_file_uri($project['image'])); ?>" alt="<?php echo esc_attr($project['alt']); ?>" loading="lazy" decoding="async">
                            <?php elseif ($project['slug'] === 'birbbuds') : ?>
                                <svg viewBox="0 0 160 160" aria-hidden="true" focusable="false">
                                    <path d="M54 91 C36 76 34 47 61 33 C80 19 109 26 119 51 C136 87 113 133 84 134 C63 132 48 116 54 91Z" fill="#FFF0CC"/>
                                    <path d="M64 36 C50 12 81 17 83 34 M80 32 C78 7 105 18 99 43" fill="#F6D75A"/>
                                    <circle cx="111" cy="78" r="14" fill="#F7B27B"/>
                                    <circle cx="95" cy="70" r="5" fill="#222C39"/>
                                    <path d="107 81 L137 73 L117 92Z" fill="#E8A45C"/>
                                    <path d="M56 112 Q34 133 21 125" stroke="#D5C3A1" stroke-width="13" fill="none" stroke-linecap="round"/>
                                </svg>
                            <?php elseif ($project['slug'] === 'crowdpulse') : ?>
                                <svg class="p2-making__concept-svg" viewBox="0 0 300 200" aria-hidden="true" focusable="false">
                                    <rect x="23" y="23" width="254" height="154" rx="12" fill="#161d42" stroke="#857bc6" stroke-opacity=".65"/>
                                    <path d="M46 139H253M46 112H253M46 85H253M46 58H253" stroke="#a9a5ef" stroke-opacity=".15"/>
                                    <path d="M47 144 76 118 103 131 135 80 160 99 194 59 223 85 251 52" stroke="#b9a7ff" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M47 144 76 118 103 131 135 80 160 99 194 59 223 85 251 52V145H47Z" fill="#b9a7ff" fill-opacity=".10"/>
                                    <circle cx="194" cy="59" r="6" fill="#d6c3ff"/>
                                </svg>
                            <?php elseif ($project['slug'] === 'flowforge') : ?>
                                <svg class="p2-making__concept-svg" viewBox="0 0 300 200" aria-hidden="true" focusable="false">
                                    <path d="M73 62H146V102H218" stroke="#b9a7ff" stroke-width="3" stroke-dasharray="5 7" fill="none"/>
                                    <path d="M146 102V150H211" stroke="#7fcbd0" stroke-width="3" stroke-dasharray="5 7" fill="none"/>
                                    <rect x="20" y="39" width="98" height="49" rx="10" fill="#303163" stroke="#afa0ec" stroke-width="2"/>
                                    <rect x="141" y="78" width="111" height="49" rx="10" fill="#253e62" stroke="#79bed9" stroke-width="2"/>
                                    <rect x="188" y="132" width="87" height="39" rx="10" fill="#303163" stroke="#afa0ec" stroke-width="2"/>
                                    <circle cx="40" cy="63" r="7" fill="#b9a7ff"/>
                                    <circle cx="161" cy="102" r="7" fill="#79bed9"/>
                                    <circle cx="209" cy="151" r="6" fill="#b9a7ff"/>
                                    <path d="M57 63h43M178 102h58M223 151h35" stroke="#f2edff" stroke-opacity=".55" stroke-width="4" stroke-linecap="round"/>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <div class="p2-making__mini-copy">
                            <span class="p2-making__meta"><?php echo esc_html($project['status']); ?></span>
                            <h3 id="p2-making-<?php echo esc_attr($project['slug']); ?>"><?php echo esc_html($project['name']); ?></h3>
                            <p><?php echo esc_html($project['description']); ?></p>
                            <span class="p2-making__stack"><?php echo esc_html($project['stack']); ?></span>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
