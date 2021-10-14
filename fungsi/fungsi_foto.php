<?php
	// Konvesi yyyy-mm-dd -> dd-mm-yyyy dan memberi nama bulan
	function gambar($foto) { 
$this->db->select('id');  // memilih database berdasarkan id / auto increment di database
$this->db->select('pict'); // memilih kolom pict dari tabel yg ada di database untuk didefinisikan lebih lanjut
$query = $this->db->get('nama_tabel'); // memanggil database berdasarkan nama table
foreach ($query->result() as $row){      // fungsi memanggil hasil dari query menjadi $row 
$gambar = array (                                       // membuat array untuk handle definisi dari database
'img'    => $row->pict
    );
?>
<!-- PERULANGAN -->

<?php echo "<img src=../assert/img".$gambar['img'].">"; ?>

<!-- PERULANGAN END -->
<?php } ?> 