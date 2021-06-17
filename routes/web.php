<?php
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function(){
//    Route::get('/test/test1', 'api\ApiTestController@test1');
  Route::post('/test_session/write', 'api\TestSessionController@write');
  Route::get('/test_session/read', 'api\TestSessionController@read');
});

Route::get('/{any}', function(){
  return view('App');
})->where('any', '.*');
