<?
/*include('koneksi.php');

/*$output = '';
 if(isset($_POST["id_kls"]))
 {
 	if($_POST["id_kls"] != '')
 	{
 		$sql = "SELECT * FROM det_kls WHERE id_kls = '".$_POST["id_kls"]."'";
 	}
 	else
 	{ 
 		$sql = "SELECT det_kls.*, kelas.kls, det_kls.id_kls,murid.nama, thnajar.thn FROM det_kls left JOIN kelas ON det_kls.id_kls = kelas.id_kls LEFT JOIN murid ON det_kls.nis = murid.nis LEFT JOIN thnajar ON det_kls.id_thn = thnajar.id_thn";
 	}
 	$result = mysqli_query($conn, $sql);

 	while ($row = mysqli_fetch_array($result)) {
 		$output .= '<div class="contenteditable">'.$row["nama"].'</div></div>';
 	}
 	echo "$output";
 } */


include "koneksi.php"; // Load file koneksi.php
//$id_kls = $_POST['id_kls']; // Ambil data NIS yang dikirim lewat AJAX
if($_REQUEST['empid']) {
$query = mysqli_query($connect, "SELECT pribadi.*,murid.nis, murid.nama, smstr.smstr ,thnajar.thn FROM pribadi
                                      LEFT JOIN det_kls ON pribadi.nis = det_kls.nis AND pribadi.id_det_kls =det_kls.id_det_kls
                                     LEFT JOIN kelas ON kelas.id_kls = det_kls.id_kls
                                     LEFT JOIN murid ON det_kls.nis = murid.nis
                                     LEFT JOIN smstr ON pribadi.id_smstr= smstr.id_smstr
                                     LEFT JOIN thnajar ON pribadi.id_thn= thnajar.id_thn WHERE id_kls='".$_REQUEST['empid']."'";// Tampilkan data siswa dengan NIS tersebut

$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
  $data = array();
  while($rows = mysqli_fetch_assoc($resultset)){
    $data = $rows;
  }
  echo json_encode($data);
} else {
  echo 0;
}
//$row = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query
//if($row > 0){ // Jika data lebih dari 0
 // $data = mysqli_fetch_array($query); // ambil data siswa tersebut
  
  // BUat sebuah array
 /* $callback = array(
    'status' => 'success', // Set array status dengan success
    'nis' => $data['nis'], // Set array nama dengan isi kolom nama pada tabel siswa
    'nama' => $data['nama'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
    'thn' => $data['thn'], // Set array jenis_kelamin dengan isi kolom telp pada tabel siswa
    'smstr' => $data['smstr'], // Set array jenis_kelamin dengan isi kolom alamat pada tabel siswa
    'sakit' => $data['sakit'],
    'ijin' => $data['ijin'],
    'alpha' => $data['alpha'],
  );
}else{
  $callback = array('status' => 'failed'); // set array status dengan failed
}
echo json_encode($callback); // konversi varibael $callback menjadi JSON */
?>