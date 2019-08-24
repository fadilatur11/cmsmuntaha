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
            <form action="<?=site_url('kajian/addaction');?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group row">
                  <div class="col-md-4 col-sm-4">
                      <input type="text" name="judul" class="form-control form-control-user" placeholder="Judul Kajian" required>
                  </div>
                  <div class="col-md-4 col-sm-4">
                      <input type="text" name="link" class="form-control form-control-user" placeholder="Link Youtube Kajian Irtaqi" required>
                  </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                      <input type="file" onchange="readURL(this);" name="image" class="form-control form-control-user" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                  <img id="blah" src="http://placehold.it/180" width="250px" height="200px" alt="your image" />
                </div>
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