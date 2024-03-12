@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            Du lieu nhap vao khong hop le. Vui long kiem tra lai
        </div>
    @endif

    <h1>{{ $title }}</h1>
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">Ho va ten</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Ho va ten" value="{{ old('fullname') }}">
            @error('fullname')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-warning">Quay lai</a>
    </form>
@endsection
