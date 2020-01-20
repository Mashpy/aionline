<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home.index'
]);

Route::get('/tutorial/{category}/{slug}', [
    'uses' => 'TutorialController@show',
    'as' => 'tutorial.show'
]);

Route::resource('/quiz_question','QuizQuestionController');
Route::resource('/quiz_result','QuizResultController');
Route::resource('/quiz_topic','QuizTopicController');

Route::group(['middleware' => 'auth' , 'prefix' => 'admin'] , function() {
		Route::get('/', [
		    'uses' => 'Admin\AdminController@index',
		    'as' => 'admin.index'
		]);
    Route::get('/', [
        'uses' => 'Admin\AdminController@index',
        'as' => 'admin.index'
    ]);

		Route::post('/admin_login', [
		    'uses' => 'Admin\AdminController@login',
		    'as' => 'admin_post_login'
		]);
		Route::resource('/admin_tutorial','Admin\AdminTutorialController');
		Route::resource('/admin_quiz_question','Admin\AdminQuizQuestionController');
		Route::resource('/admin_quiz_answer','Admin\AdminQuizAnswerController');
		Route::resource('/admin_quiz_topic','Admin\AdminQuizTopicController');
		Route::resource('/alternative_software_category', 'SoftwareCategoryController');
		Route::resource('/alternative_software', 'AlternativeSoftwareController');

	});
Route::group(['prefix' => 'ai-software'] , function() {
    Route::get('/', 'AiSoftwareController@index')->name('ai_software.index');
    Route::get('/{slug}', 'AiSoftwareController@view')->name('ai_software.view');
    Route::get('/{slug}/reviews', 'AiSoftwareController@review')->name('ai_software.reviews');
    Route::post('/reviews_store', 'AiSoftwareController@storeReview')->name('ai_software.review.store');
    Route::post('/hit_like/{id}', 'AiSoftwareController@like')->name('ai_software.software.like');
});