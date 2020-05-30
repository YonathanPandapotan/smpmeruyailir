@extends('maindashboard')

@section('kontentadmin')
<h1><?php echo $data['title'] ?></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Siswa</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-pencil"></span> <?php echo $data['title']; ?></a>
  </li>
</ol>
<div class="col-xs-12">
	<a href="/admin/siswa" class="btn btn-danger" style="margin-bottom: 15px"><span class="fa fa-arrow-left"></span> Kembali</a>
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
	<meta http-enquiv="refresh" content="1;url=<?php echo PATH; ?>?page=siswa">
 <?php } ?>
</div>
<div class="col-xs-7">
	<form method="post" enctype="multipart/form-data">
		@csrf <!-- {{ csrf_field() }} -->
		<div class="form-group">
			<label>No Peserta Siswa</label>
			<input type="text" name="noPeserta" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->noPeserta . "'"; ?>>
		</div>
		<div class="form-group">
			<label>NISN Siswa</label>
			<input type="text" name="nisn" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->nisn . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Nama Siswa</label>
			<input type="text" name="nama" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->namaPeserta . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempatLahir" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->tempatLahir . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input class="form-control" type="date" placeholder="Date" name="tanggalLahir" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->tanggalLahir . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Kelas</label>
			<input class="form-control" type="text" name="kelas" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->kelas . "'"; ?>>
		</div>
		<label>Nilai Siswa</label>
			<br>
		<div class="form-group">
			<label>Bahasa Indonesia</label>
			<input type="text" name="bin" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->bin . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Bahasa Inggris</label>
			<input type="text" name="ing" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->ing . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Matematika</label>
			<input type="text" name="mat" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->mat . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Ilmu Pengetahuan Alam (IPA)</label>
			<input type="text" name="ipa" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->ipa . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Jumlah Nilai</label>
			<input type="text" name="jumlahNilai" class="form-control" <?php if (isset($data['siswa'])) echo "value='" . $data['siswa']->jumlahNilai . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Status Lulus</label>
			<select name="statusLulus" id="inputKategori" class="form-control" required="required">
				<option value="Lulus" selected>Lulus</option>
				<option value="Tidak Lulus">Tidak Lulus</option>
			</select>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Upload Foto</label>
					<input type="file" name="images" id="" class="form-control" <?php if(isset($data['siswa'])) echo "value='" . $data['siswa']->gambarPeserta. "'" ;?>>
				</div>
			</div>
			<?php if(isset($data['siswa'])) {?>
			<div class="col-md-6">
				<img src="/images/siswa/{{$data['siswa']->gambarPeserta}}" width="100px" alt="<?php echo $data['siswa']->gambarPeserta; ?>">
			</div>
			<?php } else { ?>
				<img src="/images/no_user.jpg" width="100px">
			<?php } ?>
		</div>
		
		<div class="form-group">
			<label>Status Siswa</label>
			<select name="statusSiswa" id="inputKategori" class="form-control" required="required" <?php if(!isset($data['siswa'])) echo "readonly";?>>
				<option value="Siswa" selected>Siswa</option>
				<option value="Alumni">Alumni</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
@endsection