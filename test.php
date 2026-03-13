<?php

$eleves = [] ;
$el = [] ;
$eleves[0][0] = "Jean" ;
$eleves[0][1] = "Tle" ;
$eleves[0][2] = "18 ans" ;

$eleves[1][0] = "Pierre" ;
$eleves[1][1] = "1ere" ;
$eleves[1][2] = "17 ans" ;

$eleves[2][0] = "Jeanne" ;
$eleves[2][1] = "2nde" ;
$eleves[2][2] = "16 ans" ;

//$el= $eleves ;



//echo $el[2][1] ; 

//echo count($eleves) . "<br>"; // affiche le nombre de lignes du tableau
//echo count($eleves[0]) ; // affiche le nombre de colonnes du tableau

$i = 0 ;
$j = 0 ;

for($i = 0 ; $i < count($eleves) ; $i++){
    for($j = 0 ; $j < count($eleves[$i]) ; $j++){
        echo $eleves[$i][$j] . " " ;
    }
    echo "<br>" ;
}






