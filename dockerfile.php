# On récupère une image officielle de PHP avec Apache
FROM php:7.4-apache

# On copie les fichiers de l'application qui sont dans le dossier src vers le dossier spécifié dans le conteneur
COPY src/ /var/www/html/

# On installe l'extension PHP nécessaire car on en aura besoin
RUN docker-php-ext-install pdo pdo_mysql

# On expose le port 80
EXPOSE 80

# On définis les variables d'environnement pour la connexion à la base de données (récupérées par connect.php)
ENV DB_HOST=bdd_dkr
ENV DB_NAME=cp
ENV DB_USER=root
ENV DB_PASSWORD=VXNvQ37F2u
ENV DB_PORT=3306

# On lance Apache dans le conteneur
CMD ["apache2-foreground"]
