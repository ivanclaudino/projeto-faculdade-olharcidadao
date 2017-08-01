<?php	defined('BASEPATH') OR exit('No direct script access allowed');	date_default_timezone_set('America/Campo_Grande');
?>
<html lang="pt-BR">
<head>	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	<meta http-equiv="X-UA-Compatible" content="IE=edge">	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	<link rel="icon" href="http://upload.dinhosting.fr/t/X/F/favicon.ico">	<title>Olhar Cidadão</title>	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">	<link href="https://fonts.googleapis.com/css?family=Average+Sans" rel="stylesheet">	<link rel="stylesheet" href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css">	<link rel="stylesheet" href="http://localhost/olharcidadao/css/estilo.css">	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>	<script src="https://apis.google.com/js/api:client.js"></script></head><br /><body>
<div class="container">
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color: #ECEEEF;">		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">			<span class="navbar-toggler-icon"></span>		</button>		<a class="navbar-brand" href="http://localhost/olharcidadao/">			<img src="http://localhost/olharcidadao/imagens/icon.png" width="30" height="200" class="d-inline-block align-top" alt="">&ensp; OLHAR CIDADÃO &ensp;&ensp;&ensp;&ensp;		</a>		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav mr-auto mt-2 mt-md-0">			<?php if(!isset($_SESSION['usuario_nome']))			{?>			<li class="nav-item"><a class="nav-link" href="http://localhost/olharcidadao/"><b>Início</b></a></li>			<?php } else {?>			<li class="nav-item"><a class="nav-link" href="http://localhost/olharcidadao/"><b>Início</b></a></li>			<li class="nav-item"><a class="nav-link" href="http://localhost/olharcidadao/painel"><b>Minhas Publicações</b></a></li>			<?php }?>			<li class="nav-item"><a class="nav-link" href="http://localhost/olharcidadao/sair"><b>Sair</b></a></li>			</ul>		</div>	</nav><br></div><?php$usuario_nome = $this->session->userdata('usuario_nome');?><div class="container">
<div class="row">
	<div class="col-sm-7">
	<?php if (isset($results)) {
		if($results=='Nenhuma publicação cadastrada!')		{ ?>
		<div class="alert alert-danger" role="alert">		<center> Atenção!   <?php echo $results; ?></center>		</div>		<?php }		else{		foreach ($results as $value) {		?>	<center>	<div class="card">	<div class="card-block">	<h4 class="card-title"><?php echo $value->titulo;?></h4>	<h6 class="card-subtitle text-muted"><strong><?php echo date('d/m/Y', strtotime( $value->curr_time));?></strong></h6>	<center><br /><img src="<?php echo base_url().$value->foto; ?>"/></center><br />	<div align="center"><a href="http://localhost/olharcidadao/inicio/publicacao/<?php echo $value->id ?>" class="btn btn-success btn-lg btn-block">Ver Publicação &raquo;</a></div>	</div>	</div><br />	</center>	<?php }}}?>	</div>
	<div class="col-sm-5">
		<div class="card">
			<div class="card-block">
			<h4 class="card-title"><center>Olá, <?php echo $_SESSION['usuario_nome'];?></center></h4><br />			<div align="center"><a href="http://localhost/olharcidadao/publicar/<?php echo $usuario_nome ?>" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Nova Publicação</a></div><br />			<div align="center"><a href="http://localhost/olharcidadao/painel" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Painel</a></div><br />			<div align="center"><a href="https://docs.google.com/forms/d/e/1FAIpQLSeYk6Plp9-WSdB9l5xJpbb1vg5XRvhLGQ8ImQl-ZGpRV78pqw/viewform" target="_blank" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;&nbsp;Avaliar Sistema</a></div><br />			<div align="center"><a href="http://localhost/olharcidadao/sair" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Sair</a></div>			</div>		</div><br />
		<div class="card">
			<div class="card-block">
			<form action="http://localhost/olharcidadao/buscar/usuario" method="post">			<input class="form-control" id="keyword" name="keyword" type="text" placeholder="Palavras-chave..." required=""><br>			<button class="btn btn-primary btn-block btn-lg" type="submit">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>			</form>			</div>		</div><br />	</div></div>
</div>
<?php include "footer.php"?>
