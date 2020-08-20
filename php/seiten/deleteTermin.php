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
        
        require_once "../components/header.php"; 
        require_once "../components/scripts.php";
        require_once "../components/navIntern.php";
        implNavigation(', Du möchtest einen Termin löschen?!'); 
        ?>
    
    <main id="main" class="flex">
    <?php 
    require_once '../components/valuesDatabase.php';
    $userDb = return_user(); 
    $passwordDb = return_pw();
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $con = new PDO('mysql:host=localhost;dbname=grueneve_alles', $userDb, $passwordDb);
        $sql = 'DELETE FROM appointment WHERE id='.$id;
        $prepState = $con->prepare($sql);
        $prepState->execute();
        $con= null;
        $con = new PDO('mysql:host=localhost;dbname=grueneve_alles', $userDb, $passwordDb);
        $sql = 'SELECT * FROM appointment';
        $prepState = $con->prepare($sql);
        $prepState->execute();  
        $arrValues = $prepState->fetchAll(PDO::FETCH_ASSOC); 
        for($i=0; $i<count($arrValues); $i++){
            ?> 
            <form class="artTermin" method="POST">
                <input style="display:none" name="id" readonly value="<?php echo$arrValues[$i]['id']?>">
                <h2 class="h2Main"><?php echo $arrValues[$i]['title_appointement']?></h2>
                <div class="infosTermin">am <?php echo $arrValues[$i]['date_appointement']?> um <?php echo $arrValues[$i]['time_appointement']?> Uhr, <?php echo $arrValues[$i]['location_appointement'] ?></div>
                <div><?php echo$arrValues[$i]['descr_appointement']?></div> 
                <p><input  type="submit" name="submit"value="Termin löschen"></p>      
            </form>
        <?php
        }  
        $con = null;     
    }else {
        $con = new PDO('mysql:host=localhost;dbname=grueneve_alles', $userDb, $passwordDb);
        $sql = 'SELECT * FROM appointment';
        $prepState = $con->prepare($sql);
        $prepState->execute();  
        $arrValues = $prepState->fetchAll(PDO::FETCH_ASSOC); 
        for($i=0; $i<count($arrValues); $i++){
            ?> 
            <form class="artTermin" method="POST">
                <input style="display:none" name="id" readonly value="<?php echo$arrValues[$i]['id']?>">
                <h2 class="h2Main"><?php echo $arrValues[$i]['title_appointement']?></h2>
                <div class="infosTermin">am <?php echo $arrValues[$i]['date_appointement']?> um <?php echo $arrValues[$i]['time_appointement']?> Uhr, <?php echo $arrValues[$i]['location_appointement'] ?></div>
                <div><?php echo$arrValues[$i]['descr_appointement']?></div> 
                <p><input  type="submit" name="submit"value="Termin löschen"></p>      
            </form>
        <?php
        }
        $con= null;     
    } 
        ?>
    </main>
    <?php 
    require_once "../components/footer.php";
    ?>
    
        </body>
        
</html>