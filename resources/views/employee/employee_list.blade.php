@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-5">
                <h3>Employee List</h3>
            </div>
            <div class="col-md-6" style="display: flex; justify-content: flex-end">
                <a class="btn btn-success" style="color: white" href="/employee_save">Add New Employee</a>
            </div>

        </div>
        <br>

        <div class=" col-md-12">
            <table style="width: 100%;  border: 1px solid black;" class="table" id="table">
                <thead>
                <tr style="border: 1px solid black;">
                    <th style="border: 1px solid black;"></th>
                    <th style="border: 1px solid black;background-color: #81cdee">Employee Code</th>
                    <th style="border: 1px solid black;background-color: #81cdee">Name</th>
                    <th style="border: 1px solid black;background-color: #81cdee">Mobile No.</th>
                    <th style="border: 1px solid black;background-color: #81cdee">Email</th>
                    <th style="border: 1px solid black;background-color: #81cdee"></th>
                </tr>
                </thead>
                <tbody>
                @if(isset($employs))
                    <?php
                    $i = 0;
                    ?>
                    @foreach($employs as $employee)
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black;">{{++$i}}</td>
                            <td style="border: 1px solid black;">{{$employee->employee_code}}</td>
                            <td style="border: 1px solid black;">{{$employee->employee_name}}</td>
                            <td style="border: 1px solid black;">{{$employee->mobile}}</td>
                            <td style="border: 1px solid black;">{{$employee->email}}</td>
                            <td style="border: 1px solid black;">
                                <a class="btn btn-warning" title="Edit User!" href="/user/edit/{{$employee->id}}/view">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                @if($employee->status == 1)
                                    <a hidden class="btn btn-danger" title="Disable User!" href="#">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @else
                                    <a hidden class="btn btn-success" title="Enable User!" href="#">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif


                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('footerScript')
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>

    <script>
        $('#nav_user').addClass('active');
    </script>
@endsection


