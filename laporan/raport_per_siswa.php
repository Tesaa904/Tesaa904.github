<?php
	error_reporting(0);
	session_start();
	ob_start();
 
	// Panggil koneksi database.php untuk koneksi database
	include "../koneksi.php";
	// panggil fungsi untuk format tanggal
	include "../fungsi/fungsi_tanggal.php";
	include "../fungsi/fungsi_lain.php";


	$hari_ini	= date("d-m-Y");

	$no    = 0;
	$get_nis = $_GET['nis'];
	$get_tahun = $_GET['tahun'];
	$get_sem = $_GET['sem'];
	$get_kelas = $_GET['kelas'];

	$identitas = mysqli_fetch_array(mysqli_query($conn,"select * from murid where nis='$get_nis'"));
	$walikelas = mysqli_fetch_array(mysqli_query($conn,"select * from wali_kls a inner join guru b on a.nip=b.nip where a.id_kls='$get_kelas' AND a.id_thn='$get_tahun'"));
	$nilai_sikap = mysqli_fetch_array(mysqli_query($conn,"SELECT a.*,b.nama,d.thn,e.smstr,f.kls FROM nilai_sos_sp a 
												INNER JOIN murid b ON a.nis=b.nis
												INNER JOIN thnajar d ON a.`id_thn`=d.id_thn INNER JOIN smstr e ON a.id_smstr = e.id_smstr
												INNER JOIN kelas f ON a.`id_kls`=f.id_kls
												WHERE a.id_kls='$get_kelas' AND a.id_thn='$get_tahun' AND a.id_smstr='$get_sem' and a.nis='$get_nis'"));
	$sosial = mysqli_fetch_array(mysqli_query($conn,"select * from sikap where sikap='sosial'"));	
	$spirit = mysqli_fetch_array(mysqli_query($conn,"select * from sikap where sikap='spiritual'"));	
	$kepribadian = mysqli_fetch_array(mysqli_query($conn,"select * from kepribadian where id_kls='$get_kelas' AND id_thn='$get_tahun' AND id_smstr='$get_sem' and nis='$get_nis'"));
	$perkem = mysqli_fetch_array(mysqli_query($conn,"select * from perkem where id_kls='$get_kelas' AND id_thn='$get_tahun' AND id_smstr='$get_sem' and nis='$get_nis'"));		
	$sql_nilai = mysqli_query($conn,"select xx.nis,a.nm_mapel,xx.nilkd,xx.nilki,xx.indikator_kd,xx.indikator_ki,b.kd1,b.kd2,b.kd3,b.kd4,
								b.ki1,b.ki2,b.ki3,b.ki4
								from mapelj a left join
								(select nis,id_mapel,nilkd,nilki,indikator_kd,indikator_ki,id_aturan from nilai where
								id_thn='$get_tahun'and id_smstr='$get_sem' and id_kls='$get_kelas' and nis='$get_nis') xx
								on a.id_mapel=xx.id_mapel
								left join aturan b on xx.id_aturan= b.id_aturan ");						
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
            <h2 align="left">SD KANISIUS 1 MURUKAN</h2>
            <span align="left" style='font-size: 10pt;'>Dukuh: Murukan. Kode Pos: 57461. Desa/Kelurahan: Kalitengah. Kecamatan/Kota: Wedi/ Kab.Klaten</span>
        </div>
        <hr>
        <div id="isi">
			<table>
				<tr>
					<td>NAMA</td><td>:<?php echo $identitas['nama'];?></td><td>&nbsp;&nbsp;&nbsp;</td><td align="right">WALI KELAS</td><td>:<?php echo $walikelas['nama_gr'];?></td>
				</tr>
				<tr>
					<td>NIS</td><td>:<?php echo $identitas['nis'];?></td><td>&nbsp;</td><td>NIP</td><td>:<?php echo $walikelas['nip'];?></td>			
				</tr>
				<tr>
					<td>KELAS</td><td>:<?php echo nama_kelas($get_kelas);?></td><td>&nbsp;</td><td></td><td></td>
				</tr>
				<tr>
					<td>SEMESTER</td><td>:<?php echo nama_sem($get_sem);?></td><td>&nbsp;</td><td></td><td></td>
				</tr>
				<tr>
					<td>TAHUN AJARAN</td><td>:<?php echo nama_tahun($get_tahun);?></td><td>&nbsp;</td><td></td><td></td>	
				</tr>								
			</table>
			<hr>
			<h4>NILAI SIKAP</h4>
            <table border="0.3" cellpadding="0" cellspacing="0" width="50%">
                <thead style="background:#e8ecee">
					<tr>
						<th>No.</th>
						<th>Sikap</th>
						<th width="50px">Deskripsi</th>
					</tr>
                </thead>
                <tbody>
					<?php
						//sosial
						if (($nilai_sikap['nil_sossb']=='1') and ($nilai_sikap['nil_sospb']=='0'))
							$deskripsi_sos = "sangat baik dalam ".$sosial['ket_1sp'].", ".$sosial['ket_2sp'].", ".$sosial['ket_3sp'].", ".$sosial['ket_4sp'].
										 $sosial['ket_5sp']." serta ".$sosial['ket_6sp'];
						else if (($nilai_sikap['nil_sossb']=='1') and ($nilai_sikap['nil_sospb']=='1'))
							$deskripsi_sos = "sangat baik dalam ".$sosial['ket_1sp'].", ".$sosial['ket_2sp'].", ".$sosial['ket_3sp'].", ".$sosial['ket_4sp'].
										 $sosial['ket_5sp']." serta ".$sosial['ket_6sp'].", namun masih perlu bimbingan.";
						else if (($nilai_sikap['nil_sossb']=='0') and ($nilai_sikap['nil_sospb']=='1'))
							$deskripsi_sos = "kurang dalam ".$sosial['ket_1sp'].", ".$sosial['ket_2sp'].", ".$sosial['ket_3sp'].", ".$sosial['ket_4sp'].
										 $sosial['ket_5sp']." serta ".$sosial['ket_6sp'].", sehingga masih perlu bimbingan dalam sikap tersebut.";		
						//spiritual
						if (($nilai_sikap['nil_sprtsb']=='1') and ($nilai_sikap['nil_sprtpb']=='0'))
							$deskripsi_sp = "sangat baik dalam ".$spirit['ket_1sp'].", ".$spirit['ket_2sp'].", ".$spirit['ket_3sp']."serta ".$spirit['ket_4sp'];
						else if (($nilai_sikap['nil_sprtsb']=='1') and ($nilai_sikap['nil_sprtpb']=='1'))
							$deskripsi_sp = "sangat baik dalam ".$spirit['ket_1sp'].", ".$spirit['ket_2sp'].", ".$spirit['ket_3sp']."serta ".$spirit['ket_4sp'].
										", namun masih perlu bimbingan.";
						else if (($nilai_sikap['nil_sprtsb']=='0') and ($nilai_sikap['nil_sprtpb']=='1'))
							$deskripsi_sp = "kurang dalam ".$spirit['ket_1sp'].", ".$spirit['ket_2sp'].", ".$spirit['ket_3sp']." serta ".$spirit['ket_4sp'].
										 ", sehingga masih perlu bimbingan dalam sikap tersebut.";				
						
						echo "<tr>
								<td>1</td>
								<td>Sikap Spiritual</td>
								<td width='600'>$identitas[nama] $deskripsi_sp</td>							
						</tr>";
						echo "<tr>
								<td>2</td>
								<td>Sikap Sosial</td>
								<td width='600'>$identitas[nama] $deskripsi_sos</td>							
						</tr>";						
					?>
                </tbody>
            </table>
            <h4>NILAI PENGETAHUAN DAN KETRAMPILAN</h4>
			<table width="100%" border="0.3" cellpadding="0" cellspacing="0">
				<thead style="background:#e8ecee">
					<tr>
						<th rowspan="2" style="text-align:center;vertical-align:middle">No</th>
						<th rowspan="2" style="text-align:center;vertical-align:middle">Mapel</th>
						<th colspan="3" style="text-align:center;vertical-align:middle">Pengetahuan</th>
						<th colspan="3" style="text-align:center;vertical-align:middle">Ketrampilan</th>
					</tr>
					<tr>
						<th width="100px" style="text-align:center;vertical-align:middle">Nilai</th>
						<th width="100px" style="text-align:center;vertical-align:middle">Predikat</th>
						<th width="100px" style="text-align:center;vertical-align:middle">Deskripsi</th>
						<th width="100px" style="text-align:center;vertical-align:middle">Nilai</th>
						<th width="100px" style="text-align:center;vertical-align:middle">Predikat</th>	
						<th width="100px" style="text-align:center;vertical-align:middle">Deskripsi</th>										
					</tr>
				</thead>
				<tbody>
					<?php
						while ($nilai=mysqli_fetch_array($sql_nilai)){
							$no++;
							//desk kd
							if ($nilai['indikator_kd']=="A")
								$des_kd = "Sangat baik";
							else if ($nilai['indikator_kd']=="B")
								$des_kd = "Baik";
							else if ($nilai['indikator_kd']=="C")
								$des_kd = "Cukup";
							else if ($nilai['indikator_kd']=="D")
								$des_kd = "Kurang";
							//desk ki	
							if ($nilai['indikator_ki']=="A")
								$des_ki = "Sangat baik";
							else if ($nilai['indikator_ki']=="B")
								$des_ki = "Baik";
							else if ($nilai['indikator_ki']=="C")
								$des_ki = "Cukup";
							else if ($nilai['indikator_ki']=="D")
								$des_ki = "Kurang";
							echo "<tr>
									<td>$no</td>
									<td>$nilai[nm_mapel]</td>
									<td>$nilai[nilkd]</td>
									<td>$nilai[indikator_kd]</td>	
									<td width='200' align='justify'>$des_kd dalam $nilai[kd1],<br>$nilai[kd2],<br>$nilai[kd3],<br>dan $nilai[kd4]</td>
									<td>$nilai[nilki]</td>
									<td>$nilai[indikator_ki]</td>
									<td width='200' align='justify'>$des_ki dalam $nilai[ki1],<br>$nilai[ki2],<br>$nilai[ki3],<br>dan $nilai[ki4]</td>					
							</tr>";							
						}
					?>
				</tbody>
			</table> 
			<h4>EKSTRAKULIKULER</h4>
			<table width="50%" border="0.3" cellpadding="0" cellspacing="0">
				<thead style="background:#e8ecee">
				<tr>
					<th>No.</th>
					<th>Kegiatan Ekstrakulikuler</th>
					<th>Keterangan</th>
				</tr>
				</thead>
				<tbody>
					<?php
						echo "<tr>
								<td>1</td>
								<td width='200'>".nama_ekskul($perkem[id_ektra])."</td>
								<td width='200'>$perkem[ket]</td>							
						</tr>";
					?>
				</tbody>
			</table>      
			<h4>TINGGI DAN BERAT BADAN</h4>
			<table width="50%" border="0.3" cellpadding="0" cellspacing="0">
				<thead style="background:#e8ecee">
				<tr>
					<th rowspan="2">No.</th>
					<th colspan="2" align="center">Aspek Yang Dinilai</th>
				</tr>
				<tr>
					<th>Berat (kg)</th>
					<th>Tinggi (cm)</th>
				</tr>				
				</thead>
				<tbody>
					<?php
						echo "<tr>
								<td>1</td>
								<td width='200'>$perkem[berat]</td>
								<td width='200'>$perkem[tinggi]</td>							
						</tr>";
					?>
				</tbody>
			</table>        
			<h4>KONDISI KESEHATAN</h4>
			<table width="50%" border="0.3" cellpadding="0" cellspacing="0">
				<thead style="background:#e8ecee">
				<tr>
					<th>No.</th>
					<th>Aspek Fisik</th>
					<th>Keterangan</th>
				</tr>				
				</thead>
				<tbody>
					<?php
						echo "<tr>
								<td>1</td>
								<td width='200'>Penglihatan</td>
								<td width='200'>$perkem[lihat]</td>							
						</tr>";
						echo "<tr>
								<td>2</td>
								<td width='200'>Pendengaran</td>
								<td width='200'>$perkem[dengar]</td>							
						</tr>";		
						echo "<tr>
								<td>3</td>
								<td width='200'>Gigi</td>
								<td width='200'>$perkem[gigi]</td>							
						</tr>";										
					?>
				</tbody>
			</table>  
			<h4>PRESTASI</h4>
			<table width="50%" border="0.3" cellpadding="0" cellspacing="0">
				<thead style="background:#e8ecee">
				<tr>
					<th>No.</th>
					<th>Prestasi</th>
				</tr>
				</thead>
				<tbody>
					<?php
						echo "<tr>
								<td>1</td>
								<td width='400'>$perkem[prestasi]</td>							
						</tr>";
					?>
				</tbody>
			</table> 
			<h4>KEHADIRAN</h4>
			<table width="50%" border="0.3" cellpadding="0" cellspacing="0">
				<thead style="background:#e8ecee">
				<tr>
					<th>Ket</th>
					<th>Hari</th>
				</tr>
				</thead>
				<tbody>
					<?php
						echo "<tr>
								<td width='100'>Sakit</td>
								<td width='100'>$kepribadian[sakit]</td>							
						</tr>";
						echo "<tr>
								<td width='100'>Ijin</td>
								<td width='100'>$kepribadian[ijin]</td>							
						</tr>";	
						echo "<tr>
								<td width='100'>Alpha</td>
								<td width='100'>$kepribadian[alpha]</td>							
						</tr>";											
					?>
				</tbody>
			</table>
			</div>
			<table>
			<tr> 
			<td width="500">
				Mengetahui, <br>Orangtua/wali, <br><br><br><br><br>

			<br>-------------------------------------</td>
		
 				<td width="500">
                    <p>Klaten, <?php echo date('d-M-Y', time()); ?><br>
                        Wali Kelas </p>
                       <img src="../assets/img/wali4.jpg"><br>
                   <?php echo $walikelas['nama_gr'];?><br/>
                      NIP.<?php echo $walikelas['nip'];?></td>

                      <br>
                      <br>
                      <table>
                    <tr>
                      <td width="600" align="center">
                    <p>Klaten, <?php echo date('d-M-Y', time()); ?><br>
                        Kepala Sekolah </p>
                        	<img src="../assets/img/ttd.png"><br>
                  		 St. Karyanto, S.pd<br/>
                       NIP. 192 12576 1 137 </td></tr>
                       </table>
            </tr>

        </table>
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
