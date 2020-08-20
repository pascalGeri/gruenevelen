    <?php function implNavigation ($hinweis) {?> 
    <nav class="flex">
    <h2 id="h2Hello"><?php
    echo '<span class="helloName">'.$_SESSION['name']. '</span>'. $hinweis;  
    ?></h2>
    <ul class="navigationInside flex">
        <a class="butLogout" style="background-color: var(--AF_magenta)"href="LOGOUT.php"><li>LOGOUT</li></a>
        <a href="./beitragAktuelles.php"><li>beitragAktuelles</li></a>
        <a href="./indexIntern.php"><li>Startseite intern</li></a>
        <a href="./publishTermin.php"><li>Termin veröffentlichen</li></a>
        <a href="./publishLink.php"><li>Link veröffentlichen</li></a>
        <a href="./deleteTermin.php"><li>Termin löschen</li></a>
        <a href="./deleteBeitrag.php"><li>Beitrag löschen</li></a>
    </ul>
        
    </nav>    
    <?php
    }
    ?>