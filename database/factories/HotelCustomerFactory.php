<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelCustomer>
 */
class HotelCustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    $fakerTH = FakerFactory::create('th_TH'); // สำหรับข้อมูลภาษาไทย
    $fakerEN = FakerFactory::create('en_US'); // สำหรับข้อมูลชาวต่างชาติ

    // สุ่มให้เป็นชาวต่างชาติหรือคนไทย (30% ต่างชาติ, 70% คนไทย)
    $isForeign = $this->faker->boolean(30);

    if ($isForeign) {
        // 🔹 ชาวต่างชาติ
        $firstName = $fakerEN->firstName();
        $lastName = $fakerEN->lastName();
        $email = strtolower("{$firstName}.{$lastName}@example.com");
        $phone = '+66' . $this->faker->numberBetween(100000000, 999999999); // ใช้เบอร์ไทยแต่เป็นฟอร์แมตสากล
        $passportNumber = strtoupper($this->faker->randomLetter()) . $this->faker->randomNumber(6, true);
    } else {
        // 🔹 คนไทย
        $firstName = $fakerTH->firstName();
        $lastName = $fakerTH->lastName();
        $firstNameEng = strtolower(str_replace(' ', '', transliterator_transliterate('Any-Latin; Latin-ASCII', $firstName)));
        $lastNameEng = strtolower(str_replace(' ', '', transliterator_transliterate('Any-Latin; Latin-ASCII', $lastName)));
        $email = "{$firstNameEng}.{$lastNameEng}@example.com";
        $phone = '08' . $this->faker->numberBetween(10000000, 99999999); // เบอร์ไทย

        // สร้างเลขบัตรประชาชนไทย 13 หลัก
        $passportNumber = $this->generateThaiID();
    }

    return [
        'name' => "{$firstName} {$lastName}",
        'email' => $email,
        'phone' => $phone,
        'address' => $fakerTH->address(),
        'passport_number' => $passportNumber, // บัตรประชาชนคนไทย หรือ Passport ชาวต่างชาติ
    ];
}

/**
 * ฟังก์ชันสร้างเลขบัตรประชาชนไทย 13 หลักแบบถูกต้องตามหลักการคำนวณ
 */
private function generateThaiID()
{
    $digits = [];

    // สุ่มตัวเลข 12 หลักแรก
    for ($i = 0; $i < 12; $i++) {
        $digits[] = mt_rand(0, 9);
    }

    // คำนวณหลักที่ 13 ตามสูตร Mod 11
    $sum = 0;
    for ($i = 0; $i < 12; $i++) {
        $sum += $digits[$i] * (13 - $i);
    }
    $checkDigit = (11 - ($sum % 11)) % 10;

    // รวมเป็นเลข 13 หลัก
    return implode('', $digits) . $checkDigit;
}

}
