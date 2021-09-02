<?php

namespace App\Http\Controllers;

use App\FloorModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function customer_save()
    {
        $floors = FloorModel::all();
        return view('customer.save_customer',[
            'floors' => $floors
        ]);
    }
}
