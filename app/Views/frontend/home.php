<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<?php
$s = !empty($settings) ? $settings : [];
$accentStart = $s['accent_color'] ?? '#d61ca0';
$accentEnd = $s['accent_color_end'] ?? '#f04cbc';
?>

<style>
:root {
    --accent-start: <?= esc($accentStart) ?>;
    --accent-end: <?= esc($accentEnd) ?>;
}
</style>

<section class="editorial-hero" id="top">
    <div class="editorial-container editorial-hero-grid">
        <div class="editorial-hero-copy">
            <div class="editorial-eyebrow">Streetwear energy. Nightlife attitude. Limited drops.</div>
            <h1>
                <?= esc($s['hero_heading_line1'] ?? 'South City') ?><br>
                <span><?= esc($s['hero_heading_line2'] ?? 'Degenerates') ?></span>
            </h1>
            <p>
                <?= esc($s['hero_subtext'] ?? 'A dark editorial landing page for South City Degenerates — built to feel premium, rebellious, local, and direct-to-purchase.') ?>
            </p>

            <div class="editorial-hero-actions">
                <a class="editorial-btn-primary" href="<?= base_url('/shop') ?>"><?= esc($s['hero_btn_primary'] ?? 'Shop Now') ?></a>
                <a class="editorial-btn-secondary" href="https://store.lushlemur.com/" target="_blank" rel="noopener noreferrer">Open Full Store</a>
            </div>

            <div class="editorial-hero-stats">
                <div class="editorial-stat">
                    <strong>Limited</strong>
                    <span>Drop-based merchandising for urgency and exclusivity.</span>
                </div>
                <div class="editorial-stat">
                    <strong>Premium</strong>
                    <span>Editorial layout designed to feel more like a campaign than a catalog.</span>
                </div>
                <div class="editorial-stat">
                    <strong>Direct</strong>
                    <span>Short path from landing page to product purchase.</span>
                </div>
            </div>
        </div>

        <div class="editorial-hero-card">
            <div class="editorial-hero-visual">
                <div class="editorial-hero-badge">
                    <div>
                        <h3>New Collection</h3>
                        <p>Replace this with your campaign image, product shoot, or model shot from the current release.</p>
                    </div>
                    <a class="editorial-btn-primary" href="#shop">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="editorial-section" id="drops">
    <div class="editorial-container">
        <div class="editorial-section-header">
            <div>
                <h2>Featured Drop</h2>
            </div>
            <p>Use this section for your strongest products or collections. These blocks sell the identity before the full store takes over.</p>
        </div>

        <?php if (empty($drops)): ?>
            <div class="editorial-drops-grid">
                <article class="editorial-drop-card">
                    <div class="editorial-drop-image editorial-drop-image-1"></div>
                    <div class="editorial-drop-content">
                        <span class="editorial-tag">Best Seller</span>
                        <h3>Statement Tee</h3>
                        <p>High-contrast graphics, oversized fit, and your strongest entry-point product.</p>
                        <a class="editorial-btn-secondary" href="https://store.lushlemur.com/" target="_blank" rel="noopener noreferrer">View Product</a>
                    </div>
                </article>
                <article class="editorial-drop-card">
                    <div class="editorial-drop-image editorial-drop-image-2"></div>
                    <div class="editorial-drop-content">
                        <span class="editorial-tag">New Arrival</span>
                        <h3>Signature Hoodie</h3>
                        <p>Anchor piece for colder nights, event wear, and higher-ticket conversion.</p>
                        <a class="editorial-btn-secondary" href="https://store.lushlemur.com/" target="_blank" rel="noopener noreferrer">View Product</a>
                    </div>
                </article>
                <article class="editorial-drop-card">
                    <div class="editorial-drop-image editorial-drop-image-3"></div>
                    <div class="editorial-drop-content">
                        <span class="editorial-tag">Limited Run</span>
                        <h3>Capsule Accessory</h3>
                        <p>Add a smaller, impulse-friendly item here to lift average order value.</p>
                        <a class="editorial-btn-secondary" href="https://store.lushlemur.com/" target="_blank" rel="noopener noreferrer">View Product</a>
                    </div>
                </article>
            </div>
        <?php else: ?>
            <div class="editorial-drops-grid">
                <?php foreach (array_slice($drops, 0, 3) as $drop): ?>
                    <article class="editorial-drop-card">
                        <?php if (!empty($drop['image_path'])): ?>
                            <div class="editorial-drop-image" style="background-image: url('<?= base_url('uploads/' . esc($drop['image_path'])) ?>');"></div>
                        <?php else: ?>
                            <div class="editorial-drop-image editorial-drop-image-placeholder"><span>SCD</span></div>
                        <?php endif; ?>
                        <div class="editorial-drop-content">
                            <span class="editorial-tag">Limited Run</span>
                            <h3><?= esc($drop['title']) ?></h3>
                            <?php if (!empty($drop['description'])): ?>
                                <p><?= esc($drop['description']) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($drop['shopify_embed_code'])): ?>
                                <div class="editorial-shopify-embed"><?= $drop['shopify_embed_code'] ?></div>
                            <?php else: ?>
                                <a class="editorial-btn-secondary" href="<?= base_url('/shop') ?>">View Product</a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>