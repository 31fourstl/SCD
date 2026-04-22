<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table      = 'site_settings';
    protected $primaryKey = 'key';
    protected $returnType = 'array';

    protected $allowedFields = ['key', 'value'];

    // Default values — used when no DB row exists yet
    protected array $defaults = [
        'hero_bg_image'       => '',
        'hero_badge_1'        => 'Limited',
        'hero_badge_2'        => 'Premium',
        'hero_badge_3'        => 'Direct',
        'hero_heading_line1'  => 'BUILT FOR THE',
        'hero_heading_line2'  => 'SOUTH SIDE',
        'hero_subtext'        => 'Exclusive streetwear drops for people who know exactly who they are. Limited runs. No restocks. No compromises.',
        'hero_btn_primary'    => 'Shop Now',
        'hero_btn_secondary'  => 'View Drops',
        'hero_stat1_value'    => '100%',
        'hero_stat1_label'    => 'Independent',
        'hero_stat2_value'    => 'STL',
        'hero_stat2_label'    => 'Based',
        'hero_stat3_value'    => 'Limited',
        'hero_stat3_label'    => 'Every Drop',
        'accent_color'        => '#d61ca0',
        'accent_color_end'    => '#f04cbc',
    ];

    // Return all settings merged with defaults as a flat key=>value array
    public function getAll(): array
    {
        $rows   = $this->findAll();
        $stored = array_column($rows, 'value', 'key');
        return array_merge($this->defaults, $stored);
    }

    // Get a single setting value
    public function getSetting(string $key): mixed
    {
        $all = $this->getAll();
        return $all[$key] ?? null;
    }

    // Upsert one or many settings
    public function saveSettings(array $data): void
    {
        foreach ($data as $key => $value) {
            if (! array_key_exists($key, $this->defaults)) {
                continue; // ignore unknown keys
            }
            $existing = $this->find($key);
            if ($existing) {
                $this->update($key, ['value' => $value]);
            } else {
                $this->insert(['key' => $key, 'value' => $value]);
            }
        }
    }
}
