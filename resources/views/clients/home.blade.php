@extends('layouts.client')
@section('title')
    {{$title}}
@endsection
@section('sidebar')
    {{-- @parent --}}
    <h3>Home sidebar</h3>
@endsection
@section('content')
<h1>Trang chu</h1>
    <button type="button" class="show">Show</button>
@endsection

{{-- @section('css')
    header{
        background-color: blue;
        color: white;
    }
@endsection --}}
@section('css')
    <style>
        header{
        background-color: blue;
        color: white;
    }
    </style>
@endsection

{{-- @section('js')
    document.querySelector('.show').onclick = function(){
        alert('Thanh cong');
    }
@endsection --}}

@section('js')
    <script>
        document.querySelector('.show').onclick = function(){
        alert('Thanh cong');
    }
    </script>
@endsection