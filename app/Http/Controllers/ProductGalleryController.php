<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\ProductGalleries;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
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
        $data = ProductGalleries::with('product')->paginate(10);
        $page=null;
        $barang = Products::all();
        return view('product-gallery.index', compact('data','page','barang'));
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $data = ProductGalleries::paginate(10);
            $page=$request->page;
            return view('product-gallery.table', compact('data','page'))->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
            $data = $request->all();
            $data['photo']=$request->file('photo')->store(
                'assets/product','public'
            );
            ProductGalleries::create($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductGalleries::findOrFail($id)->delete();
    }
}
