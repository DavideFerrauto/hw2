<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class HomeController extends Controller {

    public function index() {
        
        return view('home');
    } 

    public function caricaHome($genere){
        
        $rows= Book::where("genere","$genere")
        ->get();

        
        $eventi=array();
        foreach($rows as $row)
        {
            
            $eventi[] = $row;
        }
        //echo json_encode(array('h1'=>$js));
        echo json_encode($eventi);

    } 


    public function fetchLikes(){
    if( Session::has('username'))
    {
   
        //header('Content-Type: application/json');
       // $idlibro = mysqli_real_escape_string($conn, $_POST["idlibro"]);
    // Prendo tutti gli utenti che hanno messo like a quel post
    //$query = " SELECT idlibro FROM tblike WHERE iduser= $_SESSION[idutente]  ";
    $user=Session::get('idutente');
    $rows= Like::where("iduser","$user")
    ->get();
    
    // Creo l'array che conterrà i miei risultati
    $likesArray = array();
    $likesArray[] = array('connesso' =>true);
        // Se ci sono risultati, li scorro e riempio l'array che ritornerò al frontend
        foreach($rows as $row) {
                $likesArray[] = array('connesso' =>true ,'libro' => $row['idlibro'] );
        }
    
    
    echo json_encode($likesArray);
    }else
    echo json_encode("{}");
    
    exit;
    }




    public function aggiungiLike($idlibro){
        
 if( Session::has('username'))
    {
       // $request = request();
        //$idlibro = $request["idlibro"];
    $user=Session::get('idutente');
/*
    $like= new Like;
    $like->iduser=$user;
    $like->idlibro=$idlibro;
    $like->save();
/*/
$like=  Like::create([
            
            
    'iduser' => $user,
    'idlibro' => $idlibro
    ]);

    $rows= Book::where("id","$idlibro")
    ->get();

    // Aggiungo un'entry ai like
    //$in_query = "INSERT INTO tblike (iduser, idlibro) VALUES($_SESSION[idutente] , $idlibro)";
    // Si attiva il trigger che aggiorna il numero di likes
    // Prendo il nuovo numero di like
    //$out_query = "SELECT id,likes FROM tblibro WHERE id = $idlibro";

    
    
        
        foreach($rows as $row) {

            
            $returndata = array('ok' => true, 'nlikes' => $row['likes'],'id' => $row['id']);

            echo json_encode($returndata);
            exit;

        }
    

    
    echo json_encode(array('ok' => false));
    }
    }
    /////////////////////////

    public function unlike($idlibro){
        if( Session::has('username'))
         {
            $user=Session::get('idutente');
           
        
            // Aggiungo un'entry ai like
            

            $result=Like::where('iduser',"$user")
            ->where('idlibro',"$idlibro")
            ->delete();

            $rows= Book::where("id","$idlibro")
            ->get();
        
          
        
        
                foreach($rows as $row)
                {
        
                    $returndata = array('ok' => true, 'nlikes' => $row['likes'],'id' => $row['id']);
        
                    echo json_encode($returndata);
        
                    
        
                    exit;
        
                }
            }
        
            
            echo json_encode(array('ok' => false));
        }



    }

?>