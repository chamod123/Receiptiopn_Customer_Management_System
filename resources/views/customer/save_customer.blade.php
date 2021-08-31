@extends('layouts.app')

@section('content')
    <div class="container">
      <h3>Save Customer</h3>

        <br>
        <div >
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">Customer Name</label>
                <input class="col-md-8" id="cus_name" name="cus_name" placeholder="Customer Name">
            </div>
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">NIC</label>
                <input class="col-md-8" id="nic" name="nic" placeholder="NIC">
            </div>
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">Contact Number</label>
                <input class="col-md-8" id="mobile" name="mobile" placeholder="Contact Number">
            </div>
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">Flour</label>
                <input class="col-md-8" id="flour" name="flour" placeholder="Flour">
            </div>
            <div class="row" style="margin-top: 10px">
                <label class="col-md-3">Number Of Walking</label>
                <input class="col-md-8" id="no_of_walking" name="no_of_walking" placeholder="Number Of Walking">
            </div>
        </div>
    </div>
@endsection


