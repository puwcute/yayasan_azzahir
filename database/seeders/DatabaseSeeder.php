<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Default admin user (password: admin123)
        AdminUser::firstOrCreate(
            ['username' => 'admin'],
            [
                'password' => bcrypt('admin123'),
                'email' => 'admin@azzahir.or.id',
                'full_name' => 'Administrator',
                'role' => 'superadmin',
            ]
        );

        // Default settings
        $settings = [
            ['site_name', 'Yayasan Azzahir', 'general'],
            ['site_description', 'Yayasan Pendidikan Islam Azzahir', 'general'],
            ['site_logo', 'logo.png', 'general'],
            ['address', 'Jl. Contoh No. 123, Kota', 'contact'],
            ['phone', '0812-3456-7890', 'contact'],
            ['email', 'info@azzahir.or.id', 'contact'],
            ['maps_embed', '', 'contact'],
            ['about_text', 'Selamat datang di Yayasan Azzahir. Kami bergerak di bidang pendidikan dan sosial keagamaan.', 'profile'],
            ['vision', 'Menjadi lembaga pendidikan Islam yang unggul dan berakhlak mulia.', 'profile'],
            ['mission', 'Mendidik generasi Qur\'ani yang berilmu, beriman, dan bertaqwa.', 'profile'],
            ['about_image', '', 'profile'],
            ['hero_image', '', 'general'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(
                ['setting_key' => $setting[0]],
                [
                    'setting_value' => $setting[1],
                    'setting_group' => $setting[2],
                ]
            );
        }
    }
}
