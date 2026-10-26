
<?php
$about_skills = array(
    array(
        'id' => 'wordpress',
        'icon' => 'W',
        'name' => 'WordPress',
        'project' => 'NoordgroeiT',
        'type' => 'CUSTOM WORDPRESS',
        'description' => 'Een toegankelijk platform voor Tilburg-Noord, gebouwd met een custom WordPress theme, PHP en JavaScript.',
        'url' => home_url('/noordgroeit/'),
    ),
    array(
        'id' => 'laravel',
        'icon' => 'L',
        'name' => 'Laravel',
        'project' => 'Clientboard',
        'type' => 'FULL-STACK APPLICATION',
        'description' => 'Een dashboard voor projecten, taken en deadlines, met MVC-architectuur, database-modellen en formulier-validatie.',
        'url' => home_url('/clientboard/'),
    ),
    array(
        'id' => 'react',
        'icon' => '⚛',
        'name' => 'React',
        'project' => 'EventFlow',
        'type' => 'FRONT-END APPLICATION',
        'description' => 'Een interactieve eventapp, gebouwd met React, TypeScript en herbruikbare componenten.',
        'url' => home_url('/eventflow/'),
    ),
    array(
        'id' => 'typescript',
        'icon' => 'TS',
        'name' => 'TypeScript',
        'project' => 'EventFlow',
        'type' => 'TYPED FRONT-END',
        'description' => 'TypeScript helpt me om duidelijkere interfaces en beter onderhoudbare componenten te bouwen.',
        'url' => home_url('/eventflow/'),
    ),
    array(
        'id' => 'php',
        'icon' => 'php',
        'name' => 'PHP',
        'project' => 'EHBO Petrus Donders',
        'type' => 'WORDPRESS DEVELOPMENT',
        'description' => 'Een custom website met PHP-templates en functionaliteit voor een vereniging.',
        'url' => home_url('/ehbo-petrus-donders/'),
    ),
    array(
        'id' => 'figma',
        'icon' => 'F',
        'name' => 'Figma',
        'project' => 'Tilburgs Sportgala',
        'type' => 'UX / UI DESIGN',
        'description' => 'Van eerste concepten tot een uitgewerkte visuele richting, met aandacht voor typografie, hiërarchie en interactie.',
        'url' => '',
    ),
);
?>

<section class="p2-about" id="about" aria-labelledby="p2-about-title">
    <div class="p2-about__inner">

        <div class="p2-about__copy">
            <p class="p2-about__eyebrow">
                06 / BEHIND THE BUILD
                <span aria-hidden="true">✦</span>
            </p>

            <h2 id="p2-about-title">
                Ik denk in <em>beelden.</em><br>
                En bouw in code.
            </h2>

            <p class="p2-about__lead">
                Hoi, ik ben Susan. Ik hou ervan om uit te zoeken
                hoe iets werkt — en nóg meer om het zelf te bouwen.
            </p>

            <p class="p2-about__description">
                Van interfaceontwerp tot development: ik zit het
                liefst precies tussen die twee werelden in.
                Een goed idee wordt voor mij pas echt interessant
                wanneer ik het werkend kan maken.
            </p>


<div class="p2-about-invite">

    <div class="p2-about-invite__top">
        <span class="p2-about-invite__light"></span>
        <span>HAVE SOMETHING IN MIND?</span>
    </div>

    <p class="p2-about-invite__title">
        Een idee dat design én code nodig heeft?
    </p>

    <div class="p2-about-invite__bottom">
        <span>Ik denk graag met je mee.</span>

        <a href="#contact" class="p2-about-invite__button">
            Laten we praten
            <span aria-hidden="true">✦</span>
        </a>
    </div>

</div>


            <p class="p2-about__note">
                DESIGN THINKING <span>✳</span>
                DEVELOPMENT <span>✳</span>
                CURIOSITY
            </p>
        </div>

        <div class="p2-about__shelf p2-tech-shelf--readable">
            <div class="p2-about__shelf-head">
                <span>TOOLS / TECH STACK</span>
                <span aria-hidden="true">✳</span>
            </div>

            <p class="p2-about__instruction">
                Kies een technologie en ontdek waar ik ermee werk.
            </p>

            <div class="p2-about__skills" role="group" aria-label="Technologieën">
                <?php foreach ($about_skills as $index => $skill) : ?>
                    <button
                        class="p2-about__skill <?php echo $index === 0 ? 'is-active' : ''; ?>"
                        type="button"
                        data-about-skill="<?php echo esc_attr($skill['id']); ?>"
                        aria-pressed="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                        aria-controls="p2-about-panel-<?php echo esc_attr($skill['id']); ?>"
                    >
                        <span class="p2-about__skill-icon p2-about__skill-icon--<?php echo esc_attr($skill['id']); ?>"
                              aria-hidden="true">

                            <?php if ($skill['id'] === 'figma') : ?>
                                <svg viewBox="0 0 24 36" width="24" height="36">
                                    <rect x="1" y="1" width="11" height="11" rx="5.5" fill="#F24E1E"/>
                                    <rect x="12" y="1" width="11" height="11" rx="5.5" fill="#FF7262"/>
                                    <rect x="1" y="12" width="11" height="11" rx="5.5" fill="#A259FF"/>
                                    <circle cx="17.5" cy="17.5" r="5.5" fill="#1ABCFE"/>
                                    <rect x="1" y="23" width="11" height="11" rx="5.5" fill="#0ACF83"/>
                                </svg>
                            <?php else : ?>
                                <?php echo esc_html($skill['icon']); ?>
                            <?php endif; ?>

                        </span>

                        <span class="p2-about__skill-name">
                            <?php echo esc_html($skill['name']); ?>
                        </span>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="p2-about__project-area" aria-live="polite">
                <?php foreach ($about_skills as $index => $skill) : ?>
                    <article
                        class="p2-about__project"
                        id="p2-about-panel-<?php echo esc_attr($skill['id']); ?>"
                        data-about-panel="<?php echo esc_attr($skill['id']); ?>"
                        <?php echo $index === 0 ? '' : 'hidden'; ?>
                    >
                        <p class="p2-about__project-label">
                            WHERE I USED IT / <?php echo esc_html($skill['type']); ?>
                        </p>

                        <h3><?php echo esc_html($skill['project']); ?></h3>

                        <p><?php echo esc_html($skill['description']); ?></p>

                        <?php if (!empty($skill['url'])) : ?>
                            <a href="<?php echo esc_url($skill['url']); ?>">
                                Bekijk dit project <span aria-hidden="true">↗</span>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="p2-about__shelf-foot" aria-hidden="true">
                <span>DESIGN + DEVELOPMENT</span>
                <span>ALWAYS LEARNING_</span>
            </div>
        </div>

    </div>
</section>
