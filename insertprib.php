  <?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "nilaisd");
if(isset($_POST["nis"]))
{
  $nis = $_POST["nis"];
 $id_thn = $_POST["id_thn"];
 $smstr = $_POST["smstr"];
 $sakit = $_POST["sakit"];
 $ijin = $_POST["ijin"];
  $alpha = $_POST["alpha"];
 $query = '';
 for($count = 0; $count<count($nis); $count++)
 {
  $nis_clean = mysqli_real_escape_string($connect, $nis[$count]);
  $id_thn_clean = mysqli_real_escape_string($connect, $id_thn[$count]);
  $smstr_clean = mysqli_real_escape_string($connect, $smstr[$count]);
  $sakit_clean = mysqli_real_escape_string($connect, $sakit[$count]);
  $ijin_clean = mysqli_real_escape_string($connect, $ijin[$count]);
  $alpha_clean = mysqli_real_escape_string($connect, $alpha[$count]);
  if($nis_clean != '' && $id_thn_clean != '' && $smstr_clean != '' && $sakit_clean != '' && $ijin_clean != '' && $alpha_clean != '')
  {
   $query .= '
   INSERT INTO pribadi(nis, id_thn, smstr, sakit, ijin, alpha) 
   VALUES("'.$nis_clean.'", "'.$id_thn_clean.'", "'.$smstr_clean.'", "'.$sakit_clean.'", "'.$ijin_clean.'", "'.$alpha_clean.'");
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'data berhasil disimpan';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'data tidak masuk';
 }
}
?>










































