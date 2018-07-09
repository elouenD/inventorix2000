<?php

// variables 
$a = 'a';
$b = "bonjour";
$f = 21.5 ; 
$e = -5 ; 
$b = true ; 

//structures conditonnelles 

$i = 2; 
/*
switch ($i) {
    case 1:
        echo "i = 1 ";
        break;
    case 2:
        echo "i = 2 ";
        break;
    case 3:
        echo "i = 3 ";
        break;
    default:
        echo "je ne sais pas !!";
    break;
}



$i = 3; 
$val=($i ===2)?'vrai' : 'faux';


echo $val;






for ($i = 0 ; $i < 10; $i++){ 
    echo ($i) . "<br>";
}


$i=0;

do{
    echo ($i++)."<br>";

}while ($i < 10);


*/



// $t = array(1,true,3,"fdsfsf",56,1.5,7);

// for($i=0; $i < sizeof($t);$i++)
// {
//     echo ($t[$i])."<br>";
// }


$t[] = array("Georges", 29 ) ;
$t[] = array("Thomas", 5 ) ;
$t[] = array("Bernard", 11 ) ;
$t[] = array("Léa", 5 ) ;
$t[] = array("Nadine", 18 ) ;

foreach ($t as $id => $row){
    echo "<br> id=".$id;
    foreach($row as $val){
        echo " - ".$val;
    }
}
echo "<br><br>";
print_r($t);



















