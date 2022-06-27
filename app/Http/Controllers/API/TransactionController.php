<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $data = Transactions::with('details.product')->find($id);

        if($data)
            return ResponseFormater::success($data,'data transaksi telah berhasil ditemukan');
        else
            return ResponseFormater::error(null,'data transaksi tidak ditemukan');

    }
}
