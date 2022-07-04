<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\ResponseFormater;
use App\Models\Cart;
use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $cart = 0;
        $harga = 0;
        if(auth()->check()){
            $cart = Cart::where('user_id',auth()->user()->id)->sum('jumlah');
        }
        $products = Products::with('galleries')->where('type', 'like', '%' . request()->type . '%')->where('name', 'like', '%' . request()->search . '%')->get();
        $category = Products::select('type')->distinct()->get();
        return view('frontend.welcome', compact('products','category','cart'));
    }

    public function detail($id)
    {
        $category = Products::select('type')->distinct()->get();
        $data = Products::with('galleries','wishlist')->findOrFail($id);
        return view('frontend.detail', compact('data','category'));
    }

    public function listCart()
    {
        $category = Products::select('type')->distinct()->get();
        $cart = Cart::with('product.galleries')->where('user_id',auth()->user()->id)->get();
        return view('frontend.keranjang', compact('cart','category'));
    }
    public function listWishlist()
    {
        $category = Products::select('type')->distinct()->get();
        $wishlist = Wishlist::with('product.galleries')->where('user_id',auth()->user()->id)->get();
        return view('frontend.wishlist', compact('wishlist','category'));
    }

    public function addWishlist($id)
    {
        if(auth()->user()->email == 'admin@gmail.com')
            return redirect()->back()->with('danger', 'Admin tidak bisa memasukan kedalam wishlist');
        $produk = Products::findOrFail($id);
        if(Wishlist::where('user_id',auth()->user()->id)->where('product_id', $produk->id)->count() != 0)
            return redirect()->back()->with('warning', 'Produk sudah pernah dimasukan ke dalam wishlist');
        Wishlist::create(['user_id' => auth()->user()->id,'product_id'=> $produk->id]);
        return redirect()->back()->with('success', 'Produk berhasil dimasukan ke dalam wishlist');
    }
    
    public function deleteWishlist()
    {
        $cart = Wishlist::findOrfail(request()->id);
        $cart->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari wishlist');
    }

    public function addKeranjang()
    {
        if (auth()->user()->email == 'admin@gmail.com')
            return redirect()->back()->with('danger', 'Admin tidak bisa memasukan kedalam keranjang');
        $produk = Products::findOrFail(request()->product_id);
        $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $produk->id)->first();
        if ($cart){
            $jumlah = $cart + request()->jumlah;
            if($produk->quantity < $jumlah)
                return redirect()->back()->with('danger', 'Maaf, jumlah produk yang akan anda masukan melebihi stok produk');
            $cart->update(['jumlah' => $jumlah]);
            return redirect()->back()->with('success', 'Jumlah Produk berhasil ditambah ke dalam keranjang');
        }else{
            Cart::create(['user_id' => auth()->user()->id, 'product_id' => $produk->id,'jumlah'=> request()->jumlah]);
            return redirect()->back()->with('success', 'Produk berhasil dimasukan ke dalam keranjang');
        }
    }
    public function changeKeranjang()
    {
        // if (auth()->user()->email == 'admin@gmail.com')
        //     return redirect()->back()->with('danger', 'Admin tidak bisa memasukan kedalam keranjang');
        $cart = Cart::with('product')->findOrfail(request()->id);
        if ($cart){
            if(request()->step == 'plus'){
                $jumlah = $cart->jumlah + 1;
            }else{
                $jumlah = $cart->jumlah - 1;
            }
            if($cart->product->quantity < $jumlah)
                return redirect()->back()->with('danger', 'Maaf, jumlah produk yang akan anda masukan melebihi stok produk');
            $cart->update(['jumlah' => $jumlah]);
            return redirect()->back()->with('success', 'Jumlah Produk berhasil ditambah');
        }
    }
    public function deleteKeranjang()
    {
        // if (auth()->user()->email == 'admin@gmail.com')
        //     return redirect()->back()->with('danger', 'Admin tidak bisa memasukan kedalam keranjang');
        $cart = Cart::with('product')->findOrfail(request()->id);
        $cart->delete();
        return redirect()->back()->with('success', 'Jumlah Produk berhasil dihapus');
    }
}
