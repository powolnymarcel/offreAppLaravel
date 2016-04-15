<?php

namespace App\Http\Controllers;
use App\Auteur;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function getLogin()
    {

        if(Auth::check()){
            $auteurs= Auteur::all();
            return view('admin.dashboard',['auteurs'=>$auteurs]);
        }
        else{
            return view('admin.login');

        }
    }


    public function getDashboard(){


        if(!Auth::check()){
            return redirect()->back();
        }

        $auteurs= Auteur::all();
        return view('admin.dashboard',['auteurs'=>$auteurs]);
    }

    public function postLogin(Request $request)
    {
        //Que faut il faire ?
        //1: Valider la requete, y a t'il eu un nom d'user et un pwd entré
        //2: Créer des errors si besoin
        //2: Peut on logger la personne avec les infos données

        $this->validate($request,[
            'nom'=>'required',
            'password'=>'required',
        ]);


       //En tache de fond LARAVEL va verifier si on peut se loger avec les parametres fourni
       // Dans le dossier config il faut modifier le fichier auth.php pour indiquer à laravel dans quelle table Mysql checker les donnees login
        if(!Auth::attempt(['nom'=>$request['nom'],'password'=>$request['password']])){
            return redirect()->back()->with(['fail'=>'Une erreur s\'est pproduite !']);
        }
        return redirect()->route('admin.dashboard');

    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');

    }



































}