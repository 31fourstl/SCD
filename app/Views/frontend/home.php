<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<section class="scd-hero" aria-labelledby="scd-hero-title">
    <div class="scd-hero__overlay"></div>

    <div class="scd-hero__inner container">
        <div class="scd-hero__content">
            <p class="scd-hero__eyebrow">LET'S DO THIS</p>
            <h1 id="scd-hero-title">South City Degenerates</h1>
            <p class="scd-hero__subhead">
                Limited-run streetwear for the loud, loyal, and beautifully unruly side of St. Louis.
            </p>
            <a class="scd-hero__button" href="#drops">Shop the Drop</a>
        </div>

        <div class="scd-hero__features" aria-label="South City Degenerates brand pillars">
            <article class="scd-hero-feature">
                <h2>Limited Drops</h2>
                <p>No mass production. Small runs, real demand, and pieces made to feel like local artifacts.</p>
            </article>
            <article class="scd-hero-feature">
                <h2>South City Made</h2>
                <p>Built from neighborhood bars, basement shows, corner-store runs, and late-night STL energy.</p>
            </article>
            <article class="scd-hero-feature">
                <h2>Degenerate Energy</h2>
                <p>For the ones who show up loud, stay outside too late, and never leave the block behind.</p>
            </article>
            <article class="scd-hero-feature">
                <h2>Local Uniform</h2>
                <p>Streetwear for the regulars, creatives, lifers, outsiders, and beautifully questionable characters.</p>
            </article>
        </div>
    </div>
</section>

<section id="drops" class="drops-section">
    <div class="container">
        <?php if (empty($drops)): ?>
            <p class="no-drops">No upcoming drops at the moment. Check back soon.</p>
        <?php else: ?>
            <div class="drops-grid">
                <?php foreach ($drops as $drop): ?>
                    <article class="drop-card">
                        <?php if (!empty($drop['image_path'])): ?>
                            <div class="drop-image">
                                <img src="<?= base_url('uploads/' . esc($drop['image_path'])) ?>"
                                     alt="<?= esc($drop['title']) ?>">
                            </div>
                        <?php else: ?>
                            <div class="drop-image drop-image--placeholder">
                                <span>SCD</span>
                            </div>
                        <?php endif; ?>

                        <div class="drop-body">
                            <h2 class="drop-title"><?= esc($drop['title']) ?></h2>

                            <?php if (!empty($drop['drop_date'])): ?>
                                <p class="drop-date">
                                    <strong>Drop Date:</strong>
                                    <?= date('F j, Y \\a\\t g:i A', strtotime($drop['drop_date'])) ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($drop['description'])): ?>
                                <p class="drop-desc"><?= esc($drop['description']) ?></p>
                            <?php endif; ?>

                            <?php if (!empty($drop['shopify_embed_code'])): ?>
                                <div class="shopify-embed">
                                    <?= $drop['shopify_embed_code'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
