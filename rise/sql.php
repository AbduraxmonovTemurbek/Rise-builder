<?php

define("DB_SERVER", "localhost"); 
define("DB_USERNAME", "user5712_megakonst"); 
define("DB_PASSWORD", "Megakonst"); 
define("DB_NAME", "user5712_megakonst"); 

$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8mb4");
if($connect){
    echo "Ulandi!";
}else{
	echo "Ulanmadi!";
}

mysqli_query($connect," CREATE table user_id(
`id` int(20) auto_increment primary key,
`user_id` varchar(100),
`reg` varchar(100)
)");

mysqli_query($connect," CREATE table kabinet(
`id` int(20) auto_increment primary key,
`user_id` varchar(100),
`pul` varchar(100),
`sarmoya` varchar(100),
`pul2` varchar(100),
`odam` varchar(100),
`ban` varchar(100)
)");

mysqli_query($connect," CREATE table api(
`id` int(20) auto_increment primary key,
`user_id` varchar(100),
`api` varchar(100)
)");

mysqli_query($connect," CREATE table kunlik(
`id` int(20) auto_increment primary key,
user_id` varchar(100),
`turi` varchar(100),
`useri` varchar(100),
`tokeni` varchar(100),
`vaqti` varchar(100),
`narxi` varchar(100),
`kun` varchar(100),
`avto` varchar(100),
)");

?>