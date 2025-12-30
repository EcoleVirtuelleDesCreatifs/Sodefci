@extends('layouts.app')
@section('title', 'NOS SERVICES')
@section('content')

    <!--===== PAGE TITLE =====-->
    <div class="page-title page-main-section parallaxie">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Nos <span class="octicon octicon-person"></span>services</h1>
                <h5>Votre partenaire de confort</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="index.php">Accueil</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="service.php">Nos services</a>
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
                    <h2 class="text-uppercase">NOS <span class="color_red">SERVICES</span></h2>
                    <div class="line_1-1"></div>
                    <div class="line_2-2"></div>
                    <div class="line_3-3"></div>
                    <p class="heading_space">
                        C’est en mettant notre savoir-faire,
                        nos compétences et expériences au service de nos clients que nous avons bâti notre réputation.
                    </p>
                </div>
                <div class="col-sm-1 col-md-2"></div>
            </div>

        </div>
    </section>
    <!-- Our Mission End -->

    {{--  Liste des services---}}
    @include('partials.services')
@endsection
