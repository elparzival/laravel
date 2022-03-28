<?php

namespace Database\Seeders;

use App\Models\Audiencia;
use Illuminate\Database\Seeder;

class audienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Audiencia::factory(1000)->create();
    }
}
