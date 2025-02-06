<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_customer_id', 'room_id', 'check_in_date', 'check_out_date', 'total_price'];

    public function customer()
    {
        return $this->belongsTo(HotelCustomer::class, 'hotel_customer_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
