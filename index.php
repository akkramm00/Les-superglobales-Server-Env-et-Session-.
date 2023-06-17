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
    

  </body>
</html>