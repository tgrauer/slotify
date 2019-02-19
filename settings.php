<?php 
	
	include 'includes/includes.php';

?>

<div class="entity_info">
	<div class="col-sm-4 col-sm-offset-4">
		<div class="userinfo">
			<h1><?php echo $userLoggedIn->get_users_name(); ?></h1>
		</div>
	</div>

	<div class="col-sm-12 settings">

		<?php 
			if(isset($_POST['update_email'])){
				echo 'test';
				echo $_POST['email'];
			}
		 ?>
		<h2>Email</h2>
		<div class="col-sm-6 col-sm-offset-3">
			<div class="form-group">
				<input type="text" class="settings_input email" value="<?php echo $userLoggedIn->get_email()?>" name="email" autocomplete="off">
				<span class="message danger"></span>
			</div>

			<button class="bdr_btn" onclick="update_email('email')">Save</button>
		</div>
	</div>

	<div class="col-sm-12 settings">
		<h2>Password</h2>
		<div class="col-sm-6 col-sm-offset-3">
			<div class="form-group">
				<input type="password" class="settings_input cur_pw" name="cur_pw" autocomplete="off" placeholder="Current Password">
			</div>

			<div class="form-group">
				<input type="password" class="settings_input new_pw" name="new_pw" autocomplete="off" placeholder="New Password">
			</div>

			<div class="form-group">
				<input type="password" class="settings_input confirm_pw" name="confirm_pw" autocomplete="off" placeholder="Confirm Password">
			</div>

			<button class="bdr_btn" onclick="update_pw('cur_pw','new_pw','confirm_pw')">Save</button>
			<span class="message danger"></span>
		</div>
	</div>
</div>