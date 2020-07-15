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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);
Route::get('/tutorial', 'TutorialController@index')->name('tutorial.index');
Route::get('/tutorial/{category}/{slug}', ['uses' => 'TutorialController@show', 'as' => 'tutorial.show']);
Route::get('/search', 'HomeController@search')->name('home.search');
Route::group(['prefix' => 'blog'] , function() {
    Route::get('/', 'BlogController@index')->name('blog.index');
    Route::get('/{slug}', 'BlogController@show')->name('blog.show');
});

Route::get('/sitemap.xml', [
    'uses' => 'HomeController@xmlSitemap',
    'as' => 'homepage.sitemap'
]);

//old route
Route::get('/quiz-question/{slug}','QuizQuestionController@oldShow');
Route::get('/ai-quiz-questions/{category}/{slug}','QuizQuestionController@show')->name('quiz-question.show');
Route::resource('/quiz-result','QuizResultController');
Route::resource('/ai-quiz-questions','QuizTopicController');

Route::group(['middleware' => ['auth', 'isAdmin'] , 'prefix' => 'admin'] , function() {
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
		Route::resource('/admin_ai_software', 'Admin\AiSoftwareController');
		Route::resource('/admin_ai_software_category', 'Admin\AdminCategoryController');
		Route::get('/admin_ai_software_get_subcategory', 'Admin\AdminCategoryController@getSubCategory')->name('admin.software_subcategory');
        Route::post('/screenshot/{id}/store', 'Admin\AiSoftwareController@screenshot_store')->name('admin.ai_software.screenshot-store');
        Route::post('/admin_quiz_topic_update','Admin\AdminQuizTopicController@update')->name('admin.quiz-topic-update');
});

Route::group(['prefix' => 'ai-softwares'] , function() {
    Route::get('/', 'AiSoftwareController@index')->name('ai_software.index');
    Route::get('/{slug}', 'AiSoftwareController@show')->name('ai_software.view');
    Route::post('/reviews_store', 'AiSoftwareReviewController@storeReview')->name('ai_software.review.store');
    Route::post('/hit_like/{id}', 'AiSoftwareReviewController@like')->name('ai_software.software.like');
    Route::any('/software/search', 'AiSoftwareController@softwareSearch')->name('ai_software.search');
    Route::get('/categories/{slug}', 'AiSoftwareController@categorySoftwares')->name('ai_software.category-softwares');
});

/*Old routes*/
Route::group(['prefix' => 'ai-software'] , function() {
    Route::get('/', 'AiSoftwareController@indexOld')->name('ai_software.index.old');
    Route::get('/{slug}', 'AiSoftwareController@showOld')->name('ai_software.view.old');
    Route::get('/categories/{slug}', 'AiSoftwareController@categorySoftwaresOld')->name('ai_software.category-softwares.old');
});
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/terms', 'HomeController@terms')->name('terms');