@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <h1>{{ $title }}</h1>
    <a href="{{ route('users.add') }}" class="btn btn-primary">Them nguoi dung</a>
    <hr>

    <form action="" method="GET" class="mb-3">
        <div class="row">
            <div class="col-3">
                <select name="status" id="status" class="form-control">
                    <option value="0">Trang thai</option>
                    <option value="active" {{ request()->status == 'active' ? 'selected' : '' }}>Kich hoat</option>
                    <option value="inactive" {{ request()->status == 'inactive' ? 'selected' : '' }}>Chua kich hoat</option>
                </select>
            </div>

            <div class="col-3">
                <select name="group_id" id="" class="form-control">
                    <option value="0">Tat ca nhom</option>
                    @if (!empty(getAllGroups()))
                        @foreach (getAllGroups() as $item)
                            <option value="{{ $item->id }}" {{ request()->group_id == $item->id ? 'selected' : false }}>
                                {{ $item->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-4">
                <input type="search" name="keywords" id="" class="form-control" placeholder="Search"
                    value="{{ request('keywords') }}">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-blok">Tim kiem</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th><a href="?sort-by=fullname&sort-type={{$sortType}}">Name</a></th>
                <th><a href="?sort-by=email&sort-type={{$sortType}}">Email</a></th>
                <th>Nhom</th>
                <th>Trang thai</th>
                <th><a href="?sort-by=create_at&sort-type={{$sortType}}">Time</a></th>
                <th class="width:5%;">Edit</th>
                <th class="width:5%;">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($userList))
                @foreach ($userList as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->group_name }}</td>
                        <td>
                            @if ($item->status == 0)
                                <button class="btn btn-danger btn-sm">Chua kich hoat</button>
                            @else
                                <button class="btn btn-success btn-sm">Kich hoat</button>
                            @endif
                        </td>

                        <td>{{ $item->create_at }}</td>
                        <td><a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a onclick="return comfirm('Ban co chac ko')" href="{{ route('users.delete', $item->id) }}"
                                class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No user</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
