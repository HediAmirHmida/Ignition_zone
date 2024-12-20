
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

  <form action="recherche2.php" method="get">
  <label >Type de véhicule :</label>
  <select name="type" id="0" >
  <option value="">Choisissez le type de vehicule</option>
  <option> voitures</option>
  <option>motos</option>
</select>
  <label>Marque :</label>
  <input type="text" name="marque" placeholder="Marque..." id="1">

  <label>Modèle :</label>
  <input type="text" name="modele" placeholder="Modèle..." id="2">

  <label>Puissance minimale:</label>
  <select name="puissance-min" id="3" >
    <option value="">Choisissez une puissance minimale</option>
    <?php
    $i = 0;
    while($i <= 500) {
        $intervalle = ($i + 50);
        echo "<option value='$intervalle'>$intervalle</option>";
        $i += 50;
    }
    ?>
</select>
  <label>Puissance maxiamle:</label>
   <select name="puissance-max" id="4" >
    <option value="">Choisissez une puissance maximale</option>
    <?php
    $i = 0;
    while($i <= 500) {
        $intervalle = ($i + 50);
        echo "<option value='$intervalle'>$intervalle</option>";
        $i += 50;
    }
    ?>
</select>
  
</select name="energie" >
  <label>Energie :</label>
  <select  name="energie" id="5">
  <option value="">Choisissez l'energie</option>
    <option>DIESEL</option>
    <option>PETROLE</option>
    <option>HYBRID</option>
  </select>
   <label>Boite vitesse :</label>
  <select name="boite" id="6">
  <option value="">Choisissez la boite de vitesse</option>
    <option>AUTOMATIC</option>
    <option>MANUAL</option>
  </select>
   <label>Couleur :</label>
  <input type="text" name="couleur" placeholder="Couleur..." id="7">
  <label>Prix maximum :</label>
  <input type="number" name="prix" placeholder="Prix maximum..." id="8">

  <button type="submit" name="submit" >Rechercher</button>
</form>



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
