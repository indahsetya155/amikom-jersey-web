<?php

namespace App\Models;

use App\Traits\IdIsUuid;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use IdIsUuid;
    protected $fillable = ['user_id','product_id'];
}
