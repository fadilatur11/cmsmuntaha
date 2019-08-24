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
        <a href="<?=site_url('kajian/add');?>"><button type="button" class="btn btn-primary">Tambah</button></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Kajian</th>
                <th>Link Youtube</th>
                <th>Options</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>No</th>
              <th>Judul Kajian</th>
              <th>Link Youtube</th>
              <th>Options</th>
              </tr>
            </tfoot>
            <tbody>
            <?php $i= $this->uri->segment('3') + 1; foreach ($kajian as $kajian) {?>
              <tr>
                <th><?=$i;?></th>
                <th><?=$kajian['judul_artikel'];?></th>
                <th><?=$kajian['description'];?></th>
                <th>
                <a href="<?=site_url('kajian/edit/'.$kajian['id_artikel']);?>"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="<?=site_url('kajian/delete/'.$kajian['id_artikel']);?>"><button type="button" class="btn btn-dark">Hapus</button></a>
                </th>
              </tr>
            <?php $i++;}?>
            </tbody>
          </table>
          <?=$pagination;?>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>