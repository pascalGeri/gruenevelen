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
        
    <main id="main">
        <article class="mainArt flex" id="mainHello">
            <h2 class="h2Main">FÜR EIN NACHHALTIGES VELEN</h2>
            <section class="mainText">Herzlich Willkommen auf der Internetseite der Grünen in Velen. Es gibt viel zu tun. Unser Ort hat viel Potential und viele Möglichkeiten für nachhaltige Entwicklung. Dieses Potential ist bei Weitem nicht ausgeschöpft und es beadrf viel Kreativität, Motivation und Engagement, um dieses Potential auszuschöpfen. Dafür stehen wir Grüne.<br>
                Auf diesen Seiten können Sie sich darüber informieren, welche Ideen und Vorhaben wir umsetzen wollen und welche Personen dafür stehen. <br> 
                <p id="mfg">Mit Dank für das Interesse</p>
                <p id="gruss">Ihre Grünen in Velen</p>

            </section>    
        </article>

        <article class="mainArt flex" id="mainTeam">
            <h2 class="h2Main">EIN STARKES TEAM</h2>
            <figure class="mainFig">
                <img src="../../images/FotosMG/alle.jpg" alt="Gruppenbild">
                <figcaption class="mainFigCapt">Eine gute Mischung aus Jung und Alt</figcaption>
            </figure>
            <section class="mainText"></section>    
        </article>

        <div class="flex">
        <article class="mainArt flex" id="mainSpeakers">
            <h2 class="h2Main">UNSERE SPRECHERINNEN</h2>
            <figure class="mainFig">
                <img src="../../images/FotosMG/uschi.jpg" alt="Bild von Ursula Gerighausen">
                <figcaption class="mainFigCapt"></figcaption>
            </figure>
            <figure class="mainFig">
                <img src="../../images/FotosMG/lisa.jpg" alt="Bild von Lisa Fastring">
                <figcaption class="mainFigCapt"></figcaption>
            </figure>
            <section class="mainText"></section>    
        </article>
        <!-- <article id="aktuelles">
            <h1 id="h1Aktuelles">Aktuelles</h1>
        </article> -->
        </div>
        <article id="artThemen" class="flex">
            <h2 class="h2Main">Unsere Themen</h2>
            <section id="thema1" class="themen flex">Klima</section>
            <section id="thema2" class="themen flex">Artenvielfalt</section>
            <section id="thema3" class="themen flex">Soziales</section>
            <section id="thema4" class="themen flex">Wirtschaft</section>
            <section id="thema5" class="themen flex">Kultur</section>

        </article>
        
        </main>
        <?php 
        require_once "../components/footer.php";
        ?>
    
        </body>
        
</html>