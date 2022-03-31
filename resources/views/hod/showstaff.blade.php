@extends('hod.home')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function() {
        $('.deluser').click(function(e) {

            if (confirm("Are you sure you want to delete this?")) {
                var cid = $(this).attr("cid");
                $.ajax({
                    url: "users/" + cid,
                    type: 'delete',
                    data: {
                        _token: '{{csrf_token()}}',
                        cid: cid
                    },
                    success: function(response) {

                        $("#mytable").load(location.href + " #mytable");
                        location.reload();
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>
<div class="jumbotron container">
  <h1 class="text-center mt-3 mb-3"> Staff Deatils </h1>
  @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div>
    @endif
  <table class="table table-bordered table-hover">
  <a href="/creatstaff" align="center" class="btn btn-warning">Add Staff </a>
  <br><br>
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Fullname</th>
          <th scope="col">Username </th>
          <th scope="col"> Email</th>
          <th scope="col"> Mobile</th>
          <th scope="col"> Actions</th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($deptdata as $cat)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->username}}</td>
            <td>{{$cat->email}}</td>
            <td>{{$cat->contact_number}}</td>
            <td><a href="/viewstaff/{{$cat->id}}" class="btn btn-info ">View</a>&nbsp;
                <a href="javascript:void(0)" cid="{{$cat->id}}" class="btn btn-danger ml-2 deluser">Delete</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 