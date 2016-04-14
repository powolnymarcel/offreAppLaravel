@extends('layout.principal')
@section('contenu')
    <a href="{{route('accueil')}}">Accueil</a>
    <br>
   <p> Je {{$action}} {{$nom}}</p>
@endsection