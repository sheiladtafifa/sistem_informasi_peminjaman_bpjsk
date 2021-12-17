<div class="container-fluid">

          <!-- Page Heading -->
	<div class="row">
	<div class="col-lg-6">
    	<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
    </div>
    </div>

  	<div class="container">
    <div class="mt-3" align="center"><h1>Tampil CONSUMABLE</h1></div>
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
            foreach ($consumable as $consumable) : ?>
        		<tr>
       				<th> <?= $i++; ?></th>
	        		<td> <?= $consumable ['nama_barang']; ?> </td>
	        		<td> <?= $consumable ['spesifikasi']; ?> </td>
	        		<td> <?= $consumable ['jumlah']; ?> </td>
	        		<td> <?= $consumable ['satuan']; ?> </td>
	        		<td> <?= $consumable ['tanggal_penggunaan']; ?> </td>
	        		<td> <?= $consumable ['keterangan']; ?> </td>
        		</tr>
        	<?php endforeach; ?>
        	</tbody>
       	</table>

         <div class="mt-3" align="center">
        <?php echo anchor('index.php/user/consumable', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
        </div>
</div>
