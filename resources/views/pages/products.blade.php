@extends('layouts.app')
@section('title', 'NOS PRODUITS')
@section('content')

@php
// $productImages est passé par le controller - contient toutes les images du dossier
$totalProducts = count($productImages ?? []);
@endphp

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.products-modern-section {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
    padding: 100px 0;
    position: relative;
}

.products-modern-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 500px;
    background: radial-gradient(ellipse at top, rgba(255, 119, 0, 0.05), transparent);
    pointer-events: none;
}

.products-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 40px;
    position: relative;
    z-index: 1;
}

/* Header */
.products-header {
    text-align: center;
    margin-bottom: 70px;
}

.products-header-badge {
    display: inline-block;
    padding: 8px 24px;
    background: rgba(255, 119, 0, 0.08);
    border: 1px solid rgba(255, 119, 0, 0.2);
    border-radius: 100px;
    font-size: 13px;
    font-weight: 600;
    color: #ff7700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-bottom: 24px;
    animation: fadeInDown 0.6s ease-out;
}

.products-title {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 900;
    color: #0a0a0a;
    line-height: 1.1;
    margin-bottom: 20px;
    letter-spacing: -2px;
    animation: fadeInDown 0.8s ease-out 0.1s both;
}

.products-title .highlight {
    background: linear-gradient(135deg, #ff7700 0%, #ffaa00 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.products-subtitle {
    font-size: 18px;
    color: #666;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.7;
    font-weight: 400;
    animation: fadeInDown 1s ease-out 0.2s both;
}

/* Layout Grid avec Sidebar */
.products-content {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 40px;
    animation: fadeInUp 1s ease-out 0.3s both;
}

/* Grid Produits */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 24px;
}

.product-card {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    background: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0;
    transform: translateY(20px);
}

.product-card.visible {
    animation: cardFadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    animation-delay: calc(0.04s * var(--index));
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
}

.product-image-wrapper {
    position: relative;
    aspect-ratio: 1;
    overflow: hidden;
    background: linear-gradient(135deg, #f5f5f5, #e5e5e5);
}

.product-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card:hover img {
    transform: scale(1.1);
}

.product-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255, 119, 0, 0.92), rgba(230, 81, 0, 0.92));
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.product-overlay-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: scale(0) rotate(-90deg);
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.product-card:hover .product-overlay-icon {
    transform: scale(1) rotate(0);
}

.product-overlay-icon i {
    font-size: 24px;
    color: white;
}

/* Sidebar Devis */
.devis-sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.devis-card {
    background: white;
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    border: 1px solid #f0f0f0;
}

.devis-title {
    font-size: 24px;
    font-weight: 800;
    color: #0a0a0a;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: -0.5px;
}

.devis-title .highlight {
    background: linear-gradient(135deg, #ff7700 0%, #ffaa00 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.devis-subtitle {
    color: #666;
    font-size: 14px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.form-group {
    margin-bottom: 24px;
}

.form-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-control-modern {
    width: 100%;
    padding: 14px 18px;
    border: 2px solid #e5e5e5;
    border-radius: 12px;
    font-size: 15px;
    font-family: 'Inter', sans-serif;
    transition: all 0.3s ease;
    background: #fafafa;
}

.form-control-modern:focus {
    outline: none;
    border-color: #ff7700;
    background: white;
    box-shadow: 0 0 0 4px rgba(255, 119, 0, 0.1);
}

select.form-control-modern {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 18px center;
    padding-right: 45px;
}

.form-control-modern.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 12px;
    margin-top: 6px;
    display: block;
}

.btn-submit {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #ff7700, #ffaa00);
    border: none;
    border-radius: 12px;
    color: white;
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 16px rgba(255, 119, 0, 0.3);
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(255, 119, 0, 0.4);
}

.btn-submit:active {
    transform: translateY(0);
}

/* Success Message */
.success-alert {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    padding: 16px 20px;
    border-radius: 12px;
    margin-bottom: 30px;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 4px 16px rgba(16, 185, 129, 0.3);
    animation: slideInDown 0.5s ease-out;
}

/* Animations */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes cardFadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 1200px) {
    .products-content {
        grid-template-columns: 1fr 350px;
        gap: 30px;
    }
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
}

@media (max-width: 992px) {
    .products-content {
        grid-template-columns: 1fr;
    }
    .devis-sidebar {
        position: static;
        margin-top: 50px;
    }
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    }
}

@media (max-width: 768px) {
    .products-modern-section {
        padding: 70px 0;
    }
    .products-container {
        padding: 0 20px;
    }
    .products-title {
        font-size: 2.2rem;
    }
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 16px;
    }
    .devis-card {
        padding: 30px 20px;
    }
}

@media (max-width: 480px) {
    .products-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
        <div class="main-title">
            <h1>Nos <span class="octicon octicon-person"></span>produits</h1>
            <h5>Votre partenaire de confort</h5>
            <div class="line_4"></div>
            <div class="line_5"></div>
            <div class="line_6"></div>
            <a href="/">Accueil</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="/nos-produits/">Produits</a>
        </div>
    </div>
</div>
<!--===== #/PAGE TITLE =====-->

<section class="products-modern-section">
    <div class="products-container">
        <!-- Header -->
        <div class="products-header">
            <div class="products-header-badge">Catalogue</div>
            <h2 class="products-title">NOS <span class="highlight">PRODUITS</span></h2>
            <p class="products-subtitle">
                Découvrez tous nos produits de quincaillerie générale pour vos besoins professionnels et industriels.
            </p>
        </div>

        <!-- Content Grid -->
        <div class="products-content">
            <!-- Products Grid -->
            <div class="products-grid">
                @if(isset($productImages) && count($productImages) > 0)
                    @foreach($productImages as $index => $imageName)
                        <div class="product-card" style="--index: {{ $index }}">
                            <div class="product-image-wrapper">
                                <img src="{{ asset('assets/images/works/quincaillerie/' . $imageName) }}"
                                     alt="Produit {{ $index + 1 }}"
                                     loading="lazy">
                                <div class="product-overlay">
                                    <a href="{{ asset('assets/images/works/quincaillerie/' . $imageName) }}"
                                       data-lightbox="products"
                                       data-title="Produit {{ $index + 1 }}"
                                       style="text-decoration: none;">
                                        <div class="product-overlay-icon">
                                            <i class="fa fa-search-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>Aucun produit disponible pour le moment.</p>
                    </div>
                @endif
            </div>

            <!-- Devis Sidebar -->
            <div class="devis-sidebar">
                <div class="devis-card">
                    @if(session('success'))
                        <div class="success-alert">
                            <i class="fa fa-check-circle" style="margin-right: 8px;"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <h3 class="devis-title">DEMANDE DE <span class="highlight">DEVIS</span></h3>
                    <p class="devis-subtitle">Remplissez le formulaire ci-dessous</p>

                    <form method="post" action="{{ route('product.store') }}">
                        @csrf

                        <div class="form-group">
                            <label>Nom / Prénoms</label>
                            <input type="text"
                                   name="nameProduit"
                                   value="{{ old('nameProduit') }}"
                                   class="form-control-modern @error('nameProduit') is-invalid @enderror"
                                   placeholder="Votre nom complet">
                            @error('nameProduit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Numéro de téléphone</label>
                            <input type="tel"
                                   name="numberProduit"
                                   value="{{ old('numberProduit') }}"
                                   class="form-control-modern @error('numberProduit') is-invalid @enderror"
                                   placeholder="+225 XX XX XX XX XX">
                            @error('numberProduit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Adresse E-mail</label>
                            <input type="email"
                                   name="emailProduit"
                                   value="{{ old('emailProduit') }}"
                                   class="form-control-modern @error('emailProduit') is-invalid @enderror"
                                   placeholder="votre@email.com">
                            @error('emailProduit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Quantité</label>
                            <input type="number"
                                   name="quantite"
                                   value="{{ old('quantite') }}"
                                   class="form-control-modern @error('quantite') is-invalid @enderror"
                                   placeholder="Ex: 10"
                                   min="1">
                            @error('quantite')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Choisissez votre produit</label>
                            <select name="produit" class="form-control-modern @error('produit') is-invalid @enderror">
                                <option value="">Sélectionner un produit</option>
                                <option value="Equipement de protection des mains">Equipement de protection des mains</option>
                                <option value="Equipement de protection des pieds et corps">Equipement de protection des pieds et corps</option>
                                <option value="Equipement de protection respiratoire">Equipement de protection respiratoire</option>
                                <option value="Equipement de protection des yeux et faces">Equipement de protection des yeux et faces</option>
                                <option value="Outillage et outils de découpe">Outillage et outils de découpe</option>
                                <option value="Visserie, boulonnerie et fixation">Visserie, boulonnerie et fixation</option>
                                <option value="Appareils de sondage et accessoires">Appareils de sondage et accessoires</option>
                                <option value="Abrasifs">Abrasifs</option>
                            </select>
                            @error('produit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fa fa-paper-plane" style="margin-right: 8px;"></i>
                            Envoyer la demande
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    const productCards = document.querySelectorAll('.product-card');

    // Intersection Observer pour animations
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });

        productCards.forEach(card => observer.observe(card));
    } else {
        productCards.forEach(card => card.classList.add('visible'));
    }
});
</script>

@endsection
