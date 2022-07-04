<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class LogoutController extends Controller {

    public function index() {
        
        return view('home');
    } 

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('home');
    }

}
?>