<?php
/**
 * Shared <head>. Expects $PAGE_TITLE, $PAGE_DESC, $PAGE_SLUG and boot.php already included.
 *
 * Link previews: this emits the full Open Graph + Twitter card set, so a paste
 * into LinkedIn, Facebook, X, WhatsApp, Slack, Discord, Telegram, Signal or
 * iMessage all render title + description + the 1200x630 card image.
 * A page can override any of these before the include:
 *   $PAGE_OG_IMAGE       absolute image URL (default /img/og-shipshow-c01.jpg)
 *   $PAGE_OG_IMAGE_ALT   alt text for that image
 *   $PAGE_OG_TYPE        og:type (default 'website')
 * If you swap in a non-JPEG card, set $PAGE_OG_IMAGE_TYPE / _WIDTH / _HEIGHT too.
 *
 * base.css always loads first, then exactly one design stylesheet. The design
 * file may override anything in base except the state hooks.
 */
$PAGE_OG_URL       = 'https://bitcoinship.show' . ($PAGE_SLUG === 'home' ? '/' : '/' . $PAGE_SLUG . '/');
$PAGE_OG_IMAGE     = $PAGE_OG_IMAGE ?? 'https://bitcoinship.show/img/og-shipshow-c01.jpg';
$PAGE_OG_IMAGE_ALT = $PAGE_OG_IMAGE_ALT ?? 'Bitcoin Shipshow: a patchwork sailing ship in a wheat field. First Tuesday of every month, 13:00 ET / 19:00 Central European time. Patroned by Freedom Tech, Bitcoin District and HiveTalk.';
$PAGE_OG_IMAGE_TYPE   = $PAGE_OG_IMAGE_TYPE ?? 'image/jpeg';
$PAGE_OG_IMAGE_WIDTH  = $PAGE_OG_IMAGE_WIDTH ?? '1200';
$PAGE_OG_IMAGE_HEIGHT = $PAGE_OG_IMAGE_HEIGHT ?? '630';
$PAGE_OG_TYPE      = $PAGE_OG_TYPE ?? 'website';
$PAGE_OG_SITE      = 'Bitcoin Shipshow';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($PAGE_TITLE) ?></title>
<meta name="description" content="<?= e($PAGE_DESC) ?>">
<link rel="canonical" href="<?= e($PAGE_OG_URL) ?>">
<?php $MD_LINK_PATH = (string) (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'); if (in_array($MD_LINK_PATH, ['/', '/about/', '/privacy-policy/', '/terms-of-service/'], true)) { echo '<link rel="alternate" type="text/markdown" href="' . e($MD_LINK_PATH . 'index.md') . '">' . "\n"; } ?>
<?php if ($DESIGN !== DEFAULT_DESIGN || $SHOW_PICKER): ?>
<meta name="robots" content="noindex,nofollow">
<?php endif; ?>
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="apple-touch-icon" href="<?= e(asset('apple-touch-icon.png')) ?>">
<meta name="theme-color" content="#0A2E52">

<!-- Open Graph — LinkedIn, Facebook, WhatsApp, Slack, Discord, Telegram, Signal, iMessage -->
<meta property="og:title" content="<?= e($PAGE_TITLE) ?>">
<meta property="og:description" content="<?= e($PAGE_DESC) ?>">
<meta property="og:image" content="<?= e($PAGE_OG_IMAGE) ?>">
<meta property="og:image:secure_url" content="<?= e($PAGE_OG_IMAGE) ?>">
<meta property="og:image:type" content="<?= e($PAGE_OG_IMAGE_TYPE) ?>">
<meta property="og:image:width" content="<?= e($PAGE_OG_IMAGE_WIDTH) ?>">
<meta property="og:image:height" content="<?= e($PAGE_OG_IMAGE_HEIGHT) ?>">
<meta property="og:image:alt" content="<?= e($PAGE_OG_IMAGE_ALT) ?>">
<meta property="og:type" content="<?= e($PAGE_OG_TYPE) ?>">
<meta property="og:url" content="<?= e($PAGE_OG_URL) ?>">
<meta property="og:site_name" content="<?= e($PAGE_OG_SITE) ?>">
<meta property="og:locale" content="en_US">

<!-- Twitter / X card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@bitcoinshipshow">
<meta name="twitter:title" content="<?= e($PAGE_TITLE) ?>">
<meta name="twitter:description" content="<?= e($PAGE_DESC) ?>">
<meta name="twitter:image" content="<?= e($PAGE_OG_IMAGE) ?>">
<meta name="twitter:image:alt" content="<?= e($PAGE_OG_IMAGE_ALT) ?>">
<?php if ($PAGE_SLUG === 'home'): ?>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Event","name":"Bitcoin Shipshow E03 - Pirates' Community Call","description":"Builders demo what they're actually shipping in Bitcoin, Nostr and other freedom tech. ReGBY, WeSatoshis, Zap Cooking and BitcoinWalk, plus the Open dock. The room stays open off the record after the show.","startDate":"2026-12-01T18:00:00Z","endDate":"2026-12-01T19:30:00Z","eventStatus":"https://schema.org/EventScheduled","eventAttendanceMode":"https://schema.org/OnlineEventAttendanceMode","location":{"@type":"VirtualLocation","url":"https://bitcoinship.show/live/"},"image":"https://bitcoinship.show/img/og-shipshow.jpg","url":"https://bitcoinship.show/","organizer":{"@type":"Organization","name":"Bitcoin Shipshow","url":"https://bitcoinship.show"},"performer":[{"@type":"Organization","name":"ReGBY","url":"https://regby.nostr.box"},{"@type":"Organization","name":"WeSatoshis","url":"https://wesatoshis.com"},{"@type":"Organization","name":"Zap Cooking","url":"https://zap.cooking"},{"@type":"Organization","name":"BitcoinWalk","url":"https://bitcoinwalk.org"}]}
</script>
<?php endif; ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php if (!empty($D['fonts'])): ?>
<link href="<?= e($D['fonts']) ?>" rel="stylesheet">
<?php endif; ?>
<link rel="stylesheet" href="<?= e(asset('css/base.css')) ?>">
<link rel="stylesheet" href="<?= e(asset('css/' . $DESIGN . '.css')) ?>" id="design-css" data-design="<?= e($DESIGN) ?>">
<noscript><style>
[data-locked]{display:block!important}
html.locked,html.locked body{height:auto!important;overflow:auto!important}
html.locked .s-hero{height:auto}
</style></noscript>
