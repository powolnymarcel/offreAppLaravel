<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public function auteur(){
        return $this->belongsTo('App\Auteur');
    }
}
