<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class = "row">
                <div class = "cold-md-8">
                  <body>
<div class="inner cover">
  <h1 class="cover-heading">Payment Method</h1>

	<!---(go to config add $autoload[libaries] (session) Printout if data input in form is saved---->
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
    elseif( $this->session->flashdata('submit_error'))
    {
      ?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo $this->session->flashdata('submit_error'); ?>
	
</div>
<?php
    }
?>

<!--if empty validation errors -->

<?php 
	if(!empty(validation_errors()))
	{
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?php echo validation_errors();?>
		</div>
		<?php
	}
?>
  
<!-- Form -->
<?php echo form_open_multipart('visitor_portal/payment'); ?>
  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
    <div class="form-group">
    <div class="form-group">
      <label for="user_id" class="form-label">Account No.</label>
        <input type="text" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" readonly >
      </div>

      <label for="ref_no" class="form-label">Reference No.</label>
        <input type="number" class="form-control" name="ref_no" value="<?php echo set_value('ref_no'); ?>" readonly >
      </div>

      <div class="form-group">
      <label for="loan_type" class="form-label">Loan Type</label>
        <input type="text" class="form-control" name="loan_type" value="<?php echo set_value('loan_type'); ?>" >
      </div>
      
      <div class="form-group">
      <label for="amount" class="form-label">Amount to be Paid</label>
        <input type="text" class="form-control" name="amount" value="<?php echo set_value('amount'); ?>" >
      </div>
      <div class="panel-footer">
        <input type="submit" name="submit" value="Save" class="btn btn-warning btn-block btn-lg">
      </div>
</div>
    </div>
      </form>
    </div>
</div>
