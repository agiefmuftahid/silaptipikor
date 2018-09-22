<?php
ob_start();

function buka_form($link, $id, $aksi){
	echo'<form method="post" action="'.$link.'" class="form-horizontal" enctype="multipart/form-data">
			<input type="hidden" name="id" value="'.$id.'">
			<input type="hidden" name="aksi" value="'.$aksi.'">';
}

function buat_textbox($label, $nama, $nilai, $lebar='4', $tipe="text"){
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <input type="'.$tipe.'" class="form-control" name="'.$nama.'" value="'.$nilai.'" >
			</div>
		 </div>';
}

function buat_textarea($label, $nama, $nilai, $class=''){
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10">
			  <textarea class="form-control ckeditor" rows="8" name="'.$nama.'">'.$nilai.'</textarea>
			</div>
		 </div>';
}

function buat_combobox($label, $nama, $list, $nilai, $lebar='4'){
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <select class="form-control" name="'.$nama.'">';
		foreach($list as $ls){
			$select = $ls['val']==$nilai ? 'selected' : '';
			echo'<option value='.$ls['val'].' '.$select.'>'.$ls['cap'].'</option>';
		}
	echo'	  </select>
			</div>
		 </div>';
}

function buat_checkbox($label, $nama, $list){
	echo'<div class="form-group" id="'.$nama.'">
			<label class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10">';
		foreach($list as $ls){
			echo' <input type="checkbox" name="'.$nama.'[]" value="'.$ls['val'].'" '.$ls['check'].'> '.$ls['cap'];
		}
	echo'	</div>
		</div>';
}

function buat_radio($label, $nama, $list){
	echo'<div class="form-group" id="'.$nama.'">
			<label class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10">';
		foreach($list as $ls){
			echo'<label  for="'.$nama.$ls['val'].'" id="label_'.$nama.$ls['val'].'"> 
					<input type="radio" name="'.$nama.'" id="'.$nama.$ls['val'].'" value="'.$ls['val'].'" '.$ls['check'].'> '.$ls['cap'].' 
				</label>';
		}
	echo'	</div>
		</div>';
}


?>
	

<?php
	
function tutup_form($link,$name){
	echo'<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary" name="'.$name.'">
					<i class="glyphicon glyphicon-floppy-disk"></i> Simpan 
				</button>
				<a class="btn btn-warning" href="'.$link.'">
					<i class="glyphicon glyphicon-arrow-left"></i> Batal 
				</a>
			</div>
		</div>
	</form>';
}


function header_web(){

echo'<!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="asset-admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset-admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="asset-admin/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  
  <link rel="stylesheet" href="asset-admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="asset-admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="asset-admin/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="asset-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="asset-admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->';
}


function footer_web(){

echo'<script src="asset-admin/bootstrap/js/bootstrap.min.js"></script>';
}

function buat_alert($pesan){
 echo '<script>alert("'.$pesan.'");window.history.back();</script>';
}


?>
