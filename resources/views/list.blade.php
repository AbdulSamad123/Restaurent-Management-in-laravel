@extends('layout')

@section('content')
<h1>List page is here</h1>
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Address</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->address}}</td>
      <td>
        <a href="/delete/{{$item->id}}"><i class="bi-trash"></i></a>
        <a href="/edit/{{$item->id}}"><i class="bi-pen"></i></a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

@stop