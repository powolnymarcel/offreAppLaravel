<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //Laravel a besoin de méthodes pour faire l'authtification, on peut le faire manuellement mais c'est long et compliquer, la facon la plus simple c'est
    // d'utiliser un "trait", il donnera toutes les methodes necessaire à laravel pour authentifier le modele

        use Authenticatable;

}
