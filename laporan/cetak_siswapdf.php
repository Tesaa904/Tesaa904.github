<?php
error_reporting(0);
  session_start();
  ob_start();

include "../koneksi.php";
  // panggil fungsi untuk format tanggal
  include "../fungsi/fungsi_tanggal.php";
  include "../fungsi/fungsi_lain.php";

	$hari_ini = date("d-m-Y");

  $no =0;
  $get_tahun = $_GET['tahun'];
  $get_kelas = $_GET['kelas'];

  $sql = mysqli_query($conn,"SELECT d.kls, a.nis, b.nama, b.tmp_lahir, b.tgl_lahir, b.jenis_kl, b.agama, b.alamat, b.thn_angkt, b.nama_ortu FROM det_kls a
  INNER JOIN murid b ON a.nis=b.nis
  INNER JOIN kelas d ON a.id_kls=d.id_kls
  INNER JOIN thnajar c ON a.id_thn=c.id_thn 
  WHERE a.id_thn='$get_tahun' and a.id_kls='$get_kelas'");

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>RAPORT SISWA</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/laporan.css" />
    </head>
    <body>
    <div id="">
    <img align="left"style="width: 10%;"src="../assets/img/logo1.png">
    <h2 align="center">SD KANISIUS 1 MURUKAN</h2>
            <span style="font-size: 10pt;"align="center"><br>Dusun: Murukan, RT/RW: 1/4. Desa/Kelurahan: Kalitengah. Kode Pos: 57461. Kecamatan/Kota: Wedi/Klaten.Email : sdkmurukan@gmail.com.<br>DAFTAR DIRI SISWA</span>
            </div>
            <hr>
          <div id="isi">
            <table>
                <tr>
                  <td>TAHUN AJARAN</td><td>: <?php echo nama_tahun($get_tahun);?></td><td>&nbsp;</td><td></td><td>
                  </td></tr>
                <tr>
                  <td>KELAS</td><td>:<?php echo nama_kelas($get_kelas);?></td><td>&nbsp;</td><td></td><td></td>
                </tr>
                 <tr>
                  <td>Tanggal</td><td>:<?php echo date('Y-m-d');?></td><td>&nbsp;</td><td></td><td></td>
                </tr>
                </table>
                <hr><br>
                <table align="center" border="1" cellpadding="0" width="90px">
                <tr align="center"><th rowspan="2">No</th><th colspan="8">Data Siswa</th></tr>
                <tr align="center"><th>NISN</th><th>Nama</th><th>Tmp.Lahir</th><th>Tgl.Lahir</th><th>Jenis Kelamin</th><th>Agama</th><th>Alamat</th><th>Nama Ortu</th></tr>
            <tbody>
               <?php
               $num = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
              if($num > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while ($sis=mysqli_fetch_array($sql))
                {
                $no++;
           echo "<tr>
                  <td>$no</td>
                  <td>$sis[nis]</td>
                  <td>$sis[nama]</td>
                  <td>$sis[tmp_lahir]</td> 
                  <td>$sis[tgl_lahir]</td> 
                  <td>$sis[jenis_kl]</td>
                  <td>$sis[agama]</td>
                  <td>$sis[alamat]</td> 
                  <td>$sis[nama_ortu]</td>          
              </tr>"; 
              } 
              }else{ // Jika data tidak ada
             echo "<tr><td colspan='4'>Data tidak ada</td></tr>"; 
            }
            ?> 
            </tbody>
            </table>
            <br>
             <nobreak><br>
        <table cellspacing="0" style="width: 100%; text-align: left;">
            <tr>
                <td style="width:65%;"></td>
              <td style="width:35%; ">
                    <p>Klaten, <?php echo date('d-M-Y', time()); ?> <br>
                        Kepala Sekolah </p>
                   <img src="../assets/img/ttd.png"><br>
                        St. Karyanto, S.pd<br/>
                 <hr/>
                      NIP. 192 125761 137</td>
            </tr>
        </table>
    </nobreak>
    </div>
 </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
  $filename="Raport.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
  //==========================================================================================================
  $content = ob_get_clean();
  $content = '<page style="font-family: freeserif">'.($content).'</page>';
  // panggil library html2pdf
  require_once('../assets/html2pdf/html2pdf.class.php');
  try
  {
    $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(15, 15, 15, 15));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
  }
  catch(HTML2PDF_exception $e) { echo $e; }
?>
