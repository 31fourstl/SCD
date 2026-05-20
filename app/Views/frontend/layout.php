<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="South City Degenerates – Exclusive streetwear drops. Limited runs, no restocks.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SCD – South City Degenerates<?= isset($pageTitle) ? ' | ' . esc($pageTitle) : '' ?></title>

    <link rel="icon" type="image/png" href="<?= base_url('images/favicon.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="<?= base_url('css/plugins.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/scd.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/scd-editorial-landing.css') ?>" rel="stylesheet">
</head>
<body class="editorial-body">
    <header class="editorial-topbar">
        <div class="editorial-container editorial-nav">
            <a class="editorial-brand" href="<?= base_url('/') ?>" aria-label="South City Degenerates home">
                <?php if (file_exists(FCPATH . 'assets/images/logo.png')): ?>
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="South City Degenerates" class="editorial-logo-img">
                <?php else: ?>
                    <span class="editorial-brand-mark">SC</span>
                <?php endif; ?>
                <span>South City Degenerates</span>
            </a>

            <nav class="editorial-nav-links" aria-label="Primary navigation">
                <a href="<?= base_url('/') ?>#drops">New Drop</a>
                <a href="<?= base_url('/') ?>#about">About</a>
                <a href="<?= base_url('/') ?>#shop">Shop</a>
                <a href="<?= base_url('/') ?>#contact">Contact</a>
            </nav>

            <a class="editorial-nav-cta" href="<?= base_url('/') ?>#shop">Shop the Drop</a>
        </div>
    </header>

    <main id="top">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="editorial-footer" id="contact">
        <div class="editorial-container">
            <div class="editorial-footer-panel">
                <a class="editorial-footer-brand" href="<?= base_url('/') ?>" aria-label="South City Degenerates home">
                    <?php if (file_exists(FCPATH . 'assets/images/logo.png')): ?>
                        <img src="<?= base_url('assets/images/logo.png') ?>" alt="South City Degenerates" class="editorial-logo-img editorial-logo-img--footer">
                    <?php else: ?>
                        <span class="editorial-brand-mark">SC</span>
                    <?php endif; ?>
                    <span>South City Degenerates</span>
                </a>

                <nav class="editorial-footer-links" aria-label="Footer navigation">
                    <a href="<?= base_url('/') ?>#drops">Drop</a>
                    <a href="<?= base_url('/') ?>#about">Story</a>
                    <a href="<?= base_url('/') ?>#shop">Shop</a>
                    <a href="https://store.lushlemur.com/" target="_blank" rel="noopener noreferrer">Storefront</a>
                </nav>
            </div>
        </div>
    </footer>
</body>
</html>