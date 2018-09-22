
<div class="col-lg-6">
<?= $notifikasi ?>
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label class="control-label" for="inputWarning">Username</label>
<input type="text" class="form-control" id="inputWarning" name="username" value="<?= $username; ?>">
</div>

<div class="form-group">
<label class="control-label" for="inputWarning">Password</label>
<input type="text" class="form-control" id="inputWarning" name="password" value="">
</div>

<div class="form-group">
<label class="control-label" for="inputWarning">Username</label>
<input type="text" class="form-control" id="inputWarning" name="passwordu" value="">
</div>

<div class="form-group">
<label class="control-label" for="inputWarning">Nama</label>
<input type="text" class="form-control" id="inputWarning" name="nama" value="<?= $nama; ?>">
</div>


<div class="form-group">
<input type="submit" name="edit" value="Kirim" class="btn btn-primary">
<input type="reset" value="Batal" class="btn btn-danger">
</div>

</div>
</form>
</div>
<br /><br /><br /><br /><br /><br />