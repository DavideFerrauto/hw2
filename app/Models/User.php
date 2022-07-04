<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table='tbutente';
   public $timestamps=false;
    protected $fillable = [
        'nome', 'cognome','username','email', 'password','sesso' 
    ];
    //relazione classe utente
    public function likes(){
        return $this->belongsToMany('App/Models/Book','Like');

    }
    public function orders(){
        return $this->belongsToMany('App/Models/Book','Order');

    }

}


?>