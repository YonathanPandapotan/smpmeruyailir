@extends('maindashboard')

@section('kontentadmin')
<h1><?php echo $data['title']; ?></small></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Tentang</a>
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
			<h3><i class="fa fa-file"></i> Keterangan Sekolah</h3>
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
				<h3>Tentang Sekolah bagian 1</h3>
				<textarea id="editor" name="tentang1" style="height: 150px"><?php echo $data['tentang']['tentang1']; ?></textarea>
				<br>
				<label>Gambar tentang sekolah bagian 1</label>
				<input type="file" name="images1" class="form-control">
				<br>
				<h3>Tentang Sekolah bagian 2</h3>
				<textarea id="editor1" name="tentang2" style="height: 150px"><?php echo $data['tentang']['tentang2']; ?></textarea>
				<br>
				<label>Gambar tentang sekolah bagian 2</label>
				<input type="file" name="images2" class="form-control">
				<br>
				<h3>Tentang Sekolah bagian 3</h3>
				<textarea id="editor2" name="tentang3" style="height: 150px"><?php echo $data['tentang']['tentang3']; ?></textarea>
				<br>
				<label>Gambar tentang sekolah bagian 3</label>
				<input type="file" name="images3" class="form-control">
				<br>
				<h3>Tentang Sekolah bagian 4</h3>
				<textarea id="editor3" name="tentang4" style="height: 150px"><?php echo $data['tentang']['tentang4']; ?></textarea>
				<br>
				<label>Gambar tentang sekolah bagian 4</label>
				<input type="file" name="images4" class="form-control">
				<br>	
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
			<br>
			<h4>Hasil Data :</h4>
			<p style="border: 2px solid #f3f3f3"><?php echo $data['tentang']['tentang']; ?></p>
		</div>
	</div>
</div>
@endsection