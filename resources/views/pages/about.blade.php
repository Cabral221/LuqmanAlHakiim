@extends('layouts.user.app', ['title' => 'A PROPOS'])

@section('css')
<link rel="stylesheet" type="text/css" href="css/galerie.css">
<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
@endsection

@section('text-header')
<!-- Header -->
<header id="headerwrap" class="dark-wrapper backstretched special-max-height no-overlay">
    <div class="container vertical-center">
        <div class="intro-text vertical-center text-center smoothie">
            <h1 class="intro-heading wow fadeIn heading-font" data-wow-delay="0.2s">{{ config('app.name', 'Laravel') }}</h1>
            <h2 class="wow fadeIn heading-font" data-wow-delay="0.2s">A propos</h1>
            <div class="intro-sub-heading wow fadeIn secondary-font" data-wow-delay="0.4s">
                <span class="rotate">
                    - Memorisation du Saint Coran,
                    - Alphabétisation,
                    - Franco-islamique
                </span>
            </div>
            <a href="{{ route('user.admission') }}" class="btn btn-primary mt-5"><h4>Préinscrire mon(es) enfant(s)</h4></a>
        </div>
    </div>
</header>
@endsection

@section('content')
<div class="container text-dark p-3">
    <div class="header text-center"><h2>Historique</h2></div>
    <div class="row p-3 mt-5">
        <p>Le Daara luqmane Al Hakiim est un internat qui existe depuis 1998.</p>
        <p>A ses débuts le Daara était situé à Sicap Liberté 2 avant d’être délogé à Thiaroye, Guédiawaye puis Yoff. Il trouve son siège actuellement à Rufisque.</p>
        <p>L’actuel Président Directeur Général de l’internat Thierno Ishakh SOW hérita du Daara de son père Djiby Issaga SOW qui en est le fondateur. Ce dernier en 2016 initia la modernisation du Daara en le transformant en internat pour accueillir des filles et des garcons.</p>

    </div>

    <div class="header text-center"><h2>Objectifs du Daara</h2></div>
    <div class="row p-3 mt-5">
        <p>L’objectif principal du Daara Luqmane Al Hakiim est de former des modèles de sociétés dans l’avenir.</p>
        <ul>
            <li>Former des Imams Ingénieurs</li>
            <li>Former une jeunesse modèle</li>
            <li>Participer sur l’éducation Islamique des enfants</li>
        </ul>
        <p>Ainsi pour atteindre ces objectifs fixés nous mettons nos internés dans les meilleures conditions de vie, d’étude et d’épanouissement.</p>
        <p>Et au sortir d’un séjour à Luqmane Al Hakiim l’interné à tous les outils nécessaires pour faire face aux aléas de vie et une bonne éducation religieuse pour vivre en société.</p>
    </div>

    <div class="header text-center"><h2>Perspective du Daara</h2></div>
    <div class="row p-3 mt-3">
        <p>Un travail sans cesse, avec une équipe dynamique au service des enfants, parents et tuteurs.</p>
        <p>Le Daara Luqmane Al Hakiim sur la demande des parents souhaiterai faire progresser le projet dans les autres régions.</p>
    </div>

    <div class="header text-center"><h2>Book recommended</h2></div>
    <div class="row p-3 mt-5">
        @if (isset($books) && $books->count() > 0)
            @foreach ($books as $book)
                <div class="col-sm-6 col-md-6 col-lg-6 pt-2">

                    <div class="media">
                        <div class="pull-left">
                            <img class="" width="100px" src="{{ $book->image }}" alt="pochette du livre">
                        </div>
                        <div class="media-body text-dark">
                            <div>
                                <span class="media-heading"> <h5>{{ $book->title }}</h5></span>
                            </div>
                            <div>
                                <small class="muted">by</small> : <strong>{{ $book->auteur }}</strong>
                            </div>
                            <small class="muted"> P. {{ Date('Y',strtotime($book->dateOut)) }}</small>
                        </div>
                    </div>

                </div>
            @endforeach
        @else
            <p>Aucun livre recommander pour le moment...</p>
        @endif
    </div>
    <div class="header text-center p-3"><h2>Daara luqmane Al Hakiim en images</h2></div>
    <div class="row" p-3 mt-5>
        <div class="gallery">
            <div class="card-columns">
                @if (isset($galeries) && $galeries->count() > 0)
                    @foreach ($galeries as $galery)
                        <div class="card">
                            <a href="{{ $galery->image }}" data-lightbox="mygallery" data-title="{{ $galery->libele }}"><img class="card-img-top img-responsive" src="{{ $galery->image }}"></a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $galery->libele }}</h5>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Aucune images pour le moment...</p>
                @endif
            </div>
            <div class="text-center">
                @if (isset($galeries) && $galeries->count() > 0)
                {{ $galeries->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
