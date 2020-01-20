@extends('layouts.master')
@section('content')
  <a href="{{ route('admin_tutorial.index') }}">Tutorials Lists</a><br>
  <a href="{{ route('admin_quiz_topic.index') }}">Topics Lists</a><br>
  <a href="">Alternative Software Category</a><br>
  <a href="{{ route('admin_ai_software.index') }}">Alternative Software</a>
@endsection