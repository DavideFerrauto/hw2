<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller {



    public function index() {
        return view('login');
    } 

    public function dologin(){
        $request = request();

    if(isset($request['username']) && isset($request['password']))
    {
    $username=$request['username'];
    $rows= User::where("username","$username")
        ->get();
    
    foreach($rows as $row)
    {
            $plain=$request['password'];
            $hashed=$row['password'];
       // if($password == $entry['password']) //per le password in chiaro
       if (Hash::check($plain, $hashed)) {
     
    
        Session::put('idutente', $row['id']);
        Session::put('username', $row['username']);
       }    
        return redirect('home');
        exit; 
        }
    
        $error = "Username e/o password errati.";
    }
    
  
  else if (isset($request['username']) || isset($request['password'])) {
      // Se solo uno dei due è impostato
      $error = "Inserisci username e password.";
  }

    }

}

?>