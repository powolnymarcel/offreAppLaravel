@extends('layout.principal')

@section('titre')
    Les offres en vedettes
@endsection

@section('styles')
@endsection

@section('contenu')
    <section class="row">
        <div class="col-md-12">
            <h3>    Les offres en vedettes       </h3>
                <article class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="pull-right"><a href="">X</a></div>
                        <div class="caption">
                            <h3>Offre 1</h3>
                            <p>TEXTE</p>
                            <small>Par tot</small>
                            <p>
                                <a href="#" class="btn btn-default" role="button">Button</a>
                            </p>
                        </div>
                    </div>
                </article>
        </div>
    </section>
    <aside class="row">
        <div class="col-md-12">
            <h3>    Ajouter une offre     </h3>
            <form action="{{route('creation ')}}" method="post">
                <div class="form-group">
                    <label for="auteur">Votre nom</label>
                    <input class="input-group" type="text" name="auteur" id="auteur" placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <label for="offre">Votre offre</label>
                    <textarea class="input-group" name="offre" id="offre" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Envoyer l'offre</button>
                <input type="hidden" value="{{Session::token()}}">
            </form>
        </div>
    </aside>

@endsection