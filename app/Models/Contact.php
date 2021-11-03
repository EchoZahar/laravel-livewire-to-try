<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contact', 'value'
    ];

    const CONTACT_PHONE = 'phone';
    const CONTACT_EMAIL = 'email';
    const CONTACT_SOCIAL = 'social';

    public static $contactType = [
        self::CONTACT_PHONE,
        self::CONTACT_EMAIL,
        self::CONTACT_SOCIAL,
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
