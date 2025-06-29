<?php

use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\ServicesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Application\AppController;
use App\Http\Controllers\Dashboard\ContactsController;
use App\Http\Controllers\Dashboard\ProjectsController;
use App\Http\Controllers\Dashboard\TourismsController;
use App\Http\Controllers\Dashboard\BlogsController;
use App\Http\Controllers\Dashboard\CareersController;
use Illuminate\Support\Facades\Route;


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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::group([
      'prefix'=>'/dashboard',
      'as'=>'dashboard.',
      'namespace'=>'Dashboard',
      'middleware'=>['auth'],

],function(){
    Route::get('/', [DashboardController::class,'index']);

    Route::get('/user/', [DashboardController::class,'userpage']);


    Route::prefix('/tourisms')->as('tourisms.')->group(function () {
        // CRUD: Create, Read, Update and Delete
        Route::get('/', [TourismsController::class,'index'])
            ->name('index');
        Route::delete('/destroy/{id}',[TourismsController::class,'delete'])->name('delete');

        Route::get('/create', [TourismsController::class, 'create'])
            ->name('create');
        Route::post('/store', [TourismsController::class, 'store'])
            ->name('store');
        Route::get('/edit/{id}', [TourismsController::class, 'edit'])
            ->name('edit');
        Route::post('/update/{id}', [TourismsController::class, 'update'])
            ->name('update');
            Route::delete('delete/{id}',[TourismsController::class,'delete'])->name('delete');
        });

    Route::prefix('/projects')->as('projects.')->group(function () {
        // CRUD: Create, Read, Update and Delete
        Route::get('/', [ProjectsController::class,'index'])
            ->name('index');
        Route::delete('/destroy/{id}',[ProjectsController::class,'delete'])->name('delete');

        Route::get('/create', [ProjectsController::class, 'create'])
            ->name('create');
        Route::post('/store', [ProjectsController::class, 'store'])
            ->name('store');
        Route::get('/edit/{id}', [ProjectsController::class, 'edit'])
            ->name('edit');
        Route::post('/update/{id}', [ProjectsController::class, 'update'])
            ->name('update');
    });


    Route::prefix('/services')->as('services.')->group(function () {
        // CRUD: Create, Read, Update and Delete
        Route::get('/', [ServicesController::class,'index'])
            ->name('index');
        Route::post('/store', [ServicesController::class, 'store'])
            ->name('store');
        Route::get('/create', [ServicesController::class, 'create'])
            ->name('create');
        Route::get('edit/{id}',[ServicesController::class,'edit'])->name('edit');
        Route::Post('update/{id}',[ServicesController::class,'update'])->name('update');
        Route::delete('delete/{id}',[ServicesController::class,'delete'])->name('delete');

    });
    Route::prefix('/blogs')->as('blogs.')->group(function () {
        // CRUD: Create, Read, Update and Delete
        Route::get('/', [BlogsController::class,'index'])
            ->name('index');
        Route::post('/store', [BlogsController::class, 'store'])
            ->name('store');
        Route::get('/create', [BlogsController::class, 'create'])
            ->name('create');
        Route::get('/edit/{id}', [BlogsController::class, 'edit'])
            ->name('edit');
        Route::Post('/update/{id}', [BlogsController::class, 'update'])
            ->name('update');
        Route::get('/delete/{id}', [BlogsController::class, 'delete'])
            ->name('delete');
    });
    Route::prefix('/careers')->as('careers.')->group(function () {
        // CRUD: Create, Read, Update and Delete
        Route::get('/', [CareersController::class,'index'])
            ->name('index');
        Route::post('/store', [CareersController::class, 'store'])
            ->name('store');
        Route::get('/create', [CareersController::class, 'create'])
            ->name('create');
        Route::get('/edit/{id}', [CareersController::class, 'edit'])
            ->name('edit');
        Route::Post('/update/{id}', [CareersController::class, 'update'])
            ->name('update');
        Route::get('/delete/{id}', [CareersController::class, 'delete'])
            ->name('delete');
    });
    Route::prefix('/contacts')->as('contacts.')->group(function () {
        // CRUD: Create, Read, Update and Delete
        Route::get('/', [ContactsController::class,'index'])
            ->name('index');
        Route::get('/delete', [ContactsController::class, 'delete'])
            ->name('delete');
        Route::get('/create', [ContactsController::class, 'create'])
            ->name('create');
    });
}
);



require __DIR__.'/auth.php';
Route::get('/', [AppController::class,'index'])->name('app');
Route::get('/{lang}', [AppController::class,'index']);

// Route::get('/app/contact/{name?}',[AppController::class,'contact'])->name('app.contact');
// Route::get('app/contact/{name}',[AppController::class,'contact'])->name('app.contact');
Route::get('/app/contact/',[AppController::class,'contact'])->name('app.contact');
Route::Post('/app/contact/',[AppController::class,'contactsave'])->name('contact.save');

Route::get('/app/map/',[AppController::class,'map'])->name('map');

Route::get('/app/blogs/{id?}',[AppController::class,'blogs'])->name('app.blogs');
Route::get('/app/projects/{id}',[AppController::class,'projects'])->name('app.projects');
Route::get('/app/careers/{id}',[AppController::class,'careers'])->name('app.careers');

