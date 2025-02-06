<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelCustomer extends Model
{
    use HasFactory;

    protected $table = 'hotel_customers';

    protected $fillable = ['name', 'email', 'phone', 'address', 'passport_number'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
