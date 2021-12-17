<div class="container-fluid">

          <!-- Page Heading -->
	<div class="row">
	<div class="col-lg-6">
    	<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
    </div>
    </div>

  	<div class="container">
    <div class="mt-3" align="center"><h1>Tampil ATK</h1></div>
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
        		<?php foreach ($atk as $atk) : ?>
        		<tr>
       				<th> <?= ++$start; ?></th>
	        		<td> <?= $atk ['nama_barang']; ?> </td>
	        		<td> <?= $atk ['spesifikasi']; ?> </td>
	        		<td> <?= $atk ['jumlah']; ?> </td>
	        		<td> <?= $atk ['satuan']; ?> </td>
	        		<td> <?= $atk ['tanggal_penggunaan']; ?> </td>
	        		<td> <?= $atk ['keterangan']; ?> </td>
        		</tr>
        	<?php endforeach; ?>
        	</tbody>
       	</table>
        <div class="mt-3" align="center">
          <?= $this->pagination->create_links(); ?>
        </div>
         <div class="mt-3" align="center">
        <?php echo anchor('index.php/user/atk', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
        </div>
</div>
