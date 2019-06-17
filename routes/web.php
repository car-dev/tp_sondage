<?php
use Illuminate\Support\Facades\Route;

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

// ROUTE INSTALLATION
Route::get('/', function () {
    return view('welcome');
});


// ROUTE DE BASE
Route::get('1', function () { return 'Je suis la page 1 !';});
Route::get('2', function () { return 'Je suis la page 2 !';});
Route::get('3', function () { return 'Je suis la page 3 !';});
// équivaut à 
// app('router')->get('3', function() { return 'Je suis la page 3 !'; });


// ROUTE PARAMETREE DE BASE
Route::get('{n}', function($n) { return 'Je suis la page '. $n . ' !';});

Route::get('{n}', function($n) { return 'Je suis la page '. $n . ' !';})->where('n', '[4-6]');


// ROUTE NOMMEE DE BASE
Route::get('blabla', ['as' => 'home', function() {
    return 'je suis la page d\'accueil !';
}]);



// ROUTE AVEC REPONSE BASIQUE
Route::get('test/{n}', function($n) {
    return response('Je suis la page test '. $n. ' !', 200);
    //équivaut à 
    // return Response::make('Je suis la page ' . $n . ' !', 200);
});


// ROUTE AVEC REPONSE VUE
Route::get('vue1', function()
{
    return view('view1');
});


// ROUTE PARAMETREE AVEC REPONSE VUE
Route::get('article/{n}', function($n) { 
    return view('article')->with('numero', $n); 
    // équivaut à : (concaténer avec with)
    // return view('article')->withNumero($n); 
    // équivaut à : (avec un tableau de paramètre)
    // return view('article', ['numero' => $n ]);
})->where('n', '[0-9]+');

Route::get('facture/{n}', function($n) { 
    return view('facture')->with('numero', $n); 
    // équivaut à : (concaténer avec with)
    // return view('article')->withNumero($n); 
    // équivaut à : (avec un tableau de paramètre)
    // return view('article', ['numero' => $n ]);
})->where('n', '[0-9]+');


// ROUTE AVEC CONTROLLER
Route::get('/welcome', 'WelcomeController@index');
Route::get('/hi', ['uses' => 'WelcomeController@index', 'as' => 'home']);
Route::get('art/{n}', 'ArticleController@show')->where('n', '[0-9]+');

// REDIRECTION
Route::redirect('whatsup', '1', 301);
Route::get('whatelse', function(){
    // return redirect('hi');
    return redirect()->route('home');
});


// ROUTE AVEC FORMULAIRE
Route::get('users', 'UserController@getInfos');
Route::post('users', 'UserController@postInfos');


Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');


Route::get('session', 'SessionController@getInfos');


Route::get('photo', 'ImageController@getForm');
Route::post('photo', 'ImageController@postForm');


Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);