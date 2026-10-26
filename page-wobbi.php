<?php
/**
 * Template for the WordPress page with slug /wobbi/.
 * Wobbi 0.2 is an early prototype, not a finished commercial product.
 */
get_header();

$case = array(
    'slug' => 'wobbi',
    'index' => '06',
    'label' => 'WOBBI / DESKTOP COMPANION',
    'eyebrow' => 'C# / .NET / WPF',
    'title' => 'Wobbi',
    'title_accent' => '.',
    'intro' => 'Een kleine cosmic desktop-companion met expressieve animaties, speelse interacties en lokale AI-gesprekken. Versie 0.2 is een werkend prototype én een persoonlijke C#/.NET-leerreis.',
    'live_url' => 'https://github.com/Susieko/Wobbi',
    'live_label' => 'Bekijk op GitHub',
    'browser_label' => 'WOBBI / V0.2 — CHARACTER ARTWORK',
    'status_label' => 'EARLY PROTOTYPE',
    'desktop_image' => 'workbench/wobbi.png',
    'desktop_video' => 'workbench/wobbi2.mp4',
    'desktop_alt' => 'Illustratie van Wobbi, een rond kosmisch karakter met kattenoren en een sterretje aan de staart. Dit is artwork, geen screenshot van de app.',
    'mobile_image' => '',
    'mobile_alt' => '',
    'annotation' => 'Small blob. Big personality. — conceptillustratie van Wobbi.',
    'tags' => array('C#', '.NET 10', 'WPF', 'XAML', 'Ollama', 'Qwen3'),
    'facts' => array(
        array('label' => 'Project', 'value' => 'Windows desktop companion'),
        array('label' => 'Mijn rol', 'value' => 'Character design + development'),
        array('label' => 'Versie', 'value' => '0.2.0 — prototype'),
        array('label' => 'Jaar', 'value' => '2026'),
    ),
    'chapters' => array(
        array(
            'number' => '01',
            'label' => 'Het idee',
            'title' => 'Wat als een desktopmaatje écht karakter heeft?',
            'copy' => array(
                'Wobbi begon als een origineel galaxy-karakter. Ik wilde leren hoe je met C# en .NET een interactieve Windows-app bouwt, zonder er een standaard oefenproject van te maken.',
                'De vormgeving en het gedrag horen bij elkaar: een klein, expressief karakter dat niet alleen aanwezig is op je scherm, maar ook reageert op wat je doet.',
            ),
        ),
        array(
            'number' => '02',
            'label' => 'De ontwikkeling',
            'title' => 'Van SVG-karakter tot interactieve WPF-app.',
            'copy' => array(
                'Ik bouwde Wobbi met C#, .NET en WPF/XAML. Het karakter beweegt, knippert, ademt, kan worden versleept en reageert op aaien met blije animaties en hartjes.',
                'Wobbi heeft ook een slaapstand en een chatinterface. Voor gesprekken gebruik ik Ollama met een lokaal Qwen3-model, waarbij de app via HttpClient met de lokale AI-runtime communiceert.',
            ),
        ),
        array(
            'number' => '03',
            'label' => 'Versie 0.2 en verder',
            'title' => 'Een werkend prototype met ruimte om te groeien.',
            'copy' => array(
                'Versie 0.2 heeft karakteranimaties, interacties, slaapgedrag en lokale AI-chat. Gesprekken kunnen recente context meenemen; langdurige geheugenopslag is nog geen onderdeel van deze versie.',
                'Op de roadmap staan onder andere blijvende voorkeuren, praktische herinneringen, meer emotionele reacties en betere desktopintegratie. Dit zijn geplande functies en nog geen afgeronde onderdelen.',
            ),
        ),
    ),
    'statement' => 'Een leerproject wordt pas echt leuk wanneer de techniek iets tot leven brengt.',
    'footer_note' => 'Small blob. Big personality.',
);

get_template_part('template-parts/meta-case', null, array('case' => $case));
get_footer();