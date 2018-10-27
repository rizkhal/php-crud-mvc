<div class="container">
	<div class="jumbotron">
		<form action="<?= BASEURL ?>/mahasiswa/update/<?= $data['mahasiswa']['id'] ?>" method="post">
		  <div class="form-group">
		    <label>Email address</label>
		    <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?= $data['mahasiswa']['email']; ?>">
		  </div>
		  <div class="form-group">
		    <label>name</label>
		    <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?= $data['mahasiswa']['name']; ?>">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>