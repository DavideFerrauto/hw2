<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model{

    protected $table='tblike';
    public $timestamps=false;
    protected $fillable = [
        'iduser', 'idlibro' 
    ];
    //relazione classe utente
    public function user(){
        return $this->belongsToMany('App/models/User');
    }


}


?>