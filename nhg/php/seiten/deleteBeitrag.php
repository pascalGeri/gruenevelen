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
        implNavigation(', Du willst einen Beitrag löschen!?'); 
        ?>
    
    <main id="main" class="flex">
    <?php
            require_once '../components/valuesDatabase.php';
            $userDb = return_user(); 
            $passwordDb = return_pw();
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $con = new PDO('mysql:host=localhost;dbname=grueneve_alles', $userDb, $passwordDb);
                $sql = 'DELETE FROM aktuelles WHERE id='.$id;
                $prepState = $con->prepare($sql); 
                $prepState->execute();
                $con = null; 
                $con = new PDO('mysql:host=localhost;dbname=grueneve_alles', $userDb, $passwordDb);
                $sql = 'SELECT * FROM aktuelles';
                $prepState = $con->prepare($sql); 
                $prepState->execute();
                $arrayArticle = $prepState->fetchAll(PDO::FETCH_ASSOC);
                for($i=0; $i<count($arrayArticle); $i++){
                    ?> 
                    <form class="artActual" method="POST">
                        <input style="display:none" name="id" readonly value="<?php echo$arrayArticle[$i]['id']?>">
                        <h2 class="h2Main"><?php echo $arrayArticle[$i]['head']?></h2>
                        <img src="<?php echo $arrayArticle[$i]['filename']?>" alt="Ein Bild zum aktuellen Beitrag">
                        <?php echo $arrayArticle[$i]['text']?>
                        <p><input  type="submit" name="submit"value="Beitrag löschen"></p>  
                    </form>
                <?php
                } 
                $con = null;         
            }else {
                $con = new PDO('mysql:host=localhost;dbname=grueneve_alles', $userDb, $passwordDb);
                $sql = 'SELECT * FROM aktuelles';
                $prepState = $con->prepare($sql); 
                $prepState->execute();
                $arrayArticle = $prepState->fetchAll(PDO::FETCH_ASSOC); 
                for ($i = 0; $i<count($arrayArticle); $i++){
                ?>
                <form class="artActual" method="POST">
                    <input style="display:none" name="id" readonly value="<?php echo$arrayArticle[$i]['id']?>">
                    <h2 class="h2Main"><?php echo $arrayArticle[$i]['head']?></h2>
                    <img src="<?php echo $arrayArticle[$i]['filename']?>" alt="Ein Bild zum aktuellen Beitrag">
                    <?php echo $arrayArticle[$i]['text']?>
                    <p><input  type="submit" name="submit" value="Beitrag löschen"></p>  
                </form>
                <?php 
            }
          
        ?> 
    
    
    </main>
    <?php 
    }
    require_once "../components/footer.php";

    ?>
    
        </body>
        
</html>