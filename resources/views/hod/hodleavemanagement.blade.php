@extends('hod.home')
@section('content')
<div class="jumbotron container">
  <h1 class="text-center mt-3 mb-3"> Staff Leave Deatils </h1>
  @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div>
    @endif
  <table class="table table-bordered table-hover">
  
  <br><br>
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Leave From Date</th>
          <th scope="col">Leave To Date </th>
          <th scope="col"> Reason</th>
          <th scope="col"> Status</th>
          <!-- <th scope="col"> UserName</th> -->
          <th scope="col"> Action</th>
      </tr>
  </thead>
  @php 
       $sn=1;
      @endphp
      @foreach($hodleavedata as $cat)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$cat->leave_from_date}}</td>
            <td>{{$cat->leave_to_date}}</td>
            <td>{{$cat->reason}}</td>
            <td>{{$cat->status}}</td>
            <!-- <td>{{$cat->user_id}}</td> -->
            <td><a href="/editleave/{{$cat->id}}" class="btn btn-primary">Edit</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 