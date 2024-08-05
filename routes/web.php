<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\clientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [clientController::class, 'index'])->name('client.home');
//
Route::get('/search', [clientController::class, 'search'])->name('search');
//
Route::get('chuyen_muc/{id}', [clientController::class, 'chuyen_muc'])->name('chuyen_muc');
Route::get('lien_he', [clientController::class, 'lien_he'])->name('lien_he');
//
Route::get('chi_tiet/{id}', [clientController::class, 'chi_tiet'])->name('chi_tiet');
//
Route::post('/post/{id}/comment', [ClientController::class, 'storeComment'])->name('comment.store');
//
Route::get('dang_ky', [clientController::class, 'dang_ky'])->name('dang_ky');
Route::post('dang_ky_tai_khoan', [clientController::class, 'dang_ky_tai_khoan'])->name('dang_ky_tai_khoan');
//
Route::get('dang_nhap', [clientController::class, 'dang_nhap'])->name('dang_nhap');
Route::post('xu_ly_dang_nhap', [clientController::class, 'xu_ly_dang_nhap'])->name('xu_ly_dang_nhap');
//
Route::post('/logout', [clientController::class, 'logout'])->name('logout');
//
Route::get('quen_mat_khau', [clientController::class, 'quen_mat_khau'])->name('quen_mat_khau');
Route::post('gui_mat_khau', [clientController::class, 'gui_mat_khau'])->name('gui_mat_khau');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [adminController::class, 'admin'])->name('admin.dashboard');

        Route::get('danh_sach_chuyen_muc', [adminController::class, 'danh_sach_chuyen_muc'])->name('danh_sach_chuyen_muc');

        Route::get('them_chuyen_muc', [adminController::class, 'them_chuyen_muc'])->name('them_chuyen_muc');
        Route::post('xu_ly_them_chuyen_muc', [adminController::class, 'xu_ly_them_chuyen_muc'])->name('xu_ly_them_chuyen_muc');

        Route::get('sua_chuyen_muc/{id}', [adminController::class, 'sua_chuyen_muc'])->name('sua_chuyen_muc');
        Route::post('xu_ly_sua_chuyen_muc/{id}', [adminController::class, 'xu_ly_sua_chuyen_muc'])->name('xu_ly_sua_chuyen_muc');

        ///

        Route::get('them_ban_tin', [adminController::class, 'them_ban_tin'])->name('them_ban_tin');
        Route::post('xu_ly_them_ban_tin', [adminController::class, 'xu_ly_them_ban_tin'])->name('xu_ly_them_ban_tin');

        Route::get('sua_ban_tin/{id}', [adminController::class, 'sua_ban_tin'])->name('sua_ban_tin');
        Route::post('xu_ly_sua_ban_tin/{id}', [adminController::class, 'xu_ly_sua_ban_tin'])->name('xu_ly_sua_ban_tin');
        Route::POST('xoa_ban_tin/{id}', [AdminController::class, 'xoa_ban_tin'])->name('xoa_ban_tin');

        Route::get('danh_sach_ban_tin', [adminController::class, 'danh_sach_ban_tin'])->name('danh_sach_ban_tin');

        Route::get('danh_sach_binh_luan', [adminController::class, 'danh_sach_binh_luan'])->name('danh_sach_binh_luan');
        Route::get('danh_sach_nguoi_dung', [adminController::class, 'danh_sach_nguoi_dung'])->name('danh_sach_nguoi_dung');
    });
