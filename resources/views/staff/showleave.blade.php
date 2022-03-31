@extends('staff.home')
@section('content')
<div class="jumbotron container">
  <h1 class="text-center mt-3 mb-3"> Leaves Deatils </h1>
  @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div>
    @endif
  <table class="table table-bordered table-hover">
  <a href="/createleave" align="center" class="btn btn-warning">Add Leave </a>
  <br><br>
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">From_Date</th>
          <th scope="col">To_Date </th>
          <th scope="col"> Reson</th>
          <th scope="col"> Status</th>
          <th scope="col"> Actions</th>
      </tr>
  </thead>
  @php 
       $sn=1;
      @endphp
      @foreach($leavedata as $cat)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$cat->leave_from_date}}</td>
            <td>{{$cat->leave_to_date}}</td>
            <td>{{$cat->reason}}</td>
            <td>{{$cat->status}}</td>
            <td><a href="/showleavedeatils/{{$cat->id}}" class="btn btn-primary">View</a>&nbsp;</td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 