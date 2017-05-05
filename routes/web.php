<?php

// app/routes.php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*
 *  Set up locale and locale_prefix if other language is selected
 */
if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}


/*
 * Set up route patterns - patterns will have to be the same as in translated route for current language
 
foreach(Lang::get('routes') as $k => $v) {
    Route::pattern($k, $v);
}
*/




//The following loop prefixes the language
    Route::group(array('prefix' => Config::get('app.locale_prefix')), function() {
    //Auth::routes();
    Route::get('/', function () {
        return view('welcome');
    });
    //admin dashboard:
    $this->get('adminarea', 'Admincontroller@showusers')->name('admin');
    $this->get('adminarea/users', 'Admincontroller@showusers')->name('showusers');
    $this->get('adminarea/users/edit/{id?}', 'Admincontroller@edituser')->name('edituser');
    $this->get('adminarea/users/delete/{id?}', 'Admincontroller@deleteuser')->name('deleteuser');
 
    $this->get('register/verify/{confirmationCode}', 'Auth\RegisterController@confirm')->name('confirmation_path');
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...

    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');
    $this->get('/verification', 'Auth\RegisterController@verification')->name('verification');

// Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/home', 'HomeController@index')->name('home');
});