<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="margin-left: 20%">
	<?php foreach ($post->result() as $key => $value){ ?>
		<div class="container">
			<div style="margin-top:10px" class="card">
				<div class="card">
					<div class="card-header">
						<?=$value->user_name?>
					</div>
					<?php if($value->image != null){
						echo "<div class='card-body''>";
						echo $value->image;
						echo "</div>";
					}?>
					<div class="card-body">
						<?=$value->text?>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="act">
							<a href="#">Like</a> <?=$value->likes?>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="card-header">
							<a style="color: #007bff;text-decoration: none;">Comments</a>
						</div>
					</div>
					<?php foreach($comment->result() as $key => $value) { ?>
						<div class="card-body">
								<a style="color: #007bff;text-decoration: none;"><?=$value->name?>:</a>
								<?=$value->text?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</body>
</html>
