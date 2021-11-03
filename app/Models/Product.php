<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'price', 'description'
    ];

    const PRODUCT = 'product';
    const SERVICE = 'service';
    public static $types = [self::PRODUCT, self::SERVICE];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function deals()
    {
        return $this->belongsToMany(Dial::class);
    }
}
