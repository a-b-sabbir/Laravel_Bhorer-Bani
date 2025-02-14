<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    protected $fillable = [
        'priority',
        'content',
        'advertiser_name',
        'advertiser_contact',
        'start_date',
        'end_date',
        'placement',
        'image',
        'video',
        'link',
        'status'
    ];
}
