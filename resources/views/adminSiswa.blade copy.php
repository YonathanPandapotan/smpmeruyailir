@extends('maindashboard')

@section('kontentadmin')
<h1>Data <small>Siswa</small></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Siswa</a>
  </li>
</ol>
<a href="/admin/siswa/form" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-pencil"></span> Tambah Siswa</a>

<div class="col-lg-12">
	<table id="TableId" class="table table-responsive">
		<thead>
			<th>No</th>
			<th>Foto</th>
			<th>NISN</th>
			<th>Nama</th>
			<th>Tempat, Tanggal Lahir</th>
			<th>Nilai Total</th>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($data['siswa'] as $siswa) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td>
						<?php if($siswa->gambarPeserta) { ?> 
						<img src="/images/siswa/{{$siswa->gambarPeserta}}" style="width: 50px;height: 50px" alt="<?php echo $siswa->judul; ?>">
					<?php } else { ?>
						<img src="/images/no_user.jpg" style="width: 50px;height: 50px">
					<?php } ?>
					</td>
					<td><?php echo $siswa->nisn; ?></td>
					<td><?php echo $siswa->namaPeserta; ?></td>
					<td><?php echo $siswa->tempatLahir.', '.date('d-m-Y', strtotime($siswa->tanggalLahir)); ?></td>
					<td><?php echo $siswa->jumlahNilai; ?></td>
					<td>
						<a href="/admin/siswa/form/<?php echo $siswa->idSiswa; ?>" class="btn btn-warning">Edit</a>
						<a href="/admin/siswa/detail/<?php echo $siswa->idSiswa; ?>" class="btn btn-info">Detail</a>
						<a href="/admin/siswa/hapus/<?php echo $siswa->idSiswa; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
					</td>
				</tr>
			<?php 
				$no++;
			} ?>
		</tbody>
	</table>
</div>
@endsection