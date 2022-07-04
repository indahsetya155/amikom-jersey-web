<?php

namespace App\Models;

use App\Traits\IdIsUuid;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use IdIsUuid;
    protected $fillable = ['user_id','product_id','jumlah'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'products_id', 'id');
    }
}
