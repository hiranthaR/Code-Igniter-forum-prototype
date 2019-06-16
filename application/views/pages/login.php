<div>
	<!--    simple form to logging from varies permission levels-->
	<form action="<?php echo base_url('auth/login') ?>" method="post" class="forms"
		  style="width: 300px;text-align: center;margin: 10px auto auto auto"
		  name="login-form">
		<br>
		<img src="<?php echo base_url() ?>assests/icons/user.png" style="width: 150px;color: white">
		<br><br><br>
		<input type="text" required name="username" class="form-input" placeholder="Username"
			   style="width: 250px"><br><br>
		<select name="role" id="role-selector" style="width: 250px"
				class="form-input">
			<option value="student" selected>Student</option>
			<option value="teacher">Teacher</option>
			<option value="moderator">Moderator</option>
		</select>
		<br><br><br>
		<input type="submit" value="Login" style="width: 250px" class="form-button">
		<br><br>
		<a href="#" class="help-link" onclick="showHelpText()">Need help? Click here</a>
	</form>

</div>
<div class="help-box" style="margin: 10px auto;width: 330px;" hidden id="help-box">
	<p id="help-text"></p>
</div>

<!--simple script for show hide help text box-->
<script>
	var visible = false;

	function showHelpText() {
		var help = "This is the login non-authenticating login.This just implemented for archive 3 levels of access for the app.Enter your name and choose a role for login in.thank you!";
		if (visible) {
			document.getElementById("help-text").innerHTML = "";
			document.getElementById("help-box").hidden = true;
			visible = false
		} else {
			document.getElementById("help-text").innerHTML = help;
			document.getElementById("help-box").hidden = false;
			visible = true;
		}
	}
</script>
