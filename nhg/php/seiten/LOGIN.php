<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<?php 
    require_once "../components/head.php"
    
?>
    <link rel="stylesheet" href="../../css/form.css">

</head>
<body>
<?php
    
function checkInputVal ($nameInput) {
    return (isset($_POST[$nameInput]) && is_string($_POST[$nameInput]) && !empty($_POST[$nameInput]))? htmlspecialchars(stripslashes(trim($_POST[$nameInput]))) : '';
}     
        require_once "../components/header.php"; 
        require_once "../components/scripts.php";
if (isset($_POST['submitChangePW'])){//Hier wird das geänderte Passwort geprüft und in die Datenbank eingetragen
    $newPW = checkInputVal('newPW');
    $checkPW = checkInputVal('checkPW');
    $changePassword = true; 
    if ($newPW === $checkPW) {
        $con = new PDO('mysql: host=localhost; dbname=grueneve_alles', 'root', ''); 
        $sql = 'UPDATE user SET password = :newPW, changePassword = :changePassword'; 
        $prepState = $con->prepare($sql); 
        $prepState->bindParam(':newPW', $newPW);  
        $prepState->bindParam(':changePassword', $changePassword);  
        $prepState->execute(); 
        header('Location:LOGIN.php'); 
    }else {
        ?>
            <form id="" class="formLogin" action="" method="post">
                <h2 class="h2Main">Die Passwörter stimmen nicht überein! Bitte versuche es erneut</h2>
                <p class="pformElement"><label for="newPW" class="labelInput"></label><input type="text" name="newPW" id="newPW"></p>
                <p class="pformElement"><label for="checkPW" class="labelInput">Passwort:</label><input type="password" name="checkPW" id="checkPW"></p>
                <p class="pformElement flex"><input type="submit" name="submitChangePW" id="" value="SPEICHERN"></p>
            </form>
            <?php
    } 
}elseif (isset($_POST['submitLogin'])) {//Hier wird zum ersten Mal der LOGIN überprüft, ob der Nutzer schon sein Passwort verändert hat
    $password = checkInputVal('password'); 
    $username = checkInputVal('username');
    $con = new PDO('mysql:host=localhost;dbname=grueneve_alles', 'root', ''); 
    $sql = "SELECT * FROM user WHERE username = :username"; 
    $prepState = $con->prepare($sql); 
    $prepState->bindParam(':username', $username);  
    $prepState->execute();
    $arrUserVals = $prepState->fetch(PDO::FETCH_ASSOC); 
    if ($username === $arrUserVals['username'] && $password === $arrUserVals['password']){//Nutzer und Passwort stimmen bei der ersten Überprüfung überein
       if ($arrUserVals['changePassword'] == 0){//Das Passwort ist noch nicht geändert
            $con = null;
            ?>
            <form id="" class="formLogin" action="" method="post">
                <?php echo 'hallo';?>
                <h2 class="h2Main">Bitte ändere Dein Passwort!</h2>
                <p class="displayNone"><input type="text" name="username" id="username" value=<?php echo $username?>></p>
                <p class="pformElement"><label for="newPW" class="labelInput"></label><input type="text" name="newPW" id="newPW"></p>
                <p class="pformElement"><label for="checkPW" class="labelInput">Passwort:</label><input type="password" name="checkPW" id="checkPW"></p>
                <p class="pformElement flex"><input type="submit" name="submitChangePW" id="" value="SPEICHERN"></p>
            </form>
            <?php
        }else {//Das Paswort wurde geändert
            //Das Passwort stimmt überein und der Nutzer geht in den Mitgliederbereich
                $_SESSION['passwort'] = true; 
                $_SESSION['array'] = $arrUserVals; 
                $_SESSION['name'] = $arrUserVals['name'];  
                header('Location:indexIntern.php'); 
        }
    }elseif($username !== $arrUserVals['username'] || $password !== $arrUserVals['password']){//Nutzername existiert nicht oder das Passwort ist falsch eingegeben
         
        ?>
        <main id="main" class="flex">
            <form class="formLogin" action="" method="post">
                <h2 class="h2Main">Leider fehlgeschlagen!</h2>
                <p class="advice"> Das Passwort oder der Nutzername sind falsch!</p>
                <p class="pformElement"><label for="username" class="labelInput">Benutzername: </label><input type="text" name="username" id="username"></p>
                <p class="pformElement"><label for="password" class="labelInput">Passwort:</label><input type="password" name="password" id="passsword"></p>
                <p class="pformElement flex"><input type="submit" name="submitLogin" id="submitLogin" value="LOGIN"></p>
            </form>
            </main>
        <?php
    }
}else {//die erste Anmeldung
    ?>  
        <main id="main" class="flex">
        <form class="formLogin" action="" method="post">
            <h2 class="h2Main">Bitte melde Dich an!</h2>
            <p class="advice">Bitte entschuldigen sie, aber dieser LOGIN ist nur für Mitglieder des Ortsvereins!</p>
            <p class="pformElement"><label for="username" class="labelInput">Benutzername: </label><input type="text" name="username" id="username"></p>
            <p class="pformElement"><label for="password" class="labelInput">Passwort:</label><input type="password" name="password" id="passsword"></p>
            <p class="pformElement flex"><input type="submit" name="submitLogin" id="submitLogin" value="LOGIN"></p>
        </form>
        </main>
    <?php
    }
    ?>
    <?php 
    require_once "../components/footer.php";
    ?>
    
    </body>
        
    </html>