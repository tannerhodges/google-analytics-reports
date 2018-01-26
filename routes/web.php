<?php

use Illuminate\Support\Facades\Input;

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

Route::get('/', function () {
    // If the user has not already authorized this app
    // redirect to ask the user to authorize access to Google Analytics.
    if (empty(session('access_token'))) {
      return redirect('oauth2callback');
    }

    return view('welcome');
});

Route::get('/oauth2callback', function () {
    // Create the client object and set the authorization configuration
    // from the client_secrets.json you downloaded from the Developers Console.
    $client = new Google_Client();
    $client->setAuthConfig(base_path('client_secrets.json'));
    $client->setRedirectUri(url('oauth2callback'));
    $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

    // Handle authorization flow from the server.
    if (!Input::get('code')) {
        return redirect($client->createAuthUrl());
    }

    $client->authenticate(Input::get('code'));
    session(['access_token' => $client->getAccessToken()]);
    return redirect('/');
});
