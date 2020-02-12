<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3 bg-primary">
    <h6 class="m-0 font-weight-bold text-white">Data Akun</h6>
  </div>
      <table class="table table-striped w-100 dt-responsive nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Password</th>
            <th>Update</th>
          </tr>
	  </thead>
	  <tbody>
	  <?php 
	  $no=1; 
	  foreach ($profile as $b ) : ?>		  
			<tr>
				<th> <?= $no++; ?> </th>
				<td> <?= $b['nama']; ?> </td>
				<td> <?= $b['password']; ?> </td>
				<td>
        <a href="<?php echo base_url('user/userDelete/');
                            echo $b['id']; ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
        </td>
			</tr>
		  <?php endforeach; ?>
		</tbody>
      </table>

</div>
</div>
    </div>
