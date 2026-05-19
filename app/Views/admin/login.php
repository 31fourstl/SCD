<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCD Admin – Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<div class="admin-login-wrap">
    <div class="admin-login-box">
        <h1>SCD</h1>
        <p class="sub">Admin Panel</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('admin/login') ?>">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text"
                       id="username"
                       name="username"
                       class="form-control"
                       value="<?= esc(old('username')) ?>"
                       autocomplete="username"
                       required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control"
                       autocomplete="current-password"
                       required>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%">Sign In</button>
        </form>
    </div>
</div>
</body>
</html>
