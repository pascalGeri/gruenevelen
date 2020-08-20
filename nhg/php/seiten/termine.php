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
        ?>
        
    <main id="main" class="flex">
    <?php 
        require_once '../components/valuesDatabase.php';
        $userDb = return_user(); 
        $passwordDb = return_pw(); 
        $con = new PDO('mysql:host=localhost;dbname=grueneve_alles', $userDb, $passwordDb);
        $sql = 'SELECT * FROM appointment';
        $prepState = $con->prepare($sql);
        $prepState->execute();  
        $arrValues = $prepState->fetchAll(PDO::FETCH_ASSOC); 
        for($i=0; $i<count($arrValues); $i++){
            ?> 
            <article class="artTermin">
                <h2 class="h2Main"><?php echo $arrValues[$i]['title_appointement']?></h2>
                <div class="infosTermin">am <?php echo $arrValues[$i]['date_appointement']?> um <?php echo $arrValues[$i]['time_appointement']?> Uhr, <?php echo $arrValues[$i]['location_appointement'] ?></div>
                <div><?php echo$arrValues[$i]['descr_appointement']?></div>       
            </article>
        <?php
        }
        ?>
    </main>
        <?php 
        require_once "../components/footer.php";
        ?> 
    
    </body>
        
</html>