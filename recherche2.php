
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ignition Zone</title>
  <link rel="stylesheet" href="prototype.css">
  <link rel="stylesheet" href="stl.css">
  <style type="text/css">
    #puissance-slider {
  width: 50%;
}



  form {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
  font-family: Arial, sans-serif;
  font-size: 16px;
  padding: 20px;
  background: #f4f7f8;
  border-radius: 8px;
  background-color: #FFF7ED;
  line-height: 1.6;
  border: 2px solid #FFA07A;
  box-shadow: 0 0 20px rgba(0,0,0,0.3);
}


label {
  flex-basis: 100%;
  margin-bottom: 10px;
  color: #333;
}

input[type="text"],
input[type="number"] {
  flex-basis: calc(50% - 10px);
  margin-right: 10px;
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 5px;
  border: none;
  background-color: #fff;
  box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.3);
}

button[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}


  </style>

</head>
<body>
  <header>
    <img id="logo" src="images\logo11(1).png" alt="Logo">
    <ul>
            <li><a href="prtotype.html">Home</a></li>
            <li>
              <a href="#">Cars</a>
              <ul>
                <li><a href="bmwcars.html">BMW</a></li>
                <li><a href="mercedes.html">Mercedes</a></li>
                <li><a href="peugeot.html">Peugeot</a></li>
                <li><a href="toyota.html">Toyota</a></li>
                <li><a href="renault.html">Renault</a></li>
                <li><a href="suzukicars.html">Suzuki</a></li>
                <li><a href="fiat.html">Fiat</a></li>
              </ul>
            </li>
            <li>
                <a href="#">Motorbikes</a>
                <ul>
                    <li><a href="KAWASAKI.html">Kawasaki</a></li>
                    <li><a href="honda.html">Honda</a></li>
                    <li><a href="suzuki.html">Suzuki</a></li>
                    <li><a href="yamaha.html">Yamaha</a></li><li>
                        <li><a href="bmw.html">BMW</a></li>
                        <li><a href="ktm.html">KTM</a></li>
                </ul>
            </li>
            <li><a href="recherche.php">Search</a></li>
            <li><a href="contact.html">Contact</a></li>
		       	<li><a href="survey.html">Survey</a></li>
          </ul>
       
        
  </header>

  
    

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetweb";

// Connexion à la base de données MySQL avec PDO
$dsn = "mysql:host=$servername;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifie si les clés de tableau existent et affecte les valeurs correspondantes à des variables
$couleur = isset($_GET['couleur']) ? $_GET['couleur'] : "";
$modele = isset($_GET['modele']) ? $_GET['modele'] : "";
$marque = isset($_GET['marque']) ? $_GET['marque'] : "";
$type = isset($_GET['type']) ? $_GET['type'] : "";
$puissance_min = isset($_GET['puissance-min']) ? $_GET['puissance-min'] : "";
$puissance_max = isset($_GET['puissance-max']) ? $_GET['puissance-max'] : "";
$energie = isset($_GET['energie']) ? $_GET['energie'] : "";
$prix = isset($_GET['prix']) ? $_GET['prix'] : "";
$boite = isset($_GET['boite']) ? $_GET['boite'] : "";

if (isset($_GET['type']) && !empty($type)) {
    // Utilise les valeurs pour interroger la base de données
    $sql = "SELECT DISTINCT * FROM `$type` WHERE 1=1 ";


    // Ajouter la couleur au tableau si elle est sélectionnée
    if (!empty($couleur)) {
        $sql .= "AND COULEUR = :couleur ";
    }

    // Ajouter l'énergie au tableau si elle est sélectionnée
    if (!empty($energie)) {
        $sql .= "AND ENERGIE = :energie ";
    }

    // Ajouter la boite au tableau si elle est sélectionnée
    if (!empty($boite)) {
        $sql .= "AND BOITE_VITESSE = :boite ";
    }

    // Ajouter le prix au tableau si il est sélectionné
    if (!empty($prix)) {
        $sql .= "AND PRIX <= :prix ";
    }

    if (!empty($modele)) {
        $sql .= "AND MODELE = :modele ";
    }

    if (!empty($marque)) {
        $sql .= "AND MARQUE = :marque ";
    }

    if (!empty($puissance_max) && !empty($puissance_min)) {
        $sql .= "AND PUISSANCE BETWEEN :puissance_min AND :puissance_max ";
    }

    $stmt = $pdo->prepare($sql);

    // Bind des valeurs des paramètres
    if (!empty($couleur)) {
        $stmt->bindValue(':couleur', $couleur);
    }
    if (!empty($energie)) {
        $stmt->bindValue(':energie', $energie);
    }
    if (!empty($boite)) {
        $stmt->bindValue(':boite', $boite);
    }
    if (!empty($prix)) {
        $stmt->bindValue(':prix', $prix);
    }
    if (!empty($modele)) {
      $stmt->bindValue(':modele', $modele);
    }
    if (!empty($marque)) {
    $stmt->bindValue(':marque', $marque);
    }
    if (!empty($puissance_min) && !empty($puissance_max)) {
    $stmt->bindValue(':puissance_min', $puissance_min);
    $stmt->bindValue(':puissance_max', $puissance_max);
    }
    // Exécute la requête préparée
$stmt->execute();

// Récupère les résultats de la recherche
$results = $stmt->fetchAll();

// Affiche les résultats de la recherche
if (count($results) > 0) {
    foreach ($results as $row) {
        echo '<div class="grid-item"><img class="main-image" src="' . $row["IMAGE"] . '">';
        echo "<div>Couleur: " . $row["COULEUR"] . " - Puissance: " . $row["PUISSANCE"] . " - Energie: " . $row["ENERGIE"] . " - Prix: " . $row["PRIX"] . " - Boite de vitesse: " . $row["BOITE_VITESSE"] . " - Marque: " . $row["MARQUE"] . " - Modèle: " . $row["MODELE"] . "</div>";
        echo '</div>';
    }
} else {
    echo "<div style='text-align: center; color:red '> <strong>Aucun résultat trouvé.</strong></div>";
}
}
if  (empty($type) &&  isset($_GET['submit']))
 {
  echo "<div style='text-align: center; color:red '> <strong>le type est obligatoire.</strong></div>";
}


?>


<footer>
      <h1 id="ss">Follow Us On Social Media</h1>
      <div class="socialicons">


              <a href="https://www.facebook.com" target="_blank">
               
                <img src="images\facebook.png" alt="Facebook.ignition" id="fb">
                
                
              </a>


              <a href="https://www.instagram.com/" target="_blank">
                <img src="images\insta.png" alt="Instagram" id="insta">
              </a>


              <a href="https://www.twitter.com/" target="_blank">
                <img src="images\twitter.png" alt="Twitter" id="twitter">
              </a>
            </div>
    <section>
      <div class="left-align">+216 73 458 354</div>
      <div class="center-align">Ignition Zone Ltd.</div>
      <div class="right-align">2023</div>
        </section>
    </footer>


</html>
