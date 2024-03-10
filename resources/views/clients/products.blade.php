@extends('layouts.client')
@section('title')
    {{$title}}
@endsection
@section('sidebar')
    @parent
    <h3>Products sidebar</h3>
@endsection
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
<h1>San  pham</h1>
<x-package-alert />
@push('scripts')
    <script>
    console.log('Push lan 2');
    </script>
@endpush
@endsection

@section('css')

@endsection

{{-- @section('js')
    document.querySelector('.show').onclick = function(){
        alert('Thanh cong');
    }
@endsection --}}

@section('js')
@endsection

@prepend('scripts')
    <script>
        console.log('prepend lan 1');
    </script>
@endprepend