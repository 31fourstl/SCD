<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<?php
// Fall back to defaults if settings didn't load
$s = !empty($settings) ? $settings : [];
$accentStart = $s['accent_color']     ?? '#d61ca0';
$accentEnd   = $s['accent_color_end'] ?? '#f04cbc';
$heroBg      = !empty($s['hero_bg_image'])
    ? 'url(' . base_url('uploads/hero/' . esc($s['hero_bg_image'])) . ')'
    : 'none';
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
<section class="scd-hero" style="<?= $heroBg !== 'none' ? "background-image:{$heroBg}; background-size:cover; background-position:center;" : '' ?>">
    <?php if ($heroBg !== 'none'): ?>
        <div class="scd-hero-bg-overlay"></div>
    <?php endif; ?>

    <div class="scd-container" style="position:relative; z-index:1;">
        <div class="scd-hero-grid">

            <!-- Left: copy -->
            <div class="scd-hero-copy">
                <?php if (!empty($s['hero_badge_1']) || !empty($s['hero_badge_2']) || !empty($s['hero_badge_3'])): ?>
                <div class="scd-badge-row">
                    <?php foreach (['hero_badge_1','hero_badge_2','hero_badge_3'] as $bk): ?>
                        <?php if (!empty($s[$bk])): ?>
                            <span class="scd-badge"><?= esc($s[$bk]) ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <h1 class="scd-hero-heading">
                    <?= esc($s['hero_heading_line1'] ?? 'BUILT FOR THE') ?><br>
                    <span class="scd-gradient-text"><?= esc($s['hero_heading_line2'] ?? 'SOUTH SIDE') ?></span>
                </h1>

                <?php if (!empty($s['hero_subtext'])): ?>
                <p class="scd-hero-sub"><?= esc($s['hero_subtext']) ?></p>
                <?php endif; ?>

                <div class="scd-hero-actions">
                    <a href="<?= base_url('/shop') ?>" class="scd-btn-primary">
                        <?= esc($s['hero_btn_primary'] ?? 'Shop Now') ?>
                    </a>
                    <a href="#drops" class="scd-btn-ghost">
                        <?= esc($s['hero_btn_secondary'] ?? 'View Drops') ?>
                    </a>
                </div>

                <div class="scd-hero-stats">
                    <?php foreach ([1,2,3] as $i): ?>
                        <?php if (!empty($s["hero_stat{$i}_value"])): ?>
                        <div class="scd-stat">
                            <strong><?= esc($s["hero_stat{$i}_value"]) ?></strong>
                            <span><?= esc($s["hero_stat{$i}_label"] ?? '') ?></span>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right: hero card -->
            <div class="scd-hero-card">
                <div class="scd-hero-img-wrap">
                    <img src="<?= base_url('images/about/9.jpg') ?>" alt="SCD Drop" class="scd-hero-img">
                    <div class="scd-hero-img-overlay"></div>
                </div>
                <div class="scd-hero-card-badge">
                    <span class="scd-dot"></span>
                    <span>New Drop Available Now</span>
                </div>
            </div>

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
                            <p class="scd-drop-date"><?= date('F j, Y \a\t g:i A', strtotime($drop['drop_date'])) ?></p>
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
