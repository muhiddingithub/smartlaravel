<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = ['deleted_at'];

    public function merchant()
    {
        return $this->hasOne(Merchant::class, 'id', 'merchant_id');
    }
}
