<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assement extends Model
{
   
  Protected $table ='assement';
  protected $fillable = [
        'nombre_usuario', 'comentario',


    ];

}
