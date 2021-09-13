<?php

namespace App\Http\Controllers;

use App\CustomerWalkingModel;
use App\FloorModel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_save()
    {
        $floors = FloorModel::all();
        return view('customer.save_customer',[
            'floors' => $floors
        ]);
    }

    public function save_customer_walking(Request $request)
    {
//        return $request;

        $customer = new CustomerWalkingModel();
        $customer->nic = $request->get("nic");
        $customer->mobile = $request->get("mobile");
        $customer->no_of_walking = $request->get("no_of_walking");
        $customer->floor_id = $request->get("floor");
        $customer->floor_units_id = $request->get("floor_unit");
        $customer->save();

        return 'Save Successful';
    }

    public function view_customer_walking(Request $request)
    {

//        return $request;

        $from_date = $request->get("from_date");
        $to_date = $request->get("to_date");

        if ($from_date != null && $from_date != '' && $to_date != null && $to_date != '') {
            $special_messages = CustomerWalkingModel::select('customer_walking.*')
                ->whereDate('customer_walking.created_at', '>=', $from_date)
                ->whereDate('customer_walking.created_at', '<=', $to_date);

//            return $special_messages->get();
//            $data['report_data'] = ;
            return view('customer.view_customer_walking',[
                'from_date' => $from_date,
                'to_date' => $to_date,
                'report_data' => $special_messages->get(),
            ]);
        }





        return view('customer.view_customer_walking',[
            'from_date' => $from_date,
            'to_date' => $to_date,
        ]);
    }


}
