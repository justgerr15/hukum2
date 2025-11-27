<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\CrudUserController;

use App\Http\Controllers\CrudAlumniController;

use App\Http\Controllers\CRUDSliderController;

use App\Http\Controllers\CrudVisiMisiController;

use App\Http\Controllers\CrudFasilitasController;
use App\Http\Controllers\CrudKopetensiController;
use App\Http\Controllers\CrudTeamController;
use App\Http\Controllers\ChangePasswordController;

use App\Http\Controllers\FacilityController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\CKEditorController;

use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;

use App\Http\Controllers\CrudPictureController;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

use App\Models\alumni;

use App\Http\Controllers\CrudNewsController;

use App\Models\counter;
use App\Models\CrudNews;

use App\Models\facilitie;

use App\Models\crudPartner;
use App\Models\crudPicture;
use App\Models\crudVisiMisi;
use App\Models\CrudKopetensi;
use App\Models\CrudSlider;

use App\Http\Controllers\CrudPartnerController;

use App\Models\team;

Route::get('/', function () {
    return view('index',[
        'alumni'=>alumni::all(),
        'kopetensi'=>CrudKopetensi::all(),
        'counter'=>counter::all(),
        'fasilitas'=>facilitie::all(),
        'partner'=>crudPartner::all(),
        'pictures'=>crudPicture::all(),
        'slider'=>crudSlider::all(),
        'team'=>team::all(),
        'news'=>CrudNews::all()
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/login', fn()=>view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::group(['middleware' => ['auth', 'check_role:superadmin,admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD User Laravel Bawaan
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::resource('/slider', CRUDSliderController::class);
Route::get('/slider/create', [CRUDSliderController::class, 'create'])->name('slider.create');
Route::post('/slider', [CRUDSliderController::class, 'store'])->name('slider.store');
Route::get('/slider/{id}/edit', [CRUDSliderController::class, 'edit'])->name('slider.edit');
Route::put('/slider/{id}', [CRUDSliderController::class, 'update'])->name('slider.update');
Route::delete('/slider/{id}', [CRUDSliderController::class, 'destroy'])->name('slider.destroy');
Route::get('/slider', [DashboardController::class, 'slider']);

Route::get('/slider', function () {
    return view('slider', [
        'slider' => crudSlider::all(),
    ]);
});

Route::resource('kopetensi', CrudKopetensiController::class);   
Route::get('/kopetensi', [CrudKopetensiController::class, 'index'])->name('/kopetensi');
Route::get('/kopetensi/create', [CrudKopetensiController::class, 'create'])->name('kopetensi.create');
Route::post('/kopetensi', [CrudKopetensiController::class, 'store'])->name('kopetensi.store');
Route::resource('/kopetensi', CrudKopetensiController::class);
Route::get('/kopetensi', [DashboardController::class, 'kopetensi']);
Route::get('/kopetensi', function () {
    return view('kopetensi',[
        'kopetensi'=>CrudKopetensi::all(),
    ]);
});

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/team', function () {
    return view('/team',[
        'team'=>team::all()
    ]);
});
Route::resource('/team', CrudTeamController::class);
Route::resource('team', \App\Http\Controllers\CrudTeamController::class);

Route::get('/team', [CrudTeamController::class, 'index'])->name('/team');
Route::get('/team/create', [CrudTeamController::class, 'create'])->name('team.create');
Route::post('/team/store', [CrudTeamController::class, 'store'])->name('team.store');
Route::get('/team/{id}/edit', [CrudTeamController::class, 'edit'])->name('team.edit');
Route::post('/team/{id}/update', [CrudTeamController::class, 'update'])->name('team.update');
Route::delete('/team/{id}/delete', [CrudTeamController::class, 'destroy'])->name('team.delete');


Route::resource('/facilities', CrudFasilitasController::class);
Route::get('/facilities/create', [CrudFasilitasController::class, 'create'])->name('facilities.create');
Route::post('/facilities', [CrudFasilitasController::class, 'store'])->name('facilities.store');
Route::get('/facilities/{id}/edit', [CrudFasilitasController::class, 'edit'])->name('facilities.edit');
Route::put('/facilities/{id}', [CrudFasilitasController::class, 'update'])->name('facilities.update');
Route::delete('/facilities/{id}', [CrudFasilitasController::class, 'destroy'])->name('facilities.destroy');

Route::resource('/pictures', CrudPictureController::class);

Route::resource('/alumni', CrudAlumniController::class);

Route::resource('partner', CrudPartnerController::class);

Route::get('/about_us/visi_misi', function () {
    return view('visi_misi', [
        'title' => 'Visi dan Misi',
        'deskripsi' => CrudVisiMisi::all()
    ]);
});

Route::get('/struktur', function () {
    return view('struktur', [
        'title' => 'Struktur Organisasi',
    ]);
});

Route::prefix('visimisi')->group(function () {
    Route::get('/', [CrudVisiMisiController::class, 'index'])->name('visi_misi.index');
    Route::get('/create', [CrudVisiMisiController::class, 'create'])->name('visi_misi.create');
    Route::post('/store', [CrudVisiMisiController::class, 'store'])->name('visi_misi.store');
    Route::get('/edit/{id}', [CrudVisiMisiController::class, 'edit'])->name('visi_misi.edit');
    Route::put('/update/{id}', [CrudVisiMisiController::class, 'update'])->name('visi_misi.update');
    Route::delete('/delete/{id}', [CrudVisiMisiController::class, 'destroy'])->name('visi_misi.delete');
});

Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

Route::resource('news', CrudNewsController::class);

Route::get('/news/{id}', function($id){
    // Ambil hanya 10 berita terbaru
    $news = CrudNews::orderBy('created_at', 'desc')->take(5)->get();

    $post = CrudNews::findOrFail($id);

    return view('post', compact('news', 'post'));
});

Route::middleware(['auth', 'check_role:superadmin'])->group(function () {
    Route::get('/user', [CrudUserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [CrudUserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [CrudUserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [CrudUserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [CrudUserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [CrudUserController::class, 'destroy'])->name('user.destroy');
});

// Profile user (siapa pun yang login)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [CrudUserController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [CrudUserController::class, 'profileUpdate'])->name('user.profile.update');
});

Route::resource('crud_news', CrudNewsController::class);

Route::prefix('visimisi')->group(function () {
    Route::get('/', [CrudVisiMisiController::class, 'index'])->name('/news.index');
    Route::get('/create', [CrudVisiMisiController::class, 'create'])->name('visi_misi.create');
    Route::post('/store', [CrudVisiMisiController::class, 'store'])->name('visi_misi.store');
    Route::get('/edit/{id}', [CrudVisiMisiController::class, 'edit'])->name('visi_misi.edit');
    Route::put('/update/{id}', [CrudVisiMisiController::class, 'update'])->name('visi_misi.update');
    Route::delete('/delete/{id}', [CrudVisiMisiController::class, 'destroy'])->name('visi_misi.delete');
});



