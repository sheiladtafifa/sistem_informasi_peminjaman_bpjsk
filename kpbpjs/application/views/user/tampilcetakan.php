<div class="container-fluid">

          <!-- Page Heading -->
	<div class="row">
	<div class="col-lg-6">
    	<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
    </div>
    </div>

  	<div class="container">
    <div class="mt-3" align="center"><h1>Tampil CETAKAN</h1></div>
    	<table class="table table-striped mt-3">
       		<thead>
       			<tr>
       				<th>No</th>
       				<th>NAMA BARANG/JASA</th>
       				<th>SPESIFIKASI</th>
       				<th>JUMLAH</th>
       				<th>SATUAN</th>
       				<th>TANGGAL PENGGUNAAN</th>
       				<th>KETERANGAN</th>
       			</tr>
        	</thead>
        	<tbody>
        		<?php $i = 1; 
            foreach ($cetakan as $cetakan) : ?>
        		<tr>
       				<th> <?= $i++; ?></th>
	        		<td> <?= $cetakan ['nama_barang']; ?> </td>
	        		<td> <?= $cetakan ['spesifikasi']; ?> </td>
	        		<td> <?= $cetakan ['jumlah']; ?> </td>
	        		<td> <?= $cetakan ['satuan']; ?> </td>
	        		<td> <?= $cetakan ['tanggal_penggunaan']; ?> </td>
	        		<td> <?= $cetakan ['keterangan']; ?> </td>
        		</tr>
        	<?php endforeach; ?>
        	</tbody>
       	</table>

         <div class="mt-3" align="center">
        <?php echo anchor('index.php/user/cetakan', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
        </div>
</div>
