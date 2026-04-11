<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="South City Degenerates – Exclusive streetwear drops. Limited runs, no restocks.">
    <link rel="icon" type="image/png" href="<?= base_url('images/favicon.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SCD – South City Degenerates<?= isset($pageTitle) ? ' | ' . esc($pageTitle) : '' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="<?= base_url('css/plugins.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/scd.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="scd-wrap">

        <!-- ── HEADER ── -->
        <header class="scd-header" id="scd-header">
            <div class="scd-header-inner">

                <!-- Brand mark + wordmark -->
                <a href="<?= base_url('/') ?>" class="scd-logo">
                    <span class="scd-logo-mark"></span>
                    <span class="scd-logo-text">SC <span>SOUTH CITY DEGENERATES</span></span>
                </a>

                <!-- Desktop nav -->
                <nav class="scd-nav">
                    <a href="<?= base_url('/') ?>">New Drop</a>
                    <a href="<?= base_url('/about') ?>">About</a>
                    <a href="<?= base_url('/shop') ?>">Shop</a>
                    <a href="<?= base_url('/contact') ?>">Contact</a>
                    <a href="<?= base_url('/shop') ?>" class="scd-btn-primary scd-btn-sm">Shop Now</a>
                </nav>

                <!-- Mobile toggle -->
                <button class="scd-nav-toggle" id="scd-nav-toggle" aria-label="Toggle menu">
                    <span></span><span></span><span></span>
                </button>
            </div>

            <!-- Mobile drawer -->
            <nav class="scd-nav-mobile" id="scd-nav-mobile">
                <a href="<?= base_url('/') ?>">New Drop</a>
                <a href="<?= base_url('/about') ?>">About</a>
                <a href="<?= base_url('/shop') ?>">Shop</a>
                <a href="<?= base_url('/contact') ?>">Contact</a>
            </nav>
        </header>
        <!-- ── END HEADER ── -->

        <main>
            <?= $this->renderSection('content') ?>
        </main>

        <!-- ── FOOTER ── -->
        <footer class="scd-footer">
            <div class="scd-container">
                <div class="scd-footer-inner">
                    <a href="<?= base_url('/') ?>" class="scd-logo">
                        <span class="scd-logo-mark"></span>
                        <span class="scd-logo-text">SC <span>SOUTH CITY DEGENERATES</span></span>
                    </a>
                    <nav class="scd-footer-nav">
                        <a href="<?= base_url('/') ?>">New Drop</a>
                        <a href="<?= base_url('/about') ?>">About</a>
                        <a href="<?= base_url('/shop') ?>">Shop</a>
                        <a href="<?= base_url('/contact') ?>">Contact</a>
                    </nav>
                </div>
                <p class="scd-footer-copy">&copy; <?= date('Y') ?> South City Degenerates. All rights reserved.</p>
            </div>
        </footer>
        <!-- ── END FOOTER ── -->

    </div><!-- /.scd-wrap -->

    <script src="<?= base_url('js/jquery.js') ?>"></script>
    <script>
        // Mobile nav toggle
        const toggle = document.getElementById('scd-nav-toggle');
        const drawer = document.getElementById('scd-nav-mobile');
        toggle.addEventListener('click', () => {
            toggle.classList.toggle('open');
            drawer.classList.toggle('open');
        });

        // Sticky header shadow on scroll
        window.addEventListener('scroll', () => {
            document.getElementById('scd-header').classList.toggle('scrolled', window.scrollY > 20);
        });
    </script>
</body>
</html>
