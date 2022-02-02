@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('image')
<div style="background-image:url({{url('images/Error/Error403.jpg')}})" class="

pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection
@section('message', __($exception->getMessage() ?: 'Forbidden'))
