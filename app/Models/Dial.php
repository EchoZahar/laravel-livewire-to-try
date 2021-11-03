<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'total_price', 'status'
    ];

    const ST_NEW_DIAL = 'new_dial';
    const ST_SUCCESS = 'success';
    const ST_REFUSE = 'refuse';

    public static $statuses = [self::ST_NEW_DIAL, self::ST_SUCCESS, self::ST_REFUSE];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
