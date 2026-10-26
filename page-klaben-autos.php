
<?php
/**
 * Klaben Autos — Portfolio case study
 * Uses our shared Meta Case layout.
 */

get_header();

$case = [
    'slug'          => 'klaben-autos',
    'index'         => '06',
    'label'         => 'KLABEN AUTOS',
    'eyebrow'       => 'DIGITALE SHOWROOM / WORDPRESS MAATWERK',

    'display_title' => 'Klaben Autos',
    'title'         => 'Klaben Autos',
    'title_accent'  => '',

    'intro'         => 'Een fictief automotive portfolio-project waarin ontwerp, maatwerk WordPress en slimme beheertools samenkomen: van voertuigaanbod tot klantaanvraag.',

    'live_url'      => '',
    'live_label'    => '',

    'browser_label' => 'KLABEN AUTOS / PROJECTPREVIEW',
    'status_label'  => 'PORTFOLIO PROJECT',

    'desktop_image' => 'projects/klaben-preview.webp',
    'desktop_alt'   => 'Klaben Autos digitale showroom met autozoekfunctie',

    'mobile_image'  => '',
    'mobile_alt'    => '',

    'annotation' => 'Van visuele showroom naar beheerbare WordPress-ervaring.',

    'tags' => [
        'WordPress',
        'PHP',
        'JavaScript',
        'ACF',
        'Fluent Forms',
        'UX/UI'
    ],

    'facts' => [
        [
            'label' => 'Project',
            'value' => 'Automotive portfolio-concept'
        ],
        [
            'label' => 'Mijn rol',
            'value' => 'Design + development'
        ],
        [
            'label' => 'Jaar',
            'value' => '2026'
        ],
        [
            'label' => 'Status',
            'value' => 'Demo / doorontwikkeling'
        ]
    ],

    'chapters' => [
        [
            'number' => '01',
            'label'  => 'Design',
            'title'  => 'Een digitale showroom met aandacht voor vertrouwen.',

            'copy' => [
                'Het ontwerp draait om een krachtige autohero, heldere voertuigkaarten en een rustige navigatie. De donkere uitstraling geeft het aanbod ruimte, zonder de bruikbaarheid uit het oog te verliezen.',

                'Van zoekfilters tot formulieren: iedere pagina helpt bezoekers om gericht de volgende stap te zetten.'
            ]
        ],

        [
            'number' => '02',
            'label'  => 'Development',
            'title'  => 'Een eigen WordPress-thema in plaats van een standaard template.',

            'copy' => [
                'Ik bouwde het concept met PHP, JavaScript en maatwerk templates. Het voertuigaanbod en de detailpagina’s zijn verbonden met gestructureerde gegevens, zodat de interface niet afhankelijk is van handmatig ingevulde pagina’s.',

                'Ik besteedde aandacht aan responsive gedrag, interacties en een consistente ervaring tussen ontwerp en werkende website.'
            ]
        ],

        [
            'number' => '03',
            'label'  => 'CMS & workflow',
            'title'  => 'Slim beheer achter een verzorgde voorkant.',

            'copy' => [
                'Met ACF kunnen voertuiggegevens in WordPress worden beheerd. Fluent Forms verzorgt aanvragen en inzendingen, terwijl een eigen CRM-dashboard helpt om de opvolging overzichtelijk te maken.',

                'De verdere koppeling tussen formulieren en CRM is nog in ontwikkeling. Het project laat zien hoe ik design, WordPress en werkprocessen samenbreng.'
            ]
        ]
    ],

    'statement' => 'Een goede digitale showroom ziet er niet alleen mooi uit, maar maakt ook het werk achter de schermen eenvoudiger.',

    'footer_note' => 'Designed, developed and driven by curiosity.'
];

get_template_part(
    'template-parts/meta-case',
    null,
    ['case' => $case]
);

get_footer();
