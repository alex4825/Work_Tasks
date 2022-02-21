<?php

$str_fio = $_POST["fio"];
$str_number = $_POST["phone_number"];
$str_email = $_POST["email"];
$correct = true;

//проверка на корректность ФИО
//с помощью регулярного выражения разрешаем только буквы русские и английские и пробел
$correct_fio = true;

if(preg_match("/[^А-Яа-яA-Za-z ]/u", $str_fio)){
    $correct_fio = false;  
}
if($correct_fio == false){
    echo "ФИО указаны некорректно<br>";
    $correct = false;
} 


//проверка на корректность номера и ФИО (вручную)
$str_nums = "1234567890";
$correct_number = false;

for($i = 0; $i < strlen($str_number); $i++){   
    if($str_number[0] == '+' && $i == 0){
        $i++;
    }
    for($j = 0; $j < strlen($str_nums); $j++){
        if ($str_number[$i] == $str_nums[$j]){
            $correct_number = true; break;
        }
        else{
            $correct_number = false; continue;
        }
    }     
    if($correct_number == false)  
        break;
}
if($correct_number == false){
    echo "Номер указан некорректно<br>";
    $correct = false;
} 

//проверка на корректность email
if(strpos($str_email, "@gmail.com") !== false){
    echo "Регистрация пользователей с таким почтовым адресом (@gmail.com) невозможна<br>";
    $correct = false;
}

//всё верно
if($correct)
    echo "Форма заполнена верно<br>";
?>