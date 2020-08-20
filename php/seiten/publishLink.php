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
        require "../components/navIntern.php";
        implNavigation(', Du veröffentlichst einen Link!?');
        ?>
    
    <main id="main" class="flex">
    <form class="form_termin_links">
            <label for="link_for_user"><h2 class="h2Main">Link für die Nutzer der Seite!</h2> </label>
            <p class="wrapper_inputs_termine">link einfügen<br><input type="text" name="link_for_user" id="link_for_user"></p>
            <p class="wrapper_inputs_termine"><input class="butUpload" type="submit" value="veröffentlichen" name="publish_Link"></p>
    </form>
    </main>
    <?php 
    require_once "../components/footer.php";
    ?>
    
    
    
        </body>
        
</html>