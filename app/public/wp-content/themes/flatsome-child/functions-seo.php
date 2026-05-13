<?php
/**
 * Anoumon SEO en AI-vindbaarheid:
 *
 * 1. robots.txt: voegt expliciete Allow-directieven toe voor AI-crawlers
 *    (GPTBot van OpenAI, ClaudeBot van Anthropic, PerplexityBot, etc.) zodat
 *    er geen twijfel is dat ze de site mogen indexeren.
 *
 * 2. llms.txt: gebruikt RankMath's `rank_math/llms_txt/extra_content` filter
 *    om aanvullende thematische context toe te voegen die LLMs helpt om
 *    Anoumon te begrijpen en correct te citeren.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Expliciete allow voor de belangrijkste AI-crawlers in robots.txt.
 * Toegevoegd na de bestaande WP-default regels.
 */
add_filter('robots_txt', function ($output, $public) {
    if (!$public) {
        return $output;
    }

    $extra = "\n# AI crawlers - expliciet toegestaan\n";
    $bots = array(
        'GPTBot',         // OpenAI / ChatGPT
        'ChatGPT-User',   // ChatGPT browse mode
        'OAI-SearchBot',  // OpenAI search
        'ClaudeBot',      // Anthropic / Claude
        'Claude-Web',     // Claude.ai web
        'PerplexityBot',  // Perplexity
        'Perplexity-User',
        'Google-Extended',// Google Gemini training
        'Applebot-Extended',
        'CCBot',          // Common Crawl (used by many LLMs)
        'meta-externalagent',
        'Bytespider',     // ByteDance / TikTok / Doubao
    );

    foreach ($bots as $bot) {
        $extra .= "User-agent: {$bot}\nAllow: /\n\n";
    }

    return $output . $extra;
}, 10, 2);

// NB: llms.txt wordt geserveerd door een static handler in functions.php
// (init-hook op /llms.txt). RankMath's filter heeft daar geen effect.
// Uitbreidingen van llms.txt direct in functions.php toevoegen.
