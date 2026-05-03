@extends('layouts.main')

@section('title')
    <title>Home | {{ config('app.name') }}</title>
@endsection

@section('container')
    @include('partials.hero')
    @include('partials.benefits')
    @include('partials.categories')
    @include('partials.products')
@endsection
