<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="admin-header">
    <h1>Drops</h1>
    <a href="<?= site_url('admin/drops/create') ?>" class="btn btn-primary">+ New Drop</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
<?php endif; ?>

<?php if (empty($drops)): ?>
    <p style="color:var(--color-muted)">No drops yet. <a href="<?= site_url('admin/drops/create') ?>">Create the first one.</a></p>
<?php else: ?>
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Drop Date</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($drops as $drop): ?>
                <tr>
                    <td><?= esc($drop['title']) ?></td>
                    <td>
                        <?= !empty($drop['drop_date'])
                            ? date('M j, Y g:i A', strtotime($drop['drop_date']))
                            : '—' ?>
                    </td>
                    <td>
                        <?php if ($drop['is_active']): ?>
                            <span class="badge badge-active">Active</span>
                        <?php else: ?>
                            <span class="badge badge-inactive">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($drop['image_path'])): ?>
                            <img src="<?= base_url('uploads/' . esc($drop['image_path'])) ?>"
                                 alt="<?= esc($drop['title']) ?>"
                                 style="height:48px;width:auto;border-radius:2px;">
                        <?php else: ?>
                            <span style="color:var(--color-muted)">—</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= site_url('admin/drops/edit/' . $drop['id']) ?>"
                           class="btn btn-secondary btn-sm">Edit</a>

                        <form method="post"
                              action="<?= site_url('admin/drops/delete/' . $drop['id']) ?>"
                              style="display:inline;"
                              onsubmit="return confirm('Delete this drop?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
