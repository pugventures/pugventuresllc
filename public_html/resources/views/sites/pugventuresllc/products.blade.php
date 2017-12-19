<!-- Stored in resources/views/child.blade.php -->

@extends('sites.pugventuresllc.master')

@section('title', 'Dashboard - Pug Ventures, LLC')

@section('content')
    @foreach($products as $product)
        {{ print_r($product) }}
    @endforeach
@endsection