@extends('staff.home')
@section('content')

<div class="container jumbotron">
<h2>Add Leave</h2>
<br>
<form method="post" action="/postleave" >
    
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success  text-success">{{Session::get('success')}}</div>
    @endif

    <div class="form-group">
          <label> Leave From Date </label>
          <input type="date" class="form-control" name="leavefromdate" />
          @if($errors->has('leavefromdate'))
          <div class="alert alert-danger">{{$errors->first('leavefromdate')}}</div>
          @endif
      </div>
    
    <div class="form-group">
          <label> Leave To Date </label>
          <input type="date" class="form-control" name="leavetodate" />
          @if($errors->has('leavetodate'))
          <div class="alert alert-danger">{{$errors->first('leavetodate')}}</div>
          @endif
      </div>

      <div class="form-group">
          <label> Reason </label>
          <input type="text" class="form-control" name="reason" />
          @if($errors->has('reason'))
          <div class="alert alert-danger">{{$errors->first('reason')}}</div>
          @endif
      </div>


      

        

      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
</div>
@endsection