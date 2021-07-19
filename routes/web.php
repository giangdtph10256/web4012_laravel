<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// fake -> 10 records -> categories -> id: 1-10
// products: category_id: random 1-10

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users', function () {
    // Lấy ra toàn bộ các bản ghi trong bảng users
    $listUser = DB::table('users')->get();
    return view('admin/users/index', [
        'data' => $listUser,
    ]);
})->name('admin.users.index');
// giao diện thêm mới
Route::view('/admin/users/create', 'admin/users/create')->name('admin.users.create');

//nhận dữ liệu gửi lên và lưu vào db
Route::post('/admin/users/store', function () {
    // dd($_REQUEST);
    return redirect()->route('admin.users.index');
})->name('admin.users.store');

route::get('admin/users/edit/{id}', function($id){
   $data = DB::table('users')->find($id);
    dd($id);
    return view('admin/users/edit', [
        'data' => $data,
    ]);
})->name('admin.users.edit');

route::post('admin/users/update/{id}', function(){
    //nhận dữ liệu gửi lên và lưu vào db
})->name('admin.users.update');

route::post('admin/users/delete/{id}', function(){
    //xóa theo id
})->name('admin.users.delete');