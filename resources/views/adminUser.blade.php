@extends('maindashboard')

@section('kontentadmin')
<h1>Data User</h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-users"></span> User</a>
  </li>
</ol>
<a href="/admin/user/form" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-pencil"></span> Tambah User</a>

<div class="col-lg-12">
	<table id="TableId" class="table table-responsive">
		<thead>
			<th>No</th>
			<th>Email</th>
			<th>Username</th>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($data['user'] as $user) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->username; ?></td>
					<td>
						<a href="/admin/user/form/<?php echo $user->idUser; ?>" class="btn btn-warning">Edit</a>
						<a href="/admin/user/hapus/<?php echo $user->idUser; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
					</td>
				</tr>
			<?php 
				$no++;
			} ?>
		</tbody>
	</table>
</div>
@endsection