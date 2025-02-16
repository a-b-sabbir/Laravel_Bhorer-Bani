<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'permanent_district',
        'permanent_sub_district',
        'permanent_municipality',
        'permanent_ward',
        'permanent_post_code',
        'permanent_village_locality',
        'permanent_house_road_number',
        'current_district',
        'current_sub_district',
        'current_municipality',
        'current_ward',
        'current_post_code',
        'current_village_locality',
        'current_house_road_number',
    ];

        /**
     * Get the representative that owns the address.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
