@extends('maindashboard')

@section('kontentadmin')

<script>
	function preview_images() 
	{
		var total_file=document.getElementById("images").files.length;
		for(var i=0;i<total_file;i++)
		{
		$('#image_preview').append("<div class='col-lg-4'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
		}
	}
</script>

<h1>Tambah Gallery</h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Gallery</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-pencil"></span>Tambah Gambar</a>
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
<div class="col-xs-7">
	<form method="post" enctype="multipart/form-data">
		@csrf <!-- {{ csrf_field() }} -->
		<div class="col-lg-8">
			<div class="form-group">
				<label>Gambar Gallery</label>
				<label>Deskripsi</label>
				<input type="text" name="deskripsi" class="form-control">
				<label>Upload Gambar</label>
				<input type="file" id="images" name="images[]" class="form-control" multiple="multiple" onchange="preview_images();">
			</div>
			<div class="row" id="image_preview" ></div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>
@endsection

@section('script')


@endsection