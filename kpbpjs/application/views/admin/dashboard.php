<div class="container-fluid">
  <div class="d-flex justify-content-center">
    <div class="row text-center mt-4">
<div class="card ml-3 mb-3" style="width: 16rem;">
  <img src="<?php echo base_url('assets/img/car.png') ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Kendaraan</h5>
    <?php echo anchor('index.php/admin/kelola_kendaraan', '<div class="btn btn-primary">
          Telusuri
        </div>') ?>
  </div>
</div>
<div class="card ml-3 mb-3" style="width: 16rem;">
  <img src="<?php echo base_url('assets/img/laptop.png') ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Laptop</h5>
    <?php echo anchor('index.php/admin/kelola_laptop', '<div class="btn btn-primary">
          Telusuri
        </div>') ?>
  </div>
</div>
<div class="card ml-3 mb-3" style="width: 16rem;">
  <img src="<?php echo base_url('assets/img/permintaan.png') ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Permintaan</h5>
    <?php echo anchor('index.php/admin/permintaan_admin', '<div class="btn btn-primary">
          Telusuri
        </div>') ?>
  </div>
</div>
</div>
</div>
</div>