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
    <h3>Proyecto Migración</h3>
	<hr>
        <div class="row">
        	<div class="col-lg-3">
        		<form role="form">
        			<div class="form-group">
					   	<label for="user">Usuario</label><br/>
					    <input class="form-control" type="text" id="user" value="Daniel" autofocus/>
				  	</div>	
				  	<div class="form-group">
					   	<label for="pass">Contraseña</label><br/>
					    <input class="form-control" type="password" id="pass"/>
				  	</div>
				  	<div class="form-group">
					   	<label for="pass2">Repetir contraseña</label><br/>
					    <input class="form-control" type="password" id="pass2"/>
				  	</div>	
				  	<div class="form-group">
				    	<label for="albergue">Albergue</label><br/>
				    	<select id="albergue" class="form-control">
				    		<option>Matamoros Blablabla</option>
					    </select>
					</div>
				  	<button type="submit" class="btn btn-success">Registrar</button>
				</form>
        	</div>
        </div>
    </div>
</body>
</html>
