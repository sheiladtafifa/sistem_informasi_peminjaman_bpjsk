<div class="container-fluid">

          <!-- Page Heading -->
  <div class="container mt-3" style="width: 40rem;">
      <div class="container" margin="center" align="center"> 
            <?= form_error('menu', '<div class="alert alert-danger mt-3" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
      </div>
  </div>

    <div class="container">
    <div class="mt-3" align="center"><h1>Kelola Pembelian Rumah Tangga</h1></div>
    
    <div class="row mt-3">
      <div class="col-md-6">
        <form action="<?= base_url('index.php/admin/kelola_pembelianrumahtangga')?>" method="post">
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
        <?php if( empty($pembelianrumahtangga) ) : ?>
          <div class="alert alert-danger" role="alert" margin="center" align="center">
            Data pembelian rumah tangga tidak ada!
          </div>
        <?php endif;?>
      </div>
    </div>
      <h5>Results : <?= $total_rows ?></h5>
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
              <th>OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pembelianrumahtangga as $pembelianrumahtangga) : ?>
            <tr>
              <th> <?= ++$start; ?></th>
              <td> <?= $pembelianrumahtangga ['nama_barang']; ?> </td>
              <td> <?= $pembelianrumahtangga ['spesifikasi']; ?> </td>
              <td> <?= $pembelianrumahtangga ['jumlah']; ?> </td>
              <td> <?= $pembelianrumahtangga ['satuan']; ?> </td>
              <td> <?= $pembelianrumahtangga ['tanggal_penggunaan']; ?> </td>
              <td> <?= $pembelianrumahtangga ['keterangan']; ?> </td>
              <td> 
                <a href="<?= base_url('index.php/admin/edit_pembelianrt/');?><?= $pembelianrumahtangga['no_pembelianrt'];?>" class="badge badge-success">Edit</a>
                <a href="<?= base_url('index.php/admin/hapus_pembelianrumahtangga/');?><?= $pembelianrumahtangga['no_pembelianrt'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a> 
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
    <div class="mt-3" align="center">
          <?= $this->pagination->create_links(); ?>
        </div>
         <div class="mt-4" align="center">
        <?php echo anchor('index.php/admin/tambah_pembelianrumahtangga', '<div class="btn btn-primary">
            Tambah Data
          </div>') ?>
          <?php echo anchor('index.php/admin/permintaan_admin', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
        </div>
</div>
