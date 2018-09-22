<?php 

buka_form('','','');
buat_textbox('Username','username',$username,'5');
buat_textbox('Nama','nama',$nama,'5');
buat_textbox('Password','password','','5');
buat_textbox('Ulangi Password','password_u','','5');

echo '<div class="form-group" id="level">
			<label for="level" class="col-sm-2 control-label">Level Akses</label>
			<div class="col-sm-4">
			  <select class="form-control" name="level">
			  <option value="admin">Administrator</option><option value="user">User</option>	  </select>
			</div>
		 </div>';

tutup_form(base_url('admin/user'),'kirim');
