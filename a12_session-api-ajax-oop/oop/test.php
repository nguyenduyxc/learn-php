<?php
class Student{
    var $fullname;
    var $age;
    var $address;
    function running(){
        echo "</br>"."running ..." . $this->fullname;
    }
}

$Duy = new Student();
$Duy->fullname = "N D Duy";
$Duy->age = 22;
$Duy->address = "Nam Dinh";
echo $Duy->fullname;

$Duy2 = new Student();
$Duy2->fullname = "Duy2";
$Duy2->age = 22;
$Duy2->address = "ND";
echo "</br>".$Duy2->fullname;
echo "</br>".$Duy2->running();