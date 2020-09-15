<?php

namespace App\Http\Controllers;

use App\Models\Product;
//use Cart;
use App\Models\Shipping;
use App\Models\State;
use App\Models\Tax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;

class CartController extends Controller
{
    //
    protected $cookie_name='scart';
    public $cid;

    public function __construct()
    {
        $this->cid=$this->getcid();
        Cart::restore($this->cid);
    }

    public function __destruct()
    {
        $res=Cart::store($this->cid);
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
        $x=$request->all();

        $y=Cart::content();

        $product=Product::find($request->product_id);
        Cart::add(
            $product->id.'-'.$request->prop,
            $product->name,
            $request->price,
            intval($request->qty),
            [
                'size'=>$request->prop,
                'image'=>array_values($product->images)[0] ?? '',
                'id'=>$product->id,
            ]
        );
        $y=Cart::content();


        return json_encode($y);

    }

    public function getCartQty(Request $request)
    {

        //return Cart::getTotalQuantity();
    }
    public function getCartContent()
    {
        /*
        $ret=Cart::getContent();
        return $ret;
        */
    }
    public function cartPlus(Request $request)
    {
        $product=Product::find($request->product_id);
        Cart::add(
            $request->product_id.'-'.$request->product_prop,
            $product->name,
            $request->product_price,
            1,
            [
                'size'=>$request->product_prop,
                'image'=>array_values($product->images)[0] ?? '',
                'id'=>$product->id,
            ]
        );


        $ret['cart_etotal']=Cart::getTotal();
        $ret['cart_count']=Cart::count();
        return $ret;
    }

    public function cartMinus(Request $request)
    {
        $product=Product::find($request->product_id);
        Cart::add(
            $request->product_id.'-'.$request->product_prop,
            $product->name,
            $request->product_price,
            -1,
            [
                'size'=>$request->product_prop,
                'image'=>array_values($product->images)[0] ?? '',
                'id'=>$product->id,
            ]
        );

        $ret['cart_etotal']=Cart::getTotal();
        $ret['cart_count']=Cart::count();
        return $ret;
    }

    public function cartRemove(Request $request)
    {
        $x=$request;

        Cart::remove($request->item_uid);

        $ret['cart_etotal']=Cart::getTotal();
        $ret['cart_count']=Cart::count();
        return $ret;
    }

    public function getShipping(Request $request)
    {
        $state=State::where('name',$request->state)->first();
        $shippings=Shipping::where('active',1)->orderby('sort')->get();
        $ret=[];

        $catTotal=floatval(Cart::getTotal());
        $freeShipping=floatval(Config::get('settings.free_shipping'));

        foreach ($shippings as $idx=>$shipping)
        {
            $rets[$idx]['name']=$shipping->name;
            $price=$shipping->prices[$state->code];
            $cart=Cart::content();

            $s_total=0;
            if ($shipping->free==1 && $catTotal>=$freeShipping)
            {

            }
            else
            {
                foreach ($cart as $item)
                {

                    $product=Product::find($item->options['id']);
                    if($product->free_shipping==0)
                    {
                        $shipping_index=0;
                        foreach ($product->attributes as $attr)
                        {
                            if ($attr['name']==$item->options['size'])
                            {
                                $shipping_index=$attr['shipping'];
                                break;
                            }
                        }
                        $s_total+=$price*$shipping_index*$item->quantity;
                    }
                }
            }

            $rets[$idx]['price']=$s_total;
        }
        $ret['shipping']=$rets;

        $tax=Tax::where('state',$state->code)->first();
        $ret['tax']=$tax->value;

        return $ret;
    }

    public function makeOrder(Request $request)
    {
        $x=$request;

    }
}
