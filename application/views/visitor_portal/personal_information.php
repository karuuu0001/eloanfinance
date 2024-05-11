
</div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<a class="pull-right btn-success btn btn-lg" href = "<?php echo site_url('visitor_portal/personal_information_edit'); ?>">Edit
		<span class = "glyphicon glyphicon-pencil" aria-hidden="true"></span>
		</a> 
		<h1 class="page-header">Personal Information</h1>

<!-- dd($profile); is reference to profile_helper in helpers/profile_helper -->


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

				<table class="table">
					<tbody>
            <tr>
              <th style="width: 150px;"> <span style="font-size: 20px;">Full Name: </span> </th>
              <td>
                <span style="font-size: 20px;">
                  <?php echo create_fullname( $profile->fname, $profile->mname, $profile->lname, $profile->xname ); ?>
                </span> 
              </td>
            </tr>					
						<tr><th> Date of Birth:</th><td><?php echo $profile->personal_information->dob; ?></td></tr>
						<tr><th> Place of Birth:</th><td><?php echo $profile->personal_information->pob; ?></td></tr>
						<tr><th> Gender:</th><td><?php echo $profile->personal_information->gender; ?></td></tr>
						<tr><th> Civil Status:</th><td><?php echo $profile->personal_information->cstatus; ?></td></tr>
						<tr><th style="width: 150px;"> Email:</th><td><?php echo $profile->personal_information->email; ?></td></tr>
						<tr><th style="width: 150px;"> Contact Number:</th><td><?php echo $profile->personal_information->contact_no; ?></td></tr>
					</tbody>
				</table>

            </div>
          </div>
