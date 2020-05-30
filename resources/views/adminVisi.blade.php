@extends('maindashboard')

@section('kontentadmin')
<h1><?php echo $data['title']; ?></small></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Visi</a>
  </li>
</ol>
<div class="col-xs-12">
	<?php 
	if (isset($data['error']) && count($data['error']) > 0) {
 ?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<ul class="list-square">
			<?php foreach ($data['error'] as $error) { ?>
				<li><?php echo $error; ?></li>
			<?php } ?>
		</ul>
	</div>
 <?php } elseif (isset($data['success'])) { ?>
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?php echo $data['success']; ?>
	</div>
	<meta http-enquiv="refresh" content="1;url=<?php echo PATH; ?>?page=guru">
 <?php } ?>
</div>
<div class="col-lg-12">
	<div class="x_panel">
		<div class="x_title">
			<h3><i class="fa fa-file"></i> Visi Sekolah</h3>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="#!" class="close_link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form method="post" enctype="multipart/form-data">
				<h3>Visi Sekolah</h3>
				@csrf <!-- {{ csrf_field() }} -->
				<textarea id="editor" name="visi" style="height: 500px"><?php echo $data['visi']['visi']; ?></textarea>
				<br>	
				<label>Gambar Visi</label>
				<input type="file" name="images" class="form-control">
				<br>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
</div>
@endsection