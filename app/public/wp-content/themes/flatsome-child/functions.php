<?php
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'flatsome-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        [ 'flatsome-style' ]
    );
} );

// GEO + Open Graph locale meta
add_action( 'wp_head', function () {
    echo '<meta name="geo.region" content="NL" />' . "\n";
    echo '<meta name="geo.country" content="NL" />' . "\n";
    echo '<meta property="og:locale" content="nl_NL" />' . "\n";
    echo '<meta property="og:site_name" content="Anoumon" />' . "\n";
}, 5 );

// JSON-LD structured data: LocalBusiness + diensten met prijzen
add_action( 'wp_head', function () {
    $schema = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'       => ['LocalBusiness', 'HealthAndBeautyBusiness'],
                '@id'         => 'https://anoumon.nl/#business',
                'name'        => 'Ánoumon',
                'description' => 'Energetische therapie en begeleiding op spiritueel pad.',
                'url'         => 'https://anoumon.nl',
                'email'       => 'info@anoumon.nl',
                'priceRange'  => '€35–€338',
                'address'     => [
                    '@type'          => 'PostalAddress',
                    'addressCountry' => 'NL',
                    // TODO: vul aan: 'addressLocality', 'streetAddress', 'postalCode'
                ],
                'hasOfferCatalog' => [
                    '@type' => 'OfferCatalog',
                    'name'  => 'Behandelingen Anoumon',
                    'itemListElement' => [
                        [
                            '@type'       => 'Offer',
                            'itemOffered' => [
                                '@type'       => 'Service',
                                'name'        => 'Meet & Treat',
                                'description' => 'Kennismaking en korte energetische behandeling, 30 minuten.',
                            ],
                            'price'         => '35.00',
                            'priceCurrency' => 'EUR',
                        ],
                        [
                            '@type'       => 'Offer',
                            'itemOffered' => [
                                '@type'       => 'Service',
                                'name'        => 'Energetische therapie',
                                'description' => 'Energetische behandeling op maat, 60 minuten per sessie.',
                            ],
                            'price'         => '75.00',
                            'priceCurrency' => 'EUR',
                        ],
                        [
                            '@type'       => 'Offer',
                            'itemOffered' => [
                                '@type'       => 'Service',
                                'name'        => 'Begeleiding spiritueel pad',
                                'description' => 'Begeleiding op spiritueel pad. Startpakket: 3 sessies van 90 minuten.',
                            ],
                            'price'         => '337.50',
                            'priceCurrency' => 'EUR',
                        ],
                        [
                            '@type'       => 'Offer',
                            'itemOffered' => [
                                '@type'       => 'Service',
                                'name'        => 'APK – Preventief / Losse sessie',
                                'description' => 'Losse energetische behandeling voor balans en ontspanning.',
                            ],
                            'price'         => '75.00',
                            'priceCurrency' => 'EUR',
                        ],
                    ],
                ],
            ],
            [
                '@type'      => 'WebSite',
                '@id'        => 'https://anoumon.nl/#website',
                'url'        => 'https://anoumon.nl',
                'name'       => 'Ánoumon',
                'description'=> 'Energetische therapie en begeleiding op spiritueel pad',
                'inLanguage' => 'nl-NL',
                'publisher'  => [ '@id' => 'https://anoumon.nl/#business' ],
            ],
        ],
    ];

    echo '<script type="application/ld+json">'
        . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
        . '</script>' . "\n";
} );

// robots.txt: sitemap + llms.txt hint voor zoekmachines en AI-crawlers
add_filter( 'robots_txt', function ( $output ) {
    $base = home_url( '/' );
    if ( strpos( $output, 'llms.txt' ) === false ) {
        $output .= "\nSitemap: {$base}sitemap_index.xml\nSitemap: {$base}llms.txt\n";
    }
    return $output;
} );

// llms.txt — beschrijving voor AI-crawlers en taalmodellen
add_action( 'init', function () {
    if ( empty( $_SERVER['REQUEST_URI'] ) ) return;
    if ( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) !== '/llms.txt' ) return;

    nocache_headers();
    header( 'Content-Type: text/plain; charset=utf-8' );
    echo <<<'TXT'
# Ánoumon — Energetische therapie en spirituele begeleiding

> Complementaire therapie voor balans, herstel en innerlijke groei. Gevestigd in Nederland.

Ánoumon biedt energetische therapie en begeleiding op het spirituele pad. Behandelingen richten zich op het herstellen van de energiestroom in het lichaam. Ondersteunend bij stress, vermoeidheid, slaapproblemen, emotionele blokkades en herstel na ziekte of intensieve perioden. Aanvulling op — geen vervanging van — reguliere zorg. Contact: info@anoumon.nl

## Diensten & tarieven

- Meet & Treat — kennismakingssessie, 30 minuten, €35
- Energetische therapie — behandeling op maat, 60 minuten, €75
- Begeleiding spiritueel pad — startpakket 3 sessies van 90 minuten, €337,50; vervolgsessies €112,50 per sessie
- APK / preventieve sessie — losse energetische behandeling voor balans en ontspanning, 60 minuten, €75

## Pagina's

- /energetische-therapie/ — uitleg over energetische therapie, werkwijze en wat je kunt verwachten
- /meettreat-en-investering/ — tarieven en kennismakingssessie Meet & Treat
- /begeleiding-spiritueel-pad/ — ondersteuning bij innerlijke groei en verdiepen van zelfkennis
- /apk-preventief/ — losse sessie voor balans en energetisch herstel
- /contact/ — afspraak maken via contactformulier of info@anoumon.nl

## Veelgestelde vragen

- Wat is energetische therapie? Complementaire behandeling gericht op verstoringen in het energieveld van het lichaam. Bevordert het zelfherstellend vermogen.
- Voor welke klachten? Stress, vermoeidheid, slaapproblemen, emotionele blokkades, pijn, herstel na ziekte of intensieve perioden.
- Vergoed door zorgverzekering? Soms gedeeltelijk via aanvullende verzekering. Verschilt per verzekeraar.
- Hoe afspraak maken? Via contactformulier op de website of per e-mail info@anoumon.nl.
- Kan naast reguliere zorg? Ja. Energetische therapie is complementair en vervangt geen medische behandeling.
TXT;
    exit;
}, 1 );

// FAQPage schema — per pagina gerichte vragen voor AEO en rich snippets
add_action( 'wp_head', function () {

    // Stel per pagina de bijbehorende FAQ-set vast
    if ( is_front_page() ) {
        $faqs = [
            [
                'q' => 'Wat is energetische therapie?',
                'a' => 'Energetische therapie is een complementaire behandelvorm waarbij verstoringen in het energieveld van het lichaam worden opgespoord en hersteld. Blokkades in de energiestroom kunnen lichamelijke of emotionele klachten veroorzaken. Door deze te ontspannen bevordert de behandeling het zelfherstellend vermogen.',
            ],
            [
                'q' => 'Is energetische therapie vergoed door de zorgverzekering?',
                'a' => 'Sommige aanvullende zorgverzekeringen vergoeden (een deel van) complementaire therapieën zoals energetische therapie. Dit verschilt per verzekeraar en polis. Vraag bij jouw verzekeraar na of energetische therapie onder de aanvullende dekking valt.',
            ],
            [
                'q' => 'Hoe maak ik een afspraak bij Ánoumon?',
                'a' => 'Een afspraak maak je eenvoudig via het contactformulier op de website of door een e-mail te sturen naar info@anoumon.nl. Wil je eerst kennismaken? Boek dan een Meet & Treat sessie van 30 minuten voor €35.',
            ],
        ];
    } elseif ( is_page( 'energetische-therapie' ) ) {
        $faqs = [
            [
                'q' => 'Hoe werkt een energetische behandeling?',
                'a' => 'Tijdens een energetische behandeling werk ik met de energiebanen en energiecentra (chakra\'s) van het lichaam. Met zachte aanraking of op afstand spoor ik blokkades op en herstel ik de energiestroom. De behandeling is ontspannend en niet-invasief.',
            ],
            [
                'q' => 'Hoeveel sessies energetische therapie heb ik nodig?',
                'a' => 'Het aantal sessies hangt af van je klachten en persoonlijke situatie. Na de eerste sessie geef ik een indicatie. Sommige mensen ervaren al na één of twee sessies verbetering; bij diepere of langdurige klachten is een korter traject van meerdere sessies gebruikelijk.',
            ],
            [
                'q' => 'Voor welke klachten kan energetische therapie helpen?',
                'a' => 'Energetische therapie kan ondersteunend zijn bij stressklachten, vermoeidheid, slaapproblemen, emotionele blokkades, pijn, en herstel na ziekte of een intensieve periode. Het is een aanvulling op reguliere zorg, geen vervanging.',
            ],
            [
                'q' => 'Wat is het verschil tussen energetische therapie en reiki?',
                'a' => 'Reiki is een specifieke vorm van energetische therapie met een vaste methode en symbolen uit de Japanse traditie. Energetische therapie is een bredere aanduiding voor behandelingen die met het energieveld werken, waaronder diverse technieken en stromingen. Bij Ánoumon wordt een integratieve aanpak toegepast.',
            ],
            [
                'q' => 'Kan ik energetische therapie combineren met reguliere zorg?',
                'a' => 'Ja, energetische therapie is een complementaire aanpak en kan goed naast reguliere medische of psychologische behandeling worden ingezet. Informeer altijd ook je huisarts of specialist.',
            ],
        ];
    } elseif ( is_page( 'meettreat-en-investering' ) ) {
        $faqs = [
            [
                'q' => 'Wat is een Meet & Treat sessie?',
                'a' => 'De Meet & Treat is een laagdrempelige kennismakingssessie van 30 minuten voor €35. Je maakt kennis met de werkwijze, we bespreken jouw wensen, en je ervaart direct een korte energetische behandeling. Zo weet je wat je kunt verwachten voordat je een volledig traject start.',
            ],
            [
                'q' => 'Wat kost een energetische behandeling bij Ánoumon?',
                'a' => 'Een losse sessie energetische therapie duurt 60 minuten en kost €75. Voor begeleiding op het spirituele pad is een startpakket van 3 sessies van elk 90 minuten beschikbaar voor €337,50. Vervolgsessies kosten €112,50 per sessie.',
            ],
            [
                'q' => 'Wat houdt het startpakket Begeleiding Spiritueel Pad in?',
                'a' => 'Het startpakket bestaat uit drie sessies van 90 minuten en biedt diepgaande ondersteuning op je spirituele pad. Na deze drie sessies kun je losse vervolgsessies van 90 minuten boeken voor €112,50 per sessie, zo vaak als je wilt.',
            ],
            [
                'q' => 'Kan ik ook gewoon een losse sessie boeken?',
                'a' => 'Ja, een APK- of losse preventieve sessie is altijd mogelijk. Deze dient als onderhoud of als moment om even bij te tanken. De duur en het tijdstip spreek je in overleg af; het uurtarief bedraagt €75.',
            ],
        ];
    } elseif ( is_page( 'begeleiding-spiritueel-pad' ) ) {
        $faqs = [
            [
                'q' => 'Wat is begeleiding op het spirituele pad?',
                'a' => 'Begeleiding op het spirituele pad ondersteunt je bij innerlijke groei, het verdiepen van zelfkennis en het vinden van richting in je leven. Het combineert energetisch werk met persoonlijke gesprekken en helpt je bewuster te leven en keuzes te maken vanuit je kern.',
            ],
            [
                'q' => 'Voor wie is begeleiding op het spirituele pad geschikt?',
                'a' => 'Deze begeleiding is voor mensen die voelen dat er meer is, die vragen hebben over de zin van hun leven, vastlopen in patronen, of willen groeien op persoonlijk en spiritueel vlak. Geen voorkennis vereist.',
            ],
            [
                'q' => 'Hoe lang duurt een begeleidingstraject?',
                'a' => 'Het startpakket bestaat uit drie sessies van elk 90 minuten. Daarna kun je naar eigen behoefte vervolgsessies boeken. Er is geen verplicht minimaal aantal sessies.',
            ],
        ];
    } elseif ( is_page( 'apk-preventief' ) ) {
        $faqs = [
            [
                'q' => 'Wat is een APK- of preventieve sessie?',
                'a' => 'De APK-sessie is een losse energetische behandeling om je balans te herstellen en je innerlijke batterij op te laden. Ideaal als je even buiten de dagelijkse drukte wilt stappen of als aanvulling op een eerder traject.',
            ],
            [
                'q' => 'Hoe vaak moet ik een APK-sessie doen?',
                'a' => 'Dat is volledig naar eigen inzicht. Sommige mensen komen een paar keer per jaar voor preventief onderhoud, anderen boeken een sessie wanneer ze merken dat ze behoefte hebben aan herstel of ontspanning.',
            ],
        ];
    } else {
        return; // geen FAQ schema op overige pagina's
    }

    $schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map( fn( $f ) => [
            '@type'          => 'Question',
            'name'           => $f['q'],
            'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $f['a'] ],
        ], $faqs ),
    ];

    echo '<script type="application/ld+json">'
        . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
        . '</script>' . "\n";
} );

// BlogPosting schema voor blogberichten
add_action( 'wp_head', function () {
    if ( ! is_singular( 'post' ) ) return;

    $post  = get_queried_object();
    $image = get_the_post_thumbnail_url( $post, 'large' );

    $schema = [
        '@context'      => 'https://schema.org',
        '@type'         => 'BlogPosting',
        'headline'      => get_the_title( $post ),
        'description'   => get_the_excerpt( $post ),
        'datePublished' => get_the_date( 'c', $post ),
        'dateModified'  => get_the_modified_date( 'c', $post ),
        'url'           => get_permalink( $post ),
        'inLanguage'    => 'nl-NL',
        'author'        => [
            '@type' => 'Person',
            'name'  => 'Ánoumon',
            'url'   => 'https://anoumon.nl/',
        ],
        'publisher' => [ '@id' => 'https://anoumon.nl/#business' ],
        'isPartOf'  => [ '@id' => 'https://anoumon.nl/#website' ],
    ];
    if ( $image ) {
        $schema['image'] = $image;
    }

    echo '<script type="application/ld+json">'
        . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
        . '</script>' . "\n";
} );

// BreadcrumbList schema voor binnenste pagina's
add_action( 'wp_head', function () {
    if ( is_front_page() || is_home() ) return;

    $items = [
        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ],
    ];

    if ( is_singular() ) {
        $items[] = [
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => get_the_title(),
            'item'     => get_permalink(),
        ];
    }

    $schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $items,
    ];

    echo '<script type="application/ld+json">'
        . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
        . '</script>' . "\n";
} );
