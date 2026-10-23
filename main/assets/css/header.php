<?php

$pageKey = $pageKey ?? 'home';

$pageTitle = $pageTitle
    ?? 'ALIA — Auto Offers Live Intelligent Agent | Confidence in Every Car Deal';

$pageDescription = $pageDescription
    ?? 'Compare automotive offers, pricing and incentives across GCC markets with ALIA.';

$site = [
    'home' => 'index.php',
    'signin' => 'https://app.alia-auto.ai/signin',
    'contact' => 'contact.php',
];

$homePrefix = ($pageKey === 'home') ? '' : 'index.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>"
    >

    <title>
        <?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>
    </title>

    <link
        rel="icon"
        href="assets/images/alia-logo.png"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@600;700;800&family=Open+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="assets/css/home.css"
    >

    <?php if ($pageKey === 'contact'): ?>

        <link
            rel="stylesheet"
            href="assets/css/contact.css"
        >

    <?php endif; ?>

</head>

<body>


<header class="site-header">

    <div class="header-frame">


        <!-- LEFT BRAND -->

        <a
            class="alia-logo-bar"
            href="<?= $site['home'] ?>#top"
            aria-label="ALIA home"
        >

            <img
                src="assets/images/alia-logo.png"
                alt="ALIA Logo"
                class="alia-logo-bar__img"
            >

            <div class="alia-logo-bar__text-block">

                <div class="alia-logo-bar__heading">

                    <span class="alia-accent">A</span>uto Offers

                    <span class="alia-accent">L</span>ive

                    <span class="alia-accent">I</span>ntelligent

                    <span class="alia-accent">A</span>gent

                </div>

                <div class="alia-logo-bar__tagline">
                    Confidence in Every Car Deal
                </div>

            </div>

        </a>



        <!-- DESKTOP NAV -->

        <nav class="desktop-nav">


            <!-- SIMPLE SOLUTIONS DROPDOWN -->

            <div class="simple-dropdown">

                <button
                    class="simple-dropdown-trigger"
                    type="button"
                >
                    Solutions

                    <span>
                        ▾
                    </span>
                </button>


                <div class="simple-dropdown-menu">

                    <a href="automotive-incentive-benchmarking.php">
                        Automotive Incentive Benchmarking
                    </a>

                    <a href="dealer-competitive-intelligence.php">
                        Dealer Competitive Intelligence
                    </a>

                    <a href="automotive-pricing-intelligence.php">
                        Automotive Pricing Intelligence
                    </a>

                </div>

            </div>


            <a href="total-offer-value.php">
                Total Offer Value
            </a>


            <a href="how-alia-works.php">
                How ALIA Works
            </a>


            <a href="blogs.php">
                Blogs
            </a>


            <a href="about-alia.php">
                About ALIA
            </a>

        </nav>



        <!-- RIGHT ACTIONS -->

        <div class="header-actions">

            <a
                class="header-signin"
                href="<?= htmlspecialchars($site['signin'], ENT_QUOTES, 'UTF-8') ?>"
                target="_blank"
                rel="noopener noreferrer"
            >
                Sign In
            </a>


            <a
                class="header-demo"
                href="<?= htmlspecialchars($site['contact'], ENT_QUOTES, 'UTF-8') ?>"
            >
                Request a Demo
            </a>

        </div>



        <!-- MOBILE BUTTON -->

        <button
            class="mobile-toggle"
            type="button"
            aria-label="Open menu"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>


    </div>



    <!-- MOBILE NAV -->

    <div class="mobile-nav">


        <div class="mobile-solutions-title">
            Solutions
        </div>


        <a href="automotive-incentive-benchmarking.php">
            Automotive Incentive Benchmarking
        </a>


        <a href="dealer-competitive-intelligence.php">
            Dealer Competitive Intelligence
        </a>


        <a href="automotive-pricing-intelligence.php">
            Automotive Pricing Intelligence
        </a>


        <a href="total-offer-value.php">
            Total Offer Value
        </a>


        <a href="how-alia-works.php">
            How ALIA Works
        </a>


        <a href="<?= $homePrefix ?>#insights">
            Insights
        </a>


        <a href="<?= $homePrefix ?>#about">
            About ALIA
        </a>


        <a
            class="mobile-demo"
            href="contact.php"
        >
            Request a Demo
        </a>

    </div>

</header>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggle = document.querySelector('.mobile-toggle');
    const nav = document.querySelector('.mobile-nav');

    if (toggle && nav) {

        toggle.addEventListener('click', function () {

            nav.classList.toggle('is-open');

        });

    }

});
</script>