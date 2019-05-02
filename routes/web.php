<?php
/**
 * Contact
 */
Route::patch('contact-status/{id}', 'ContactController@status')->name('contact-status');
Route::resource('contact', 'ContactController');
/**
 * Contact config
 */
Route::resource('contact-config', 'ContactResponseController');