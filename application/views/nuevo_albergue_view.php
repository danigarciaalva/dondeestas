<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Migraciones</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link type="text/css" href="<?=base_url();?>/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <h2>Proyecto Migración</h2>
	<hr>
        <div class="row">
        	<form role="form" method="POST" action="<?=base_url();?>/index.php/nuevo/albergue">
        	<div class="col-lg-4">
    			<h4>Datos del albergue</h4>
    			<div class="form-group">
				   	<label for="nombre">Nombre</label><br/>
				    <input class="form-control" type="text" id="nombre" name="nombre" required autofocus/>
			  	</div>	
			  	<div class="form-group">
				   	<label for="dir">Dirección</label><br/>
				    <input class="form-control" type="text" id="dir" name="dir" required/>
			  	</div>
			  	<div class="form-group">
				   	<label for="col">Colonia</label><br/>
				    <input class="form-control" type="text" id="col" name="dir" required/>
			  	</div>	
			  	<div class="form-group">
			    	<label for="estado">Estado</label><br/>
			    	<select id="estado" class="form-control" name="estado" required>
			    		<?php foreach ($estados as $e):?>
			    			<option value="<?=$e->id_estados?>"><?=$e->nombre?></option>
			    		<?php endforeach; ?>
				    </select>
				</div>
				<div class="form-group">
			    	<label for="municipio">Municipio</label><br/>
			    	<select id="municipio" class="form-control" name="municipio" required>
				    </select>
				</div>
				<div class="form-group">
			    	<label for="localidad">Localidad</label><br/>
			    	<select id="localidad" class="form-control" name="localidad" required>
				    </select>
				</div>
				<div class="form-group">
				   	<label for="email">Correo electrónico</label><br/>
				    <input class="form-control" type="email" id="email" name="email" required/>
			  	</div>	
			  	<div class="form-group">
				   	<label for="tel">Teléfono</label><br/>
				    <input class="form-control" type="tel" id="tel" name="tel" required/>
			  	</div>	
        	</div>
        	<div class="col-lg-4">
        		<h4>Datos del encargado</h4>
        		<div class="form-group">
				   	<label for="user">Usuario</label><br/>
				    <input class="form-control" type="text" id="user" name="user" required/>
			  	</div>
			  	<div class="form-group">
				   	<label for="pass">Contraseña</label><br/>
				    <input class="form-control" type="password" id="pass" name="pass" required/>
			  	</div>	
			  	<div class="form-group">
				   	<label for="pass2">Repetir contraseña</label><br/>
				    <input class="form-control" type="password" id="pass2" name="pass2" required/>
			  	</div>	
        		<button type="submit" class="btn btn-success btn-lg pull-right">Registrar albergue</button>
        	</div>
			</form>
        </div>
    </div>
    <script type="text/javascript" src="<?=base_url();?>/js/jquery.js"></script>
    <script type="text/javascript">
    	$(document).on('ready', function()
    	{
    		var base_url = "http://localhost/web/migracion"
    		$('#estado').on('change', function()
    		{
    			$.ajax({
    				"url": base_url + "/index.php/ajax/getMunicipiosByState",
    				"type" : "POST",
    				"data" : {
    					"id_estado" : $('#estado option:selected').attr('value')
    				},
    				"success" : function(data){
    					$('#municipio').find('option').remove();
    					for(var i = 0; i < data[0].length; i++){
    						$('#municipio').append('<option value='+data[0][i].id_municipios+'>'+data[0][i].nombre+'</option>');
    					}
    				}
    			});
    		});

    		$('#municipio').on('change', function()
    		{
    			$.ajax({
    				"url": base_url + "/index.php/ajax/getLocalidadesByMun",
    				"type" : "POST",
    				"data" : {
    					"id_municipio" : $('#municipio option:selected').attr('value')
    				},
    				"success" : function(data){
    					$('#localidad').find('option').remove();
    					for(var i = 0; i < data[0].length; i++){
    						$('#localidad').append('<option value='+data[0][i].id_localidades+'>'+data[0][i].nombre+'</option>');
    					}
    				}
    			});
    		});
    	});
    </script>
</body>
</html>