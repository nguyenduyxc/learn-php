<?php

// == bien ==
// $x = 5;
// $y = 5.6;
// $str = " day la chuoi";

// echo $x."</br/>".$y."</br/>".$str;


// // == hang so ==
// // ko co dau $
// // dung cho ket noi db, ...
// // c1
// CONST URL_BASE = "http://google.com";
// echo URL_BASE;

// // c2
// define("WELCOME", "Hello World");
// echo "<br/>";
// echo WELCOME;

// == array ==
// $arr = array(1, 5, 3, 8);
// echo "su dung sizeof: ".sizeof($arr);
// echo "<br/>";
// echo "su dung count: ".count($arr);
// echo "<br/>";
// echo "phan tu thu 3: ".$arr[3];
// echo "<br/>";

// $arr2 = array(
//     "fullname" => "Nguyen Duc Duy",
//     "sex" => "nam",
//     "age" => 22
// );
// echo $arr2["fullname"];
// echo "<br/>";

// $arr3 = array(
//     $arr2, 
//     array(
//         "fullname" => "Nguyen Duc Duy2",
//         "sex" => "nam",
//         "age" => 22 
//     )
// );
// echo $arr3[0]["fullname"];
// echo "<br/>";

// // khai bao kieu rut gon
// $arr4 = [
//     "fullname" => "Nguyen Duc Duy",
//     "sex" => "nam",
//     "age" => 22
// ];
// echo "arr4: "."".$arr4["fullname"];
// echo "<br/>";

// $arr5 = [
//     [
//         "fullname" => "Nguyen Duc Duy",
//         "sex" => "nam",
//         "age" => 22
//     ],
//     [
//         "fullname" => "Nguyen Duc Duy2",
//         "sex" => "nam2",
//         "age" => 22
//     ],
// ];
// var_dump($arr5);
// echo "arr5: ".$arr5[1]["fullname"];


// // == toan tu == 
// // ++, --, += , -=, *=, /=, %, +, -, * , /
// $i = 0;
// $i++; //1
// $i +=6; // 7
// $i -=2; // 5
// $i %=3; // 2
// echo $i;


// == bien moi truong ==
// print_r($_SERVER);
// var_dump($_REQUEST);
// var_dump($_GET);
// var_dump($_POST);
// var_dump($_COOKIE);
// var_dump($_SESSION);
// var_dump($_ENV);