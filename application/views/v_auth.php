<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>
	<div class="container">
	<div class="card">
	<div class="card-header">
		Login
	</div>
		<div class="card-body">	
			
			<?php
			if($this->session->flashdata('login_error') != ''){
				echo '<div class="alert alert-danger" role="alert">';
				echo $this->session->flashdata('login_error');
				echo '</div';
			}
			?>
			<form method="post" action="<?php echo base_url(); ?>auth/login" >	
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
	<div class="card-header">
		<p>Don't have account?</p>
		<a class="btn btn-primary" href="<?php echo base_url();?>register">Register</a>
	</div>
</div>
</body>
</html>
