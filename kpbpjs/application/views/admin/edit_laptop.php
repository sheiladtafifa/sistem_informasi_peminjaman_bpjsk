<div class="container-fluid">
          <!-- Page Heading -->
  <div class="mt-3" align="center" margin="center"><h1>Edit Data Peminjaman Laptop</h1></div>
        <!-- /.container-fluid -->
        <div class="container mt-3" style="width: 40rem;">
          <form class="form-horizontal" method="post" action="<?php base_url('admin/edit_laptop') ?>">
          <div class="card" style="width: 40rem;">
          <div class="card-header bg-primary text-white">Form Edit Peminjaman Laptop</div>
          <div class="card-body">
            
            <div class="container" margin="center" align="center"> 
            <?= form_error('menu', '<div class="alert alert-danger mt-3" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            </div>

            <input type="hidden" name="id" value="<?= $daftar_peminjamlaptop['id'] ?>">
            <div class="form-group">
              <label class="control-label col-sm-8" for="nama">NAMA</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $daftar_peminjamlaptop['nama'] ?>">
                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-8" for="jabatan">JABATAN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="<?= $daftar_peminjamlaptop['jabatan'] ?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-8" for="bidang">BIDANG</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Bidang" value="<?= $daftar_peminjamlaptop['bidang'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-8" for="pemakaian_laptop">PEMAKAIAN LAPTOP</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="pemakaian_laptop" name="pemakaian_laptop" placeholder="Pemakaian Laptop" value="<?= $daftar_peminjamlaptop['pemakaian_laptop'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-8" for="jenis">JENIS</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis" value="<?= $daftar_peminjamlaptop['jenis'] ?>">
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="warna">WARNA</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna" value="<?= $daftar_peminjamlaptop['warna'] ?>">
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="kelengkapan">KELENGKAPAN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="kelengkapan" name="kelengkapan" placeholder="Kelengkapan" value="<?= $daftar_peminjamlaptop['kelengkapan'] ?>">
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="waktu_peminjaman">WAKTU PEMINJAMAN</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="waktu_peminjaman" name="waktu_peminjaman" placeholder="Waktu Peminjaman" value="<?= $daftar_peminjamlaptop['waktu_peminjaman'] ?>">
              </div>
            </div>

            <div class="ml-3 mt-3">
              <button type="submit" class="btn btn-primary">Edit</button>
               <?php echo anchor('index.php/admin/kelola_laptop', '<div class="btn btn-primary">
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

     
