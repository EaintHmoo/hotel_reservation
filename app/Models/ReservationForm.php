<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationForm extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'reservation_forms';

    public const CHECK_IN_TIME_SELECT = [
        'morning' => 'Morning',
        'afternoon'    => 'Afternoon',
        'evening'    => 'Evening',
    ];

    public const CHECK_OUT_TIME_SELECT = [
        'morning' => 'Morning',
        'afternoon'    => 'Afternoon',
        'evening'    => 'Evening',
    ];

    public const NUMBER_OF_ADULT_SELECT = [
        '1' => '1',
        '2'    => '2',
        '3'    => '3',
        '4'    => '4',
        '5'    => '5',
    ];

    public const NUMBER_OF_CHILDREN_SELECT = [
        '1' => '1',
        '2'    => '2',
        '3'    => '3',
        '4'    => '4',
        '5'    => '5',
    ];

    public const ROOM_TYPE_SELECT = [
        'standard' => 'Standard',
        'deluxe'    => 'Deluxe',
        'suite'    => 'Suite',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'zip_code',
        'city',
        'state',
        'email',
        'phone',
        'check_in_date',
        'check_out_date',
        'check_in_time',
        'check_out_time',
        'num_of_adults',
        'num_of_children',
        'num_of_rooms',
        'special_instructions',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
