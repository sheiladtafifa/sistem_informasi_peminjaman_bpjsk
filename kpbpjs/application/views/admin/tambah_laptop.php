<div class="container-fluid">
          <!-- Page Heading -->
  <div class="mt-3" align="center" margin="center"><h1>Tambah Data Peminjaman Laptop</h1></div>
        <!-- /.container-fluid -->
        <div class="container mt-3" style="width: 40rem;">
          <form class="form-horizontal" method="post" action="<?php base_url('admin/tambah_laptop') ?>">
          <div class="card" style="width: 40rem;">
          <div class="card-header bg-primary text-white">Form Peminjaman Laptop</div>
          <div class="card-body">
            
            <div class="container" margin="center" align="center"> 
            <?= form_error('menu', '<div class="alert alert-danger mt-3" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="nama">NAMA</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-8" for="jabatan">JABATAN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="<?= set_value('jabatan'); ?>">
                <?= form_error('jabatan', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-8" for="bidang">BIDANG</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Bidang" value="<?= set_value('bidang'); ?>">
                <?= form_error('bidang', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-8" for="pemakaian_laptop">PEMAKAIAN LAPTOP</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="pemakaian_laptop" name="pemakaian_laptop" placeholder="Pemakaian Laptop" value="<?= set_value('pemakaian_laptop'); ?>">
                <?= form_error('pemakaian_laptop', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-8" for="jenis">JENIS</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis" value="<?= set_value('jenis'); ?>">
                <?= form_error('jenis', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="warna">WARNA</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna" value="<?= set_value('warna'); ?>">
                <?= form_error('warna', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="kelengkapan">KELENGKAPAN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="kelengkapan" name="kelengkapan" placeholder="Kelengkapan" value="<?= set_value('kelengkapan'); ?>">
                <?= form_error('kelengkapan', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="waktu_peminjaman">WAKTU PEMINJAMAN</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="waktu_peminjaman" name="waktu_peminjaman" placeholder="Waktu Peminjaman">
              </div>
            </div>

            <div class="ml-3 mt-3">
              <button type="submit" class="btn btn-primary">Simpan</button>
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

     
