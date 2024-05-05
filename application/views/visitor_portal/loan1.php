<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class = "row">
                <div class = "cold-md-8">
                <h1 class="cover-heading">BASIC LOAN Package</h1>  
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
<!-- Form -->
<?php echo form_open_multipart('visitor_portal/loan1', array ('onsubmit'=>'return confirm(\'Are you sure you want to save?\')')); ?>
  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
    <div class="form-group">
        <label> LOAN TYPE</label>
        <strong><input type="text" class="form-control" name="loan_type" value="BASIC" readonly></strong>
    </div>
    <div class="form-group">
        <label> ACCOUNT ID</label>
        <strong><input type="text" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" readonly></strong>
    </div>
    <div class="form-group">
        <label> First Name</label>
        <input type="text" class="form-control" name="fname" value="<?php echo set_value('fname', $profile->fname); ?>">
         </div>
         <div class="form-group">
        <label> Middle Name</label>
        <input type="text" class="form-control" name="mname" value="<?php echo set_value('mname', $profile->mname); ?>">
         </div>
         <div>
        <div class= "row">
        <div class="col-md-8"> <div class="form-group">
        <label> Last Name</label>
        <input type="text" class="form-control" name="lname" value="<?php echo set_value('lname',$profile->lname); ?>">
        </div>
    </div>
        <div class="col-md-4"> <div class="form-group">
        <label> Suffix Name</label>
        <input type="text" class="form-control" name="xname" value="<?php echo set_value('xname',$profile->xname); ?>">
         </div>
        </div>
</div>
    <div class= "row">
     <div class="col-md-3"><div class="form-group">
        <label> Amount</label>
        <strong><input type="double" class="form-control" name="amount" value="<?php echo '3000' ?>" readonly></strong>
     </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label> Interest</label>
        <input type="text" class="form-control" name="interest" value="<?php echo '1%' ?>" readonly>
      </div>
    </div>
    <div class="col-md-3"><div class="form-group">
        <label> Monthly Amount</label>
        <strong><input type="double" class="form-control" name="monthly_amount" value="<?php echo 3000 * 0.1 ?>" readonly></strong>
      </div>
    </div>
      <div class="col-md-3"><div class="form-group">
        <label> Months</label>
        <strong><input type="text" class="form-control" name="months" value="<?php echo '3' ?>" readonly></strong>
      </div>
    </div>
    </div>
  <div class="form-group">
    <label> SPECIFY YOUR GCASH NO. </label>
    <input type="text" class="form-control" name="contact_no" value="<?php echo set_value('contact_no'); ?>" placeholder="Example (09123456789)" required>
  </div>
  <div class="form-group">
    <label>YOUR GCASH NAME </label>
    <input type="text" class="form-control" name="gcash_name" value="<?php echo set_value('gcash_name'); ?>" placeholder="Example (09123456789)" required >
  </div>
  <div class="form-group">
    <label> Email Address</label>
    <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Example (@gmail)" required>
  </div>
</div>
<div class="panel-footer">
  <input type="submit" name="submit" value="Submit Application" class="btn btn-warning btn-block btn-lg">
</div>
      </form>
