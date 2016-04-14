<?php

namespace App\http\Controllers;

use App\Auteur;
use App\Offre;
use Illuminate\http\Request;


class OffresController extends Controller
    {
        public function recupererIndex()
        {

        }

        public function creationoffre(Request $request)
        {
            $auteurInput = ucfirst($request['auteur']);
            $offreInput = $request['offre'];

            //On utilise eloquent ORM
            $auteur=Auteur::where('nom',$auteurInput)->first();
            if(!$auteur)
            {
                $auteur=new Auteur();
                $auteur->nom=$auteurInput;
                $auteur->save();
            }

            $offre=new Offre();
            $offre->offre=$offreInput;
            //On ne fait pasun save car c'est une relation multiple
            // On va donc dans le modele auteur.php chercher la fonction offres
            //L'action save va prendre l'offre en parametre et pourra la stocker en BDD avec la bonne relation
            $auteur->offres()->save($offre);

        }
    }