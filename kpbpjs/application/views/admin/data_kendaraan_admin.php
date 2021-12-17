<div class="container-fluid">

  <?php echo anchor('index.php/admin/index/','<div class="btn btn-sm btn-primary mb-3">
          Kembali
        </div>') ?>

  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<table class="table table-bordered">
		<tr>
			<th>No.</th>
      <th>Id</th>
			<th>Nama</th>
			<th>Bidang</th>
			<th>Keperluan</th>
			<th>Pukul</th>
			<th>Hari dan Tanggal</th>
      <th>Jenis Kendaraan</th>
      <th>Plat</th>
      <th>Pengambilan Alat</th>
      <th>Pengembalian Alat</th>
      <th>Nama Pengemudi</th>
			<th colspan="3">Aksi</th>
		</tr>

		<?php  
		$no=1;
		foreach ($daftar_peminjamkendaraan as $dfk) : ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $dfk->id ?></td>
      <td><?php echo $dfk->nama ?></td>
      <td><?php echo $dfk->bidang ?></td>
      <td><?php echo $dfk->keperluan ?></td>
      <td><?php echo $dfk->pukul ?></td>
      <td><?php echo $dfk->haritanggal ?></td>
      <td><?php echo $dfk->jenis_kendaraan ?></td>
      <td><?php echo $dfk->plat ?></td>
      <td><?php echo $dfk->pengambilan_alat ?></td>
      <td><?php echo $dfk->pengembalian_alat ?></td>
      <td><?php echo $dfk->nama_pengemudi ?></td>
			<td><?php echo anchor('index.php/admin/edit_kendaraan', '<div class="btn btn-primary">
          Edit
        </div>') ?></td>
			<td><?php echo anchor('index.php/admin/hapus_kendaraan', '<div class="btn btn-primary">
          Hapus
        </div>') ?></td>
		</tr>

	<?php endforeach; ?>
	</table>
</div>


<!-- enctype="multipart/form-data" itu untuk upload gambar -->