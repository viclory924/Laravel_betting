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

Route::get('/', 'HomeController@selectLanguage');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/casino', 'HomeController@casino')->name('casino');
Route::get('/casino-live', 'HomeController@casinoLive')->name('casino-live');
Route::get('/bingo', 'HomeController@bingo')->name('bingo');
Route::get('/live-sport', 'HomeController@liveSport')->name('live-sport');

Route::get('/player/activate/{hash}/email/{email}', ['uses' => 'PlayerController@activate']);
Route::get('/player/just-registered', 'PlayerController@justRegistered');
Route::post('/games/get-iframe-url', 'HomeController@getIframeUrl');
Route::post('/games/add-to-fav', 'PlayerController@addGameToFav');
Route::post('/games/del-from-fav', 'PlayerController@deleteGameFromFav');
Route::post('/games/get-fav', 'PlayerController@getFavGames');
Route::post('/player/get-balance', 'PlayerController@getBalance');


Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);


//Route::get('/get-all-games/{page_number}/{type}', 'HomeController@getAllHomeGames');
Route::post('/games', 'HomeController@games');
Route::post('/games/get-by-ids', 'HomeController@getGamesByIds');
Route::post('/recover-password', 'PlayerController@recoverPassword');
Route::post('/update-password', 'PlayerController@updatePassword');
//Route::get('/games/{games_type}', ['uses' => 'HomeController@viewGames']);
//Route::post('/get-all-games', 'HomeController@getAllHomeGames');
Route::get('/sport', 'HomeController@sport');
Route::post('/player/register', 'PlayerController@register');
Route::post('/player/login', 'PlayerController@login');

Route::post('/live-chat/create-ticket', 'HomeController@createSupportTicket');
//Auth::routes();
//
Route::get('/logout', 'PlayerController@logout');
//
Route::post('/deposit', 'PlayerController@makeDeposit');
//Route::post('/withdraw', 'PlayerController@makeWithdraw');
//Route::get('/my-account', 'PlayerController@myAccount');
//
//Route::get('/profile', 'PlayerController@profile');
//Route::get('/game-history', 'PlayerController@gameHistory');
//Route::get('/active-games', 'PlayerController@activeGames');
//Route::get('/favourite-games', 'PlayerController@favouriteGames');
//Route::get('/favourite-sports', 'PlayerController@favouriteSports');
//Route::get('/kyc-docs', 'PlayerController@kycDocs');
//Route::post('/upload-kyc-docs', 'PlayerController@uploadkycDocs')->name('uploadkycDocs');
//Route::post('/contact-us',  'HomeController@contactUs');
//
//
//Route::get('/game/{game_vendor_id}', 'PlayerController@game')->name('single-game');
//Route::get('player-cards/{pid}/{ctype}', 'HomeController@getPlayerCards')->name('player-cards');
//Route::post('lpspayment', 'HomeController@makePayment')->name('lpspayment');
Route::post('/profile/update', 'PlayerController@profileUpdate');
//
//Route::get('/promotions', 'HomeController@promotions');
//Route::post('/cool-off', 'PlayerController@coolingOff');
//
//Route::post('/trustly-deposit', 'PlayerController@trustlyDepo');

Route::post('/affiliates/get-players-data', 'PlayerController@getAffiliates')->name('affiliates.get-players-data');
Route::post('/affiliates/get-transactions-data', 'PlayerController@getAffiliatesTransactionsData')->name('affiliates.get-transactions-data');