</div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

		<h1 class="page-header">Loan List</h1>
          <div class="row">
            <div class="col-xs-12">
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                      
                 <div>
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                
                <br>
                    <div>
                    <div>
                    <div>
				<table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <strong>
                            <th>User ID</th>
                
                            <th>GCASH Account</th>
                            <th>Referal No</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                            </strong>
                        </tr>
                    </thead>
					<tbody id="myTable">
                        <?php
                            if ( isset ($result) && !empty($result) )
                            {
                                foreach ($result as $key => $row)
                                {
                                    $id= $row->user_id;
                                    ?>
                                    <tr>
                            <td> <?php echo $row->user_id; ?></td>
                            
                            <td> <?php echo $row->gcash_name; ?></td>
                            <td><?php echo $row->ref_no;?></td>
                            <td><?php echo ($row->date_created); ?></td>
                            <td> <a href="#" class="btn btn-xs btn-warning"><?php echo ucfirst($row->status); ?></a></td>
                            <td class="text-right">
                            <a href="#" class="btn btn-xs btn-primary">Edit</a>
                            <a href="#" onclick="return confirm('Are you sure want to deactivate this user?')" class="btn btn-xs btn-danger">Deactivate</a>
                            </td>
                        </tr> 
                                    <?php

                                }
                            }
                        ?>
					</tbody>
				</table>

                
                <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

            </div>
          </div>

          
