<?php
session_start(); 
if (!isset($_SESSION['passwort'])){
    header('Location:faultLOGIN.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <?php 
    require_once "../components/head.php"
    ?>
<link rel="stylesheet" href="../../css/inside.css">
<link rel="stylesheet" href="../../css/form.css">
</head>
<body>
<?php
require_once '../components/valuesDatabase.php';
$userDb = return_user(); 
$passwordDb = return_pw(); 

function createConnection($userDb, $passwordDb){
    return new PDO("mysql:host=localhost;dbname=grueneve_alles", $userDb, $passwordDb); 
}

function checkInputVal ($nameInput) {
    return (isset($_POST[$nameInput]) && is_string($_POST[$nameInput]) && !empty($_POST[$nameInput]))? htmlspecialchars(stripslashes(trim($_POST[$nameInput]))) : '';
} 
function changeImageSize($path_file_big, $image_attributes, $base_val_image = 375, $ziel){ 
    $img_width_big = $image_attributes[0]; 
    $img_height_big = $image_attributes[1];
    $aspect_ratio= $img_width_big/$img_height_big;
    $img_type = $image_attributes['mime']; 
    $path_file_small = $ziel.'small'.basename($path_file_big);  
    if ($aspect_ratio <= 1) {
        $img_width_new = ceil($aspect_ratio * $base_val_image); 
        $img_height_new = $base_val_image; 
    } 
    elseif ($aspect_ratio > 1) {
        $img_width_new = $base_val_image; 
        $img_height_new = ceil($base_val_image/$aspect_ratio);

    } 
    if ($img_type === 'image/jpeg'){
        $image_big = imagecreatefromjpeg($path_file_big);//Erzeugung eines Bildobjektes als Kopie
        $image_small = imagecreatetruecolor($img_width_new, $img_height_new); //Erzeugung eines Bildobjektes für das neue Bild
        imagecopyresampled($image_small, $image_big, 0,0,0,0, $img_width_new, $img_height_new, $img_width_big, $img_height_big);
        //kopieren des Bildes in das neue Bildobjekt und Veränderung der Größe 
        imagejpeg($image_small, $path_file_small); 
    }
    if($img_type === 'image/png'){
        $image_big = imagecreatefrompng($path_file_big); //Erzeugung eines Bildobjektes als Kopie
        $image_colordepth = imagecolorstotal($image_big); //Bestimmung der Farbtiefe und Speicherung des Wertes in der Variablen colordepth
        if($image_colordepth == 0 || $image_colordepth >255) {
            $image_small = imagecreatetruecolor($img_width_new, $img_height_new); //Erzeugung eines Bildobjektes für das neue Bild
        }
        else {
            $image_small = imagecreate($img_width_new, $img_height_new); //Erzeugung eines Bildobjektes für das neue Bild
        }
        imagealphablending($image_small, false); //Diese Einstellung erhält den Alphakanal, also den Durchschein_Effekt eines png-Bildes. Ansonsten würde das Bild zu einem Einfarben Bild umgewandelt
        imagecopyresampled($image_small, $image_big, 0,0,0,0, $img_width_new, $img_height_new, $img_width_big, $img_height_big); 
        imagesavealpha($image_small, true); //imagesavealpha() setzt das Flag, das bestimmt, ob beim Speichern von PNG-Bildern vollständige 
        //Alphakanal-Information (im Gegensatz zu Einfarb-Transparenz) erhalten wird.
        imagepng($image_small, $path_file_small); 
    }
    imagedestroy($image_big); 
    imagedestroy($image_small); 
    unlink($path_file_big); //löscht die große Datei im Ordner
    return $path_file_small; 

    
} //Ende changeImageSize

function checkArticle($head, $text, $date, $path_file_small){
    require_once "../components/header.php"; 
    require_once "../components/scripts.php";
    ?>
        <nav class="flex">
            <h2 id="h2Hello">
                <?php echo '<span class="helloName">'.$_SESSION['name'].'</span>, Du willst Deinen Beitrag bearbeiten!?'; ?>
            </h2><a class="butUpload" href="LOGOUT.php">LOGOUT</a>
        </nav>   
         <main id="main" class="flex" >   
            <h1>So würde Dein Artikel aussehen:</h1>
            
            <article class="artActual">
                <h2 class="h2Main"><?php echo $head?></h2>
                <p><?php echo $date?></p>
                <img src="<?php echo $path_file_small?>" alt="Ein Bild zum aktuellen Beitrag">
                <?php echo $text?>
            </article>
            <form action="" method="post" id="wrapperButUpload">
                <p class="flex" >
                    <input class="butUpload" type="submit" value="hochladen" name="upload">
                    <a class="butUpload"style="background-color: var(--HF_gruen)"href="./beitragAktuelles.php">alles neu!</a>
                    <input class="butUpload" type="submit" value="bearbeiten" name="workon" id="bearbeiten" style="background-color: var(--AF_magenta)">
                    <p style="display:none">
                        <input type="date" name="date" value="<?php echo $date?>">
                        <input type="text" name="head" value="<?php echo $head?>">
                        <input type="text" name="text" value="<?php echo $text?>">
                        <input type="text" name="path_file_small" value="<?php echo $path_file_small?>">
                    </p>
                </p>
            </form>
        </main>
    <?php 
}



//the end of checkArticle
    $head = checkInputVal('head'); 
    $text = checkInputVal('text'); 
    $date = checkInputVal('date');  
    if (isset($_POST['workon'])){//Wenn das Formular bearbeitet werden soll
        require "../components/header.php"; 
        require "../components/scripts.php";
        require_once "../components/navIntern.php";
        implNavigation(', Du möchtes einen aktuellen Beitrag veröffentlichen?!'); 
        require_once "../components/formAktuellesUpload.php";
        $path_file_small = $_POST['path_file_small']; 
        unlink($path_file_small); 
        createFormUpload ($head, $date, $text);     
    }

    elseif (isset($_POST['publishArticle'])) {//Der erste Entwurf wird abgesendet
        $image_attributes = getimagesize($_FILES['fileImage']['tmp_name']);
        $mimeImage = $image_attributes['mime']; 
            if($mimeImage ==='image/jpeg'||$mimeImage ==='image/png'||$mimeImage === '') { //Überprüfung des Datentyps der Datei und Zählen der aktuellen Artikel
                $con = createConnection($userDb, $passwordDb);
                $sql = "SELECT counter FROM counter"; 
                $prepState = $con->prepare($sql); 
                $prepState->execute();
                $value= $prepState->fetch(PDO::FETCH_ASSOC);
                $value['counter'] += 1;
                $sql = "UPDATE counter SET counter =".$value['counter']; 
                $prepState = $con->prepare($sql); 
                $prepState->execute();
                $con = null; 

                if (isset($_FILES['fileImage'])){
                    $image = $_FILES['fileImage']['tmp_name'];
                    $ziel = "uploads/";
                    $path_file_big = $ziel . basename($_FILES['fileImage']['name']);
                    
                    if (move_uploaded_file($image, $path_file_big)){
                        $image_attributes = getimagesize($path_file_big);//Rückgabewert ist ein Array mit den Angaben zum Bild
                        $path_file_small = changeImageSize($path_file_big, $image_attributes, $base_val_image = 500, $ziel); //hier findet die Veränderung des Bildes statt
                        checkArticle($head, $text, $date, $path_file_small); //Hier wird angeboten, sich den Artikel in seiner Form nochmal anzusehen
                    }
                    else {//Wenn der Dateiupload fehlschlägt
                        require_once "../components/header.php"; 
                        require_once "../components/scripts.php";
                        echo '<p class="advWrongMimeType">Der Dateiupload ist fehlgeschlagen!</p>'; 
                    }  
                }
            }else{ //Bei fehlerhaftem Dateityp des Bildes wird ein Warnhinweis ausgesendet und die Seite neu geladen
                require_once "../components/header.php"; 
                require_once "../components/scripts.php"; 
                ?>
                <nav class="flex">
                    <h2 id="h2Hello">
                        <?php echo '<span class="helloName">'.$_SESSION['name'].'</span>, Du schreibst einen Beitrag für Aktuelles!?'; ?>
                    </h2><a class="butUpload" href="LOGOUT.php">LOGOUT</a>
                </nav>   
                
                <?php 
                /* Der Warnhinweis*/echo ('<p class="advWrongMimeType">Die ausgewählte Datei ist keine Bilddatei! Bitte wähle eine Bilddatei im jpg- oder png-Format aus!</p>');
                require_once "../components/formAktuellesUpload.php"; 
                createFormUpload($head, $date, $text); 
                
            }
          
    }
    elseif (isset($_POST['upload'])){//Nachdem der Artikel gecheckt wurde, werden die Daten hochgeladen
        print_r($_POST); 
        $head = checkInputVal('head'); 
        $text = checkInputVal('text'); 
        $date = checkInputVal('date'); 
        $path_file_small = checkInputVal('path_file_small'); 
        $con = createConnection($userDb, $passwordDb);
        $sql = "INSERT INTO aktuelles (head, text, date, filename) VALUES (:head, :text, :date, :filename)"; 
        $prepState = $con->prepare($sql); 
        $prepState->bindParam(':head', $head);  
        $prepState->bindParam(':text', $text);   
        $prepState->bindParam(':date', $date); 
        $prepState->bindParam(':filename', $path_file_small); 
        if($prepState->execute()) {
            require_once "../components/header.php"; 
            require_once "../components/scripts.php";
        ?>
            <article class="mainArt flex" id="mainTeam">
                <h2 class="h2Main">Das Hochladen war erfolgreich!</h2>
                <section class="mainText">Schaue Dir Deinen Artikel einfach an: <a href="./aktuelles.php">zum Artikel</a></section>    
            </article>
            <?php 
        }
        else {
            require_once "../components/header.php"; 
            require_once "../components/scripts.php";
            ?>
            <article class="mainArt flex" id="mainTeam">
                <h2 class="h2Main">Das Hochladen ist fehlgeschlagen</h2>
                <section class="mainText">Versuche es erneut<a href="./beitragAktuelles.php">zum Formular</a></section>    
            </article>
            <?php 
        }
    } 
    else { //Der Start zum Schreiben eines Artikels
        require "../components/header.php"; 
        require "../components/scripts.php";
        require "../components/navIntern.php";
        implNavigation(', Du schreibst einen Beitrag für Aktuelles!?');
        ?>
        
        <?php
        
        require_once "../components/formAktuellesUpload.php"; 
        createFormUpload ($head, $date, $text); 
    }
    ?>
    <main id="main" class="flex">
    
    </main>
    <?php 
    require_once "../components/footer.php";
    ?> 
    
        </body>
        
</html>