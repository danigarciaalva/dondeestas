<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Migraciones</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<link type="text/css" href="<?=base_url();?>/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="<?)base_url();?>index.php/principal">Principal</a></li>
          <li><a href="<?=base_url();?>index.php/nuevo/migrante">Nuevo migrante</a>
          <li><a href="<?=base_url();?>index.php/rutas">Rutas</a></li>
        </ul>
        <h3 class="text-muted">Proyecto migración</h3>
      </div>
	<hr/>
        <div class="row">
        	<div class="col-lg-3">
        		<form role="form" action="<?=base_url();?>/index.php/principal" method="POST">
        			<h3 class="text-center">Agregar nueva visita</h3>
        			<hr/>
        			<div class="form-group">
					   	<label for="user">Usuario</label><br/>
					    <input class="form-control" type="text" id="user" name="user" autofocus/>
				  	</div>	
				  	<div class="form-group">
					   	<label for="pass">Contraseña</label><br/>
					    <input class="form-control" type="password" id="pass" name="pass"/>
				  	</div>
				  	<div class="form-group">
					   	<label for="abuso">¿Hugo algún tipo de abuso?</label><br/>
					    <select class="form-control" id="abuso" name="abuso">
					    	<?php foreach ($abusos as $abuso):?>
					    		<option value="<?=$abuso->id_abuso?>"><?=$abuso->tipo_abuso?></option>
					    	<?php endforeach; ?>
					    </select>
				  	</div>
				  	<div class="form-group">
					   	<label for="comentario">Comentario y/o descripción del abuso</label><br/>
					    <textarea class="form-control" type="textarea" id="comentario" rows="5" name="comentario"></textarea>
				  	</div>
				  	<div class="form-group">
				  		<button class="btn btn-danger">Limpiar</button>
				  		<button type="submit" class="btn btn-success">Aceptar</button>
				  	</div>
				</form>
        	</div>
        	<div class="col-lg-6">
        		<h3 class="text-center">Últimas visitas</h3>
        		<hr/>
		      	<div class="form-group">
		        	<input type="text" class="form-control" placeholder="Buscar usuario">
		      	</div>
        	</div>
        	<div class="col-lg-3">
        		<a href="#" class="thumbnail">
			      	<img src="<?=base_url();?>/img/albergue.jpg"/>
			    </a>
			    <strong>Albergue: </strong><?=$albergue->nombre?><br/><br/>
			    <strong>Dirección: </strong><?=$albergue->calle?>  <?=$albergue->colonia?><br/><br/>
			    <strong>Correo electrónico: </strong><?=$albergue->email?><br/><br/>
			    <strong>Teléfono: </strong><?=$albergue->telefono?><br/><br/>
        	</div>
        </div>
    </div>
    <div class="footer">
    	<hr/>
    	<p class="text-center">Desarrollado por:<br/>
    		Daniel García Alvarado - <a href="http://www.twitter.com/houseckleiin" target="_blank">@houseckleiin</a><br/>
    		Joel Humberto Gómez Paredes - <a href="http://www.twitter.com/dezkareid">@dezkareid</a>
    	</p>
    </div>
</body>
</html>
