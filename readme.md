Création du réseau docker :
sudo docker network create netapp

Création des images docker :
sudo docker build -t nginx-img -f dockerfile.nginx .
sudo docker build -t app-img -f dockerfile.php .
sudo docker build -t bdd-img -f dockerfile.mysql .

Création des containers docker :
sudo docker run -d --name bdd_dkr --network netapp bdd-img
sudo docker run -d --name app_dkr --network netapp app-img
sudo docker run -d -p 80:80 -p 443:443 --name nginx_dkr --network netapp nginx-img

Génération du certificat SSL sur le container nginx_dkr
docker exec -it nginx_dkr certbot --nginx -d localhost

# Code Postaux

L'application **Code Postaux** est un annuaire permettant de retrouver le code postal associé à une ville française ou vice versa. Cette solution offre une interface conviviale pour simplifier la recherche d'informations liées aux codes postaux français.

## Réalisateur
- **Anthony MASSET:** Concepteur principal de l'application Code Postaux.

## Intégration Docker
L'intégration de cette solution sous l'environnement Docker a été réalisée par Friviere, qui a assuré le déploiement efficace de l'application dans des conteneurs isolés.

## Déploiement avec Docker

### Étapes

Suivez ces étapes pour déployer l'application Code Postaux sous Docker.

1. **Création du réseau Docker:**
   - `sudo docker network create netapp`

2. **Création des images Docker:**
   - Image NGINX :
     - `sudo docker build -t nginx-img -f dockerfile.nginx .`
   - Image PHP :
     - `sudo docker build -t app-img -f dockerfile.php .`
   - Image MySQL :
     - `sudo docker build -t bdd-img -f dockerfile.mysql .`

3. **Création des containers Docker:**
   - Container MySQL :
     - `sudo docker run -d --name bdd_dkr --network netapp bdd-img`
   - Container PHP :
     - `sudo docker run -d --name app_dkr --network netapp app-img`
   - Container NGINX :
     - `sudo docker run -d -p 80:80 -p 443:443 --name nginx_dkr --network netapp nginx-img`

