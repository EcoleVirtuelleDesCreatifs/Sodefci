@extends('layouts.app')
@section('title', '404')
@section('content')

<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>ERREUR  <span class="octicon octicon-person"></span>404</h1>
        <h5>Votre partenaire de confort</h5>
        <div class="line_4"></div>
        <div class="line_5"></div>
        <div class="line_6"></div>
        <a href="/">Accueil</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="{{ route('pages.about') }}">A propos</a>
      </div>
    </div>
  </div>
  <!--===== #/PAGE TITLE =====-->


<!--===== ERROR 404 =====-->
<section id="error-404">
    <div class="container">
      <div class="row text-center">
        <div class="error-image col-sm-12">
          <img src="{{ asset('assets/images/404.png') }}" alt="image" class="bottom30" />
        </div>
        <div class="error-text col-sm-12">
          <h3>Page introuvable</h3>
          <p class="bottom20 top10">La page que vous recherchez a été déplacée, supprimée, renommée ou n'a peut-être jamais existé.</p>
          <a href="/" class="btn_fill">Retournez à la page d'accueil</a>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!--===== #/ERROR 404 =====-->


@endsection
