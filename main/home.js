document.addEventListener('DOMContentLoaded', function () {

    const toggle = document.querySelector('.mobile-toggle');
    const mobileNav = document.querySelector('.mobile-nav');

    const solutionsToggle = document.querySelector('.mobile-solutions-toggle');
    const solutionsMenu = document.querySelector('.mobile-solutions-menu');


    /* =========================================================
       MAIN MOBILE MENU
    ========================================================= */

    if (toggle && mobileNav) {

        toggle.addEventListener('click', function () {

            const isOpen = mobileNav.classList.toggle('open');

            toggle.setAttribute(
                'aria-expanded',
                String(isOpen)
            );


            /* If main menu closes, also close Solutions submenu */

            if (!isOpen && solutionsMenu && solutionsToggle) {

                solutionsMenu.classList.remove('open');

                solutionsToggle.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }

        });

    }


    /* =========================================================
       MOBILE SOLUTIONS SUBMENU
    ========================================================= */

    if (solutionsToggle && solutionsMenu) {

        solutionsToggle.addEventListener('click', function (event) {

            event.preventDefault();

            const isOpen = solutionsMenu.classList.toggle('open');

            solutionsToggle.setAttribute(
                'aria-expanded',
                String(isOpen)
            );

        });

    }


    /* =========================================================
       CLOSE AFTER CLICKING ANY MOBILE LINK
    ========================================================= */

    if (mobileNav && toggle) {

        mobileNav
            .querySelectorAll('a')
            .forEach(function (link) {

                link.addEventListener('click', function () {

                    mobileNav.classList.remove('open');

                    toggle.setAttribute(
                        'aria-expanded',
                        'false'
                    );


                    if (solutionsMenu) {

                        solutionsMenu.classList.remove('open');

                    }


                    if (solutionsToggle) {

                        solutionsToggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                    }

                });

            });

    }


    /* =========================================================
       CLOSE WITH ESCAPE
    ========================================================= */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            if (mobileNav) {

                mobileNav.classList.remove('open');

            }


            if (toggle) {

                toggle.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }


            if (solutionsMenu) {

                solutionsMenu.classList.remove('open');

            }


            if (solutionsToggle) {

                solutionsToggle.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }

        }

    });


    /* =========================================================
       RESET WHEN RETURNING TO DESKTOP
    ========================================================= */

    window.addEventListener('resize', function () {

        if (window.innerWidth > 1350) {

            if (mobileNav) {

                mobileNav.classList.remove('open');

            }


            if (toggle) {

                toggle.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }


            if (solutionsMenu) {

                solutionsMenu.classList.remove('open');

            }


            if (solutionsToggle) {

                solutionsToggle.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }

        }

    });

});