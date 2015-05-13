<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'UrlController@index');
Route::post('home','UrlController@store');
Route::resource('urls', 'UrlController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);




Route::get('{shortcode}', function($shortcode){

    $link = \App\Url::where('hash','=',$shortcode)->first();
    echo $shortcode;
    if($link)
    {
        $link->counter = $link->counter + 1;
        $link->save();
        return Redirect::to($link->url);

    }
    else
    {
        $error = 1;
        return Redirect::to('home')
            ->with('shortcode',$shortcode)
            ->with('error' ,$error);
    }
});
