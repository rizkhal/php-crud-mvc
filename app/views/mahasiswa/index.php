<div class="container">
	<div class="jumbotron mt-4">
		<h1 class="display-4"><?= $data['judul']; ?></h1>

		<a href="<?= BASEURL ?>/mahasiswa/create" class="btn btn-sm btn-primary">
			Tambah
		</a>

		<div class="table-responsive mt-5">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($data['mahasiswa'] as $key => $value): ?>
				    <tr>
				      <th scope="row"><?= ++$key; ?></th>
				      <td><?= $value['name']; ?></td>
				      <td><?= $value['email']; ?></td>
				      <td>
						<a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $value['id']; ?>" class="btn btn-xs btn-info">Edit</a>
						<form action="<?= BASEURL; ?>/mahasiswa/destroy/<?= $value['id'] ?>" method="post">
							<button class="btn btn-xs btn-danger">Delete</button>
						</form>
				      </td>
				    </tr>
			  	<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>