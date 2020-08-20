<?php
session_start(); 
if (!isset($_SESSION['passwort'])){
    header('Location:faultLOGIN.php'); 
}
?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
<?php 
    require_once "../components/head.php"
?>
<link rel="stylesheet" href="../../css/inside.css">
</head>
<body>
<?php
        
    require_once "../components/header.php"; 
    require_once "../components/scripts.php";
    require_once "../components/navIntern.php";
        implNavigation(', was möchtest Du machen?!'); 
?>
    

    <main id="main" class="flex">
        <a style="text-decoration: none" href="beitragAktuelles.php"><div class="todo flex" id="thema1">Einen Beitrag schreiben für Aktuelles!</div></a>
        <a style="text-decoration: none" href="deleteBeitrag.php"><div class="todo flex" id="thema2">Einen Beitrag löschen!</div></a>
        <a style="text-decoration: none" href="./publishTermin.php"><div class="todo flex" id="thema3">Einen Termin auf der Seite veröffentlichen!</div></a>
        <a style="text-decoration: none" href="./deleteTermin.php"><div class="todo flex" id="thema4">Einen Termin löschen!</div></a>
        <a style="text-decoration: none" href="./publishLink.php"><div class="todo flex" id="thema5">Interessanten Link veröffentlichen!</div></a>
        <a style="text-decoration: none" href="./deleteLink.php"><div class="todo flex" id="thema6">Einen Link löschen!</div></a>
    </main>
    <?php 
    require_once "../components/footer.php";
    ?>
    
        </body>
        
</html>