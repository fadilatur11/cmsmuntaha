<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<script src="<?=$js;?>ckeditor/ckeditor.js"></script>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Artikel</h1>
    <p class="mb-4"></a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6><br> -->
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <form action="<?=site_url('artikel/addaction');?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group row">
                  <div class="col-md-8 col-sm-8">
                      <input type="text" name="judul" class="form-control form-control-user" placeholder="Judul Artikel" required>
                  </div>
            </div>

            <div class="form-group row">
                  <div class="col-md-4 col-sm-4">
                      <select class="form-control form-control-user" name="kategori" required>
                          <option value="">Kategori</option>
                          <?php foreach ($kategori as $kategori) {?>
                          <option value="<?=$kategori['id'];?>"><?=$kategori['kategori'];?></option>
                          <?php }?>
                      </select>
                  </div>
                  <div class="col-md-4 col-sm-4">
                      <select class="form-control form-control-user" name="penulis" required>
                          <option value="">Pilih Penulis</option>
                          <?php foreach ($penulis as $penulis) {?>
                          <option value="<?=$penulis['id'];?>"><?=$penulis['nama'];?></option>
                          <?php }?>
                      </select>
                  </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 col-sm-8">
                      <input type="text" name="gagasan" required class="form-control form-control-user" maxlength="150" placeholder="Gagasan Utama">
                </div>
                <div class="col-md-2 col-sm-2">
                      <input type="file" onchange="readURL(this);" name="image" required class="form-control form-control-user">
                  </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 col-sm-8">
                <textarea id="testing" class="form-control" name="deskripsi" data-parsley-trigger="change"></textarea>
                      <script>
                      ClassicEditor
                      .create( document.querySelector('#testing'),{
                        fontFamily: {
                          options: ['default','Arial, Helvetica, sans-serif','Courier New, Courier, monospace','Georgia, serif','Lucida Sans Unicode, Lucida Grande, sans-serif','Tahoma, Geneva, sans-serif','Times New Roman, Times, serif','Trebuchet MS, Helvetica, sans-serif','Verdana, Geneva, sans-serif','Traditional Arabic']
                        }
                      } )
                        </script>
                </div>

                <div class="col-md-2 col-sm-2">
                <img id="blah" src="http://placehold.it/180" width="250px" height="200px" alt="your image" />
            </div>

            </div>

            <div class="form-group row">
            <div class="col-md-2 col-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

            </form>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>