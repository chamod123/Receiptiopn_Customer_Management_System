@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Register New Employee</h3>

        <br>
        <form id="FormId" action="#" method="post">
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
            <div class="row" style="margin-top: 10px">
                <a onclick="save_customer_walking()" class="btn btn-success" style="width: 150px">Save Details</a>
            </div>


        </form>
    </div>
@endsection

@section('footerScript')
    <script type="text/javascript">

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
                $.ajax({
                    url: '/save/employee_data',
                    type: 'post',
                    data: $("#FormId").serialize(),
                    success: function (data) {
                        // console.log(data);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Employee Saved Successful!',
                            showConfirmButton: false,
                            timer: 4200
                        }).then(
                            location.reload()
                        )

                    },
                    error: function () {
                    }
                });
            }
        }


    </script>
@endsection


