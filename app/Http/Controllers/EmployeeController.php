<?php

namespace App\Http\Controllers;

use App\EmployeeModel;
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

        return 'Save Successful';
    }
}
