<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
                // ระบบทะเบียนนักศึกษา
            StudentSeeder::class,
            CourseSeeder::class,
            RegisterSeeder::class,
            TeacherSeeder::class,

                // ระบบขายสินค้า
            ProductSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,

                // ระบบจองห้องพัก
            HotelCustomerSeeder::class,
            RoomSeeder::class,
            RoomTypeSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
