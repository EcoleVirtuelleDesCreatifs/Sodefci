# 🚀 Guide de Déploiement - SODEFCI

## ✅ Site Préparé pour le Déploiement

**Date de préparation :** 2 Décembre 2024, 01:39 AM  
**Version Laravel :** 8.83.27  
**Status :** ✅ Prêt pour Production

---

## 📋 Checklist Pré-Déploiement

### ✅ Caches Vidés
- [x] Application cache cleared
- [x] Configuration cache cleared
- [x] Route cache cleared
- [x] View cache cleared
- [x] Compiled files removed
- [x] Autoload optimized

### ✅ SEO Implémenté
- [x] 9 pages optimisées
- [x] Meta tags complets
- [x] Sitemap.xml généré
- [x] Robots.txt configuré
- [x] Schema.org JSON-LD

### ✅ Galeries Modernisées
- [x] Galerie réalisations (24 images)
- [x] Galerie produits (65 images)
- [x] Design moderne orange
- [x] Lightbox intégré
- [x] Responsive 100%

---

## 🔧 Configuration Serveur Requise

### PHP Requirements
```
PHP >= 7.3
Extensions:
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
- GD or Imagick
```

### Serveur Web
```
Apache 2.4+ ou Nginx 1.18+
MySQL 5.7+ ou MariaDB 10.3+
```

---

## 📁 Fichiers à NE PAS Déployer

**Ne jamais uploader ces dossiers/fichiers :**
```
/node_modules/
/vendor/ (sera regénéré)
.env (créer nouveau sur serveur)
.git/
.gitignore
.editorconfig
.styleci.yml
phpunit.xml
/storage/*.key
/tests/
```

---

## 🚀 Étapes de Déploiement

### 1. Préparer les Fichiers Locaux

**Créer une archive complète :**
```bash
# Depuis le dossier app/
zip -r sodefci-production.zip . \
  -x "node_modules/*" \
  -x "vendor/*" \
  -x ".git/*" \
  -x "storage/logs/*" \
  -x "storage/framework/cache/*" \
  -x "storage/framework/sessions/*" \
  -x "storage/framework/views/*"
```

### 2. Sur le Serveur de Production

**A. Upload des fichiers**
```bash
# Via FTP/SFTP, uploader l'archive
# Extraire dans le dossier web
unzip sodefci-production.zip -d /var/www/sodefci
cd /var/www/sodefci
```

**B. Installer les dépendances**
```bash
# Composer
composer install --optimize-autoloader --no-dev

# Si npm est nécessaire
npm install --production
npm run production
```

**C. Configuration .env**
```bash
# Copier .env.example
cp .env.example .env

# Éditer avec les bonnes valeurs
nano .env
```

**Configuration .env pour Production :**
```env
APP_NAME=SODEFCI
APP_ENV=production
APP_KEY=base64:VOTRE_CLE_ICI
APP_DEBUG=false
APP_URL=https://www.sodefci.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sodefci_prod
DB_USERNAME=votre_user
DB_PASSWORD=votre_password

CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=contact@sodefci.com
MAIL_FROM_NAME="${APP_NAME}"
```

**D. Générer la clé d'application**
```bash
php artisan key:generate
```

**E. Configurer les permissions**
```bash
# Propriétaire web server (www-data ou apache)
chown -R www-data:www-data /var/www/sodefci

# Permissions storage et cache
chmod -R 775 storage bootstrap/cache

# Permissions fichiers
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
```

**F. Optimiser pour la production**
```bash
# Optimiser les configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimiser l'autoloader
composer dump-autoload -o
```

**G. Migrations et Seeds (si nécessaire)**
```bash
# Migrer la base de données
php artisan migrate --force

# Si seeds nécessaires
php artisan db:seed --force
```

---

## 🌐 Configuration Apache

### VirtualHost Configuration

Créer : `/etc/apache2/sites-available/sodefci.conf`

```apache
<VirtualHost *:80>
    ServerName sodefci.com
    ServerAlias www.sodefci.com
    DocumentRoot /var/www/sodefci/public

    <Directory /var/www/sodefci/public>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/sodefci-error.log
    CustomLog ${APACHE_LOG_DIR}/sodefci-access.log combined

    # Redirection HTTPS (recommandé)
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</VirtualHost>

<VirtualHost *:443>
    ServerName sodefci.com
    ServerAlias www.sodefci.com
    DocumentRoot /var/www/sodefci/public

    SSLEngine on
    SSLCertificateFile /etc/ssl/certs/sodefci.crt
    SSLCertificateKeyFile /etc/ssl/private/sodefci.key
    SSLCertificateChainFile /etc/ssl/certs/sodefci-chain.crt

    <Directory /var/www/sodefci/public>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    # Sécurité Headers
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"

    # Compression
    <IfModule mod_deflate.c>
        AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
    </IfModule>

    # Cache statique
    <IfModule mod_expires.c>
        ExpiresActive On
        ExpiresByType image/jpg "access plus 1 year"
        ExpiresByType image/jpeg "access plus 1 year"
        ExpiresByType image/png "access plus 1 year"
        ExpiresByType text/css "access plus 1 month"
        ExpiresByType application/javascript "access plus 1 month"
    </IfModule>

    ErrorLog ${APACHE_LOG_DIR}/sodefci-ssl-error.log
    CustomLog ${APACHE_LOG_DIR}/sodefci-ssl-access.log combined
</VirtualHost>
```

**Activer le site :**
```bash
a2ensite sodefci.conf
a2enmod rewrite ssl headers deflate expires
systemctl restart apache2
```

---

## 🔒 Configuration Nginx (Alternative)

Créer : `/etc/nginx/sites-available/sodefci`

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name sodefci.com www.sodefci.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name sodefci.com www.sodefci.com;
    root /var/www/sodefci/public;

    index index.php index.html;

    # SSL Configuration
    ssl_certificate /etc/ssl/certs/sodefci.crt;
    ssl_certificate_key /etc/ssl/private/sodefci.key;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers on;

    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "strict-origin-when-cross-origin" always;

    # Logs
    access_log /var/log/nginx/sodefci-access.log;
    error_log /var/log/nginx/sodefci-error.log;

    # Gzip Compression
    gzip on;
    gzip_types text/plain text/css application/json application/javascript text/xml application/xml application/xml+rss text/javascript;

    # Laravel Routes
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # PHP-FPM
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Cache statique
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

    # Deny access
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

**Activer :**
```bash
ln -s /etc/nginx/sites-available/sodefci /etc/nginx/sites-enabled/
nginx -t
systemctl restart nginx
```

---

## 🔐 SSL/HTTPS avec Let's Encrypt

**Installation Certbot :**
```bash
# Ubuntu/Debian
apt-get install certbot python3-certbot-apache
# ou pour Nginx
apt-get install certbot python3-certbot-nginx

# Obtenir le certificat
certbot --apache -d sodefci.com -d www.sodefci.com
# ou
certbot --nginx -d sodefci.com -d www.sodefci.com

# Renouvellement automatique
certbot renew --dry-run
```

---

## 🗄️ Base de Données

### Création de la Base

```sql
-- Connexion MySQL
mysql -u root -p

-- Créer la base
CREATE DATABASE sodefci_prod CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Créer l'utilisateur
CREATE USER 'sodefci_user'@'localhost' IDENTIFIED BY 'MOT_DE_PASSE_FORT';

-- Donner les permissions
GRANT ALL PRIVILEGES ON sodefci_prod.* TO 'sodefci_user'@'localhost';
FLUSH PRIVILEGES;

EXIT;
```

### Import des Données

```bash
# Si export depuis développement
mysqldump -u root -p sodefci > sodefci_backup.sql

# Import sur serveur
mysql -u sodefci_user -p sodefci_prod < sodefci_backup.sql
```

---

## 📊 SEO Post-Déploiement

### 1. Vérifier les URLs

- ✅ https://www.sodefci.com/
- ✅ https://www.sodefci.com/sitemap.xml
- ✅ https://www.sodefci.com/robots.txt
- ✅ https://www.sodefci.com/seo-check.php

### 2. Soumettre aux Moteurs

**Google Search Console :**
1. Aller sur : https://search.google.com/search-console
2. Ajouter la propriété : sodefci.com
3. Vérifier la propriété
4. Soumettre le sitemap : https://www.sodefci.com/sitemap.xml

**Bing Webmaster Tools :**
1. Aller sur : https://www.bing.com/webmasters
2. Ajouter le site
3. Soumettre le sitemap

### 3. Google Analytics

Ajouter le code de suivi dans `layouts/app.blade.php` avant `</head>` :

```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>
```

---

## 🔍 Tests Post-Déploiement

### Tests Manuels

```bash
# 1. Vérifier la page d'accueil
curl -I https://www.sodefci.com

# 2. Vérifier le sitemap
curl https://www.sodefci.com/sitemap.xml

# 3. Vérifier robots.txt
curl https://www.sodefci.com/robots.txt

# 4. Test SEO
curl https://www.sodefci.com/seo-check.php
```

### Pages à Tester

- [ ] Accueil
- [ ] Notre Histoire
- [ ] Nos Services
- [ ] Nos Réalisations (24 images)
- [ ] Nos Produits (65 images)
- [ ] Demande de Devis (formulaire)
- [ ] Contact (formulaire)
- [ ] Nos Valeurs
- [ ] Mentions Légales

### Fonctionnalités

- [ ] Lightbox images réalisations
- [ ] Lightbox images produits
- [ ] Filtres galerie réalisations
- [ ] Formulaire devis
- [ ] Formulaire produit
- [ ] Formulaire contact
- [ ] Responsive mobile
- [ ] Responsive tablet

---

## 📧 Configuration Email

### SMTP Configuration

Mettre à jour `.env` avec vos credentials SMTP :

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@gmail.com
MAIL_PASSWORD=votre-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=contact@sodefci.com
MAIL_FROM_NAME="SODEFCI"
```

### Test Email

```bash
php artisan tinker
Mail::raw('Test email SODEFCI', function($msg) {
    $msg->to('votre-email@example.com')->subject('Test');
});
```

---

## 🔧 Maintenance

### Logs

```bash
# Voir les logs en temps réel
tail -f storage/logs/laravel.log

# Nettoyer les vieux logs
rm storage/logs/laravel-*.log
```

### Backup

**Script de backup :**
```bash
#!/bin/bash
# backup-sodefci.sh

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups/sodefci"
APP_DIR="/var/www/sodefci"

# Backup fichiers
tar -czf $BACKUP_DIR/files_$DATE.tar.gz $APP_DIR \
  --exclude='vendor' \
  --exclude='node_modules' \
  --exclude='storage/logs'

# Backup base de données
mysqldump -u sodefci_user -p sodefci_prod > $BACKUP_DIR/db_$DATE.sql

# Garder seulement les 7 derniers backups
find $BACKUP_DIR -type f -mtime +7 -delete

echo "Backup completed: $DATE"
```

**Cron pour backup quotidien :**
```bash
crontab -e
# Ajouter:
0 2 * * * /path/to/backup-sodefci.sh >> /var/log/backup-sodefci.log 2>&1
```

### Mises à jour

```bash
# 1. Backup d'abord !

# 2. Maintenance mode
php artisan down --message="Mise à jour en cours"

# 3. Pull les changements
git pull origin main

# 4. Dépendances
composer install --no-dev -o

# 5. Migrations
php artisan migrate --force

# 6. Clear + Cache
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 7. Retour en ligne
php artisan up
```

---

## 🐛 Dépannage

### Erreur 500

```bash
# 1. Vérifier les logs
tail -f storage/logs/laravel.log

# 2. Vérifier permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# 3. Régénérer clé
php artisan key:generate

# 4. Clear cache
php artisan optimize:clear
```

### Erreur 404 pour routes

```bash
# Vérifier .htaccess dans public/
# Activer mod_rewrite
a2enmod rewrite
systemctl restart apache2
```

### Images non affichées

```bash
# Permissions storage
chmod -R 775 storage/app/public
php artisan storage:link
```

---

## 📊 Monitoring Recommandé

### Services à configurer

1. **Uptime Monitoring**
   - UptimeRobot (gratuit)
   - Pingdom

2. **Error Tracking**
   - Sentry
   - Bugsnag

3. **Performance**
   - Google PageSpeed Insights
   - GTmetrix

---

## ✅ Checklist Finale

### Avant de mettre en ligne

- [ ] .env configuré (APP_DEBUG=false)
- [ ] APP_KEY généré
- [ ] Base de données créée et migrée
- [ ] Permissions storage/bootstrap correctes
- [ ] SSL/HTTPS actif
- [ ] Caches optimisés
- [ ] Tests manuels effectués
- [ ] Backup configuré
- [ ] Google Analytics installé
- [ ] Sitemap soumis à Google
- [ ] Sitemap soumis à Bing
- [ ] Emails fonctionnels
- [ ] Formulaires testés

---

## 📞 Support

**En cas de problème :**
1. Consulter les logs : `storage/logs/laravel.log`
2. Vérifier la documentation Laravel : https://laravel.com/docs/8.x
3. Vérifier les permissions fichiers
4. Vérifier la configuration .env

---

## 🎉 Félicitations !

Votre site SODEFCI est maintenant déployé en production !

**URLs importantes :**
- Site : https://www.sodefci.com
- Admin : https://www.sodefci.com/admin
- SEO Check : https://www.sodefci.com/seo-check.php

---

**Déploiement préparé le :** 2 Décembre 2024  
**Version :** 1.0.0  
**Laravel :** 8.83.27  
**PHP :** 7.3+
