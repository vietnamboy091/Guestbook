<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<style>
body {
  background-image: url('50060.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>

<section class="nav-area">
        <nav>
            <div class="nav">
                <ul>
                    <li><ion-icon name="home-outline"></ion-icon><a href="index.php">Home</a></li>
                    <li><ion-icon name="planet-outline"></ion-icon><a href="forum.php">Forum</a></li>
                    <li><ion-icon name="people-outline"></ion-icon><a href="contact.php">Kontakt</a></li>   
                    <?php
                            session_start();
                            if($_SESSION["login"] == false){
                                echo"<li><ion-icon name='log-in-outline'></ion-icon><a href='login.php'>Anmelden</a></li>   
                                ";
                            }
                            else{
                                if($_SESSION["rolle"] == 1){
                                    echo"<li><ion-icon name='code-slash-outline'></ion-icon><a href='mod.php'>Moderation</a></li>";  
    
                                }
                                echo"<li><ion-icon name='log-in-outline'></ion-icon><a href='logout.php'>Abmelden</a></li>";  
                                echo"<p class = 'user'><a>Hey, " .$_SESSION["username"]."</a></p>";                            
                            }
                        ?>   
                </ul>
            </div>
        </nav>
    </section>
    <section class = 'banner'>
        <div class="contact">
            <span class="back">
            Frage erstellen
            </span>
        </div>
    </section>
    <?php
    echo"
        <section class='content'>
            <div class = 'content_table'>
                <table class = 'content_inhalt'>
                    <form action='' method='post'>
                        <tr>
                            <td>
                                <input type = 'text' name = 'frage' placeholder = 'Frage' required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type = 'text' class = 'message' name = 'extra' placeholder = 'Weitere Informationen' required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type = 'submit' name = 'senden' value = 'Abschicken' class = 'btn'>
                    </form>
                    <form action='' method='post'>
                                <input type = 'submit' name = 'back' value = 'Abbrechen' class = 'btn'>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </section>
    ";

if(isset($_POST["senden"])){

    $con = mysqli_connect('localhost','root','','bbs');
    $abfrage = "SELECT MAX(fragen_id) as maxID FROM fragen";
    $result = mysqli_query($con, $abfrage);
    while($id = mysqli_fetch_assoc($result)){
        $max = $id["maxID"];
    }
    $frage = $_POST["frage"];
    $extra = $_POST["extra"];
    $max++;
    $closed = 0;
    $date = date("Y-m-d H:i:s");
    $user = $_SESSION["username"];
    $insert = "INSERT INTO fragen
    values('$max','$frage','$extra','$user','$closed','$date')";
    $run = mysqli_query($con, $insert);
}
if(isset($_POST["back"])){
    header("Location: forum.php");   
}
    ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>