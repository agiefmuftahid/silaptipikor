<div class="col-lg-6">
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label class="control-label" for="inputWarning">Parameter</label>
<input type="text" class="form-control" value="<?= $parameter ?>">
</div>

<div class="form-group">
<label class="control-label" for="inputWarning">Nilai Setting</label>
<textarea cols="70" rows="10"><?= $nilai ?></textarea>
</div>


<div class="form-group">
<input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
<input type="submit" name="kirim" value="Batal" class="btn btn-danger">
</div>

</div>

</form>

</div>