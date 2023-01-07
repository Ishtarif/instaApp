<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>
	<div style="margin-left: 20%">
		<div class="container">
			<div class="card">
				<div class="card-header">
					Create a New Post
				</div>
				<div class="card-body">	
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Photo</label>
							<p class="text-muted mb-0">JPG, GIF or PNG File. Max 1MB</p>
							<input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg, image/gif">
						</div>
						<div class='form-group'>
							<label>Post</label>
							<textarea type='text' class='form-control' placeholder='Type something...' name='text'></textarea>
						</div>
						<button type='submit' class='btn btn-primary'>Post</button>
						<a href='<?php echo base_url()?>dashboard' class='btn btn-danger'>Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
