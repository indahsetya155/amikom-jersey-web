<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\ResponseFormater;
use App\Http\Requests\API\CheckoutRequest;
use App\Http\Requests\uploadFile;
use App\Models\Cart;
use App\Models\Products;
use App\Models\TransactionDetails;
use App\Models\Transactions;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function listCheckout()
    {
        $category = Products::select('type')->distinct()->get();
        $checkout = Transactions::where('email',auth()->user()->email)->get();
        return view('frontend.checkout', compact('checkout','category'));
    }

    public function formCheckout()
    {
        $last = Transactions::where('email',auth()->user()->email)->latest()->first();
        $category = Products::select('type')->distinct()->get();
        $cart = Cart::with('product.galleries')->where('user_id', auth()->user()->id)->get();
        return view('frontend.form-checkout', compact('cart', 'category','last'));
    }


    public function checkout(CheckoutRequest $request)
    {

        $data = $request->except('transaction_details');
        $data['kode'] = strtotime(date("Y-m-d H:i:s"));
        $data['transaction_status'] = "PENDING";
        $data['email'] = auth()->user()->email;

        if($request->hasFile('file')){
            $data['file'] = $request->file('file')->store('desain','public');
        }

        $data = DB::transaction(function () use ($data, $request) {

            $trans = Transactions::create($data);
            $cart = Cart::where('user_id', auth()->user()->id)->get();
            foreach ($cart as $productId) {

                $details[] = new TransactionDetails([
                    'transactions_id'   => $trans->id,
                    'products_id'       => $productId->product_id,
                    'jumlah'       => $productId->jumlah,
                ]);

              $barang =  Products::find($productId->product_id);
              $barang->update([
                'quantity' => $barang->quantity - $productId->jumlah,
              ]);
            }
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->sendWA($trans);
            return $trans->details()->saveMany($details);
        });

        return redirect('checkout')->with('success','Checkout Berhasil');
    }

    public function uploadFile(uploadFile $request,$id)
    {
        $data = Transactions::findOrFail($id);
        if($request->hasFile('file')){
            $input['file'] = $request->file('file')->store('desain','public');
        }
        if($request->hasFile('bukti')){
            $input['bukti'] = $request->file('bukti')->store('bukti','public');
        }
        $data->update($input);
        return redirect()->back()->with('success','Upload ulang berhasil');
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
        if (auth()->user()->email == 'admin@gmail.com')
            return redirect()->back()->with('danger', 'Admin tidak bisa memasukan kedalam keranjang');
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
        if (auth()->user()->email == 'admin@gmail.com')
            return redirect()->back()->with('danger', 'Admin tidak bisa memasukan kedalam keranjang');
        $cart = Cart::with('product')->findOrfail(request()->id);
        $cart->delete();
        return redirect()->back()->with('success', 'Jumlah Produk berhasil dihapus');
    }

    private function sendWA($data)
    {
        $no = '6287877242599';
        try {
            sendWa($no, "*Pemberitahuan!*
Anda telah menerima satu pesanan baru.
ID Transaksi : ".$data->kode."
Akun Email : ".$data->email."
Nama : ".$data->name."
Jumlah Transaksi : ".$data->transaction_total."
");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
