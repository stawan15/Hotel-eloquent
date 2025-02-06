<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Register;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Register::factory()->count(20)->create();
    }
}
