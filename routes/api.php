<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ServesController;
use App\Http\Controllers\ServesPageController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeDevController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('contact', ContactController::class);
Route::apiResource('subscribe',SubscribeController::class);
Route::post('logos/update/{id}',[LogoController::class,'updata']);
Route::get('logos',[LogoController::class,'index']);
Route::get('logotest',[LogoController::class,'logotest']);


Route::get('logos/{id}',[LogoController::class,'show']);
Route::delete('logos/{id}',[LogoController::class,'destroy']);
Route::post('logos',[LogoController::class,'store']);

//
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'indexTasks']);
    Route::post('/', [TaskController::class, 'storeTasks']);
    Route::get('/{id}', [TaskController::class, 'showTasks']);
    Route::put('/{id}', [TaskController::class, 'updateTasks']);
    Route::delete('/{id}', [TaskController::class, 'destroyTasks']);
});
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
