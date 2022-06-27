<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ProductGalleries;
use App\Models\Products;
use App\Models\TransactionDetails;
use App\Models\Transactions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $data = Products::paginate(10);
        $page=null;
        return view('product.index', compact('data','page'));
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
           $data = Products::when($request->search, function ($query) use ($request) {
               $query->where('name', 'like', "%{$request->search}%")
                   ->orWhere('type', 'like', "%{$request->search}%")
                   ->orWhere('quantity', 'like', "%{$request->search}%")
                   ->orWhere('price', 'like', "%{$request->search}%");
                })->paginate(10);
            $page=$request->page;
            return view('product.table', compact('data','page'))->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
            $data = $request->all();
            $data['slug']=Str::slug($request->name);
            Products::create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
            $data = $request->all();
            $data['slug']=Str::slug($request->name);
            Products::findOrFail($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use($id){
            Products::findOrFail($id)->delete();
            ProductGalleries::where('products_id',$id)->delete();
            $this->destroyTransaction($id);
        });
    }

    protected function destroyTransaction($id)
    {
       $data = TransactionDetails::where('products_id',$id)->get();
       if($data->count() > 0){
           foreach($data as $d){
               Transactions::find($d->transactions_id)->delete();
               TransactionDetails::find($d->id)->delete();
           }
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        $data = ProductGalleries::where('products_id',$id)->paginate(10);
        $page=null;
        return view('list-gallery.index', compact('data','page','product'));
    }

    public function fetch_data_gallery(Request $request, $id)
    {
        if($request->ajax())
        {
            $data = ProductGalleries::where('products_id',$id)->paginate(10);
            $page=$request->page;
            return view('list-gallery.table', compact('data','page'))->render();
        }
    }
}
