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


            $user = new User();
            $user->user_type = 'employee';
            $user->first_name = $request->get("employee_name");
            $user->last_name = '';
            $user->email = $request->get("email");
            $user->mobile_no = $request->get("mobile");
            $user->password = Hash::make($request->get("password"));
            $user->save();

            $employee = new EmployeeModel();
            $employee->employee_name = $request->get("employee_name");
            $employee->employee_code = $request->get("employee_code");
            $employee->mobile = $request->get("mobile");
            $employee->email = $request->get("email");
            $employee->password = $request->get("password");
            $employee->user_id = $user->id;
            $employee->save();

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


    public function employee_list(){
        $employs = EmployeeModel::all();

        return view('employee.employee_list',[
            'employs' => $employs
        ]);
    }

    public function employee_edit_view($id){

        $employee = EmployeeModel::find($id);
        $employee_ui_acces = EmployeeUIAccessModel::where('employee_id','=',$id)->first();

//        return $employee_ui_acces;

        return view('employee.edit_employee',[
            'employee' => $employee,
            'employee_ui_acces' => $employee_ui_acces,
        ]);
    }


    public function edit_employee(Request $request)
    {
        try {



            $employee = EmployeeModel::find($request->get("employee_id"));
            $employee->employee_name = $request->get("employee_name");
            $employee->employee_code = $request->get("employee_code");
            $employee->mobile = $request->get("mobile");
            $employee->email = $request->get("email");

            if ($request->password != '' && $request->password != null) {
                $employee->password = $request->get("password");
            }

            $employee->save();

            $employee_ui_access = EmployeeUIAccessModel::where('employee_id','=',$request->get("employee_id"))->first();
            $employee_ui_access->is_customer_walking = $request->has("is_customer_walking");
            $employee_ui_access->is_employee_registration = $request->has("is_employee_registration");
            $employee_ui_access->is_view_customer_data = $request->has("is_view_customer_data");
            $employee_ui_access->is_save_flow = $request->has("is_save_flow");
            $employee_ui_access->is_save_unit = $request->has("is_save_unit");
            $employee_ui_access->save();

            $user = User::find($employee_ui_access->user_id);
            $user->first_name = $request->employee_name;
            $user->mobile_no = $request->mobile;
            $user->email = $request->email;
            if ($request->password != '' && $request->password != null) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return 'Save Successful';
        }catch (\Exception $e) {

//            return response()->json($e);
//            return $e;
//            'error_detail'=>$e->getMessage();
            return ['error'=>true,'error_msg'=>$e->errorInfo[2]];
        }
    }

}
