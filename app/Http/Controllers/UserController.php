<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $users;
    const _PER_PAGE = 3;
    public function __construct()
    {
        $this->users = new Users();
    }

    public function index(UserRequest $request)
    {
        // $statement = $this->users->statementUser('DELETE FROM users');
        // $statement = $this->users->statementUser('SELECT * FROM users');
        // dd($statement);

        $title = 'Danh sách người dùng';
        // $this->users->learnQueryBuilder();
        $users = new Users();
        $filters = [];
        $keyWord = null;

        if (!empty($request->status)) {
            $status = $request->status;
            if ($status == 'active') {
                $status = 1;
            } else if ($status == 'inactive') {
                $status = 0;
            }

            $filters[] = ['users.status', '=', $status];
        }

        if (!empty($request->group_id)) {
            $groupId = $request->group_id;

            $filters[] = ['users.group_id', '=', $groupId];
        }

        if (!empty($request->keywords)) {
            $keyWord = $request->keywords;
        }

        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $allowSort = ['DESC', 'ASC'];

        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType == 'DESC') {
                $sortType = 'ASC';
            } else {
                $sortType = 'DESC';
            }
        } else {
            $sortType = 'ASC';
        }

        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType,
        ];

        $userList = $this->users->getAllUsers($filters, $keyWord, $sortArr, self::_PER_PAGE);
        return view('clients.users.lists', compact('title', 'userList', 'sortType'));
    }

    public function add()
    {
        $title = 'Thêm người dùng';
        $allGroups  = getAllGroups();
        return view('clients.users.add', compact('title', 'allGroups'));
    }

    public function postAdd(Request $request)
    {

        $dataInsert = [
            // $request->fullname,
            // $request->email,
            // date('Y-m-d H:i:s')
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'create_at' => date('Y-m-d H:i:s'),
        ];
        $this->users->addUser($dataInsert);
        return redirect(route('users.index'))->with('msg', 'Them thanh cong');
    }

    public function getEdit(Request $request, $id)
    {
        $title = 'Cap nhat thông tin người dùng';
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail)) {
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('users.index')->with('msg', 'Nguoi dung khong ton tai');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Lien ket khong ton tai');
        }
        $allGroups  = getAllGroups();

        return view('clients.users.edit', compact('title', 'userDetail', 'allGroups'));
    }

    public function postEdit(UserRequest $request)
    {
        $id = $request->session()->get('id');

        if (empty($id)) {
            return back()->with('msg', 'Nguoi dung khong ton tai');
        }

        $dataUpdate = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'update_at' => date('Y-m-d H:i:s'),
        ];

        $this->users->updateUser($dataUpdate, $id);

        return back()->with('msg', 'Cap nhat nguoi dung      thanh cong');
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail)) {
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'Xoa thanh cong';
                } else {
                    $msg = 'Ban ko the xoa nguoi dung nay';
                }
            } else {
                $msg = 'Nguoi dung khong ton tai';
            }
        } else {
            $msg = 'Lien ket khong ton tai';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}
