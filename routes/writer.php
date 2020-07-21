<?php


Route::get('/writer/dashboard', 'Writer\DashboardController@index')->name('writer.dashboard.index');
Route::get('/writer/login', 'Writer\DashboardController@login_form')->name('writer.dashboard.login');
Route::post('/writer/view', 'Writer\DashboardController@loginAction')->name('writer.login.action');
Route::get('/writer/logout', 'Writer\DashboardController@logout')->name('writer.dashboard.logout');

Route::get('/writer/article', 'Writer\DashboardController@article')->name('writer.dashboard.article');
Route::get('writer/article/view/{article_id}', 'Writer\DashboardController@articleview')->name('writer.dashboard.article.view');

Route::post('writer/article/view/respond/{article_id}', 'Writer\DashboardController@articleviewresponse')->name('writer.dashboard.article.view.response');



//Profile Update
Route::post('writer/profile/update', 'Writer\DashboardController@profileupdate')->name('writer.profile.update');

?>