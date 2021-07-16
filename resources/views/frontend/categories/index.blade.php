@extends('layouts.frontend.master')
@section('page_title', $category->title ?? $category->name)
@section('meta_desc', $category->desc ?? $category->name)
@section('meta_keyword', $category->keyword ?? $category->name)

@section('contend')

	@include('frontend.product._list', [
		'category' => $category,
		'productPaginate' => $productPaginate
	])
	<x-shipping></x-shipping>


@endsection