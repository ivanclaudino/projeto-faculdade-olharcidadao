<?php include "usuarioheader.php" ?>
<div class="container">
<div class="row">
	<div class="col-sm-7">
	<div class="alert alert-danger" role="alert">
	</div>
	<?php }
	else{
		foreach ($publicacoes as $publicacao) {
		?>
		<center>
		<div class="card">
			<div class="card-block">
				<h4 class="card-title"><?php echo html_escape($publicacao->titulo);?></h4>
	<div class="col-sm-5">
		<div class="card">
			<div class="card-block">
			<h4 class="card-title"><center>Olá, <?php echo html_escape($_SESSION['usuario_nome']);?></center></h4><br />
		<div class="card">
			</div>
		</div><br />
	</div>
</div>
<?php include "footer.php"?>