<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data = [];

    public function index()
    {
        $this->data['title'] = 'Dao tao lap trinh web';
        return view('clients/home', $this->data);
    }

    public function products(){
        $this->data['title'] = 'San pham';
        return view('clients/products', $this->data);
    }
}
