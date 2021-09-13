@extends('layouts.app')

@section('content')

    <style></style>
    <div class="container">
        <h3>View Customer's Data </h3>

        <br>
        <form>
            <div class="row col-md-12">
                <div class="row col-md-6">
                    <label class="col-md-3">From Date</label>
                    <input type="date" class="col-md-8 form-control" id="from_date" name="from_date"
                           placeholder="From Date" required value="{{$from_date}}">
                </div>
                <div class="row col-md-6">
                    <label class="col-md-3">To Date</label>
                    <input type="date" class="col-md-8 form-control" id="to_date" name="to_date" placeholder="To Date"
                           required value="{{$to_date}}">
                </div>
                <div class="col-md-6 row">
                    <button name="submit" class="btn btn-success" formaction="/view_customer_walking"
                            style="width: 100px">View
                    </button>
                </div>
            </div>
        </form>
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
                @if(isset($report_data))
                    <?php
                    $i = 0;
                    ?>
                    @foreach($report_data as $rep_data)
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black;">{{++$i}}</td>
                            <td style="border: 1px solid black;">{{$rep_data->created_at}}</td>
                            <td style="border: 1px solid black;">{{$rep_data->nic}}</td>
                            <td style="border: 1px solid black;">{{$rep_data->no_of_walking}}</td>
                            <td style="border: 1px solid black;">{{$rep_data->floor->floor_name}}</td>
                            <td style="border: 1px solid black;">{{$rep_data->floor_units->unit_name}}</td>
                        </tr>
                    @endforeach
                @endif


                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('footerScript')
    <script type="text/javascript">

    </script>
@endsection


