@extends('maindashboard')

@section('kontentadmin')
<h1><?php echo $data['title']; ?></small></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Sejarah</a>
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
			<h3><i class="fa fa-file"></i> Sejarah Sekolah</h3>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="#!" class="close_link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form method="post" enctype="multipart/form-data">
				@csrf <!-- {{ csrf_field() }} -->
				<h3>Sejarah Sekolah bagian 1</h3>
				<textarea id="editor" name="sejarah1" style="height: 200px"><?php echo $data['sejarah']['sejarah1']; ?></textarea>
				<br>
				<label>Gambar Sejarah bagian 1</label>
				<input type="file" name="images1" class="form-control">
				<br>
				<h3>Sejarah Sekolah bagian 2</h3>
				<textarea id="editor1" name="sejarah2" style="height: 200px"><?php echo $data['sejarah']['sejarah2']; ?></textarea>
				<br>
				<label>Gambar Sejarah bagian 2</label>
				<input type="file" name="images2" class="form-control">
				<br>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
</div>
@endsection