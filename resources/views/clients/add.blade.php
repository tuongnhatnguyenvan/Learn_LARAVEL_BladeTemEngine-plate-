@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Them san pham</h1>
    <form action="" method="POST">
       @error('msg')
           <div class="alert alert-danger text-center">{{$message}}</div>
       @enderror
        <div class="mb-3">
            <label for="">Ten san pham</label>
            <input type="text" name="product_name" placeholder="Ten san pham..." value="{{old('product_name')}}" id="" class="form-control">
            @error('product_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Gia san pham</label>
            <input type="text" name="product_price" placeholder="Gia san pham..." value="{{old('product_price')}}" id="" class="form-control">
            @error('product_price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Them moi</button>
        @csrf
    </form>
@endsection

@section('css')

@endsection

@section('js')

@endsection