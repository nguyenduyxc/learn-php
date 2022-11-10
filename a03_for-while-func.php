<?php
// == for == 

// $arr = [1, 3, 6, 8, 9];
// for($i = 0; $i < count($arr); $i++)
// {
//     echo $arr[$i];
//     echo " ";
// }


// while ==
// $arr = [1, 3, 6, 8, 9];
// $i = 0;
// while ($i < count($arr)){
//     echo $arr[$i];
//     echo " ";
//     $i++;
// }

// == do ... while ==
// $arr = [1, 3, 6, 8, 9];
// $i = 0;
// do{
//     echo $arr[$i];
//     echo " ";
//     $i++;
// }while($i <= 2);

// == foreach ==
// $arr = [1, 3, 6, 8, 9];
// foreach($arr as $key => $value){
//     echo $key."-".$value;
//     echo "; ";
// }

// $arr = [
//     "fullname" => "Nguyen Duc Duy",
//     "Gender" => "Nam",
//     "Age" => 22
// ];

// foreach ($arr as $key => $value){
//     echo $key."-".$value;
//     echo "; ";
// }


// == function ==
function showMenu($param1, $param2, $param3){
    // echo $param1. "; ";
    // echo $param2. "; ";
    // echo $param3. "; ";
    return $param1."-".$param2."-".$param3;
}
// showMenu(1, "Duy", "Nam Dinh");
$result = showMenu(1, "Duy", "Nam Dinh");
echo $result;
