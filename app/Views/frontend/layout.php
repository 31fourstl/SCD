<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCD – South City Degenerates<?= isset($pageTitle) ? ' | ' . esc($pageTitle) : '' ?></title>
    <meta name="description" content="South City Degenerates – Exclusive streetwear drops.">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="<?= base_url('/') ?>" class="logo">SCD</a>
            <nav class="site-nav">
                <a href="<?= base_url('/') ?>">Drops</a>
                <a href="<?= base_url('/shop') ?>">Shop</a>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> South City Degenerates. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
