@extends('layouts.frontend.master')
@section('contend')
<x-category-choice></x-category-choice>
<x-shipping></x-shipping>
<x-post-choice></x-post-choice>
@include('frontend.product._list', ['products' =>$products])

@endsection