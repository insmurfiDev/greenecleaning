<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;

//use Cart;
use App\Models\Shipping;
use App\Models\State;
use App\Models\Tax;

use Omnipay\Omnipay;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;
use Srmklive\PayPal\Services\ExpressCheckout;

class CartController extends Controller
{
    //
    protected $cookie_name = 'scart';
    public $cid;

    public function __construct()
    {
        $this->cid = $this->getcid();
        Cart::restore($this->cid);
    }

    public function __destruct()
    {
        $res = Cart::store($this->cid);
    }


    public function getcid()
    {
        $e_cookie = Cookie::get($this->cookie_name);
        $cid = null;
        if (!empty($e_cookie)) {
            if (strlen($e_cookie) > 32) {
                $cid = Crypt::decrypt($e_cookie, false);
            } else {
                $cid = $e_cookie;
            }
        }

        if (empty($cid)) {
            $cid = md5(time());
            Cookie::queue(Cookie::make($this->cookie_name, $cid, 10080));
        }
        return $cid;
    }

    public function cartAdd(Request $request)
    {
        $x = $request->all();

        $y = Cart::content();

        $product = Product::find($request->product_id);
        Cart::add(
            $product->id . '-' . $request->prop,
            $product->name,
            $request->price,
            intval($request->qty),
            [
                'size' => $request->prop,
                'image' => array_values($product->images)[0] ?? '',
                'id' => $product->id,
            ]
        );
        $y = Cart::content();


        return json_encode($y);

    }

    public function getCartQty(Request $request)
    {
    }

    public function getCartContent()
    {

    }

    public function cartPlus(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::add(
            $request->product_id . '-' . $request->product_prop,
            $product->name,
            $request->product_price,
            1,
            [
                'size' => $request->product_prop,
                'image' => array_values($product->images)[0] ?? '',
                'id' => $product->id,
            ]
        );


        $ret['cart_etotal'] = Cart::getTotal();
        $ret['cart_count'] = Cart::count();
        return $ret;
    }

    public function cartMinus(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::add(
            $request->product_id . '-' . $request->product_prop,
            $product->name,
            $request->product_price,
            -1,
            [
                'size' => $request->product_prop,
                'image' => array_values($product->images)[0] ?? '',
                'id' => $product->id,
            ]
        );

        $ret['cart_etotal'] = Cart::getTotal();
        $ret['cart_count'] = Cart::count();
        return $ret;
    }

    public function cartRemove(Request $request)
    {
        $x = $request;

        Cart::remove($request->item_uid);

        $ret['cart_etotal'] = Cart::getTotal();
        $ret['cart_count'] = Cart::count();
        return $ret;
    }

    public function getShipping(Request $request)
    {
        $state = State::where('name', $request->state)->first();
        $shippings = Shipping::where('active', 1)->orderby('sort')->get();
        $ret = [];

        $catTotal = floatval(Cart::getTotal());
        $freeShipping = floatval(Config::get('settings.free_shipping'));

        foreach ($shippings as $idx => $shipping) {
            $rets[$idx]['name'] = $shipping->name;
            $price = $shipping->prices[$state->code];
            $cart = Cart::content();

            $s_total = 0;
            if ($shipping->free == 1 && $catTotal >= $freeShipping) {

            } else {
                foreach ($cart as $item) {

                    $product = Product::find($item->options['id']);
                    if ($product->free_shipping == 0) {
                        $shipping_index = 0;
                        foreach ($product->attributes as $attr) {
                            if ($attr['name'] == $item->options['size']) {
                                $shipping_index = $attr['shipping'];
                                break;
                            }
                        }
                        $s_total += $price * $shipping_index * $item->quantity;
                    }
                }
            }

            $rets[$idx]['price'] = $s_total;
        }
        $ret['shipping'] = $rets;

        $tax = Tax::where('state', $state->code)->first();
        $ret['tax'] = $tax->value;

        return $ret;
    }

    public function makeOrder(Request $request)
    {
        $cart = Cart::content();
        $order_text = '';
        foreach ($cart as $item) {
            $order_text .= $item->name . ' ';
            $order_text .= $item->options['size'] . ' ';
            $order_text .= $item->price . ' x ' . $item->quantity . '\n';
        }
        $order_text .= "Subtotal: $" . $request->stotal . '\n';
        if (!empty($request->coupon)) {
            $order_text .= "Promo code discount: $" . $request->coupon . '\n';
        }
        $order_text .= "Shipping: $" . $request->shipping . '\n';
        $order_text .= "Total: $" . $request->total . '\n';

        $order_data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'address' => $request->address,
            'apt' => $request->apt,
            'fname_b' => $request->fname_b,
            'lname_b' => $request->lname_b,
            'address_b' => $request->address_b,
            'apt_b' => $request->apt_b,
            'status' => 0,
            'order_date' => date('Y-m-d H:i:s'),
            // 'transaction'=>$request->email,
            'details' => $order_text,
            'cid' => $this->cid,
        ];
        $order = Order::create($order_data);


        if ($request->checkout_type == 'card') {
            $gateway = Omnipay::create('PayPal_Pro');
            $gateway->setUsername(Config::get('settings.pp_username'));
            $gateway->setPassword(Config::get('settings.pp_password'));
            $gateway->setSignature(Config::get('settings.pp_signature'));
            $gateway->setTestMode(false);

            $arr_expiry = explode("/", $request->card_exp);

            $formData = array(
                'firstName' => $request->fname_b,
                'lastName' => $request->lname_b,
                'number' => $request->card_number,
                'expiryMonth' => trim($arr_expiry[0]),
                'expiryYear' => trim($arr_expiry[1]),
                'cvv' => $request->cvv,
                'description' => 'order ' . $order->id . ' at shadesofgreene.com'
            );

            try {
                // Send purchase request
                $response = $gateway->purchase([
                    'amount' => $request->total,
                    'currency' => 'USD',
                    'card' => $formData
                ])->send();

                // Process response
                if ($response->isSuccessful()) {

                    // Payment was successful
                    //echo "Payment is successful. Your Transaction ID is: ". $response->getTransactionReference();

                    $order->status = 1;
                    $order->transaction = $response->getData()['TRANSACTIONID'];
                    $order->save();
                    $data['orderno'] = $order->id;
                    return redirect(route('order-success', $order->id));// view('order_success',$data);


                } else {
                    // Payment failed
                    //echo "Payment failed. ". $response->getMessage();
                    return back()->with('error', $response->getMessage())->withInput();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }

        } else {
            $provider = new ExpressCheckout();
            $config['mode'] = 'live';
            $config['live']['username'] = Config::get('settings.pp_username');
            $config['live']['password'] = Config::get('settings.pp_password');
            $config['live']['secret'] = Config::get('settings.pp_signature');
            $config['live']['certificate'] = '';

            $config['payment_action'] = 'Sale';
            $config['currency'] = 'USD';
            $config['billing_type'] = 'MerchantInitiatedBilling';
            $config['notify_url'] = '';
            $config['locale'] = '';
            $config['validate_ssl'] = true;
            $provider->setApiCredentials($config);

            $cart = [];
            $cart['items'] = [
                [
                    'name' => 'Payment for shdesofgreene.com order #' . $order->id,
                    'price' => $request->total,
                    'qty' => 1
                ]
            ];
            $cart['invoice_id'] = $order->id;
            $cart['invoice_description'] = "Payment for shdesofgreene.com order #" . $order->id;
            $cart['return_url'] = route('order-success', $order->id);
            $cart['cancel_url'] = route('order-failed', $order->id);

            $cart['total'] = $request->total;
            try {
                $response = $provider->setExpressCheckout($cart, false);
                if (isset($response['TOKEN'])) {
                    $order->status = 1;
                    $order->transaction = $response->getData()['TRANSACTIONID'] ?? '';
                    $order->save();
                    $data['orderno'] = $order->id;
                }
                return redirect($response['paypal_link']);
            } catch (\Exception $e) {
                //return back()->with('error', $response->getMessage())->withInput();
            }
        }
    }

    public function orderSuccess($id)
    {
        $order = Order::find($id);

        if (!$order || $order->cid != $this->cid) {
            return back();
        }
        $cart = Cart::content();
        $data['order'] = $order;
        $data['cart'] = $cart;
        return view('order_success', $data);
    }

    public function orderFailed(Request $request)
    {
        $data = [];
        return view('order_failed', $data);
    }

    public function couponCheck(Request $request)
    {
        if (!empty($request->coupon)) {
            $coupon = Coupon::where('code', $request->coupon)->where('active', 1)->first();
            if ($coupon) {
                return json_encode($coupon->toArray());
            }
        }
        return false;
    }
}
