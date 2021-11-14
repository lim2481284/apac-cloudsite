@extends('errors.layout')

@section('code', '429 😵')

@section('title', 'Too Many Request')

@section('image')

<div style="background-image: url('/img/picture/429.png');" class="absolute pin  md:bg-left lg:bg-center">
</div>

@endsection

@section('message', 'Wow steady steady. Your action are too frequent, please try again later.')