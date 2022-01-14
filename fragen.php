<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Fragen</title>
</head>
<body>

<style>
body {
  background-image: url('50088.jpg');
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
                            $user = $_SESSION["username"]; 
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
            <section class = 'banner'>
                <div class="contact">
                    <span class="back">
                        Fragen
                    </span>
                </div>
            </section>       
            <?php
                $con = mysqli_connect("Localhost", "root", "", "bbs");
                $sql = "SELECT * FROM fragen WHERE fragen_id = '".$_SESSION["id"]."'";
                $res = mysqli_query($con, $sql);
                echo"
                    <section class='content'>
                        <div class = 'content_table'>
                            <table class = 'content_inhalt'>
                                <form action = '' method = 'post'>
                                    <th class = 'oben'>Fragen ID</th>
                                    <th class = 'oben'>Frage</th>
                                    <th class = 'oben'>Informationen</th>
                                    <th class = 'oben'>Erstellt von</th>
                                    <th class = 'oben'>Erstellt am</th>
                ";                
                while($dset = mysqli_fetch_assoc($res)){
                    $id = $dset["fragen_id"];
                    $frage = $dset["frage"];
                    $extra = $dset["extra"];
                    $user = $dset["username"];
                    $closed = $dset["geschlossen"]; 
                    $created = $dset["erstellt_am"];              
                    echo"
                            <tr class = 'frage'>
                                <td>$id</td>
                                <td>$frage</td>
                                <td>$extra</td>
                                <td>$user</td>
                                <td>$created</td>
                            </tr>
                    ";
                }
                echo"
                    <tr>
                        <td colspan = '2' class = 'oben'><h3>User</h3>
                        <td colspan = '2' class = 'oben'><h3>Antworten</h3>
                        <td colspan = '2' class = 'oben'><h3>Gesendet am</h3>
                    </tr>
                ";
                $abfrage = "SELECT * FROM antworten WHERE fragen_id = '$id'";
                $result = mysqli_query($con, $abfrage);
                while($dsatz = mysqli_fetch_assoc($result)){
                    $nachricht = $dsatz["nachricht"];
                    $username = $dsatz["username"];
                    $gesendet = $dsatz["gesendet_am"];
                    echo"
                        <tr>
                            <td colspan = '2' class = 'frage'><ion-icon name='person-outline'></ion-icon> $username</td>
                            <td colspan = '2' class = 'frage'>$nachricht</td>
                            <td colspan = '2' class = 'frage'>$gesendet</td>
                        <tr>
                    ";
                }                
                if($closed == 1 || $_SESSION["login"] == false){
                    echo"
                        <tr>
                            <td colspan = '5'>
                                <input type = 'text' value = 'Diese Frage wurde von einem Admin geschlossen oder du bist nicht angemeldet' readonly>
                            </td>
                        </tr>
                    ";  
                }
                else{
                    echo"
                        <tr>
                            <td colspan = '3'><input type = 'text' name = 'nachricht' placeholder = 'Gebe eine Nachricht ein' ></td>
                            <td colspan = '3'><input type = 'submit' name = 'senden' class = 'send'></td>
                        </tr>
                    ";
                }
                if(isset($_POST["senden"])){
                    $date = date("Y-m-d H:i:s");
                    $message = $_POST["nachricht"];
                    $insert = "INSERT INTO antworten values('".$_SESSION["username"]."', '$message', '$id','$date')";
                    $run = mysqli_query($con, $insert);
                    mysqli_close($con);
                    //Seite Neuladen um Nachricht anzuzeigen
                    die('<META http-equiv="refresh" content="0";URL="fragen.php">');
                }
                echo"
                                </form>
                            </table>
                        </div>
                    </section>    
                ";
            ?>    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>