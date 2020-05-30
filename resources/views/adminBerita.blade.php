@extends('maindashboard')

@section('kontentadmin')
<h1>Data <small>Berita</small></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Berita</a>
  </li>
</ol>
<a href="/admin/berita/form/" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-pencil"></span> Tambah Berita</a>

<div class="col-lg-12">
	<table id="TableId" class="table table-responsive">
		<thead>
			<th>No</th>
			<th>Tanggal</th>
			<th>Gambar</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Isi</th>
			<th>Actions</th>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($data['berita'] as $berita) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td>{{ date('d-m-Y', strtotime($berita->tanggalBerita)) }}</td>
					<td>
					<?php if($berita->gambar) { ?> 
						<img src="/images/berita/{{$berita->gambar}}" style="width: 50px" alt="<?php echo $berita->judul; ?>">
					<?php } else { ?>
						<img src="/images/berita/noimage.jpg" style="width: 50px" alt="<?php echo $berita->judul; ?>">
					<?php } ?>
					</td>
					<td><?php echo $berita->judulBerita; ?></td>
					<td><?php echo $berita->pembuatBerita; ?></td>
					<td><?php echo substr(strip_tags($berita->isiBerita), 0, 100); ?></td>
					<td>
						<a href="/admin/berita/form/<?php echo $berita->idBerita; ?>" class="btn btn-warning">Edit</a>
						<a href="/admin/berita/delete/<?php echo $berita->idBerita; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
					</td>
				</tr>
			<?php 
				$no++;
			} ?>
		</tbody>
	</table>
</div>
@endsection