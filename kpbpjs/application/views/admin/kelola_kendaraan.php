<div class="container-fluid">

          <!-- Page Heading -->
	<div class="container mt-3" style="width: 40rem;">
	    <div class="container" margin="center" align="center"> 
            <?= form_error('menu', '<div class="alert alert-danger mt-3" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
      </div>
  </div>

  	<div class="container">
    <div class="mt-3" align="center"><h1>Kelola Peminjaman Kendaraan</h1></div>
    
    <div class="row mt-3">
      <div class="col-md-6">
        <form action="<?= base_url('index.php/admin/kelola_kendaraan')?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="keyword" autocomplete="off" autofocus>
            <div class="input-group-append">
              <input class="btn btn-primary" type="submit" name="submit">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="container" style="width: 40rem;">
      <div class="container" margin="center" align="center">
        <?php if( empty($daftar_peminjamkendaraan) ) : ?>
          <div class="alert alert-danger" role="alert" margin="center" align="center">
            Data Peminjaman Kendaraan tidak ada!
          </div>
        <?php endif;?>
      </div>
    </div>
      <h5>Results : <?= $total_rows ?></h5>
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
	        		<td> 
		        		<a href="<?= base_url('index.php/admin/edit_kendaraan/');?><?= $dfk['id'];?>" class="badge badge-success">Edit</a>
		        		<a href="<?= base_url('index.php/admin/hapus_kendaraan/');?><?= $dfk['id'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a> 
	        		</td>
        		</tr>
        	<?php endforeach; ?>
        	</tbody>
       	</table>
		<div class="mt-3" align="center">
       		<?= $this->pagination->create_links(); ?>
       	</div>
         <div class="mt-4" align="center">
        <?php echo anchor('index.php/admin/tambah_kendaraan', '<div class="btn btn-primary">
            Tambah Data
          </div>') ?>
          <?php echo anchor('index.php/admin/index', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
        </div>
</div>
