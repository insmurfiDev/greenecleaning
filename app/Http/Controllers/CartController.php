<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    //
    protected $cookie_name='scart';

    public function __construct()
    {
        $this->cid=$this->getcid();
        //dump($this->cid);
    }

    public function getcid()
    {
        $e_cookie=Cookie::get($this->cookie_name);
        $cid=null;
        if (!empty($e_cookie))
        {
            if (strlen($e_cookie)>32)
            {
                $cid=Crypt::decrypt($e_cookie,false);
            }
            else
            {
                $cid=$e_cookie;
            }
        }

        if (empty($cid))
        {
            $cid=md5(time());
            Cookie::queue(Cookie::make($this->cookie_name, $cid, 10080));
        }
        return $cid;
    }

    public function cartAdd(Request $request)
    {
        $x=$request;

        \Cart::session($this->preData['cid']);
        $product=Product::find($request->product_id);
        Cart::add([
            'id' => $product->id, // inique row ID
            'name' => $product->name,
            'price' => $request->price,
            'quantity' => $request->qty,
            'attributes' => array()
        ]);
    }
}
