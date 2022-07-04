<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class ProfilController extends Controller {

    public function index() {
        
        return view('profilo');
    } 

    public function vediprofilo()
    {
        if( Session::has('username'))
        {
        
        $username=Session::get('username');
        $rows=User::where("username","$username")
        ->get();
        foreach($rows as $row)
         {
            return view('profilo')
            ->with("row",$row);
         }

        //return redirect('home');
        }else
        return redirect('register');
    }
}
?>