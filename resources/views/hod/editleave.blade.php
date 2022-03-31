@extends('hod.home')
@section('content')

<div class="container jumbotron">
<h2>Edit Staff Leave</h2>
<br>
<form method="post" action="/postedithodleave/{{$editleavedata->id}}" >
    
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success  text-success">{{Session::get('success')}}</div>
    @endif

    
      <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status">
            
              <option value="approved">Approved</option>
              <option value="rejected">Rejected</option>
            
          </select>
            @if($errors->has('status')) <div class="alert alert-danger">{{$errors->first('status')}}</div>
          @endif
        </div>
    


      

        

      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
</div>
@endsection