<?php

use App\Http\Controllers\Api\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')
    ->prefix('announcements')
    ->group(function(){
        Route::get('/', 'PageController@index');
        Route::get('/get-services', 'PageController@getServices');
        Route::get('/category/{category}', 'PageController@getSelectedCategory');
        Route::get('/advanced/{bathrooms}/{beds}/{houseType}/{roomType}/{rooms}/{services}', 'PageController@getAdvancedFilter');
    });


