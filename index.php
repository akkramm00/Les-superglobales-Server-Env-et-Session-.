<!DOCTYPE html>
<html>
  <head>
    <title>Les superglobables Server, Env et Session</title>
  </head>
  <body>
    <h1>Les superglobales Server, Env et Session .</h1>
    <?php
      // Récupérer le nom du script en cours d'exécution :
      $server_name_script = $_SERVER['SCRIPT_NAME'];
      echo "Votre nom de script : " . $server_name_script;
      echo "<br>";

      // Récupérer l'URI de la requête :
      $server_uri = $_SERVER['REQUEST_URI'];
      echo "L'URI du serveur est : " . $server_uri;
      echo "<br>";

      // Récupérer la méthode HTTP utilisée pour la requête :
      $server_method = $_SERVER['REQUEST_METHOD'];
      echo "La méthode utilisée est : " . $server_method;
      echo "<br>";

      // Récupérer le nom de l'hôte :
      $server_name = $_SERVER['SERVER_NAME'];
      echo "Le nom de l'hôte est  : " . $server_name;
      echo "<br>";

      // Récupérer le numéro de port du serveur :
      $server_port = $_SERVER['SERVER_PORT'];
      echo "Le numéro de port est : " . $server_port;
      echo "<br>";

      // Récupérer le nom du serveur :
      $server_soft = $_SERVER['SERVER_SOFTWARE'];
      echo "Le nom du serveur est : " . $server_soft;
      echo "<br>";
    ?>
<h2>DEUXIEME PARTIE</h2>
     <?php
// Initialisation de la session
//session_start();
// Stocker une valeur dans la session
$_SESSION['username'] = 'JohnDoe';

// Afficher quelques informations sur le serveur
echo 'Nom du serveur : ' . $_SERVER['SERVER_NAME'] . '<br>';
echo 'Adresse IP du client : ' . $_SERVER['REMOTE_ADDR'] . '<br>';
echo 'Méthode de la requête HTTP : ' . $_SERVER['REQUEST_METHOD'] . '<br>';
// Afficher une variable d'environnement (peut ne pas être définie sur tous les serveurs)
if (isset($_ENV['PATH'])) {
    echo 'Chemin d\'accès aux exécutables : ' . $_ENV['PATH'] . '<br>';
}
?>

 <!--=================================================================-->
   

    
    <h2> PARTIE TROIS DU COURS .</h2>
	<pre>
	<h1>Connexion</h1>
	<form method="POST" action= "<?php echo $_SERVER['PHP_SELF']?>">
		<label for="nom_utilisateur">Nom d'utilisateur :</label>
		<input type="text" id="nom_utilisateur" name="nom_utilisateur"><br><br>
		<label for="mot_de_passe">Mot de passe :</label>
		<input type="password" id="mot_de_passe" name="mot_de_passe"><br><br>
		<button type="submit" name="submit">Se connecter</button>
	</form>
</pre>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST" ){
echo "<br>";
echo " La requête est de type ".$server_method;
}
echo "<br>";
$serv_root = $_SERVER['SystemRoot']; // C:\\WINDOWS
echo $serv_root;
$serv_root_2 = str_replace('C:\\', "" , $serv_root);
echo "<br>";
echo " Le système d'exploitation est ".$serv_root_2;
echo "<br>";
$serv_protocol = $_SERVER['SERVER_PROTOCOL'];
if ($serv_protocol === 'HTTPS') { 
	echo " Ce site web est sécurisé avec le protocole HTTPS";
} else {
	echo " Ce site web n'est pas sécurisé , opté pour un accès avec protocole HTTPS";
}
?>

<!--=================================================================-->



<h2>QUATRIEME PARTIE DU COURS</h2>
<h3> tableaux associatif contenant deux produits</h3>

<?php
// tableau associatif qui contient 2 produits 
$produits = [
['id' => 1, 'description' => ' Produit 1'],
['id' => 2, 'description' => ' Produit 2']
];
$produitnull = false;
if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
$idproduit = $_GET['id'];
foreach ($produits as $produit) {
if ($produit['id'] == $idproduit) { 
echo " La description du produit : " .$produit['description'];
$produitnull = true;	
}
}
if(!$produitnull) { 
echo " Produit non trouvé avec l'id ".$idproduit;
}
}
?>

<!--=================================================================-->


<h2> CINQUIEME PARTIE DU COURS : START8 SESSION.</h2>

<?php
//session_start();
$_SESSION['username'] = 'JohnDoe';
echo $_SESSION['username']; // Affiche 'JohnDoe'
?> 

<h2> SIXIEME  PARTIE DU COURS : DEMARRAGE SESSION.</h2>   

<?php
// démarrer une session
//Session_start();
// stocker une valeur dans la superglobale $_SESSION
$_SESSION['nom_utilisateur'] = "Alexandre" ;
// récupérer la valeur de la superglobale $_SESSION
$nom_utilisateur = $_SESSION['nom_utilisateur'];
// afficher la valeur de la superglobale $_SESSION
echo $nom_utilisateur; // affiche " Alexandre "

?> 

<!--=================================================================-->


<h2> 7EME PARTIE DU COURS :CONNEXION FORM !.</h2>   
	<h3>Connexion</h3>
	<form method="POST" action="">
		<label for="username">Nom d'utilisateur:</label>
		<input type="text" name="username" id="username"><br>
		<label for="password">Mot de passe:</label>
		<input type="password" name="password" id="password"><br>
		<input type="submit" value="Se connecter">
	</form>

  <?php 
if($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username  = $_POST['username'];
        $password  = $_POST['password'];
        if ( $username === 'admin' AND $password == 'admin' ) {
            //Initialisation de notre session en tant qu'administrateur 
            $_SESSION['admin'] = true;
            $_SESSION['username'] = $username;
            // redirection 
            echo "Bienvenue à toi, $username";
        } else if ( $username === 'user' AND $password == 'user' ) {
            //Initialisation de notre session en tant qu'utilisateur
            $_SESSION['admin'] = false;
            $_SESSION['username'] = $username;
            // création du cookie utilisateur
            echo "Bienvenue à toi, $username";
        } else {
            echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
        }
    }
}
?>
<!--=================================================================-->


<h2> 8EME PARTIE DU COURS :ENVIRONNEMENT ET SESSION !</h2>  
<?php 

$dbhost = $_ENV['DB_HOST'] = 'localhost';
$dbname = $_ENV['DB_NAME'] = 'env';
$dbuser = $_ENV['DB_USER'] = 'admin';
$dbpassword = $_ENV['DB_PASSWORD'] = 'admin';
try {
   $pdo = new PDO("mysql:$dbhost;dbname:$dbname",$dbuser,$dbpassword);
   echo "<br>";
   echo " Connexion à la base de donnée";
   }
   catch (PDOException $e) {
  	echo " Erreur de connexion à la base de donnée ". $e->getMessage();
   }
?>
<!--=================================================================-->

<h1> TRAITEMENT DES FICHIERS </h1>
<h2> GET , POST ET FILE</h2>

<?php
if(isset($_GET['plat']) && !empty($_GET['plat'])) {
  $plat = $_GET['plat'];
} else {
  $plat = 'Plat non défini';
}
?>

<a href="?plat=pizza"> Plat 1 </a><br>
<a href="?plat=salade"> Plat 2 </a><br>

<?php
echo '<br>';
echo $plat;
echo '</br>';
?>
<!--=================================================================-->

<h2> LA MANIPULATION DES FICHIERS</h2>


    <?php
$file = fopen("monfichier.txt", "r");
$content = fread($file, filesize("monfichier.txt"));
fclose($file);
echo $content;
?> 
<!--=================================================================-->

    <?php
$file = fopen("monfichier.txt", "r");
if ($file) {
    while (($line = fgets($file)) !== false) {
        echo $line;
    }
    fclose($file);
}
?> 

<!--=================================================================-->

<?php
$contents = file_get_contents('monfichier.txt');
echo $contents;
?> 
<!--=================================================================-->
<?php
$file = fopen("monfichier.txt", "w");
$content = "Bonjour, comment ça va?";
$bytes_written = fwrite($file, $content);
fclose($file);
if($bytes_written !== false) {
  echo "Ecriture de " . $bytes_written . " octets réussie.";
} else {
  echo "Erreur lors de l'écriture du fichier.";
}
?> 

<!--=================================================================-->

<?php

$file = 'monfichier.txt';
$content = 'Contenu à écrire dans le fichier';
file_put_contents($file, $content);

?> 

<!--=================================================================-->

<?php

$file = fopen("monfichier1.txt", "w");
if($file) {
    fwrite($file, " Voici un texte d'exemple pour monfichier1.txt");
}
fclose($file);
$count = 0;
$file_count = fopen('monfichier1.txt', 'r');

?> 
<!--=================================================================-->

<?php

$file = fopen("monfichier1.txt", "w");
if($file) {
    fwrite($file, " Voici un texte d'exemple pour monfichier1.txt");
}
fclose($file);
$count = 0;
$file_count = fopen('monfichier1.txt', 'r');

  while(!feof($file_count)) {
        $line = fgets($file_count);
        $count++;    }
echo " Le fichier contient " .$count . " lignes";
$file_add = fopen('monfichier1.txt', 'a');

?> 

<!--=================================================================-->

<?php

$file = fopen("monfichier1.txt", "w");

if($file) {
    fwrite($file, " Voici un texte d'exemple pour monfichier1.txt");
}
fclose($file);
$count = 0;
$file_count = fopen('monfichier1.txt', 'r');

  while(!feof($file_count)) {
        $line = fgets($file_count);
        $count++;    }
echo " Le fichier contient " .$count . " lignes";
$file_add = fopen('monfichier1.txt', 'a');

if($file_add) { 
    fwrite($file_add,  "\nNouvelle entrée");
    fclose($file_add);
}
$file_update = fopen('monfichier1.txt', 'r');
echo "<br><br> Le fichier contient desormais : ";
while(!feof($file_update)) { 
    $line = fgets($file_update);
    echo "<br>".$line;
}
fclose($file_update);

?> 

<!--=================================================================-->

 <?php
  if (!copy('source.txt', 'destination.txt')) {
      echo "La copie du fichier a échoué";
  }

?> 

<!--=================================================================-->

<?php

if (copy('image.jpg', 'images/image.jpg')) {
    echo "Le fichier a été copié avec succès";
} else {
    echo "La copie du fichier a échoué";
}

?> 

<!--=================================================================-->

<?php

  if (!rename('ancien_nom.txt', 'nouveau_nom.txt')) {
      echo "Operation échoué";
  }
    
?> 

<!--=================================================================-->

<?php

  if (!unlink('nom_du_fichier.txt')) {
      echo "La suppression du fichier a échoué";
  }
?>
<!--=================================================================-->

<?php

$file = "mon_fichier.txt";
if (file_exists($file)) {
    echo "Le fichier $file existe.";
} else {
    echo "Le fichier $file n'existe pas.";
}

?>

<!--=================================================================-->

<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $file = $_FILES['file']['name'];
    $destination = "uploads/";
    $target_dir = $destination . basename($file);
    if (file_exists($target_dir)) {
        $backup_file = $destination . 'backup' . basename($file); 
        copy($target_dir, $backup_file);
        $rename_file = $destination . 'rename' . basename($file);
        rename($target_dir, $rename_file);
        unlink($backup_file);
        echo "Le fichier a bien été remplacé avec succès";
    } else { 
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir);
        echo "Le fichier ".$file." a bien été téléchargé";
    }
} else { 
    echo "Il y a eu une erreur lors du téléchargement du fichier";
}

?>
<!--=================================================================-->

<?php

if(is_dir('documents')) {
    echo " Le répertoire 'documents' existe déjà<br> ";
}else { 
    if(mkdir('documents')){
        echo " Le répertoire 'documents' a bien été crée <br>";
    }
}

?>
<!--=================================================================-->

<?php

if(is_dir('documents')) {
    echo " Le répertoire 'documents' existe déjà<br> ";
}else { 
    if(mkdir('documents')){
        echo " Le répertoire 'documents' a bien été crée <br>";
    }
}

$file = fopen('documents/monfichier.txt', 'w');
if($file) { 
    fwrite($file, " Voici un texte d'exemple");
    fclose($file);
} else 
{ 
    echo " Impossible de créer le fichier dans le repertoire 'documents'";
}

?>

<!--=================================================================-->

<?php

if(is_dir('documents')) {
    echo " Le répertoire 'documents' existe déjà<br> ";
}else { 
    if(mkdir('documents')){
        echo " Le répertoire 'documents' a bien été crée <br>";
    }
}

$file = fopen('documents/monfichier.txt', 'w');
if($file) { 
    fwrite($file, " Voici un texte d'exemple");
    fclose($file);
} else 
{ 
    echo " Impossible de créer le fichier dans le repertoire 'documents'";
}
if(file_exists('documents/monfichier.txt')) {
if(is_dir('backup')) {
    echo " Le répertoire 'backup' existe déjà <br>";
}
else { 
    mkdir('backup');
    if(copy('documents/monfichier.txt', 'backup/mon fichier'));
    echo " le fichier 'monfichier.txt' a bien été copié dans le répertoire 'backup' ";
}}

?>

<!--=================================================================-->

    <h1>Formulaire de commande</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required><br><br>
      <label for="adresse">Adresse :</label>
      <textarea name="adresse" id="adresse" required></textarea><br><br>
      <label for="produit">Produit :</label>
     <input type="text" name="produit" id="produit" required><br><br>
      <label for="prix">Prix :</label>
      <input type="number" name="prix" id="prix" required><br><br>
      <input type="submit" value="Envoyer">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nom_client = $_POST['nom'];
        $adresse_client = $_POST['adresse'];
        $produit_commande = $_POST['produit'];
        $prix_commande = $_POST['prix'];    
        $file = fopen('commandes.txt', 'a');    
        fwrite($file, "$nom_client, $adresse_client, $produit_commande, $prix_commande\n");
        fclose($file);    
        echo "La commande a été enregistrée avec succès !<br>";   
        if (!is_dir('backup')) {
            mkdir('backup');
        }
        copy('commandes.txt', 'backup/commandes_backup.txt');    
        echo "La commande a été sauvegardée avec succès !";
    }

    $file = fopen('commandes.txt', 'r');
    ?>
<!
<!--=================================================================-->

<h2>FORMULAIRE DE COMMENDE </h2>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nom_client = $_POST['nom'];
        $adresse_client = $_POST['adresse'];
        $produit_commande = $_POST['produit'];
        $prix_commande = $_POST['prix'];    
        $file = fopen('commandes.txt', 'a');    
        fwrite($file, "$nom_client, $adresse_client, $produit_commande, $prix_commande\n");
        fclose($file);    
        echo "La commande a été enregistrée avec succès !<br>";   
        if (!is_dir('backup')) {
            mkdir('backup');
        }
        copy('commandes.txt', 'backup/commandes_backup.txt');    
        echo "La commande a été sauvegardée avec succès !";
    }

    $file = fopen('commandes.txt', 'r');
    while(!feof($file)) {
    $line = fgets($file);
    echo "<br>".$line;
}
fclose($file);

?>




  </body>
</html>