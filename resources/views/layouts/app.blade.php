<!DOCTYPE html>
<html lang="fr">
<head>
<!-- SEO Meta Tags -->
@include('components.seo', ['page' => $seoPage ?? 'default'])

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/master.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color/color-1.css') }}" id="color" />

<!-- Lightbox2 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
</head>
<body>

<!--LOADER -->
<div class="loader">
  <div class="cssload-thecube">
    <div class="cssload-cube cssload-c1"></div>
    <div class="cssload-cube cssload-c2"></div>
    <div class="cssload-cube cssload-c4"></div>
    <div class="cssload-cube cssload-c3"></div>
  </div>
</div>
<!--LOADER -->


<!--===== BACK TO TOP =====-->
<div class="short-msg">
  <a href="#." class="back-to"><i class="icon-arrow-up2"></i></a>
  <a href="#." class="short-topup" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
</div>
<!--===== #/BACK TO TOP =====-->


<!-- HEADER -->
<header id="main_header" class="header_nin">

  <nav class="navbar navbar-default navbar-sticky bootsnav">

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Recherche">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">

        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
            </ul>
        </div>
        <!-- End Atribute Navigation -->

          <!-- Start Header Navigation -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i></button>
            <a class="navbar-brand sticky_logo" href="/"><img src="{{ asset('assets/images/logo.png') }}" class="logo" alt=""></a>
          </div>
          <!-- End Header Navigation -->

          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
              <li class="dropdown {{ Request::is('/') ?  'active' : '' }}">
                <a href="/" class="">ACCUEIL</a>

              </li>

              <li class="dropdown">
                <a href="{{ route('pages.about')}}" class="">NOTRE HISTOIRE</a>
              </li>
              <li class="dropdown {{ Request::is('notre-histoire') ?  'active' : '' }}">
                <a href="{{ route('pages.services') }}" class="">Notre expertise</a>
              </li>

              <li class="dropdown {{ Request::is('nos-realisations') ?  'active' : '' }}">
                <a href="{{ route('pages.work') }}" class="">Nos réalisations</a>
              </li>


              <li class="dropdown {{ Request::is('nos-produits') ?  'active' : '' }}">
                <a href="{{ route('pages.product') }}" class="">Quincaillerie</a>
              </li>

              <li class="dropdown {{ Request::is('demande-de-devis') ?  'active' : '' }}">
                <a href="{{ route('pages.devis') }}" class="">Demandez un devis</a>

              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </nav>
</header>
<!-- HEADER  -->

@yield('content')



<!-- CONTACT -->
<section id="contact" class="bg-color-red">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="get-tuch">
          <i class="icon-telephone114"></i>
          <ul>
            <li> <h4>CONTACT</h4> </li>
            <li> <p>+225 05 01 96 12 86</p> </li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="get-tuch">
          <i class="icon-icons74"></i>
          <ul>
            <li><h4>Abidjan, Côte d'Ivoire</h4></li>
            <li><p>Koumassi Nord -Est</p></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="get-tuch">
          <i class=" icon-icons142"></i>
          <ul>
            <li><h4>Adresse E-mail</h4></li>
            <li><a href="mailto:contact@sodefci.com">contact@sodefci.com</a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- CONTACT -->

<!-- FOOTER -->
<footer id="footer" class="footer divider layer-overlay overlay-dark-8">
  <div class="container pt-70 pb-40">
    <div class="row border-bottom">
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <img class="mt-5 mb-20" alt="" src="images/logo.png">
          <p>Koumassi Nord -Est</p>
          <ul class="list-inline mt-5">
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-color-2 mr-5"></i> <a class="text-gray" href="#.">27 21 34 49 92</a> </li>
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i> <a class="text-gray" href="#.">contact@sodefci.com</a> </li>
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-color-2 mr-5"></i> <a class="text-gray" href="">www.sodefci.com</a> </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h4 class="widget-title">MENU NAVIGATION</h4>
          <div class="small-title">
            <div class="line1 background-color-white"></div>
            <div class="line2 background-color-white"></div>
            <div class="clearfix"></div>
          </div>
          <ul class="list angle-double-right list-border">
            <li> <a href="\">ACCUEIL </a></li>
            <li> <a href="{{ route('pages.services') }}">Nos services </a></li>
            <li> <a href="{{ route('pages.valeur') }}">Nos valeurs</a></li>
            <li> <a href="{{ route('pages.about') }}">Notre histoire</a></li>
            <li> <a href="{{ route('pages.work') }}">Nos réalisations </a></li>

          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h4 class="widget-title ">LIENS UTILES</h4>
          <div class="small-title">
            <div class="line1 background-color-white"></div>
            <div class="line2 background-color-white"></div>
            <div class="clearfix"></div>
          </div>
          <ul class="list list-border">
            <li> <a href="{{ route('pages.devis') }}">Demande de devis </a></li>
            <li> <a href="{{ route('pages.contact') }}">Contactez-nous </a></li>
            <li><a href="{{ route('pages.mentions') }}">Mentions légales</a></li>
            <li><a href="{{ route('login') }}">Espace commercial</a></li>

          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h4 class="widget-title">Heures de services</h4>
          <div class="small-title">
            <div class="line1 background-color-white"></div>
            <div class="line2 background-color-white"></div>
            <div class="clearfix"></div>
          </div>
          <div class="opening-hourse">
            <ul class="list-border">
              <li class="clearfix">
                <span> Lundi - Jeudi : </span>
                <div class="value pull-right"> 8h00 - 17h30 </div>
              </li>
              <li class="clearfix">
                <span>Vendredi :</span>
                <div class="value pull-right"> 8h00 - 17h00 </div>
              </li>
              <li class="clearfix">
                <span> Samedi : </span>
                <div class="value pull-right"> 8h00 - 13h00 </div>
              </li>
              <li class="clearfix">
                <span> Dimanche : </span>
                <div class="value pull-right"> Fermé </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-30">
      <div class="col-md-3 col-sm-4">
        <div class="widget dark">
          <h5 class="widget-title mb-10">NOUS JOINDRE</h5>
          <div class="text-gray"> +225 07 69 69 22 68  <br>
            +225 05 01 96 12 86
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-4">
        <div class="widget dark">
          <h5 class="widget-title mb-10">Suivez-nous</h5>
          <ul class="socials">
            <li><a href="https://www.facebook.com/societedefroiddeconstruction" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/sodefci/" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://www.linkedin.com/company/93282208/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-sm-4 text-right">
        <div class="mb20">
          <form class="padding-top-30">
            <input class="search" placeholder="Entrez votre adresse e-mail" type="search">
            <a href="#." class="button"><i class="icon-mail-envelope-open"></i></a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom bg-black-333">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-5">
          <p class="font-11 text-black-777 m-0 copy-right">Copyright: 2023 <a href="#."><span class="color_red">SODEFCI</span></a>. Tous droits reservés</p>
        </div>
        <div class="col-md-6 col-sm-7 text-right">
          <div class="widget no-border m-0">
            <ul class="list-inline sm-text-center mt-5 font-12">
              <li>Développé par <a href="https://ingenieuxdigital.com/"  target="_blank"> <span class="color_red">Ingénieux Digital</span></a> </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- FOOTER -->




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Besoin <span class="color_red">d'aide ?</span></h2>
      </div>

      <div class="modal-body">

        <p class="bottom40">

Laissez-nous un message, un membre de l'équipe de SODEFCI vous contactera dans les meilleurs délais.
        </p>

        <div class="short-msg-tab">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Votre préoccupation</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="row">
                <div class="col-md-12"><h3>Besoin</h3></div>
                <form class="callus padding-bottom" id="contact-form" action="{{ route('contact.store') }}" method="post">

                    @csrf
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group single-query">
                              <label><strong>Nom</strong></label>
                            <input type="text" name="name" value="{{ old('name') }}"  class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group single-query"">
                              <label><strong>Adresse E-mail</strong></label>
                              <input type="email" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror">
                              @error('email')
                                  <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group single-query"">
                              <label><strong>Contact</strong></label>
                            <input type="number" name="number"  value="{{ old('number') }}" class="form-control  @error('number') is-invalid @enderror">
                            @error('number')
                                 <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>

                        <div class="col-md-12">
                            <div class="form-group single-query"">
                                      <label><strong>Votre besoin</strong></label>
                                      <textarea name="message"  class="form-control  @error('message') is-invalid @enderror" id="message">
                                          {{ old('message') }}
                                      </textarea>
                                      @error('message')
                                         <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn_fill" id="btn_submit" name="btn_submit">Envoyer</button>
                    </div>

                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="dark_border" data-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>
<!-- #/Modal -->


<!--===== REQUIRED JS =====-->
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootsnav.js') }}"></script>

<!--To View on scroll-->
<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>

<!--Owl Slider-->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!--Parallax-->
<script src="{{ asset('assets/js/parallaxie.js') }}"></script>

<!--Fancybox-->
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>

<!--Cube Gallery-->
<script src="{{ asset('assets/js/cubeportfolio.min.js') }}"></script>

<!--Bootstrap Dropdown-->
<script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>

<!--Video Popup-->
<script src="{{ asset('assets/js/videobox/video.js') }}"></script>

<!--Datepicker-->
<script src="{{ asset('assets/js/datepicker.js') }}"></script>

<!--Dropzone-->
<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>

<!--Wow animation-->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>

<!--Rang Slider-->
<script src="{{ asset('assets/js/range-Slider.min.js') }}"></script>

<!--Checkbox-->
<script src="{{ asset('assets/js/selectbox-0.2.min.js') }}"></script>

<!--Checkbox-->
<script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

<!--Checkbox-->
<script src="{{ asset('assets/js/jquery-countTo.js') }}"></script>

<!--Checkbox-->
<script src="{{ asset('assets/js/jquery.typewriter.js') }}"></script>

<!--Checkbox-->
<script src="{{ asset('assets/js/death.min.js') }}"></script>

<!--Revolution Slider-->
<script src="{{ asset('assets/js/themepunch/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/js/themepunch/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('assets/js/themepunch/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('assets/js/themepunch/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('assets/js/themepunch/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/themepunch/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('assets/js/themepunch/revolution.extension.video.min.js') }}"></script>

<!--Custom Js -->
<script src="{{ asset('assets/js/functions.js') }}"></script>

<!--Maps & Markers-->
<script src="{{ asset('assets/js/form.js') }}"></script>
<script src="{{ asset('assets/js/custom-map.js') }}"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U"></script>
<script src="{{ asset('assets/js/gmaps.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>

<!-- Lightbox2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel': "Image %1 sur %2"
    });
</script>
<!--===== #/REQUIRED JS =====-->


<script src="//code.tidio.co/xxo460o1mcbi9uqfbjemlkmut4ofmwij.js" async></script>
</body>

<!-- Mirrored from logicsforest.com/themeforest/idea-homes/ideahomes_demo_files/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 17:05:47 GMT -->
</html>


