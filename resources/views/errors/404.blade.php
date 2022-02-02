@extends('errors::illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('image')
<div style="background-image:url({{url('images/Error/Error404.jpg')}})" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection
@section('message', __('Not Found'))
