@extends('layout.principal')

@section('contenu')
    @if($errors->has())
        @foreach ($errors->all() as $error)
            <section class="alert alert-danger ">{{ $error }}</section>
        @endforeach
    @endif

    @if(Session::has('fail'))
            <section class="alert alert-danger ">{{ Session::get('fail') }}</section>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login via site</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" action="{{route('admin.login')}}" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="yourmail@example.com" name="nom" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>@endsection

