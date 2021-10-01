<?php

namespace App\Http\Controllers;

use App\EmployeeModel;
use App\EmployeeUIAccessModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function employee_save()
    {
//        $employee = EmployeeModel::all();
        return view('employee.save_employee', [
//            'employee' => $employee
        ]);
    }

    public function save_employee_data(Request $request)
    {
        try {
            $employee = new EmployeeModel();
            $employee->employee_name = $request->get("employee_name");
            $employee->employee_code = $request->get("employee_code");
            $employee->mobile = $request->get("mobile");
            $employee->email = $request->get("email");
            $employee->password = $request->get("password");
            $employee->save();

            $user = new User();
            $user->user_type = 'employee';
            $user->name = $request->get("employee_name");
            $user->email = $request->get("email");
            $user->password = Hash::make($request->get("password"));
            $user->save();

            $employee_ui_access = new EmployeeUIAccessModel();
            $employee_ui_access->user_id = $user->id;
            $employee_ui_access->employee_id = $employee->id;
            $employee_ui_access->is_customer_walking = $request->has("is_customer_walking");
            $employee_ui_access->is_employee_registration = $request->has("is_employee_registration");
            $employee_ui_access->is_view_customer_data = $request->has("is_view_customer_data");
            $employee_ui_access->is_save_flow = $request->has("is_save_flow");
            $employee_ui_access->is_save_unit = $request->has("is_save_unit");
            $employee_ui_access->save();

            return 'Save Successful';
        }catch (\Exception $e) {

//            return response()->json($e);
//            return $e;
//            'error_detail'=>$e->getMessage();
            return ['error'=>true,'error_msg'=>$e->errorInfo[2]];
        }
    }
}
