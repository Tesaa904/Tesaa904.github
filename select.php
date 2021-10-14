<?php

//select.php

//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=nilaisd", "root", "");


$query = "SELECT * FROM pribadi ORDER BY id_prib DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }

 echo json_encode($data);
}

?>
