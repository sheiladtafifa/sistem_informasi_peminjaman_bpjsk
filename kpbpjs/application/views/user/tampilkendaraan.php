<div class="container-fluid">

          <!-- Page Heading -->
	<div class="row">
	<div class="col-lg-6">
    	<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
    </div>
    </div>

  	<div class="container">
    <div class="mt-3" align="center"><h1>Tampil Peminjaman Kendaraan</h1></div>
    	<table class="table table-striped mt-3">
       		<thead>
       			<tr>
       				<th>NO</th>
       				<th>NAMA</th>
       				<th>BIDANG</th>
       				<th>KEPERLUAN</th>
       				<th>PUKUL</th>
       				<th>TANGGAL</th>
       				<th>JENIS KENDARAAN</th>
              <th>PLAT</th>
              <th>PENGAMBILAN ALAT</th>
              <th>PENGEMBALIAN ALAT</th>
              <th>PENGEMUDI</th>
       			</tr>
        	</thead>
        	<tbody>
        		<?php foreach ($daftar_peminjamkendaraan as $dfk) : ?>
        		<tr>
       				<th> <?= ++$start; ?></th>
	        		<td> <?= $dfk ['nama']; ?> </td>
	        		<td> <?= $dfk ['bidang']; ?> </td>
	        		<td> <?= $dfk ['keperluan']; ?> </td>
	        		<td> <?= $dfk ['pukul']; ?> </td>
	        		<td> <?= $dfk ['haritanggal']; ?> </td>
	        		<td> <?= $dfk ['jenis_kendaraan']; ?> </td>
              <td> <?= $dfk ['plat']; ?> </td>
              <td> <?= $dfk ['pengambilan_alat']; ?> </td>
              <td> <?= $dfk ['pengembalian_alat']; ?> </td>
              <td> <?= $dfk ['nama_pengemudi']; ?> </td>
        		</tr>
        	<?php endforeach; ?>
        	</tbody>
       	</table>
        <div class="mt-3" align="center">
          <?= $this->pagination->create_links(); ?>
        </div>
         <div class="mt-3" align="center">
        <?php echo anchor('index.php/user/kendaraan', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
        </div>
</div>
