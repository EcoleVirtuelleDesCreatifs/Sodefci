<?php
/**
 * SODEFCI - Pre-Deployment Verification Script
 * Execute: php pre-deployment-check.php
 */

echo "\n";
echo "╔══════════════════════════════════════════════════════════════╗\n";
echo "║       SODEFCI - Vérification Pré-Déploiement                ║\n";
echo "╚══════════════════════════════════════════════════════════════╝\n";
echo "\n";

$errors = [];
$warnings = [];
$passed = [];

// 1. Vérifier la version PHP
echo "📌 Vérification PHP...\n";
if (version_compare(PHP_VERSION, '7.3.0', '>=')) {
    $passed[] = "✅ PHP Version: " . PHP_VERSION;
} else {
    $errors[] = "❌ PHP Version trop ancienne: " . PHP_VERSION . " (requis: 7.3+)";
}

// 2. Extensions PHP requises
echo "📌 Vérification extensions PHP...\n";
$required_extensions = [
    'openssl', 'pdo', 'mbstring', 'tokenizer', 'xml', 'ctype',
    'json', 'bcmath', 'fileinfo', 'gd'
];

foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        $passed[] = "✅ Extension $ext installée";
    } else {
        $errors[] = "❌ Extension $ext MANQUANTE";
    }
}

// 3. Vérifier les fichiers essentiels
echo "📌 Vérification fichiers essentiels...\n";
$essential_files = [
    'config/app.php',
    'config/database.php',
    'config/seo.php',
    'resources/views/layouts/app.blade.php',
    'resources/views/components/seo.blade.php',
    'public/index.php',
    'public/sitemap.xml',
    'public/robots.txt',
    '.env.example'
];

foreach ($essential_files as $file) {
    if (file_exists($file)) {
        $passed[] = "✅ Fichier présent: $file";
    } else {
        $errors[] = "❌ Fichier MANQUANT: $file";
    }
}

// 4. Vérifier les dossiers writable
echo "📌 Vérification permissions...\n";
$writable_dirs = [
    'storage/app',
    'storage/framework',
    'storage/logs',
    'bootstrap/cache'
];

foreach ($writable_dirs as $dir) {
    if (is_dir($dir)) {
        if (is_writable($dir)) {
            $passed[] = "✅ Dossier writable: $dir";
        } else {
            $errors[] = "❌ Dossier NON writable: $dir";
        }
    } else {
        $errors[] = "❌ Dossier MANQUANT: $dir";
    }
}

// 5. Vérifier .env
echo "📌 Vérification .env...\n";
if (file_exists('.env')) {
    $passed[] = "✅ Fichier .env existe";

    $env_content = file_get_contents('.env');

    // Vérifier les variables critiques
    $critical_vars = ['APP_KEY', 'DB_DATABASE', 'DB_USERNAME'];
    foreach ($critical_vars as $var) {
        if (strpos($env_content, $var) !== false) {
            $passed[] = "✅ Variable $var présente dans .env";
        } else {
            $warnings[] = "⚠️  Variable $var absente dans .env";
        }
    }

    // Vérifier APP_DEBUG
    if (strpos($env_content, 'APP_DEBUG=false') !== false) {
        $passed[] = "✅ APP_DEBUG=false (production)";
    } else {
        $warnings[] = "⚠️  APP_DEBUG devrait être 'false' en production";
    }

    // Vérifier APP_ENV
    if (strpos($env_content, 'APP_ENV=production') !== false) {
        $passed[] = "✅ APP_ENV=production";
    } else {
        $warnings[] = "⚠️  APP_ENV devrait être 'production'";
    }
} else {
    $warnings[] = "⚠️  Fichier .env n'existe pas (à créer sur le serveur)";
}

// 6. Vérifier composer.json
echo "📌 Vérification Composer...\n";
if (file_exists('composer.json')) {
    $passed[] = "✅ composer.json présent";

    if (file_exists('vendor/autoload.php')) {
        $passed[] = "✅ Dépendances Composer installées";
    } else {
        $warnings[] = "⚠️  Vendor absent (exécuter: composer install)";
    }
} else {
    $errors[] = "❌ composer.json MANQUANT";
}

// 7. Vérifier les images
echo "📌 Vérification images...\n";
if (is_dir('public/assets/images/works')) {
    $work_images = count(glob('public/assets/images/works/*.jpg'));
    if ($work_images >= 24) {
        $passed[] = "✅ Images réalisations: $work_images trouvées";
    } else {
        $warnings[] = "⚠️  Seulement $work_images images réalisations (attendu: 24+)";
    }
} else {
    $errors[] = "❌ Dossier images/works MANQUANT";
}

if (is_dir('public/assets/images/produits')) {
    $product_images = count(glob('public/assets/images/produits/*.{jpg,png}', GLOB_BRACE));
    if ($product_images >= 24) {
        $passed[] = "✅ Images produits: $product_images trouvées";
    } else {
        $warnings[] = "⚠️  Seulement $product_images images produits";
    }
} else {
    $errors[] = "❌ Dossier images/produits MANQUANT";
}

// 8. Vérifier SEO
echo "📌 Vérification SEO...\n";
if (file_exists('public/sitemap.xml')) {
    $sitemap = file_get_contents('public/sitemap.xml');
    $url_count = substr_count($sitemap, '<url>');
    if ($url_count >= 9) {
        $passed[] = "✅ Sitemap: $url_count URLs";
    } else {
        $warnings[] = "⚠️  Sitemap: seulement $url_count URLs (attendu: 9)";
    }
}

if (file_exists('public/robots.txt')) {
    $passed[] = "✅ Robots.txt présent";
}

// 9. Vérifier les controllers
echo "📌 Vérification Controllers...\n";
$controllers = [
    'app/Http/Controllers/AboutController.php',
    'app/Http/Controllers/ServicesController.php',
    'app/Http/Controllers/WorkController.php',
    'app/Http/Controllers/ProductsController.php',
    'app/Http/Controllers/DevisController.php',
    'app/Http/Controllers/ContactController.php'
];

$controllers_ok = 0;
foreach ($controllers as $controller) {
    if (file_exists($controller)) {
        $controllers_ok++;
    }
}

if ($controllers_ok === count($controllers)) {
    $passed[] = "✅ Tous les controllers présents ($controllers_ok/".count($controllers).")";
} else {
    $warnings[] = "⚠️  Seulement $controllers_ok/" . count($controllers) . " controllers trouvés";
}

// RÉSUMÉ
echo "\n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "                         RÉSUMÉ                                \n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "\n";

echo "✅ VALIDATIONS RÉUSSIES: " . count($passed) . "\n";
echo "⚠️  AVERTISSEMENTS: " . count($warnings) . "\n";
echo "❌ ERREURS: " . count($errors) . "\n";
echo "\n";

if (count($errors) > 0) {
    echo "╔══════════════════════════════════════════════════════════════╗\n";
    echo "║                     ❌ ERREURS CRITIQUES                     ║\n";
    echo "╚══════════════════════════════════════════════════════════════╝\n";
    foreach ($errors as $error) {
        echo "  $error\n";
    }
    echo "\n";
}

if (count($warnings) > 0) {
    echo "╔══════════════════════════════════════════════════════════════╗\n";
    echo "║                      ⚠️  AVERTISSEMENTS                      ║\n";
    echo "╚══════════════════════════════════════════════════════════════╝\n";
    foreach ($warnings as $warning) {
        echo "  $warning\n";
    }
    echo "\n";
}

// STATUS FINAL
echo "═══════════════════════════════════════════════════════════════\n";
if (count($errors) === 0) {
    echo "               ✅ PRÊT POUR LE DÉPLOIEMENT !                \n";
    echo "\n";
    echo "Prochaines étapes :\n";
    echo "  1. Créer une archive : zip -r sodefci.zip . -x \"node_modules/*\" \"vendor/*\"\n";
    echo "  2. Uploader sur le serveur\n";
    echo "  3. Exécuter : composer install --no-dev -o\n";
    echo "  4. Configurer .env\n";
    echo "  5. Exécuter : php artisan key:generate\n";
    echo "  6. Exécuter : php artisan migrate --force\n";
    echo "  7. Exécuter : php artisan config:cache\n";
    echo "\n";
    echo "📖 Guide complet : DEPLOYMENT_GUIDE.md\n";
} else {
    echo "            ❌ CORRIGER LES ERREURS D'ABORD !             \n";
    echo "\n";
    echo "Veuillez résoudre les erreurs critiques avant de déployer.\n";
}
echo "═══════════════════════════════════════════════════════════════\n";
echo "\n";

// Exit code
exit(count($errors) > 0 ? 1 : 0);
