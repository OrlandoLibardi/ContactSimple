<?php
/**
 * Contact View
 */
Route::group(['middleware' => ['web']], function() {
    Route::post('contact-view', 'OrlandoLibardi\ContactCms\app\Http\Controllers\ContactViewController@store')
    ->name("contact-send");
});