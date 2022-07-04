<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    protected $table='tbordine';
    public $timestamps=false;
    protected $fillable = [
        'idlibro', 'iduser' 
    ];
    //relazione classe utente
    public function user(){
        return $this->belongsToMany('App/models/User');
    }


}


?>