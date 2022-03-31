@extends('staff.home')
@section('content')





<div class="container mt-5 ">
    <div class="container-fluid">
        <div class="card bg text-dark">
            <div class="card-header row">


                <div class="card-body">


                    <table class="table" id="example1" align="center">
                        <thead>
                            <tr>

                                <th scope="col">Leave Details</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>Leave From Date</th>
                                <td>{{$leavedeatils->leave_from_date}}</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <th>Leave To Date</th>
                                <td>{{$leavedeatils->leave_to_date}}</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <th>Reason</th>
                                <td>{{$leavedeatils->reason}}</td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <th>Status</th>
                                <td>{{$leavedeatils->status}}</td>
                            </tr>




                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection