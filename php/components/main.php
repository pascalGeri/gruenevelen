
<?php
    
    function create_article($inhalte) {
        for ($i = 0; $i<count($inhalte); $i++) {
            echo '<article id="mainArt'.$i.'" class="mainArt flex"><h2 class="article">'; 
            echo $inhalte[$i][0];
            echo '</h2>' ; 
            for ($x = 0; $x<count($inhalte[$i][1]); $x++) {   
                echo    "<figure class='figArt'><img src='". $inhalte[$i][1][$x]. "' 
                alt='blob'><figcaption class='figCaptArt'>"; 
                echo $inhalte[$i][2][$x]; 
                echo '</figcaption></figure>';
            }
                echo '<section class="articleText">'; 
                echo $inhalte[$i][3]; 
                echo '</section>
                    </article>';

        }
        

    }
    echo '</main>'; 
?>

