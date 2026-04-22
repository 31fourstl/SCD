<?php

namespace App\Controllers\Admin;

use App\Models\SettingsModel;

class SettingsController extends AdminBaseController
{
    protected SettingsModel $settings;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->settings = new SettingsModel();
    }

    public function index()
    {
        return view('admin/settings/index', [
            'pageTitle' => 'Site Settings',
            'settings'  => $this->settings->getAll(),
        ]);
    }

    public function update()
    {
        $rules = [
            'hero_heading_line1' => 'required|max_length[120]',
            'hero_heading_line2' => 'required|max_length[120]',
            'hero_subtext'       => 'permit_empty|max_length[500]',
            'hero_btn_primary'   => 'permit_empty|max_length[60]',
            'hero_btn_secondary' => 'permit_empty|max_length[60]',
            'hero_bg_image_upload' => 'permit_empty|uploaded[hero_bg_image_upload]|max_size[hero_bg_image_upload,4096]|is_image[hero_bg_image_upload]',
        ];

        if (! $this->validate($rules)) {
            return view('admin/settings/index', [
                'pageTitle'  => 'Site Settings',
                'settings'   => $this->settings->getAll(),
                'validation' => $this->validator,
            ]);
        }

        // Collect text/color fields
        $fields = [
            'hero_badge_1', 'hero_badge_2', 'hero_badge_3',
            'hero_heading_line1', 'hero_heading_line2',
            'hero_subtext', 'hero_btn_primary', 'hero_btn_secondary',
            'hero_stat1_value', 'hero_stat1_label',
            'hero_stat2_value', 'hero_stat2_label',
            'hero_stat3_value', 'hero_stat3_label',
            'accent_color', 'accent_color_end',
        ];

        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $this->request->getPost($field) ?? '';
        }

        // Handle hero background image upload
        $file = $this->request->getFile('hero_bg_image_upload');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/hero/';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Delete old hero image if one exists
            $oldImage = $this->settings->getSetting('hero_bg_image');
            if ($oldImage) {
                $oldPath = FCPATH . 'uploads/hero/' . $oldImage;
                if (is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $newName           = $file->getRandomName();
            $file->move($uploadPath, $newName);
            $data['hero_bg_image'] = $newName;
        }

        // Allow removing the hero background image
        if ($this->request->getPost('remove_hero_bg') === '1') {
            $oldImage = $this->settings->getSetting('hero_bg_image');
            if ($oldImage) {
                @unlink(FCPATH . 'uploads/hero/' . $oldImage);
            }
            $data['hero_bg_image'] = '';
        }

        $this->settings->saveSettings($data);

        return redirect()->to(site_url('admin/settings'))
            ->with('success', 'Settings saved successfully.');
    }
}
