<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Product;
use App\Models\Review;
use App\Models\Reviews;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    protected $preData;


    public function __construct(Request $request)
    {
        $this->preloadData($request);

    }

    public function preloadData(Request $request)
    {
        $this->preData=[];
        $cc = new CartController();
        $this->preData['cid']=$cc->cid;
    }

    public function index(Request $request)
    {
        $data=$this->preData;
        $data['faqs']=Faq::where('active',1)->orderby('sort')->get();
        $data['products']=Product::where('active',1)->orderby('sort')->take(3)->get();
        return view('home',$data);
    }
    public function contact(Request $request)
    {
        $data=$this->preData;
        return view('contact',$data);
    }
    public function contactSend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'g-recaptcha-response' => 'required|captcha',
            'name'=>'required',
            'email'=>'email|required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //$data=$this->preData;
        $data=$request->all();

        $res=Mail::send('emails.contact', $data, function ($message) use ($data)
        {
            //$message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->from('noreply@greene.com', 'noreply');
            $message->replyTo($data['email'], $data['name']);
            $message->to(Config::get('settings.contact_email'), '')->subject('Contact us request');
        });

        return redirect()->back()->with(['success'=>'Your message has been sent. We\'ll get back to you shortly. Thank you!']);
    }

    public function products(Request $request)
    {
        $data=$this->preData;
        $data['products']=Product::where('active',1)->orderby('sort')->get();
        return view('products',$data);
    }

    public function product($id)
    {
        $data=$this->preData;
        //$data['product']=Product::where('id',$id);
        $data['product']=Product::find($id);
        return view('product',$data);
    }

    public function reviewSend(Request $request)
    {
        $validatedData = $request->validate([
//            'g-recaptcha-response' => 'required|captcha',
            'fname'=>'required',
            'msg'=>'required',
        ]);
        $reviewData=$request->except('_token','g-recaptcha-response');
        $reviewData['review_date']=Carbon::now();
        $reviewData['name']=$reviewData['fname'].' '.$reviewData['lname'] ;
        unset($reviewData['fname'],$reviewData['lname']);

        $review=Review::create($reviewData);
        return redirect()->back()->with(['success'=>'We appreciate your review. Thank you! ']);
    }

    public function cartAdd(Request $request)
    {
        $x=$request;

        Cart::session($this->preData['cid']);
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
