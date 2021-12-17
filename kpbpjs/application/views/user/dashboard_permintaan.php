<div class="container-fluid">
  <div class="d-flex justify-content-center">
    <div class="row text-center mt-4">
      <div class="card ml- mb-3" style="width: 18rem;">
        <img src="<?php echo base_url('assets/img/atk.png') ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">ATK</h5>
            <?php echo anchor('index.php/user/atk', '<div class="btn btn-primary">
                Telusuri
              </div>') ?>
          </div>
      </div>
      
      <div class="card ml-3 mb-3" style="width: 18rem;">
        <img src="<?php echo base_url('assets/img/cetakan.png') ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cetakan</h5>
            <?php echo anchor('index.php/user/cetakan', '<div class="btn btn-primary">
              Telusuri
            </div>') ?>
          </div>
      </div>
      
      <div class="card ml-3 mb-3" style="width: 18rem;">
        <img src="<?php echo base_url('assets/img/consumable.png') ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Consumable</h5>
            <?php echo anchor('index.php/user/consumable', '<div class="btn btn-primary">
              Telusuri
            </div>') ?>
          </div>
      </div>

      <div class="card ml-3 mb-3" style="width: 18rem;">
        <img src="<?php echo base_url('assets/img/pembelianrt2.png') ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pembelian Rumah Tangga</h5>
            <?php echo anchor('index.php/user/pembelianrumahtangga', '<div class="btn btn-primary">
              Telusuri
            </div>') ?>
          </div>
      </div>
    </div>
  </div>
  <div class="card-body d-flex justify-content-center">
         <?php echo anchor('index.php/user/index', '<div class="btn btn-primary">
              Kembali
            </div>') ?>
    </div>
  </div>
</div>