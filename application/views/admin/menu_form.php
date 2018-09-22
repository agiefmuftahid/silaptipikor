<script>
	
$(function(){
	function tampil_form(selektor){
		if($(selektor).val()=='halaman'){
			$('#link_halaman').show();
			$('#link_kategori, #link_url').hide();
		}else if($(selektor).val()=="kategori"){
			$('#link_kategori').show();
			$('#link_halaman, #link_url').hide()
		}else if($(selektor).val()=="url"){
			$('#link_url').show();
			$('#link_halaman, #link_kategori').hide();
		}
	}
	
	tampil_form('#jenis_link select');
	
	$('#jenis_link select').change(function(){
		tampil_form(this);
	});
});

</script>

<h4 class="page-header"><b>Tambah Menu</b> </h4>

<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			<input type="hidden" name="id" value="">
			<input type="hidden" name="kategori" >
			<div class="form-group" id="judul">
			<label for="judul" class="col-sm-2 control-label">Judul Menu</label>
			<div class="col-sm-4">
			  <input type="text" class="form-control" name="judul" value="<?php echo $judul_menu_web; ?>" >
			</div>
		 </div>

		 <div class="form-group" id="induk">
			<label for="induk" class="col-sm-2 control-label">Induk Menu</label>
			<div class="col-sm-4">
			  <select class="form-control" name="induk">
			  <option value=0 >Kosong</option>
			  
			  <?php $no=1; 
			    foreach($ciyus->result() as $xa):?>
			  <option value="<?php echo $xa->id_menu; ?>" >
			  <?php echo ucfirst($xa->judul); ?></option>
			  <?php $no++; endforeach; ?> 
			  </select>
			</div>
		 </div>

		 <div class="form-group" id="jenis_link">
			<label for="jenis_link" class="col-sm-2 control-label">Jenis Link</label>
			<div class="col-sm-4">
			  <select class="form-control" name="jenis_link">
			  <option value=halaman >Halaman</option>
			  <option value=kategori >Kategori</option>
			  <option value=url >URL</option>	  
			  </select>
			</div>
		 </div>

		 <div class="form-group" id="link_halaman">
			<label for="link_halaman" class="col-sm-2 control-label">Link Halaman</label>
			<div class="col-sm-4">
			  <select class="form-control" name="link_halaman" required>
			  <?php $no=1; foreach($halaman->result() as $hal): ?> 
			  <option value="<?php echo $hal->id_halaman; ?>"><?php echo ucfirst($hal->judul); ?></option> 
			  <?php $no++; endforeach; ?> 
			  </select>
			</div>
		 </div>

		 <div class="form-group" id="link_kategori">
			<label for="link_kategori" class="col-sm-2 control-label">Link Kategori</label>
			<div class="col-sm-4">
			  <select class="form-control" name="link_kategori">
			  <?php $no=1; foreach($kategori->result() as $kat): ?> 
			  <option value="<?php echo $kat->id_kategori; ?>"><?php echo ucfirst($kat->kategori); ?></option> 
			  <?php $no++; endforeach; ?> 

			  </select>
			</div>
		 </div>

		 <div class="form-group" id="link_url">
			<label for="link_url" class="col-sm-2 control-label">Link URL</label>
			<div class="col-sm-4">
			  <input type="text" class="form-control" name="link_url" value="">
			</div>
		 </div>

		 <div class="form-group" id="urut">
			<label for="urut" class="col-sm-2 control-label">Urutan</label>
			<div class="col-sm-4">
			  <select class="form-control" name="urut">
			  <?php 
              $b=21;
			  for($i=1; $i <= $b ; $i++) { 
			  echo '<option value="'.$i.'" >'.$i.'</option>';
			  } ?>
			
			  </select>
			</div>
		 </div>

		 <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary" name="kirim">
					<i class="glyphicon glyphicon-floppy-disk"></i> Simpan 
				</button>
				<a class="btn btn-warning" href="<?php echo base_url('admin/menu_website'); ?>">
					<i class="glyphicon glyphicon-arrow-left"></i> Batal 
				</a>
			</div>
		</div>
	</form> 