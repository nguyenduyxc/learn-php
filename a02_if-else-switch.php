<?php
// == if else ==
// $i = 101;
// if($i %2 == 0){
//     echo "$i is even";
// }else{
//     echo "$i is odd";
// }

// $i = 111;
// if($i %2 == 0){
//     echo "$i chia het cho 2";
// }else if($i %3 ==0){
//     echo "$i chia het cho 3";
// }else{
//     echo "$i ko chia het cho 2 va 3";
// }


// == switch  case ==
 $value = 4;
 switch ($value){
    case 1:
        echo "hello 1";
        break;
    case 2:
        echo "hello 2";
        break;
    case 3: // muon 3 hoac 4 cung ra mot ket qua 
    case 4:
        echo "hello 3 | 4";
        break;
    default:
        echo "ko co gia tri nao";
        break;
 }
