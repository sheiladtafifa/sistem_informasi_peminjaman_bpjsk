<div class="container-fluid">
          <!-- Page Heading -->
  <div class="mt-3" align="center" margin="center"><h1>Edit Data Consumable</h1></div>
        <!-- /.container-fluid -->
        <div class="container mt-3" style="width: 40rem;">
          <form class="form-horizontal" method="post" action="<?php base_url('admin/edit_consumable') ?>">
          <div class="card" style="width: 40rem;">
          <div class="card-header bg-primary text-white">Form Edit Consumable</div>
          <div class="card-body">
            
            <div class="container" margin="center" align="center"> 
            <?= form_error('menu', '<div class="alert alert-danger mt-3" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            </div>

            <input type="hidden" name="no consumable" value="<?= $consumable['no_consumable'] ?>">
            <div class="form-group">
              <label class="control-label col-sm-8" for="nama_barang">NAMA BARANG/JASA</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang/Jasa" value="<?= $consumable['nama_barang'] ?>">
                <?= form_error('nama_barang', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-8" for="spesifikasi">SPESIFIKASI</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi" value="<?= $consumable['spesifikasi']; ?>">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-8" for="jumlah">JUMLAH</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="<?= $consumable['jumlah'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-8" for="satuan">SATUAN</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" value="<?= $consumable['satuan']; ?>">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-8" for="tanggal_penggunaan">TANGGAL PENGGUNAAN</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="tanggal_penggunaan" name="tanggal_penggunaan" placeholder="Tanggal_penggunaan" value="<?= $consumable['tanggal_penggunaan']?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-8" for="keterangan">KETERANGAN</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= $consumable['keterangan'] ?>">
                </div>
            </div> 

            <div class="ml-3 mt-3">
              <button type="submit" class="btn btn-primary">Edit</button>
               <?php echo anchor('index.php/admin/kelola_consumable', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
            </div>  
            </div>
            </div>
          </form>   

        </div>

      </div>
      <!-- End of Main Content -->

      <!-- Modal -->
      <!-- Button trigger modal -->

     
