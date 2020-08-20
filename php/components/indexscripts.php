<?php 

$arraySources = [
    './javascript/indexmenu.js'
]; 
 foreach($arraySources as $source) {
     echo "<script src='$source'></script>"; 
 }

    ?>