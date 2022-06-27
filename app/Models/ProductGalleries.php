<?php

namespace App\Models;

use App\Traits\IdIsUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGalleries extends Model
{
    //
    use IdIsUuid,SoftDeletes;
    public $incrementing = false;
    protected $fillable =[
        'products_id','photo','is_default'
    ];
    protected $hidden =[
        'deleted_at','created_at','updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class,'products_id','id');
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/'.$value);
    }
}
