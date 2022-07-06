<?php

namespace App\Models;

use App\Traits\IdIsUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetails extends Model
{
    //
    use IdIsUuid,SoftDeletes;
    public $incrementing = false;
    protected $fillable =[
        'transactions_id','products_id','jumlah'
    ];
    protected $hidden =[
        'deleted_at','created_at','updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class,'products_id','id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transactions::class,'transactions_id','id');
    }
}
