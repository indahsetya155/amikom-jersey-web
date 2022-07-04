<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->email != 'admin@gmail.com')
            return redirect()->intended('/');
        return view('dashboard.index');
    }

    function fetch_data($bulan, Request $request)
    {
        if($request->ajax())
        {
           $data = Transactions::whereMonth('created_at', '=', $bulan)
           ->when($request->search, function ($query) use ($request) {
            $query->where('kode', 'like', "%{$request->search}%")
                ->orWhere('name', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%")
                ->orWhere('number', 'like', "%{$request->search}%")
                ->orWhere('transaction_status', 'like', "%{$request->search}%");
                })->paginate(10);
            $page=$request->page;
            return view('dashboard.table', compact('data','page'));
        }
    }

    public function getDataStatistik(Request $request)
    {
        if(is_numeric($request->bulan)){
            $status = $this->getPesanan($request->bulan);
            return response()->json([
                'income'    =>$status['income'],
                'pending'   =>$status['pending'],
                'success'   =>$status['success'],
                'failed'    =>$status['failed']
            ], 200,);
        }else{
            return response()->json("error", 403);
        }
    }

    public function getGrafik(Request $request)
    {
        if(is_numeric($request->bulan)){
            $data = $this->getPesanan($request->bulan);
            return view('dashboard.chart',compact('data'));
        }else{
            return response()->json("error", 403);
        }
    }


    protected function getPesanan($bulan)
    {
        $transaksi = Transactions::whereMonth('created_at', '=', $bulan)->get();
        $income =   $transaksi->where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $pending =  $transaksi->where('transaction_status', 'PENDING')->count();
        $success =  $transaksi->where('transaction_status', 'SUCCESS')->count();
        $failed =   $transaksi->where('transaction_status', 'FAILED')->count();

        return [
            'income'    =>$income,
            'pending'   =>$pending,
            'success'   =>$success,
            'failed'    =>$failed,
        ];
    }
}
