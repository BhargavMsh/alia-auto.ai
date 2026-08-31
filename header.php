<?php
$pageKey = $pageKey ?? 'home';
$pageTitle = $pageTitle ?? 'ALIA — Auto Offers Live Intelligent Agent | Confidence in Every Car Deal';
$pageDescription = $pageDescription ?? 'Compare real-time car offers across dealers with ALIA. Find the best incentives, pricing, and deals instantly.';
$site = [
    'signin' => 'https://app.alia-auto.ai/signin',
    'contact' => '/contact.php',
    'home' => '/index.php',
];
$homePrefix = $pageKey === 'home' ? '' : '/index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="robots" content="index,follow,max-image-preview:large">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="Confidence in Every Car Deal">
    <meta property="og:image" content="/assets/images/homepage-banner.png">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" href="/assets/images/alia-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@500;600;700&family=Montserrat:wght@600;700;800&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/home.css">
    <?php if ($pageKey === 'contact'): ?><link rel="stylesheet" href="/assets/css/contact.css"><?php endif; ?>
</head>
<body>
<header class="site-header">
    <div class="header-frame">
        <a class="alia-logo-bar" href="<?= $site['home'] ?>#top" aria-label="ALIA home">
            <img src="/assets/images/alia-logo.png" alt="ALIA Logo" class="alia-logo-bar__img">
            <div class="alia-logo-bar__text-block">
                <div class="alia-logo-bar__heading"><span class="alia-accent">A</span>uto Offers <span class="alia-accent">L</span>ive <span class="alia-accent">I</span>ntelligent <span class="alia-accent">A</span>gent</div>
                <div class="alia-logo-bar__tagline">Confidence in Every Car Deal</div>
            </div>
        </a>
        <nav class="desktop-nav" aria-label="Primary navigation">
            <a href="<?= $homePrefix ?>#features">Features</a>
            <a href="<?= $homePrefix ?>#intelligence">Intelligence</a>
            <a href="<?= $homePrefix ?>#coverage">Coverage</a>
        </nav>
        <div class="header-actions">
            <a class="signin-link" href="<?= htmlspecialchars($site['signin'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">Sign In</a>
            <a class="contact-link" href="<?= htmlspecialchars($site['contact'], ENT_QUOTES, 'UTF-8') ?>">Contact Us</a>
        </div>
        <button class="mobile-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu"><span></span><span></span><span></span></button>
    </div>
    <div class="mobile-nav" id="mobile-nav">
        <a href="<?= $homePrefix ?>#features">Features</a>
        <a href="<?= $homePrefix ?>#intelligence">Intelligence</a>
        <a href="<?= $homePrefix ?>#coverage">Coverage</a>
        <a href="<?= htmlspecialchars($site['signin'], ENT_QUOTES, 'UTF-8') ?>">Sign In</a>
        <a class="mobile-contact" href="<?= htmlspecialchars($site['contact'], ENT_QUOTES, 'UTF-8') ?>">Contact Us</a>
    </div>
</header>
