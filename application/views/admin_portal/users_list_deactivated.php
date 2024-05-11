</div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

		<h1 class="page-header">Users List Deactivated</h1>
          <div class="row">
            <div class="col-xs-12">

			<?php
                            if( $this->session->flashdata('submit_success'))
                            {
                                ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $this->session->flashdata('submit_success'); ?>
                                </div>
                            <?php
                            }
                            ?>

				<table class="table table-bordered table-striped">
                
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
					<tbody>
						<tr>
                            <td>Caelum Ree</td>
                            <td>user1</td>
                            <td>Admin</td>
                            <td class="text-right">
                            <a href="#" onclick="return confirm('Are you sure want to reactivate this user?')" class="btn btn-xs btn-success">Reactivate</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Caelum Ree</td>
                            <td>user2</td>
                            <td>Admin</td>
                            <td class="text-right">
                            <a href="#" onclick="return confirm('Are you sure want to reactivate this user?')" class="btn btn-xs btn-success">Reactivate</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Caelum Ree</td>
                            <td>user3</td>
                            <td>Admin</td>
                            <td class="text-right">
                            <a href="#" onclick="return confirm('Are you sure want to reactivate this user?')" class="btn btn-xs btn-success">Reactivate</a>
                            </td>
                        </tr>

					</tbody>
				</table>

            </div>
          </div>
