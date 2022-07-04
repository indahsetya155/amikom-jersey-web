<?php

namespace App\Models;

use App\Traits\IdIsUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    //
    use IdIsUuid,SoftDeletes;
    public $incrementing = false;

    protected $fillable =[
        'kode','name','email','number','address',
        'transaction_total','transaction_status', 'bukti','file'
    ];
    protected $hidden =[
        'deleted_at','created_at','updated_at'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetails::class,'transactions_id');
    }

    public function getKodeAttribute($value)
    {
        return 'TRX'.$value;
    }

}
