<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Offre;
use Illuminate\http\Request;


class OffresController extends Controller
    {
        public function recupererIndex()
        {
            $offres=Offre::orderBy('created_at', 'desc')->get();
           // $offres=Offre::all();
            return view('index',[
                'offres'=>$offres
            ]);
        }

        public function creationoffre(Request $request)
        {
            $this->validate($request,[
                'auteur'=>'required|max:60|alpha',
                'offre' => 'required|max:350'
            ]);

            $auteurInput = ucfirst($request['auteur']);
            $offreInput = $request['offre'];

            //On utilise eloquent ORM pour regarder enBDD si l'utilisateur est déjà crée
            $auteur=Auteur::where('nom',$auteurInput)->first();

            //Si il ne l'est pas alors on en crée un nuvea'
            if(!$auteur)
            {
                $auteur=new Auteur();
                $auteur->nom=$auteurInput;
                $auteur->save();
            }

            $offre=new Offre();
            //le on insere en BDD dans le champs "offre" le contenu de l'offre
            $offre->offre=$offreInput;
            //On ne fait pasun save car c'est une relation multiple
            // On va donc dans le modele auteur.php chercher la fonction offres
            //L'action save va prendre l'offre en parametre et pourra la stocker en BDD avec la bonne relation
            $auteur->offres()->save($offre);

            return redirect()->route('index')->with([
                'success'=>'Offre enregistrée']);
        }


         public function supprimerOffre($offre_id){
             $offre = Offre::find($offre_id);
             //$offre = Offre::where('id',$offre_id)->first();
             $auteur_supprime=false;

             //Si l'auteur n'a plus qu'une offre alors on delete son compte aussi
             if(count($offre->auteur->offres)===1){
                $offre->auteur->delete();
                 $auteur_supprime=true;
             }
             $offre->delete();
             //On construit un message, si auteur supprimé = true alors on affiche la premiere
             //partie sinon la deuxième partie du message ci dessous
             $message= $auteur_supprime ? 'Offre et utilisateur supprimé' : 'Offre supprimée';

                //On redirige vers la vue index avec le message
             return redirect()->route('index')->with(['success'=>$message]);
        }
    }

















