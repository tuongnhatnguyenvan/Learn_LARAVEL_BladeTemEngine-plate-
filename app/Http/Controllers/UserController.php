<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }

    public function index()
    {
        $title = 'Danh sách người dùng';
        $users = new Users();
        $userList = $this->users->getAllUsers();
        return view('clients.users.lists', compact('title', 'userList'));
    }

    public function add()
    {
        $title = 'Thêm người dùng';
        return view('clients.users.add', compact('title'));
    }

    public function postAdd(Request $request)
    {
        $request->validate(
            [
                'fullname' => 'required|min:5',
                'email' => 'required|email|unique:users',
            ],
            [
                'fullname.required' => 'Ho va ten bat buoc phai nhap',
                'fullname.min' => 'Ho va ten phai lon hon 5 ki tu',
                'email.required' => 'Email bat buoc phai nhap',
                'email.email' => 'Email khong dung dinh dang',
                'email.unique' => 'Email da ton tai'
            ]
        );

        $dataInsert = [
            $request->fullname,
            $request->email,
                date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);
        return redirect(route('users.index'))->with('msg', 'Them thanh cong');
    }
}
