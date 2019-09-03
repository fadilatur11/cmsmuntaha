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
        <form action="<?=site_url('users/editaction');?>" method="post" autocomplete="off" enctype="multipart/form-data">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <div class="form-group row">
                  <div class="col-md-4 col-sm-4">
                      <input type="text" name="nama" value="<?=$user['nama'];?>" class="form-control form-control-user" placeholder="Nama" required>
                  </div>
                  <div class="col-md-4 col-sm-4">
                      <select class="form-control form-control-user" name="role" required>
                      <option value="">Pilih Role</option>
                      <option value="3">Administrator</option>
                      <option value="1">Penulis</option>
                      <option value="2">Editor</option>
                      </select>
                  </div>

                  <div class="col-md-4 col-sm-4">
                    <input type="email" value="<?=$user['email'];?>" name="email" autocomplete="off" class="form-control form-control-user" placeholder="Email" required>
                    <input type="hidden" name="id" value="<?=$user['id'];?>">
                  </div>
            </div>
            <div class="form-group row">
                  <div class="col-md-4 col-sm-4">
                    <input type="password" autocomplete="off" id="pass" name="password" class="form-control form-control-user" placeholder="Password" required>
                  </div>

                  <div class="col-md-4 col-sm-4">
                    <input type="password" autocomplete="off" id="confpass" class="form-control form-control-user" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group">
                    <span class="error" style="color:red;font-size:20px;font-weight:bold"></span>
                  </div>

                  <div class="col-md-2 col-sm-2">
                  <input type="file" onchange="readURL(this);" name="image" required class="form-control form-control-user">
                  <div>
                  <div class="col-md-2 col-sm-2">
                  <img id="blah" src="http://placehold.it/180" width="50px" height="50px" style="border-radius:100px" alt="your image" />
                  <div>
                  
            <div>
          </table>
          <div class="form-group row">
              <div class="col-md-4 col-sm-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              </form>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>
<script>
		var allowsubmit = false;
		$(function(){
			//on keypress 
			$('#confpass').keyup(function(e){
				//get values 
				var pass = $('#pass').val();
				var confpass = $(this).val();
				
				//check the strings
				if(pass == confpass){
					//if both are same remove the error and allow to submit
					$('.error').text('Alhamdulillah password cocok !');
					allowsubmit = true;
				}else{
					//if not matching show error and not allow to submit
					$('.error').text('Password tidak cocok bro');
					allowsubmit = false;
				}
			});
			
			//jquery form submit
			$('#form').submit(function(){
			
				var pass = $('#pass').val();
				var confpass = $('#confpass').val();

				//just to make sure once again during submit
				//if both are true then only allow submit
				if(pass == confpass){
					allowsubmit = true;
				}
				if(allowsubmit){
					return true;
				}else{
					return false;
				}
			});
		});
	</script>
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