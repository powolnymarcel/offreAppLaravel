@extends('layout.principal')

@section('contenu')
    <ul>
    @foreach($auteurs as $auteur)
            <li>{{$auteur->nom}}
            <ul>
                <li>{{$auteur->email}}</li>
            </ul>
            </li>
    @endforeach
    </ul>
@endsection

