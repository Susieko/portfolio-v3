<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content">
    Ga naar de hoofdinhoud
</a>

<?php if (is_front_page()) : ?>

    <div class="page-transition" aria-hidden="true">
        <span class="page-transition__mark">SA</span>
        <span class="page-transition__line"></span>
    </div>

<?php endif; ?>

<?php
$current_page_id = get_queried_object_id();
$page_ancestors  = $current_page_id
    ? get_post_ancestors($current_page_id)
    : array();

$werk_page    = get_page_by_path('werk');
$werk_page_id = $werk_page ? (int) $werk_page->ID : 0;

$diensten_page    = get_page_by_path('diensten');
$diensten_page_id = $diensten_page ? (int) $diensten_page->ID : 0;

$werk_is_active =
    is_page('werk') ||
    (
        $werk_page_id &&
        in_array($werk_page_id, $page_ancestors, true)
    );

$diensten_is_active =
    is_page('diensten') ||
    (
        $diensten_page_id &&
        in_array($diensten_page_id, $page_ancestors, true)
    );
?>

<div class="site-shell">

    <aside class="sidebar">


<a
    class="sidebar__brand"
    href="<?php echo esc_url(home_url('/')); ?>"
    aria-label="Susan Aben - Home"
>
    <span class="sidebar__brand-wordmark" aria-hidden="true">
        SUSAN
        <span>ABEN.</span>
    </span>

    <span class="sidebar__brand-initials" aria-hidden="true">
        SA
    </span>
</a>


        <button
            class="sidebar__toggle"
            type="button"
            aria-expanded="false"
            aria-controls="portfolio-navigation"
            aria-label="Menu openen"
        >
            <span></span>
            <span></span>
        </button>


<?php
/**
 * Portfolio 2.0 — Single-page navigation
 * All links point to sections on the new homepage.
 */

$portfolio_nav = [
    [
        'id' => 'home',
        'label' => 'Home',
        'path' => 'M3 10.5 12 3l9 7.5V21h-6v-6H9v6H3z',
    ],
    [
        'id' => 'selected-work',
        'label' => 'Featured',
        'path' => 'm12 2 2.6 6.8L22 11l-6 4.7 2 6.3-6-3.8L6 22l2-6.3L2 11l7.4-2.2z',
    ],
    [
        'id' => 'work-archive',
        'label' => 'Archive',
        'path' => 'M4 5h16v14H4z M4 9h16 M10 9v10',
    ],
    [
        'id' => 'currently-crafting',
        'label' => 'In de maak',
        'path' => 'M4 20h16 M6 16 15 7l3 3-9 9H6z M13 9l3 3',
    ],
    [
        'id' => 'services',
        'label' => 'Diensten',
        'path' => 'm12 3 8 4.5v9L12 21l-8-4.5v-9z M4 7.5l8 4.5 8-4.5 M12 12v9',
    ],
    [
        'id' => 'the-lab',
        'label' => 'The Lab',
        'path' => 'm12 2 2.5 7.5L22 12l-7.5 2.5L12 22l-2.5-7.5L2 12l7.5-2.5z',
    ],
    [
        'id' => 'about',
        'label' => 'Build',
        'path' => 'm8 6-6 6 6 6 M16 6l6 6-6 6 M14 4l-4 16',
    ],
    [
        'id' => 'contact',
        'label' => 'Contact',
        'path' => 'M4 6h16v12H4z M4 8l8 6 8-6',
    ],
];
?>

<nav
    id="portfolio-navigation"
    class="sidebar__navigation"
    data-section-nav
    aria-label="Hoofdnavigatie"
>
    <?php foreach ($portfolio_nav as $item) :

        $is_current = is_front_page()
            && $item['id'] === 'home';

    ?>

        <a
            class="sidebar__link<?php echo $is_current ? ' is-active' : ''; ?>"
            href="<?php echo esc_url(
                home_url('/#' . $item['id'])
            ); ?>"
            data-section="<?php echo esc_attr($item['id']); ?>"
            title="<?php echo esc_attr($item['label']); ?>"
            <?php if ($is_current) : ?>
                aria-current="location"
            <?php endif; ?>
        >

            <span class="sidebar__icon" aria-hidden="true">
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.7"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path
                        d="<?php echo esc_attr($item['path']); ?>"
                    ></path>
                </svg>
            </span>

            <span class="sidebar__label">
                <?php echo esc_html($item['label']); ?>
            </span>

            <span
                class="sidebar__active-dot"
                aria-hidden="true"
            ></span>

        </a>

    <?php endforeach; ?>
</nav>


        <div class="sidebar__bottom">

<?php
$portfolio_languages = function_exists('trp_custom_language_switcher')
    ? trp_custom_language_switcher()
    : array();

global $TRP_LANGUAGE;

$current_portfolio_language = !empty($TRP_LANGUAGE)
    ? $TRP_LANGUAGE
    : get_locale();
?>

<div
    class="language-switcher"
    aria-label="Taal kiezen"
    data-no-translation
>
    <?php if (!empty($portfolio_languages)) : ?>

        <?php
        $language_position = 0;

        foreach ($portfolio_languages as $language_code => $language) :

            $short_name = strtoupper(
                $language['short_language_name']
            );

            $is_active =
                $language_code === $current_portfolio_language;

            if ($language_position > 0) :
        ?>
                <span
                    class="language-switcher__divider"
                    aria-hidden="true"
                >
                    /
                </span>
        <?php
            endif;
        ?>

            <?php if ($is_active) : ?>

                <span
                    class="language-switcher__option is-active"
                    aria-current="page"
                >
                    <?php echo esc_html($short_name); ?>
                </span>

            <?php else : ?>

                <a
                    class="language-switcher__option"
                    href="<?php echo esc_url(
                        $language['current_page_url']
                    ); ?>"
                    aria-label="<?php echo esc_attr(
                        $language['language_name']
                    ); ?>"
                    data-no-translation
                >
                    <?php echo esc_html($short_name); ?>
                </a>

            <?php endif; ?>

        <?php
            $language_position++;
        endforeach;
        ?>

    <?php else : ?>

        <span class="language-switcher__option is-active">
            NL
        </span>

        <span
            class="language-switcher__divider"
            aria-hidden="true"
        >
            /
        </span>

        <span class="language-switcher__option">
            EN
        </span>

    <?php endif; ?>
</div>


<button
    class="portfolio-theme-toggle"
    type="button"
    aria-label="Schakel naar lichte modus"
    aria-pressed="false"
    title="Wissel tussen dag en nacht"
    data-no-translation
>
    <span class="theme-icon theme-icon--sun" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none">
            <circle cx="12" cy="12" r="4"></circle>
            <path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"></path>
        </svg>
    </span>

    <span class="theme-icon theme-icon--moon" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none">
            <path d="M20 15.2A8.5 8.5 0 0 1 8.8 4 8.5 8.5 0 1 0 20 15.2Z"></path>
        </svg>
    </span>
</button>

            <a
                class="sidebar__privacy"
                href="<?php echo esc_url(home_url('/privacy/')); ?>"
            >
                Privacy
            </a>

        </div>

    </aside>

    <main
        id="main-content"
        class="site-content"
        tabindex="-1"
    >
