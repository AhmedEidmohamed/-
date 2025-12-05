<?php

   echo "<h1> welcome to php </h1>";

//    int,string,boolean,float,array,object,null ,

$name="ali";

var_dump($name);

echo "<br>";


gettype($name);

echo  gettype($name);

const DB_HOST ="localhost";

echo "<br>";

var_dump(DB_HOST);

echo "<br>";
echo "<br>";

//operator 

$x=5;
$y=6;

$z=$x+$y;
// && ,||, =!,==! ,==, ===

echo " sum = ". $z;

echo "<br>";
echo "<br>";


$isEqual = (5 == '5');      // true  , value
$isIdentical = (5 === "5");

var_dump($isIdentical);

// &&  || !  and or not
$age =21;

if($age ==20)
{
    echo "age =".$age;
}else if($age ==21)
{
        echo "age =".$age;

}


else{
    echo " invalid value";
}

echo "<br>";
echo "<br>";

// if($age==20 || $age>20)
// {
//     echo "age= " .$age;
// }else if($age==21){
//         echo "age= " .$age;

// }
// else
// {
//     echo "Enter valide age please";
// }



echo "<br>";
echo "<br>";


echo "<br>";
echo "<br>";

switch($age)
{
    case 20:
        echo "age = ".$age;
        break;
    case 21:
        echo "age = " .$age;
        break;
    default:
        echo "invlaid";       
}

// switch($age)
// {
//     case 22:
//         echo  $age ;
//         break;

//          case 23:
//         echo  $age ;
//         break;

//          case 24:
//         echo $age  ;
//         break;

//         default :
//         echo "Enter correct age ";
// }




?>