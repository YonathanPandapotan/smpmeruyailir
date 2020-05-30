@extends('maindashboard')

@section('kontentadmin')
<h1>Tambah <small>Berita</small></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Berita</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-pencil"></span>Tambah Berita</a>
  </li>
</ol>
<div class="col-xs-12">
	<a href="/admin/berita" class="btn btn-danger" style="margin-bottom: 15px"><span class="fa fa-arrow-left"></span> Kembali</a>
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
	<meta http-enquiv="refresh" content="1;url=<?php echo PATH; ?>?page=berita">
 <?php } ?>
</div>
<div class="col-lg-12">
	<form method="post" enctype="multipart/form-data">
		@csrf <!-- {{ csrf_field() }} -->
		<div class="form-group">
			<label>Judul Berita</label> 
			<input type="text" name="judulBerita" class="form-control" <?php if (isset($data['berita'])) echo "value='" . $data['berita']->judulBerita . "'"; ?>>
		</div>

		<div class="form-group">
			<label>Penulis Berita</label>
			<input type="text" name="pembuatBerita" class="form-control" <?php if (isset($data['berita'])) echo "value='" . $data['berita']->pembuatBerita . "'"; else echo "value='" . $login['username'] . "'"; ?>>
		</div>
		<div class="row">
		<div class="col-lg-8">
			<div class="form-group">
				<label>Gambar Berita</label>
				<input type="file" name="images" class="form-control">
			</div>
		</div>
		<?php if (isset($data['berita'])) {
				if ($data['berita']->gambar) {	 ?>
			<div class="col-lg-4">
				<img src="/images/berita/{{$data['berita']->gambar}}" alt="images" style="width: 100px;max-width: 200px;">
			</div>
		<?php 
				} 
			 }
			?>
		</div>	
		<div class="form-group">
			<label>Isi Berita</label>
			<textarea class="form-control" name="isiBerita" id="editor" style="height: 500px"><?php if (isset($data['berita'])) echo  $data['berita']->isiBerita; ?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
@endsection