
<div class="col-lg-6">
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label class="control-label" for="inputWarning">Judul Dari Video</label>
<input type="text" class="form-control" id="inputWarning" name="nama" value="<?= $nama; ?>">
</div>

<div class="form-group">
<label class="control-label" for="inputWarning">Video Url Dari Youtube</label>
<input type="text" class="form-control" id="inputWarning" name="url" value="<?= $url; ?>">
</div>

<div class="form-group">
<input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
<input type="reset" value="Batal" class="btn btn-danger">
</div>

</div>
</form>
</div>
<br /><br /><br /><br /><br /><br />