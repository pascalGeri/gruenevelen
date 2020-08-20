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
        implNavigation(', !?'); 
        ?>
    
    <main id="main" class="flex">
    
    </main>
    <?php 
    require_once "../components/footer.php";
    ?>
    
        </body>
        
</html>