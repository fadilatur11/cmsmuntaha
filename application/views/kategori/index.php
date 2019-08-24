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
        <a href="<?=site_url('kategori/add');?>"><button type="button" class="btn btn-primary">Tambah</button></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Options</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Options</th>
              </tr>
            </tfoot>
            <tbody>
           <?php $i=1; foreach ($kategori as $kategori) {?>
              <tr>
                <th><?=$i;?></th>
                <th><?=$kategori['kategori'];?></th>
                <th>
                <a href="<?=site_url('kategori/edit/'.$kategori['id']);?>"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="<?=site_url('kategori/delete/'.$kategori['id']);?>"><button type="button" class="btn btn-dark">Hapus</button></a>
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