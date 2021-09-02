@extends('layout')

@section('content')
<div>
<h1>User Registration is here</h1>
<div class="col-sm-8">
<form method="post" action="register">
  @csrf  
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="enter name">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email">
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

@stop