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
      <th>Jabatan</th>
			<th>Bidang</th>
			<th>Pemakaian Laptop</th>
			<th>Jenis</th>
			<th>Warna</th>
      <th>Kelengkapan</th>
      <th>Waktu Peminjaman</th>
			<th colspan="3">Aksi</th>
		</tr>

		<?php  
		$no=1;
		foreach ($daftar_peminjamlaptop as $dfl) : ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $dfl->id ?></td>
      <td><?php echo $dfl->nama ?></td>
      <td><?php echo $dfl->jabatan ?></td>
      <td><?php echo $dfl->bidang ?></td>
      <td><?php echo $dfl->pemakaian_laptop ?></td>
      <td><?php echo $dfl->jenis ?></td>
      <td><?php echo $dfl->warna ?></td>
      <td><?php echo $dfl->kelengkapan ?></td>
      <td><?php echo $dfl->waktu_peminjaman ?></td>
			<td><?php echo anchor('index.php/admin/edit', '<div class="btn btn-primary">
          Edit
        </div>') ?></td>
			<td><?php echo anchor('index.php/admin/hapus', '<div class="btn btn-primary">
          Hapus
        </div>') ?></td>
		</tr>

	<?php endforeach; ?>
	</table>
</div>


<!-- enctype="multipart/form-data" itu untuk upload gambar -->