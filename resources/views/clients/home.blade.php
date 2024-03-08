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

    @include('clients.contents.slide')
    @include('clients.contents.about')
    @env('production')
        <p>Moi truong Production</p>
        @elseenv('test')
        <p>Moi truong test</p>
        @else
        <p>Moi truong dev</p>
    @endenv
    <x-alert type="info" :content="$message" data-icon="youtube"/>
    <p><img src="https://bs.uenicdn.com/blog/wp-content/uploads/2018/04/giphy.gif" alt="tym"></p>
    <p><a href="{{route('download-image').'?image=' .public_path('storage/bg.jpg')}}" class="btn btn-primary">Download image</a></p>

    <p><a href="{{route('download-doc').'?file=' .public_path('storage/Cv_TuongNhat_backend_PNV25B.pdf')}}" class="btn btn-primary">Download doc</a></p>




    {{-- <x-button /> --}}
    {{-- <x-inputs.button /> --}}
    {{-- <x-forms-button /> --}}
    {{-- <x-forms.button /> --}}
@endsection

@section('css')
    <style>
        img{
            max-width: 100%;
            height: auto
        }
    </style>
@endsection

@section('js')

@endsection

