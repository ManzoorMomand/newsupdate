<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'about_title' => 'Your About Title',
            'about_detail' => 'Your About Detail',
            'about_status' => 'Show',
            'faq_title' => 'Your FAQ Title',
            'faq_detail' => 'Your FAQ Detail',
            'faq_status' => 'Show',
            'contact_title' => 'Your Contact Title',
            'contact_detail' => 'Your Contact Detail',
            'contact_status' => 'Show',
            'contact_map' => 'Your Contact Map',
            'terms_title' => 'Your Terms Title',
            'terms_detail' => 'Your Terms Detail',
            'terms_status' => 'Show',
            'privacy_title' => 'Your Privacy Title',
            'privacy_detail' => 'Your Privacy Detail',
            'privacy_status' => 'Show',
            'disclaimer_title' => 'Your Disclaimer Title',
            'disclaimer_detail' => 'Your Disclaimer Detail',
            'disclaimer_status' => 'Show',
            'login_title' => 'Your Login Title',
            'login_status' => 'Show',
        ]);
    }
}
