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
        <a href="<?=site_url('artikel/add');?>"><button type="button" class="btn btn-primary">Tambah</button></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Artikel</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>Waktu Publish</th>
                <th>Dibaca</th>
                <th>Options</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>No</th>
              <th>Judul Artikel</th>
              <th>Kategori</th>
              <th>Penulis</th>
              <th>Status</th>
              <th>Waktu Publish</th>
              <th>Dibaca</th>
              <th>Options</th>
              </tr>
            </tfoot>
            <tbody>
            <?php $i= $this->uri->segment('3') + 1; foreach ($artikel as $artikel) {?>
              <tr>
                <td><?=$i;?></td>
                <td><?=ucwords($artikel['judul_artikel']);?></td>
                <td><?=ucwords($artikel['kategori']);?></td>
                <td><?=ucwords(substr($artikel['nama'],0,12));?></td>
                <?php if ($artikel['publish'] == 'Y') {?>
                <td><a href="#" class="btn btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-check"></i></span>
                    <span class="text">Published</span></a>
                </td>
                <?php }else{?>
                <td><a href="#" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-info-circle"></i></span>
                    <span class="text">Not Publish</span></a>
                </td>
                <?php }?>
                <td><?=$artikel['tgl_pub'];?></td>
                <td><?=$artikel['dibaca'];?></td>
                <td>
                <?php if ($artikel['headline'] == 'Y') {?>
                    <a href="<?=site_url('artikel/headline/'.$artikel['id_artikel']);?>"><button type="submit" class="btn btn-danger">Unheadline</button></a>
                <?php }else{?>
                  <a href="<?=site_url('artikel/headline/'.$artikel['id_artikel']);?>"><button type="submit" class="btn btn-primary">Headline</button></a>
                <?php }?>
                    <a href="<?=site_url('artikel/edit/'.$artikel['id_artikel']);?>"><button type="button" class="btn btn-warning">Edit</button></a>
                    <a href="<?=site_url('artikel/delete/'.$artikel['id_artikel']);?>"><button type="button" class="btn btn-dark">Hapus</button></a>
                </td>
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