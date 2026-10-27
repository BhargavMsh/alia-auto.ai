<?php

/* =========================================================
   LOAD BLOG DATA
========================================================= */

$blogs = require __DIR__ . '/data/blogs.php';


/* =========================================================
   GET BLOG SLUG
========================================================= */

function seoSlug(string $value): string {
    return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $value), '-'));
}

$slug = isset($_GET['slug'])
    ? trim($_GET['slug'])
    : '';


/* =========================================================
   FIND CURRENT BLOG
========================================================= */

$currentBlog = null;

foreach ($blogs as $blog) {

    if (
        isset($blog['slug'])
        &&
        seoSlug((string)$blog['slug']) === seoSlug($slug)
    ) {

        $currentBlog = $blog;

        break;
    }

}


/* =========================================================
   404
========================================================= */

if (!$currentBlog) {

    http_response_code(404);

    $pageKey = 'blog';

    $pageTitle = 'Blog Not Found | ALIA';

    $pageDescription =
        'The requested ALIA automotive intelligence article could not be found.';

    require_once __DIR__ . '/header.php';

    ?>

    <link
        rel="stylesheet"
        href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>assets/css/blog.css"
    >

    <main class="single-blog-page">

        <section class="single-blog-not-found">

            <div class="shell">

                <span class="single-blog-kicker">
                    ALIA BLOGS
                </span>

                <h1>
                    Blog Not Found
                </h1>

                <p>
                    The article you are looking for could not be found.
                </p>

                <a href="/blogs">
                    Back to Blogs →
                </a>

            </div>

        </section>

    </main>

    <?php

    require_once __DIR__ . '/footer.php';

    exit;
}


/* =========================================================
   PAGE META
========================================================= */

$pageKey = 'blog';

$pageTitle =
    $currentBlog['title']
    . ' | ALIA Automotive Intelligence';

$pageDescription =
    $currentBlog['excerpt'];


/* =========================================================
   HEADER
========================================================= */

require_once __DIR__ . '/header.php';

?>


<link
    rel="stylesheet"
    href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>assets/css/blog.css"
>


<main class="single-blog-page">


    <!-- =====================================================
         BLOG HERO
    ====================================================== -->

    <section class="single-blog-hero">

        <div class="shell">

            <div class="single-blog-hero-inner">


                <!-- BREADCRUMB -->

                <div class="single-blog-breadcrumb">

                    <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/blogs">
                        Blogs
                    </a>

                    <span>
                        /
                    </span>

                    <span>

                        <?= htmlspecialchars(
                            $currentBlog['category'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>

                    </span>

                </div>



                <!-- CATEGORY -->

                <span class="single-blog-kicker">

                    <?= htmlspecialchars(
                        $currentBlog['category'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>

                </span>



                <!-- TITLE -->

                <h1>

                    <?= htmlspecialchars(
                        $currentBlog['title'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>

                </h1>



                <!-- INTRO -->

                <p class="single-blog-intro">

                    <?= htmlspecialchars(
                        $currentBlog['excerpt'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>

                </p>



                <!-- META -->

                <div class="single-blog-meta">

                    <span>

                        <?= htmlspecialchars(
                            $currentBlog['date'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>

                    </span>


                    <i></i>


                    <span>

                        <?= htmlspecialchars(
                            $currentBlog['read_time'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>

                    </span>


                    <i></i>


                    <span>
                        ALIA Automotive Intelligence
                    </span>

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================================
         FEATURE IMAGE
    ====================================================== -->

    <section class="single-blog-image-section">

        <div class="shell">

            <div class="single-blog-feature-image">

                <img
                    src="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars(
                        $currentBlog['image'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                    alt="<?= htmlspecialchars(
                        $currentBlog['title'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                >

            </div>

        </div>

    </section>



    <!-- =====================================================
         ARTICLE CONTENT
    ====================================================== -->

    <section class="single-blog-content-section">

        <div class="shell">

            <div class="single-blog-layout">


                <!-- =================================================
                     ARTICLE
                ================================================== -->

                <article class="single-blog-content">

                    <?= $currentBlog['content'] ?>

                </article>


<!-- =================================================
     SIDEBAR
================================================== -->

<aside class="single-blog-sidebar">


    <div class="single-blog-side-card">

        <span class="single-blog-side-label">
            ALIA AUTOMOTIVE INTELLIGENCE
        </span>


        <h3>
            Turn Market Activity Into Better Decisions
        </h3>


        <p>
            Compare automotive pricing, incentives and
            competitive offers across supported GCC markets.
        </p>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>contact">
            Request a Demo →
        </a>

    </div>



    <div class="single-blog-explore">

        <span>
            EXPLORE ALIA
        </span>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>automotive-incentive">
            Automotive Incentive
        </a>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>dealer-competitive-intelligence">
            Dealer Competitive Intelligence
        </a>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>automotive-pricing-intelligence">
            Automotive Pricing Intelligence
        </a>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>total-offer-value">
            Total Offer Value
        </a>


        <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>how-alia-works">
            How ALIA Works
        </a>

    </div>


</aside>


</div>

</div>

</section>



    <!-- =====================================================
         RELATED BLOGS
    ====================================================== -->

    <section class="single-blog-related">

        <div class="shell">


            <div class="single-blog-related-head">


                <div>

                    <span class="single-blog-kicker">
                        MORE INSIGHTS
                    </span>

                    <h2>
                        Explore More ALIA Perspectives
                    </h2>

                </div>


                <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/blogs">
                    View All Blogs →
                </a>


            </div>



            <div class="single-blog-related-grid">


                <?php

                $relatedCount = 0;

                foreach ($blogs as $relatedBlog):


                    if (
                        $relatedBlog['slug']
                        ===
                        $currentBlog['slug']
                    ) {

                        continue;

                    }


                    if ($relatedCount >= 3) {

                        break;

                    }


                    $relatedCount++;

                ?>


                    <article class="single-blog-related-card">


                        <a
                            href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/blog/<?= htmlspecialchars(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $relatedBlog['slug']), '-')), ENT_QUOTES, 'UTF-8') ?>"
                            class="single-blog-related-image"
                        >

                            <img
                                src="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars(
                                    $relatedBlog['image'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>"
                                alt="<?= htmlspecialchars(
                                    $relatedBlog['title'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>"
                            >

                        </a>



                        <div class="single-blog-related-content">


                            <span>

                                <?= htmlspecialchars(
                                    $relatedBlog['category'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </span>



                            <h3>

                                <a
                                    href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/blog/<?= htmlspecialchars(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $relatedBlog['slug']), '-')), ENT_QUOTES, 'UTF-8') ?>"
                                >

                                    <?= htmlspecialchars(
                                        $relatedBlog['title'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>

                                </a>

                            </h3>



                            <p>

                                <?= htmlspecialchars(
                                    $relatedBlog['excerpt'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </p>



                            <a
                                href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/blog/<?= htmlspecialchars(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $relatedBlog['slug']), '-')), ENT_QUOTES, 'UTF-8') ?>"
                                class="single-blog-read-more"
                            >

                                Read Article →

                            </a>


                        </div>


                    </article>


                <?php endforeach; ?>


            </div>


        </div>

    </section>



    <!-- =====================================================
         FINAL CTA
    ====================================================== -->

    <section class="single-blog-cta-section">

        <div class="shell">

            <div class="single-blog-cta">


                <div>

                    <span>
                        ALIA AUTOMOTIVE INTELLIGENCE
                    </span>


                    <h2>
                        Turn Automotive Market Activity Into Better Decisions
                    </h2>


                    <p>
                        Understand competitive pricing, incentives and complete
                        customer propositions across GCC automotive markets.
                    </p>

                </div>


                <a href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>contact">
                    Request a Demo →
                </a>


            </div>

        </div>

    </section>


</main>


<?php

require_once __DIR__ . '/footer.php';

?>