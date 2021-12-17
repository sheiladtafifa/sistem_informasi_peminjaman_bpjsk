<div class="container-fluid">
         <!-- Page Heading -->
  <div class="mt-3" align="center" margin="center"><h1>KENDARAAN</h1></div>
   <!-- /.container-fluid -->
        <div class="container mt-3" style="width: 40rem;">
          <form class="form-horizontal" method="post" action="<?php base_url('user/kendaraan') ?>">
          <div class="card" style="width: 40rem;">
          <div class="card-header bg-primary text-white">Form KENDARAAN</div>
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
              <label class="control-label col-sm-8" for="bidang">BIDANG</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Bidang" value="<?= set_value('bidang'); ?>">
                <?= form_error('bidang', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-8" for="keperluan">KEPERLUAN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan" value="<?= set_value('keperluan'); ?>">
                <?= form_error('keperluan', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-8" for="pukul">PUKUL</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="pukul" name="pukul" placeholder="Pukul" value="<?= set_value('pukul'); ?>">
                <?= form_error('pukul', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="haritanggal">TANGGAL</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="haritanggal" name="haritanggal" placeholder="Tanggal">
              </div>
            </div>

          <div class="form-group">
            <label class="control-label col-sm-8" for="jenis_kendaraan">JENIS KENDARAAN</label>
            <div class="col-sm-8">
            <select class="form-control" name="jenis_kendaraan">
              <option>Pilih</option>
            <option>Mobil</option>
            <option>Motor</option>  
        </select>
      </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-8" for="plat">PLAT</label>
            <div class="col-sm-8">
              <select class="form-control" name="plat">
              <option>Pilih</option>
              <option>--Mobil--</option>
            <option>BG 8522 MZ</option>
            <option>BG 1291 MZ</option>
            <option>BG 1934 UT</option> 
            <option>BG 1808 LZ</option>
            <option>BG 1760 RZ</option>
            <option>BG 1928 RZ</option>
            <option>BG 1310 PZ</option>
            <option>BG 8542 MZ</option>
            <option>BG 1929 RZ</option>
            <option>--Motor--</option>
            <option>BG 6169 AAD</option>
            <option>BG 2113 RZ</option>
        </select>
          </div>
        </div>

            <div class="form-group">
              <label class="control-label col-sm-8" for="pengambilan_alat">PENGAMBILAN ALAT</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="pengambilan_alat" name="pengambilan_alat" placeholder="Pengambilan Alat" value="<?= set_value('pengambilan_alat'); ?>">
                <?= form_error('pengambilan_alat', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-8" for="pengembalian_alat">PENGEMBALIAN ALAT</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="pengembalian_alat" name="pengembalian_alat" placeholder="Pengembalian Alat" value="<?= set_value('pengembalian_alat'); ?>">
                <?= form_error('pengembalian_alat', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>

          <div class="form-group">
            <label class="control-label col-sm-8" for="nama_pengemudi">PENGEMUDI</label>
            <div class="col-sm-8">
            <select class="form-control" name="nama_pengemudi">
              <option>Pilih</option>
            <option>Victor Rozen</option>
            <option>M. Ichsan Rosadi</option>  
        </select>
      </div>
          </div>

          <div class="ml-3 mt-3">
              <button type="submit" class="btn btn-primary">Simpan</button>
               <?php echo anchor('index.php/user/tampilkendaraan', '<div class="btn btn-primary">
            Tampil
          </div>') ?>
               <?php echo anchor('index.php/user/index', '<div class="btn btn-primary">
            Kembali
          </div>') ?>
            </div>  
            </div>
            </div>
          </form>   

        </div>

      </div>

<!-- enctype="multipart/form-data" itu untuk upload gambar -->