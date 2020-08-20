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

function checkInput ($nameInput) {
    return (isset($_POST[$nameInput]) && is_string($_POST[$nameInput]) && !empty($_POST[$nameInput]))? htmlspecialchars(stripslashes(trim($_POST[$nameInput]))) : '';
} 

    $title_appointement = checkInput('title_appointement');  
    $descr_appointement = checkInput('descr_appointement');  
    $date_appointement = checkInput('date_appointement');  
    $time_appointement = checkInput('time_appointement');  
    $location_appointement = checkInput('location_appointement');  
    $date_next_meeting = checkInput('date_next_meeting');  
    $time_next_meeting = checkInput('time_next_meeting');  
    $location_next_meeting = checkInput('location_next_meeting');  
    if (isset($_POST['publish_appointement'])) {
            require_once "../components/header.php"; 
            require_once "../components/scripts.php";
            require "../components/navIntern.php";
            implNavigation(', überprüfe Deinen Upload!?');
        ?>
            
            <main class="flex" id="main">
            <h1>So würde Dein Termin veröffentlicht</h1>
            <div style="flex: 0 0 100%;" class="flex">
            <article class="artTermin">
                <h2 class="h2Main"><?php echo $title_appointement?></h2>
                <div class="infosTermin">am <?php echo $date_appointement?> um <?php echo $time_appointement?> Uhr, <?php echo $location_appointement?></div>
                <div><?php echo $descr_appointement?></div>       
            </article>
            </div>
            <form action="" method="post" id="wrapperButUpload">
                <p class="flex" >
                    <input class="butUpload" type="submit" value="hochladen" name="upload_appointement">
                    <a class="butUpload"style="background-color: var(--HF_gruen)"href="./publishTermin.php">alles neu!</a>
                    <input class="butUpload" type="submit" value="bearbeiten" name="workon" id="bearbeiten" style="background-color: var(--AF_magenta)">
                    <p style="display:none">
                        <input type="text" name="title_appointement" value="<?php echo $title_appointement?>">
                        <input type="text" name="descr_appointement" value="<?php echo $descr_appointement?>">
                        <input type="date" name="date_appointement" value="<?php echo $date_appointement?>">
                        <input type="text" name="time_appointement" value="<?php echo $time_appointement?>">
                        <input type="text" name="location_appointement" value="<?php echo $location_appointement?>">
                    </p>
                </p>
            </form>
            </main>
        <?php
    
    }
    elseif(isset($_POST['workon'])) {
        require_once "../components/header.php"; 
        require_once "../components/scripts.php";
        require "../components/navIntern.php";
        implNavigation(', Du willst den Termin bearbeiten!?');
        require_once "../components/formsPublishTermin.php"; 
    }
    elseif(isset($_POST['upload_appointement'])) {
        $con = new PDO("mysql:host=localhost;dbname=grueneve_alles", $userDb, $passwordDb);
        $sql =  "INSERT INTO appointment (title_appointement, descr_appointement, date_appointement, time_appointement, location_appointement) VALUES (?,?,?,?,?)"; 
        $prepState = $con->prepare($sql);
        $prepState->bindParam(1, $title_appointement);  
        $prepState->bindParam(2, $descr_appointement);  
        $prepState->bindParam(3, $date_appointement);  
        $prepState->bindParam(4, $time_appointement);  
        $prepState->bindParam(5, $location_appointement);  
        if ($prepState->execute()){
            require_once "../components/header.php"; 
            require_once "../components/scripts.php";
            require "../components/navIntern.php";
            implNavigation(', Du hast den Termin veröffentlicht!?');
        }
    }
    elseif (isset($_POST['publish_next_meeting'])) {
        $con = new PDO("mysql:host=localhost;dbname=grueneve_alles", $userDb, $passwordDb);
        $sql =  "UPDATE next_appointement SET date_next_meeting = ?, time_next_meeting = ?, location_next_meeting = ? WHERE id = 1"; 
        $prepState = $con->prepare($sql);
        $prepState->bindParam(1, $date_next_meeting);  
        $prepState->bindParam(2, $time_next_meeting);  
        $prepState->bindParam(3, $location_next_meeting);  
        if ($prepState->execute()){
            require_once "../components/header.php"; 
            require_once "../components/scripts.php";
            require "../components/navIntern.php";
            implNavigation(', Du hast den Termin unseres nächsten Treffens veröffentlicht!?');
        } 
    }
    else {
        require_once "../components/header.php"; 
        require_once "../components/scripts.php";
        require "../components/navIntern.php";
        implNavigation(', Du willst einen Termin veröffentlichen!?');
        require_once "../components/formsPublishTermin.php"; 
    } 
    require_once "../components/footer.php";
    ?>
    
        </body>
        
</html>