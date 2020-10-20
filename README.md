## À propos de Pwipper

Pwipper est une application web unique et innovante. 
Ce site a été développé pour mettre en relation des utilisateurs à travers le monde 
et créer une communauté soudée et bienveillante.   <br>
Les utilisateurs peuvent y poster des messages (pweeps), et voir le profil des autres utilisateurs.
Un pweep peut contenir jusqu'à 4 images. Pour les insérer : soit cliquer 
sur une image pour l'ajouter, ou cliquer sur la touche `Ctrl` pour en sélectionner plusieurs.<br><br>

Un utilisateur peut aimer ou repweeper un pweep. Lorsqu'il aime un pweep il est ajouté dans une liste.
Quand il est repweepé, le pweep est recréé pour être repartagé et éventuellement lui donner
plus de visibilité (car il réapparait tout en haut de la liste des pweeps).
Un utilisateur peut également répondre à un pweep.<br><br>

Sur le profil d'un utilisateur on peut voir 3 catégories de listes : pweeps, médias, mentions j'aime. 
Les pweeps sont tous les messages créés ou repweepé par l'utilisateur, les médias, seulement les 
pweeps contenant des images, et les mentions j'aime sont la liste des pweeps aimé par l'utilisateur.<br><br>

Une liste des notifications est présente dans la barre de navigation permettant à l'utilisateur de voir
les dernières personnes qui ont aimé, repweepé, ou répondu à ses pweeps.<br><br>

Un administrateur peut accéder à un panel d'administration sur lequel il pourra gérer plusieurs entités :<br>
- les utilisateurs : l'administrateur voit une liste détaillée de tous les utilisateurs, ainsi que des actions
qu'il peut réaliser par rapport à lui (le modifier, supprimer) et peut également en créer de nouveaux
- les pweeps : il est possible pour un administrateur de voir la liste détaillée des pweeps, et également de 
les modifier ou de les supprimer
- les notifications : un tableau détaillé des notifications et également présent. L'administrateur peut les supprimer.

### Technologies utilisées
- Laravel 7
- Bootstrap 
- JS et JQuery 
- MySQL

## Comment lancer le projet

<ol>
    <li>Créer une base de données <code>pwipper</code> avec comme utilisateur <code>root</code> et aucun mot de passe </li>
    <li>
        Éditer le fichier `.env` qui se trouve à la racine : <br>
            DB_CONNECTION=mysql <br>
            DB_HOST=127.0.0.1 <br>
            DB_PORT=3306 <br>
            DB_DATABASE=pwipper <br>
            DB_USERNAME=root <br>
            DB_PASSWORD= <br><br>
            MAIL_MAILER=smtp<br>
            MAIL_HOST=smtp.mailtrap.io<br>
            MAIL_PORT=2525<br>
            MAIL_USERNAME={ username }<br>
            MAIL_PASSWORD={ password }<br>
            MAIL_ENCRYPTION=tls<br>
    </li>
    <li>Lancer la commande `npm install` dans un terminal</li>
    <li>Lancer la commande `php artisan serve` dans un terminal</li>
    <li>Lancer la commande `npm run watch` dans un terminal</li>
    <li>Lancer la commande `php artisan migrate:fresh --seed` dans un terminal</li>
</ol> 
<br>

Pour se connecter aux utilisateurs déjà en base de données : 
- email : `test1@test.fr` / mot de passe : `Test123!` / Simple utilisateur
- email : `test2@test.fr` / mot de passe : `Test123!` / Simple utilisateur
- email : `admin@test.fr` / mot de passe : `Test123!` / Administrateur

## Évolutions futures

Dans le futur, il est prévu que de nouvelles fonctionnalités voient le jour : 
- Un système de messagerie interne, pour que les utilisateurs puissent communiquer entre eux de manière privée
- Un système de tag
- Des catégories d'utilisateur pour différencier un compte privé, d'un compte lifestyle, de sport, qui parle de cuisine ou autre
- Amélioration du visuel des mails envoyés lors des différentes interactions
- Un système de suivi d'un autre utilisateur : un utilisateur pourrait en suivre un autre et cela personnaliserait sa page d'accueil et les pweeps qu'il verrait en premier
- Une page affichant les 10 mots les plus utilisés sur le site
- Les tableaux pourront être paginés et triés 

## Difficultés rencontrées
Lors de ce projet, plusieurs difficultés nous on barré la route. <br>
Dans un premier temps, nous n'avions pas énormément de connaissances sur les langages utilisés, qui ont été imposés.
En effet, avec seulement une semaine de cours sur le Laravel, il a été difficile de tout voir, et il nous a manqué certaines
notions qui nous auraient permis de développer plus efficacement le site (notamment les liaisons Many-To-Many).<br>
Ensuite, nous avons dû utiliser du JS et JQuery, qui sont des langages que nous ne connaissions pas avant.<br><br>
Finalement, étant en alternance, il a fallu trouvé du temps et de la motivation après le travail pour avancer le projet
et le mener à bout. Ce n'est pas évident quand on vient de passer 7H30 à travailler de rentrer et de se poser
pour continuer à travailler.

### Points positifs
Malgré les difficultés auxquelles nous avons fait face, nous avons réussi à terminer la plupart des fonctionnalit&s
que nous souhaitions présenter, et elles fonctionnent bien. <br>
Le fait d'avoir travaillé 3 semaines sur ce projet nous a permis d'améliorer nos compétences dans les langages utilisés.

### Organisation du travail
Au tout début du projet, nous avons mis en place un [board Trello](https://trello.com/b/SuUtTYg5/projet) pour organiser nos idées et les tâches à réaliser. Cela nous a permis de savoir
ce qui avait été fait ou non, voir si le projet était dans les temps ou non, et qui avait réalisé quelle tâche.
Pour communiquer nous avons utilisé Discord.