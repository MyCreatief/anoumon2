<?php
/**
 * GA4 custom events + bot filtering voor Anoumon.
 *
 * Site Kit injecteert gtag.js (GT-NM8CJL6L). Dit bestand voegt twee dingen toe:
 *
 * 1. BOT FILTER (taak 1) — server-side UA-check + client-side webdriver-check.
 *    Voor herkende bots wordt voor de Site Kit gtag config een dataLayer push
 *    gedaan met `traffic_type: 'internal'`. In GA4 Admin -> Data Settings ->
 *    Data Filters moet "Internal Traffic" op ACTIVE staan (default: TESTING).
 *
 * 2. CUSTOM EVENTS (taak 2):
 *    - tel_click       — bezoeker klikt op `<a href="tel:...">`
 *    - mailto_click    — bezoeker klikt op `<a href="mailto:...">`
 *    - generate_lead   — Contact Form 7 success of generieke form submit
 *      (gevangen door wpcf7mailsent event of submit op een [data-ga4-form]).
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Detecteert obvious-bot UA-strings. Voor de subtielere bots (US Chrome met
 * normale UA vanuit AWS-regio's) helpt dit niet — daar is een GA4 audience
 * filter voor nodig. Zie MIGRATION/setup-notes in repo.
 *
 * @return bool
 */
function anoumon_ga4_is_bot_ua()
{
    $ua = isset($_SERVER['HTTP_USER_AGENT']) ? (string) $_SERVER['HTTP_USER_AGENT'] : '';

    if ('' === $ua) {
        return true;
    }

    $patterns = array(
        '/HeadlessChrome/i',
        '/Puppeteer|Playwright|Selenium/i',
        '/PhantomJS|SlimerJS/i',
        '/lighthouse|PageSpeed|GTmetrix|WebPageTest/i',
        '/curl|wget|libwww|python-requests|Go-http-client|node-fetch|Apache-HttpClient|Java\//i',
        '/ahrefs|semrush|moz\.com|majestic|petalbot|dotbot|mj12bot|seokicks|sereect|sitebulb|screaming/i',
        '/bot|crawler|spider|scrap(er|ing)/i',
    );

    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $ua)) {
            return true;
        }
    }

    return false;
}

/**
 * Vóór Site Kit's gtag config-snippet: push traffic_type='internal' naar
 * dataLayer als de UA er als bot uitziet. Site Kit registreert zijn snippet
 * via wp_head priority 0/10 — wij draaien priority -100.
 */
add_action('wp_head', function () {
    if (is_admin() || !anoumon_ga4_is_bot_ua()) {
        return;
    }

    ?>
<script id="anoumon-ga4-bot-mark">
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({ traffic_type: "internal" });
</script>
    <?php
}, -100);

/**
 * Enqueue de event-tracking JS in de footer (na Site Kit's gtag).
 */
add_action('wp_enqueue_scripts', function () {
    if (is_admin()) {
        return;
    }

    $rel = '/assets/ga4-tracking.js';
    $path = get_stylesheet_directory() . $rel;
    $url = get_stylesheet_directory_uri() . $rel;
    $ver = file_exists($path) ? filemtime($path) : false;

    wp_enqueue_script(
        'anoumon-ga4-tracking',
        $url,
        array(),
        $ver,
        array('in_footer' => true, 'strategy' => 'defer')
    );
}, 30);
