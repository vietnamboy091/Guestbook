<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Registrierung</title>
</head>
<body>
    
    <section class="background">
        <div class="login">
            <form action="" method="post">
            
                <h1>Registierung</h1>
                <div class="login-div">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name = "username" placeholder ='Username'>
                </div>
                <div class="login-div">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name = "email" placeholder ='E-Mail'>
                </div>
                <div class="login-div">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                    <input type="email" name = "emailconf" placeholder ='Bestätigungs E-Mail'>
                </div>
                <div class="login-div">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="text" name = "passwort" placeholder ='Passwort'>
                </div>
                <div class="login-div">
                    <ion-icon name="checkmark-done-outline"></ion-icon>    
                    <input type="text" name = "passwortconf" placeholder ='Passwort Bestätigung'>
                </div>
                <div class="send">   
                    <input type="reset" value="Löschen">
                    <input type="submit" name = "register" value = "Registierung">
                </div>    
            </form>
        </div>
    </section>

    <?php
        if(isset($_POST["register"])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $emailconf = $_POST["emailconf"];
            $passwort = $_POST["passwort"];
            $passwortconf = $_POST["passwortconf"];

            $con = mysqli_connect("localhost", "root", "", "bbs");
            $abfrage = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
            $result = mysqli_query($con,$abfrage);
            $num = mysqli_num_rows($result);
            if($num > 0){
                echo"<script>alert('Dein Username oder deine E-Mail ist bereits vorhanden')</script>"; 
            }
            else{

                if($email == $emailconf && $passwort == $passwortconf){
                    $sql = "INSERT INTO user VALUES ('$username', '$email', '$passwort', '2')";
                    $res = mysqli_query($con, $sql);
                    if($res){
                    echo"<script>alert('Die Registrierung war erfolgreich')</script>"; 

                    }
                }
                else{
                    echo"<script>alert('Deine E-Mail oder Passwort stimmt nicht mit der Überprüfung überein')</script>"; 
                }
            }
        }
    ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>