@extends('layouts.app')
@section('title', 'réinitialiser le mot de passe')
@section('content')
<!--===== PAGE TITLE =====-->
<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>RECUPERATION DE <span class="octicon octicon-person"></span>MOT DE PASSE</h1>
        <h5>Votre partenaire de confort</h5>
        <div class="line_4"></div>
        <div class="line_5"></div>
        <div class="line_6"></div>
        <a href="/">Accueil</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="{{ route('pages.about') }}">A propos</a>
      </div>
    </div>
  </div>
  <!--===== #/PAGE TITLE =====-->


                    
<!--===== LOGIN =====-->
<section id="login" class="padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="profile-login">
            <div class="login_detail">
            
              <div class="tab-content padding_b40 padding_t40">
                <div role="tabpanel" class="tab-pane fade in active" id="home">
                    <h2>Réinitialisation</h2>
                  <div class="agent-p-form">
                    <div class="row">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                        <div class="col-md-12">
                          
                          <div class="single-query">
                            <input id="email" type="email" value="{{ old('email') }}"  placeholder="Adresse E-mail" class="keyword-input @error('email') is-invalid @enderror" name="email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                          <div class="query-submit-button">
                            <button type="submit" class="btn_fill">Réinitialiser le mot de passe</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection
