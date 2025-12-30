@extends('layouts.app')
@section('title', 'NOS REALISATIONS')
@section('content')

    <!--===== PAGE TITLE =====-->
    <div class="page-title page-main-section parallaxie">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Nos <span class="octicon octicon-person"></span>réalisations</h1>
                <h5>Votre partenaire de confort</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="index.php">Accueil</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="service.php">Nos réalisations</a>
            </div>
        </div>
    </div>
    <!--===== #/PAGE TITLE =====-->
    {{--- Liste des travaux--}}
    @include('partials.works')
@endsection
