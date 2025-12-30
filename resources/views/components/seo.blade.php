@php
$page = $page ?? 'default';
$seoConfig = config('seo.pages.' . $page, config('seo.default'));
$company = config('seo.company');
$currentUrl = url()->current();
$imageUrl = isset($image) ? asset($image) : asset($seoConfig['image'] ?? config('seo.default.image'));
@endphp

<!-- Basic Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="author" content="{{ config('seo.company.name') }}">
<meta name="language" content="French">
<meta name="revisit-after" content="7 days">

<!-- Primary Meta Tags -->
<title>{{ $seoConfig['title'] ?? config('seo.default.title') }}</title>
<meta name="title" content="{{ $seoConfig['title'] ?? config('seo.default.title') }}">
<meta name="description" content="{{ $seoConfig['description'] ?? config('seo.default.description') }}">
<meta name="keywords" content="{{ $seoConfig['keywords'] ?? config('seo.default.keywords') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $currentUrl }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $seoConfig['type'] ?? 'website' }}">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $seoConfig['title'] ?? config('seo.default.title') }}">
<meta property="og:description" content="{{ $seoConfig['description'] ?? config('seo.default.description') }}">
<meta property="og:image" content="{{ $imageUrl }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="{{ config('seo.site_name') }}">
<meta property="og:locale" content="{{ config('seo.locale') }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $currentUrl }}">
<meta name="twitter:title" content="{{ $seoConfig['title'] ?? config('seo.default.title') }}">
<meta name="twitter:description" content="{{ $seoConfig['description'] ?? config('seo.default.description') }}">
<meta name="twitter:image" content="{{ $imageUrl }}">
<meta name="twitter:site" content="@sodefci">
<meta name="twitter:creator" content="@sodefci">

<!-- Additional Meta Tags -->
<meta name="theme-color" content="#ff7700">
<meta name="msapplication-TileColor" content="#ff7700">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="{{ config('seo.site_name') }}">

<!-- Geo Tags -->
<meta name="geo.region" content="CI">
<meta name="geo.placename" content="Abidjan">
<meta name="geo.position" content="5.345317;-4.024429">
<meta name="ICBM" content="5.345317, -4.024429">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.jpg') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon.jpg') }}">

<!-- Schema.org JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "{{ $seoConfig['type'] === 'service' ? 'Service' : 'Organization' }}",
  "name": "{{ $company['name'] }}",
  "alternateName": "{{ $company['full_name'] }}",
  "url": "{{ $company['url'] }}",
  "logo": "{{ asset($company['logo']) }}",
  "description": "{{ $seoConfig['description'] ?? config('seo.default.description') }}",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "{{ $company['address'] }}",
    "addressLocality": "Abidjan",
    "addressCountry": "CI"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "{{ $company['phone'] }}",
    "contactType": "customer service",
    "areaServed": "CI",
    "availableLanguage": "French"
  },
  "sameAs": [
    "{{ $company['social']['facebook'] ?? '' }}",
    "{{ $company['social']['linkedin'] ?? '' }}",
    "{{ $company['social']['twitter'] ?? '' }}",
    "{{ $company['social']['instagram'] ?? '' }}"
  ]
}
</script>

@if($page === 'product')
<!-- Product Schema for Products Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Store",
  "name": "{{ $company['name'] }} - Produits",
  "description": "{{ $seoConfig['description'] }}",
  "url": "{{ $currentUrl }}",
  "image": "{{ $imageUrl }}"
}
</script>
@endif

@if($page === 'work')
<!-- Portfolio Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CreativeWork",
  "name": "Portfolio {{ $company['name'] }}",
  "description": "{{ $seoConfig['description'] }}",
  "url": "{{ $currentUrl }}",
  "creator": {
    "@type": "Organization",
    "name": "{{ $company['name'] }}"
  }
}
</script>
@endif

<!-- Preconnect for Performance -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="https://fonts.googleapis.com">
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
