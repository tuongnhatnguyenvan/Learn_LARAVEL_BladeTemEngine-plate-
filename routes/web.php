<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', [HomeController::class, 'index'])->name('home');
*/

Route::get('/san-pham', [HomeController::class, 'products'])->name('product');
Route::get('/them-san-pham', [HomeController::class, 'getAdd']);
// Route::post('/them-san-pham', [HomeController::class, 'postAdd']);
Route::put('/them-san-pham', [HomeController::class, 'putAdd']);
Route::get('/demo-response2', function (Request $request) {
    return $request->cookie('Unicode', 'Training PHP');
});

Route::get('/lay-thong-tin', [HomeController::class, 'getArr']);
Route::get('/demo-response', function () {
    // $content = json_decode(['Item1', 'Item2', 'Item3']);
    // $response = (new Response($content))->header('Content-Type', 'application/json');
    // return $response;
    // $response = (new Response())->cookie('Unicode', 'Trainning PhP');
    // return $response;
    // $contentArr = ['name'=> 'Unicode',
    //                 'version' => '10.x',
    //                 'lesson' => 'HTTP response Laravel'   
    //             ];
    // return response()->json($contentArr, 404)->header("Api-Key",'1234');
    // return view('clients.demo-test');
    return view('clients.demo-test');

})->name('demo-response');

Route::post('/demo-response', function (Request $request) {
    if(!empty($request->username)){
        return back()->withInput()->with('mess', 'Valida thanh cong');
    }
    return redirect(route('demo-response'))->with('mess', 'Valida ko thanh cong');
});