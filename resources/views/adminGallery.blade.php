@extends('maindashboard')

@section('kontentadmin')
<h1>Data Gallery</h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Gallery</a>
  </li>
</ol>
<a href="/admin/gallery/form" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-pencil"></span> Tambah Gallery</a>

<div class="col-lg-12">
	<table id="TableId" class="table table-responsive">
		<thead>
			<th>No</th>
			<th>Gambar</th>
			<th>Tanggal, Waktu Upload</th>
			<th>Deksripsi</th>
			<th>Uploader</th>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($data['gambar'] as $gambar) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td>
						<img src="/images/gallery/{{$gambar->idGambar}}" style="width: 50px; height: 50px" alt="">
					</td>
					<td><?php echo date('d-m-Y', strtotime($gambar->tanggalUpload)).', '.$gambar->waktuUpload?></td>
					<td><?php echo $gambar->deskripsi?></td>
					<td><?php echo $gambar->uploader ?></td>
					<td>
						<a href="/images/gallery/<?php echo $gambar->idGambar ?>" class="btn btn-info btn-detail" target="_">Lihat</a>
						<a href="/admin/gallery/delete/<?php echo $gambar->idGambar ?>" class="btn btn-danger btn-hapus">Hapus</a>
					</td>
				</tr>
			<?php 
				$no++;
			} ?>
		</tbody>
	</table>
</div>
@endsection