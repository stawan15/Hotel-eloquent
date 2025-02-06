<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_name'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
