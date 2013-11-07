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
          <li><a href="<?=base_url();?>index.php/principal">Principal</a></li>
          <li class="active"><a href="<?=base_url();?>index.php/nuevo/migrante">Nuevo migrante</a>
          <li><a href="<?=base_url();?>index.php/rutas">Rutas</a></li>
        </ul>
        <h3 class="text-muted">Proyecto migración</h3>
      </div>
	<hr>
        <div class="row">
        	<div class="col-lg-3">
        		<form role="form" action="<?=base_url();?>/index.php/nuevo/migrante" method="POST">
        			<div class="form-group">
					   	<label for="user">Usuario</label><br/>
					    <input class="form-control" type="text" id="user" name="usuario" autofocus/>
				  	</div>	
				  	<div class="form-group">
					   	<label for="pass">Contraseña</label><br/>
					    <input class="form-control" type="password" id="pass" name="pass"/>
				  	</div>
				  	<div class="form-group">
					   	<label for="pass2">Repetir contraseña</label><br/>
					    <input class="form-control" type="password" id="pass2" name="pass2"/>
				  	</div>	
				  	<div class="form-group">
				    	<label for="nacionalidad">Nacionalidad</label><br/>
				    	<select id="nacionalidad" class="form-control" name="nacionalidad">
				    		<?php foreach ($paises as $pais):?>
				    			<option value="<?=$pais->id_pais?>"><?=$pais->nombre?></option>
				    		<?php endforeach; ?>
					    </select>
					</div>
				  	<div class="form-group">
				    	<label for="edad">Edad</label><br/>
				    	<select id="edad" class="form-control" name="edad">
				    		<?php for ($i = 5; $i < 100; $i++):?>
				    			<option><?=$i?></option>
				    		<?php endfor;?>
				    	</select>
				  	</div>
				  	<div class="form-group">
				    	<label for="sexo">Sexo</label><br/>
				    	<select id="sexo" class="form-control" name="sexo">
				    		<option value="M">Masculino</option>
				    		<option value="F">Femenino</option>
				    	</select>
				  	</div>
				  	<button type="submit" class="btn btn-success">Registrar</button>
				</form>
        	</div>
        </div>
    </div>
</body>
</html>
