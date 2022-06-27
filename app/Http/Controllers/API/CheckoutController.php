<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Models\Products;
use App\Models\TransactionDetails;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['kode'] = strtotime(date("Y-m-d H:i:s"));

        $data = DB::transaction(function () use($data,$request) {

            $trans = Transactions::create($data);

            foreach($request->transaction_details as $productId){

                $details[] = new TransactionDetails([
                    'transactions_id'   => $trans->id,
                    'products_id'       => $productId
                ]);
                
                Products::find($productId)->decrement('quantity');
            }

            return $trans->details()->saveMany($details);
        });

        return ResponseFormater::success($data);
    }
}
