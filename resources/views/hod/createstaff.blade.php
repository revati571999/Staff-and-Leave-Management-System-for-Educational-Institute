@extends('hod.home')
@section('content')

<div class="container jumbotron">
<h2>Add Staff</h2>
<br>
<form method="post" action="/poststaff" enctype="multipart/form-data">
    
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success  text-success">{{Session::get('success')}}</div>
    @endif
    <div class="form-group">
          <label> Name </label>
          <input type="text" class="form-control" name="name" />
          @if($errors->has('name'))
          <div class="alert alert-danger">{{$errors->first('name')}}</div>
          @endif
      </div>
    
      <div class="form-group">
          <label>Username </label>
          <input  type="text" class="form-control " name="username" />  
          @if($errors->has('username'))
          <div class="alert alert-danger">{{$errors->first('username')}}</div>
          @endif
      </div>

      <div class="form-group">
          <label>Email </label>
          <input  type="email" class="form-control " name="email" />  
          @if($errors->has('email'))
          <div class="alert alert-danger">{{$errors->first('email')}}</div>
          @endif
      </div>

      <div class="form-group">
          <label>Password </label>
          <input  type="password" class="form-control " name="password" />  
          @if($errors->has('password'))
          <div class="alert alert-danger">{{$errors->first('password')}}</div>
          @endif
      </div>

      <div class="form-group">
          <label>Contact Number </label>
          <input  type="text" class="form-control " name="contactnumber" />  
          @if($errors->has('contactnumber'))
          <div class="alert alert-danger">{{$errors->first('contactnumber')}}</div>
          @endif
      </div>


      <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role">
            <option value="2">Staff</option>
          </select>
            @if($errors->has('role')) <div class="alert alert-danger">{{$errors->first('role')}}</div>
          @endif
        </div>

        <div class="form-group">
          <label>Department</label>
          <select class="form-control" name="department">
            @foreach($deptdata as $catname)
              <option value="{{$catname->id}}">{{$catname->dept_name}}</option>
            @endforeach
          </select>
            @if($errors->has('department')) <div class="alert alert-danger">{{$errors->first('department')}}</div>
          @endif
        </div>

        <div class="form-group">
          <label>Image </label>
          <input  type="file" class="form-control " name="image" />  
          @if($errors->has('image'))
          <div class="alert alert-danger">{{$errors->first('image')}}</div>
          @endif
      </div>

        

      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
</div>
@endsection