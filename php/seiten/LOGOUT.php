<?php 
session_start(); 
$name = $_SESSION['name']; 
session_destroy(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <?php 
    require_once "../components/head.php"

?>
</head>
<body>
<?php
        
        require_once "../components/header.php"; 
        require_once "../components/scripts.php";
        ?>
        
    <main id="main" class='flex'>
        <article id="articleKontakt">
            Lieber <?php echo $name?>, Du hast Dich aus dem Mitgliederbereich verabschiedet. 
            Falls Du Dich wieder anmelden willst, melde Dich <a href="LOGIN.php">hier</a> wieder an! Ansonsten wünsche ich (Pascal)
            Dir alles Gute und hoffe, Dich bald persönlich zu treffen. 
        </article>
    </main>
    <?php 
    require_once "../components/footer.php";
    ?>
    
        </body>
        
</html>