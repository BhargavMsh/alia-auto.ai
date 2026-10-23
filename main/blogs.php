<?php

$pageKey = 'blogs';

$pageTitle = 'ALIA Blogs | Automotive Market Intelligence';

$pageDescription =
    'Explore ALIA blogs covering automotive market intelligence, incentive benchmarking and total offer value across GCC automotive markets.';


/* =========================================================
   LOAD BLOG DATA
========================================================= */

$blogsFile = __DIR__ . '/data/blogs.php';

$blogs = [];

if (file_exists($blogsFile)) {

    $loadedBlogs = require $blogsFile;

    if (is_array($loadedBlogs)) {

        $blogs = $loadedBlogs;

    }

}


/* =========================================================
   FIND FEATURED BLOG
========================================================= */

$featuredBlog = null;

foreach ($blogs as $blog) {

    if (!empty($blog['featured'])) {

        $featuredBlog = $blog;

        break;

    }

}


/* =========================================================
   FALLBACK FEATURED BLOG
========================================================= */

if (
    !$featuredBlog
    &&
    !empty($blogs)
) {

    $featuredBlog = $blogs[0];

}


/* =========================================================
   HEADER
========================================================= */

require_once __DIR__ . '/header.php';

?>


<link
    rel="stylesheet"
    href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>assets/css/blogs.css"
>


<main class="alia-blogs-page">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="blogs-hero">

        <div class="shell">

            <div class="blogs-hero-inner">


                <span class="blogs-kicker">
                    Blogs
                </span>


                <h1>

                    Automotive Intelligence for

                    <span>
                        Better Market Decisions
                    </span>

                </h1>


                <p>

                    Explore perspectives on automotive market intelligence,
                    incentive benchmarking, competitive offers and Total Offer
                    Value across GCC automotive markets.

                </p>


            </div>

        </div>

    </section>



    <!-- =====================================================
         FEATURED BLOG
    ====================================================== -->

    <?php if ($featuredBlog): ?>

        <section class="blogs-featured-section">

            <div class="shell">

                <article class="blogs-featured">


                    <!-- FEATURED IMAGE -->

                    <a
                        href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/blog/<?= htmlspecialchars(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $featuredBlog['slug']), '-')), ENT_QUOTES, 'UTF-8') ?>"
                        class="blogs-featured-image"
                    >

                        <img
                            src="<?= htmlspecialchars(
                                $featuredBlog['image'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"
                            alt="<?= htmlspecialchars(
                                $featuredBlog['title'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"
                        >

                    </a>



                    <!-- FEATURED CONTENT -->

                    <div class="blogs-featured-content">


                        <span class="blogs-featured-label">
                            Featured Blog
                        </span>


                        <h2>

                            <?= htmlspecialchars(
                                $featuredBlog['title'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>

                        </h2>


                        <p>

                            <?php

                            $featuredDescription =
                                $featuredBlog['featured_excerpt']
                                ??
                                $featuredBlog['excerpt']
                                ??
                                '';

                            echo htmlspecialchars(
                                $featuredDescription,
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </p>



                        <div class="blogs-meta">


                            <span>

                                <?= htmlspecialchars(
                                    $featuredBlog['date'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </span>


                            <i></i>


                            <span>

                                <?= htmlspecialchars(
                                    $featuredBlog['read_time'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </span>


                        </div>



                        <a
                            href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>blog/<?= htmlspecialchars(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $featuredBlog['slug']), '-')), ENT_QUOTES, 'UTF-8') ?>"
                            class="blogs-read-link"
                        >

                            Read Blog

                            <span>→</span>

                        </a>


                    </div>


                </article>

            </div>

        </section>

    <?php endif; ?>



    <!-- =====================================================
         BLOG LIST
    ====================================================== -->

    <section class="blogs-list-section">

        <div class="shell">


            <div class="blogs-section-heading">


                <span class="blogs-kicker">
                    Latest Blogs
                </span>


                <h2>
                    Explore ALIA Automotive Perspectives
                </h2>


                <p>

                    Practical content for automotive teams working across
                    pricing, incentives and competitive market intelligence.

                </p>


            </div>



            <div class="blogs-grid">


                <?php if (!empty($blogs)): ?>


                    <?php foreach ($blogs as $blog): ?>


                        <article class="blog-card">


                            <!-- BLOG IMAGE -->

                            <a
                                href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/blog/<?= htmlspecialchars(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $blog['slug']), '-')), ENT_QUOTES, 'UTF-8') ?>"
                                class="blog-card-image"
                            >

                                <img
                                    src="<?= htmlspecialchars(
                                        $blog['image'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>"
                                    alt="<?= htmlspecialchars(
                                        $blog['title'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>"
                                >

                            </a>



                            <!-- BLOG CONTENT -->

                            <div class="blog-card-content">


                                <div class="blogs-meta">


                                    <span>

                                        <?= htmlspecialchars(
                                            $blog['date'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>

                                    </span>


                                    <i></i>


                                    <span>

                                        <?= htmlspecialchars(
                                            $blog['read_time'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>

                                    </span>


                                </div>



                                <h3>

                                    <a
                                        href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/blog/<?= htmlspecialchars(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $blog['slug']), '-')), ENT_QUOTES, 'UTF-8') ?>"
                                    >

                                        <?= htmlspecialchars(
                                            $blog['title'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>

                                    </a>

                                </h3>



                                <p>

                                    <?= htmlspecialchars(
                                        $blog['excerpt'] ?? '',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>

                                </p>



                                <a
                                    href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>blog/<?= htmlspecialchars(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $blog['slug']), '-')), ENT_QUOTES, 'UTF-8') ?>"
                                    class="blogs-read-link"
                                >

                                    Read More

                                    <span>→</span>

                                </a>


                            </div>


                        </article>


                    <?php endforeach; ?>


                <?php else: ?>


                    <p>
                        No blogs are available yet.
                    </p>


                <?php endif; ?>


            </div>



            <!-- =================================================
                 PAGINATION
                 KEEP HIDDEN UNTIL MORE BLOGS ARE ADDED
            ================================================== -->

            <!--

            <nav
                class="blogs-pagination"
                aria-label="Blog pagination"
            >

                <a
                    href="#"
                    class="blogs-page-arrow disabled"
                >
                    ← Previous
                </a>


                <a
                    href="#"
                    class="active"
                >
                    1
                </a>


                <a
                    href="#"
                    class="blogs-page-arrow disabled"
                >
                    Next →
                </a>

            </nav>

            -->


        </div>

    </section>



    <!-- =====================================================
         FINAL CTA
    ====================================================== -->

    <section class="blogs-final-section">

        <div class="shell">

            <div class="blogs-final-card">


                <div>


                    <span>
                        ALIA Automotive Intelligence
                    </span>


                    <h2>
                        Turn Automotive Market Activity Into Better Decisions
                    </h2>


                    <p>

                        See how ALIA can help your team understand pricing,
                        incentives and competitive offers across GCC markets.

                    </p>


                </div>



                <a
                    href="<?= htmlspecialchars($site['website'], ENT_QUOTES, 'UTF-8') ?>/contact"
                    class="blogs-final-button"
                >

                    Request a Demo

                </a>


            </div>

        </div>

    </section>


</main>


<?php

require_once __DIR__ . '/footer.php';

?>