<?php

namespace App\Http\Controllers;

use App\Models\BathroomSize;
use App\Models\Cleaning;
use App\Models\CleaningType;
use App\Models\Extras;
use App\Models\FlatSize;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Omnipay\Omnipay;
use Srmklive\PayPal\Services\ExpressCheckout;

class CleaningStoreController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['location_id', 'flat_size_id', 'bathroom_size_id', 'time_window_id', 'come_date', 'address', 'apt_number', 'name', 'email', 'phone', 'cleaning_type_id', 'paypal_email']);
        $extras = array_map(function ($item) {
            return $item['id'];
        }, json_decode($request->extras, true));

        $location = Location::findOrFail($request->location_id);
        $cleaningType = CleaningType::findOrFail($request->cleaning_type_id);
        $bathroomSize = BathroomSize::findOrFail($request->bathroom_size_id);
        $flatSize = FlatSize::findOrFail($request->flat_size_id);

        $startPrice = Config::get('settings.cleaning_price');
        $tax = Config::get('settings.cleaning_tax');

        $locationPercent = $startPrice / 100 * $location->additional_price_percent;
        $endPrice = $startPrice + $locationPercent;
        $endPrice += $endPrice / 100 * $cleaningType->additional_price_percent;
        $endPrice += $flatSize->price;
        $endPrice += $bathroomSize->additional_price;

        foreach ($extras as $extra) {
            $extra = Extras::find($extra);
            $endPrice += $extra->price;
        }

        $endPrice += $endPrice / 100 * $tax;


        if ($request->payment == 'pay_now') {
            if ($request->paymentType !== 'paypal') {
                $gateway = Omnipay::create('PayPal_Pro');
                $gateway->setUsername(Config::get('settings.pp_username'));
                $gateway->setPassword(Config::get('settings.pp_password'));
                $gateway->setSignature(Config::get('settings.pp_signature'));
                $gateway->setTestMode(true);

                $arr_expiry = explode("/", $data['card_exp']);

                $formData = array(
                    'firstName' => $request->name,
                    'lastName' => '',
                    'number' => $request->card_number,
                    'expiryMonth' => trim($arr_expiry[0]),
                    'expiryYear' => trim($arr_expiry[1]),
                    'cvv' => $request->cvv,
                    'description' => 'cleaninig at shadesofgreene.com'
                );

                try {

                    // Send purchase request
                    $response = $gateway->purchase([
                        'amount' => $endPrice,
                        'currency' => 'USD',
                        'card' => $formData
                    ])->send();

                    // Process response
                    if ($response->isSuccessful()) {

                        // Payment was successful
                        //echo "Payment is successful. Your Transaction ID is: ". $response->getTransactionReference();

                        $data['pay_now'] = true;
                        $cleaning = new Cleaning($data);
                        $cleaning->save();
                        $cleaning->extras()->sync($extras);
                        return back()->with('success', 'Your order has been placed!');

                    } else {
                        // Payment failed
                        //echo "Payment failed. ". $response->getMessage();
                        return back()->with('error', $response->getMessage());
                    }
                } catch (Exception $e) {
                    return back()->with('error', $e->getMessage());
                }
            } else {
                $data['pay_now'] = true;
                $cleaning = new Cleaning($data);
                $cleaning->save();
                $cleaning->extras()->sync($extras);
                // Paypal link pay
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
                        'name' => 'Payment for shdesofgreene.com cleaning',
                        'price' => $request->total,
                        'qty' => 1
                    ]
                ];
                $cart['invoice_id'] = $cleaning->id;
                $cart['invoice_description'] = "Payment for shdesofgreene.com cleaning #" . $cleaning->id;
                $cart['return_url'] = route('cleaning-success', $cleaning->id);
                $cart['cancel_url'] = route('cleaning-failed', $cleaning->id);

                $cart['total'] = $endPrice;
                try {
                    $response = $provider->setExpressCheckout($cart);
                    $response = $provider->setExpressCheckout($cart, true);
                    if (isset($response['TOKEN'])) {
                        $data['orderno'] = $cleaning->id;
                    }
                    if (!empty($response['paypal_link'])) {
                        return redirect($response['paypal_link']);
                    } else {
                        return back()->with('error', $response['L_LONGMESSAGE0'] ?? 'Payment error')->withInput();
                    }
                } catch (Exception $e) {
                    return back()->with('error', 'Payment error')->withInput();
                }
            }


        } else {
            $data['pay_now'] = false;
            $cleaning = new Cleaning($data);
            $cleaning->save();
            $cleaning->extras()->sync($extras);
            return back()->with('success', 'Your order has been placed!');
        }
    }

    public function fail(Cleaning $cleaning){
        $cleaning->delete();
    }

    public function success(Cleaning $cleaning){

    }

}
