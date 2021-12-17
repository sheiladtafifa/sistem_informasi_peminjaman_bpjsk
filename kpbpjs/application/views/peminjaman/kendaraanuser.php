<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg-8">
              <?php if (validation_errors()) : ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
              <?php endif; ?>

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Plat</th>
      <th scope="col">Jenis Kendaraan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach($kendaraan as $k) : ?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $k['plat']; ?></td>
      <td><?= $k['jenis_kendaraan']; ?></td>
      <td>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPinjamKendaraanModal">Pinjam</a>
      </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
            </div>
            

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal -->
      <!-- Button trigger modal -->

      <!-- Modal -->

<?php foreach($kendaraan as $k) : ?>      
<div class="modal fade" id="newPinjamKendaraanModal" tabindex="-1" role="dialog" aria-labelledby="newPinjamKendaraanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPinjamKendaraanModalLabel">Form Peminjaman Kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="<?= base_url('index.php/peminjaman/index'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group row">
           <label class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
    <input type="text" class="form-control" id="nama" name="nama">
  </div>
</div>
 <div class="form-group row">
           <label class="col-sm-4 col-form-label">Jabatan/Bidang</label>
                        <div class="col-sm-8">
    <input type="text" class="form-control" id="bidang" name="bidang">
  </div>
</div>
 <div class="form-group row">
           <label class="col-sm-4 col-form-label">Keperluan</label>
                        <div class="col-sm-8">
    <input type="text" class="form-control" id="keperluan" name="keperluan">
  </div>
</div>
<div class="form-group row">
           <label class="col-sm-4 col-form-label">Waktu Pemakaian</label>
                        
</div>
 <div class="form-group row">
           <label class="col-sm-4 col-form-label">Pukul</label>
                        <div class="col-sm-8">
    <input type="text" class="form-control" id="pukul" name="pukul">
  </div>
</div>
 <div class="form-group row">
           <label class="col-sm-4 col-form-label">Hari/Tanggal</label>
                        <div class="col-sm-8">
    <input type="text" class="form-control" id="haritanggal" name="haritanggal">
  </div>
</div>
 <div class="form-group row">
           <label class="col-sm-4 col-form-label">Jenis Kendaraan</label>
           <div class="col-sm-8">
    <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" value="<?= $k['jenis_kendaraan']; ?>" readonly>
</div>
</div>
<div class="form-group row">
           <label class="col-sm-4 col-form-label">Plat</label>
                        <div class="col-sm-8">
    <input type="text" class="form-control" id="plat" name="plat" value="<?= $k['plat']; ?>" readonly>
  </div>
</div>
<div class="form-group row">
           <label class="col-sm-4 col-form-label">Alat-Alat yang ada di dalam mobil</label>
                        
</div>
<div class="form-group row">
           <label class="col-sm-4 col-form-label">Pengambilan</label>
                        <div class="col-sm-8">
    <input type="text" class="form-control" id="pengambilan_alat" name="pengambilan_alat">
  </div>
</div>
<div class="form-group row">
           <label class="col-sm-4 col-form-label">Pengembalian</label>
                        <div class="col-sm-8">
    <input type="text" class="form-control" id="pengembalian_alat" name="pengembalian_alat">
  </div>
</div>
  <div class="form-group row">
     <label class="col-sm-4 col-form-label">Pengemudi</label>
                        <div class="col-sm-8">
        <select name="id_pengemudi" id="id_pengemudi" class="form-control">
          <option value="">Pilih</option>
          <?php foreach($pengemudi as $p) : ?>
          <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>  
          <?php endforeach; ?>  
        </select>
      </div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Pinjam</button>
      </div>
  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

     
