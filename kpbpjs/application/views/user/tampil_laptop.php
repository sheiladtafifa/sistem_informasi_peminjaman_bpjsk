<div class="container-fluid">

          <!-- Page Heading -->
	<div class="row">
	<div class="col-lg-6">
    	<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
    </div>
    </div>

  	<div class="container">
    <div class="mt-3" align="center"><h1>Tampil Peminjaman Laptop</h1></div>
    	<table class="table table-striped mt-3">
       		<thead>
       			<tr>
       				<th>NO</th>
       				<th>NAMA</th>
              <th>JABATAN</th>
       				<th>BIDANG</th>
       				<th>PEMAKAIAN LAPTOP</th>
       				<th>JENIS</th>
              <th>WARNA</th>
              <th>KELENGKAPAN</th>
              <th>WAKTU PEMINJAMAN</th>
       			</tr>
        	</thead>
        	<tbody>
        		<?php foreach ($daftar_peminjamlaptop as $dfl) : ?>
        		<tr>
       				<th> <?= ++$start; ?></th>
	        		<td> <?= $dfl ['nama']; ?> </td>
              <td> <?= $dfl ['jabatan']; ?> </td>
	        		<td> <?= $dfl ['bidang']; ?> </td>
	        		<td> <?= $dfl ['pemakaian_laptop']; ?> </td>
	        		<td> <?= $dfl ['jenis']; ?> </td>
	        		<td> <?= $dfl ['warna']; ?> </td>
              <td> <?= $dfl ['kelengkapan']; ?> </td>
              <td> <?= $dfl ['waktu_peminjaman']; ?> </td>
        		</tr>
        	<?php endforeach; ?>
        	</tbody>
       	</table>
        <div class="mt-3" align="center">
          <?= $this->pagination->create_links(); ?>
        </div>
         <div class="mt-3" align="center">
        <?php echo anchor('index.php/user/laptop', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
        </div>
</div>
