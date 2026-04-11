<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?php
$isEdit  = !empty($drop);
$title   = $isEdit ? 'Edit Drop' : 'Add New Drop';
$action  = $isEdit ? site_url('admin/drops/update/' . $drop['id']) : site_url('admin/drops/store');
?>

<div class="admin-header">
    <h1><?= esc($title) ?></h1>
    <a href="<?= site_url('admin/drops') ?>" class="btn btn-secondary">← Back</a>
</div>

<?php if (isset($validation) && $validation->getErrors()): ?>
    <div class="alert alert-danger">
        Please fix the errors below.
    </div>
<?php endif; ?>

<form method="post" action="<?= $action ?>" enctype="multipart/form-data" style="max-width:680px">
    <?= csrf_field() ?>

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title <span style="color:#e55">*</span></label>
        <input type="text"
               id="title"
               name="title"
               class="form-control <?= isset($validation) && $validation->hasError('title') ? 'is-invalid' : '' ?>"
               value="<?= esc(old('title', $drop['title'] ?? '')) ?>"
               required>
        <?php if (isset($validation) && $validation->hasError('title')): ?>
            <div class="invalid-feedback"><?= esc($validation->getError('title')) ?></div>
        <?php endif; ?>
    </div>

    <!-- Description -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description"
                  name="description"
                  class="form-control"><?= esc(old('description', $drop['description'] ?? '')) ?></textarea>
    </div>

    <!-- Drop Date -->
    <div class="form-group">
        <label for="drop_date">Drop Date &amp; Time</label>
        <input type="datetime-local"
               id="drop_date"
               name="drop_date"
               class="form-control <?= isset($validation) && $validation->hasError('drop_date') ? 'is-invalid' : '' ?>"
               value="<?= esc(old('drop_date', $drop['drop_date_input'] ?? '')) ?>">
        <?php if (isset($validation) && $validation->hasError('drop_date')): ?>
            <div class="invalid-feedback"><?= esc($validation->getError('drop_date')) ?></div>
        <?php endif; ?>
    </div>

    <!-- Image Upload -->
    <div class="form-group">
        <label for="image">Drop Image (JPG, PNG, WebP – max 4 MB)</label>
        <input type="file"
               id="image"
               name="image"
               accept="image/*"
               class="form-control <?= isset($validation) && $validation->hasError('image') ? 'is-invalid' : '' ?>">
        <?php if (isset($validation) && $validation->hasError('image')): ?>
            <div class="invalid-feedback"><?= esc($validation->getError('image')) ?></div>
        <?php endif; ?>

        <?php if ($isEdit && !empty($drop['image_path'])): ?>
            <p style="font-size:0.8rem;color:var(--color-muted);margin-top:0.4rem">
                Current image:
            </p>
            <img src="<?= base_url('uploads/' . esc($drop['image_path'])) ?>"
                 alt="Current image"
                 class="img-preview">
        <?php endif; ?>
    </div>

    <!-- Shopify Embed -->
    <div class="form-group">
        <label for="shopify_embed_code">Shopify Embed Code</label>
        <textarea id="shopify_embed_code"
                  name="shopify_embed_code"
                  class="form-control"
                  placeholder="Paste your Shopify Buy Button or product embed code here…"
                  style="min-height:140px"><?= esc(old('shopify_embed_code', $drop['shopify_embed_code'] ?? '')) ?></textarea>
        <small style="color:var(--color-muted)">
            Get this from your Shopify admin → Sales Channels → Buy Button.
        </small>
    </div>

    <!-- Active toggle -->
    <div class="form-group" style="display:flex;align-items:center;gap:0.75rem">
        <input type="checkbox"
               id="is_active"
               name="is_active"
               value="1"
               style="width:1.1rem;height:1.1rem;accent-color:var(--color-accent)"
               <?= old('is_active', ($drop['is_active'] ?? 1)) ? 'checked' : '' ?>>
        <label for="is_active" style="margin-bottom:0;text-transform:none;font-size:0.95rem;color:var(--color-text)">
            Show this drop publicly
        </label>
    </div>

    <button type="submit" class="btn btn-primary">
        <?= $isEdit ? 'Save Changes' : 'Create Drop' ?>
    </button>
</form>

<?= $this->endSection() ?>
