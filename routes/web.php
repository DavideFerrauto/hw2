<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CarrelloController;
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
    return view('welcome');
});

//definiamo la route per la registrazione
//Route::get('register','RegisterController@index');

Route::get('register',[App\Http\Controllers\RegisterController ::class , 'index']);

Route::post('register',[App\Http\Controllers\RegisterController ::class , 'register']);
Route::get('register/username/{username}',[App\Http\Controllers\RegisterController ::class , 'checkUsername']);
Route::get('register/email/{email}',[App\Http\Controllers\RegisterController ::class , 'checkEmail']);



Route::get('home',[App\Http\Controllers\HomeController ::class , 'index']);
Route::get('home/caricaHome/{genere}',[App\Http\Controllers\HomeController ::class , 'caricaHome']);
Route::get('home/caricaLike',[App\Http\Controllers\HomeController ::class , 'fetchLikes']);

Route::get('login',[App\Http\Controllers\LoginController ::class , 'index']);
Route::post('login',[App\Http\Controllers\LoginController ::class , 'dologin']);

Route::get('logout',[App\Http\Controllers\LogoutController ::class , 'perform']);
Route::get('home/aggiungiLike/{idlibro}',[App\Http\Controllers\HomeController ::class , 'aggiungiLike']);

Route::get('home/unlike/{idlibro}',[App\Http\Controllers\HomeController ::class , 'unlike']);

Route::get('profilo',[App\Http\Controllers\ProfilController ::class , 'index']);
Route::get('profilo',[App\Http\Controllers\ProfilController ::class , 'vediprofilo']);

Route::get('ricerca', function () {
    
    if( Session::has('username'))
    {
        return view('ricerca');
    }else
    {
        return redirect('login');
    }
});

Route::get('ricerca/{testo}', function ($test) {
    
    if( Session::has('username'))
    {
        $client_id =     "d4c860fba30d49e5ad6cce24a046379b";
        $client_secret = "5174c572bd624d8588ce342797b766a4";
        
          
        // Richiesta token
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        //echo $result."<br>";
        //echo "<pre>";
        //print_r(json_decode($result));
        //echo "</pre>";
        curl_close($curl);
        
        // Utilizzo
        $token = json_decode($result)->access_token;
        $data = http_build_query(array("q" => "$test", "type" => "album"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$data);
        $headers = array("Authorization: Bearer ".$token);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resulta = curl_exec($curl);
       //$json= json_encode ($resulta,true);
       //print_r($json) ; 
        return $resulta;
        curl_close($curl);
      
    }else
    {
        return redirect('login');
    }
});

Route::get('carrello',[App\Http\Controllers\CarrelloController ::class , 'index']);
Route::get('carrello/acquista/{idlibro}',[App\Http\Controllers\CarrelloController ::class , 'acquista']);
Route::get('carrello/vedicarrello',[App\Http\Controllers\CarrelloController ::class , 'vedicarrello']);
Route::get('carrello/rimuovi/{idlibro}',[App\Http\Controllers\CarrelloController ::class , 'rimuovi']);

