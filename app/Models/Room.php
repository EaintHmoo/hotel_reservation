<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $table = 'rooms';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $fillable = [
        'room_name',
        'room_type',
        'room_no',
        'available',
        'reservation_form_id',
        'created_at',
        'updated_at',
    ];
}
