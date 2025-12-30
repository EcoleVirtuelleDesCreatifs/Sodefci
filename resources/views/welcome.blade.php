@extends("layouts.app")
@section('title', 'ACCUEIL')
@section('content')

<!-- Banner -->
<section id="banner-nin" class="parallaxie">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="banner_detail">
            <h2>Société DE <span>Froid de Construction </span>et d’Ingénierie</h2>
            <div id="typewriter"></div>
            <div class="btns-box">
              <a href="{{ route('pages.devis') }}" class="btn_fill">Demandez un devis</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /#Banner -->

  <!-- Counter Section -->
  <div id="counter-section" class="p_b_230">
    <div class="container">

        <div class="row mb-20">
          <div class="col-sm-1 col-md-2"></div>
          <div class="col-xs-12 col-sm-10 col-md-8 text-center">
            <h2 class="text-uppercase">Pourquoi choisir<span class="color_red"> SODEFCI</span></h2>
            <div class="line_1-1"></div>
            <div class="line_2-2"></div>
            <div class="line_3-3"></div>
            <p class="heading_space">
            La société SODEFCI (Société de Froid de Construction et d’Ingénierie), une entreprise de droit commun ivoirien qui existe officiellement depuis plusieurs années.
            Elle est constituée d'une équipe d'ingénieurs
            et de spécialistes passionnés par leur dommaine de compétences avec plus de cinq (5) ans d'expériences chacun.
          </p>
          </div>
          <div class="col-sm-1 col-md-2"></div>
        </div>

    </div>
  </div>


  <section class="page-section-ptb">
    <div class="container">
    <div class="custom-content">

          <div class="row">
            <div class="col-xs-12 bottom40">
              <h2>Société DE <span class="color_blue">Froid de Construction et d’Ingénierie</span></h2>
              <div class="line_1"></div>
              <div class="line_2"></div>
              <div class="line_3"></div>
              <p>
              La société SODEFCI (Société DE Froid de Construction et d’Ingénierie), une entreprise de droit commun ivoirien qui existe officiellement depuis plusieurs années.

              </p>
            </div>
          </div>

          <div class="row">

               <div class="col-lg-4 col-md-4">
                    <div class="popup-video">
                      <img class="img-responsive full-width" src="{{ asset('assets/images/counter.jpg') }}" alt="">
                       <div class="pro-video">
                            <a title="PRESENTATION DE SODEFCI" data-height="420" data-width="900" class="html5lightbox content-vbtn-color-blue" href="{{ asset('assets/video/video.mp4')}}"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>

                     </div>
                  </div>

               <div class="col-lg-8 col-md-8">
                    <h5>NOTRE CLIENT, NOTRE PRIORITE</h5>
                      <div class="row">
                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="feature-text left-icon">
                            <div class="feature-icon">
                              <i class="icon-library"></i>
                            </div>
                            <div class="feature-info">
                              <h5>Froid industriel & domestique </h5>
                              <p>Chambre froide, Désinfection, Installation de climatiseur, maintenance et dépannage, Assistance conseil
  </p>
                            </div>
                          </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="feature-text left-icon">
                               <div class="feature-icon">
                                <i class="icon-office"></i>
                              </div>
                              <div class="feature-info">
                                <h5>Construction et Ingénierie</h5>
                                <p>Electricité, Réhabilitation et rénovation, Génie civil, Entretien et nettoyage de site
  Peinture et revêtement, Etude de projet et construction, Construction de bâtiment, Construction métallique, Menuiserie
  </p>
                              </div>
                            </div>
                         </div>
                      </div>
                  </div>
         </div>

       </div>
      </div>
    </section>
  <!-- /#Counter Section -->

  <!-- Main Features -->
  <section id="main-features" class="padding">
    <div class="container">

      <div class="row mb-20">
        <div class="col-sm-1 col-md-2"></div>
        <div class="col-xs-12 col-sm-10 col-md-8 text-center">
          <h2 class="text-uppercase">DECOUVREZ-NOUS :  <span class="color_red">SODEFCI</span></h2>
          <div class="line_1-1"></div>
          <div class="line_2-2"></div>
          <div class="line_3-3"></div>
          <p class="heading_space">
  Nous mettons au service de nos clients notre expertise dans les domaines du froid et de la construction. Compétente sur l’étude et le montage personnalisé de vos installations, les dépannages urgents et la maintenance des installations, nous mettons tout en œuvre pour satisfaire nos clients.

          </p>
        </div>
        <div class="col-sm-1 col-md-2"></div>
      </div>

      <div class="row">
        <div class="col-sm-5">
          <div class="features-img"> <img src="{{ asset('assets/images/main-feature.png') }}" alt=""> </div>
        </div>
        <div class="col-sm-7">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa icon-library" aria-hidden="true"></i> </div>
            <div class="media-body">
              <h4 class="media-heading">Qualité de services</h4>
              <p>
              Plusieurs années d’expériences nous ont permis d’acquérir un savoir-faire et une capacité à traiter de façon concrète les projets les plus complexes
              pour être en mesure de répondre à toutes les exigences techniques, économiques et sanitaires de nos clients.
              </p>
            </div>
          </div>
          <div class="media service-box">
            <div class="pull-left"> <i class="fa icon-office" aria-hidden="true"></i> </div>
            <div class="media-body">
              <h4 class="media-heading">Proximité</h4>
              <p>
              Notre structure est motivée par un souci constant de qualité de service et de réactivité. Elle apporte à nos clients savoir-faire et proximité,
              des facteurs-clés dans le domaine de la construction immobilière et industrielle.
              </p>
            </div>
          </div>
          <div class="media service-box">
            <div class="pull-left"> <i class="fa icon-user-tie" aria-hidden="true"></i> </div>
            <div class="media-body">
              <h4 class="media-heading">Respect de l’environnement</h4>
              <p>
              Aux côtés de nos clients, nous agissons dans une approche respectueuse de l’environnement en privilégiant des propositions
              écologiques et économiques afin de réduire la consommation énergétique et les rejets de déchets.
              </p>
            </div>
          </div>
          <div class="media service-box">
            <div class="pull-left"> <i class="fa icon-history" aria-hidden="true"></i> </div>
            <div class="media-body">
              <h4 class="media-heading">Disponibilité hors norme</h4>
              <p>
              Pour garantir notre réactivité, nous disposons d’un réseau de proximité
              et d’un service d’astreinte 24h/24-7j/7 entièrement pensé et adapté aux interventions urgentes.
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- /#Main Features -->

  <!--services-->

  <!--/#services-->



  <!--===== Gallery =====-->
    @include('partials.works')
  <!--===== #/Gallery =====-->

  <!-- IMAGE WITH CONTENT -->
  <section class="image-text-eig parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1 text-center">
                <div class="image-text-eig-details">
                    <h2>SODEFCI</h2>
                    <h5>Société de Froid de Construction et d’Ingénierie</h5>
                    <p>
                    Nous offrons à nos clients un service sous la forme de formules d’abonnements à divers tarifs qui incluent l’entretien, la désinfection, à la vapeur sèche des équipements de climatisation.
                    L’entretien à la vapeur est notre innovation.
                    </p>
                    <a href="{{ route('pages.contact') }}" class="btn_fill">Contactez-nous</a>
                </div>
            </div>
        </div>
    </div>

  </section>
  <!-- IMAGE WITH CONTENT -->

  {{-- - Client --}}
  @include('partials.client')


@endsection
