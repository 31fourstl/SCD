<?php

namespace App\Controllers\Admin;

use App\Models\DropsModel;

/**
 * Admin panel controller for managing drops (CRUD + image upload).
 */
class DropsController extends AdminBaseController
{
    protected DropsModel $model;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->model = new DropsModel();
    }

    // ----------------------------------------------------------------
    // Index – list all drops
    // ----------------------------------------------------------------
    public function index()
    {
        try {
            $drops = $this->model->orderBy('drop_date', 'ASC')->findAll();
        } catch (\Throwable $e) {
            log_message('error', 'Admin\DropsController::index - DB error: ' . $e->getMessage());
            $drops = [];
        }

        $data = [
            'pageTitle' => 'Manage Drops',
            'drops'     => $drops,
        ];

        return view('admin/drops/index', $data);
    }

    // ----------------------------------------------------------------
    // Create – show form
    // ----------------------------------------------------------------
    public function create()
    {
        return view('admin/drops/form', [
            'pageTitle' => 'Add New Drop',
            'drop'      => null,
        ]);
    }

    // ----------------------------------------------------------------
    // Store – handle POST
    // ----------------------------------------------------------------
    public function store()
    {
        $rules = [
            'title'       => 'required|max_length[255]',
            'drop_date'   => 'permit_empty|valid_date[Y-m-d\TH:i]',
            'image'       => 'permit_empty|uploaded[image]|max_size[image,4096]|is_image[image]',
        ];

        if (! $this->validate($rules)) {
            return view('admin/drops/form', [
                'pageTitle'  => 'Add New Drop',
                'drop'       => null,
                'validation' => $this->validator,
            ]);
        }

        $imagePath = $this->handleImageUpload();

        $dropDate = $this->request->getPost('drop_date');
        if ($dropDate) {
            // Convert datetime-local format (Y-m-dTH:i) to Y-m-d H:i:s
            $dropDate = str_replace('T', ' ', $dropDate) . ':00';
        }

        $this->model->insert([
            'title'              => $this->request->getPost('title'),
            'description'        => $this->request->getPost('description'),
            'image_path'         => $imagePath,
            'shopify_embed_code' => $this->request->getPost('shopify_embed_code'),
            'drop_date'          => $dropDate ?: null,
            'is_active'          => (int) $this->request->getPost('is_active'),
        ]);

        return redirect()->to(site_url('admin/drops'))
            ->with('success', 'Drop created successfully.');
    }

    // ----------------------------------------------------------------
    // Edit – show form
    // ----------------------------------------------------------------
    public function edit(int $id)
    {
        $drop = $this->model->find($id);

        if (! $drop) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Format drop_date for datetime-local input
        if (!empty($drop['drop_date'])) {
            $drop['drop_date_input'] = date('Y-m-d\TH:i', strtotime($drop['drop_date']));
        }

        return view('admin/drops/form', [
            'pageTitle' => 'Edit Drop',
            'drop'      => $drop,
        ]);
    }

    // ----------------------------------------------------------------
    // Update – handle POST
    // ----------------------------------------------------------------
    public function update(int $id)
    {
        $drop = $this->model->find($id);

        if (! $drop) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'title'     => 'required|max_length[255]',
            'drop_date' => 'permit_empty|valid_date[Y-m-d\TH:i]',
            'image'     => 'permit_empty|max_size[image,4096]|is_image[image]',
        ];

        if (! $this->validate($rules)) {
            if (!empty($drop['drop_date'])) {
                $drop['drop_date_input'] = date('Y-m-d\TH:i', strtotime($drop['drop_date']));
            }
            return view('admin/drops/form', [
                'pageTitle'  => 'Edit Drop',
                'drop'       => $drop,
                'validation' => $this->validator,
            ]);
        }

        // Handle image: keep existing if no new upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && ! $image->hasMoved()) {
            // Delete old image if exists
            if (!empty($drop['image_path'])) {
                $oldPath = FCPATH . 'uploads/' . $drop['image_path'];
                if (is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }
            $imagePath = $this->handleImageUpload();
        } else {
            $imagePath = $drop['image_path'];
        }

        $dropDate = $this->request->getPost('drop_date');
        if ($dropDate) {
            $dropDate = str_replace('T', ' ', $dropDate) . ':00';
        }

        $this->model->update($id, [
            'title'              => $this->request->getPost('title'),
            'description'        => $this->request->getPost('description'),
            'image_path'         => $imagePath,
            'shopify_embed_code' => $this->request->getPost('shopify_embed_code'),
            'drop_date'          => $dropDate ?: null,
            'is_active'          => (int) $this->request->getPost('is_active'),
        ]);

        return redirect()->to(site_url('admin/drops'))
            ->with('success', 'Drop updated successfully.');
    }

    // ----------------------------------------------------------------
    // Delete
    // ----------------------------------------------------------------
    public function delete(int $id)
    {
        $drop = $this->model->find($id);

        if (! $drop) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Remove associated image file
        if (!empty($drop['image_path'])) {
            $oldPath = FCPATH . 'uploads/' . $drop['image_path'];
            if (is_file($oldPath)) {
                @unlink($oldPath);
            }
        }

        $this->model->delete($id);

        return redirect()->to(site_url('admin/drops'))
            ->with('success', 'Drop deleted.');
    }

    // ----------------------------------------------------------------
    // Helper: upload image and return stored filename
    // ----------------------------------------------------------------
    private function handleImageUpload(): ?string
    {
        $file = $this->request->getFile('image');

        if (! $file || ! $file->isValid() || $file->hasMoved()) {
            return null;
        }

        $uploadPath = FCPATH . 'uploads/';
        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $newName = $file->getRandomName();
        $file->move($uploadPath, $newName);

        return $newName;
    }
}
