<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{
    protected $table='tblibro';
   public $timestamps=false;
   

   public function likes(){
    return $this->belongsToMany('App/Models/User','Like');

}
public function orders(){
    return $this->belongsToMany('App/Models/User','Order');

}
}


?>