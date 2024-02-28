<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data = [];

    public function index()
    {
        $this->data['welcom'] = 'Hoc lap trinh tai Youtube';
        $this->data['content'] = '<h3>Chuonng 1 nhap mon Laravel</h3>
        <p>Kien thuc 1</p>
        <p>Kien thuc 1</p> 
        <p>Kien thuc 1</p>';
        $this->data['index'] = 1;
        $this->data['dataArr'] = [
            // 'item1',
            // 'item2',
            // 'item3',
        ];
        $this->data['number'] = 9;
        $this->data['message'] = 'Dat Hang thanh cong';
        return view('home', $this->data);
    }
}
