<?php

use Illuminate\Http\Request;


Route::get('test',function(){

	return response([1,2,3,4],200);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});
Route::get('redirect', function () {
    $query = http_build_query([
        'client_id' => '2',
        'redirect_uri' => 'http://localhost/ererere',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('oauth/authorize?'.$query);
});
