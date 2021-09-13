@extends('layouts.app')

@section('content')

    <style></style>
    <div class="container">
        <h3>View Customer's Data </h3>

        <br>

        <div class="row col-md-12">
            <div class="row col-md-6">
                <label class="col-md-3">From Date</label>
                <input type="date" class="col-md-8 form-control" id="from_date" name="to_date" placeholder="From Date">
            </div>
            <div class="row col-md-6">
                <label class="col-md-3">To Date</label>
                <input type="date" class="col-md-8 form-control" id="from_date" name="to_date" placeholder="From Date">
            </div>

        </div>
        <br>
        <br>

        <div class="row col-md-12">
            <table style="width: 100%;  border: 1px solid black;">
               <thead>
               <tr style="border: 1px solid black;">
                   <th style="border: 1px solid black;"></th>
                   <th style="border: 1px solid black;background-color: #81cdee">Date Time</th>
                   <th style="border: 1px solid black;background-color: #81cdee">NIC</th>
                   <th style="border: 1px solid black;background-color: #81cdee">Number Of Walking</th>
                   <th style="border: 1px solid black;background-color: #81cdee">Floor</th>
                   <th style="border: 1px solid black;background-color: #81cdee">Section</th>
               </tr>
               </thead>
                <tbody>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">1</td>
                    <td style="border: 1px solid black;">Date Time</td>
                    <td style="border: 1px solid black;">NIC</td>
                    <td style="border: 1px solid black;">Number Of Walking</td>
                    <td style="border: 1px solid black;">Floor</td>
                    <td style="border: 1px solid black;">Section</td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('footerScript')
    <script type="text/javascript">

    </script>
@endsection


