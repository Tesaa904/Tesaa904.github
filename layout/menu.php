 <?php
	if ($_SESSION['level']=='admin'){
?>
<nav class="navbar-default navbar-side" role="navigation">
                <div class="w3-display-container w3-container">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo.png" class="user-image img-circle"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="guru.php">Guru</a>
                            </li>
                            <li>
                                <a href="murid1.php">Siswa</a>
                            </li>
                            <li>
                                <a href="walikelas.php">Walikelas</a>
                            </li>
                            <li>
                                <a href="kelas.php">Kelas</a>
                            </li>
                            <li>
                                <a href="mapel.php">Mata Pelajaran</a>
                            </li>
                             <li>
                                <a href="ekskul.php">ekstrakulikuler</a>
                            </li>
                             <li>
                                <a href="thn.php">Tahun Ajaran</a>
                            </li>
                            <li>
                                <a href="KD.php">KD-smster</a>
                            </li>
                             <li>
                                <a href="datauser.php">Buat User</a>
                            </li>
                          </ul>
                      <li>
                        <a href="#"><i class="fa fa-edit"></i> Data Penilaian <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                                <a href="prib.php">Kepribadian</a>
                            </li>
                            <li>
                                <a href="kembang.php">Perkembangan</a>
                            </li>
                            <li>
                                <a href="nilai.php">Nilai siswa</a>
                            </li>
                             <li>
                                <a href="nilai_sos_spirit.php">Nilai Sikap Sosial & Spiritual</a>
                            </li>
                            
                        </ul>	 
                  <li  >
                        <a  href="laporan.php"><i class="fa fa-book"></i>laporan <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                          <a href="laporsiswa.php">Laporan Data Siswa</a>
                        </li>
                         <li>
                           <a href="laporkelas.php">Laporan Data Kelas</a>
                         </li>
                        <li>
                          <a href="raportsiswa.php">Laporan Nilai Raport</a>
                        </li>
                   </li>	
                </ul>
               
            </div> 
            
        </nav>  
<?php
	} elseif ($_SESSION['level']=='walikelas'){
?>
<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">
			<li class="text-center">
				<img src="assets/img/logo.png" class="user-image img-circle"/>
			</li>
			<li>
				<a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-edit"></i> Data Penilaian <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="prib.php">Kepribadian</a>
					</li>
					<li>
						<a href="kembang.php">Perkembangan</a>
					</li>
					<li>
						<a href="nilai.php">Nilai siswa</a>
					</li>
           <li>
             <a href="nilai_sos_spirit.php">Nilai Sikap Sosial & Spiritual</a>
          </li>
				</ul>  
			</li>
			<li>
				 <a  href="laporan.php"><i class="fa fa-book"></i>laporan <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                  <li>
                    <a href="laporsiswa.php">Laporan Data Siswa</a>
                  </li>
                   <li>
                     <a href="laporkelas.php">Laporan Data Kelas</a>
                   </li>
                  <li>
                    <a href="rekap_sosial.php">Rekap Nilai Sosial</a>
                  </li>
                  <li>
                    <a href="rekap_spiritual.php">Rekap Nilai Spiritual</a>
                  </li>
                  <li>
                    <a href="raportsiswa.php">Laporan Nilai Raport</a>
                 </li>
				</ul>
			</li> 
		</ul>
	</div> 
</nav>
<?php
	}
?>