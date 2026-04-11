<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<section class="hero">
    <div class="container">
        <h1>Upcoming Drops</h1>
        <p class="hero-sub">Stay ready. Limited runs, no restocks.</p>
    </div>
</section>

<section class="drops-section">
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
                                    <?= date('F j, Y \a\t g:i A', strtotime($drop['drop_date'])) ?>
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
