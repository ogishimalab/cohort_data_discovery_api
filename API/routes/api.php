<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'JwtController@login')->name('login');
});

Route::group([
    'prefix' => 'auth',
    // 'middleware' => 'auth:api'
], function () {
    Route::post('logout', 'JwtController@logout');

    //dataCollection
    Route::post('dataCollection', 'JwtController@dataCollection');

    //searchAllItems
    Route::post('searchAllItems/{data_collection_id}', 'JwtController@searchAllItems');

    // searchItemshierarchy
    Route::post('searchItemsHierarchy/{data_collection_id}/{parent_id?}', 'JwtController@searchItemsHierarchy');

    // itemId
    Route::post('itemLevelMetadata/{data_collection_id}/{item_id}', 'JwtController@itemId');

    // itemLeveMetadata
    Route::post('itemLevelMetadata/{data_collection_id}/{item_id}/{stratification_type?}', 'JwtController@itemLevelMetadata');

    // statisticalData
    Route::post('statisticalData/{data_collection_id}/{item_id}/{stratification_type?}', 'JwtController@statisticalData');

    // stratificationType
    Route::post('itemLevelMetadata/{data_collection_id}/{item_id}/{stratification_type}', 'JwtController@stratificationType');

    //path
    Route::post('path/{data_collection_id}/{item_id?}', 'JwtController@path');

    //cohortLevelMetadata
    Route::post('cohortLevelMetadata', 'JwtController@cohortLevelMetadata');

});
