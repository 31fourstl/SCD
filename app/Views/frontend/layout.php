<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="South City Degenerates – Exclusive streetwear drops. Limited runs, no restocks.">
    <link rel="icon" type="image/png" href="<?= base_url('images/favicon.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SCD – South City Degenerates<?= isset($pageTitle) ? ' | ' . esc($pageTitle) : '' ?></title>
    <link href="<?= base_url('css/plugins.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/scd.css') ?>" rel="stylesheet">
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">

        <!-- Header -->
        <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="<?= base_url('/') ?>">
                            <span class="logo-default">SCD</span>
                            <span class="logo-dark">SCD</span>
                        </a>
                    </div>
                    <!--end: Logo-->

                    <!--Navigation Responsive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Responsive Trigger-->

                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="<?= base_url('/') ?>">Drops</a></li>
                                    <li><a href="<?= base_url('/shop') ?>">Shop</a></li>
                                    <li><a href="<?= base_url('/about') ?>">About</a></li>
                                    <li><a href="<?= base_url('/contact') ?>">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
        <!-- end: Header -->

        <?= $this->renderSection('content') ?>

        <!-- Footer -->
        <footer id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="widget">
                                <div class="widget-title">South City Degenerates</div>
                                <p class="mb-4">Exclusive streetwear drops.<br>Limited runs, no restocks.</p>
                                <ul class="social-icons">
                                    <li><a href="#" class="social-icon social-icon-border social-instagram" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#" class="social-icon social-icon-border social-twitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="social-icon social-icon-border social-facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <div class="widget">
                                <div class="widget-title">Navigate</div>
                                <ul class="list">
                                    <li><a href="<?= base_url('/') ?>">Drops</a></li>
                                    <li><a href="<?= base_url('/shop') ?>">Shop</a></li>
                                    <li><a href="<?= base_url('/about') ?>">About</a></li>
                                    <li><a href="<?= base_url('/contact') ?>">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget">
                                <div class="widget-title">Stay Ready</div>
                                <p>Sign up to get notified on every drop before they go live.</p>
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="your@email.com">
                                        <button class="btn btn-primary" type="submit">Notify Me</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">
                        &copy; <?= date('Y') ?> South City Degenerates. All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->

    </div>
    <!-- end: Body Inner -->

    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

    <!--Plugins-->
    <script src="<?= base_url('js/jquery.js') ?>"></script>
    <script src="<?= base_url('js/plugins.js') ?>"></script>
    <!--Theme functions-->
    <script src="<?= base_url('js/functions.js') ?>"></script>
</body>

</html>
