<?php

Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');

/* profile Update */
Route::post('/admin/profile/update', 'Admin\DashboardController@profileupdate')->name('admin.profile.update');

/* project */
Route::get('admin/project/all', 'Admin\ProjectController@index')->name('admin.project.all');
Route::get('admin/project/add', 'Admin\ProjectController@create')->name('admin.project.new');
Route::post('admin/project/store', 'Admin\ProjectController@store')->name('admin.project.store');
Route::get('admin/project/edit/{project_id}', 'Admin\ProjectController@edit')->name('admin.project.edit');
Route::post('admin/project/update', 'Admin\ProjectController@update')->name('admin.project.update');
Route::get('admin/project/delete/{project_id}', 'Admin\ProjectController@delete')->name('admin.project.delete');

Route::get('admin/project/view/{project_id}', 'Admin\ProjectController@view')->name('admin.project.view');

/* Writer */
Route::get('admin/writer/all', 'Admin\WriterController@index')->name('admin.writer.all');
Route::get('admin/writer/add', 'Admin\WriterController@create')->name('admin.writer.new');
Route::post('admin/writer/store', 'Admin\WriterController@store')->name('admin.writer.store');
Route::get('admin/writer/edit/{writer_id}', 'Admin\WriterController@edit')->name('admin.writer.edit');
Route::post('admin/writer/update', 'Admin\WriterController@update')->name('admin.writer.update');
Route::get('admin/writer/delete/{writer_id}', 'Admin\WriterController@delete')->name('admin.writer.delete');


Route::get('admin/writer/view/{writer_id}', 'Admin\WriterController@view')->name('admin.writer.view');


/* Article */
Route::get('admin/article/all', 'Admin\ArticleController@index')->name('admin.article.all');
Route::get('admin/article/view/{article_id}', 'Admin\ArticleController@view')->name('admin.article.view');
Route::get('admin/article/add', 'Admin\ArticleController@create')->name('admin.article.new');
Route::post('admin/article/store', 'Admin\ArticleController@store')->name('admin.article.store');
Route::get('admin/article/edit/{article_id}', 'Admin\ArticleController@edit')->name('admin.article.edit');
Route::post('admin/article/update', 'Admin\ArticleController@update')->name('admin.article.update');
Route::get('admin/article/delete/{writer_id}', 'Admin\ArticleController@delete')->name('admin.article.delete');
