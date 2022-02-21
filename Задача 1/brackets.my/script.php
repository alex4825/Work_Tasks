
<?php
    #Здесь обрабатываем полученные на сервере из тега form данные, то есть, строку str
    $str = $_POST["str"];
    $uncorrect = 0; $find = 0;
    //echo $uncorrect, "DRG ", $find;
    for ($i = 0; $i < strlen($str); $i++){
        if ($str[$i] == '(') {
            $find++;
            $uncorrect--;
        }
        if ($find <= 0 && ($str[$i] == '(' || $str[$i] == ')')) {
            $uncorrect++;
        }
        if ($str[$i] == ')') {
            $find--;
            $uncorrect++;
        }
    }
    echo (!$uncorrect) ? "It's correct \n": "It's mistake \n";    
?>