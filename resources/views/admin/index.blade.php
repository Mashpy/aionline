@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-2 text-center dashboard-title">AI ONLINE COURSE</h1>
      <h1 class="display-4 text-center">Welcome To Admin Panel</h1>
      <hr class="my-4">
      <h3 >Hello, Admin({{Auth()->user()->name}})!</h3>
      <p class="lead"></p>
    </div>
  </div>
@endsection