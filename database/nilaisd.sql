/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 5.5.8 : Database - nilai_sd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nilai_sd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `nilai_sd`;

/*Table structure for table `aturan` */

DROP TABLE IF EXISTS `aturan`;

CREATE TABLE `aturan` (
  `id_aturan` varchar(15) NOT NULL,
  `id_mapel` varchar(15) DEFAULT NULL,
  `id_smstr` varchar(15) DEFAULT NULL,
  `id_thn` varchar(15) DEFAULT NULL,
  `id_kls` varchar(15) DEFAULT NULL,
  `kd1` text,
  `kd2` text,
  `kd3` text,
  `kd4` text,
  `ki1` text,
  `ki2` text,
  `ki3` text,
  `ki4` text,
  PRIMARY KEY (`id_aturan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aturan` */

insert  into `aturan`(`id_aturan`,`id_mapel`,`id_smstr`,`id_thn`,`id_kls`,`kd1`,`kd2`,`kd3`,`kd4`,`ki1`,`ki2`,`ki3`,`ki4`) values 
('kd001','MP002','smt001','8','kl07','mengidentifikasi pelaksanaan kewajiban dan hak sebagai warga masyarakat','menjelaskan manfaat keberagaman suku bangsa,sosial,dan budaya indonesia yang terkait persatuan','mencermati gagasan pokok dan gagasan pendukung yang diperoleh lisan, tulisan, visual','membaca kalibat','menjajikan hasil idenfikasi pelaksanan kewajiban dan hak sebagai warga negara','mengemukanan manfaat keberagaman karakteristik individu dalam kehidupan sehari-hari','menyajikan kekeragaman bentuk keberagaman suku bangsa, sosial, dan budaya','nemaatjfn'),
('kd002','MP001','smt001','8','kl07','Mencermati gagasan pokok dan gagasan pendukung yang diperoleh dari teks lisan, tulis, atau visual','Mencermati keterhubungan antargagasan yang didapat dari teks lisan, tulis, atau visual','Menggali informasi dari seorang tokoh melalui wawancara menggunakan daftar pertanyaan','Membandingkan teks petunjuk penggunaan dua alat yang sama dan berbeda','Menata informasi yang didapat dari teks berdasarkan keterhubungan antargagasan ke dalam kerangka tulisan','Menyajikan hasil pengamatan tentang keterhubungan antargagasan ke dalam tulisan','Melaporkan hasil wawancara menggunakan kosakata baku dan kalimat efektif dalam bentuk teks tulis','Menyajikan petunjuk penggunaan alat dalam bentuk teks tulis dan visual menggunakan kosakata baku dan kalimat efektif'),
('kd003','MP003','smt001','8','kl07','Membandingkan cara perkembangbiakan tumbuhan dan hewan','Menghubungkan ciri pubertas pada laki-laki dan perempuan dengan kesehatan reproduksi','Menganalisis cara makhluk hidup menyesuaikan diri dengan lingkungan','Mengidentifikasi komponen-komponen listrik dan fungsinya dalam rangkaian listrik sederhana','Menyajikan karya tentang perkembangangbiakan tumbuhan','Menyajikan karya tentang cara menyikapi ciri-ciri pubertas yang dialami','Menyajikan karya tentang cara makhluk hidup menyesuaikan diri dengan lingkungannya, sebagai hasil penelusuran berbagai sumber','Melakukan percobaan rangkaian listrik sederhana secara seri dan paralel'),
('kd004','MP004','smt001','8','kl07','Menjelaskan pecahan-pecahan senilai dengan gambar dan model konkret','Menjelaskan berbagai bentuk pecahan (biasa, campuran, desimal, dan persen) dan hubungan di antaranya','Menjelaskan dan melakukan penaksiran dari jumlah, selisih, hasil kali, dan hasil bagi dua bilangan cacah maupun pecahan dan desimal','Menjelaskan faktor dan kelipatan suatu bilangan','Mengidentifikasi pecahan-pecahan senilai dengan gambar dan model konkret','Mengidentifikasi berbagai bentuk pecahan (biasa, campuran, desimal, dan persen) dan hubungan di antaranya','Menyelesaikan masalah penaksiran dari jumlah, selisih, hasil kali, dan hasil bagi dua bilangan cacah maupun pecahan dan desimal','Mengidentifikasi faktor dan kelipatan suatu bilangan'),
('kd005','MP008','smt001','8','kl07','Memahami variasi gerak dasar lokomotor, non-lokomotor, dan manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam permainan bola besar sederhana dan atau tradisional','Memahami variasi gerak dasar lokomotor, non-lokomotor, dan manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam permainan bola kecil sederhana dan atau tradisional','Memahami variasi gerak dasar jalan, lari, lompat, dan lempar melalui permainan/olahraga yang dimodifikasi dan atau olahraga tradisional','Menerapkan gerak dasar lokomotor dan non-lokomotor untuk membentuk gerak dasar seni beladiri','Mempraktikkan variasi gerak dasar lokomotor, non-lokomotor, dan manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam permainan bola besar sederhana dan atau tradisional','Mempraktikkan variasi gerak dasar lokomotor, non-lokomotor, dan manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam permainan bola kecil sederhana dan atau tradisional','Mempraktikkan variasi pola dasar jalan, lari, lompat, dan lempar melalui permainan/olahraga yang dimodifikasi dan atau olahraga tradisional','Mempraktikkan gerak dasar lokomotor dan non lokomotor untuk membentuk gerak dasar seni beladiri'),
('kd006','MP009','smt001','8','kl07','Mengidentifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat dari tingkat kota/kabupaten sampai tingkat provinsi.','Mengidentifikasi keragaman sosial, ekonomi, budaya, etnis, dan agama di provinsi setempat sebagai identitas bangsa Indonesia; serta hubungannya dengan karakteristik ruang.','Mengidentifikasi kegiatan ekonomi dan hubungannya dengan berbagai bidang pekerjaan, serta kehidupan sosial dan budaya di lingkungan sekitar sampai provinsi.','Mengidentifikasi kerajaan Hindu dan/atau Buddha dan/atau Islam di lingkungan daerah setempat,serta pengaruhnya pada kehidupan masyarakat masa kini.','Menyajikan hasil identifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat dari tingkat kota/kabupaten sampai tingkat provinsi.','Menyajikan hasil identifikasi mengenai keragaman sosial, ekonomi, budaya, etnis, dan agama di provinsi setempat sebagai identitas bangsa Indonesia; serta hubungannya dengan karakteristik ruang.','Menyajikan hasil identifikasi kegiatan ekonomi dan hubungannya dengan berbagai bidang pekerjaan, serta kehidupan sosial dan budaya di lingkungan sekitar sampai provinsi.','Menyajikan hasil identifikasi kerajaan Hindu dan/atau Buddha dan/atau Islam di lingkungan daerah setempat, serta pengaruhnya pada kehidupan masyarakat masa kini.'),
('kd007','MP007','smt001','8','kl07','mengetahui gambar dan bentuk tiga dimensi','mengetahui tanda tempo dan tinggi rendah nada','mengetahui gerak tari kreasi daerah','mengetahui karya seni rupa teknik tempel','menggambar dan membentuk tiga dimensi','menyanyikan lagu dengan memperhatikan tempo dan tinggi rendah nada','meragakan gerak tari kreasi daerah','membuat karya kolase, montase, aplikasi, dan mozaik'),
('kd008','MP005','smt001','8',NULL,'Mendengarkan, memahami, dan mengidentifikasi bunyi bahasa daerah yang didengar dengan tepat','Mendengarkan, memahami, dan mengidentifikasi huruf lepas untuk menulis kata dan kalimat sederhana dengan huruf tegak bersambung sesuai kaidah','Mengamati, mengenal, memahami, dan mengidentifikasi teks laporan sederhana tentang alam sekitar, hewan, dan tumbuhan serta jumlahnya secara lisan dan tulis','Mengenal, memahami, dan mengidentifikasi teks cerita narasi sederhana tentang kegiatan bermain di lingkungan rumah atau sekolah','Membaca indah teks  geguritan dengan lafal dan intonasi yang tepat',' Menceritakan karakter tokoh wayang menggunakan ragam  krama','Menceritakan teks non sastra tentang tradisi dengan ragam krama','Membaca dan menulis huruf Jawa yang menggunakan  sandhangan swara ( wulu, suku, pepet,taling, taling tarung)  '),
('kd009','MP006','smt001','8',NULL,'Memahami perkembangan teknologi informasi dan komunikasi','Mengidentifikasi perangkat-perangkat komputer dan fungsinya','Mengenal perangkat lunak (software) untuk menggambar','Menggunakan icon-icon untuk membuat gambar','menyebutkan perangkat informasi yang ada di sekitar sekolah dan fungsinya','menunjukan  elemen-elemen yang termasuk perangkat keras (CPU,Monitor, keyboard, hardisk, mouse, disket, Spiker, dll) 	','Memahami cara membuka  dan mengahiri sytem picture maker','memahami fungsi dari icon-icon');

/*Table structure for table `det_kls` */

DROP TABLE IF EXISTS `det_kls`;

CREATE TABLE `det_kls` (
  `id_det_kls` varchar(15) NOT NULL,
  `id_kls` varchar(15) DEFAULT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `id_thn` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_det_kls`),
  KEY `nis` (`nis`),
  KEY `id_kls` (`id_kls`),
  CONSTRAINT `det_kls_ibfk_2` FOREIGN KEY (`id_kls`) REFERENCES `kelas` (`id_kls`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `det_kls_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `murid` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_kls` */

insert  into `det_kls`(`id_det_kls`,`id_kls`,`nis`,`id_thn`) values 
('dk001','kl07','0066539488','8'),
('dk002','kl07','0054291880','8'),
('dk003','kl07','0056097722','8'),
('dk004','kl07','0066852323','8'),
('dk005','kl07','0062058631','8'),
('dk006','kl07','0057066136','8'),
('dk007','kl07','0064316648','8'),
('dk008','kl07','0058970312','8'),
('dk009','kl07','0074428895','8'),
('dk010','kl07','0069881537','8'),
('dk011','kl08','0072708680','8'),
('dk012','kl08','0083129814','8'),
('dk013','kl08','0119490201','8'),
('dk014','kl08','0062090042','8'),
('dk015','kl08','0063381691','8');

/*Table structure for table `eksktra` */

DROP TABLE IF EXISTS `eksktra`;

CREATE TABLE `eksktra` (
  `id_ektra` varchar(30) NOT NULL,
  `nm_ektra` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_ektra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `eksktra` */

insert  into `eksktra`(`id_ektra`,`nm_ektra`) values 
('EK001','Paduan suara'),
('EK002','Seni musik'),
('EK003','Pramuka'),
('EK004','Seni tari');

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama_gr` varchar(40) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`nip`,`nama_gr`,`tgl_lahir`,`alamat`) values 
('5548765667210063','Natalia Brigita Dewi Rosariana','1977-10-01','Tegal Kwoso, Gergunung, Klaten Utara, 085602119834');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kls` varchar(15) NOT NULL,
  `kls` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_kls`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kls`,`kls`) values 
('kl01','kelas1a'),
('kl02','kelas1b'),
('kl03','kelas2a'),
('kl04','kelas2b'),
('kl05','kelas3a'),
('kl06','kelas3b'),
('kl07','kelas4a'),
('kl08','kelas4b'),
('kl09','kelas5a'),
('kl10','kelas5b'),
('kl11','kelas6a'),
('kl12','kelas6b');

/*Table structure for table `kepribadian` */

DROP TABLE IF EXISTS `kepribadian`;

CREATE TABLE `kepribadian` (
  `id_pribadi` int(15) NOT NULL AUTO_INCREMENT,
  `id_kls` varchar(15) DEFAULT NULL,
  `nis` int(15) DEFAULT NULL,
  `id_smstr` varchar(15) DEFAULT NULL,
  `id_thn` int(9) DEFAULT NULL,
  `sakit` varchar(10) DEFAULT NULL,
  `ijin` varchar(9) DEFAULT NULL,
  `alpha` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_pribadi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kepribadian` */

/*Table structure for table `mapelj` */

DROP TABLE IF EXISTS `mapelj`;

CREATE TABLE `mapelj` (
  `id_mapel` varchar(13) NOT NULL,
  `nm_mapel` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mapelj` */

insert  into `mapelj`(`id_mapel`,`nm_mapel`) values 
('MP001','Bahasa Indonesia'),
('MP002','PPKN'),
('MP003','IPA'),
('MP004','Matematika'),
('MP005','Bahasa jawa'),
('MP006','TIK'),
('MP007','Seni Budaya+Prakarya'),
('MP008','PJOK'),
('MP009','IPS');

/*Table structure for table `murid` */

DROP TABLE IF EXISTS `murid`;

CREATE TABLE `murid` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `tmp_lahir` varchar(75) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kl` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `alamat` text,
  `thn_angkt` varchar(4) DEFAULT NULL,
  `nama_ortu` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `murid` */

insert  into `murid`(`nis`,`nama`,`tmp_lahir`,`tgl_lahir`,`jenis_kl`,`agama`,`alamat`,`thn_angkt`,`nama_ortu`) values 

('0089576734','ALBERTHA FELISDHA','Klaten','2008-05-02','Laki-Laki','Katolik','Sembungan RT 15/ RW 07, Towangsan, Gantiwarno, Klaten','2014','Albetus Indratno Joko Wijayanto'),
('0119454201','ATHANASIUS KENT ABYASA','klaten','2011-01-16','Laki-Laki','Katolik','kintelan, kraguman, jogonalan, klaten','2012','samiyono');

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id_nilai` int(15) NOT NULL AUTO_INCREMENT,
  `nis` varchar(15) DEFAULT NULL,
  `id_mapel` varchar(15) DEFAULT NULL,
  `id_thn` varchar(8) DEFAULT NULL,
  `id_smstr` varchar(15) DEFAULT NULL,
  `id_kls` varchar(15) DEFAULT NULL,
  `nilkd` decimal(8,0) DEFAULT NULL,
  `nilki` decimal(8,0) DEFAULT NULL,
  `indikator_kd` varchar(5) DEFAULT NULL,
  `indikator_ki` varchar(5) DEFAULT NULL,
  `id_aturan` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_smstr` (`id_smstr`),
  KEY `id_thn` (`id_thn`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_mapel_2` (`id_mapel`),
  CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`id_smstr`) REFERENCES `smstr` (`id_smstr`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nilai_ibfk_5` FOREIGN KEY (`id_mapel`) REFERENCES `mapelj` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilai` */

/*Table structure for table `nilai_sos_sp` */

DROP TABLE IF EXISTS `nilai_sos_sp`;

CREATE TABLE `nilai_sos_sp` (
  `id_nilai_sos_sp` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `id_thn` varchar(20) NOT NULL,
  `id_smstr` varchar(20) NOT NULL,
  `id_kls` varchar(20) NOT NULL,
  `nil_sossb` varchar(20) DEFAULT NULL,
  `nil_sospb` varchar(20) DEFAULT NULL,
  `nil_sprtsb` varchar(20) DEFAULT NULL,
  `nil_sprtpb` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_sos_sp`,`nis`,`id_thn`,`id_smstr`,`id_kls`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilai_sos_sp` */

/*Table structure for table `perkem` */

DROP TABLE IF EXISTS `perkem`;

CREATE TABLE `perkem` (
  `id_kem` int(15) NOT NULL AUTO_INCREMENT,
  `id_ektra` varchar(15) DEFAULT NULL,
  `id_thn` varchar(10) DEFAULT NULL,
  `id_smstr` varchar(10) DEFAULT NULL,
  `id_kls` varchar(20) DEFAULT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `prestasi` varchar(70) DEFAULT NULL,
  `ket` text,
  `lihat` varchar(70) DEFAULT NULL,
  `gigi` varchar(70) DEFAULT NULL,
  `dengar` varchar(70) DEFAULT NULL,
  `tinggi` decimal(10,0) DEFAULT NULL,
  `berat` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_kem`),
  KEY `id_thn` (`id_thn`),
  KEY `id_eks` (`id_ektra`),
  CONSTRAINT `perkem_ibfk_1` FOREIGN KEY (`id_ektra`) REFERENCES `eksktra` (`id_ektra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perkem` */

/*Table structure for table `sikap` */

DROP TABLE IF EXISTS `sikap`;

CREATE TABLE `sikap` (
  `id_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `sikap` varchar(15) DEFAULT NULL,
  `ket_1sp` tinytext,
  `ket_2sp` tinytext,
  `ket_3sp` tinytext,
  `ket_4sp` tinytext,
  `ket_5sp` tinytext,
  `ket_6sp` tinytext,
  PRIMARY KEY (`id_sikap`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sikap` */

insert  into `sikap`(`id_sikap`,`sikap`,`ket_1sp`,`ket_2sp`,`ket_3sp`,`ket_4sp`,`ket_5sp`,`ket_6sp`) values 
(1,'spiritual','perilaku taat beribadah','berperilaku syukur','berdoa sebelum melakukan kegiatan','toleran dalam beragama',NULL,NULL),
(2,'sosial','sikap jujur','disiplin','tanggung jawab','santun','peduli','percaya diri');

/*Table structure for table `smstr` */

DROP TABLE IF EXISTS `smstr`;

CREATE TABLE `smstr` (
  `id_smstr` varchar(15) NOT NULL,
  `smstr` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_smstr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `smstr` */

insert  into `smstr`(`id_smstr`,`smstr`) values 
('smt001','1'),
('smt002','2');

/*Table structure for table `thnajar` */

DROP TABLE IF EXISTS `thnajar`;

CREATE TABLE `thnajar` (
  `id_thn` int(12) NOT NULL AUTO_INCREMENT,
  `thn` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_thn`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `thnajar` */

insert  into `thnajar`(`id_thn`,`thn`) values 
(5,'2015/2016'),
(6,'2016/2017'),
(7,'2014/2015'),
(8,'2017/2018');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_u` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `level` varchar(35) DEFAULT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama_u`,`username`,`pass`,`level`) values 
(6,'bimma','emma','21232f297a57a5a743894a0e4a801fc3','admin'),
(9,'admin','admin','827ccb0eea8a706c4c34a16891f84e7b','admin'),
(10,'Christina Dyah Kurniyati','kelas4a','93bdb73b49e88b5ce23da0509da1b8ac','walikelas');

/*Table structure for table `wali_kls` */

DROP TABLE IF EXISTS `wali_kls`;

CREATE TABLE `wali_kls` (
  `id_wali` varchar(15) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `id_kls` varchar(15) DEFAULT NULL,
  `id_thn` int(15) DEFAULT NULL,
  PRIMARY KEY (`id_wali`),
  KEY `nip` (`nip`),
  KEY `id_kls` (`id_kls`),
  KEY `id_thn` (`id_thn`),
  CONSTRAINT `wali_kls_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wali_kls_ibfk_2` FOREIGN KEY (`id_kls`) REFERENCES `kelas` (`id_kls`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wali_kls_ibfk_3` FOREIGN KEY (`id_thn`) REFERENCES `thnajar` (`id_thn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wali_kls` */

insert  into `wali_kls`(`id_wali`,`nip`,`id_kls`,`id_thn`) values 
('Wl001','1342758659300143','kl08',8),
('Wl002','2533764666210093','kl07',8),
('Wl003','4841765667210032','kl09',8);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
