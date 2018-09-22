
<div class="col-lg-6">
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label" for="inputWarning">Judul </label>
<input type="text" class="form-control" id="inputWarning" name="judul" value="<?= $judul_t; ?>">
</div>

<div class="form-group">
<label class="control-label" for="inputWarning">Isi</label>
<textarea class="form-control" name="isi" rows="10" style="width: 770px; height: 170px;"><?= $isi ?></textarea>
</div>

<?php 
if ($aksi =="edit") {
	echo '<img src="'.base_url('/assets/gambar/slider/'.$gambar).'" style="width:200px;height:200px">';
}else{
	echo "";
}

?>
<div class="form-group">
<label class="control-label" for="inputWarning">Gambar </label>
<input type="file" class="form-control" name="gambar">
</div>

<div class="form-group">
<label class="control-label" for="inputWarning">Nama </label>
<input type="text" class="form-control" id="inputWarning" name="nama" value="<?= $nama; ?>">
</div>

<div class="form-group">
<input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
<input type="reset" value="Batal" class="btn btn-danger">
</div>

</div>


</form>
</div>
<br /><br /><br /><br /><br /><br />