# Wild Radio

## Bienvenue

Bienvenue sur Wild Radio, la webradio fictive d'Eva Wild, jeune productrice nantaise de musique lo-fi. 
Elle souhaitait disposer de cet outil pour mettre en avant ses tracks, ses coups de coeur et son univers.

Parmi les fonctionnalités demandées : 
- Disposer d'un outil promotionnel auprès des professionnels de la musique (label, distributeur, programmateur)
- Proposer sa musique au grand public amateur de musique (lo-fi, hip hop, electronique...)
- Diffuser un flux continu, des playlists et une page de contact
- Avoir accès à un espace administrateur de manière sécurisée pour ajouter/retirer des tracks ainsi que créer/modifier/supprimer des playlists et définir son flux continu. 
- Elle souhaite un site mobile first intuitif et épuré

## Step by step : créer ta BDD

- Créer config/db.php depuis le fichier config/db.php.dist et ajoute tes paramètres de BDD. Ne supprime pas le fichier .dist, il doit rester.

define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');

## Step by step : récupérer la BDD Wild Radio

Pour pouvoir voir / écouter les tracks installées dans la base de données, il faut s'assurer de :

1. Avoir bien cloné le repo Github et vérifier que les assets audio sont présents
2. Upload le fichier SQL "BDD-WR-OK_2021-11-18_131107_wildradio.sql"

## Step by step : régler son PHP.ini

Afin de profiter pleinement du site et ajouter vous-même des tracks au playlist, il va falloir régler votre version de PHP pour autoriser l'upload de fichiers audio relativement lourds (+ de 2Mo). 

1. Cloner ce repo depuis Github.
2. Dans votre IDE préféré, ouvrir le fichier index.php présent dans le dossier /public
3. À la ligne 2, écrire phpinfo(); suivi d'un die();
4. Lancer un serveur PHP et l'ouvrir sur un navigateur web
5. La page PHPinfo s'affiche. Cherchez la ligne "Loaded Configuration File" qui doit indiquer un chemin relatif vers le fichier PHP.ini présent sur votre ordinateur. Ex : /usr/local/etc/php/8.0/php.ini
6. Copier le chemin relatif
7. Coller-le dans votre barre de recherche de Documents (Windows) / Finder (Mac)
8. Une fois le fichier PHP.ini trouvé dans vos dossiers, ouvrez ce fichier avec votre IDE
9. Cherchez la ligne "upload_max_filesize" et indiquez le poids max d'upload que vous souhaitez. Nous conseillons de mettre 40Mo.
10. Cherchez la ligne "post_max_size" et indiquez le poids max d'upload que vous souhaitez. Nous conseillons de mettre 40Mo.
11. Sauvegardez vos changements, fermez le fichier PHP.ini et enlevez les lignes phpinfo(); et die(); du fichier index.php (cf étape 2)
12. Relancez votre localhost
13. Enjoy

## How to basics : côté utilisateur.ice.s

HEADER
 
- voir toutes les playlists
- Revenir à la homepage
- Contacter Eva Wild

HOMEPAGE [localhost:8000/]

- Lancer / stopper un flux continu et aléatoire de tracks toutes plus belles les unes que les autres. Le titre et l'artiste diffusé sont affichés dynamiquement.
- Aller écouter deux playlists d'Eva Wild
- Aller voir toutes les playlists disponibles

PLAYLISTS [localhost:8000/playlists]

- Grille de toutes les playlists publiées

- V1.2 : ajout de player sur toutes les images des playlists qui lancent la playlist au clic
- V1.2 : pouvoir naviguer sur le site sans couper le flux continu

UNE PLAYLIST [localhost:8000/playlists/show?id=:id]

- À gauche, l'illustration de la playlist, un player pour lancer le son, le titre de la playlist et sa description.
- À droite, les tracks de la playlists affichées dynamiquement. Il faut cliquer sur le player pour lancer le son. Ensuite, au clic sur les titres, ceux-ci se lancent.

- V.1.2 : Coordonner le lancement du player au clic sur les titres.
- V.1.2 : ajout de boutons pour aller à la track d'avant ou celle d'après

CONTACT [localhost:8000/contact]

- À gauche, une photo d'Eva Wild, des liens vers les réseaux sociaux et une super description
- À droite, un formulaire de contact classique

- V.1.2 : Envoi des données à  l'adresse mail d'Eva Wild 

## How to basics : côté admin

Cette partie admin, n'est pas responsive. C'est volontaire, car nous estimons que pour uploader des fichiers, il faut passer par un ordinateur de bureau.

LOGIN [localhost:8000/login]

- Un formulaire pour se connecter à l'admin. 
- ID : Johan / MDP : lolilol

- V1.2 : ajout d'un bouton pour réinitialiser son MDP
- V1.2 : ajout d'un bouton pour créer un nouveau compte

HEADER
 
- Accès à l'admin
- Accès à la partie Playlists
- Accès à la partie Tracks
- Accès à la partie Flux

FOOTER
 
- Log out pour quitter la partie Admin
- Crédits ❤

ADMIN [localhost:8000/admin]

- 3 boutons pour également renvoyer vers les 3 parties de l'admin (playlists, tracks, flux)

ADMIN/TRACKS [localhost:8000/admin/tracks]

- Barre de recherche pour trouver une track
- Bouton pour ajouter une track
- Bouton pour voir le flux
- Affichage de la liste des tracks uploadées dans la BDD
- Pour chaque track, possibilité de cliquer sur le nom de l'artiste ou de la track pour afficher les informations de cette dernière
- Pour chaque track, possibilité de voir si elle est dans le flux continu de la webradio (colonne Flux)
- Pour chaque track, possibilité de cliquer sur "Modifier" / "Effacer" afin d'effectuer l'action souhaitée

- V1.2 : afficher les tracks triées dans l'ordre du plus récent au plus ancien
- V1.2 : intégration d'icones pour les colonnes "Modifier" / "Effacer"
- V1.2 : ajout d'une checkbox permettant d'ajouter / enlever la track au flux depuis cette page
- V1.2 : custom checkbox en CSS

ADMIN/TRACKS/SHOW [localhost:8000/admin/tracks/show?id=:id]

- Affichage des informations suivantes : titre, artiste, album, dans le flux (ou non)
- Bouton pour "Modifier" la track
- Bouton pour "Effacer" la track
- Bouton "Retour" pour revenir à la page précédente (/admin/tracks)
- À gauche, affichage dynamique des playlists dans lesquelles la track est présente

ADMIN/TRACKS/EDIT[localhost:8000/admin/tracks/edit?id=:id]

- Modification des informations relatives au track ( titre, artiste, album etc.)
- Mise au flux ou retrait
- Ajout de la tracks à une ou plusieurs playlists. Possibilité de modifier cette liste. 
- L'ensemble des playlists enregistrées sont disponibles 
- Le bouton retour renvoie à la page show relative 

ADMIN/TRACKS/ADD[localhost:8000/admin/tracks/add]

- Champs à remplir : titre, artiste, album (avec vérifications)
- Input file pour uploader les fichiers MP3 (limite d'upload 40Mo)
- Checkbox pour ajouter (ou non) la track au flux
- Bouton "Ajouter une track" pour ajouter la track à la BDD
- Bouton "Retour" renvoie à la page admin/tracks

ADMIN/TRACKS/FLUX [localhost:8000/admin/tracks/flux]
- Barre de recherche pour trouver une track
- Affiche toutes les tracks présentes dans le flux continu

ADMIN/PLAYLISTS [localhost:8000/admin/playlists]

- Barre de recherche pour trouver une playlist
- Bouton pour ajouter une une playlist
- Bouton pour voir le flux
- Affichage de la liste des playlists uploadées dans la BDD
- Affichage si les/la playlist est en ligne ou non
- Boutton pour modifier une playlist
- Boutton pour supprimer une playlist 

ADMIN/PLAYLISTS/SHOW [localhost:8000/admin/playlists/show?id=:id] -> Cliquer sur le titre pour afficher la playlist

- Affichage des informations suivantes : titre, description, image, la liste des tracks dans la playlist concerncée
- Bouton pour Modifier la playlist
- Bouton pour Effacer la playlist
- Bouton "Retour" pour revenir à la page précédente (/admin/playlists)

ADMIN/PLAYLISTS/EDIT [localhost:8000/admin/playlists/edit?id=:id] -> Cliquer sur "MODIF." 

- Modification des informations relatives a la playlist ( titre, description, image, les tracks qu'elle contient etc.)
- Mise en ligne ou retrait 
- Le bouton retour renvoie à la page show relative 

ADMIN/PLAYLISTS/ADD[localhost:8000/admin/playlists/add] -> Cliquer sur "+ Ajouter une playlist"

- Champs à remplir : titre, description, image a uploader (JPG , limite d'upload 2Mo)
- Checkbox pour ajouter (ou non) la playlist en ligne
- Bouton "Ajouter une playlist" pour ajouter la track à la BDD
- Bouton "Retour" renvoie à la page admin/playlists
- Tag pour préciser quelle type 


## Améliorations pour la V.1.2 (inchallah)

PLAYLISTS [localhost:8000/playlists]

- V1.2 : ajout de player sur toutes les images des playlists qui lancent la playlist au clic
- V1.2 : pouvoir naviguer sur le site sans couper le flux continu

UNE PLAYLIST [localhost:8000/playlists/show?id=:id]

- V.1.2 : Coordonner le lancement du player au clic sur les titres.
- V.1.2 : ajout de boutons pour aller à la track d'avant ou celle d'après

CONTACT [localhost:8000/contact]

- V.1.2 : Envoi des données à  l'adresse mail d'Eva Wild 

LOGIN [localhost:8000/login]

- V1.2 : ajout d'un bouton pour réinitialiser son MDP
- V1.2 : ajout d'un bouton pour créer un nouveau compte

ADMIN/TRACKS [localhost:8000/admin/tracks]

- V1.2 : afficher les tracks triées dans l'ordre du plus récent au plus ancien
- V1.2 : intégration d'icones pour les colonnes "Modifier" / "Effacer"
- V1.2 : ajout d'une checkbox permettant d'ajouter / enlever la track au flux depuis cette page
- V1.2 : custom checkbox en CSS

