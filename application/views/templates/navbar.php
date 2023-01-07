<header>
	<h1>Login berhasil!</h1>
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url(); ?>">Logout</a>
	<?php echo $this->session->userdata('id_user');?>
	<hgroup>
		<h1>Judul</h1>
	</hgroup>
</header>
