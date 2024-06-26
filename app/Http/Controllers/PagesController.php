<?php

namespace App\Http\Controllers;

use App\Models\BathroomSize;
use App\Models\Cleaning;
use App\Models\CleaningType;
use App\Models\Extras;
use App\Models\Faq;
use App\Models\FlatSize;
use App\Models\Location;
use App\Models\Product;
use App\Models\Review;
use Omnipay\Omnipay;
use App\Models\Shipping;
use App\Models\State;
use App\Models\TimeWindow;
use Backpack\PageManager\app\Models\Page;
use Carbon\Carbon;
use Exception;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Srmklive\PayPal\Services\ExpressCheckout;

class PagesController extends Controller
{
    protected $preData;


    public function __construct(Request $request)
    {
        $this->preloadData($request);

    }

    public function preloadData(Request $request)
    {
        $this->preData = [];
        $cc = new CartController();

        Cart::restore($cc->cid);

        $this->preData['cart_count'] = Cart::count();
        $this->preData['cart'] = Cart::content();
        $this->preData['cart_etotal'] = Cart::getTotal();
    }

    public function index(Request $request)
    {
        $data = $this->preData;
        $data['faqs'] = Faq::where('active', 1)->orderby('sort')->get();
        $data['products'] = Product::where('active', 1)->orderby('sort')->take(3)->get();

        $content['block1'] = Page::findBySlug('main-block-1');
        $content['block2'] = Page::findBySlug('main-block-2');
        $content['block3'] = Page::findBySlug('main-block-3');
        $content['block4'] = Page::findBySlug('main-block-4');

        $content['main-why-block1'] = Page::findBySlug('main-block-why-1');
        $content['main-why-block2'] = Page::findBySlug('main-block-why-2');
        $content['main-why-block3'] = Page::findBySlug('main-block-why-3');
        $data['content'] = $content;

        $data['locations'] = Location::all();
        $data['flatSizes'] = FlatSize::orderBy('price')->get();
        $data['cleaningPrice'] = Config::get('settings.cleaning_price');
        $data['bathroomSizes'] = BathroomSize::orderBy('additional_price')->get();

        return view('home', $data);
    }
    public function contact(Request $request)
    {
        $page = Page::findBySlug('contact_page');
        $data = $this->preData;
        $data['page'] = $page;
        return view('contact', $data);
    }
    public function contactSend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'g-recaptcha-response' => 'required|captcha',
            'name' => 'required',
            'email' => 'email|required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //$data=$this->preData;
        $data = $request->all();

        $res = Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            //$message->from('noreply@greene.com', 'noreply');
            $message->replyTo($data['email'], $data['name']);
            $message->to(Config::get('settings.contact_email'), '')->subject('Contact us request');
        });

        return redirect()->back()->with(['success' => 'Your message has been sent. We\'ll get back to you shortly. Thank you!']);
    }

    public function products(Request $request)
    {

        $data = $this->preData;
        $data['sort'] = $request->sort ?? '';
        $products = Product::where('active', 1);
        if (!empty($data['sort'])) {
            switch ($data['sort']) {
                case 1:
                    $products->orderby('price', 'DESC');
                    break;
                case 2:
                    $products->orderby('price');
                    break;
                case 3:
                    $products->orderby('name');
                    break;
                case 4:
                    $products->orderby('name', 'DESC');
                    break;
            }

        } else {
            $products->orderby('sort');
        }

        //$data['paginator']=$products->paginate(9);
        $data['products'] = $products->get();
        return view('products', $data);
    }

    public function sale(Request $request)
    {
        $data = $this->preData;
        $data['sort'] = $request->sort ?? '';

        $products = Product::where('active', 1)->where('sale', 1);
        if (!empty($data['sort'])) {
            switch ($data['sort']) {
                case 1:
                    $products->orderby('price', 'DESC');
                    break;
                case 2:
                    $products->orderby('price');
                    break;
                case 3:
                    $products->orderby('name');
                    break;
                case 4:
                    $products->orderby('name', 'DESC');
                    break;
            }

        } else {
            $products->orderby('sort');
        }

        //$data['paginator']=$products->paginate(9);
        $data['products'] = $products->get();

        return view('products', $data);
    }


    public function product($id)
    {
        $data = $this->preData;
        //$data['product']=Product::where('id',$id);
        $data['product'] = Product::find($id);
        return view('product', $data);
    }

    public function reviewSend(Request $request)
    {
        $validatedData = $request->validate([
            //            'g-recaptcha-response' => 'required|captcha',
            'fname' => 'required',
            'msg' => 'required',
        ]);
        $reviewData = $request->except('_token', 'g-recaptcha-response');
        $reviewData['review_date'] = Carbon::now();
        $reviewData['name'] = $reviewData['fname'] . ' ' . $reviewData['lname'];
        unset($reviewData['fname'], $reviewData['lname']);

        $review = Review::create($reviewData);
        return redirect()->back()->with(['success' => 'We appreciate your review. Thank you! ']);
    }
    public function checkout(Request $request)
    {
        $data = $this->preData;
        $shippings = Shipping::where('active', 1)->orderby('sort')->get();

        $data['shippings'] = $shippings;

        return view('checkout', $data);
    }

    public function booking()
    {
        $data = $this->preData;
        $shippings = Shipping::where('active', 1)->orderby('sort')->get();

        $data['cleaningTax'] = Config::get('settings.cleaning_tax');
        $data['extras'] = Extras::all();
        $data['cleaningTypes'] = CleaningType::all();
        $data['flatSizes'] = FlatSize::all();
        $data['bathroomSizes'] = BathroomSize::all();
        $data['cleaningPrice'] = Config::get('settings.cleaning_price');
        $data['shippings'] = $shippings;
        $data['locations'] = Location::all();
        $data['timeWindows'] = TimeWindow::all();

        return view('cleaning_checkout', $data);
    }



    public function services()
    {
        $data = $this->preData;
        return view('services', $data);
    }



}
