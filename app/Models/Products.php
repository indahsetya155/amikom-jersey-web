<?php

namespace App\Models;

use App\Traits\IdIsUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    //
    use IdIsUuid,SoftDeletes;
    public $incrementing = false;
    protected $fillable =[
        'name','type','description','price','slug','quantity','berat'
    ];
    protected $hidden =[
        'deleted_at','created_at','updated_at'
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGalleries::class,'products_id')->orderBy('is_default','desc');
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class,'product_id');
    }

    public function transdetail()
    {
        return $this->hasMany(TransactionDetails::class,'products_id');
    }
}
