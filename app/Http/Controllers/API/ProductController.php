<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $product = Products::with('galleries');

        if($request->id)
            $product->where('id',$request->id);

        if($request->slug)
            $product->where('slug', $request->slug);

        if($request->name)
            $product->where('name','like','%'.$request->nama.'%')->paginate($request->limit?:10)->appends(request()->input());

        if($request->type)
            $product->where('type','like','%'.$request->type.'%')->paginate($request->limit?:10)->appends(request()->input());

        if($request->price_from && $request->price_to)
            $product->whereBetween('price', [$request->price_from, $request->price_to])->orderBy('price',$request->orderby?:'asc')->paginate($request->limit?:10)->appends(request()->input());

        else{
            if($request->price_from)
                $product->where('price', '>=', $request->price_from)->orderBy('price','asc')->paginate($request->limit?:10)->appends(request()->input());

            if($request->price_to)
                $product->where('price','<=',$request->price_to)->orderBy('price','desc');
        }

        if($request->slug || $request->id)
            $data = $product->first();
        else
           $data = $product->paginate($request->limit?:10)->appends(request()->input());

        if($data)
            return ResponseFormater::success($data,'Data produk berhasil ditemukan');
        else
            return ResponseFormater::error(null,'Maaf, Data produk tidak ditemukan',404);

    }
}
