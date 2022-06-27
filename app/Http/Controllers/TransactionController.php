<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\TransactionDetails;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transactions::paginate(10);
        $page=null;
        return view('transaction.index', compact('data','page'));
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
           $data = Transactions::when($request->search, function ($query) use ($request) {
               $query->where('kode', 'like', "%{$request->search}%")
                   ->orWhere('name', 'like', "%{$request->search}%")
                   ->orWhere('email', 'like', "%{$request->search}%")
                   ->orWhere('number', 'like', "%{$request->search}%")
                   ->orWhere('transaction_status', 'like', "%{$request->search}%");
                })->paginate(10);
            $page=$request->page;
            return view('transaction.table', compact('data','page'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Transactions::with('details.product')->findOrFail($id);
        return view('transaction.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();
        Transactions::findOrFail($id)->update($data);
        return response()->json(['status'=>$request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use($id){
            Transactions::findOrFail($id)->delete();
            TransactionDetails::where('transactions_id',$id)->delete();
        });
    }
}
