<?php
/**
 * Created by PhpStorm.
 * User: digi-x
 * Date: 2019-01-12
 * Time: 17:48
 */


Route::group(['namespace' => 'Phoenix\Leave\Http\Controllers\Admin', 'as' => 'admin.','prefix' => 'admin'], function () {
    /*
    *  Leave
    */
    Route::resource('leaves', 'LeaveController')->middleware(['web', 'auth']);


});
