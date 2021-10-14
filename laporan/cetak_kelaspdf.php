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
  $get_nis      = $_GET['nis'];
  $identitas = mysqli_fetch_array(mysqli_query($conn,"select nama from murid where nis='$get_nis'"));
  $walikelas = mysqli_fetch_array(mysqli_query($conn,"select a.nip, b.nama_gr from wali_kls a inner join guru b on a.nip=b.nip where a.id_kls='$get_kelas' AND a.id_thn='$get_tahun'"));
    $sql = mysqli_query($conn,"SELECT a.nip, b.nama_gr, c.nis FROM wali_kls a
            INNER JOIN guru b ON a.nip=b.nip
            INNER JOIN kelas e ON a.id_kls=e.id_kls
            INNER JOIN det_kls c ON a.id_kls=c.id_kls
            INNER JOIN thnajar g ON a.id_thn=g.id_thn
            WHERE a.id_kls='$get_kelas' AND a.id_thn='$get_tahun'");                     
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>raport siswa</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/laporan.css" />
    </head>
    <body>
    <div id="">
    <img align="left"style="width: 10%;" src="../assets/img/logo1.png">
    <h2 align="center">SD KANISIUS 1 MURUKAN</h2>
            <span style='font-size: 10pt;'align="center"><br>Dusun: Murukan, RT/RW: 1/4. Desa/Kelurahan: Kalitengah. Kode Pos: 57461. Kecamatan/Kota: Wedi/Klaten<br>Email : sdkmurukan@gmail.com<br>Telp : 0895400196516</span>
            </div>
            <span align="center" style='font-size: 12pt;'><br> DAFTAR DATA KELAS</span>
            <hr><br>
          <div id="isi">
            <table>
            <tr>
                  <td>NIP</td><td>: <?php echo $walikelas['nip'];?></td><td>&nbsp;</td><td></td><td>
                  </td></tr>
             <tr>
                  <td>Wali Kelas</td><td>: <?php echo $walikelas['nama_gr'];?></td><td>&nbsp;</td><td></td><td>
                  </td></tr>
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
                <hr>
                <br>
                <br>
            <table align="center" width="90px" border="0.3" cellpadding="0" cellspacing="0">
                <thead  style="background:#e8ecee">
                <tr>
                    <th align="center">No</th>
                    <th align="center">NISN</th>
                    
                </tr>
                </thead>
                <tbody>
               <?php
               $num = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
              if($num > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while ($sis=mysqli_fetch_array($sql))
                {
                $no++;
           echo "<tr>
                  <td width='50'>$no</td>
                  <td width='600'>$sis[nis]</td>       
              </tr>"; 
              } 
              }else{ // Jika data tidak ada
             echo "<tr><td colspan='4'>Data tidak ada</td></tr>"; 
            }
            ?> 
            </tbody>
            </table>
            <nobreak><br>
        <table cellspacing="0" style="width: 100%; text-align: left;">
            <tr>
                <td style="width:65%;"></td>
              <td style="width:35%; ">
                    <p>Klaten, <?php echo date('d-M-Y', time()); ?> <br>
                        Kepala Sekolah </p>
                   <img src="../assets/img/ttd.png"><br>
                        St. Karyanto, S.pd<br />
                        <hr/>
                      NIP. 192 12576 1 137              </td>
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
        $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(15, 15, 15, 15));
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($filename);
    }
    catch(HTML2PDF_exception $e) { echo $e; }
?>
