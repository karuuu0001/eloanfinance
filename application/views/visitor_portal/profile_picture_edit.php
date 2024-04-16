
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class = "row">
                <div class = "cold-md-8">
                    <h1 class="page-header">Profile Picture - Edit</h1>
                    <div class ="row">
                        <div class  = "col-xs-12">
                          

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
<?php echo form_open_multipart 
('visitor_portal/profile_information_edit', array ('onsubmit'=>'return confirm(\'Are you sure you want to save?\')'));
?><div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
      
    <div class="form-group">
       
      <div class="panel-footer">
        <input type="submit" name="submit" value="Save" class="btn btn-success btn-lg">
        <a class="btn btn-default btn-lg" href="<?php echo site_url('visitor_portal/personal_information'); ?>">Cancel</a>
      </div>
			<div>

            <!-- never forget this code for retrieving id - session it needs it to make a reference for your personal-info table which needs the usr_id -->
    <input type= "hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
      </form>

  </div>
            </div>
          </div>
