<?php

use App\Http\Middleware\GetProfile;
use Illuminate\Support\Facades\Route;

Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::apiResource('cep', 'App\Http\Controllers\CepController')->only(['show']);
Route::apiResource('city', 'App\Http\Controllers\CityController')->only(['index', 'show', 'update']);

Route::group(['middleware' => ['auth:sanctum', GetProfile::class]], function () {
    Route::get('/change-password', 'App\Http\Controllers\AuthController@changePassword');
    Route::get('/me', 'App\Http\Controllers\AuthController@me')->withoutMiddleware([GetProfile::class]);
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::apiResource('address', 'App\Http\Controllers\AddressController')->withTrashed();
    Route::apiResource('cart', 'App\Http\Controllers\CartController')->withTrashed();
    Route::get('my_cart', 'App\Http\Controllers\CartController@store');
    Route::apiResource('cart_product', 'App\Http\Controllers\CartProductController');
    Route::apiResource('goal', 'App\Http\Controllers\GoalController');
    Route::apiResource('order', 'App\Http\Controllers\OrderController')->only(['index', 'show', 'store']);
    Route::get('city_search', 'App\Http\Controllers\CityController@lists');
    Route::apiResource('city_user', 'App\Http\Controllers\CityUserController')->only(['show', 'store']);
    Route::apiResource('client', 'App\Http\Controllers\ClientController')->withTrashed()->only(['index']);
    Route::apiResource('provider', 'App\Http\Controllers\ProviderController')->withTrashed()->only(['index', 'show']);
    Route::apiResource('final_destination', 'App\Http\Controllers\FinalDestinationController')->withTrashed()->only(['index']);
    Route::apiResource('driver', 'App\Http\Controllers\DriverController')->withTrashed();
    Route::apiResource('order_location', 'App\Http\Controllers\OrderLocationController')->withTrashed();
    Route::apiResource('order_location_product', 'App\Http\Controllers\OrderLocationProductController')->withTrashed();
    Route::apiResource('order_location_product_gallery', 'App\Http\Controllers\OrderLocationProductGalleryController');
    Route::apiResource('permission_group', 'App\Http\Controllers\PermissionGroupController');
    Route::apiResource('residue', 'App\Http\Controllers\ResidueController')->withTrashed();
    Route::apiResource('residue_user', 'App\Http\Controllers\ResidueUserController')->withTrashed()->only(['show', 'store', 'destroy']);
    Route::apiResource('state', 'App\Http\Controllers\StateController')->only(['index', 'show']);
    Route::apiResource('stationary_bucket', 'App\Http\Controllers\StationaryBucketController')->withTrashed();
    Route::post('stationary_bucket/gerar', 'App\Http\Controllers\StationaryBucketController@gerar');
    Route::apiResource('stationary_bucket_gallery', 'App\Http\Controllers\StationaryBucketGalleryController')->withTrashed();
    Route::apiResource('stationary_bucket_group', 'App\Http\Controllers\StationaryBucketGroupController')->withTrashed();
    Route::apiResource('stationary_bucket_type', 'App\Http\Controllers\StationaryBucketTypeController')->withTrashed();
    Route::apiResource('team', 'App\Http\Controllers\TeamController');
    Route::apiResource('user', 'App\Http\Controllers\UserController')->withTrashed();
    Route::apiResource('upload', 'App\Http\Controllers\UploadController')->only(['store']);
    Route::apiResource('notification', 'App\Http\Controllers\NotificationController')->only(['index','update']);
    Route::apiResource('vehicle', 'App\Http\Controllers\VehicleController')->withTrashed();
    Route::apiResource('vehicle_type', 'App\Http\Controllers\VehicleTypeController')->withTrashed();;
    Route::apiResource('mtr', 'App\Http\Controllers\MtrController');
    // DASHBOARD OPERACIONAL
    Route::get('dashboard/orderbymonth', 'App\Http\Controllers\DashboardController@orderbymonth');
    Route::get('dashboard/cityrequest', 'App\Http\Controllers\DashboardController@cityrequest');
    Route::get('dashboard/productrequest', 'App\Http\Controllers\DashboardController@productrequest');
    Route::get('dashboard/productbymonth', 'App\Http\Controllers\DashboardController@productbymonth');
    Route::get('dashboard/productbytype', 'App\Http\Controllers\DashboardController@productbytype');
    Route::get('dashboard/deliverybymonth', 'App\Http\Controllers\DashboardController@deliverybymonth');
    Route::get('dashboard/usersbymonth', 'App\Http\Controllers\DashboardController@usersbymonth');
    // DASHBOARD FINANCEIRO
    Route::get('financial/month', 'App\Http\Controllers\FinancialController@month');
    Route::get('financial/year', 'App\Http\Controllers\FinancialController@year');
    Route::get('financial/goal', 'App\Http\Controllers\FinancialController@goal');
    Route::get('financial/orderbymonth', 'App\Http\Controllers\FinancialController@orderbymonth');
});

Route::post('/webhook/payment', 'App\Http\Controllers\WebhookController@payment');
