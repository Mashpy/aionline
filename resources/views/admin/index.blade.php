@extends('layouts.master')
@section('content')
  <a href="{{ route('admin_tutorial.index') }}">Tutorials Lists</a><br>
  <a href="{{ route('admin_quiz_topic.index') }}">Topics Lists</a><br>
  <a href="{{route('admin_ai_software_category.index')}}">Ai Software Category</a><br>
  <a href="{{ route('admin_ai_software.index') }}">Ai Software</a>
@endsection