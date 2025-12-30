@extends('layouts.app')
@section('title', 'DEMANDE DE DEVIS')
@section('content')

<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>Demande de <span class="octicon octicon-person"></span>devis</h1>
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
  <section id="contact-us-2" class="padding parallaxie">

      <div class="container">

          <div class="row">

              <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">

                  <div class="contact-bg">

                      <div class="bottom40">
                        <h2 class="text-uppercase">Votre<span class="color_red"> demande </span></h2>
                        <div class="line_1"></div>
                        <div class="line_2"></div>
                        <div class="line_3"></div>
                      </div>
                      {{-- -Message de succes --}}
                      @include('partials.success')

                      <form class="contact-form" action="{{ route('devis.store') }}" method="post">
                        @csrf
                          <div class="row">

                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <div class="form-group single-query">
                                        <label><strong>Nom</strong></label>
                                      <input type="text" name="name" value="{{ old('name') }}"  class="form-control  @error('name') is-invalid @enderror" placeholder="Entrez votre Nom/Prénoms">
                                      @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>

                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <div class="form-group single-query"">
                                        <label><strong>Adresse E-mail</strong></label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" placeholder="Entrez votre E-mail">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                  </div>
                              </div>

                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <div class="form-group single-query"">
                                        <label><strong>Contact</strong></label>
                                      <input type="number" name="number"  value="{{ old('number') }}" class="form-control  @error('number') is-invalid @enderror" placeholder="Entrez votre numéro">
                                      @error('number')
                                           <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
                              </div>

                              <div class="col-md-12 col-sm-6 col-xs-12">
                                  <div class="form-group single-query"">
                                    <label><strong>Votre profil</strong></label>
                                     <select  name="profil"  class="form-control  @error('profil') is-invalid @enderror">
                                          <option value="">Choisissez votre profil</option>
                                          <option value="Je suis une entreprise">Je suis une entreprise</option>
                                          <option value="Je suis un particulier">Je suis un particulier</option>
                                     </select>
                                     @error('profil')
                                           <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>

                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group single-query"">
                                        <label><strong>Votre besoin</strong></label>
                                        <textarea name="message"  class="form-control  @error('message') is-invalid @enderror" placeholder="Exprimez votre besoin" id="message">
                                            {{ old('message') }}
                                        </textarea>
                                        @error('message')
                                           <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group single-query"">
                                      <button type="submit" class="btn_fill" id="btn_submit" name="btn_submit">Valider</button>
                                  </div>
                              </div>

                          </div>

                      </form>


                  </div>
              </div>

          </div>

      </div>

  </section>
  <!--===== #/CONTACT US =====-->
@endsection
