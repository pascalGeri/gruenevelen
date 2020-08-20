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
            $sql = 'SELECT * FROM aktuelles WHERE id > 0'; 
            $prepState = $con->prepare($sql); 
            $prepState->execute(); 
            $arrayArticle = $prepState->fetchAll(PDO::FETCH_ASSOC); 
            for ($i = 0; $i<count($arrayArticle); $i++){
                ?>
                <article class="artActual" id="">
                <h2 class="h2Main"><?php echo $arrayArticle[$i]['head']?></h2>
                
                <img src="<?php echo $arrayArticle[$i]['filename']?>" alt="Ein Bild zum aktuellen Beitrag">
                <?php echo $arrayArticle[$i]['text']?>
                   
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