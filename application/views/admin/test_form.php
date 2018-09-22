<script>
$(function(){
	function tampil_form(selektor){
		if($(selektor).val()=='home'){
			$('#isi').show();
			$('#isi_url').show();
		}else if($(selektor).val()=="baner"){
			$('#isi').hide();
			$('#isi_url').hide();
	}
	}
	tampil_form('#jenis select');
	
	$('#jenis select').change(function(){
		tampil_form(this);
	});
});

</script>
<?php 

buka_form('','','');
buat_textbox('Nama  ','nama',$nama,'5');
buat_textbox('Gambar','gambar','','5','file');

echo '<div class="form-group" id="jenis">
			<label for="jenis" class="col-sm-2 control-label">Jenis Tetimonial</label>
			<div class="col-sm-4">
			  <select class="form-control" name="jenis">
			  <option value="home">Home</option>
			  <option value="baner">Banner</option>
			  </select>
			</div>
		 </div>';
buat_textarea('Nilai Setingan','isi',$isi,'5');
buat_textbox('Nilai Setingan','isi_url',$isi,'5'); echo "** Masukan Url Contoh http://example.com";

tutup_form('','kirim');
