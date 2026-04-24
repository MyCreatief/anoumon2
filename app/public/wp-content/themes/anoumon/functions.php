<?php
// Enqueue theme stylesheets and scripts
function theme_enqueue_scripts() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    // Add any additional stylesheets or scripts here
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

// Register navigation menus
function register_custom_menus() {
    register_nav_menus( array(
        'navigatie' => 'Navigatie Menu',
        // Add more menu locations here if needed
    ) );
}
add_action( 'after_setup_theme', 'register_custom_menus' );

// Add support for post thumbnails
add_theme_support( 'post-thumbnails' );

// Add any additional theme functionalities or customizations here
function add_custom_widget_area() {
    register_sidebar( array(
        'name'          => 'Footer Widget Area',
        'id'            => 'footer-widget-area',
        'description'   => 'This is the widget area for the footer.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'add_custom_widget_area' );

// GEO + Open Graph locale meta — helpt lokale zoekmachines en social sharing
function anoumon_geo_meta() {
    echo '<meta name="geo.region" content="NL" />' . "\n";
    echo '<meta name="geo.country" content="NL" />' . "\n";
    echo '<meta property="og:locale" content="nl_NL" />' . "\n";
    echo '<meta property="og:site_name" content="Anoumon" />' . "\n";
}
add_action( 'wp_head', 'anoumon_geo_meta', 5 );

// JSON-LD structured data: LocalBusiness + diensten met prijzen
function anoumon_structured_data() {
    $schema = array(
        '@context'   => 'https://schema.org',
        '@graph'     => array(
            array(
                '@type'       => 'LocalBusiness',
                '@id'         => 'https://anoumon.nl/#business',
                'name'        => 'Anoumon',
                'description' => 'Energetische therapie en begeleiding op spiritueel pad.',
                'url'         => 'https://anoumon.nl',
                'email'       => 'info@anoumon.nl',
                'priceRange'  => '€35–€338',
                'address'     => array(
                    '@type'          => 'PostalAddress',
                    'addressCountry' => 'NL',
                    // TODO: vul aan met 'addressLocality', 'streetAddress', 'postalCode'
                ),
                'hasOfferCatalog' => array(
                    '@type' => 'OfferCatalog',
                    'name'  => 'Behandelingen Anoumon',
                    'itemListElement' => array(
                        array(
                            '@type'       => 'Offer',
                            'itemOffered' => array(
                                '@type'       => 'Service',
                                'name'        => 'Meet & Treat',
                                'description' => 'Kennismaking en korte energetische behandeling, 30 minuten.',
                            ),
                            'price'         => '35.00',
                            'priceCurrency' => 'EUR',
                        ),
                        array(
                            '@type'       => 'Offer',
                            'itemOffered' => array(
                                '@type'       => 'Service',
                                'name'        => 'Energetische therapie',
                                'description' => 'Energetische behandeling op maat, 60 minuten per sessie.',
                            ),
                            'price'         => '75.00',
                            'priceCurrency' => 'EUR',
                        ),
                        array(
                            '@type'       => 'Offer',
                            'itemOffered' => array(
                                '@type'       => 'Service',
                                'name'        => 'Begeleiding spiritueel pad',
                                'description' => 'Begeleiding op spiritueel pad. Startpakket: 3 sessies van 90 minuten.',
                            ),
                            'price'         => '337.50',
                            'priceCurrency' => 'EUR',
                        ),
                        array(
                            '@type'       => 'Offer',
                            'itemOffered' => array(
                                '@type'       => 'Service',
                                'name'        => 'APK – Preventief / Losse sessie',
                                'description' => 'Losse energetische behandeling voor balans en ontspanning.',
                            ),
                            'price'         => '75.00',
                            'priceCurrency' => 'EUR',
                        ),
                    ),
                ),
            ),
            array(
                '@type'       => 'WebSite',
                '@id'         => 'https://anoumon.nl/#website',
                'url'         => 'https://anoumon.nl',
                'name'        => 'Anoumon',
                'description' => 'Energetische therapie en begeleiding op spiritueel pad',
                'inLanguage'  => 'nl-NL',
                'publisher'   => array( '@id' => 'https://anoumon.nl/#business' ),
            ),
        ),
    );

    echo '<script type="application/ld+json">' .
         wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) .
         '</script>' . "\n";
}
add_action( 'wp_head', 'anoumon_structured_data' );