<?php

namespace App\Controllers;

use App\Models\DropsModel;

class Home extends BaseController
{
    public function index(): string
    {
        $drops = [];

        try {
            $model = new DropsModel();
            $drops = $model->getActiveDrops();
        } catch (\Throwable $e) {
            // Database not configured yet – show empty state gracefully
            log_message('error', 'Home::index - DB error: ' . $e->getMessage());
        }

        return view('frontend/home', ['drops' => $drops]);
    }
}
