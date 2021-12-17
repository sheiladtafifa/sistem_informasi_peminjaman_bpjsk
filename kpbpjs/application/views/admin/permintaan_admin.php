<div class="container-fluid">
  <div class="d-flex justify-content-center">
    <div class="row text-center mt-4">
      <div class="card ml- mb-3" style="width: 18rem;">
        <img src="<?php echo base_url('assets/img/atk.png') ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Kelola ATK</h5>
            <?php echo anchor('index.php/admin/kelola_atk', '<div class="btn btn-primary">
                Telusuri
              </div>') ?>
          </div>
      </div>
      
      <div class="card ml-3 mb-3" style="width: 18rem;">
        <img src="<?php echo base_url('assets/img/cetakan.png') ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Kelola Cetakan</h5>
            <?php echo anchor('index.php/admin/kelola_cetakan', '<div class="btn btn-primary">
              Telusuri
            </div>') ?>
          </div>
      </div>
      
      <div class="card ml-3 mb-3" style="width: 18rem;">
        <img src="<?php echo base_url('assets/img/consumable.png') ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Kelola Consumable</h5>
            <?php echo anchor('index.php/admin/kelola_consumable', '<div class="btn btn-primary">
              Telusuri
            </div>') ?>
          </div>
      </div>

      <div class="card ml-3 mb-3" style="width: 18rem;">
        <img src="<?php echo base_url('assets/img/pembelianrt2.png') ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Kelola Pembelian Rumah Tangga</h5>
            <?php echo anchor('index.php/admin/kelola_pembelianrumahtangga', '<div class="btn btn-primary">
              Telusuri
            </div>') ?>
          </div>
      </div>
    </div>
  </div>
  <div class="card-body d-flex justify-content-center">
         <?php echo anchor('index.php/admin/index', '<div class="btn btn-primary">
              Kembali
            </div>') ?>
    </div>
  </div>
</div>