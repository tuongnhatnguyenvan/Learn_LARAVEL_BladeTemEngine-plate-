@extends('layouts.client')
@section('title')
    {{$title}}
@endsection
@section('sidebar')
    @parent
    <h3>Products sidebar</h3>
@endsection
@section('content')
<h1>San  pham</h1>
@endsection

@section('css')

@endsection

{{-- @section('js')
    document.querySelector('.show').onclick = function(){
        alert('Thanh cong');
    }
@endsection --}}

@section('js')
    <script>
    </script>
@endsection