<?php

use App\Classes\DatatableResource;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Custom/Dashboard');
    })->name('dashboard');
});

Fortify::loginView(function () {
    return Inertia::render('Custom/Auth/Login',[
      //  'canResetPassword' => Route::has('password.request'),
        'fortifyUsername'=>Fortify::username(),
    ]);
});

Route::get('/dashboard/personal', function () {
    return Inertia::render('Custom/Views/Resources', [
        'title'=>'Personal',
        'route'=>'employees.index',
        'columns'=>[
            ['data'=>'id','title'=>'id '],
            [ 'data'=>'branch','title'=>'sucursal'],
            ['data'=>'position','title'=>'puesto '],
            [ 'data'=>'name','title'=>'Nombre '],
            ['data'=>'first_surname','title'=>'Apellido p '],
            ['data'=>'second_surname','title'=>'Apellido m '],
            [ 'data'=>'employee_id_number', 'title'=>'Id Emp'],
            ['data'=>'hire_date','title'=>'Fecha de ingreso '],
            [ 'data'=>'is_active','title'=>'Activo '],
            ['data'=>'created_by','title'=>'Creado Por '],
            ['data'=>'updated_by','title'=>'Actualizado por '],
            ['data'=>'created_at','title'=>'Creado a las '],
            ['data'=>'updated_at','title'=>'Actualizado a las']
        ]


    ]);
});

Route::get('/dashboard/test', function () {
    $resource = new DatatableResource('companies');
    return Inertia::render('Custom/Templates/DatatableResource', [
        'title'=>$resource->getTitle(),
        'route'=>$resource->getRoute(),
        'columns'=>$resource->getColumns()
    ]);

});

Route::get('/dashboard/sucursales', function () {
    $resource = new DatatableResource('branches');
    return Inertia::render('Custom/Templates/DatatableResource', [
        'title'=>$resource->getTitle(),
        'route'=>$resource->getRoute(),
        'columns'=>$resource->getColumns()
    ]);

});


