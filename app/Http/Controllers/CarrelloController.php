<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class CarrelloController extends Controller {

    public function index() {
        
        return view('carrello');
    } 
        
//$in_query = "DELETE FROM tbordine WHERE tbordine.idlibro = $idlibro and tbordine.user=$user";
   
    public function rimuovi($idlibro){
        if( Session::has('username'))
        {
        
        $user=Session::get('idutente');

        $order=Order::where([
            
            'idlibro' => $idlibro,
            'iduser' => $user
            
            ])
            ->delete();
       
            if($order)
         {
           
            $returndata = array('ok' => true);

            echo json_encode($returndata);
            exit;
         }else{
            echo json_encode(array('ok' => false));
         }

        //return redirect('home');
        }else
        return redirect('register');
    }
    public function acquista($idlibro)
    {
        if( Session::has('username'))
        {
        
        $user=Session::get('idutente');

        $order=Order::create([
            
            'idlibro' => $idlibro,
            'iduser' => $user
            
            ]);
        if($order)
         {
           
            $returndata = array('ok' => true);

            echo json_encode($returndata);
            exit;
         }else{
            echo json_encode(array('ok' => false));
         }

        //return redirect('home');
        }else
        return redirect('register');
    }


    public function vedicarrello(){
        if( Session::has('username'))
        {
        
        $iduser=Session::get('idutente');
        
        $rows = Book::join("tbordine", 'tblibro.id', '=', 'tbordine.idlibro')
                    ->where("tbordine.iduser","$iduser")
                    ->get(['tbordine.id', 'tblibro.*']);

        if($rows){
        $likesArray = array();
        
        foreach($rows as $row)
         {
            $likesArray[] = $row;
            
         }
         echo json_encode($likesArray);
         //return view('carrello');
            exit;
        }else
         echo json_encode(array('ok' => false));
        //return redirect('home');
        }else
        return redirect('register');
    }
}
?>


    
   

   

