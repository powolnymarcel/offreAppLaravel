@extends('layout.principal')

@section('titre')
    Les offres en vedettes
@endsection

@section('styles')
@endsection

@section('contenu')
    <section class="row">
        <div class="col-md-12">
            @if(!empty(Request::segment(1)))

                <section class="alert alert-success ">Un filtre a été appliqué !
                    <br>
                    <a href="{{route('index')}}">Retour accueil</a>
                </section>


            @endif
                @if(Session::has('success'))
                    <section class="alert alert-success">{{ Session::get('success') }}</section>
                @endif
            <h3>    Les offres en vedettes</h3>
                @for($i=0;$i<count($offres);$i++)
                    <article class="col-sm-6 col-md-4 offre">
                      <!--  <article class="col-sm-6 col-md-4 offre{{$i % 3 ===  0 ? '-premier' : (($i + 1) % 3 ===0 ? '-dernier' :'') }}">-->
                    <div class="thumbnail">
                        <div class="pull-right"><a href="{{route('supprimer',['offre_id'=>$offres[$i]->id])}}">X</a></div>
                        <div class="caption">
                            <p>{{$offres[$i]->offre}}</p>
                            <small>Crée par <a href="{{route('index',['auteur'=>$offres[$i]->auteur->nom])}}" >{{$offres[$i]->auteur->nom}}</a> </small>
                            <br>
                            <small>Le {{$offres[$i]->created_at}} </small>
                        </div>
                    </div>
                </article>
                @endfor

        </div>
    </section>
    <nav class="text-center">
        <ul>
            @if($offres->currentPage() !== 1)
                <a href="{{$offres->previousPageUrl()}}">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
            @endif
                @if($offres->currentPage() !== $offres->lastPage() && $offres->hasPages())
                    <a href="{{$offres->nextPageUrl()}}">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                @endif
        </ul>
    </nav>
    <aside class="row">
        <div class="col-md-12">
            @if($errors->has())
                @foreach ($errors->all() as $error)
                    <section class="alert alert-danger ">{{ $error }}</section>
                @endforeach
            @endif
            <h3>    Ajouter une offre     </h3>
            <form action="{{route('creation')}}" method="post">
                <div class="form-group">
                    <label for="auteur">Votre nom</label>
                    <input class="input-group" type="text" name="auteur" id="auteur" placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <label for="offre">Votre offre</label>
                    <textarea class="input-group" name="offre" id="offre" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Envoyer l'offre</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </aside>

@endsection