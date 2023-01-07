<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>
	<div class="container">
	<div class="card">
	<div class="card-header">
		Register
	</div>
		<div class="card-body">
		<?php
			if($this->session->flashdata('error') != ''){
				echo '<div class="alert alert-danger" role="alert">';
				echo $this->session->flashdata('error');
				echo '</div';
			}
		?>
			<form action="<?php echo base_url(); ?>register/sign_up" method="post">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" placeholder="Name">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
				
			</form>
		</div>
	</div>
	<div class="card-header">
		<p>Have an account?</p>
		<a class="btn btn-primary" href="<?php echo base_url();?>">Login</a>
	</div>
</div>
</body>
</html>
