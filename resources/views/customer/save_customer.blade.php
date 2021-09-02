@extends('layouts.app')

@section('content')
    <div class="container">
      <h3>Save Customer Walking</h3>

        <br>
        <form id="FormId" action="#"  method="post">
            {{--<div class="row" style="margin-top: 10px">--}}
                {{--<label class="col-md-3">Customer Name</label>--}}
                {{--<input class="col-md-8" id="cus_name" name="cus_name" placeholder="Customer Name" required>--}}
            {{--</div>--}}
            {{csrf_field()}}
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">NIC</label>
                <input class="col-md-8" id="nic" name="nic" placeholder="NIC">
            </div>
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">Contact Number</label>
                <input class="col-md-8" id="mobile" name="mobile" placeholder="Contact Number" required>
            </div>
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">Number Of Walking</label>
                <input class="col-md-8" id="no_of_walking" name="no_of_walking" placeholder="Number Of Walking" required>
            </div>
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">Floor</label>
                <div class="col-md-8 row" id="floor_dev" name="floor_dev">
                    @foreach($floors as $floor)
                        <label style="border: #27cf1a 1px solid;margin: 20px;border-radius: 10px">
                            <input type="radio" class="radio" value="{{$floor->id}}" name="floor" id="floor" style="margin: 5px"  onclick="load_floor_units({{$floor->id}})" required/>
                            <span style="margin: 15px">{{$floor->floor_name}}</span>
                        </label>
                        {{--<a class="btn btn-success" style="width: 100px; margin: 10px;color: white" onclick="load_floor_units({{$floor->id}})">{{$floor->floor_name}}</a>--}}
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3"></label>
                <div class="col-md-8 row" id="floor_units" name="floor_units">

                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <a onclick="save_customer_walking()" class="btn btn-success" style="width: 150px">Save Details</a>
            </div>
        </form>
    </div>
@endsection

@section('footerScript')
    <script type="text/javascript">

        function load_floor_units(floor_id) {

            $.ajax({
                url: '/get_units_by_floor/'+floor_id,
                type: 'get',
                // data: $("#FormId").serialize(),
                success: function (data) {
                    console.log(data);
                    $('#floor_units').html('');
                    for (i = 0; data.length > i; i++) {


                        $('#floor_units').append('' +
                            '' +
                            ' <label style="border: #ff0653 1px solid;margin: 20px;border-radius: 10px">\n' +
                            '                            <input type="radio" class="radio" value="'+data[i].id+'" name="floor_unit" style="margin: 5px" required />\n' +
                            '                            <span style="margin: 15px">'+data[i].unit_name+'</span>\n' +
                            '                        </label>' +
                            '');
                    }


                },
                error: function () {
                }
            });
        }


        function save_customer_walking() {
            // e.preventDefault();
            var validFunction = true;

            if ($('#nic').val() == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'NIC Required!',
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
                    title: 'Mobile Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                return;
            }

            if ($('#no_of_walking').val() == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Walking Number Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                return;
            }


                if (!$("input[name='floor']:checked").val()) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Floor Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                    return;
            }


                if (!$("input[name='floor_unit']:checked").val()) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Floor Unit Required!',
                    showConfirmButton: false,
                    timer: 1200
                })
                validFunction = false;
                    return;
            }

            if (validFunction) {
                $.ajax({
                    url: '/save/customer_data',
                    type: 'post',
                    data: $("#FormId").serialize(),
                    success: function (data) {
                        // console.log(data);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Customer Saved Successful!',
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

