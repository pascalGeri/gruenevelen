
<?php
require_once '../components/valuesDatabase.php';
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
    ['Startseite','./index.php', 'Zur Starstseite'],
    ['Aktuelles','./aktuelles.php', 'aktuelle Themen und Nachrichten'], 
    ['Kontakt','./mitglieder.php', 'Hier können SIe Kontakt zu unseren Mitgliedern aufnehmen!'], 
    ['LOGIN','./LOGIN.php', 'Login, leider nur für Mitglieder des Ortsvereins!'], 
    ['Termine','./termine.php', 'Termine für die nächste Zeit'], 
    ['Grüne KUH','./gruenekuh.php', 'Unsere Werbeaktion!'],
    ['Impressum','./impressum.php', 'Rechtliches und Informationen zur Seite']
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


