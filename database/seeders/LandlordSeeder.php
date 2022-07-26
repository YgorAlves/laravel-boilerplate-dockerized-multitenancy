<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
            'name' => 'Laravel',
            'domain' => 'localhost',
            'database' => 'laravel',
        ]);

        Tenant::create([
            'name' => 'Dev',
            'domain' => 'dev.saas',
            'database' => 'dev',
        ]);

        Tenant::create([
            'name' => 'Demo',
            'domain' => 'demo.saas',
            'database' => 'demo',
        ]);

    }
}
