<?php include_once dirname(__FILE__).'/../layouts/header.php';?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Artikel</h1>
    <p class="mb-4"></a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6><br> -->
        <a href="<?=site_url('users/add');?>"><button type="button" class="btn btn-primary">Tambah</button></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Options</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Role</th>
              <th>Options</th>
              </tr>
            </tfoot>
            <tbody>
            <?php $i=1; foreach ($users as $users) {?>
              <tr>
                <th><?=$i;?></th>
                <th><?=$users['nama'];?></th>
                <?php if ($users['role'] == 1) {?>
                <th>
                <a href="#" class="btn btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Penulis</span></a>
                </th>
                <?php }elseif ($users['role'] == 2) {?>
                <th><a href="#" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Editor</span></a></th>
                <?php }elseif ($users['role'] == 3) {?>
                <th><a href="#" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Administrator</span></a></th>
                <?php }?>
                <th>
                <a href="<?=site_url('users/edit/'.$users['id']);?>"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="<?=site_url('users/delete/'.$users['id']);?>"><button type="button" class="btn btn-dark">Hapus</button></a>
                </th>
              </tr>
            <?php $i++;}?>
              
            </tbody>
          </table>
          
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>