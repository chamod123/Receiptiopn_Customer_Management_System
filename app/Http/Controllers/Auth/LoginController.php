<?php

namespace App\Http\Controllers\Auth;

use App\EmployeeModel;
use App\EmployeeUIAccessModel;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/customer_save';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {

        session()->forget('sess_employee_ui_details');
        $user_type = auth()->user()->user_type;

        if ($user_type == 'employee'){
            $emp_ui_data = EmployeeUIAccessModel::where('user_id', '=', auth()->user()->id)
                ->first();
            session()->put('sess_employee_ui_details', $emp_ui_data);


            $this->redirectTo = '/customer_save';
            return $this->redirectTo;
        }else{
            $this->redirectTo = '/customer_save';
            return $this->redirectTo;
        }






//        $redirectTo = '/customer_save';
    }
}
