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
        
    <main id="main" class="flex">
    <?php
        $arrCandidates = [
            ['Wahlkreis 1: ', 'Martin Dirking', 'Listenplatz 2'," ../../images/FotosMG/martin.jpg"], 
            ['Wahlkreis 2: ', 'Pascal Gerighausen', 'Listenplatz 7'," ../../images/FotosMG/pascal.jpg"], 
            ['Wahlkreis 3: ', 'Heinz Willi Rieken', 'Listenplatz 13'," ../../images/FotosMG/zille.jpg"], 
            ['Wahlkreis 4: ', 'Gerda Göken', 'Listenplatz 10'," ../../images/FotosMG/gerda.jpg"], 
            ['Wahlkreis 5: ', 'Andrea Kormann', 'Listenplatz 6'," ../../images/FotosMG/andrear.jpg"], 
            ['Wahlkreis 6: ', 'Mike Fastring', 'Listenplatz 8'," ../../images/FotosMG/mike.jpg"], 
            ['Wahlkreis 7: ', 'Andrea Venhoff', 'Listenplatz 11'," ../../images/FotosMG/andreav.jpg"], 
            ['Wahlkreis 8: ', 'Lisa Fastring', 'Listenplatz 3'," ../../images/FotosMG/lisa.jpg"], 
            ['Wahlkreis 9: ', 'Albert Göken', 'Listenplatz 5'," ../../images/FotosMG/albert.jpg"], 
            ['Wahlkreis 10: ', 'Richard Löttert', 'Listenplatz 9'," ../../images/FotosMG/richard.jpg"], 
            ['Wahlkreis 12: ', 'Ursula Gerighausen', 'Listenplatz 1'," ../../images/FotosMG/uschi.jpg"], 
            ['Wahlkreis 13: ', 'Heiner Bißlich', 'Listenplatz 4'," ../../images/FotosMG/heiner.jpg"], 
            ['Wahlkreis 11: ', 'Caecilia Göken', 'Listenplatz 12'," ../../images/FotosMG/.jpg"], 
        ]; 
        for ($i = 0; $i<count($arrCandidates); $i++) {
            ?>  
                <section class="wrapper_candidate flex"> 
                    <p class="head_wahlkreis_candidates"><span class="span_wahlkreis"><?php echo $arrCandidates[$i][0] ?></span><?php echo $arrCandidates[$i][1] ?></p>
                    <figure class="image_candidate flex" >
                        <img src="<?php echo $arrCandidates[$i][3]?>" alt="Bild des Kandidaten <?php echo $arrCandidates[$i][1]?>">
                        <figcaption><?php echo $arrCandidates[$i][2]?></figcaption>
                    </figure>
                </section>
            <?php
        }
    
    
    ?>





    
    </main>
    <?php 
    require_once "../components/footer.php";
    ?> 
    
        </body>
        
</html>