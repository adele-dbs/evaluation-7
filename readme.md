Installer WampServer (ou Xamp, ....)
Créer un répertoire dans C:\wamp64\www pour le projet

Installer Git
Cloner sur Github le dossier https://github.com/adele-dbs/garagevparrot à l'aide du terminal de commande : git clone...

Lancer Wamp : Cliquer sur Localhost dans le menu
Ajouter un VirtualHost
Donner lui le nom du projet
Redémarrer DNS dans l'icone Wamp
Puis cliquer sur le projet dans VirtualHost

Installer Symphony et ses dépendences

Accéder à MySQL : 
Dans un terminal de commande (CMD pour Windows): 
cd C:\wamp64\bin\mysql\mysql8.0.31\bin
mysql -u root -p

Pour créer la base de donnée et l'alimenter : 
Copier les scripts dans le terminal de commande

Créer un Administrateur : 
INSERT INTO trt_conseil.right (name) VALUES
('ADMIN'),
('CONSULTANT'),
('APPLICANT'),
('RECRUITMENT');

INSERT INTO trt_conseil.validation_status (status) VALUES
('Yes'),
('No');

INSERT INTO trt_conseil.user (right_id, email, password, roles, validation_id) VALUE
('1', 'trt_conseil@trtconseil.com', '$2y$10$Oz6iUzWHBD5y68h6zsQPo.TaJjS2D6BAyzNMZDaGEbbFuTrbsge4W', '["ROLE_ADMIN"]', '1'); //voir si cela focntionne

p4$$w0rd

Pour connaitre le mot de passe haché : 
Créer un pouveau projet sur Replit, coller le code et cliquer sur Run : 
<?php
$password = 'P&ssW&rd4';
$encrypted_password = password_hash($password, PASSWORD_BCRYPT);
echo $encrypted_password;
?>





 


