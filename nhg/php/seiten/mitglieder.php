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


if (isset($_POST['submit1'])) {
    $email = (isset($_POST['email']) && is_string($_POST['email'])
    && !empty($_POST['email']) && trim($_POST['email'])) ? htmlspecialchars($_POST['email']):'';
    $betreff = (isset($_POST['betreff']) && is_string($_POST['betreff'])
    && !empty($_POST['betreff']) && trim($_POST['betreff'])) ? htmlspecialchars($_POST['betreff']):'';
    $name = (isset($_POST['name']) && is_string($_POST['name'])
    && !empty($_POST['name']) && trim($_POST['name'])) ? htmlspecialchars($_POST['name']):'';
    $textarea = (isset($_POST['textarea']) && is_string($_POST['textarea'])
    && !empty($_POST['textarea']) && trim($_POST['textarea'])) ? htmlspecialchars($_POST['textarea']):'';
    $replyTo = (isset($_POST['replyTo']) && is_string($_POST['replyTo'])
    && !empty($_POST['replyTo']) && trim($_POST['replyTo'])) ? htmlspecialchars($_POST['replyTo']):'';
    $textarea = $textarea . '<p>Eine Antwort bitte an: '.$replyTo. '</p>'; 

    mail($email, $betreff, $textarea, "Cc: \r\nreplyTo:$replyTo\r\n"); //Achtung: in der mail d端rfen  nicht die $_POST-Werte eingegeben werden!
    echo "<article class='mainArt flex' id='mainHello'>
            <h2 class='h2Main'>Sie haben uns folgende Nachricht gesendet:</h2>
            <section class='mainText'> 
                <p>Name: $name</p>
                <p>Betreff: $betreff</p>
                <p>Nachricht: $textarea</p>
                <p id='mfg'>Mit Dank f端r das Interesse</p>
                <p id='gruss'>Ihre Gr端nen in Velen</p>

            </section>    
        </article>
        ";  
    ;
}
else {
?>
<main id="main" class="flex">
<article id="articleKontakt">
<h2 class="h2Main">Kontakt zu uns: </h2>
Schreiben Sie einem Mitglied Ihrer Wahl eine E-Mail (direkt von dieser Seite, siehe Mitglieder) oder sprechen Sie uns telefonisch an! Wir freuen uns auf Sie!
</article>

</main>

<script src="../../javascript/person_array.js"></script>
<script src="../../javascript/personen.js"></script>
<script src="../../javascript/script_form.js"></script>
    
    <script>
        new Personen ('bilder', 'containerPerson', 
        'main', 'personenDaten');
        let p_emails = document.getElementsByClassName('cont_email');
        for (let i =0; i<p_emails.length; i++) {
            p_emails[i].addEventListener('click', function(event) { 
                let email = event.target.innerText; 
                new FormMail('bg_form', 'POST', '', 'form_mail', email);
            }); 
        }
    </script>
 <?php
}
 
    require_once "../components/footer.php";
    ?>     
   
</body>
</html>