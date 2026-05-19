<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DropsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'              => 'Spring Drop 2026',
                'description'        => 'Our first drop of the year featuring exclusive streetwear pieces.',
                'image_path'         => null,
                'shopify_embed_code' => null,
                'drop_date'          => '2026-05-01 12:00:00',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'title'              => 'Summer Collection',
                'description'        => 'Limited run summer collection. Don\'t sleep on this one.',
                'image_path'         => null,
                'shopify_embed_code' => null,
                'drop_date'          => '2026-07-15 12:00:00',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('drops')->insertBatch($data);
    }
}
