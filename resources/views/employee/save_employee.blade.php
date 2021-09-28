@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-6">
            <h3>Register New Employee</h3>
        </div>

    </div>

    <form id="FormId" action="#" method="post">
    <div class="row">

        <div class="col-md-1">

        </div>
        <div class="col-md-6" style="border: solid 1px blue; border-radius: 5px;margin: 5px">
            <div style=" margin: 20px">
                <h4>Employee Details</h4>

                <br>

                    {{--<div class="row" style="margin-top: 10px">--}}
                    {{--<label class="col-md-3">Customer Name</label>--}}
                    {{--<input class="col-md-8" id="cus_name" name="cus_name" placeholder="Customer Name" required>--}}
                    {{--</div>--}}
                    {{csrf_field()}}
                    <div class="row" style="margin-top: 10px">
                        <label class="col-md-3">Employee Name</label>
                        <input class="col-md-8" id="employee_name" name="employee_name" placeholder="Employee Name">
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <label class="col-md-3">Employee Code</label>
                        <input class="col-md-8" id="employee_code" name="employee_code" placeholder="Employee Code" required>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <label class="col-md-3">Mobile Number</label>
                        <input class="col-md-8" id="mobile" name="mobile" placeholder="Mobile Number" required>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <label class="col-md-3">Email</label>
                        <input class="col-md-8" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <label class="col-md-3">Password</label>
                        <input class="col-md-8" id="password" name="password" placeholder="Password" required>
                    </div>

            </div>
        </div>


        <div class="col-md-4" style="border: solid 1px blue; border-radius: 5px;margin: 5px">
            <div style=" margin: 20px">
                <h4>Employee Access</h4>

                <br>
                    {{csrf_field()}}
                    <div class="row" style="margin-top: 10px">
                        <label class="col-md-3">All Access</label>
                        <input onclick="select_all_access()" type="checkbox" class="col-md-1" style="height: 15px" id="all_access" name="all_access">

                    </div>
                    <div class="row" style="margin-top: 10px">
                        <input type="checkbox" checked class="col-md-1" style="height: 15px" id="is_customer_walking" name="is_customer_walking">
                        <label class="col-md-11">Customer Walking</label>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <input type="checkbox" class="col-md-1" style="height: 15px" id="is_employee_registration" name="is_employee_registration">
                        <label class="col-md-11">Employee Registration</label>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <input type="checkbox" class="col-md-1" style="height: 15px" id="is_view_customer_data" name="is_view_customer_data">
                        <label class="col-md-11">View Customer Data</label>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <input type="checkbox" class="col-md-1" style="height: 15px" id="is_save_flow" name="is_save_flow">
                        <label class="col-md-11">Save Flow</label>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <input type="checkbox" class="col-md-1" style="height: 15px" id="is_save_unit" name="is_save_unit">
                        <label class="col-md-11">Save Unit</label>
                    </div>

            </div>
        </div>
        {{--<div class="col-md-1">--}}

        {{--</div>--}}

    </div>

    </form>

    <div class="row" style="margin-top: 10px">
        <div class="col-md-1">

        </div>
        <div class="row" style="margin-top: 10px">
            <a onclick="save_customer_walking()" class="btn btn-success" style="width: 150px">Save Details</a>
        </div>
        <div class="col-md-1">

        </div>
    </div>

@endsection

@section('footerScript')
    <script type="text/javascript">
        
        function select_all_access() {
            if($("#all_access").prop('checked') == true){
                $( "#is_customer_walking").prop('checked', true);
                $( "#is_employee_registration").prop('checked', true);
                $( "#is_view_customer_data").prop('checked', true);
                $( "#is_save_flow").prop('checked', true);
                $( "#is_save_unit").prop('checked', true);
            }else{
                $( "#is_employee_registration").prop('checked', false);
                $( "#is_view_customer_data").prop('checked', false);
                $( "#is_save_flow").prop('checked', false);
                $( "#is_save_unit").prop('checked', false);
            }
        }
        

        function save_customer_walking() {
            // e.preventDefault();
            var validFunction = true;

            if ($('#employee_name').val() == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Employee Name Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                return;
            }

            if ($('#employee_code').val() == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Employee Code Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                return;
            }

            if ($('#mobile').val() == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Mobile Number Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                return;
            }

            if ($('#email').val() == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Email Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                return;
            }

            if ($('#password').val() == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Password Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                return;
            }


            if (validFunction) {
                // var form_data = $("#FormId").serialize();
                // form_data.push({name: 'all_access', value: $("#all_access").is});

                $.ajax({
                    url: '/save/employee_data',
                    type: 'post',
                    data:  $("#FormId").serialize(),
                    success: function (data) {
                        // console.log(data);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Employee Saved Successful!',
                            showConfirmButton: false,
                            timer: 4200
                        }).then(
                            // location.reload()
                        )

                    },
                    error: function () {
                    }
                });
            }
        }


    </script>
@endsection


