<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// admin routes
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController as Admin_UserController;
use App\Http\Controllers\Admin\RoleController As Admin_RoleController;
use App\Http\Controllers\Admin\PermissionController as Admin_PermissionController;
use App\Http\Controllers\Admin\CategoryController as Admin_CategoryController;
use App\Http\Controllers\Admin\PostController as Admin_PostController;
// user routes
use App\Http\Controllers\User\UserController as UserController;
use App\Http\Controllers\User\CategoryController as User_CategoryController;
use App\Http\Controllers\User\PostController as User_PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

        // admin routes
        Route::middleware(['auth', 'verified','role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin-dashboard');
    
        Route::get('/role',[Admin_RoleController::class,'index'])->name('admin-role-index');
        Route::get('/role/create',[Admin_RoleController::class,'create'])->name('admin-role-create');
        Route::post('/role/store',[Admin_RoleController::class,'store'])->name('admin-role-store');
        Route::get('/role/show/{id}',[Admin_RoleController::class,'show'])->name('admin-role-show');
        Route::get('/role/edit/{id}',[Admin_RoleController::class,'edit'])->name('admin-role-edit');
        Route::put('/role/update/{id}',[Admin_RoleController::class,'update'])->name('admin-role-update');
        Route::get('/role/delete/{id}',[Admin_RoleController::class,'destroy'])->name('admin-role-destroy');
        // remove permission from role
        Route::delete('/role/delete/permission',[Admin_RoleController::class,'removePermission'])->name('admin-remove-permission');
        //remove role from permission
        Route::delete('/permission/delete/role',[Admin_PermissionController::class,'removeRole'])->name('admin-remove-role');
        // remove role from user
        Route::delete('/user/role/delete',[Admin_UserController::class,'removeRole'])->name('admin-remove-user-role');
        // remove permission from user
        Route::delete('/user/permission/delete',[Admin_UserController::class,'removePermission'])->name('admin-remove-user-permission');
    
        Route::get('/permission',[Admin_PermissionController::class,'index'])->name('admin-permission-index');
        Route::get('/permission/create',[Admin_PermissionController::class,'create'])->name('admin-permission-create');
        Route::post('/permission/store',[Admin_PermissionController::class,'store'])->name('admin-permission-store');
        Route::get('/permission/show/{id}',[Admin_PermissionController::class,'show'])->name('admin-permission-show');
        Route::get('/permission/edit/{id}',[Admin_PermissionController::class,'edit'])->name('admin-permission-edit');
        Route::put('/permission/update/{id}',[Admin_PermissionController::class,'update'])->name('admin-permission-update');
        Route::get('/permission/delete/{id}',[Admin_PermissionController::class,'destroy'])->name('admin-permission-destroy');
    
        Route::get('/user',[Admin_UserController::class,'index'])->name('admin-user-index');
        Route::get('/user/create',[Admin_UserController::class,'create'])->name('admin-user-create');
        Route::post('/user/store',[Admin_UserController::class,'store'])->name('admin-user-store');
        Route::get('/user/show/{id}',[Admin_UserController::class,'show'])->name('admin-user-show');
        Route::get('/user/edit/{id}',[Admin_UserController::class,'edit'])->name('admin-user-edit');
        Route::put('/user/update/{id}',[Admin_UserController::class,'update'])->name('admin-user-update');
        Route::get('/user/delete/{id}',[Admin_UserController::class,'destroy'])->name('admin-user-destroy');
    
        Route::get('/category',[Admin_CategoryController::class,'index'])->name('admin-category-index');
        Route::get('/category/create',[Admin_CategoryController::class,'create'])->name('admin-category-create');
        Route::post('/category/store',[Admin_CategoryController::class,'store'])->name('admin-category-store');
        Route::get('/category/show/{id}',[Admin_CategoryController::class,'show'])->name('admin-category-show');
        Route::get('/category/edit/{id}',[Admin_CategoryController::class,'edit'])->name('admin-category-edit');
        Route::put('/category/update/{id}',[Admin_CategoryController::class,'update'])->name('admin-category-update');
        Route::get('/category/delete/{id}',[Admin_CategoryController::class,'destroy'])->name('admin-category-destroy');
    
        Route::get('/post',[Admin_PostController::class,'index'])->name('admin-post-index');
        Route::get('/post/create',[Admin_PostController::class,'create'])->name('admin-post-create');
        Route::post('/post/store',[Admin_PostController::class,'store'])->name('admin-post-store');
        Route::get('/post/show/{id}',[Admin_PostController::class,'show'])->name('admin-post-show');
        Route::get('/post/edit/{id}',[Admin_PostController::class,'edit'])->name('admin-post-edit');
        Route::put('/post/update/{id}',[Admin_PostController::class,'update'])->name('admin-post-update');
        Route::get('/post/delete/{id}',[Admin_PostController::class,'destroy'])->name('admin-post-destroy');    
    });
    
        // user routes
        Route::middleware(['auth', 'verified','role:user'])->prefix('user')->group(function () {    
        Route::get('/dashboard',[UserController::class,'dashboard'])->name('user-dashboard');
        Route::get('/category',[User_CategoryController::class,'index'])->name('user-category-index');
        Route::get('/category/create',[User_CategoryController::class,'create'])->name('user-category-create');
        Route::post('/category/store',[User_CategoryController::class,'store'])->name('user-category-store');
        Route::get('/category/show/{id}',[User_CategoryController::class,'show'])->name('user-category-show');
        Route::get('/category/edit/{id}',[User_CategoryController::class,'edit'])->name('user-category-edit');
        Route::put('/category/update/{id}',[User_CategoryController::class,'update'])->name('user-category-update');
        Route::get('/category/delete/{id}',[User_CategoryController::class,'destroy'])->name('user-category-destroy');
    
        Route::get('/post',[User_PostController::class,'index'])->name('user-post-index');
        Route::get('/post/create',[User_PostController::class,'create'])->name('user-post-create');
        Route::post('/post/store',[User_PostController::class,'store'])->name('user-post-store');
        Route::get('/post/show/{id}',[User_PostController::class,'show'])->name('user-post-show');
        Route::get('/post/edit/{id}',[User_PostController::class,'edit'])->name('user-post-edit');
        Route::put('/post/update/{id}',[User_PostController::class,'update'])->name('user-post-update');
        Route::get('/post/delete/{id}',[User_PostController::class,'destroy'])->name('user-post-destroy');
    });
    
require __DIR__.'/auth.php';
