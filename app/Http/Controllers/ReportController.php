<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\TransactionDetails;
use App\Models\Transactions;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
            return $this->data($request);
        return view('report.index');
    }

    public function data($request)
    {
        $start = $request->start;
        $end = $request->end;
        $data = TransactionDetails::with('product','transaction')
            ->whereBetween('created_at',[$start,$end])
            ->get();
        // $data = Transactions::whereBetween('created_at', [$start, $end])->get();
        return response()->json(['data'=>$data]);
    }

    public function total(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $total = 0;
        $data = TransactionDetails::with('product','transaction')
            ->whereBetween('created_at',[$start,$end])
            ->get();
        foreach ($data as $item) {
            $total += $item->product->price * $item->jumlah;
        }
        return response()->json($total);
    }
}
