<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<?php
// Fall back to defaults if settings didn't load
$s = !empty($settings) ? $settings : [];
$accentStart = $s['accent_color']     ?? '#d61ca0';
$accentEnd   = $s['accent_color_end'] ?? '#f04cbc';
$heroBg      = !empty($s['hero_bg_image'])
    ? 'url(' . base_url('uploads/hero/' . esc($s['hero_bg_image'])) . ')'
    : 'url(' . base_url('images/about/9.jpg') . ')';
?>

<!-- Dynamic CSS variables from settings -->
<style>
:root {
    --accent-start: <?= esc($accentStart) ?>;
    --accent-end:   <?= esc($accentEnd) ?>;
}
</style>

<!-- ═══════════════════════════════════════
     HERO
════════════════════════════════════════ -->
<section class="scd-hero scd-hero--cinematic" aria-labelledby="scd-hero-title" style="background-image: <?= $heroBg ?>;">
    <div class="scd-hero-bg-overlay"></div>

    <div class="scd-container scd-hero-cinematic-inner">
        <div class="scd-hero-cinematic-copy">
            <p class="scd-hero-eyebrow">LET'S DO THIS</p>
            <h1 id="scd-hero-title" class="scd-hero-cinematic-heading">
                <?= esc($s['hero_heading_line1'] ?? 'South City') ?><br>
                <?= esc($s['hero_heading_line2'] ?? 'Degenerates') ?>
            </h1>

            <p class="scd-hero-cinematic-sub">
                <?= esc($s['hero_subtext'] ?? 'Limited-run streetwear for the loud, loyal, and beautifully unruly side of St. Louis.') ?>
            </p>

            <div class="scd-hero-actions scd-hero-cinematic-actions">
                <a href="<?= base_url('/shop') ?>" class="scd-btn-primary scd-hero-main-btn">
                    <?= esc($s['hero_btn_primary'] ?? 'Shop the Drop') ?>
                </a>
                <a href="#drops" class="scd-btn-ghost scd-hero-secondary-btn">
                    <?= esc($s['hero_btn_secondary'] ?? 'View Drops') ?>
                </a>
            </div>
        </div>

        <div class="scd-hero-feature-row" aria-label="South City Degenerates brand pillars">
            <article class="scd-hero-feature-card">
                <h2>Limited Drops</h2>
                <p>No mass production. Small runs, real demand, and pieces made to feel like local artifacts.</p>
            </article>
            <article class="scd-hero-feature-card">
                <h2>South City Made</h2>
                <p>Built from neighborhood bars, basement shows, corner-store runs, and late-night STL energy.</p>
            </article>
            <article class="scd-hero-feature-card">
                <h2>Degenerate Energy</h2>
                <p>For the ones who show up loud, stay outside too late, and never leave the block behind.</p>
            </article>
            <article class="scd-hero-feature-card">
                <h2>Local Uniform</h2>
                <p>Streetwear for the regulars, creatives, lifers, outsiders, and beautifully questionable characters.</p>
            </article>
        </div>
    </div>
</section>
<!-- ── END HERO ── -->


<!-- ═══════════════════════════════════════
     DROPS
════════════════════════════════════════ -->
<section class="scd-section" id="drops">
    <div class="scd-container">

        <div class="scd-section-header">
            <h2 class="scd-section-title">Latest Drops</h2>
            <p class="scd-section-sub">Limited quantities. Once they're gone, they're gone.</p>
        </div>

        <?php if (empty($drops)): ?>
            <div class="scd-empty">
                <p>No drops right now — check back soon.</p>
            </div>
        <?php else: ?>
            <div class="scd-drops-grid">
                <?php foreach ($drops as $drop): ?>
                <div class="scd-drop-card">
                    <div class="scd-drop-img-wrap">
                        <?php if (!empty($drop['image_path'])): ?>
                            <img src="<?= base_url('uploads/' . esc($drop['image_path'])) ?>"
                                 alt="<?= esc($drop['title']) ?>" class="scd-drop-img">
                        <?php else: ?>
                            <div class="scd-drop-img-placeholder"><span>SCD</span></div>
                        <?php endif; ?>
                        <span class="scd-drop-tag">Limited Run</span>
                    </div>
                    <div class="scd-drop-body">
                        <h3 class="scd-drop-title"><?= esc($drop['title']) ?></h3>
                        <?php if (!empty($drop['drop_date'])): ?>
                            <p class="scd-drop-date"><?= date('F j, Y \\a\\t g:i A', strtotime($drop['drop_date'])) ?></p>
                        <?php endif; ?>
                        <?php if (!empty($drop['description'])): ?>
                            <p class="scd-drop-desc"><?= esc($drop['description']) ?></p>
                        <?php endif; ?>
                        <?php if (!empty($drop['shopify_embed_code'])): ?>
                            <div class="scd-shopify-embed"><?= $drop['shopify_embed_code'] ?></div>
                        <?php else: ?>
                            <a href="<?= base_url('/shop') ?>" class="scd-btn-ghost scd-btn-sm">View Product</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>


<!-- ═══════════════════════════════════════
     BRAND STORY + SHOP EMBED
════════════════════════════════════════ -->
<section class="scd-section scd-story-section">
    <div class="scd-container">
        <div class="scd-story-grid">
            <div class="scd-story-copy">
                <h2 class="scd-section-title">Who We Are</h2>
                <blockquote class="scd-blockquote">
                    Built for late nights, loud rooms, and people who know exactly who they are.
                </blockquote>
                <p>South City Degenerates is an independent streetwear label out of St. Louis, Missouri.
                   Every piece is designed with intention, dropped in limited quantities, and never restocked.</p>
                <ul class="scd-story-list">
                    <li>100% independent — no investors, no compromises</li>
                    <li>Designed &amp; shipped from STL</li>
                    <li>Limited runs keep every piece rare</li>
                    <li>Community first, always</li>
                </ul>
                <a href="<?= base_url('/about') ?>" class="scd-btn-ghost">Our Story</a>
            </div>
            <div class="scd-story-shop">
                <iframe src="https://store.lushlemur.com/" title="SCD Shop"
                        class="scd-shop-iframe" loading="lazy" scrolling="yes" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════
     CTA BAND
════════════════════════════════════════ -->
<section class="scd-cta-band">
    <div class="scd-container">
        <div class="scd-cta-inner">
            <div class="scd-cta-copy">
                <h2>Never miss a drop.</h2>
                <p>Follow us on Instagram and turn on post notifications to stay ahead of every release.</p>
            </div>
            <a href="https://www.instagram.com/" target="_blank" rel="noopener" class="scd-btn-light">
                Follow @SouthCityDegenerates
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
