@extends('maindashboard')

@section('kontentadmin')
<h1><?php echo $data['title'] ?></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Alumni</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-pencil"></span> <?php echo $data['title']; ?></a>
  </li>
</ol>
<div class="col-xs-12">
	<a href="/admin/alumni" class="btn btn-danger" style="margin-bottom: 15px"><span class="fa fa-arrow-left"></span> Kembali</a>
</div>
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
	<meta http-enquiv="refresh" content="1;url=<?php echo PATH; ?>?page=alumni">
 <?php } ?>
</div>
<div class="col-xs-7">
	<form method="post" enctype="multipart/form-data">
		@csrf <!-- {{ csrf_field() }} -->
		<div class="form-group">
			<label>Nama Alumni</label>
			<input type="text" name="namaPeserta" class="form-control" <?php if (isset($data['alumni'])) echo "value='" . $data['alumni']->namaPeserta . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Testimoni</label>
			<input type="text" name="pesanAlumni" class="form-control" <?php if (isset($data['alumni'])) echo "value='" . $data['alumni']->pesanAlumni . "'"; ?>>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Upload Foto</label>
					<input type="file" name="images" id="" class="form-control" <?php if(isset($data['alumni'])) echo "value='" . $data['alumni']->gambarPeserta. "'" ;?>>
				</div>
			</div>
			<?php if(isset($data['alumni']->gambarPeserta)) {?>
			<div class="col-md-6">
				<img src="/images/siswa/{{$data['alumni']->gambarPeserta}}" width="100px" alt="<?php echo $data['alumni']->gambarPeserta; ?>">
			</div>
			<?php } else { ?>
				<img src="/images/no_user.jpg" width="100px">
			<?php } ?>
		</div>	
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
@endsection