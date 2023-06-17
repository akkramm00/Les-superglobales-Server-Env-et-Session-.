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

  </body>
</html>