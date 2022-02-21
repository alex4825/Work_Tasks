<?php
define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');
define('DATABASE_NAME', 'publishing');
$mysql = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
$mysql->set_charset('utf8');
echo 'Hello <br>';

if($mysql->connect_errno){
    exit('Ошибка подключения');
}

//Создание таблиц
$mysql->query("CREATE TABLE `book`(
    ISBN INT(25) NOT NULL,
    Название VARCHAR(100) NOT NULL,
    Автор VARCHAR(50) NOT NULL,
    Автор2 VARCHAR(50) NOT NULL,
    Жанр VARCHAR(50) NOT NULL,
    Жанр2 VARCHAR(50) NOT NULL,
    Колич_стр INT(5) NOT NULL,
    PRIMARY KEY(ISBN)
)");
$mysql->query("CREATE TABLE `author`(
    id INT(25) NOT NULL AUTO_INCREMENT,
    Имя VARCHAR(50) NOT NULL,
    Фамилия VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
)");

//SQL-скрипт с тестовым набором данных (создание записей в таблицах)
/*$mysql->query("INSERT INTO `author` (`Имя`,`Фамилия`) VALUES('Тони','Старк')");
$mysql->query("INSERT INTO `author` (`Имя`,`Фамилия`) VALUES('Александр','Пушкин')");
$mysql->query("INSERT INTO `author` (`Имя`,`Фамилия`) VALUES('Билл','Гейтс')");
$mysql->query("INSERT INTO `author` (`Имя`,`Фамилия`) VALUES('Маркус','Зусак')");
*/
/*
$mysql->query("INSERT INTO `book` (`ISBN`,`Название`,`Автор`,`Автор2`,`Жанр`,`Жанр2`,`Колич_стр`) VALUES('78974','Книжный вор','Маркус Зусак', 'null', 'Драма', 'null', '550')");
$mysql->query("INSERT INTO `book` (`ISBN`,`Название`,`Автор`,`Автор2`,`Жанр`,`Жанр2`,`Колич_стр`) VALUES('68784','Как стать учёным?','Тони Старк', 'Билл Гейтс', 'Фантастика', 'Драма', '9999')");
$mysql->query("INSERT INTO `book` (`ISBN`,`Название`,`Автор`,`Автор2`,`Жанр`,`Жанр2`,`Колич_стр`) VALUES('24563','Капитанская дочка','Александр Пушкин', 'null', 'Роман', 'null', '168')");
$mysql->query("INSERT INTO `book` (`ISBN`,`Название`,`Автор`,`Автор2`,`Жанр`,`Жанр2`,`Колич_стр`) VALUES('65689','Построение роботов','Тони Старк', 'null', 'Фантастика', 'Техно', '1500')");
*/

//SQL-скрипт с тестовым набором данных (обновление записей в таблицах)
$mysql->query("UPDATE `author` SET `Имя` = 'Тони', `Фамилия` = 'Старк' WHERE `id` = 1");
$mysql->query("UPDATE `author` SET `Имя` = 'Александр', `Фамилия` = 'Пушкин' WHERE `id` = 2");
$mysql->query("UPDATE `author` SET `Имя` = 'Билл', `Фамилия` = 'Гейтс' WHERE `id` = 3");
$mysql->query("UPDATE `author` SET `Имя` = 'Маркус', `Фамилия` = 'Зусак' WHERE `id` = 4");

$mysql->query("UPDATE `book` SET `Название` = 'Книжный вор', `Автор` = 'Маркус Зусак', `Автор2` = 'null', `Жанр` = 'Драма', `Жанр2` = 'null', `Колич_стр` = '550' WHERE `ISBN` = 78974");
$mysql->query("UPDATE `book` SET `Название` = 'Как стать учёным?', `Автор` = 'Тони Старк', `Автор2` = 'Билл Гейтс', `Жанр` = 'Фантастика', `Жанр2` = 'Драма', `Колич_стр` = '9999' WHERE `ISBN` = 68784");
$mysql->query("UPDATE `book` SET `Название` = 'Построение роботов', `Автор` = 'Тони Старк', `Автор2` = 'null', `Жанр` = 'Фантастика', `Жанр2` = 'Техно', `Колич_стр` = '1500' WHERE `ISBN` = 65689");
$mysql->query("UPDATE `book` SET `Название` = 'Капитанская дочка', `Автор` = 'Александр Пушкин', `Автор2` = 'null', `Жанр` = 'Роман', `Жанр2` = 'null', `Колич_стр` = '168' WHERE `ISBN` = 24563");

//SQL-скрипт который выводит название книги и ее авторов для жанра “Фантастика”
$book_fantastic = $mysql->query("SELECT * FROM `book` WHERE `Жанр` = 'Фантастика' OR `Жанр2` = 'Фантастика'");

if($book_fantastic->num_rows > 0){
    $val = $book_fantastic->fetch_assoc();
    if($val['Автор2'] != "null")
        echo "Для жанра фантастика книга: <br>Название: ".$val['Название']."<br>Авторы: " .$val['Автор']." " .$val['Автор2'].'<br>';
    else
        echo "Для жанра фантастика книга: <br>Название: ".$val['Название']."<br>Автор: " .$val['Автор'].'<br>';

}

//SQL-скрипт который выводит автора, который написал больше всего книг
$author = array_fill(0, 4, "");
for($i=0;$i<count($author);$i++){
    //объединение имени и фамилии
    $select_author = $mysql->query("SELECT * FROM `author` WHERE `id` = $i");
    $val = $select_author->fetch_assoc();
    $author[$i] = $val['Имя'];
    $author[$i] .= ' ';
    $author[$i] .= $val['Фамилия'];
    //echo $author[$i] . "<br>";
    
    $mysql->query("SELECT * FROM `book` ORDER BY `Автор`");

}
$mysql->close();
//$mysql->query("DROP TABLE `author`");
//$mysql->query("DROP TABLE `book`");
//$mysql->query("DELETE FROM `author`  WHERE `id` = 3");

/* 
К сожалению не додумался, как правильно реализовать в коде SQL-запросов поиск 
автора с наибольшим количеством книг. Скорее всего нужно отсортировать по полю 
"Автор", одинаковые авторы будут указаны тогда подряд и их можно сразу посчитать,
затем сравнить... Простите, пока не знаю, как на языке запросов это реализовать)
Спасибо!
*/
?>
