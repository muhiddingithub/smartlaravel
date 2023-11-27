<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->registered_at = now();
        });
    }

    public function shops()
    {
        return $this->hasMany(Shop::class, 'merchant_id', 'id');
    }
}
