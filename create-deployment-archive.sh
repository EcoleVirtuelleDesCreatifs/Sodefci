#!/bin/bash
# SODEFCI - Script de création d'archive pour déploiement
# Usage: ./create-deployment-archive.sh

echo "╔══════════════════════════════════════════════════════════════╗"
echo "║     SODEFCI - Création Archive de Déploiement               ║"
echo "╚══════════════════════════════════════════════════════════════╝"
echo ""

# Variables
TIMESTAMP=$(date +%Y%m%d_%H%M%S)
ARCHIVE_NAME="sodefci-production-${TIMESTAMP}.zip"
OUTPUT_DIR="../"

echo "📦 Préparation de l'archive..."
echo ""

# Nettoyage des caches
echo "🧹 Nettoyage des caches..."
php artisan optimize:clear > /dev/null 2>&1
composer dump-autoload -o > /dev/null 2>&1
echo "   ✅ Caches vidés"
echo ""

# Création de l'archive
echo "📁 Création de l'archive: ${ARCHIVE_NAME}"
echo "   Exclusions:"
echo "   - node_modules/"
echo "   - vendor/"
echo "   - .git/"
echo "   - storage/logs/*"
echo "   - storage/framework/cache/*"
echo "   - storage/framework/sessions/*"
echo "   - storage/framework/views/*"
echo ""

zip -r "${OUTPUT_DIR}${ARCHIVE_NAME}" . \
    -x "*.git*" \
    -x "node_modules/*" \
    -x "vendor/*" \
    -x "storage/logs/*" \
    -x "storage/framework/cache/data/*" \
    -x "storage/framework/sessions/*" \
    -x "storage/framework/views/*" \
    -x "*.DS_Store" \
    -x "tests/*" \
    -x ".editorconfig" \
    -x ".styleci.yml" \
    -x "phpunit.xml" \
    -x "webpack.mix.js" \
    -x "package*.json" \
    > /dev/null 2>&1

if [ $? -eq 0 ]; then
    ARCHIVE_SIZE=$(du -h "${OUTPUT_DIR}${ARCHIVE_NAME}" | cut -f1)

    echo "═══════════════════════════════════════════════════════════════"
    echo "                    ✅ ARCHIVE CRÉÉE !                        "
    echo "═══════════════════════════════════════════════════════════════"
    echo ""
    echo "📦 Fichier : ${ARCHIVE_NAME}"
    echo "📏 Taille  : ${ARCHIVE_SIZE}"
    echo "📍 Chemin  : ${OUTPUT_DIR}${ARCHIVE_NAME}"
    echo ""
    echo "═══════════════════════════════════════════════════════════════"
    echo "                 PROCHAINES ÉTAPES                            "
    echo "═══════════════════════════════════════════════════════════════"
    echo ""
    echo "1️⃣  Uploader l'archive sur votre serveur (FTP/SFTP)"
    echo "2️⃣  Extraire : unzip ${ARCHIVE_NAME}"
    echo "3️⃣  Installer dépendances : composer install --no-dev -o"
    echo "4️⃣  Configurer .env (copier .env.example)"
    echo "5️⃣  Générer clé : php artisan key:generate"
    echo "6️⃣  Migrer DB : php artisan migrate --force"
    echo "7️⃣  Optimiser : php artisan config:cache"
    echo "8️⃣  Permissions : chmod -R 775 storage bootstrap/cache"
    echo ""
    echo "📖 Guide complet : DEPLOYMENT_GUIDE.md"
    echo ""
    echo "═══════════════════════════════════════════════════════════════"
    echo ""
else
    echo "❌ Erreur lors de la création de l'archive"
    exit 1
fi
