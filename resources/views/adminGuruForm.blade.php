@extends('maindashboard')

@section('kontentadmin')
<h1><?php echo $data['title'] ?></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Guru</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-pencil"></span> <?php echo $data['title']; ?></a>
  </li>
</ol>
<div class="col-xs-12">
	<a href="/admin/guru" class="btn btn-danger" style="margin-bottom: 15px"><span class="fa fa-arrow-left"></span> Kembali</a>
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
 <?php } ?>
</div>
<div class="col-xs-7">
	<form method="post" enctype="multipart/form-data">
		@csrf <!-- {{ csrf_field() }} -->
		<div class="form-group">
			<label>Nama Guru</label>
			<input type="text" name="namaGuru" class="form-control" <?php if (isset($data['guru'])) echo "value='" . $data['guru']->namaGuru . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempatLahir" class="form-control" <?php if (isset($data['guru'])) echo "value='" . $data['guru']->tempatLahir . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input class="form-control" type="date" placeholder="Date" name="tanggalLahir" <?php if (isset($data['guru'])) echo "value='" . $data['guru']->tanggalLahir . "'"; ?>>
		</div>
		<div class="form-group">
			<label>NIP</label>
			<input type="text" name="nip" class="form-control" <?php if (isset($data['guru'])) echo "value='" . $data['guru']->nip . "'"; ?>>
		</div>
		<div class="form-group">
			<label>NUPTK</label>
			<input type="text" name="nuptk" class="form-control" <?php if (isset($data['guru'])) echo "value='" . $data['guru']->nuptk . "'"; ?>>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Upload Foto</label>
					<input type="file" name="images" id="" class="form-control" <?php if(isset($data['guru'])) echo "value='" . $data['guru']->gambarGuru. "'" ;?>>
				</div>
			</div>
			<?php if(isset($data['guru'])) {?>
			<div class="col-md-6">
				<img src="/images/guru/{{$data['guru']->gambarGuru}}" width="100px" alt="<?php echo $data['guru']->namaGuru; ?>">
			</div>
			<?php } else { ?>
				<img src="/images/no_user.jpg" width="100px">
			<?php } ?>
		</div>	
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
@endsection