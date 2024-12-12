<!DOCTYPE html>
<html>
<head>
    <title>Customer Survey</title>
    <link rel="stylesheet" href="survey.css">
    <style>
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

footer {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 98%;
  height: 180px;}

      </style >
  
</head>

<body>  <header>
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
// Informations de connexion à la base de données
$host = 'localhost';
$db_name = 'projetweb';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // En cas d'erreur de connexion à la base de données, afficher un message d'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Code de traitement du formulaire et insertion des données dans la table Customer_Satisfaction_Survey
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $service = isset($_POST['service']) ? $_POST['service'] : "";
  $purchase = isset($_POST['purchase']) ? $_POST['purchase'] : "";
  $recommendation = isset($_POST['recommendation']) ? $_POST['recommendation'] : "";
  $future_purchase = isset($_POST['future_purchase']) ? $_POST['future_purchase'] : "";
  $website_feedback = isset($_POST['website_feedback']) ? $_POST['website_feedback'] : "";
  
  if (empty($service) || empty($purchase) || empty($recommendation) || empty($future_purchase) || empty($website_feedback) ){
    echo " <strong style='color : red;'>le remplissage de tout les champs sont obligatoires.</strong>";
  }
  else{
    // Préparer la requête d'insertion des données
    $sql = "INSERT INTO Customer_Satisfaction_Survey (service, purchase, recommendation, future_purchase, website_feedback) VALUES (:service, :purchase, :recommendation, :future_purchase, :website_feedback)";
    $stmt = $pdo->prepare($sql);

    // Liaison des valeurs aux paramètres de la requête
    $stmt->bindParam(':service', $service);
    $stmt->bindParam(':purchase', $purchase);
    $stmt->bindParam(':recommendation', $recommendation);
    $stmt->bindParam(':future_purchase', $future_purchase);
    $stmt->bindParam(':website_feedback', $website_feedback);


    // Exécution de la requête d'insertion
    if ($stmt->execute()) {
        echo "<strong style='color:red;' >Les données du formulaire ont été insérées avec succès dans la table Customer_Satisfaction_Survey.</strong>";
    } else {
        echo "Une erreur est survenue lors de l'insertion des données du formulaire.";
    }
  }
}

// Fermeture de la connexion à la base de données
$pdo = null;
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
</body>


</html>