@extends('layouts.app')
@section('title', 'NOUS CONTACTER')
@section('content')

<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>NOUS <span class="octicon octicon-person"></span>CONTACT</h1>
        <h5>Votre partenaire de confort</h5>
        <div class="line_4"></div>
        <div class="line_5"></div>
        <div class="line_6"></div>
        <a href="/">Accueil</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="{{ route('pages.about') }}">A propos</a>
      </div>
    </div>
  </div>
  <!--===== #/PAGE TITLE =====-->


  <!--===== CONTACT US =====-->
  <section id="contact-us">
      <div class="container">
        <div class="row padding">

          <div class="col-md-8">
              <div class="bottom40">
                  <h2 class="text-uppercase">Envoyez-nous<span class="color_red"> un message </span></h2>
                  <div class="line_1"></div>
                  <div class="line_2"></div>
                  <div class="line_3"></div>
                </div>
                {{-- - Message success --}}
                @include('partials.success')

              <div class="agent-p-form p-t-30">

              <div class="row">
                  <form class="callus padding-bottom"  id="contact-form" action="{{ route('contact.store') }}" method="post">
                    @csrf

                    <div class="row">

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

          <div class="col-md-4">
              <div class="bottom40">
                  <h2 class="text-uppercase">Nous<span class="color_red"> joindre</span></h2>
                  <div class="line_1"></div>
                  <div class="line_2"></div>
                  <div class="line_3"></div>
                </div>

              <div class="agent-p-contact p-t-30">
              <div class="agetn-contact-2">
                <p><i class="icon-telephone114"></i> (+225) 07 69 69 22 68</p>
                <a href="#.">
                  <p><i class=" icon-icons142"></i>contact@sodefci.com</p>
                </a>
                <a href="#.">
                  <p><i class="icon-browser2"></i>www.sodefci.com</p>
                </a>
                <p><i class="icon-icons74"></i>Abidjan, Côte d'Ivoire Koumassi Nord -Est</p>
              </div>
              <ul class="socials">
                <li><a href="https://www.facebook.com/societedefroiddeconstruction" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/sodefci/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.linkedin.com/company/93282208/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>


  </section>
  <!--===== #/CONTACT US =====-->

@endsection
