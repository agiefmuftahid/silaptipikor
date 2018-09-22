<?= $not ?>
<?= $id ?>

<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
     <div class="form-group" id="judul">
			<label for="judul" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-5">
			  <input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata('username'); ?>" >
			</div>
			</div>

    <div class="form-group" id="judul">
			<label for="judul" class="col-sm-2 control-label">Ulangi Password</label>
			<div class="col-sm-5">
			  <input type="text" class="form-control" name="password" value="" >
			</div>
			</div>
   
			
      <div class="form-group" id="judul">
			<label for="judul" class="col-sm-2 control-label">Ulangi Password</label>
			<div class="col-sm-5">
			  <input type="text" class="form-control" name="password_u" value="" >
			</div>
			</div>
        <div class="form-group" id="judul">
			<label for="judul" class="col-sm-2 control-label">Nama</label>
			<div class="col-sm-5">
			  <input type="text" class="form-control" name="nama" value="" >
			</div>
			</div>


			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary" name="kirim">
					<i class="glyphicon glyphicon-floppy-disk"></i> Simpan 
				</button>
				<a class="btn btn-warning" href="">
					<i class="glyphicon glyphicon-arrow-left"></i> Batal 
				</a>
			</div>
		</div>



