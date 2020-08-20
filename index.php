<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <?php 
    require_once "./php/components/head.php"

?>
</head>
<body>
<?php
        
        require_once "./php/components/header.php"; 
        require_once "./php/components/indexscripts.php";
        ?>
        
    <main id="main" class="flex">
        <article class="mainArt flex" id="mainHello">
            <h2 class="h2Main">FÜR EIN NACHHALTIGES VELEN/Ramsdorf</h2>
            <section class="mainText">Herzlich Willkommen auf der Internetseite der Grünen in Ramsdorf und Velen. Wir freuen uns, dass Sie uns besuchen und Interesse an uns und unserer Arbeit für Ramsdorf und Velen zeigen. Unser Ort hat viel Potential und viele Möglichkeiten, jedoch ist im Bereich Nachhaltigkeit, Klimaschutz, Artenvielfalt und Soziales viel Spielraum für nachhaltige Entwicklung. Zur Ausschöpfung dieses Potentials bedarf es viel Kreativität, Motivation,  Engagement und vor allem Auseinandersetzung mit den politischen Partnern im Rat. Dafür stehen wir Grüne und dazu sind wir bereit.<br>
                Auf diesen Seiten können Sie sich darüber informieren, welche Ideen und Vorhaben wir umsetzen wollen und welche Personen dafür stehen. <br> 
                <p id="mfg">Mit Dank für das Interesse</p>
                <p id="gruss">Ihre Grünen in Velen/Ramsdorf</p>

            </section>    
        </article>

        <article class="mainArt flex" id="mainTeam">
            <h2 class="h2Main">EIN STARKES TEAM</h2>
            <figure class="mainFig flex">
                <img src="./images/FotosMG/alle.jpg" alt="Gruppenbild">
                <figcaption class="mainFigCapt">Eine gute Mischung aus Jung und Alt</figcaption>
            </figure>
            <section class="mainText"></section>    
        </article>

       
        <article class="mainArt flex">
            <h2 class="h2Main">UNSERE SPRECHERINNEN</h2>
            <figure class="mainFig flex">
                <img class="imgIndex"  src="./images/FotosMG/uschi.jpg" alt="Bild von Ursula Gerighausen">
                <figcaption class="mainFigCapt">Ursula Gerighausen</figcaption>
            </figure>
            <figure  class="mainFig">
                <img class="imgIndex" src="./images/FotosMG/lisa.jpg" alt="Bild von Lisa Fastring">
                <figcaption class="mainFigCapt">Lisa Fastring</figcaption>
            </figure>
              
        </article>
        <article class="mainArt flex">
            <h2 class="h2Main">Die Ratsfraktion</h2>
            <figure class="mainFig flex">
                <img class="imgIndex" src="./images/FotosMG/albert.jpg" alt="Bild von Albert Göken">
                <figcaption class="mainFigCapt">Albert Göken</figcaption>
            </figure>
            <figure class="mainFig flex">
                <img class="imgIndex"  src="./images/FotosMG/martin.jpg" alt="Bild von Martin Dirking">
                <figcaption class="mainFigCapt">F.-V. Martin Dirking</figcaption>
            </figure>
        </article>
        
        
        <article id="artThemen" class="flex">
            <h2 class="h2Main">Unser Wahlprogramm</h2>
            <a href="./php/seiten/klimaschutz.php"><section id="thema1" class="themen flex">Klima</section></a>
            <a href="./php/seiten/artenvielfalt.php"><section id="thema2" class="themen flex">Artenvielfalt</section></a>
            <a href="./php/seiten/soziales.php"><section id="thema3" class="themen flex">Soziales</section></a>
            <a href="./php/seiten/wirtschaft.php"><section id="thema4" class="themen flex">Wirtschaft</section></a>
            <a href="./php/seiten/kultur.php"><section id="thema5" class="themen flex">Kultur</section></a>

        </article>
        
        </main>
        
        
<?php
require_once './php/components/valuesDatabase.php';
$userDb = return_user(); 
$passwordDb = return_pw(); 

function createConnection($userDb, $passwordDb){
    return new PDO("mysql:host=localhost;dbname=grueneve_alles", $userDb, $passwordDb); 
}
    $con = createConnection($userDb, $passwordDb);
    $sql =  "SELECT * FROM next_appointement WHERE id = 1"; 
    $prepState = $con->prepare($sql);
    $prepState->execute();
    $arrVals = $prepState->fetch(); 

$arrayLinks = [
    ['facebook','https://de-de.facebook.com/gruenevelenramsdorf', 'Besuche unseren Facebook-Auftritt!'], 
    ['Aktuelles','./php/seiten/aktuelles.php', 'aktuelle Themen und Nachrichten'], 
    ['Kontakt','./php/seiten/mitglieder.php', 'Hier können Sie Kontakt zu unseren Mitgliedern aufnehmen!'], 
    ['LOGIN','./php/seiten/LOGIN.php', 'Login, leider nur für Mitglieder des Ortsvereins!'], 
    ['Termine','./php/seiten/termine.php', 'Termine für die nächste Zeit'], 
    ['Wahlkreiskandidaten','./php/seiten/Wahlkreiskandidaten.php', 'Unsere Kandidaten für die Wahlkreise!'], 
    ['Impressum','./php/seiten/impressum.de', 'zum Impressum'],
    ['Artenvielfalt','./php/seiten/artenvielfalt.php', 'Unser Programm zu Artenvielfalt' ], 
    ['Wirtschaft','./php/seiten/wirtschaft.php', 'Unser Programm für die Wirtschaft'], 
    ['Soziales','./php/seiten/soziales.php', 'Unser Programm für Soziales'], 
    ['Klimaschutz','./php/seiten/klimaschutz.php', 'Unser Programm zum Klimaschutz'], 
    ['Kultur','./php/seiten/kultur.php', 'Unser Programm für die Kultur '], 
    ];
$arrInfos = [
    ['Nächstes Treffen: ', $arrVals['date_next_meeting']],
    [ 'Ort: '.$arrVals['location_next_meeting'].' um ', $arrVals['time_next_meeting']],
    ['Bank: ', 'DE45' ]
]; 
function publishLinks($array){
    for($i = 0; $i<count($array); $i++) {
        echo '<p><a class="linkFooter" href="'.$array[$i][1].'" title="'.$array[$i][2].'">'.$array[$i][0].'</a></p>';
    }
}
function publishInfos($array){
    for($i = 0; $i<count($array); $i++) {
        echo '<p class="infosFooter">'.$array[$i][0]. $array[$i][1].'</p>';
    }
}
?>
<footer class="flex" id='footer'>
    <article class="footerLeft"><?php publishLinks($arrayLinks)?></article>
    <article class="footerRight"><?php publishInfos($arrInfos)?></article>
</footer>



    
        </body>
        
</html>