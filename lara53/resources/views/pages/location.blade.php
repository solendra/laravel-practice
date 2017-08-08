@extends('layouts.layout')
@section('title')
Location
@stop
@section('body')
<div class="container" style="width: 600px; height: 600px;">

{!! Mapper::render() !!}
</div>
@stop