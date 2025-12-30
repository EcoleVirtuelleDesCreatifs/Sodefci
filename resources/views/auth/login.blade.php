@extends('layouts.app')
@section('title', 'ESPACE COMMERCIAL')
@section('content')

<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>ESPACE<span class="octicon octicon-person"></span>COMMERCIAL</h1>
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
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">SE CONNECTER</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content padding_b40 padding_t40">
                <div role="tabpanel" class="tab-pane fade in active" id="home">
                  <h2>COMPTE COMMERCIAL</h2>
                  <div class="agent-p-form">
                    <div class="row">
                        <form method="POST" action="{{ route('login') }}" class="callus">
                            @csrf
    
                        <div class="col-md-12">
                          <div class="single-query">
                            <input type="email" name="email" class="keyword-input" placeholder="Nom d'utiliseur">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="single-query">
                            <input type="password" name="password" class="keyword-input" placeholder="Mot de passe">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ?') }}
                                </a>
                            @endif
                          </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                          <div class="query-submit-button">
                            <button type="submit" class="btn_fill">Se connecter</button>
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
