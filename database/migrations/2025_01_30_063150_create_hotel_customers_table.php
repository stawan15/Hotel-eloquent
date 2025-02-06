<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hotel_customers', function (Blueprint $table) {
            $table->id('hotel_customer_id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('address')->nullable();
            $table->string('passport_number')->nullable(); // สำหรับลูกค้าต่างชาติ
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_customers');
    }
};
