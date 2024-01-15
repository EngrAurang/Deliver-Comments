<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});

Route::get('/urls', 'Admin\CommentController@fetchUrls')->name('urls');
// Route::post('/update-status/{url}', 'Admin\CommentController@updateStatus')->name('updateStatus');

Route::post('/update-status', 'Admin\CommentController@updateStatus')->name('updateStatus');