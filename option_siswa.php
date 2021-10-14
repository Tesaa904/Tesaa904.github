 <script language ='javascript'>
function showsis()
{
<?php
 include'koneksi.php'; 
 {
// membaca semua propinsi
$query = "SELECT * FROM kelas ORDER BY id_kls ASC";
$hasil = mysqli_query($query);
// membuat if untuk masing-masing pilihan propinsi beserta isi option untuk combobox kedua
while ($data = mysqli_fetch_array($hasil))
{
$kel = $data['id_kls'];
// membuat IF untuk masing-masing propinsi
echo "if (document.form1.kelas.value == \"".$kel."\")";
echo "{";
// membuat option kota untuk masing-masing propinsi
$query2 = "SELECT nis FROM det_kls WHERE id_kls = '$kel' ORDER BY id_det_kls ASC";
$hasil2 = mysqli_query($query2);
$content = "document.getElementById('siswa').innerHTML =\" ";
while ($data2 = mysqli_fetch_array($hasil2))
{
$content .= "<option value='".$data2['id_det_kls']."'>".$data2['nis']."</option>";
}
$content .= "\"";
echo $content;
echo "}\n";
}
}
?>
}

</script>

