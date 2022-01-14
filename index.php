<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gästebuchauftrag für EDV</title>
</head>
<body>
    
<!-- Background video im loop -->
 <video width="1920" height="1080" autoplay loop muted>
  <source src="halo.mp4" type="video/mp4">
</video>

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

                                if($_SESSION["logout"] == true){
                                    echo"<script>alert('Du wurdest erfolgreich ausgeloggt')</script>";
                                    $_SESSION["logout"] = false;
                                }
                                
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
                    Halo Spielreihe Forum 
                </span>
            </div>
        </section>
    <section class="dark">
        <div class="text-dark">
            <h1>Willkommen in diesem Forum</h1>
            <p>Mit diesem Forum wird ihre Kindheit ins helle Licht gerückt. Wenn Sie neu sind, können Sie fragen zu den Spielen Stellen und erhalten eine Antwort. </p>
        </div>        
    </section>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>