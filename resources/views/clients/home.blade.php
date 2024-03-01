@extends('layouts.client')
@section('title')
    {{$title}}
@endsection
@section('sidebar')
    @parent
    <h3>Home sidebar</h3>
@endsection
@section('content')
    <h1>Trang chu</h1>
    @datetime('2024-03-01 12:00:00')
    @include('clients.contents.slide')
    @include('clients.contents.about')
    @datetime('2024-03-01 00:00:00')
@endsection

@section('css')

@endsection

@section('js')

@endsection

