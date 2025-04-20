<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function() { // artinya semua route di dalam group ini harus login dulu
    
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/', [WelcomeController::class, 'index']);
    
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']); // menampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']); // menyimpan data user baru
        Route::get('/create_ajax', [UserController::class, 'create_ajax']); // menampilkan halaman form tambah user dengan ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']); // menyimpan data user baru dengan ajax
        Route::get('/{id}', [UserController::class, 'show']); // menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']); // menyimpan perubahan data user
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
        Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
    });
    
    Route::middleware(['authorize:ADM'])->prefix('level')->group(function () {
        Route::get('/',[LevelController::class,'index']);//menampilkan halaman awal
        Route::post('/list',[LevelController::class,'list']);//menampilkan data user bentuk json / datatables
        Route::get('/create',[LevelController::class,'create']);// meanmpilkan bentuk form untuk tambah user
        Route::post('/',[LevelController::class,'store']);//menyimpan user data baru 
        Route::get('/create_ajax',[LevelController::class,'create_ajax']);// meanmpilkan bentuk form untuk tambah user ajax js 6
        Route::post('/ajax',[LevelController::class,'store_ajax']);//menyimpan user data baru ajax js 6
        Route::get('/{id}',[LevelController::class,'show']); // menampilkan detil user
        Route::get('/{id}/edit',[LevelController::class,'edit']);// menampilkan halaman form edit user
        Route::put('/{id}',[LevelController::class,'update']);// menyimpan perubahan data user 
        Route::get('/{id}/edit_ajax',[LevelController::class,'edit_ajax']);// menampilkan halaman form edit user ajax js 6
        Route::put('/{id}/update_ajax',[LevelController::class,'update_ajax']);// menyimpan perubahan data user  ajax js 6 
        Route::get('/{id}/delete_ajax',[LevelController::class,'confirm_ajax']);// menghapus data user ajax js 6
        Route::delete('/{id}/delete_ajax',[LevelController::class,'delete_ajax']);// menghapus data user ajax js 6
        Route::delete('/{id}',[LevelController::class,'destroy']);// menghapus data user 
    });
    
    Route::group(['prefix' => 'kategori'], function(){
        Route::get('/', [KategoriController::class, 'index']);
        Route::post('/list', [KategoriController::class, 'list']);
        Route::get('/create', [KategoriController::class, 'create']);
        Route::post('/', [KategoriController::class, 'store']);
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);
        Route::get('/{id}', [KategoriController::class, 'show']);
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);
        Route::put('/{id}', [KategoriController::class, 'update']);
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); 
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); 
        ROute::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); 
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
        Route::delete('/{id}', [KategoriController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'barang'], function(){
        Route::get('/', [BarangController::class, 'index']);
        Route::post('/list', [BarangController::class, 'list']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::post('/', [BarangController::class, 'store']);
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
        Route::post('/ajax', [BarangController::class, 'store_ajax']);
        Route::get('/{id}', [BarangController::class, 'show']);
        Route::get('/{id}/edit', [BarangController::class, 'edit']);
        Route::put('/{id}', [BarangController::class, 'update']);
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
        ROute::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
        Route::delete('/{id}', [BarangController::class, 'destroy']);
    });
    
});



// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/level/tambah', [LevelController::class, 'create']);
// Route::post('/level/tambah_simpan', [LevelController::class, 'store']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori', [KategoriController::class, 'store']);
// Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
// Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
// Route::delete('/kategori/{id}/delete', [KategoriController::class, 'destroy'])->name('kategori.destroy');
// Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');



