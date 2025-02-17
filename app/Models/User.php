<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'image',
        'email',
        'password',
        'name',
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'mobile_number',
        'whatsapp_number',
        'dob',
        'education_qualifications',
        'national_id',
        'interested_position',
        'responsible_place_name',
        'accept_terms_conditions',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }
    public function news()
    {
        return $this->hasMany(News::class);
    }

    protected $guarded = ['approval', 'employee_id'];
    protected $attributes = [
        'approval' => 'Pending',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'approval' => 'string',
        ];
    }
}
