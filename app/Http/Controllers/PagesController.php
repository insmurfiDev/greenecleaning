<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //$this->preData['services']=Service::where('active',1)->orderby('sort')->get();
    }

    public function index(Request $request)
    {
        $data=$this->preData;
        return view('home',$data);
    }
}
