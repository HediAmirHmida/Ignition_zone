<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="stlc.css">
    <style>
  .error-message {
  color: red;
  font-weight: bold;
  margin-bottom: 10px;
  
}
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

    </style>
  
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
  

 

  
</body>
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $vehicle = $_POST['vehicle'];
    $message = $_POST['message'];
    $newsletter = isset($_POST['options']) ? $_POST['options'] : '';

    // Vérifier les champs requis
    $errors = array();
    if (empty($name)) {
        $errors[] = "Le champ 'Name' est obligatoire.";
    }
    if (empty($surname)) {
        $errors[] = "Le champ 'Surname' est obligatoire.";
    }
    if (empty($email)) {
        $errors[] = "Le champ 'Email' est obligatoire.";
    }
    if (empty($phone)) {
        $errors[] = "Le champ 'Phone number' est obligatoire.";
    }
    if (empty($vehicle)) {
        $errors[] = "Le champ 'Vehicle' est obligatoire.";
    }
    if (empty($message)) {
      $errors[] = "Le champ 'Message' est obligatoire.";
  }
  if (empty($newsletter)) {
      $errors[] = "Le champ 'Get updated by our newsletter' est obligatoire.";
  }

  if (!empty($errors)) {
    echo "<div class='error-message'>";
    echo "<ul >";
    foreach ($errors as $error) {
        echo "<li >$error</li>";
    }
    echo "</ul>";
    echo "</div>";
  } else {
    // Les champs sont tous remplis, continuer avec le traitement du formulaire
    $subject = "Nouveau message de contact - $name $surname";
    $body = "Nom: $name $surname\n";
    $body .= "Email: $email\n";
    $body .= "Téléphone: $phone\n";
    $body .= "Type de véhicule: $vehicle\n";
    $body .= "Message:\n$message\n";

    $to = "kacembrahim499@gmail.com";
    $headers = "From: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Merci de nous avoir contacté. Nous vous répondrons dans les plus brefs délais.";
    } else {
        echo "Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer plus tard.";
    }
}
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
