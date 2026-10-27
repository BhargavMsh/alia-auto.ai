<?php

$pageKey = $pageKey ?? 'home';

$pageTitle = $pageTitle
    ?? 'ALIA — Auto Offers Live Intelligent Agent | Confidence in Every Car Deal';

$pageDescription = $pageDescription
    ?? 'Compare automotive offers, pricing and incentives across GCC markets with ALIA.';

$site = [
    'home' => 'index',
    'signin' => 'https://app.alia-auto.ai/signin',
    'contact' => 'contact',
	'website'=>'https://alia-auto.ai/'
];

$homePrefix = ($pageKey === 'home') ? '' : 'index.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TP5FVLMF');</script>
<!-- End Google Tag Manager -->

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
        href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>assets/images/alia-logo.png"
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
        href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>assets/css/home.css"
    >

    <?php if ($pageKey === 'contact'): ?>

        <link
            rel="stylesheet"
            href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>assets/css/contact.css"
        >

    <?php endif; ?>

</head>

<body>
    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TP5FVLMF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="site-header">

    <div class="header-frame">


        <!-- =====================================================
             LEFT BRAND
        ====================================================== -->

        <a
            class="alia-logo-bar"
            href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars($site['home'], ENT_QUOTES, 'UTF-8') ?>#top"
            aria-label="ALIA home"
        >

            <img
                src="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>assets/images/alia-logo.png"
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



        <!-- =====================================================
             DESKTOP NAVIGATION
        ====================================================== -->

        <nav
            class="desktop-nav"
            aria-label="Primary navigation"
        >


            <!-- =================================================
                 SOLUTIONS MEGA MENU
            ================================================== -->

            <div class="simple-dropdown mega-solutions">

                <button
                    class="simple-dropdown-trigger"
                    type="button"
                    aria-haspopup="true"
                >
                    Solutions

                    <span aria-hidden="true">
                        ▾
                    </span>

                </button>


                <div class="alia-solutions-mega">


                    <!-- =========================================
                         LEFT SOLUTIONS
                    ========================================== -->

                    <div class="alia-solutions-list">


                        <!-- 01 -->

                        <a
                            href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>solutions/automotive-incentive"
                            class="alia-solution-item"
                        >

                            <div class="alia-solution-icon">
                                %
                            </div>


                            <div class="alia-solution-copy">

                                <strong>
                                    Automotive Incentive
                                </strong>

                                <span>
                                    Compare discounts, cashback, warranty
                                    and incentive support across GCC markets.
                                </span>

                            </div>


                            <span
                                class="alia-solution-arrow"
                                aria-hidden="true"
                            >
                                →
                            </span>

                        </a>



                        <!-- 02 -->

                        <a
                            href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>solutions/dealer-competitive-intelligence"
                            class="alia-solution-item"
                        >

                            <div class="alia-solution-icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >

                                    <circle
                                        cx="8"
                                        cy="8"
                                        r="3"
                                    ></circle>

                                    <circle
                                        cx="16"
                                        cy="8"
                                        r="3"
                                    ></circle>

                                    <path
                                        d="M2 20c0-4 2.5-7 6-7"
                                    ></path>

                                    <path
                                        d="M22 20c0-4-2.5-7-6-7"
                                    ></path>

                                    <path
                                        d="M7 20c0-4 2-7 5-7s5 3 5 7"
                                    ></path>

                                </svg>

                            </div>


                            <div class="alia-solution-copy">

                                <strong>
                                    Dealer Competitive Intelligence
                                </strong>

                                <span>
                                    Understand competing dealer propositions
                                    and market positioning.
                                </span>

                            </div>


                            <span
                                class="alia-solution-arrow"
                                aria-hidden="true"
                            >
                                →
                            </span>

                        </a>



                        <!-- 03 -->

                        <a
                            href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>solutions/automotive-pricing-intelligence"
                            class="alia-solution-item"
                        >

                            <div class="alia-solution-icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >

                                    <path
                                        d="M3 17l6-6 4 4 7-8"
                                    ></path>

                                    <path
                                        d="M15 7h5v5"
                                    ></path>

                                </svg>

                            </div>


                            <div class="alia-solution-copy">

                                <strong>
                                    Automotive Pricing Intelligence
                                </strong>

                                <span>
                                    Monitor pricing position, model mix
                                    and market movement across the region.
                                </span>

                            </div>


                            <span
                                class="alia-solution-arrow"
                                aria-hidden="true"
                            >
                                →
                            </span>

                        </a>

                    </div>



                    <!-- =========================================
                         RIGHT VISUAL PANEL
                    ========================================== -->

                    <div class="alia-solutions-visual">

                        <img
                            src="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>assets/images/alia-solutions-car.png"
                            alt=""
                            class="alia-solutions-car"
                            aria-hidden="true"
                        >


                        <div
                            class="alia-solutions-overlay"
                            aria-hidden="true"
                        ></div>


                        <div class="alia-solutions-visual-content">

                            <span class="alia-solutions-label">
                                ALIA Solutions
                            </span>


                            <h3>
                                Turn Automotive Offers Into

                                <strong>
                                    Actionable Intelligence
                                </strong>
                            </h3>


                            <p>
                                Real-time insights on pricing,
                                incentives and competitive activity
                                across GCC markets.
                            </p>


                            <div class="alia-intelligence-tags">

                                <span>
                                    Pricing
                                </span>

                                <span>
                                    Incentives
                                </span>

                                <span>
                                    Competitors
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 STANDARD NAVIGATION LINKS
            ================================================== -->

            <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>total-offer-value">
                Total Offer Value
            </a>


            <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>how-alia-works">
                How ALIA Works
            </a>


            <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>blogs">
                Blogs
            </a>


            <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>about-alia">
                About ALIA
            </a>

        </nav>



        <!-- =====================================================
             RIGHT ACTIONS
        ====================================================== -->

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



        <!-- =====================================================
             MOBILE HAMBURGER BUTTON
        ====================================================== -->

        <button
            class="mobile-toggle"
            type="button"
            aria-label="Toggle navigation menu"
            aria-controls="alia-mobile-nav"
            aria-expanded="false"
        >

            <span></span>
            <span></span>
            <span></span>

        </button>

    </div>



    <!-- =========================================================
         MOBILE NAVIGATION
    ========================================================== -->

    <div
        class="mobile-nav"
        id="alia-mobile-nav"
    >


        <!-- =====================================================
             MOBILE SOLUTIONS TOGGLE
        ====================================================== -->

        <button
            class="mobile-solutions-toggle"
            type="button"
            aria-controls="alia-mobile-solutions"
            aria-expanded="false"
        >

            <span>
                Solutions
            </span>

            <span
                class="mobile-solutions-arrow"
                aria-hidden="true"
            >
                ▾
            </span>

        </button>



        <!-- =====================================================
             MOBILE SOLUTIONS SUBMENU
        ====================================================== -->

        <div
            class="mobile-solutions-menu"
            id="alia-mobile-solutions"
        >

            <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>solutions/automotive-incentive">
                Automotive Incentive 
            </a>


            <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>solutions/dealer-competitive-intelligence">
                Dealer Competitive Intelligence
            </a>


            <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>solutions/automotive-pricing-intelligence">
                Automotive Pricing Intelligence
            </a>

        </div>



        <!-- =====================================================
             STANDARD MOBILE LINKS
        ====================================================== -->

        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>total-offer-value">
            Total Offer Value
        </a>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>how-alia-works">
            How ALIA Works
        </a>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>blogs">
            Blogs
        </a>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>about-alia">
            About ALIA
        </a>


        <a
            class="header-signin mobile-signin"
            href="<?= htmlspecialchars($site['signin'], ENT_QUOTES, 'UTF-8') ?>"
            target="_blank"
            rel="noopener noreferrer"
        >
            Sign In
        </a>


        <a
            class="mobile-demo"
            href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars($site['contact'], ENT_QUOTES, 'UTF-8') ?>"
        >
            Request a Demo
        </a>

    </div>

</header>