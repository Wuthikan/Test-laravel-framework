@extends('hello.layouts.main')

@section('page_title','Hello Page')

@section('content')
	
	<h1>{{ $title }}</h1>
	<p>{{ $subtitle }}</p>
@stop