 <?php

//multiple_update.php

//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=nilaisd", "root", "");

if(isset($_POST['id_prib']))
{
 $id_prib = $_POST['id_det_kls'];
 $nis = $_POST['nis'];
 $id_thn = $_POST['id_thn'];
 $id_smstr = $_POST['id_smstr'];
 $sakit = $_POST['sakit'];
 $ijin = $_POST['ijin'];
  $alpha = $_POST['alpha'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':name'   => $name[$count],
   ':address'  => $address[$count],
   ':gender'  => $gender[$count],
   ':designation' => $designation[$count],
   ':age'   => $age[$count],
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE tbl_employee 
  SET name = :name, address = :address, gender = :gender, designation = :designation, age = :age 
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>
































