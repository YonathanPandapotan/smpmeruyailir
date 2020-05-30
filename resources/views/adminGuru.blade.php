@extends('maindashboard')

@section('kontentadmin')
<h1>Data <small>Guru</small></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Guru</a>
  </li>
</ol>
<a href="/admin/guru/form" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-pencil"></span> Tambah Guru</a>

<div class="col-lg-12">
	<table id="TableId" class="table table-responsive">
		<thead>
			<th>No</th>
			<th>Foto</th>
			<th>Nama</th>
			<th>Tempat, Tanggal Lahir</th>
			<th>NIP</th>
			<th>NUPTK</th>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($data['guru'] as $guru) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td>
						<?php if($guru->gambarGuru) { ?> 
						<img src="/images/guru/{{$guru->gambarGuru}}" style="width: 50px;height: 50px" alt="<?php echo $guru->judul; ?>">
					<?php } else { ?>
						<img src="/images/no_user.jpg" style="width: 50px;height: 50px">
					<?php } ?>
					</td>
					<td><?php echo $guru->namaGuru; ?></td>
					<td><?php echo $guru->tempatLahir.', '.date('d-m-Y', strtotime($guru->tanggalLahir)); ?></td>
					<td><?php echo $guru->nip; ?></td>
					<td><?php echo $guru->nuptk; ?></td>
					<td>
						<a href="/admin/guru/form/<?php echo $guru->idGuru; ?>" class="btn btn-warning">Edit</a>
						<a href="/admin/guru/hapus/<?php echo $guru->idGuru; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
					</td>
				</tr>
			<?php 
				$no++;
			} ?>
		</tbody>
	</table>
</div>
@endsection