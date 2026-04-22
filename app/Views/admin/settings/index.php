<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?php $s = $settings; ?>

<div class="admin-header">
    <h1>Site Settings</h1>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
<?php endif; ?>

<?php if (isset($validation) && $validation->getErrors()): ?>
    <div class="alert alert-danger">Please fix the errors below.</div>
<?php endif; ?>

<form method="post" action="<?= site_url('admin/settings/update') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- ═══════════════════════════════
         HERO BACKGROUND IMAGE
    ════════════════════════════════ -->
    <div class="settings-section">
        <h2 class="settings-section-title">Hero Background Image</h2>

        <?php if (!empty($s['hero_bg_image'])): ?>
            <div class="settings-img-preview">
                <img src="<?= base_url('uploads/hero/' . esc($s['hero_bg_image'])) ?>"
                     alt="Current hero background">
                <label class="remove-img-label">
                    <input type="checkbox" name="remove_hero_bg" value="1">
                    Remove image
                </label>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="hero_bg_image_upload">
                <?= empty($s['hero_bg_image']) ? 'Upload Background Image' : 'Replace Background Image' ?>
                <span class="field-hint">JPG, PNG or WebP — max 4 MB. Displays behind the hero section.</span>
            </label>
            <input type="file" id="hero_bg_image_upload" name="hero_bg_image_upload"
                   accept="image/*" class="form-control
                   <?= isset($validation) && $validation->hasError('hero_bg_image_upload') ? 'is-invalid' : '' ?>">
            <?php if (isset($validation) && $validation->hasError('hero_bg_image_upload')): ?>
                <div class="invalid-feedback"><?= esc($validation->getError('hero_bg_image_upload')) ?></div>
            <?php endif; ?>
        </div>
    </div>

    <!-- ═══════════════════════════════
         HERO HEADING
    ════════════════════════════════ -->
    <div class="settings-section">
        <h2 class="settings-section-title">Hero Heading</h2>
        <p class="settings-section-desc">
            The heading appears in two lines. Line 2 uses the accent color.
        </p>

        <div class="settings-row">
            <div class="form-group">
                <label for="hero_heading_line1">Line 1 (white)</label>
                <input type="text" id="hero_heading_line1" name="hero_heading_line1"
                       class="form-control <?= isset($validation) && $validation->hasError('hero_heading_line1') ? 'is-invalid' : '' ?>"
                       value="<?= esc(old('hero_heading_line1', $s['hero_heading_line1'])) ?>">
                <?php if (isset($validation) && $validation->hasError('hero_heading_line1')): ?>
                    <div class="invalid-feedback"><?= esc($validation->getError('hero_heading_line1')) ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="hero_heading_line2">Line 2 (accent color)</label>
                <input type="text" id="hero_heading_line2" name="hero_heading_line2"
                       class="form-control <?= isset($validation) && $validation->hasError('hero_heading_line2') ? 'is-invalid' : '' ?>"
                       value="<?= esc(old('hero_heading_line2', $s['hero_heading_line2'])) ?>">
                <?php if (isset($validation) && $validation->hasError('hero_heading_line2')): ?>
                    <div class="invalid-feedback"><?= esc($validation->getError('hero_heading_line2')) ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label for="hero_subtext">Subtext paragraph</label>
            <textarea id="hero_subtext" name="hero_subtext"
                      class="form-control"
                      style="min-height:80px"><?= esc(old('hero_subtext', $s['hero_subtext'])) ?></textarea>
        </div>
    </div>

    <!-- ═══════════════════════════════
         BADGES
    ════════════════════════════════ -->
    <div class="settings-section">
        <h2 class="settings-section-title">Badges</h2>
        <p class="settings-section-desc">The three pills that appear above the heading.</p>

        <div class="settings-row settings-row-3">
            <?php foreach ([1, 2, 3] as $i): ?>
            <div class="form-group">
                <label for="hero_badge_<?= $i ?>">Badge <?= $i ?></label>
                <input type="text" id="hero_badge_<?= $i ?>" name="hero_badge_<?= $i ?>"
                       class="form-control"
                       value="<?= esc(old('hero_badge_' . $i, $s['hero_badge_' . $i])) ?>">
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ═══════════════════════════════
         BUTTONS
    ════════════════════════════════ -->
    <div class="settings-section">
        <h2 class="settings-section-title">CTA Buttons</h2>

        <div class="settings-row">
            <div class="form-group">
                <label for="hero_btn_primary">Primary button text</label>
                <input type="text" id="hero_btn_primary" name="hero_btn_primary"
                       class="form-control"
                       value="<?= esc(old('hero_btn_primary', $s['hero_btn_primary'])) ?>">
            </div>
            <div class="form-group">
                <label for="hero_btn_secondary">Secondary button text</label>
                <input type="text" id="hero_btn_secondary" name="hero_btn_secondary"
                       class="form-control"
                       value="<?= esc(old('hero_btn_secondary', $s['hero_btn_secondary'])) ?>">
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════
         STAT BLOCKS
    ════════════════════════════════ -->
    <div class="settings-section">
        <h2 class="settings-section-title">Stat Blocks</h2>
        <p class="settings-section-desc">The three facts shown at the bottom of the hero (e.g. 100% / Independent).</p>

        <div class="settings-row settings-row-3">
            <?php foreach ([1, 2, 3] as $i): ?>
            <div class="settings-stat-group">
                <div class="form-group">
                    <label>Stat <?= $i ?> Value</label>
                    <input type="text" name="hero_stat<?= $i ?>_value"
                           class="form-control"
                           value="<?= esc(old('hero_stat' . $i . '_value', $s['hero_stat' . $i . '_value'])) ?>">
                </div>
                <div class="form-group">
                    <label>Stat <?= $i ?> Label</label>
                    <input type="text" name="hero_stat<?= $i ?>_label"
                           class="form-control"
                           value="<?= esc(old('hero_stat' . $i . '_label', $s['hero_stat' . $i . '_label'])) ?>">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ═══════════════════════════════
         ACCENT COLORS
    ════════════════════════════════ -->
    <div class="settings-section">
        <h2 class="settings-section-title">Accent Colors</h2>
        <p class="settings-section-desc">
            Used for the gradient text, badges, buttons, and stat values.
            The two colors form a gradient from left to right.
        </p>

        <div class="settings-row">
            <div class="form-group">
                <label for="accent_color">Gradient Start</label>
                <div class="color-input-wrap">
                    <input type="color" id="accent_color_picker"
                           value="<?= esc($s['accent_color']) ?>"
                           oninput="document.getElementById('accent_color').value=this.value">
                    <input type="text" id="accent_color" name="accent_color"
                           class="form-control"
                           value="<?= esc(old('accent_color', $s['accent_color'])) ?>"
                           oninput="document.getElementById('accent_color_picker').value=this.value">
                </div>
            </div>
            <div class="form-group">
                <label for="accent_color_end">Gradient End</label>
                <div class="color-input-wrap">
                    <input type="color" id="accent_color_end_picker"
                           value="<?= esc($s['accent_color_end']) ?>"
                           oninput="document.getElementById('accent_color_end').value=this.value">
                    <input type="text" id="accent_color_end" name="accent_color_end"
                           class="form-control"
                           value="<?= esc(old('accent_color_end', $s['accent_color_end'])) ?>"
                           oninput="document.getElementById('accent_color_end_picker').value=this.value">
                </div>
            </div>
        </div>

        <!-- Live gradient preview -->
        <div class="color-preview"
             id="color-preview"
             style="background: linear-gradient(135deg, <?= esc($s['accent_color']) ?>, <?= esc($s['accent_color_end']) ?>)">
            <span>Gradient Preview</span>
        </div>
    </div>

    <div class="settings-actions">
        <button type="submit" class="btn btn-primary">Save Settings</button>
        <a href="<?= site_url('/') ?>" target="_blank" class="btn btn-secondary">Preview Site ↗</a>
    </div>

</form>

<style>
.settings-section {
    background: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: 6px;
    padding: 1.75rem;
    margin-bottom: 1.5rem;
}
.settings-section-title {
    font-size: 0.95rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 0.4rem;
    color: var(--color-text);
}
.settings-section-desc {
    font-size: 0.82rem;
    color: var(--color-muted);
    margin-bottom: 1.25rem;
}
.field-hint {
    display: block;
    font-size: 0.75rem;
    color: var(--color-muted);
    font-weight: 400;
    text-transform: none;
    letter-spacing: 0;
    margin-top: 2px;
}
.settings-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
.settings-row-3 {
    grid-template-columns: 1fr 1fr 1fr;
}
.settings-stat-group {
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    border-radius: 4px;
    padding: 1rem;
}
.settings-stat-group .form-group { margin-bottom: 0.75rem; }
.settings-stat-group .form-group:last-child { margin-bottom: 0; }
.color-input-wrap {
    display: flex;
    align-items: center;
    gap: 10px;
}
.color-input-wrap input[type="color"] {
    width: 44px;
    height: 44px;
    padding: 2px;
    border: 1px solid var(--color-border);
    border-radius: 4px;
    background: var(--color-bg);
    cursor: pointer;
    flex-shrink: 0;
}
.color-input-wrap input[type="color"]::-webkit-color-swatch-wrapper { padding: 2px; }
.color-preview {
    height: 48px;
    border-radius: 6px;
    margin-top: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #fff;
    text-shadow: 0 1px 3px rgba(0,0,0,0.4);
}
.settings-img-preview {
    margin-bottom: 1rem;
}
.settings-img-preview img {
    max-height: 160px;
    border-radius: 6px;
    border: 1px solid var(--color-border);
    margin-bottom: 0.5rem;
    object-fit: cover;
    width: 100%;
}
.remove-img-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.82rem;
    color: #e55;
    cursor: pointer;
    text-transform: none;
    letter-spacing: 0;
    font-weight: 400;
}
.settings-actions {
    display: flex;
    gap: 1rem;
    align-items: center;
    padding-top: 0.5rem;
}
@media (max-width: 700px) {
    .settings-row, .settings-row-3 { grid-template-columns: 1fr; }
}
</style>

<script>
// Live-update gradient preview as colors change
function updatePreview() {
    const c1 = document.getElementById('accent_color').value;
    const c2 = document.getElementById('accent_color_end').value;
    document.getElementById('color-preview').style.background =
        `linear-gradient(135deg, ${c1}, ${c2})`;
}
document.getElementById('accent_color').addEventListener('input', updatePreview);
document.getElementById('accent_color_end').addEventListener('input', updatePreview);
</script>

<?= $this->endSection() ?>
