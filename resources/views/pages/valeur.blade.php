
@extends('layouts.app')
@section('title', 'NOS VALEURS')
@section('content')

<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie">
  <div class="container padding-bottom-top-120 text-uppercase text-center">
    <div class="main-title">
      <h1>NOS<span class="octicon octicon-person"></span>VALEURS</h1>
      <h5>Votre partenaire de confort</h5>
      <div class="line_4"></div>
      <div class="line_5"></div>
      <div class="line_6"></div>
      <a href="/">Accueil</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="{{ route('pages.about') }}">A propos</a>
    </div>
  </div>
</div>
<!--===== #/PAGE TITLE =====-->


<!-- Our Mission Start -->
<section id="our-mission" class="padding">
  <div class="container">

        <div class="row mb-20">
          <div class="col-sm-1 col-md-2"></div>
          <div class="col-xs-12 col-sm-10 col-md-8 text-center">
            <h2 class="text-uppercase">Notre <span class="color_red">Histoire</span></h2>
            <div class="line_1-1"></div>
            <div class="line_2-2"></div>
            <div class="line_3-3"></div>
            <p class="heading_space">Nous mettons au service de nos clients notre expertise dans les domaines du froid
                et de la construction. Compétente sur l’étude et le montage personnalisé de vos installations, les dépannages urgents et la maintenance des installations,
                nous mettons tout en œuvre pour satisfaire nos clients.</p>
          </div>
          <div class="col-sm-1 col-md-2"></div>
        </div>



    </div>
</section>
<!-- Our Mission End -->



<!-- Our Value Start -->
<section id="services-page" class="padding our-value">
  <div class="container">

        <div class="row mb-20">
          <div class="col-sm-1 col-md-2"></div>
          <div class="col-xs-12 col-sm-10 col-md-8 text-center">
            <h2 class="text-uppercase">Nos <span class="color_blue">Valeurs</span></h2>
            <div class="line_1-1"></div>
            <div class="line_2-2"></div>
            <div class="line_3-3"></div>
            <p class="heading_space">
            SODEFCI porte des valeurs fortes et elle fait vivre au quotidien sur leurs chantiers et auprès de leurs clients.
            </p>
          </div>
          <div class="col-sm-1 col-md-2"></div>
        </div>

        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="services-page-box">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <h2>VISION</h2>
                    <p>
                    Devenir le partenaire de votre confort en
                     agissant dans une approche respectueuse de l’environnement, en privilégiant des propositions écologiques
                    et économiques afin de réduire la consommation énergétique et les rejets de déchets..

                    <br/>   <br/>
                </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="services-page-box">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <h2>Qualité</h2>
                    <p>
                    Plusieurs années d’expériences nous ont permis d’acquérir un savoir-faire
                    et une capacité à traiter de façon concrète les projets les plus complexes pour être en mesure de répondre à toutes les exigences techniques,
                     économiques et sanitaires de nos clients.
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="services-page-box">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <h2>Disponibilité </h2>
                    <p>
                    Pour garantir notre réactivité, SODEFCI dispose d’un réseau de proximité
                    et d’un service d’astreinte 24h/24-7j/7 entièrement pensé et adapté aux interventions urgentes.

                    <br/>   <br/>   <br/>   <br/>
                </p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- Our Value End -->


<!--===== OUR PARTNER =====-->
@include('partials.client')
<!--===== #/OUR PARTNER =====-->

@endsection

