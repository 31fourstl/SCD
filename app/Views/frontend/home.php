<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<!-- HERO -->
<section id="page-title" class="page-title-dark" data-bg-parallax="images/about/9.jpg">
    <div class="container">
        <div class="page-title-row">
            <div class="page-title-main">
                <h1 class="text-white">Upcoming Drops</h1>
                <p class="text-white opacity-7 lead">Stay ready. Limited runs, no restocks.</p>
            </div>
        </div>
    </div>
</section>
<!-- end: HERO -->

<!-- DROPS -->
<section class="section-base">
    <div class="container">

        <?php if (empty($drops)): ?>
            <!-- Empty State -->
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="m-t-60 m-b-60">
                        <i class="icon-shopping-bag" style="font-size:64px; opacity:0.2;"></i>
                        <h3 class="m-t-20">No drops at the moment</h3>
                        <p class="text-muted">Check back soon — something's always in the works.</p>
                    </div>
                </div>
            </div>
        <?php else: ?>

            <div class="row m-b-20">
                <div class="col-12 text-center">
                    <div class="title-wrap">
                        <h2 class="section-title">Latest Drops</h2>
                        <div class="section-title-border"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($drops as $drop): ?>
                <div class="col-lg-4 col-md-6 m-b-30">
                    <div class="product-item card border-0 shadow-sm h-100">

                        <!-- Drop Image -->
                        <?php if (!empty($drop['image_path'])): ?>
                            <div class="product-image overflow-hidden">
                                <img src="<?= base_url('uploads/' . esc($drop['image_path'])) ?>"
                                     alt="<?= esc($drop['title']) ?>"
                                     class="img-fluid w-100"
                                     style="height:300px; object-fit:cover;">
                            </div>
                        <?php else: ?>
                            <div class="product-image scd-placeholder d-flex align-items-center justify-content-center"
                                 style="height:300px; background:#111;">
                                <span style="font-size:2rem; font-weight:800; letter-spacing:4px; color:#e0ff00;">SCD</span>
                            </div>
                        <?php endif; ?>

                        <!-- Drop Body -->
                        <div class="card-body p-4">
                            <h4 class="product-title m-b-5"><?= esc($drop['title']) ?></h4>

                            <?php if (!empty($drop['drop_date'])): ?>
                                <p class="text-muted m-b-10">
                                    <i class="icon-clock m-r-5"></i>
                                    <?= date('F j, Y \a\t g:i A', strtotime($drop['drop_date'])) ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($drop['description'])): ?>
                                <p class="m-b-15"><?= esc($drop['description']) ?></p>
                            <?php endif; ?>

                            <?php if (!empty($drop['shopify_embed_code'])): ?>
                                <div class="shopify-embed m-t-20">
                                    <?= $drop['shopify_embed_code'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    </div>
</section>
<!-- end: DROPS -->

<!-- CTA BAND -->
<section class="section-base" data-bg-color="#111111">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-white m-b-5">Never miss a drop.</h3>
                <p class="text-white opacity-7 m-b-0">Follow us on Instagram and turn on post notifications to stay ahead.</p>
            </div>
            <div class="col-lg-4 text-lg-end m-t-20 m-t-lg-0">
                <a href="#" class="btn btn-light btn-lg">
                    <i class="fab fa-instagram m-r-10"></i>Follow @SCD
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end: CTA BAND -->

<?= $this->endSection() ?>
