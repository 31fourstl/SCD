<?php

namespace App\Controllers;

use App\Models\DropsModel;
use App\Models\SettingsModel;

class Home extends BaseController
{
    public function index(): string
    {
        $drops    = [];
        $settings = [];

        try {
            $drops    = (new DropsModel())->getActiveDrops();
            $settings = (new SettingsModel())->getAll();
        } catch (\Throwable $e) {
            log_message('error', 'Home::index - DB error: ' . $e->getMessage());
        }

        return view('frontend/home', [
            'drops'    => $drops,
            'settings' => $settings,
        ]);
    }
}
