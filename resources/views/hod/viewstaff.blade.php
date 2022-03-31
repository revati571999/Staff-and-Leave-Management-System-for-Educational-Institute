@extends('hod.home')
@section('content')





    <div class="container mt-5 ">
        <div class="container-fluid">
            <div class="card bg text-dark">
                <div class="card-header row">


                    <div class="card-body">


                        <table class="table" id="example1" align="center">
                            <thead>
                                <tr>

                                    <th scope="col">{{$staffdetail->name}}'s Details</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th>staff Name</th>
                                    <td>{{$staffdetail->name}}</td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <th>Staff Username</th>
                                    <td>{{$staffdetail->username}}</td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <th>staff Email</th>
                                    <td>{{$staffdetail->email}}</td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <th>Contact Number</th>
                                    <td>{{$staffdetail->contact_number}}</td>
                                </tr>




                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection