<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCD Admin<?= isset($pageTitle) ? ' – ' . esc($pageTitle) : '' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<div class="admin-layout">

    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <a href="<?= site_url('/') ?>" class="logo">SCD</a>
        <span class="role-label">Admin Panel</span>

        <nav class="admin-nav">
            <a href="<?= site_url('admin/drops') ?>"
               class="<?= str_starts_with(uri_string(), 'admin/drops') ? 'active' : '' ?>">
                Drops
            </a>
            <a href="<?= site_url('admin/settings') ?>"
               class="<?= str_starts_with(uri_string(), 'admin/settings') ? 'active' : '' ?>">
                Site Settings
            </a>
            <a href="<?= site_url('/') ?>" target="_blank">View Site ↗</a>
        </nav>

        <div class="admin-sidebar-footer">
            <a href="<?= site_url('admin/logout') ?>">Log out</a>
        </div>
    </aside>

    <!-- Main content -->
    <div class="admin-content">
        <?= $this->renderSection('content') ?>
    </div>

</div>
</body>
</html>
