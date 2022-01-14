<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forum</title>
</head>
<body>

<style>
body {
  background-image: url('50050.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
    <!-- Navigation -->
    <section class="nav-area">
        <nav>
            <div class="nav">
                <ul>
                    <li><ion-icon name="home-outline"></ion-icon><a href="index.php">Home</a></li>
                    <li><ion-icon name="planet-outline"></ion-icon><a href="forum.php">Forum</a></li>
                    <li><ion-icon name="people-outline"></ion-icon><a href="contact.php">Kontakt</a></li>   
                    <?php
                            //Session Start
                            session_start();
                            //Wenn der User nicht eingelogt ist leite ihn zu Anmelde Formular Weiter  
                            if($_SESSION["login"] == false){
                                echo"<li><ion-icon name='log-in-outline'></ion-icon><a href='login.php'>Anmelden</a></li>   
                                ";
                            }
                            //Wenn User angemeldet zeige seinen Username an und leite zu Logout weiter
                            else{
                                if($_SESSION["rolle"] == 1){
                                    echo"<li><ion-icon name='code-slash-outline'></ion-icon><a href='mod.php'>Moderation</a></li>";  
    
                                }
                                echo"<li><ion-icon name='log-in-outline'></ion-icon><a href='logout.php'>Abmelden</a></li>";  
                                echo"<p class = 'user'><a>Hey, " .$_SESSION["username"]."</a></p>";
                                                            
                            }
                        ?>
                    <li>
                        <!-- Erstellung des Such Formulars -->
                        <div class="search">
                            <table>
                                <form action="" method="post">
                                    <td><input type="search" name="search" placeholder = "Gebe dein Problem ein"></td>
                                    <td><input type="submit" name = "suchen" value = "Suchen" class = "suchen"></td>
                                </form>
                            </table>
                        </div>
                    </li>   
                </ul>
            </div>
        </nav>
    </section>
    <section class = 'banner'>
        <div class="contact">
            <span class="back">
            Forum
            </span>
        </div>
    </section>
<!-- Ende des Nav Bereiches-->

    <?php
        //Datenbank Verbindung und Abfrage nach allen Fragen in der Datenbank
        $con = mysqli_connect('localhost','root','','bbs');
        $sql = "SELECT * FROM fragen";
        $res = mysqli_query($con, $sql);
        //Wenn der Knopf mit Frage erstellen gedrückt wurde leite weiter nach frage_new.php
        
        if(isset($_POST["suchen"])){
            //speichere Inhalt der Suchleiste zwischen unf führe eine Abfrage durch die Fragen anzeigt die Such Inhalt ähneln
            $search = $_POST["search"];
            $suchen = "SELECT * FROM fragen WHERE frage LIKE '%$search%'";
            $quary = mysqli_query($con, $suchen);
            $numbers = mysqli_num_rows($quary);
            if($numbers > 0){
                if(!isset($_GET["frage"])){
                    echo"
                        <section class='content'>
                            <div class = 'content_table'>
                                <table class = 'content_inhalt'>
                                <form action='' method = 'get'>
                                    <th><h1>Fragen: <h1></th>                                    
                    ";
                    //Abfrage für alle Fragen in der Datenbank -> alle fragen in Tabelle einfügen im loop
                    while($dset = mysqli_fetch_assoc($quary)){
                        $frage = $dset['frage']; 
                        $fragenID = $dset['fragen_id'];                       
                        echo"
                                        <tr>
                                            <td class = 'links'>
                                                <a href = forum.php?frage=$fragenID class = 'frage_link'>$frage</a>
                                            </td>
                                        </tr>                                                                              
                        ";
                    }
                    echo"
                                    </form>
                                </table>
                            </div>
                        </section>
                    ";
                            
                }
            
                else{
                    session_start();
                    $_SESSION["id"] = $_GET["frage"]; 
                    header("Location: fragen.php");
                }   
            }
            else{
            // Anzeige von Fragen die Suchbegriff ähneln und auswahl Möglichkeit
                    echo"<script>alert('Leider sind keine Frage für diesen Suchbegriff vorhanden')</script>";

                    header("Refresh: 0");
                    
            }
        }
        else{
            if(isset($_POST["new"])){
                header("Location: frage_new.php");                    
            }
            else{
                //Wenn auswählen nicht gedrückt zeige ein Formular mit allen Fragen in der Datenbank an
                if(!isset($_GET["frage"])){
                    echo"
                        <section class='content'>
                            <div class = 'content_table'>
                                <table class = 'content_inhalt'>
                                    <form action='' method = 'get'>
                                        <th colspan = '2'><h1>Fragen: </h1></th>                                    
                    ";
                    //Abfrage für alle Fragen in der Datenbank -> alle fragen in Tabelle einfügen im loop
                    while($dset = mysqli_fetch_assoc($res)){
                        $frage = $dset['frage']; 
                        $fragenID = $dset['fragen_id'];
                        $username = $dset['username'];                      
                        echo"
                                        <tr>
                                            <td><p class = 'username'><ion-icon name='person-outline'></ion-icon> <br> $username: </p></td>
                                            <td class = 'links'>
                                                <a href = forum.php?frage=$fragenID class = 'frage_link'> $frage</a>
                                            </td>
                                        </tr>                                                                              
                        ";
                    }
                    echo"
                                        </form>
                                        <form action='' method = 'POST'>   
                                        <tr>                                 
                                            <td colspan = '2'><input type='submit' value='Frage erstellen' name = 'new' class = 'btn'></td>
                                        </tr>
                                    </form>
                                </table>
                            </div>
                        </section>

                    ";
                            
                }
            
                else{
                    session_start();
                    $_SESSION["id"] = $_GET["frage"]; 
                    header("Location: fragen.php");
                }
            }
        }

    ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>