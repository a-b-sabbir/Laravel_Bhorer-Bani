<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'thumbnail',
        'splash',
        'type',
        'meta',
        'division',
        'district',
        'subdistrict',
        'headline',
        'subtitle',
        'categories',
        'content',
        'date',
        'reporter_id',
        'published_at',
        'views',
        'status',
    ];

    protected $casts = [
        'categories' => 'array',
    ];
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
}
