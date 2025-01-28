<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\DrcapRepository;
use App\Models\Drcap;

class DrcapSeeder extends Seeder
{
    /**
     * Create the database record for this singleton module.
     *
     * @return void
     */
    public function run()
    {
        if (Drcap::count() > 0) {
            return;
        }

        app(DrcapRepository::class)->create([
            'title' => [
                'en' => 'Drcap',
                // add other languages here
            ],
            'description' => [
                'en' => '',
                // add other languages here
            ],
            'published' => false,
        ]);
    }
}
