<?php

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


/* ******************************PropertyPreBooking ROUTE********************************** */
Route::match(['get', 'post'], '{controller}/{action?}/{params?}', function ($controller, $action = 'index', $params = '') {
    $params = explode('/', $params);
    $app = app();
    $controller = $app->make("\App\Http\Controllers\\" . ucwords($controller) . 'Controller',['action' => $action]);
    return $controller->callAction($action, $params);
});

/* ******************************AJAX Controller********************************** */
Route::match(['get', 'post'], '/propertyForm/{action}', function ($action) {
    $app = app();
    $controller = $app->make("\App\Http\Controllers\propertyFormController");
    return $controller->callAction($action, []);
});



/* Route::get('/',[PropertyFormController::class,'Propertyinst']);
Route::get('/PropertyPreBookingForm/home',[PropertyFormController::class,'Propertyinst']);
Route::post('/propertyForm',[PropertyFormController::class,'Propertyinst']);
Route::post('/PropertyPreBookingForm/applicationForm',[PropertyFormController::class,'applicationForm']);
Route::get('/PropertyPreBookingForm/propertyType',[PropertyFormController::class,'propertyType']);
Route::get('/PropertyPreBookingForm/PropertyTable/propertyType',[PropertyFormController::class,'propertyType']);
Route::get('/PropertyPreBookingForm/propertyCost',[PropertyFormController::class,'propertyCost']);
Route::get('/PropertyPreBookingForm/PropertyTable',[PropertyFormController::class,'PropertyTable']); */